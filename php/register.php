<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rocvillefm";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Error handling
    $errors = [];
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "All fields are required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }
    if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $errors[] = "Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, a number, and a special character.";
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errors[] = "An account with this email already exists.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $verification_token = bin2hex(random_bytes(32)); // Generate a unique verification token

            // Insert user into the database
            $stmt = $conn->prepare("INSERT INTO users (name, email, password_hash, verification_token, is_verified) VALUES (?, ?, ?, ?, ?)");
            $is_verified = 0; // User is not verified initially
            $stmt->bind_param("ssssi", $name, $email, $hashed_password, $verification_token, $is_verified);
            if ($stmt->execute()) {
                // Send verification email
                $verification_url = "http://yourdomain.com/verify.php?token=" . $verification_token;
                $subject = "Verify Your Email - RocVille FM";
                $message = "Hi $name,\n\nThank you for registering at RocVille FM! Please verify your email address by clicking the link below:\n\n$verification_url\n\nIf you did not create this account, please ignore this email.\n\nBest regards,\nRocVille FM Team";
                $headers = "From: no-reply@rocvillefm.com";

                if (mail($email, $subject, $message, $headers)) {
                    header("Location: login.php?message=Registration successful. Please check your email to verify your account.");
                    exit();
                } else {
                    $errors[] = "Failed to send verification email. Please try again later.";
                }
            } else {
                $errors[] = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="User Registration | RocVille FM">
    <meta property="og:description" content="Join RocVille FM and stay connected with the best music and entertainment!">
    <meta property="og:image" content="images/social-media-thumbnail.jpg">
    <meta property="og:url" content="https://rocvillefm.com/register.php">
    <title>User Registration | RocVille FM</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="scripts.js"></script>
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="index.html" class="logo-link">
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
            <li><a href="advertising.html">Advertising</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="schedule.html">Schedule</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Register</h2>
        <?php
        if (!empty($errors)) {
            echo "<div class='error'><ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul></div>";
        }
        ?>
        <form action="register.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Register</button>
        </form>
    </div>

    <footer>
        <div class="social-media">
            <h3>Follow Us</h3>
            <ul>
                <li><a href="https://www.facebook.com/RocVilleFM" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/RocVilleFM" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/RocVilleFM" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <p>&copy; 2025 RocVille FM. All rights reserved.</p>
    </footer>
</body>
</html>
