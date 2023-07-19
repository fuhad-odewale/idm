<?php
require 'phpmailer/PHPMailerAutoload.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'your-smtp-server.com';  // Set your SMTP server here
$mail->Port = 587;  // Set the SMTP port for your server
$mail->SMTPAuth = true;
$mail->Username = 'your-email@example.com';  // Set your SMTP username here
$mail->Password = 'your-password';  // Set your SMTP password here

$mail->setFrom('your-email@example.com', 'Your Name');
$mail->addAddress('recipient@example.com', 'Recipient Name');
$mail->Subject = 'New Contact Form Submission';
$mail->Body = "Name: $name\nEmail: $email\n\n$message";

if (!$mail->send()) {
  echo 'Error sending email: ' . $mail->ErrorInfo;
} else {
  echo 'Email sent successfully!';
}
?>
