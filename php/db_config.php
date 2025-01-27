<?php
// Database configuration
define('DB_SERVER', 'localhost'); // Database server
define('DB_USERNAME', 'root');    // Database username
define('DB_PASSWORD', '');        // Database password
define('DB_NAME', 'rocvillefm');  // Database name

// Create a connection
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn === false) {
    die("ERROR: Could not connect to the database. " . mysqli_connect_error());
}
?>
