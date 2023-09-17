<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];


require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "your host"; //REPLACE IT
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "example@example.com"; //REPLACE IT
$mail->Password = "yourpassword"; //REPLACE IT

$mail->setFrom($email, $name);
$mail->addAddress("info@example.com"); //REPLACE IT

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: ../sent.php");
?>