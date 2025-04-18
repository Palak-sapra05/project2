<?php
// Start session
session_start();

// Database connection
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "eco_drive";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$email = "";
$error_message = "";
$success_message = "";

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? 1 : 0;

    // Validate form data
    if (empty($email) || empty($password)) {
        $error_message = "Please enter both email and password.";
    } else {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, first_name, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['first_name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['logged_in'] = true;
                
                // Set cookie if remember me is checked
                if ($remember) {
                    $token = bin2hex(random_bytes(16));
                    
                    // Store token in database (you'd need a tokens table for this)
                    $stmt = $conn->prepare("INSERT INTO user_tokens (user_id, token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 30 DAY))");
                    $stmt->bind_param("is", $user['id'], $token);
                    $stmt->execute();
                    
                    // Set cookie
                    setcookie("remember_token", $token, time() + (86400 * 30), "/"); // 30 days
                }
                
                // Redirect to dashboard or home
                header("Location: home.php");
                exit();
            } else {
                $error_message = "Invalid email or password.";
            }
        } else {
            $error_message = "Invalid email or password.";
        }
        
        $stmt->close();
    }
}

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $terms = isset($_POST['terms']) ? 1 : 0;
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    
    // Validate form data
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } elseif (strlen($password) < 8) {
        $error_message = "Password must be at least 8 characters long.";
    } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)) {
        $error_message = "Password must contain both uppercase and lowercase letters.";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $error_message = "Password must contain at least one number.";
    } elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $error_message = "Password must contain at least one special character.";
    } elseif (!$terms) {
        $error_message = "You must agree to the Terms of Service and Privacy Policy.";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error_message = "Email already exists. Please use a different email or log in.";
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert user into database
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, newsletter, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->bind_param("ssssi", $first_name, $last_name, $email, $hashed_password, $newsletter);
            
            if ($stmt->execute()) {
                $success_message = "Registration successful! You can now log in.";
                
                // Auto login after registration (optional)
                $_SESSION['user_id'] = $conn->insert_id;
                $_SESSION['user_name'] = $first_name;
                $_SESSION['user_email'] = $email;
                $_SESSION['logged_in'] = true;
                
                // Redirect to dashboard or home
                header("Location: home.php");
                exit();
            } else {
                $error_message = "Error: " . $stmt->error;
            }
        }
        
        $stmt->close();
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Access - Eco Drive</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset and base styles with improved typography */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2E7D32;
            --primary-light: #4CAF50;
            --accent: #2d06ef;
            --text-dark: #1a1a1a;
            --text-light: #f8f8f8;
            --gray-light: #f5f5f5;
            --gray: #e5e5e5;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--gray-light);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Enhanced Navbar styles with subtle shadow */
        .navbar {
            position: fixed;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(10px);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
            padding: 0 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo-text {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: 2px;
            position: relative;
            transition: var(--transition);
            text-decoration: none;
        }

        .logo-text::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 30%;
            height: 3px;
            background: var(--accent);
            transition: var(--transition);
        }

        .logo-text:hover::after {
            width: 100%;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            margin: 0 1.2rem;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
            transition: var(--transition);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-icons {
            display: flex;
            gap: 1.8rem;
        }

        .icon {
            cursor: pointer;
            position: relative;
        }

        .icon i {
            font-size: 1.3rem;
            color: var(--text-dark);
            transition: var(--transition);
        }

        .icon::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent);
            transform: translateX(-50%);
            transition: var(--transition);
        }

        .icon:hover i {
            color: var(--accent);
            transform: translateY(-2px);
        }

        .icon:hover::after {
            width: 100%;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            transition: var(--transition);
        }

        /* Auth Section */
        .auth-section {
            display: flex;
            min-height: 100vh;
            padding-top: 70px; /* Navbar height */
        }

        .auth-image {
            flex: 1;
            background-image: url('/api/placeholder/800/1200');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .auth-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(46, 125, 50, 0.7) 0%, rgba(45, 6, 239, 0.5) 100%);
            z-index: 1;
        }

        .auth-image-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
            padding: 0 2rem;
            max-width: 500px;
        }

        .auth-image-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .auth-image-content p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .auth-form-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-form-wrapper {
            width: 100%;
            max-width: 500px;
            padding: 3rem;
            background: white;
            border-radius: 10px;
            box-shadow: var(--shadow);
            animation: fadeIn 0.8s ease-out;
            position: relative;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .auth-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .auth-header h2 {
            font-size: 2rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .auth-header p {
            color: #666;
        }

        .form-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            flex: 1;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.8rem;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
        }

        .password-requirements {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #666;
        }

        .password-requirements ul {
            padding-left: 1.5rem;
            margin-top: 0.25rem;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .checkbox-container input {
            margin-right: 0.5rem;
        }

        .terms-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .terms-container input {
            margin-right: 0.5rem;
            margin-top: 0.3rem;
        }

        .terms-container label {
            font-size: 0.95rem;
            color: #666;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .forgot-password:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        .terms-container a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .terms-container a:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 0.85rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 8px rgba(46, 125, 50, 0.3);
        }

        .btn-primary:hover {
            background: #236b27;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(46, 125, 50, 0.4);
        }

        .social-login {
            margin-top: 2rem;
            text-align: center;
        }

        .social-login p {
            position: relative;
            margin-bottom: 1.5rem;
            color: #666;
        }

        .social-login p::before,
        .social-login p::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: var(--gray);
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--gray);
            background: white;
            transition: var(--transition);
            color: var(--text-dark);
        }

        .social-btn:hover {
            background: var(--gray-light);
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .account-toggle {
            margin-top: 2rem;
            text-align: center;
            color: #666;
        }

        .account-toggle a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
        }

        .account-toggle a:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        /* Toggle tabs */
        .auth-tabs {
            display: flex;
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--gray);
        }

        .auth-tab {
            flex: 1;
            text-align: center;
            padding: 1rem;
            cursor: pointer;
            font-weight: 600;
            color: #666;
            position: relative;
            transition: var(--transition);
        }

        .auth-tab.active {
            color: var(--primary);
        }

        .auth-tab::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }

        .auth-tab.active::after {
            width: 100%;
        }

        .auth-form {
            display: none;
        }

        .auth-form.active {
            display: block;
            animation: fadeIn 0.5s ease-out;
        }

        /* Alert messages */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            border-left: 4px solid;
        }

        .alert-error {
            background-color: #ffebee;
            border-left-color: #f44336;
            color: #b71c1c;
        }

        .alert-success {
            background-color: #e8f5e9;
            border-left-color: #4caf50;
            color: #1b5e20;
        }

        /* Responsive design */
        @media (max-width: 992px) {
            .desktop-nav {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .auth-section {
                flex-direction: column;
            }

            .auth-image {
                display: none;
            }

            .auth-form-container {
                padding: 1.5rem;
            }

            .auth-form-wrapper {
                padding: 2rem;
                box-shadow: none;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
    <body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="logo-text">ECO DRIVE</a>

            <div class="desktop-nav">
                <div class="nav-links">
                    <a href="index.php">Home</a>
                    <a href="index.php">Products</a>
                    <a href="index.php">Services</a>
                    <a href="index.php">About</a>
                    <a href="index.php">Contact</a>
                </div>
            </div>
            
            <div class="nav-icons">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Auth Section -->
    <section class="auth-section">
        <div class="auth-image">
            <div class="auth-image-content" id="auth-image-content">
                <h2>Welcome to Eco Drive!</h2>
                <p>Access your account to manage your profile, view your orders, and enjoy a personalized shopping experience with exclusive benefits.</p>
            </div>
        </div>
        <div class="auth-form-container">
            <div class="auth-form-wrapper">
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-error">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($success_message)): ?>
                    <div class="alert alert-success">
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>
                
                <div class="auth-tabs">
                    <div class="auth-tab <?php echo (!isset($_GET['register'])) ? 'active' : ''; ?>" id="login-tab">Sign In</div>
                    <div class="auth-tab <?php echo (isset($_GET['register'])) ? 'active' : ''; ?>" id="register-tab">Create Account</div>
                </div>
                
                <!-- Login Form -->
                <div class="auth-form <?php echo (!isset($_GET['register'])) ? 'active' : ''; ?>" id="login-form">
                    <div class="auth-header">
                        <h2>Sign In</h2>
                        <p>Please enter your credentials to continue</p>
                    </div>
                    <form action="index.php" method="POST" autocomplete="new-password">
                        <div class="form-group">
                            <label for="login-email">Email Address</label>
                            <div class="input-group">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" autocomplete="new-password" name="email" id="login-email" class="form-control" placeholder="your@email.com"  required value="<?php echo htmlspecialchars($email); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="login-password">Password</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" autocomplete="new-password" name="password" id="login-password" class="form-control" placeholder="••••••••" required>
                            </div>
                        </div>
                        <div class="form-footer">
                            <div class="checkbox-container">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember me</label>
                            </div>
                            <a href="forgot.php" class="forgot-password">Forgot Password?</a>
                        </div>
                        <input type="hidden" name="login" value="1">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                    <div class="social-login">
                        <p>Or sign in with</p>
                        <div class="social-buttons">
                            <button class="social-btn" aria-label="Sign in with Google" onclick="location.href='not_found.html'">
                                <i class="fab fa-google"></i>
                            </button>
                            <button class="social-btn" aria-label="Sign in with Facebook" onclick="location.href='not_found.html'">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button class="social-btn" aria-label="Sign in with Twitter" onclick="location.href='not_found.html'">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button class="social-btn" aria-label="Sign in with Apple" onclick="location.href='not_found.html'">
                                <i class="fab fa-apple"></i>
                            </button>
                        </div>
                    </div>
                    <div class="account-toggle">
                        <p>Don't have an account? <a id="go-to-register">Create Account</a></p>
                    </div>
                </div>
                
                <!-- Register Form -->
                <div class="auth-form <?php echo (isset($_GET['register'])) ? 'active' : ''; ?>" id="register-form">
                    <div class="auth-header">
                        <h2>Create Account</h2>
                        <p>Enter your details to get started</p>
                    </div>
                    <form action="index.php" method="POST" autocomplete="new-password">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <div class="input-group">
                                    <i class="fas fa-user input-icon"></i>
                                    <input type="text" autocomplete="new-password" name="first_name" id="first-name" class="form-control" placeholder="John" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <div class="input-group">
                                    <i class="fas fa-user input-icon"></i>
                                    <input type="text" autocomplete="new-password" name="last_name" id="last-name" class="form-control" placeholder="Doe" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="register-email">Email Address</label>
                            <div class="input-group">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" autocomplete="new-password" name="email" id="register-email" class="form-control" placeholder="your@email.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="register-password">Password</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" autocomplete="new-password" name="password" id="register-password" class="form-control" placeholder="••••••••" required>
                            </div>
                            <div class="password-requirements">
                                <p>Password must contain:</p>
                                <ul>
                                    <li>At least 8 characters</li>
                                    <li>Upper and lowercase letters</li>
                                    <li>At least one number</li>
                                    <li>At least one special character</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <div class="input-group">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="confirm_password" id="confirm-password" class="form-control" placeholder="••••••••" required>
                            </div>
                        </div>
                        <div class="terms-container">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                        </div>
                        <div class="terms-container">
                            <input type="checkbox" id="newsletter" name="newsletter">
                            <label for="newsletter">I want to receive newsletters and promotional emails</label>
                        </div>
                        <input type="hidden" name="register" value="1">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </form>
                    <div class="social-login">
                        <p>Or sign up with</p>
                        <div class="social-buttons">
                            <button class="social-btn" aria-label="Sign up with Google" onclick="location.href='not_found.html'">
                                <i class="fab fa-google"></i>
                            </button>
                            <button class="social-btn" aria-label="Sign up with Facebook" onclick="location.href='not_found.html'">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button class="social-btn" aria-label="Sign up with Twitter" onclick="location.href='not_found.html'">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button class="social-btn" aria-label="Sign up with Apple" onclick="location.href='not_found.html'">
                                <i class="fab fa-apple"></i>
                            </button>
                        </div>
                    </div>
                    <div class="account-toggle">
                        <p>Already have an account? <a id="go-to-login">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Tab switching functionality
        const loginTab = document.getElementById('login-tab');
const registerTab = document.getElementById('register-tab');
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const goToRegister = document.getElementById('go-to-register');
const goToLogin = document.getElementById('go-to-login');
const authImageContent = document.getElementById('auth-image-content');

        function showLoginForm() {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.classList.add('active');
            registerForm.classList.remove('active');
            
            // Update URL without page refresh
            history.pushState(null, '', 'index.php');
            
            // Update side content
            authImageContent.innerHTML = `
                <h2>Welcome Back!</h2>
                <p>Access your account to manage your profile, view your orders, and enjoy a personalized shopping experience with exclusive benefits.</p>
            `;
        }

        function showRegisterForm() {
            registerTab.classList.add('active');
            loginTab.classList.remove('active');
            registerForm.classList.add('active');
            loginForm.classList.remove('active');
            
            // Update URL without page refresh
            history.pushState(null, '', 'index.php?register');
            
            // Update side content
            authImageContent.innerHTML = `
                <h2>Join Our Community!</h2>
                <p>Create an account to unlock exclusive benefits, track your orders, access special promotions, and join our growing community of eco-conscious consumers.</p>
            `;
        }

        // Event listeners
        loginTab.addEventListener('click', showLoginForm);
        registerTab.addEventListener('click', showRegisterForm);
        goToRegister.addEventListener('click', showRegisterForm);
        goToLogin.addEventListener('click', showLoginForm);

        // Hide alert messages after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        if (alerts.length > 0) {
            setTimeout(() => {
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 1s';
                    setTimeout(() => {
                        alert.remove();
                    }, 1000);
                });
            }, 5000);
        }
    </script>
</body>
</html>