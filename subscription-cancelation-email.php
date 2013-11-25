<?php
$first_name = $_POST['first_name'];
$email = $_POST['email'];
$order_id = $_POST['order_id'];
$message = $_POST['message'];
$formcontent=" From: $first_name \n Email: $email \n Order Id: $order_id  \n Message: $message";
$recipient = "werebreakingup@sockscribe.me";
$subject = "Cancelation Feedback from $first_name";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You for your feedback! "<a href='./index.php'> Back to Sockscribe Me</a>";
?>
