<?php
// Please Read official documentation on GitHUb Account -> https: //github.com/PHPMailer/PHPMailer

date_default_timezone_set('Etc/UTC');
require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
// Enter Your Email Username
$mail->Username = $emailUsername;
//Enter Your Email Password
$mail->Password = $emailPassword;
$mail->setFrom($email, $name);
$mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');
$mail->addAddress($emailUsername, "GIT SHODH 2K20");
$mail->Subject = $subject;
$mail->msgHTML("<!doctype html><html><body>$message</body></html>");
$mail->AltBody = $message;
