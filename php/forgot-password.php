<?php
// Start the session
session_start();

// Set session timeout in seconds (e.g., 30 minutes)
$timeout_duration = 1800; // 30 minutes

// CSRF protection: Check if CSRF token is valid
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token.");
    }
}

// Generate CSRF token if not already set in session
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a new CSRF token
}

// Database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rocvillefm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        // Check if email exists
        $query = "SELECT id, name, email_verified FROM users WHERE email='$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if ($user['email_verified'] == 0) {
                $error = "Please verify your email before requesting a password reset.";
            } else {
                // Generate token
                $token = bin2hex(random_bytes(16));
                $hashed_token = password_hash($token, PASSWORD_BCRYPT);
                $token_expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

                // Invalidate previous tokens
                $delete_query = "DELETE FROM password_resets WHERE user_id = '{$user['id']}'";
                $conn->query($delete_query);

                // Store new token
                $token_query = "INSERT INTO password_resets (user_id, token, token_expiry) VALUES ('{$user['id']}', '$hashed_token', '$token_expiry')";
                $conn->query($token_query);

                // Send reset email (use PHPMailer in production)
                $reset_link = "https://yourdomain.com/reset-password.php?token=$token";
                mail($email, "Password Reset Request", "
                    <html>
                    <head>
                        <title>Password Reset Request</title>
                    </head>
                    <body>
                        <p>Hi {$user['name']},</p>
                        <p>We received a request to reset your password at RocVille FM.</p>
                        <p>Click the link below to reset your password:</p>
                        <p><a href=\"$reset_link\">Reset Your Password</a></p>
                        <p>If you did not request this, please ignore this email.</p>
                        <p>Best regards,</p>
                        <p>The RocVille FM Team</p>
                    </body>
                    </html>
                ", "Content-Type: text/html; charset=UTF-8");

                $success_message = "If the email exists and is verified, a password reset link has been sent.";
            }
        } else {
            $success_message = "If the email exists and is verified, a password reset link has been sent."; // Prevent revealing valid emails
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | RocVille FM</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Forgot Password</h2>
    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    <?php if (isset($success_message)) { echo "<p class='success'>$success_message</p>"; } ?>
    <form method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Send Reset Link</button>
    </form>
</body>
</html>
