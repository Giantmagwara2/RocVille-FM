<?php include('session_check.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Contact | RocVille FM">
    <meta property="og:description" content="Get in touch with RocVille FM for any inquiries, support, or feedback.">
    <meta property="og:image" content="images/social-media-thumbnail.jpg">
    <meta property="og:url" content="https://rocvillefm.com/contact.php">
    <title>RocVille FM - Contact</title>
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
        <li><a href="contact.php" class="active">Contact</a></li>
        <li><a href="advertising.php">Advertising</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="schedule.php">Schedule</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>
</nav>

<section class="hero-section container">
    <h2>Contact Us</h2>
    <p>We'd love to hear from you! Get in touch with us for support, feedback, or inquiries.</p>
</section>

<section class="content-section container">
    <h3 class="section-title">Get in Touch</h3>
    <p class="section-description">Fill out the form below and we'll get back to you as soon as possible.</p>
    
    <!-- Contact Form -->
    <form id="contactForm" action="process-contact-form.php" method="post">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" required placeholder="Enter your name">
        
        <label for="email">Your Email</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">
        
        <label for="message">Your Message</label>
        <textarea id="message" name="message" rows="4" required placeholder="Enter your message"></textarea>
        
        <button type="submit">Send Message</button>
    </form>

    <!-- Success/Error Feedback Message (Optional) -->
    <div id="formFeedback" class="success-message" style="display:none;">
        <p>Your message has been sent successfully!</p>
    </div>
    <div id="formFeedbackError" class="error-message" style="display:none;">
        <p>There was an error sending your message. Please try again later.</p>
    </div>
</section>

<section class="contact-details container">
    <h3>Contact Information</h3>
    <div class="table-container">
        <table>
            <caption>Contact Details</caption>
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>General Inquiries</td>
                    <td><a href="mailto:info@rocvillefm.com">info@rocvillefm.com</a></td>
                    <td>(123) 456-7890</td>
                </tr>
                <tr>
                    <td>Advertising</td>
                    <td><a href="mailto:ads@rocvillefm.com">ads@rocvillefm.com</a></td>
                    <td>(123) 555-7890</td>
                </tr>
                <tr>
                    <td>Support</td>
                    <td><a href="mailto:support@rocvillefm.com">support@rocvillefm.com</a></td>
                    <td>(123) 666-7890</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<footer class="container">
    <p>&copy; 2025 RocVille FM. All rights reserved. | <a href="privacy-policy.php">Privacy Policy</a> | <a href="terms-conditions.php">Terms & Conditions</a></p>
</footer>

</body>
</html>
