<?php
// Start session
session_start();

// Initialize variables
$name = $email = $phone = $subject = $message = "";
$nameErr = $emailErr = $subjectErr = $messageErr = "";
$successMsg = "";
$errorMsg = "";

// Form handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }
    
    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    
    // Get phone (optional)
    $phone = test_input($_POST["phone"]);
    
    // Validate subject
    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
    } else {
        $subject = test_input($_POST["subject"]);
    }
    
    // Validate message
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = test_input($_POST["message"]);
    }
    
    // Process form if no errors
    if (empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr)) {
        // Set email recipient
        $to = "harshsharma7250@gmail.com"; // Replace with your email
        
        // Set email headers
        $headers = "From: $name <$email>" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Email body
        $email_body = "You have received a new message from the ECO DRIVE contact form.\n\n";
        $email_body .= "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Phone: $phone\n\n";
        $email_body .= "Subject: $subject\n\n";
        $email_body .= "Message:\n$message\n";
        
        // Send email
        if (mail($to, "ECO DRIVE Contact: $subject", $email_body, $headers)) {
            $successMsg = "Thank you for your message. We'll get back to you shortly.";
            // Clear form fields
            $name = $email = $phone = $subject = $message = "";
        } else {
            $errorMsg = "Sorry, there was an error sending your message. Please try again later.";
        }
    }
}

// Helper function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ECO DRIVE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Additional Contact page styles */
        .contact-hero {
            height: 50vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3)), url('https://images.unsplash.com/photo-1516714819001-8ee7a13b71d7?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .contact-main {
            background: var(--gray-light);
            padding: 5rem 0;
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 3rem;
        }
        
        @media (max-width: 992px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .contact-info {
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 2rem;
        }
        
        .contact-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 2rem;
        }
        
        .contact-icon {
            font-size: 1.5rem;
            color: var(--primary);
            margin-right: 1rem;
            padding: 1rem;
            background: var(--gray-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .contact-text h4 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }
        
        .contact-text p, .contact-text a {
            color: #666;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .contact-text a:hover {
            color: var(--primary);
        }
        
        .contact-form {
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 2.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            border: 1px solid var(--gray);
            border-radius: 4px;
            transition: var(--transition);
        }
        
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(46, 125, 50, 0.2);
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .form-error {
            color: #e53935;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        .form-submit {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.85rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-block;
        }
        
        .form-submit:hover {
            background: #236b27;
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(46, 125, 50, 0.3);
        }
        
        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
        }
        
        .alert-success {
            background-color: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
        }
        
        .alert-error {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #ffcdd2;
        }
        
        .map-container {
            margin-top: 5rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            height: 400px;
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <span class="logo-text">ECO DRIVE</span>
            </div>
            <div class="nav-links desktop-nav">
                <a href="home.php">Home</a>
                <a href="#">Technology</a>
                <a href="calc.html">CFC</a>
                <a href="Footer/sus.php">Sustainability</a>
            </div>
            <div class="nav-icons desktop-nav">
                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="home.php">
                        <span class="icon"><i class="fas fa-user"></i></span>
                    </a>
                <?php else: ?>
                    <a href="index.php">
                        <span class="icon login-trigger"><i class="fa-solid fa-backward"></i></span>
                    </a>
                <?php endif; ?>
                <span class="icon"><i class="fas fa-phone"></i></span>
            </div>
            <button class="mobile-menu-btn">☰</button>
        </div>
        <div class="mobile-menu">
            <a href="home.php">Home</a>
            <a href="#">Technology</a>
            <a href="calc.html">CFC</a>
            <a href="Footer/sus.php">Sustainblity</a>
        </div>
    </nav>

    <section class="hero contact-hero">
        <div class="hero-content">
            <h1>Contact Us</h1>
            <p>We're here to answer your questions and help you join the sustainable mobility revolution.</p>
        </div>
    </section>

    <section class="contact-main">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Get In Touch</h2>
                    <p style="margin-bottom: 2rem;">Have questions about our vehicles or technology? Our team is here to help.</p>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Visit Us</h4>
                            <p>Forbesganj, Araria, Bihar 854318</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Call Us</h4>
                            <p><a href="tel:+18001234567"> (+91) 97985-31147</a> - Sales</p>
                            <p><a href="tel:+18007654321"> (+91) 72503-54493</a> - Support</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Email Us</h4>
                            <p><a href="mailto:sales@ecodrive.com">harsh.rshh@gmail.com</a></p>
                            <p><a href="mailto:support@ecodrive.com">ecodrive@gmail.com</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Business Hours</h4>
                            <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                            <p>Saturday: 10:00 AM - 4:00 PM</p>
                            <p>Sunday: Closed</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form">
                    <h2>Send Us a Message</h2>
                    <p style="margin-bottom: 2rem;">Fill out the form below and we'll get back to you as soon as possible.</p>
                    
                    <?php if (!empty($successMsg)): ?>
                    <div class="alert alert-success">
                        <?php echo $successMsg; ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($errorMsg)): ?>
                    <div class="alert alert-error">
                        <?php echo $errorMsg; ?>
                    </div>
                    <?php endif; ?>
                    
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                            <?php if (!empty($nameErr)): ?>
                            <span class="form-error"><?php echo $nameErr; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                            <?php if (!empty($emailErr)): ?>
                            <span class="form-error"><?php echo $emailErr; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number (Optional)</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $subject; ?>">
                            <?php if (!empty($subjectErr)): ?>
                            <span class="form-error"><?php echo $subjectErr; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5"><?php echo $message; ?></textarea>
                            <?php if (!empty($messageErr)): ?>
                            <span class="form-error"><?php echo $messageErr; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <button type="submit" class="form-submit">Send Message <i class="fas fa-paper-plane" style="margin-left: 8px;"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>Connect</h3>
                    <ul>
                        <li><a href="about.html ">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Carbon Footprint Calculator</a></li>
                        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                            <li><a href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li><a href="index.php">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Sustainability</h3>
                    <ul>
                        <li><a href="#">Environmental Impact</a></li>
                        <li><a href="#">Green Initiative</a></li>
                        <li><a href="not_found.html">Carbon Offset</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon">📘</a>
                        <a href="#" class="social-icon">🐦</a>
                        <a href="#" class="social-icon">📷</a>
                        <a href="#" class="social-icon">▶️</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-logo">
                    <span class="logo-text">ECO DRIVE</span>
                </div>
                <div class="footer-links">
                    <a href="Footer/legal.html">Legal Notice</a>
                    <a href="Footer/cookies.html">Cookie Policy</a>
                    <a href="Footer/privacy.html">Privacy Policy</a>
                    <span>© ECO DRIVE 2024 | Harsh Sharma</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>