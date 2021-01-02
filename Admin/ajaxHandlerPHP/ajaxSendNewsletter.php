<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

// --------------------------->> START SESSION
session_start();

//---------------------------->> SECRETS
require "../../config/Secret.php";

# CHECKING ADMIN

if (!isset($_SESSION['adminType'])) {
    header("location:../adminLogin.php");
}

extract($_POST);
extract($_FILES);

try {

    if (isset($_POST["newsletterMessage"])) {

        if (isset($_POST['g-recaptcha-response'])) {

            $secretKey = $recaptchaSecretKey;
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
            $response = json_decode($verifyResponse);

            if ($response->success) {

                $sql = "SELECT * FROM newsletter_information";

                # Preparing Query
                $result = $conn->prepare($sql);

                # Executing Query
                $result->execute();

                $row = $result->fetch(PDO::FETCH_ASSOC);

                $newArray = array();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    array_push($newArray, $row['email']);
                }

                $newsletterEmails = $newArray;

                sendMail($newsletterEmails, $newsletterSubject, $newsletterMessage);

            } else {
                echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Google Recaptcha Error',
                text: 'Please fill Google Recaptcha'
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

// ---------------------------------------->> MAIL CODE

    function sendMail($newsletterEmails, $newsletterSubject, $newsletterMessage)
    {
        //---------------------------->> SECRETS
        require "../../config/Secret.php";

        /*Include PHP Mailer Code */
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

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();

}

// closing Database Connnection
$conn = null;
