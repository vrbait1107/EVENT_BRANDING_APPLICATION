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

            //##### Include PHP Mailer Code
            include_once "../emailCode/emailContactUs.php";

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
