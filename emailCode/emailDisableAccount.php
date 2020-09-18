<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

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
$mail->Username = $emailUsername;
$mail->Password = $emailPassword;
$mail->setFrom($emailSetFrom, $techfestName);
$mail->addReplyTo('non-reply@gmail.com', $techfestName);

$mail->addAddress("$email", "$email");

$mail->Subject = "$techfestName Reactivate Your Account";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<!doctype html><html><body> $email We are happy to see you again in $techfestName,
                    To reactivate account please click on this link http://localhost/EBA/activateDisableAccount.php?token=$token </body></html>");

$mail->AltBody = "$email We are happy to see you again in $techfestName,
                    To reactivate account please click on this link http://localhost/EBA/activateDisableAccount.php?token=$token";
