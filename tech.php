<?php
// Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology - ECO DRIVE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Technology page specific styles */
        .tech-hero {
            height: 70vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3)), url('https://images.unsplash.com/photo-1611579126955-29835a3dc3d2?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .tech-section {
            padding: 6rem 0;
        }
        
        .tech-section:nth-child(even) {
            background-color: var(--gray-light);
        }
        
        .tech-intro {
            max-width: 800px;
            margin: 0 auto 4rem;
            text-align: center;
        }
        
        .tech-intro p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.8;
        }
        
        .tech-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }
        
        .tech-grid:nth-child(odd) {
            direction: rtl;
        }
        
        .tech-grid:nth-child(odd) .tech-content {
            direction: ltr;
        }
        
        .tech-image {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }
        
        .tech-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }
        
        .tech-grid:hover .tech-image img {
            transform: scale(1.05);
        }
        
        .tech-content h3 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .tech-content h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--accent);
        }
        
        .tech-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 1.5rem;
        }
        
        .tech-features {
            margin-top: 2rem;
        }
        
        .tech-feature {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.2rem;
        }
        
        .tech-feature-icon {
            color: var(--primary);
            font-size: 1.2rem;
            margin-right: 1rem;
            min-width: 24px;
        }
        
        .tech-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
            text-align: center;
        }
        
        .tech-stat {
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }
        
        .tech-stat:hover {
            transform: translateY(-10px);
        }
        
        .tech-stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        
        .tech-stat-label {
            font-size: 1.1rem;
            color: #555;
        }
        
        .tech-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .tech-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }
        
        .tech-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .tech-card-icon {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary);
            color: white;
            font-size: 3rem;
        }
        
        .tech-card-content {
            padding: 2rem;
        }
        
        .tech-card-content h4 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .tech-card-content p {
            color: #666;
            line-height: 1.6;
        }
        
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
        }
        
        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background: #236b27;
            transform: translateY(-5px);
        }
        
        .back-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.8rem 1.5rem;
            background: var(--primary);
            color: white;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 2rem;
            box-shadow: 0 4px 12px rgba(46, 125, 50, 0.2);
        }
        
        .back-btn i {
            margin-right: 8px;
        }
        
        .back-btn:hover {
            background: #236b27;
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(46, 125, 50, 0.3);
        }
        
        @media (max-width: 992px) {
            .tech-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .tech-grid:nth-child(odd) {
                direction: ltr;
            }
            
            .tech-content {
                padding: 0 1rem;
            }
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
                <a href="#">Vehicles</a>
                <a href="#" class="active">Technology</a>
                <a href="calc.html">CFC</a>
                <a href="#">Shop</a>
            </div>
            <div class="nav-icons desktop-nav">
                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="home.php">
                        <span class="icon"><i class="fas fa-user"></i></span>
                    </a>
                <?php else: ?>
                    <a href="index.php">
                        <span class="icon login-trigger"><i class="fas fa-user"></i></span>
                    </a>
                <?php endif; ?>
                <span class="icon"><i class="fas fa-search"></i></span>
                <span class="icon"><i class="fas fa-phone"></i></span>
                <span class="icon"><i class="fas fa-location-arrow"></i></span>
            </div>
            <button class="mobile-menu-btn">☰</button>
        </div>
        <div class="mobile-menu">
            <a href="home.php">Home</a>
            <a href="#">Vehicles</a>
            <a href="#">Technology</a>
            <a href="calc.html">CFC</a>
            <a href="#">Shop</a>
        </div>
    </nav>

    <section class="hero tech-hero">
        <div class="hero-content">
            <h1>Revolutionary Technology</h1>
            <p>Driving the future with groundbreaking innovations that redefine sustainable mobility.</p>
            <a href="home.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Home</a>
        </div>
    </section>

    <section class="tech-section">
        <div class="container">
            <div class="tech-intro">
                <h2>Our Innovations</h2>
                <p>At ECO DRIVE, we're pioneering the future of sustainable transportation through cutting-edge technology, advanced engineering, and innovative design. Our commitment to environmental stewardship drives every aspect of our research and development.</p>
            </div>
            
            <div class="tech-grid">
                <div class="tech-image">
                    <img src="https://images.unsplash.com/photo-1617886322168-72b886573c5f?auto=format&fit=crop&q=80" alt="Battery Technology">
                </div>
                <div class="tech-content">
                    <h3>Next-Generation Battery Technology</h3>
                    <p>Our proprietary battery technology represents a quantum leap in energy storage, providing unparalleled range and longevity while minimizing environmental impact.</p>
                    <p>Using sustainable materials and innovative cell chemistry, we've created power systems that deliver up to 30% more energy density than conventional lithium-ion batteries.</p>
                    
                    <div class="tech-features">
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-bolt"></i></span>
                            <span>Ultra-fast charging capability - 80% charge in just 20 minutes</span>
                        </div>
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-recycle"></i></span>
                            <span>97% recyclable components for minimal environmental footprint</span>
                        </div>
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-thermometer-half"></i></span>
                            <span>Advanced thermal management for optimal performance in all climates</span>
                        </div>
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-chart-line"></i></span>
                            <span>Over 2,000 charge cycles with minimal degradation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tech-section">
        <div class="container">
            <div class="tech-grid">
                <div class="tech-image">
                    <img src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?auto=format&fit=crop&q=80" alt="Autonomous Driving">
                </div>
                <div class="tech-content">
                    <h3>Advanced Autonomous Driving</h3>
                    <p>Our comprehensive sensor suite and AI-powered navigation system work in harmony to create one of the safest and most reliable autonomous driving experiences available today.</p>
                    <p>ECO DRIVE vehicles constantly learn from our global fleet, with each mile driven adding to a collective intelligence that improves the driving experience for everyone.</p>
                    
                    <div class="tech-features">
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-camera"></i></span>
                            <span>12 high-definition cameras with 360° visibility</span>
                        </div>
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-broadcast-tower"></i></span>
                            <span>Long-range radar systems can detect objects up to 250 meters away</span>
                        </div>
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-microchip"></i></span>
                            <span>Custom neural network processor performs over 144 trillion operations per second</span>
                        </div>
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-shield-alt"></i></span>
                            <span>Predictive collision avoidance with sub-millisecond response time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tech-section">
        <div class="container">
            <div class="tech-grid">
                <div class="tech-image">
                    <img src="https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?auto=format&fit=crop&q=80" alt="Solar Integration">
                </div>
                <div class="tech-content">
                    <h3>Integrated Solar Technology</h3>
                    <p>Our revolutionary solar integration system transforms the entire vehicle into an energy-harvesting surface, providing supplemental power even while parked.</p>
                    <p>With advanced photovoltaic cells seamlessly incorporated into the vehicle's design, ECO DRIVE vehicles can extend their range by up to 45 miles per day through solar energy alone.</p>
                    
                    <div class="tech-features">
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-sun"></i></span>
                            <span>High-efficiency solar panels with 24% energy conversion rate</span>
                        </div>
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-tint"></i></span>
                            <span>Hydrophobic coating ensures optimal performance in all weather conditions</span>
                        </div>
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-mobile-alt"></i></span>
                            <span>Mobile app integration to monitor solar charging in real-time</span>
                        </div>
                        <div class="tech-feature">
                            <span class="tech-feature-icon"><i class="fas fa-leaf"></i></span>
                            <span>Can reduce carbon emissions by up to 1.5 tons annually</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tech-section">
        <div class="container">
            <h2 class="section-heading">Performance Metrics</h2>
            <div class="tech-stats">
                <div class="tech-stat">
                    <div class="tech-stat-number">400+</div>
                    <div class="tech-stat-label">Miles Range</div>
                </div>
                <div class="tech-stat">
                    <div class="tech-stat-number">3.2</div>
                    <div class="tech-stat-label">Seconds 0-60 MPH</div>
                </div>
                <div class="tech-stat">
                    <div class="tech-stat-number">97%</div>
                    <div class="tech-stat-label">Recyclable Materials</div>
                </div>
                <div class="tech-stat">
                    <div class="tech-stat-number">20</div>
                    <div class="tech-stat-label">Minutes to 80% Charge</div>
                </div>
            </div>
        </div>
    </section>

    <section class="tech-section">
        <div class="container">
            <h2 class="section-heading">Smart Ecosystem</h2>
            <p class="section-heading">Our integrated approach connects your vehicle to your life seamlessly.</p>
            
            <div class="tech-cards">
                <div class="tech-card">
                    <div class="tech-card-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="tech-card-content">
                        <h4>Smart Home Integration</h4>
                        <p>Synchronize your ECO DRIVE with your smart home. Preheat your vehicle while your morning coffee brews, and have your home ready when you return from your commute.</p>
                    </div>
                </div>
                
                <div class="tech-card">
                    <div class="tech-card-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <div class="tech-card-content">
                        <h4>Cloud-Based Updates</h4>
                        <p>Experience a vehicle that improves over time. Regular over-the-air updates enhance performance, add new features, and keep your ECO DRIVE at the cutting edge.</p>
                    </div>
                </div>
                
                <div class="tech-card">
                    <div class="tech-card-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="tech-card-content">
                        <h4>Advanced Security</h4>
                        <p>State-of-the-art encryption and biometric authentication keep your vehicle secure, while 360° surveillance provides peace of mind wherever you park.</p>
                    </div>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 3rem;">
                <a href="home.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Home</a>
            </div>
        </div>
    </section>

    <div class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>Connect</h3>
                    <ul>
                        <li><a href="#">Find a Showroom</a></li>
                        <li><a href="#">Book a Test Drive</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Configure Your Vehicle</a></li>
                        <li><a href="#">Charging Solutions</a></li>
                        <li><a href="#">Service Centers</a></li>
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
                        <li><a href="#">Carbon Offset</a></li>
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
    <script>
        // Back to top functionality
        const backToTopBtn = document.querySelector('.back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('active');
            } else {
                backToTopBtn.classList.remove('active');
            }
        });
        
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>