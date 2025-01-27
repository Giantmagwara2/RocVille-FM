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

session_start();

// CSRF Protection: Generate CSRF token if not set
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a new CSRF token for the session
}

// Session Timeout: Automatically log out after 30 minutes of inactivity
$timeout_duration = 1800; // 30 minutes
if (isset($_SESSION['last_activity'])) {
    $session_lifetime = time() - $_SESSION['last_activity'];
    if ($session_lifetime > $timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: login.php"); // Redirect to login page
        exit();
    }
}
$_SESSION['last_activity'] = time(); // Update the last activity time

// Logging Security Events
function logSecurityEvent($message) {
    $logfile = 'security_log.txt'; // Path to your log file
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logfile, "[$timestamp] $message\n", FILE_APPEND);
}

// Verify CSRF token for POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token.");
    }
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verify token with a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM password_resets WHERE token = ? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $reset = $result->fetch_assoc();

        // Allow password reset
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = $_POST['password'];

            // Basic password validation (you can enhance this further)
            if (strlen($new_password) < 8) {
                echo "Password must be at least 8 characters long.";
            } elseif (!preg_match("/[A-Z]/", $new_password)) {
                echo "Password must contain at least one uppercase letter.";
            } elseif (!preg_match("/[a-z]/", $new_password)) {
                echo "Password must contain at least one lowercase letter.";
            } elseif (!preg_match("/[0-9]/", $new_password)) {
                echo "Password must contain at least one number.";
            } elseif (!preg_match("/[\W_]/", $new_password)) {
                echo "Password must contain at least one special character.";
            } else {
                // Hash the new password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $user_id = $reset['user_id'];

                // Update the user's password with a prepared statement
                $update_stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
                $update_stmt->bind_param("si", $hashed_password, $user_id);
                $update_stmt->execute();

                if ($update_stmt->affected_rows > 0) {
                    // Delete the reset token after use
                    $delete_stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
                    $delete_stmt->bind_param("s", $token);
                    $delete_stmt->execute();

                    echo "Your password has been successfully reset.";
                    logSecurityEvent("Password reset successfully for user ID: $user_id");
                } else {
                    echo "There was an issue resetting your password. Please try again.";
                    logSecurityEvent("Password reset failed for user ID: $user_id");
                }
            }
        }
    } else {
        echo "Invalid or expired token.";
        logSecurityEvent("Invalid or expired reset token attempted.");
    }
}
?>

<!-- Password Reset Form -->
<form method="POST">
    <label for="password">New Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- CSRF Token -->
    <button type="submit">Reset Password</button>
</form>
