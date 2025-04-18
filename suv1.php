<?php

$car_details = [
    'name' => 'ECO DRIVE SUV',
    'title_tag' => 'ECO DRIVE SUV - Details',
    'image_url' => 'istockphoto-1340519926-612x612.jpg', 
    'image_alt' => 'ECO DRIVE SUV Detailed View',
    'tagline' => 'Adventure meets efficiency.',
    'description1' => 'Explore further with the versatile and spacious Eco Drive SUV. Designed for families and adventurers alike, it combines rugged capability with sustainable electric power.',
    'description2' => 'Offering ample seating, generous cargo space, and optional all-wheel drive, the Eco Drive SUV is ready for any journey, from daily commutes to weekend getaways, all with zero emissions.',
    'specs' => [
        'Range' => 'Up to 320 miles (EPA est.)',
        'Battery' => '90 kWh Lithium-ion',
        'Charging' => 'DC Fast Charging (80% in 30 mins)',
        'Seating' => 'Up to 7 passengers (optional 3rd row)',
        'Cargo Volume' => '35 cu ft (behind 2nd row) / 75 cu ft (max)',
        'Drivetrain' => 'All-Wheel Drive (AWD)',
        'Features' => 'Panoramic Sunroof, Tow Hitch Compatible, Advanced Off-Road Modes, Premium Audio'
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
        /* --- Base Styles --- */
        body {
            font-family: sans-serif;
            margin: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        main {
            padding-bottom: 40px; /* Add some space at the bottom */
        }

        /* --- Header Styles (Same as Sedan) --- */
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
            text-decoration: none; /* If the logo is a link */
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
             cursor: pointer; /* Indicate icons might be interactive */
        }

        /* --- Details Container Styles (Same as Sedan) --- */
        .details-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 25px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
            gap: 30px;
        }
        .details-image {
            flex: 1 1 400px; /* Flex properties for layout */
            min-width: 280px; /* Prevent image from getting too small */
        }
        .details-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            display: block;
        }
        .details-info {
            flex: 1 1 400px; /* Flex properties for layout */
            min-width: 280px; /* Prevent text from getting too squished */
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
        .details-info p strong { /* Style the tagline */
            color: #333;
            font-weight: 600;
        }

        /* --- Specs List Styles (Same as Sedan) --- */
        .specs-list {
            list-style: none;
            padding: 0;
            margin-top: 15px;
        }
        .specs-list li {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            color: #444;
            display: flex; /* Use flex for better alignment */
            flex-wrap: wrap; /* Allow value to wrap if needed */
            gap: 10px; /* Gap between label and value */
        }
         .specs-list li:last-child {
            border-bottom: none; /* Remove border from last item */
        }
        .specs-list li strong {
            display: inline-block;
            width: 130px; /* Adjust width as needed for SUV specs */
            flex-shrink: 0; /* Prevent label from shrinking */
            color: #333;
            font-weight: 600;
        }

        /* --- Back Link Styles (Same as Sedan) --- */
         .back-link-container {
            max-width: 900px; /* Match the details container width */
            margin: 30px auto 40px auto; /* Top margin, auto horizontal margins for centering, bottom margin */
            padding: 0 25px; /* Match details container padding */
            box-sizing: border-box; /* Include padding in max-width calculation */
            text-align: center; /* Center the link text within the container */
        }
        .back-link {
            color: #28a745; /* Match your theme color */
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            display: inline-block; /* Allows padding/margin */
            padding: 8px 15px;
            border: 1px solid transparent; /* Placeholder for potential hover effect */
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .back-link:hover {
            text-decoration: none; /* Remove underline on hover if using background */
            background-color: #28a745;
            color: #fff;
        }


        /* --- Responsive Adjustments (Same as Sedan) --- */
        @media (max-width: 768px) {
            .details-container {
                flex-direction: column;
                margin: 20px auto;
                padding: 20px;
            }
            .details-image, .details-info {
                flex-basis: auto; /* Override flex-basis */
                min-width: 0; /* Reset min-width */
            }
             .details-info h1 {
                font-size: 1.8em;
            }
            .site-header {
                padding: 10px 15px;
                flex-direction: column; /* Stack header items */
                gap: 10px;
            }
            nav ul {
                flex-wrap: wrap; /* Allow nav items to wrap */
                justify-content: center;
                gap: 15px;
            }
             .back-link-container {
                 padding: 0 20px;
             }
        }
         @media (max-width: 480px) {
             .specs-list li strong {
                width: 100px; /* Adjust label width for smaller screens */
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
                 <!-- Update hrefs as needed -->
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
                <!-- SUV Image from PHP -->
                <img src="<?php echo htmlspecialchars($car_details['image_url']); ?>" alt="<?php echo htmlspecialchars($car_details['image_alt']); ?>">
            </div>
            <div class="details-info">
                <!-- SUV Name from PHP -->
                <h1><?php echo htmlspecialchars($car_details['name']); ?></h1>

                <!-- SUV Descriptions from PHP -->
                <p><strong><?php echo htmlspecialchars($car_details['tagline']); ?></strong> <?php echo htmlspecialchars($car_details['description1']); ?></p>
                <p><?php echo htmlspecialchars($car_details['description2']); ?></p>

                <h3>Key Specifications:</h3>
                <ul class="specs-list">
                    <?php
                    // Loop through the specs array from PHP
                    foreach ($car_details['specs'] as $key => $value) {
                        echo '<li>';
                        echo '<strong>' . htmlspecialchars($key) . ':</strong> ';
                        // Use span for value for potential future styling
                        echo '<span>' . htmlspecialchars($value) . '</span>';
                        echo '</li>';
                    }
                    ?>
                </ul>

            </div> <!-- End details-info -->
        </div> <!-- End details-container -->

        <!-- Back Link Container (outside details) -->
        <div class="back-link-container">
             <a href="<?php echo htmlspecialchars($car_details['back_link_url']); ?>" class="back-link">
                 <?php echo htmlspecialchars($car_details['back_link_text']); ?>
             </a>
        </div>

    </main>

    <!-- Optional: Add a footer here -->
    <!--
    <footer>
        <p>© <?php echo date("Y"); ?> ECO DRIVE. All rights reserved.</p>
    </footer>
    -->

</body>
</html>