<?php
  if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $to = "fuhaodewale@gmail.com";

    mail($to, $name, $email, 
    $message);
  }



?>