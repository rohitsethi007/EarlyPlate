<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = filter_var($_POST['EMAIL'], FILTER_SANITIZE_EMAIL);
    
    // Check if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Set the email subject and body
        $subject = "Newsletter Subscription";
        $message = "Thank you for subscribing to our newsletter!";
        
        // Set the headers
        $headers = "From: no-reply@yourdomain.com\r\n";
        $headers .= "Reply-To: no-reply@yourdomain.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Send the email
        if (mail($email, $subject, $message, $headers)) {
            // Redirect or show a success message
            echo "Thank you! We'll notify you.";
        } else {
            echo "Error: Could not send the email.";
        }
    } else {
        echo "Error: Invalid email address.";
    }
}
?>
