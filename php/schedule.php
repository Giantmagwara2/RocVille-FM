<?php
    // Include session check to ensure the user is authorized to view this page
    include('session_check.php');
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Schedule | RocVille FM">
    <meta property="og:description" content="Stay up-to-date with the latest show schedules and live programming at RocVille FM.">
    <meta property="og:image" content="images/social-media-thumbnail.jpg">
    <meta property="og:url" content="https://rocvillefm.com/schedule.php">
    <title>RocVille FM - Schedule</title>
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
        <li><a href="index.php">Home</a></li>
        <li><a href="live-radio.php">Live Radio</a></li>
        <li><a href="podcasts.php">Podcasts</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="advertising.php">Advertising</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="schedule.php" class="active">Schedule</a></li>
        <!-- New links for login and register pages -->
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>
</nav>

<section class="hero-section" style="padding: 40px;">
    <h2>Show Schedule</h2>
    <p>Check out our live programming schedule and never miss your favorite shows!</p>
</section>

<section class="content-section" style="padding: 40px;">
    <h3 class="section-title">Daily Programming</h3>
    <p class="section-description">Our programming is packed with exciting shows every day. Here's what you can expect:</p>
    
    <table class="schedule-table">
        <thead>
            <tr>
                <th>Time</th>
                <th>Show</th>
                <th>Host</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>8:00 AM</td>
                <td>Morning Jam</td>
                <td>DJ Mike</td>
            </tr>
            <tr>
                <td>12:00 PM</td>
                <td>The Talk Show</td>
                <td>Sarah Lee</td>
            </tr>
            <tr>
                <td>3:00 PM</td>
                <td>Afternoon Beats</td>
                <td>DJ K</td>
            </tr>
        </tbody>
    </table>
</section>

<footer>
    <p>&copy; 2025 RocVille FM. All rights reserved. | <a href="privacy-policy.php">Privacy Policy</a> | <a href="terms-conditions.php">Terms & Conditions</a></p>
</footer>

</body>
</html>
