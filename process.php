<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Modify the following email address to the one you want to receive the form data
    $to_email = "fuhaodewale@gmail.com";
    $subject = "Form Submission - Contact Details";
    $message = "Name: $name\n";
    $message .= "Date of Birth: $dob\n";
    $message .= "Email Address: $email\n";
    $message .= "Phone Number: $phone\n";

    // You can add additional headers or settings as required
    $headers = "From: $email" . "\r\n";

    // Send email
    if (mail($to_email, $subject, $message, $headers)) {
        echo "Thank you for your submission!";
    } else {
        echo "Error sending email. Please try again later.";
    }
}
?>
