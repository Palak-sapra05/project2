            <?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECO DRIVE - Future of Sustainable Mobility</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <span class="logo-text">ECO DRIVE</span>
            </div>
            <div class="nav-links desktop-nav">
                <a href="technology.php" class="tech-btn">Technology</a>
                <a href="Footer/sus.php">Sustainability</a>
                <a href="calc.html">CFC</a>
                <a href="donate.php">Donate</a>
            </div>
            <div class="nav-icons desktop-nav">
                <div class="nav-icons desktop-nav"><a href="index.php" target="_blank">
                    <span class="icon login-trigger"><i class="fas fa-user"></i></span>
                </a>
                    <div class="nav-icons desktop-nav"><a href="contact.php" target="_blank">
                    <span class="icon login-trigger"><i class="fas fa-phone"></i></span>
                </a>
                    
                </div>
                
            </div>
            <button class="mobile-menu-btn">☰</button>
            <!--<img src="path/to/profile.jpg" style="width: 32px; height: 32px; border-radius: 50%;">-->
        </div>
        <div class="mobile-menu">
            <a href="#">Technology</a>
            <a href="#">CFC</a>
            <a href="#">Shop</a>
        </div>
    </nav>

    <main>
        <section class="hero">
            <video autoplay muted loop playsinline class="background-video">
                <source src="videoplayback (2).mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="hero-content">
            <h1>Welcome TO ECO DRIVE, <?php echo $_SESSION['user_name']; ?>!</h1>
            
                <p>Zero emissions. Infinite possibilities.</p>
                <div class="hero-buttons">
                    <button class="btn btn-primary" onclick="location.href='main.html'">Learn More →</button>
                    <button class="btn btn-secondary" onclick="location.href='donate.php'">Donate Now →</button>
                </div>
            </div>
        </section>
        

        <section class="model-showcase">
            <div class="container">
                <h2>Sustainable Fleet</h2>
                <div class="model-grid">
                    <div class="model-card">
                        <div class="model-image">
                            <img src="https://images.unsplash.com/photo-1593941707882-a5bba14938c7?auto=format&fit=crop&q=80" alt="ECO DRIVE SUV">
                        </div>
                        <div class="model-info">
                            <h3>ECO DRIVE SUV</h3>
                            <p>Adventure with zero footprint</p>
                            <a href="suv1.php" class="link-btn">Learn More →</a>
                        </div>
                    </div>
                    <div class="model-card">
                        <div class="model-image">
                            <img src="https://images.unsplash.com/photo-1611516491426-03025e6043c8?auto=format&fit=crop&q=80" alt="ECO DRIVE Sedan">
                        </div>
                        <div class="model-info">
                            <h3>ECO DRIVE Sedan</h3>
                            <p>Luxury meets sustainability</p>
                            <a href="sedan.php" class="link-btn">Learn More →</a>
                        </div>
                    </div>
                    <div class="model-card">
                        <div class="model-image">
                            <img src="https://images.unsplash.com/photo-1621360841013-c7683c659ec6?auto=format&fit=crop&q=80" alt="ECO DRIVE Sport">
                        </div>
                        <div class="model-info">
                            <h3>ECO DRIVE Sport</h3>
                            <p>Performance with purpose</p>
                            <a href="sport.php" class="link-btn">Learn More →</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="news-section">
            <div class="container">
                <h2>Latest Innovation</h2>
                <div class="news-grid">
                    <div class="news-card">
                        <div class="news-image">
                            <img src="asb0421solar41.jpg" alt="Solar Charging">
                            <span class="tag">NEW</span>
                        </div>
                        <div class="news-info" onclick="location.href='solar.html'">
                            <h3>Solar Integration</h3>
                            <p>Revolutionary built-in solar charging technology.</p>
                            <button class="link-btn">Discover more →</button>
                        </div>
                    </div>
                    <div class="news-card">
                        <div class="news-image">
                            <img src="https://images.unsplash.com/photo-1516192518150-0d8fee5425e3?auto=format&fit=crop&q=80" alt="Green Initiative">
                            <span class="tag">INITIATIVE</span>
                        </div>
                        <div class="news-info">
                            <h3>Green Partnership</h3>
                            <p>Join our global reforestation program.</p>
                            <button class="link-btn">Join now →</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>Connect</h3>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="calc.html">Carbon Footprint Calculator</a></li>
                        <li><a href="logout.php" class="btn" >Logout</a></li>
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
    <script src="https://kit.fontawesome.com/yourkitcode.js" crossorigin="anonymous"></script>
</body>
</html>