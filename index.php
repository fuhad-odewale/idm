<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>idm</title>
</head>
<body>
<h1>Contact Form</h1>
  <form id="contactForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required><br>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" required><br>

    <input type="submit" value="Submit">
  </form>


  <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the form data from the request body
  $formData = json_decode(file_get_contents("php://input"), true);

  // Set the recipient email address
  $to = "your_email@example.com";

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


  <script src="submit.js"></script>
</body>
</html>