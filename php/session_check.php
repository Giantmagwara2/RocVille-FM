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

// Check if the session variable exists and if the timeout has passed
if (isset($_SESSION['user_id'])) {
    // Check if the session was started more than $timeout_duration seconds ago
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
        // If the session has timed out, destroy it and redirect to login
        session_unset();
        session_destroy();
        header("Location: login.php?error=Session expired. Please log in again.");
        exit();
    } else {
        // Update last activity time to the current time
        $_SESSION['last_activity'] = time();
    }
} else {
    // If no session exists, redirect to the login page
    header("Location: login.php?error=You must be logged in to access this page.");
    exit();
}
?>
