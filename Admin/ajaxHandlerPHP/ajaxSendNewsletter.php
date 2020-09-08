<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

// --------------------------->> START SESSION
session_start();

//---------------------------->> SECRETS
require_once "../../config/Secret.php";

extract($_POST);
extract($_FILES);

if (isset($_POST["newsletterMessage"])) {

    if (isset($_POST['g-recaptcha-response'])) {

        $secretKey = $recaptchaSecretKey;
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
        $response = json_decode($verifyResponse);

        if ($response->success) {

            $sql = "SELECT DISTINCT email FROM newsletter_information";

            //Preparing Query
            $result = $conn->prepare($sql);

            //Executing Query
            $result->execute();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $newsletterEmails = $row['email'];
                sendMail($newsletterEmails, $newsletterSubject, $newsletterMessage);
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

// ---------------------------------------->> MAIL CODE

function sendMail($newsletterEmails, $newsletterSubject, $newsletterMessage)
{
    //##### Include PHP Mailer Code
    include_once "../../emailCode/emailSendNewsletter.php";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Email Sent'
          })</script>";
    }

}

// closing Database Connnection
$conn = null;
