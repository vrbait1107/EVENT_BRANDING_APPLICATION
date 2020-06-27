<?php
// Please Read official documentation on GitHUb Account -> https: //github.com/PHPMailer/PHPMailer

date_default_timezone_set('Etc/UTC');
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "vishalbait02@gmail.com";
$mail->Password = "9921172153";
$mail->setFrom("vishalbait02@gmail.com", "GIT SHODH 2K20");
$mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');

$mail->addAddress("$email", "$email");

$mail->Subject = "GIT SHODH 2K20 Reactivate Your Account";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<!doctype html><html><body> $email We are happy to see you again in GIT SHODH 2K20,
                    To reactivate account please click on this link http://localhost/EBA/activateDisableAccount.php?token=$token </body></html>");

$mail->AltBody = "$email We are happy to see you again in GIT SHODH 2K20,
                    To reactivate account please click on this link http://localhost/EBA/activateDisableAccount.php?token=$token";
