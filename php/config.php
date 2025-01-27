<?php
// Database configuration with improved security and error handling
$host = 'localhost';
$dbname = 'rocville_fm';
$username = 'root';
$password = '';

try {
    // Use PDO with secure attributes for better performance and security
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Set the PDO error mode to exceptions for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set the default fetch mode to associative arrays for easier access
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Set the character set to utf8mb4 for better support of special characters
    $pdo->exec("SET NAMES utf8mb4");

    // Set session settings for improved security
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Regenerate session ID to prevent session fixation attacks
    session_regenerate_id(true);

    // Implement session timeout (15 minutes)
    $timeout_duration = 900; // 15 minutes in seconds
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
        // If session expired, clear it and redirect to login
        session_unset();
        session_destroy();
        header("Location: login.php?error=Session expired. Please log in again.");
        exit();
    }
    $_SESSION['last_activity'] = time(); // Update last activity time
    
} catch (PDOException $e) {
    // Catch and display the error message if the connection fails
    die("Database connection failed: " . $e->getMessage());
}
?>
