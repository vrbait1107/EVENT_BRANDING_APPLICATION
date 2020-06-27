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
// Enter Your Email Username
$mail->Username = "vishalbait02@gmail.com";
// Enter Your Email Password
$mail->Password = "9921172153";
$mail->setFrom('vishalbait02@gmail.com', 'GIT SHODH 2K20');
$mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');
$mail->addAddress($email, $email);
$mail->Subject = "GIT SHODH 2K20 PASSWORD RESET";

$mail->msgHTML("<!doctype html>
    <html><body> <p>$email You're receiving this e-mail because you requested a password reset
    for your user account at GIT SHODH 2K20</p>
    <p>Please go to the following page and choose a new password:</p>
    <p>http://localhost/EBA/resetPassword.php?token=$token</p>
    <p>If you didn't request this change, you can disregard this email - we have not yet reset your password.</p>
    <p>Thanks for using our site!</p>
    <p>The GIT SHODH Team<p>
     </body></html>");

$mail->AltBody = "$email You're receiving this e-mail because you requested a password reset
    for your user account at GIT SHODH 2K20 <br/>
    Please go to the following page and choose a new password: <br/>
    http://localhost/EBA/resetPassword.php?token=$token<br/>
    If you didn't request this change, you can disregard this email - we have not yet reset your password. <br/>
     Thanks for using our site!<br/>
     The GIT SHODH Team";
