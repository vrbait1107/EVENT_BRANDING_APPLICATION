<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../../config/techfestName.php";

date_default_timezone_set('Etc/UTC');

require '../../PHPMailer/PHPMailerAutoload.php';

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
$mail->addAddress($userName, $userName);
$mail->Subject = "$techfestName Event Registration Success";
global $orderId;

$mail->msgHTML("<!doctype html><html><body>
                <h4>Dear $userName,</h4>
                <p>Thank you for registering to $eventName. Your registration and payment has been received.</p>
                <p>Your Order Id is $orderId</p>
                <p>You registered with this email: $userName.</p>
                <p>For more details about $eventName, Please visit our event information page of GIT SHODH website,
                You will get all the information about this event
                also you will get contact details of event coordinator </p>
                <p>We look forward to seeing you on $techfestDate</p>
                <p>Kind Regards,</p>
                <p>GIT SHODH TEAM</p></body></html>");

$mail->AltBody = "<!doctype html><html><body>Dear $userName, <br/>
                Thank you for registering to $eventName. Your registration and payment has been received.</p>
                    <p>Your Order Id is $orderId <br/>
                    You registered with this email: $userName. <br/>
                    For more details about $eventName, Please visit our event information page of GIT SHODH website,
                    You will get all the information about this event
                    also you will get contact details of event coordinator </br>
                    We look forward to seeing you on $techfestDate <br/>
                    Kind Regards, <br/>
                    GIT SHODH TEAM
                    </body></html>";
