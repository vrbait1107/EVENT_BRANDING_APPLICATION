<?php

// --------------------------->> DB CONFIG
require_once "../config/configPDO.php";

// --------------------------->> SESSION START
session_start();

// --------------------------->> EXTRACT DATA
extract($_POST);

// --------------------------->> SECRETS
require_once "../config/Secret.php";

// ------------------------------>> CHECKING USER

if (!isset($_SESSION['user'])):
    header("location:../login.php");
endif;

try {

    if (isset($_POST['submit'])) {

        if (isset($_POST['captcha'])) {

            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];

            if (empty($name)) {
                echo "<script>Swal.fire({
						icon: 'warning',
			            title: 'Required',
						text: 'Name cannot be empty',
					})</script>";
                return;
            }

            if (empty($email)) {
                echo "<script>Swal.fire({
						icon: 'warning',
						title: 'Required',
						text: 'Email cannot be empty',
					})</script>";
                return;
            }

            if (empty($subject)) {
                echo "<script>Swal.fire({
						icon: 'warning',
						title: 'Required',
						text: 'Subject cannot be empty',
					})</script>";
                return;
            }

            if (empty($message)) {
                echo "<script>Swal.fire({
						icon: 'warning',
						title: 'Required',
						text: 'Subject cannot be empty',
					})</script>";
                return;
            }

            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $subject = htmlspecialchars($_POST["subject"]);
            $message = $_POST["message"];

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
                    text: 'Please fill Google Recaptcha Properly'
                })</script>";
            }

        } else {
            echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Google Recaptcha Error',
                    text: 'Please fill Google Recaptcha Properly'
                })</script>";

        }

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

// CLOSE DATABASE CONNECTION
$conn = null;
