<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $to = 'Davisbryan0405@gmail.com'; // Replace with your email address
  $subject = 'Contact Form Submission';
  $message = "Name: $name\nAge: $age\nAddress: $address\nEmail: $email\nPhone: $phone";
  $headers = 'From: ' . $email . "Davisbryan0405@gmail.com" .
             'Reply-To: ' . $email . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

  if (mail($to, $subject, $message, $headers)) {
    echo 'Thank you for your submission!';
    console.log("ok")
  } else {
    echo 'Oops! An error occurred. Please try again.';
  }
}
?>
