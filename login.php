<?php
// Database connection (you can change with your actual DB credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rocvillefm";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validate email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Fetch the user record from database
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Start session and store user info
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                echo "Login successful! Welcome, " . $user['name'];
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "No user found with that email.";
        }
    } else {
        echo "Please enter a valid email address.";
    }
}

$conn->close();
?>
