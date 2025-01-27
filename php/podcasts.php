<?php include('session_check.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Podcasts | RocVille FM">
    <meta property="og:description" content="Catch up on all our podcasts and enjoy exclusive interviews, stories, and more.">
    <meta property="og:image" content="images/social-media-thumbnail.jpg">
    <meta property="og:url" content="https://rocvillefm.com/podcasts.html">
    <title>RocVille FM - Podcasts</title>
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
        <li><a href="podcasts.html" class="active">Podcasts</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="advertising.html">Advertising</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="schedule.html">Schedule</a></li>
        <!-- Added Login and Register links -->
        <li><a href="login.html">Login</a></li>
        <li><a href="register.html">Register</a></li>
    </ul>
</nav>

<section class="hero-section">
    <h2>Exclusive Podcasts</h2>
    <p>Catch up on all the latest podcasts featuring interviews, music reviews, and more!</p>
</section>

<section class="content-section">
    <h3 class="section-title">Latest Episodes</h3>
    <p class="section-description">Listen to our most recent podcasts and stay up-to-date with RocVille FM.</p>
    
    <div class="podcast-grid">
        <div class="podcast-card">
            <h4>Episode 1: Music Mania</h4>
            <p>A deep dive into the latest music trends, reviews, and interviews with top artists.</p>
            <a href="podcast-1.html" class="podcast-link">Listen Now</a>
        </div>
        <div class="podcast-card">
            <h4>Episode 2: The Talk Show</h4>
            <p>Join us as we discuss trending topics and current events with expert guests.</p>
            <a href="podcast-2.html" class="podcast-link">Listen Now</a>
        </div>
        <div class="podcast-card">
            <h4>Episode 3: Behind the Scenes</h4>
            <p>Get an exclusive peek behind the curtain of RocVille FM's production process.</p>
            <a href="podcast-3.html" class="podcast-link">Listen Now</a>
        </div>
    </div>
</section>

<section class="content-section">
    <h3 class="section-title">Popular Shows</h3>
    <p class="section-description">Explore our most popular podcast series.</p>
    
    <div class="podcast-grid">
        <div class="podcast-card">
            <h4>Show 1: The Morning Buzz</h4>
            <p>Your daily dose of news, entertainment, and interviews to start your day.</p>
            <a href="show-1.html" class="podcast-link">Listen Now</a>
        </div>
        <div class="podcast-card">
            <h4>Show 2: Deep Dive Discussions</h4>
            <p>In-depth conversations on current affairs and trending topics.</p>
            <a href="show-2.html" class="podcast-link">Listen Now</a>
        </div>
        <div class="podcast-card">
            <h4>Show 3: Artist Spotlight</h4>
            <p>Interviews with emerging and established artists from various genres.</p>
            <a href="show-3.html" class="podcast-link">Listen Now</a>
        </div>
    </div>
</section>

<section class="content-section">
    <h3 class="section-title">Subscribe to Our Newsletter</h3>
    <p class="section-description">Stay updated with the latest episodes and news from RocVille FM.</p>
    <form action="subscribe.php" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Subscribe</button>
    </form>
</section>

<footer>
    <p>&copy; 2025 RocVille FM. All rights reserved. | <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms & Conditions</a></p>
</footer>

</body>
</html>
