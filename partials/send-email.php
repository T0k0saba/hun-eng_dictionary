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

$mail->Host = "k01.awh.hu";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "info@enwords.hu";
$mail->Password = "pS6&deq#py#C";

$mail->setFrom($email, $name);
$mail->addAddress("info@enwords.hu");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: ../sent.php");
?>