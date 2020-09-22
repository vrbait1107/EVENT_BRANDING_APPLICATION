<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../../config/techfestName.php";

// Please Read official documentation on GitHUb Account -> https: //github.com/PHPMailer/PHPMailer

date_default_timezone_set('Etc/UTC');
require_once '../../PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
//Enter Your Username
$mail->Username = $emailUsername;
//Enter Your Password
$mail->Password = $emailPassword;
$mail->setFrom($emailSetFrom, $techfestName);
$mail->addReplyTo('non-reply@gmail.com', $techfestName);

foreach ($newsletterEmails as $row) {
    $mail->addBCC($row, "$techfestName Users");
}

$mail->Subject = $newsletterSubject;

// multiple attachment
for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
}

$mail->msgHTML("<!doctype html><html><body>$newsletterMessage</body></html>");
$mail->AltBody = $newsletterMessage;
