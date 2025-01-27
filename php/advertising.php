<?php
// Include session check to ensure the user is authorized to view this page
include('session_check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Advertising | RocVille FM">
    <meta property="og:description" content="Advertise with RocVille FM to reach a dynamic and engaged audience.">
    <meta property="og:image" content="images/social-media-thumbnail.jpg">
    <meta property="og:url" content="https://rocvillefm.com/advertising.html">
    <title>RocVille FM - Advertising</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="scripts.js"></script>
</head>
<body>

<header>
    <div class="logo-container">
        <a href="/" class="logo-link">
            <img src="images/logo.png" alt="RocVille FM Logo" class="logo">
        </a>
        <h1>RocVille FM</h1>
    </div>
</header>

<nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="live-radio.html">Live Radio</a></li>
        <li><a href="podcasts.html">Podcasts</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="advertising.html" class="active">Advertising</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="schedule.html">Schedule</a></li>
        <!-- New links for login and register pages -->
        <li><a href="login.html">Login</a></li>
        <li><a href="register.html">Register</a></li>
    </ul>
</nav>

<section class="hero-section" style="padding: 40px;">
    <h2>Advertise with RocVille FM</h2>
    <p>Reach our vibrant audience by advertising with us and take your brand to the next level.</p>
</section>

<section class="content-section" style="padding: 40px;">
    <h3 class="section-title">Why Advertise with Us?</h3>
    <p class="section-description">RocVille FM offers a wide range of advertising opportunities that can help your brand stand out. With our extensive audience base and engaging content, your business will benefit from maximum exposure.</p>
    
    <ul>
        <li>Targeted audience engagement</li>
        <li>Customized advertising packages</li>
        <li>Exclusive promotional opportunities</li>
    </ul>

    <h3 class="section-title">Audience Insights</h3>
    <p class="section-description">Our audience is highly engaged and diverse, including young professionals, families, and music lovers. With RocVille FM, your brand will reach the right people at the right time.</p>

    <h3 class="section-title">Customized Advertising Packages</h3>
    <p class="section-description">We offer tailored advertising packages designed to meet your business needs, whether you want on-air spots, podcast ads, or digital content opportunities.</p>

    <h3 class="section-title">Success Stories</h3>
    <p class="section-description">Explore some of our past advertising partnerships and see how we helped brands achieve their marketing goals.</p>
    <ul>
        <li><strong>Brand X</strong> increased customer engagement by 40% through targeted ads.</li>
        <li><strong>Company Y</strong> saw a 50% increase in online traffic after running a podcast ad campaign.</li>
    </ul>

    <h3 class="section-title">Get in Touch</h3>
    <p class="section-description">Ready to get started? Contact us now to learn more about our advertising options and find the perfect package for your brand!</p>
    
    <!-- Advertising Inquiry Form -->
    <form action="advertising-form.php" method="POST" class="advertising-form">
        <label for="companyName">Company Name:</label>
        <input type="text" name="companyName" id="companyName" placeholder="Your Company Name" required>

        <label for="contactPerson">Contact Person:</label>
        <input type="text" name="contactPerson" id="contactPerson" placeholder="Contact Person" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Your Email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone" placeholder="Phone Number" required>

        <label for="message">Your Inquiry:</label>
        <textarea name="message" id="message" placeholder="Your Inquiry" required></textarea>

        <button type="submit">Submit Inquiry</button>
    </form>

</section>

<footer>
    <p>&copy; 2025 RocVille FM. All rights reserved. | <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms & Conditions</a></p>
</footer>

</body>
</html>
