<?php

// --------------------------->> DB CONFIG
require_once "../config/configPDO.php";

// --------------------------->> SESSION START
session_start();

// --------------------------->> EXTRACT DATA
extract($_POST);

// --------------------------->> SECRETS
require_once "../config/Secret.php";

if (isset($_POST['submit'])) {

    if (isset($_POST['captcha'])) {

        $secretKey = $recaptchaSecretKey;

        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['captcha']);

        $response = json_decode($verifyResponse);

        if ($response->success) {

            /* PHP MAILER CODE */

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

// CLOSE DATABASE CONNECTION
$conn = null;
