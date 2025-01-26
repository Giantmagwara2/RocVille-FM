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
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Validate email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if user already exists
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            echo "User with this email already exists.";
        } else {
            // Insert the new user into the database
            $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
            if ($conn->query($insert_query) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } else {
        echo "Please enter a valid email address.";
    }
}

$conn->close();
?>
