<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize the email from the form submission
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the sanitized email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Database connection (update with your actual database credentials)
        $servername = "localhost";
        $username = "root"; // your username
        $password = ""; // your password
        $dbname = "rocvillefm"; // your database name
        
        // Create database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind the SQL statement (using prepared statements for security)
        $stmt = $conn->prepare("INSERT INTO newsletter_subscriptions (email) VALUES (?)");
        $stmt->bind_param("s", $email); // "s" denotes the parameter type as string

        // Execute the statement
        if ($stmt->execute()) {
            // Send a confirmation email to the subscriber
            $subject = "Subscription Confirmation";
            $message = "Thank you for subscribing to RocVille FM's newsletter!";
            $headers = "From: no-reply@rocvillefm.com";
            mail($email, $subject, $message, $headers);

            // Provide success message
            echo "Thank you for subscribing! Check your email for confirmation.";
        } else {
            echo "Error: There was an issue with your subscription. Please try again later.";
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Please enter a valid email address.";
    }
}
?>
