<?php
// Start the session
session_start();

// Session timeout check
$timeout_duration = 900; // 15 minutes in seconds
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    // Session expired, log the user out
    session_unset();
    session_destroy();
    header("Location: login.php?error=Session expired. Please log in again.");
    exit();
}

// Log user out (clear session data)
session_unset();
session_destroy();

// Redirect to the login page after logout
header("Location: login.php");
exit();
?>
