<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Eco Drive - Donate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--gray-light);
        }

        /* Navbar Styles */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
            position: absolute;
            left: 2rem;
        }

        .back-btn {
            color: var(--text-dark);
            font-size: 1.2rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .back-btn:hover {
            color: var(--accent);
            transform: translateX(-3px);
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            margin: 0 auto;
        }

        .nav-links a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            transition: var(--transition);
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--accent);
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .donate-btn {
            background-color: var(--primary);
            color: white !important;
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            font-weight: 600;
            transition: var(--transition);
            position: absolute;
            right: 2rem;
        }

        .donate-btn:hover {
            background-color: #236b27;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(46, 125, 50, 0.3);
        }

        .donate-btn::after {
            display: none !important;
        }

        /* Donation Page Styles */
        .donation-hero {
            background: linear-gradient(135deg, rgba(46, 125, 50, 0.9) 0%, rgba(45, 6, 239, 0.7) 100%);
            color: white;
            padding: 8rem 2rem 6rem;
            text-align: center;
            margin-top: 80px;
        }
        
        .donation-hero h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }
        
        .donation-hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 2rem;
            line-height: 1.7;
        }
        
        .impact-section {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .impact-section h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--primary);
        }
        
        .impact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }
        
        .impact-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }
        
        .impact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .impact-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }
        
        .impact-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .donation-section {
            background: var(--gray-light);
            padding: 4rem 2rem;
            text-align: center;
        }
        
        .donation-options {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: var(--shadow);
        }
        
        .donation-options h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
            color: var(--primary);
        }
        
        .donation-options p {
            margin-bottom: 2rem;
            color: #666;
        }
        
        .amount-options {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 2rem;
        }
        
        .amount-btn {
            padding: 0.8rem 1.5rem;
            border: 2px solid var(--primary);
            background: white;
            color: var(--primary);
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .amount-btn:hover, .amount-btn.active {
            background: var(--primary);
            color: white;
        }
        
        .custom-amount {
            display: flex;
            margin-bottom: 2rem;
        }
        
        .custom-amount input {
            flex: 1;
            padding: 0.8rem 1rem;
            border: 2px solid var(--gray);
            border-radius: 5px 0 0 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .custom-amount input:focus {
            border-color: var(--primary);
            outline: none;
        }
        
        .custom-amount span {
            background: var(--gray);
            padding: 0.8rem 1rem;
            border-radius: 0 5px 5px 0;
        }
        
        .donate-btn-large {
            background: var(--primary);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 8px rgba(46, 125, 50, 0.3);
        }
        
        .donate-btn-large:hover {
            background: #236b27;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(46, 125, 50, 0.4);
        }

        /* Payment Status Modal */
        .payment-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .modal-content i {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }

        .success-icon {
            color: var(--primary);
        }

        .error-icon {
            color: #f44336;
        }

        .modal-content h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .modal-content p {
            margin-bottom: 2rem;
            color: #666;
        }

        .modal-btn {
            background: var(--primary);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .modal-btn:hover {
            background: #236b27;
        }

        /* Loading Spinner */
        .spinner {
            display: none;
            width: 40px;
            height: 40px;
            margin: 0 auto;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top: 4px solid var(--primary);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .nav-links {
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }
            
            .nav-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            .logo-container {
                position: static;
                width: 100%;
                justify-content: space-between;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
                margin: 1rem 0;
                width: 100%;
            }
            
            .donate-btn {
                position: static;
                margin-top: 1rem;
                width: 100%;
                text-align: center;
            }
            
            .donation-hero {
                padding: 6rem 1rem 4rem;
                margin-top: 60px;
            }
            
            .donation-hero h1 {
                font-size: 2.2rem;
            }
            
            .donation-hero p {
                font-size: 1rem;
            }
            
            .impact-section h2 {
                font-size: 2rem;
            }
            
            .amount-options {
                gap: 0.5rem;
            }
            
            .amount-btn {
                padding: 0.6rem 1rem;
            }
            
            .donation-options {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo-container">
                <a href="home.php" class="back-btn">
                <i class="fas fa-arrow-left"></i></a>
                <a href="home.php" class="logo-text">ECO DRIVE</a>
            </div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="services.php">Services</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </div>
            <a href="donate.php" class="donate-btn">Donate</a>
        </div>
    </nav>

    <!-- Donation Hero Section -->
    <section class="donation-hero">
        <h1>Support Our Mission</h1>
        <p>Your donation helps us accelerate the transition to sustainable transportation and reduce carbon emissions worldwide. Together, we can create a cleaner, greener future.</p>
    </section>

    <!-- Impact Section -->
    <section class="impact-section">
        <h2>Your Impact</h2>
        <div class="impact-grid">
            <div class="impact-card">
                <i class="fas fa-leaf"></i>
                <h3>Reduce Carbon Emissions</h3>
                <p>Every ₹1000 donated helps remove approximately 1 ton of CO2 from the atmosphere through our clean energy projects and EV adoption programs.</p>
            </div>
            <div class="impact-card">
                <i class="fas fa-charging-station"></i>
                <h3>Expand Charging Infrastructure</h3>
                <p>Your support helps us build more charging stations in underserved communities, making EV ownership practical for everyone.</p>
            </div>
            <div class="impact-card">
                <i class="fas fa-graduation-cap"></i>
                <h3>Education & Advocacy</h3>
                <p>We use donations to fund educational programs that teach communities about the benefits of sustainable transportation.</p>
            </div>
        </div>
    </section>

    <!-- Donation Form Section -->
    <section class="donation-section">
        <div class="donation-options">
            <h2>Make a Donation</h2>
            <p>Choose an amount to give or enter a custom donation. Every contribution makes a difference!</p>
            
            <div class="amount-options">
                <button class="amount-btn" data-amount="500">₹500</button>
                <button class="amount-btn" data-amount="1000">₹1000</button>
                <button class="amount-btn active" data-amount="2000">₹2000</button>
                <button class="amount-btn" data-amount="5000">₹5000</button>
                <button class="amount-btn" data-amount="10000">₹10000</button>
            </div>
            
            <div class="custom-amount">
                <input type="number" id="donation-amount" placeholder="Other amount" value="2000" min="10">
                <span>INR</span>
            </div>
            
            <button class="donate-btn-large" id="rzp-button">Donate Now</button>
            <div class="spinner" id="spinner"></div>
            
            <p style="margin-top: 2rem; font-size: 0.9rem;">Eco Drive is a registered nonprofit organization. Your donation may be tax-deductible.</p>
        </div>
    </section>

    <!-- Payment Status Modal -->
    <div class="payment-modal" id="payment-modal">
        <div class="modal-content">
            <i class="fas fa-check-circle success-icon" id="modal-icon"></i>
            <h3 id="modal-title">Payment Successful!</h3>
            <p id="modal-message">Thank you for your generous donation to Eco Drive. Your support helps us create a sustainable future.</p>
            <button class="modal-btn" id="modal-close">Close</button>
        </div>
    </div>

    <script>
        // Amount selection functionality
        const amountBtns = document.querySelectorAll('.amount-btn');
        const donationInput = document.getElementById('donation-amount');
        const rzpButton = document.getElementById('rzp-button');
        const spinner = document.getElementById('spinner');
        const paymentModal = document.getElementById('payment-modal');
        const modalClose = document.getElementById('modal-close');
        const modalIcon = document.getElementById('modal-icon');
        const modalTitle = document.getElementById('modal-title');
        const modalMessage = document.getElementById('modal-message');
        
        // Initialize with default amount
        let currentAmount = 2000;
        
        amountBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                amountBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                btn.classList.add('active');
                
                // Update the input field with the selected amount
                const amount = btn.getAttribute('data-amount');
                donationInput.value = amount;
                currentAmount = parseInt(amount);
            });
        });
        
        // Handle custom amount input
        donationInput.addEventListener('input', () => {
            // Remove active class from all buttons when user types a custom amount
            amountBtns.forEach(b => b.classList.remove('active'));
            
            // Update current amount
            const amount = parseInt(donationInput.value);
            if (!isNaN(amount) && amount >= 10) {
                currentAmount = amount;
            }
        });

        // Razorpay Payment Integration
        rzpButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Validate amount
            if (currentAmount < 10) {
                showPaymentModal(false, "Invalid Amount", "Please enter a donation amount of at least ₹10");
                return;
            }
            
            // Show loading spinner
            rzpButton.style.display = 'none';
            spinner.style.display = 'block';
            
            // Create order (in a real app, this would be done via your backend)
            // For demo purposes, we're using client-side only
            const options = {
                "key": "rzp_test_Uwgih3PDOIETy2",
                "amount": currentAmount * 100, // Amount in paise
                "currency": "INR",
                "name": "Eco Drive",
                "description": "Donation for Sustainable Future",
                "image": "https://example.com/your_logo.png", // Add your logo
                "handler": function (response) {
                    // Handle successful payment
                    showPaymentModal(true, "Payment Successful!", 
                        `Thank you for your donation of ₹${currentAmount}. Your support helps us create a sustainable future.`);
                },
                "prefill": {
                    "name": "Donor Name",
                    "email": "donor@example.com",
                    "contact": "9876543210"
                },
                "notes": {
                    "address": "Eco Drive Office Address"
                },
                "theme": {
                    "color": "#2E7D32"
                }
            };
            
            // In a real application, you would create an order on your server first
            // For demo, we're directly opening the Razorpay payment modal
            const rzp = new Razorpay(options);
            rzp.open();
            
            rzp.on('payment.failed', function (response) {
                showPaymentModal(false, "Payment Failed", 
                    `Payment failed for donation of ₹${currentAmount}. Please try again or contact support.`);
            });
            
            // Hide spinner when payment modal opens
            rzp.on('modal.opened', function() {
                rzpButton.style.display = 'block';
                spinner.style.display = 'none';
            });
        });
        
        // Show payment status modal
        function showPaymentModal(success, title, message) {
            if (success) {
                modalIcon.className = "fas fa-check-circle success-icon";
            } else {
                modalIcon.className = "fas fa-times-circle error-icon";
            }
            modalTitle.textContent = title;
            modalMessage.textContent = message;
            paymentModal.style.display = "flex";
            
            // Reset UI
            rzpButton.style.display = 'block';
            spinner.style.display = 'none';
        }
        
        // Close modal
        modalClose.addEventListener('click', function() {
            paymentModal.style.display = "none";
        });
        
        // Close modal when clicking outside
        paymentModal.addEventListener('click', function(e) {
            if (e.target === paymentModal) {
                paymentModal.style.display = "none";
            }
        });
    </script>
</body>
</html>