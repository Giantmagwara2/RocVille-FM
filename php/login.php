<?php
// Database connection (replace with your actual DB credentials)
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

// Session timeout: 15 minutes of inactivity
$timeout_duration = 900; // 15 minutes in seconds
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php?error=Session expired. Please log in again.");
    exit();
}
$_SESSION['last_activity'] = time(); // Update last activity time

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validate email format
    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, password_hash, failed_attempts, last_failed, is_verified FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Check if account is locked
            if ($user['failed_attempts'] >= 5 && time() - strtotime($user['last_failed']) < 300) {
                $error = "Too many failed login attempts. Please try again after 5 minutes.";
            } elseif ($user['is_verified'] == 0) {
                // Check if email is verified
                $error = "Your account is not verified. Please verify your email first.";
            } else {
                // Verify the password
                if (password_verify($password, $user['password_hash'])) {
                    // Reset failed attempts on successful login
                    $reset_stmt = $conn->prepare("UPDATE users SET failed_attempts = 0 WHERE email = ?");
                    $reset_stmt->bind_param("s", $email);
                    $reset_stmt->execute();

                    // Log user login activity
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                    $login_time = date("Y-m-d H:i:s");
                    $log_stmt = $conn->prepare("INSERT INTO user_activity (user_id, activity, ip_address, activity_time) VALUES (?, 'login', ?, ?)");
                    $log_stmt->bind_param("iss", $user['id'], $ip_address, $login_time);
                    $log_stmt->execute();

                    // Regenerate session ID to prevent session fixation attacks
                    session_regenerate_id(true);

                    // Store user information in session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $email; // User's email as session name
                    $_SESSION['last_activity'] = time();

                    // Redirect to the desired page or homepage
                    $redirect_url = $_SESSION['redirect_url'] ?? 'index.html';
                    header("Location: $redirect_url");
                    exit();
                } else {
                    // Increment failed attempts
                    $failed_attempts = $user['failed_attempts'] + 1;
                    $last_failed = date("Y-m-d H:i:s");
                    $update_stmt = $conn->prepare("UPDATE users SET failed_attempts = ?, last_failed = ? WHERE email = ?");
                    $update_stmt->bind_param("iss", $failed_attempts, $last_failed, $email);
                    $update_stmt->execute();

                    $error = "Incorrect password.";
                }
            }
        } else {
            $error = "No user found with that email.";
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
    <title>Login | RocVille FM</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>
