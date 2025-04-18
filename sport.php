<?php
// --- PHP Data Setup for ECO DRIVE Sport ---

$car_details = [
    'name' => 'ECO DRIVE Sport',
    'title_tag' => 'ECO DRIVE Sport - Details',
    'image_url' => 'eco_friendly_sustainable_automotive_designs_03.webp', 
    'image_alt' => 'ECO DRIVE Sport Detailed View',
    'tagline' => 'Electrifying Performance. Sustainable Speed.',
    'description1' => 'Unleash pure driving excitement with the Eco Drive Sport. Engineered for performance enthusiasts, this two-seater coupe delivers instant torque, agile handling, and stunning acceleration, all powered by electricity.',
    'description2' => 'Featuring a driver-focused cockpit with premium, lightweight materials and cutting-edge performance technology, the Eco Drive Sport redefines what an electric sports car can be.',
    'specs' => [
        'Range' => 'Up to 280 miles (EPA est.)',
        'Battery' => '75 kWh Performance Lithium-ion',
        'Charging' => 'DC Fast Charging (80% in 22 mins)',
        'Seating' => '2 passengers',
        '0-60 mph' => 'Under 3.5 seconds', // Key sport spec
        'Top Speed' => '160 mph+',          // Key sport spec
        'Drivetrain' => 'Performance All-Wheel Drive (AWD)',
        'Features' => 'Carbon Fiber Accents, Sport Bucket Seats, Adaptive Suspension, Launch Control'
    ],
    'back_link_url' => 'home.php', // Link back to your main fleet page
    'back_link_text' => '← Back to Fleet'
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Title from PHP -->
    <title><?php echo htmlspecialchars($car_details['title_tag']); ?></title>
    <style>
        /* --- Base Styles (Same as SUV/Sedan) --- */
        body {
            font-family: sans-serif;
            margin: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        main {
            padding-bottom: 40px;
        }

        /* --- Header Styles (Same as SUV/Sedan) --- */
        .site-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .logo {
            font-size: 1.8em;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }
        .logo .drive-text {
            color: #28a745;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 25px;
        }
        nav a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #28a745;
        }
        .header-icons {
             display: flex;
             gap: 20px;
             font-size: 1.2em;
             color: #555;
             cursor: pointer;
        }

        /* --- Details Container Styles (Same as SUV/Sedan) --- */
        .details-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 25px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        .details-image {
            flex: 1 1 400px;
            min-width: 280px;
        }
        .details-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            display: block;
            object-fit: cover; /* Useful if images have varying aspect ratios */
        }
        .details-info {
            flex: 1 1 400px;
            min-width: 280px;
        }
        .details-info h1 {
            color: #333;
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 2.2em;
        }
         .details-info h3 {
            color: #444;
            margin-top: 25px;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .details-info p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .details-info p strong {
            color: #333;
            font-weight: 600;
        }

        /* --- Specs List Styles (Same as SUV/Sedan) --- */
        .specs-list {
            list-style: none;
            padding: 0;
            margin-top: 15px;
        }
        .specs-list li {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            color: #444;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
         .specs-list li:last-child {
            border-bottom: none;
        }
        .specs-list li strong {
            display: inline-block;
            width: 130px; /* Adjust if needed for Sport spec labels like "0-60 mph" */
            flex-shrink: 0;
            color: #333;
            font-weight: 600;
        }
         .specs-list li span { /* Target the value part */
            flex-grow: 1;
         }

        /* --- Back Link Styles (Same as SUV/Sedan) --- */
         .back-link-container {
            max-width: 900px;
            margin: 30px auto 40px auto;
            padding: 0 25px;
            box-sizing: border-box;
            text-align: center;
        }
        .back-link {
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            display: inline-block;
            padding: 8px 15px;
            border: 1px solid transparent;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .back-link:hover {
            text-decoration: none;
            background-color: #28a745;
            color: #fff;
        }

        /* --- Responsive Adjustments (Same as SUV/Sedan) --- */
        @media (max-width: 768px) {
            .details-container {
                flex-direction: column;
                margin: 20px auto;
                padding: 20px;
            }
            .details-image, .details-info {
                flex-basis: auto;
                min-width: 0;
            }
             .details-info h1 {
                font-size: 1.8em;
            }
            .site-header {
                padding: 10px 15px;
                flex-direction: column;
                gap: 10px;
            }
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }
             .back-link-container {
                 padding: 0 20px;
             }
        }
         @media (max-width: 480px) {
             .specs-list li strong {
                width: 100px; /* Further adjust label width if needed */
             }
             .logo {
                 font-size: 1.5em;
             }
         }

    </style>
</head>
<body>
    <!-- Reusable Header -->
    <header class="site-header">
         <div class="logo">ECO <span class="drive-text">DRIVE</span></div>
         <nav>
             <ul>
                 <li><a href="home.php">Home</a></li>
                 <li><a href="#">Technology</a></li>
                 <li><a href="#">Sustainability</a></li>
                 <li><a href="#">CFC</a></li>
                 <li><a href="#">Donate</a></li>
             </ul>
         </nav>
         <div class="header-icons">
             <span class="icon">👤</span>
             <span class="icon">📞</span>
         </div>
     </header>

    <main>
        <div class="details-container">
            <div class="details-image">
                <!-- Sport Image from PHP -->
                <img src="<?php echo htmlspecialchars($car_details['image_url']); ?>" alt="<?php echo htmlspecialchars($car_details['image_alt']); ?>">
            </div>
            <div class="details-info">
                <!-- Sport Name from PHP -->
                <h1><?php echo htmlspecialchars($car_details['name']); ?></h1>

                <!-- Sport Descriptions from PHP -->
                <p><strong><?php echo htmlspecialchars($car_details['tagline']); ?></strong> <?php echo htmlspecialchars($car_details['description1']); ?></p>
                <p><?php echo htmlspecialchars($car_details['description2']); ?></p>

                <h3>Key Specifications:</h3>
                <ul class="specs-list">
                    <?php
                    // Loop through the specs array from PHP
                    foreach ($car_details['specs'] as $key => $value) {
                        echo '<li>';
                        echo '<strong>' . htmlspecialchars($key) . ':</strong> ';
                        echo '<span>' . htmlspecialchars($value) . '</span>'; // Value in a span
                        echo '</li>';
                    }
                    ?>
                </ul>

            </div> <!-- End details-info -->
        </div> <!-- End details-container -->

        <!-- Back Link Container -->
        <div class="back-link-container">
             <a href="<?php echo htmlspecialchars($car_details['back_link_url']); ?>" class="back-link">
                 <?php echo htmlspecialchars($car_details['back_link_text']); ?>
             </a>
        </div>

    </main>

    <!-- Optional Footer -->
    <!--
    <footer>
        <p>© <?php echo date("Y"); ?> ECO DRIVE. All rights reserved.</p>
    </footer>
    -->

</body>
</html>