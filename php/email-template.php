$verification_url = "http://yourdomain.com/verify.php?token=" . $verification_token;
$subject = "Verify Your Email - RocVille FM";
$message = "
    <html>
    <head>
        <title>Verify Your Email - RocVille FM</title>
    </head>
    <body>
        <p>Hi $name,</p>
        <p>Thank you for registering at RocVille FM!</p>
        <p>Please verify your email address by clicking the link below:</p>
        <p><a href=\"$verification_url\">Verify Your Email</a></p>
        <p>If you did not create this account, please ignore this email.</p>
        <p>Best regards,</p>
        <p>The RocVille FM Team</p>
    </body>
    </html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: no-reply@rocvillefm.com";

mail($email, $subject, $message, $headers);
