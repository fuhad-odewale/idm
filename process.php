<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the form data from the request body
  $formData = json_decode(file_get_contents("php://input"), true);

  // Set the recipient email address
  $to = "fuhaodewale@gmail.com";

  // Set the email subject
  $subject = "New Contact Form Submission";

  // Build the email content
  $message = "Name: " . $formData["name"] . "\n";
  $message .= "Date of Birth: " . $formData["dob"] . "\n";
  $message .= "Email Address: " . $formData["email"] . "\n";
  $message .= "Phone Number: " . $formData["phone"] . "\n";

  // Additional headers
  $headers = "From: " . $formData["email"] . "\r\n";
  $headers .= "Reply-To: " . $formData["email"] . "\r\n";

  // Send the email
  if (mail($to, $subject, $message, $headers)) {
    // Return a success message if the email was sent successfully
    echo json_encode(array("message" => "Form submission successful!"));
  } else {
    // Return an error message if there was a problem sending the email
    echo json_encode(array("message" => "Error: Unable to send the email."));
  }
}
?>