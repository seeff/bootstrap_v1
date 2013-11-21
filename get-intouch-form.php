<?php
$name = $_POST['name'];
$email = $_POST['email'];
$order_number = $_POST['order_number'];
$newsletter = $_POST['newsletter'];
$message = $_POST['message'];
$formcontent=" From: $name \n Email: $email \n Order Number: $order_number \n Sign Up for Newsletter: $newsletter \n Message: $message";
$recipient = "hello@sockscribe.me";
$subject = "Contact Form from $name";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You! We will get back to you as soon as possible!" . " -" . "<a href='./index.php'> Back to Sockscribe Me</a>";
?>
