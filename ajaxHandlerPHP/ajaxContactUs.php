<?php

// Creating Database Connection
require_once "../configPDO.php";
// Starting Session
session_start();
// Extracting Post data
extract($_POST);

if (isset($_POST['submit'])) {

    if (isset($_POST['captcha'])) {

        $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";

        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['captcha']);

        $response = json_decode($verifyResponse);

        if ($response->success) {

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
            $mail->Username = "vishalbait02@gmail.com";
            $mail->Password = "9921172153";
            $mail->setFrom($email, $name);
            $mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');
            $mail->addAddress("vishalbait01@gmail.com", "Vishal Bait");
            $mail->Subject = $subject;
            $mail->msgHTML("<!doctype html><html><body>$message</body></html>");
            $mail->AltBody = $message;

            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;

            } else {
                echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Email Sent'
                    })</script>";
            }

        } else {
            echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Google Recaptcha Error',
                    text: 'Please fill Google Recaptcha'
                })</script>";
        }

    }

}

// closing Database Connnection
$conn = null;
