<?php include('session_check.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Home | RocVille FM">
    <meta property="og:description" content="RocVille FM brings you the best music, talk shows, and live radio entertainment!">
    <meta property="og:image" content="images/social-media-thumbnail.jpg">
    <meta property="og:url" content="https://rocvillefm.com/index.html">
    <title>Home - RocVille FM</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="scripts.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<header>
    <div class="logo-container">
        <a href="index.php" class="logo-link">
            <img src="images/logo.png" alt="RocVille FM Logo" class="logo">
        </a>
        <h1>RocVille FM</h1>
    </div>
</header>

<nav>
    <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="live-radio.php">Live Radio</a></li>
        <li><a href="podcasts.php">Podcasts</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="advertising.php">Advertising</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="schedule.php">Schedule</a></li>
        <!-- New Links to Register and Login Pages -->
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</nav>

<section class="hero-section">
    <h2>Welcome to RocVille FM</h2>
    <p>Stream your favorite shows 24/7 and experience the best in music, talk, and entertainment!</p>
</section>

<section class="live-radio-player">
    <h3 class="section-title">Listen Live</h3>
    <p class="section-description">Click below to start streaming RocVille FM live!</p>
    <a href="https://streaminglink.com" class="button">Start Listening</a>
</section>

<section class="show-schedule">
    <h3 class="section-title">Today's Schedule</h3>
    <ul>
        <li><strong>06:00 - 09:00:</strong> Morning Vibes with DJ Mike</li>
        <li><strong>09:00 - 12:00:</strong> Mid-Morning Melodies with Sarah K</li>
        <li><strong>12:00 - 15:00:</strong> Afternoon Groove with DJ Alex</li>
        <li><strong>15:00 - 18:00:</strong> Drive Time Hits with Lisa M</li>
        <li><strong>18:00 - 21:00:</strong> Evening Chill with DJ Sam</li>
    </ul>
</section>

<!-- New Dynamic News and Updates Section -->
<section class="news-updates">
    <h3 class="section-title">Latest News and Updates</h3>
    <ul>
        <li><a href="#">New Show Coming Soon: The Weekend Vibe</a></li>
        <li><a href="#">Join Us for a Live Broadcast from the Annual Music Festival!</a></li>
        <li><a href="#">Exciting Changes to Our Show Schedule - Check Out What's New!</a></li>
    </ul>
</section>

<!-- New Presenter Profiles Section -->
<section class="presenters">
    <h3 class="section-title">Meet Our Presenters</h3>
    <div class="presenter-card">
        <img src="images/host-dj-mike.jpg" alt="DJ Mike">
        <p><strong>DJ Mike</strong> - Morning Vibes</p>
        <p>Get to know DJ Mike, the voice behind your favorite morning show!</p>
    </div>
    <div class="presenter-card">
        <img src="images/host-sarah-k.jpg" alt="Sarah K">
        <p><strong>Sarah K</strong> - Mid-Morning Melodies</p>
        <p>Join Sarah for the best melodies to start your day!</p>
    </div>
    <div class="presenter-card">
        <img src="images/host-alex.jpg" alt="DJ Alex">
        <p><strong>DJ Alex</strong> - Afternoon Groove</p>
        <p>Feel the groove with DJ Alex every afternoon!</p>
    </div>
</section>

<section class="music-charts">
    <h3 class="section-title">Top Music Charts</h3>
    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Song</th>
                <th>Artist</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Hit Song 1</td>
                <td>Artist A</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Hit Song 2</td>
                <td>Artist B</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Hit Song 3</td>
                <td>Artist C</td>
            </tr>
        </tbody>
    </table>
</section>

<!-- New Event Calendar Section -->
<section class="events">
    <h3 class="section-title">Upcoming Events</h3>
    <p>Check out the latest events happening at RocVille FM!</p>
    <ul>
        <li>Live Music Festival - January 30</li>
        <li>DJ Contest - February 5</li>
        <li>Charity Auction - February 20</li>
    </ul>
</section>

<section class="newsletter">
    <h3 class="section-title">Stay Updated</h3>
    <p class="section-description">Sign up for our newsletter and never miss out on new shows, events, and updates!</p>
    <form>
        <input type="email" placeholder="Enter your email" required>
        <button type="submit">Subscribe</button>
    </form>
</section>

<footer>
    <div class="social-media">
        <h3>Follow Us</h3>
        <a href="https://facebook.com/RocVilleFM" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/RocVilleFM" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://instagram.com/RocVilleFM" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
</footer>

</body>
</html>