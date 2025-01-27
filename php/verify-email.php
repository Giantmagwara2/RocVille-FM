<?php
require 'config.php';
session_start();

// CSRF protection: Check if CSRF token is valid and match it with session token
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET['csrf_token']) || $_GET['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token.");
    }
}

// Generate CSRF token if not already set in session
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a new CSRF token for the session
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Prepare SQL statement to check if the token exists and is not expired
    $stmt = $pdo->prepare("SELECT id, verification_token, token_expiry FROM users WHERE verification_token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Check if the token is expired
        $current_time = new DateTime();
        $expiry_time = new DateTime($user['token_expiry']);
        
        if ($current_time > $expiry_time) {
            echo "The verification token has expired. Please request a new verification link.";
        } else {
            // Update email verification status and clear the token and expiration time
            $update_stmt = $pdo->prepare("UPDATE users SET email_verified = 1, verification_token = NULL, token_expiry = NULL WHERE id = ?");
            $update_stmt->execute([$user['id']]);

            if ($update_stmt->rowCount() > 0) {
                echo "Email verified successfully!";
            } else {
                echo "There was an issue verifying your email. Please try again.";
            }
        }
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "No verification token provided.";
}

// Regenerate CSRF token to protect the page after processing the request
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>
