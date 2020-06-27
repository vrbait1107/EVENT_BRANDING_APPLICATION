<?php
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
// Enter Your Email Username
$mail->Username = "vishalbait02@gmail.com";
// Enter Your Email Password
$mail->Password = "9921172153";
$mail->setFrom("vishalbait02@gmail.com", "GIT SHODH 2K20");
$mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');
$mail->addAddress($targetEmails, "GIT SHODH 2K20 Users");
$mail->Subject = $targetSubject;

// multiple attachment
for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
    $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
}

$mail->msgHTML("<!doctype html><html><body>$targetMessage</body></html>");
$mail->AltBody = $targetMessage;
