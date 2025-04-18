<?php

$car_details = [
    'name' => 'ECO DRIVE Sedan',
    'title_tag' => 'ECO DRIVE Sedan - Details',
    'image_url' => 'images/sedan_details.jpg', 
    'image_alt' => 'ECO DRIVE Sedan Detailed View',
    'tagline' => 'Luxury meets sustainability.',
    'description1' => 'Experience the perfect blend of sophisticated design, exhilarating performance, and zero-emission driving with the Eco Drive Sedan.',
    'description2' => 'Ideal for discerning commuters and families, this sedan offers a refined interior crafted with sustainable materials, cutting-edge technology, and a smooth, silent ride. Enjoy premium comfort without compromising your commitment to the environment.',
    'specs' => [
        'Range' => 'Up to 350 miles (EPA est.)',
        'Battery' => '82 kWh Lithium-ion',
        'Charging' => 'DC Fast Charging (80% in 25 mins)',
        'Seating' => '5 passengers',
        'Trunk Volume' => '15 cu ft',
        'Drivetrain' => 'Rear-Wheel Drive (RWD) / Optional AWD',
        'Features' => 'Premium Sound System, Large Touchscreen Display, Advanced Safety Suite'
    ],
    'back_link_url' => 'home.php', // Could be dynamic too
    'back_link_text' => '← Back to Fleet'
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Use PHP variable for the title -->
    <title><?php echo htmlspecialchars($car_details['title_tag']); ?></title>
    <style>
        /* --- Your CSS remains exactly the same --- */
        .details-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
            gap: 30px;
        }
        .details-image {
            flex: 1 1 400px; /* Flex properties for layout */
        }
        .details-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            display: block;
        }
        .details-info {
            flex: 1 1 400px; /* Flex properties for layout */
        }
        .details-info h1 {
            color: #333;
            margin-top: 0;
            margin-bottom: 15px;
        }
        .details-info p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .specs-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        .specs-list li {
            border-bottom: 1px solid #eee;
            padding: 8px 0;
            color: #444;
        }
        .specs-list li strong {
            display: inline-block;
            width: 120px; /* Adjust as needed */
            color: #333;
        }
        .back-link {
            display: block;
            margin-top: 30px;
            color: #28a745; /* Match your theme color */
            text-decoration: none;
            font-weight: bold;
        }
        .back-link:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .details-container {
                flex-direction: column;
                margin: 20px auto;
                padding: 15px;
            }
            .details-image, .details-info {
                flex-basis: auto;
            }
        }

        /* --- Header styles remain the same --- */
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
        }
                /* ... (all your existing CSS above here) ... */

                .back-link {
            /* display: block;  <-- REMOVE this */
            /* margin-top: 30px; <-- REMOVE this */
            color: #28a745; /* Match your theme color */
            text-decoration: none;
            font-weight: bold;
            /* Keep hover style */
        }
        .back-link:hover {
            text-decoration: underline;
        }

        /* NEW Styles for the container */
        .back-link-container {
            max-width: 900px; /* Match the details container width */
            margin: 30px auto 40px auto; /* Top margin, auto horizontal margins for centering, bottom margin */
            padding: 0 20px; /* Add some padding like the details container */
            box-sizing: border-box; /* Include padding in max-width calculation */
            text-align: center; /* Center the link text within the container */
        }
    </style>
</head>
<body>
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
                <!-- *** CHANGE THIS IMAGE PATH *** -->
                <img src="pngtree-ev-electric-car-pluged-charging-png-image_14658032.png" alt="ECO DRIVE Sedan Detailed View">
                <!-- Example path, use your actual image -->
            </div>
            <div class="details-info">
                <h1>ECO DRIVE Sedan</h1>
                <p><strong>Luxury meets sustainability.</strong> Experience the perfect blend of sophisticated design, exhilarating performance, and zero-emission driving with the Eco Drive Sedan.</p>
                <p>Ideal for discerning commuters and families, this sedan offers a refined interior crafted with sustainable materials, cutting-edge technology, and a smooth, silent ride. Enjoy premium comfort without compromising your commitment to the environment.</p>

                <h3>Key Specifications:</h3>
                <ul class="specs-list">
                    <li><strong>Range:</strong> Up to 350 miles (EPA est.)</li>
                    <li><strong>Battery:</strong> 82 kWh Lithium-ion</li>
                    <li><strong>Charging:</strong> DC Fast Charging (80% in 25 mins)</li>
                    <li><strong>Seating:</strong> 5 passengers</li>
                    <li><strong>Trunk Volume:</strong> 15 cu ft</li>
                    <li><strong>Drivetrain:</strong> Rear-Wheel Drive (RWD) / Optional AWD</li>
                    <li><strong>Features:</strong> Premium Sound System, Large Touchscreen Display, Advanced Safety Suite</li>
                </ul>
            </div>
        </div> 
        <div class="back-link-container">
            <a href="home.php" class="back-link">← Back to Fleet</a>
        </div>

    </main>

</body>
</html>