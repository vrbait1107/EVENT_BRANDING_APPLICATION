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
$mail->addAddress($userName, $userName);
$mail->Subject = "Activate Your GIT SHODH 2K20  Account";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

$mail->msgHTML("<!doctype html>
    <html>
    <body>
    <p>Thank you $userName for creating an account with GIT SHODH 2K20</p>
    <p>There's just one more step before you can login and participate in a event: you need to activate your GIT SHODH
        account. To activate your account, click the following link. If that doesn't work, copy and paste the link into
        your browser's address bar.</p>
    <p>http://localhost/EBA/activateEmail.php?token=$token</p>
    <p>This link is valid for 24 Hours only</p>
    <p>If you didn't create an account, you don't need to do anything; you won't receive any more email from us. If you
        need assistance, please do not reply to this email message. Check the help section of the GIT SHODH website.</p>

  </body>
  </html>");

$mail->AltBody = "Thank you $userName for creating an account with GIT SHODH 2K20 <br/>
  There's just one more step before you can login and participate in a event: you need to activate your GIT SHODH
  account. To activate your account, click the following link. If that doesn't work, copy and paste the link into
  your browser's address bar. <br/>
  http://localhost/EBA/activateEmail.php?token=$token <br/>
  This link is valid for 24 Hours only <br/>
  If you didn't create an account, you don't need to do anything; you won't receive any more email from us. If you
  need assistance, please do not reply to this email message. Check the help section of the GIT SHODH website.";
