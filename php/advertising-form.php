<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $companyName = htmlspecialchars(trim($_POST['companyName']));
    $contactPerson = htmlspecialchars(trim($_POST['contactPerson']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Basic validation
    if (!empty($companyName) && !empty($contactPerson) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($phone) && !empty($message)) {
        
        // Send email to the advertising department
        $to = "advertising@rocvillefm.com"; // Advertising department email
        $subject = "New Advertising Inquiry from $companyName";
        $body = "You have received a new advertising inquiry from the contact form:\n\n".
                "Company: $companyName\n".
                "Contact Person: $contactPerson\n".
                "Email: $email\n".
                "Phone: $phone\n".
                "Message: \n$message";
        
        // Email headers to prevent spoofing and ensure proper reply functionality
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for your interest in advertising with RocVille FM! We will reach out to you soon.";
        } else {
            echo "There was an error with your submission. Please try again later.";
        }
    } else {
        echo "Please fill in all required fields correctly.";
    }
}
?>
