<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize user input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Basic validation
    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)) {
        
        // Send the email to the admin
        $to = "admin@rocvillefm.com"; // Admin email address
        $subject = "New Contact Form Message from $name";
        $body = "You have received a new message from the contact form:\n\n".
                "Name: $name\n".
                "Email: $email\n".
                "Message: \n$message";
        
        // Ensure proper formatting of the email headers to prevent issues with email spoofing
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Use PHP's mail function to send the message
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for your message! We will get back to you soon.";
        } else {
            echo "There was an error sending your message. Please try again later.";
        }
    } else {
        echo "Please fill in all fields correctly.";
    }
}
?>
