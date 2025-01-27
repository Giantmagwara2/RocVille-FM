<?php 
// session_check.php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Live Radio | RocVille FM">
    <meta property="og:description" content="RocVille FM brings you the best music, talk shows, and live radio entertainment!">
    <meta property="og:image" content="images/social-media-thumbnail.jpg">
    <meta property="og:url" content="https://rocvillefm.com/live-radio.html">
    <title>Live Radio - RocVille FM</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="scripts.js"></script>
    <!-- Font Awesome for social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <li><a href="live-radio.html" class="active">Live Radio</a></li>
        <li><a href="podcasts.html">Podcasts</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="advertising.html">Advertising</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="schedule.html">Schedule</a></li>
        <li><a href="login.html">Login</a></li> <!-- Added Login link -->
        <li><a href="register.html">Register</a></li> <!-- Added Register link -->
    </ul>
</nav>

<section class="hero-section">
    <h2>Now Playing</h2>
    <p>Listen to the latest hits and shows live, streaming 24/7 on RocVille FM!</p>
</section>

<section class="content-section">
    <h3 class="section-title">Join the Fun</h3>
    <p class="section-description">Tune in to our live radio station, catch up with podcasts, and stay connected with us!</p>
</section>

<!-- Live Radio Streaming Section -->
<section class="live-radio">
    <h3 class="section-title">Live Radio Streaming</h3>
    <p class="section-description">Listen to our live broadcast and enjoy non-stop music, talk shows, and entertainment!</p>
    <div class="audio-player">
        <audio controls>
            <source src="stream-url.mp3" type="audio/mp3">
            <!-- Add actual streaming URL -->
        </audio>
    </div>
    <div class="show-details">
        <h4>Current Show: Morning Vibes</h4>
        <p>Start your day with uplifting music and inspiring stories.</p>
        <a href="#">Listen to Archived Recordings</a>
    </div>
</section>

<!-- Follow Us on Social Media -->
<section class="social-media">
    <h3 class="section-title">Follow Us on Social Media</h3>
    <p class="section-description">Stay updated with the latest news and shows from RocVille FM!</p>
    <div class="social-icons">
        <a href="#" class="social-link"><i class="fab fa-facebook-square"></i></a>
        <a href="#" class="social-link"><i class="fab fa-twitter-square"></i></a>
        <a href="#" class="social-link"><i class="fab fa-instagram-square"></i></a>
        <a href="#" class="social-link"><i class="fab fa-youtube-square"></i></a>
    </div>
</section>

<!-- Featured Shows -->
<section class="featured-shows">
    <h3 class="section-title">Featured Shows</h3>
    <div class="show-cards">
        <div class="show-card">
            <h4>Morning Vibes</h4>
            <p>Start your day with uplifting music and inspiring stories.</p>
            <a href="#" class="button">Listen Now</a>
        </div>
        <div class="show-card">
            <h4>Evening Grooves</h4>
            <p>Relax with smooth tracks and late-night talk shows.</p>
            <a href="#" class="button">Listen Now</a>
        </div>
        <div class="show-card">
            <h4>Weekend Special</h4>
            <p>Catch exclusive interviews and top hits every weekend!</p>
            <a href="#" class="button">Listen Now</a>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="contact-form">
    <h3 class="section-title">Get in Touch</h3>
    <p class="section-description">Have a question or suggestion? Send us a message using the form below.</p>
    <form>
        <input type="text" placeholder="Name" required>
        <input type="email" placeholder="Email" required>
        <textarea placeholder="Message" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</section>

<footer>
    <p>&copy; 2025 RocVille FM. All rights reserved. | <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms & Conditions</a></p>
</footer>

<style>
    /* Social Media Section */
    .social-media .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 10px;
    }

    .social-link {
        color: #0099FF;
        font-size: 2em;
        transition: transform 0.3s ease;
    }

    .social-link:hover {
        transform: scale(1.2);
        color: #EB3C7C;
    }

    /* Featured Shows Section */
    .featured-shows {
        background-color: #f8f8f8;
        padding: 20px;
        border-radius: 10px;
        margin: 20px 0;
    }

    .show-cards {
        display: flex;
        justify-content: space-around;
        gap: 20px;
    }

    .show-card {
        background-color: #0099FF;
        color: white;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        flex: 1;
    }

    .show-card h4 {
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .show-card p {
        font-size: 1em;
    }
</style>

</body>
</html>
