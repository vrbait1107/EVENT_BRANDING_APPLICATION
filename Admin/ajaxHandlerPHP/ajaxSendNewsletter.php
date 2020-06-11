<?php
// Creating Database Connection
require_once "../../configPDO.php";

// Starting Session
session_start();

extract($_POST);
extract($_FILES);

if (isset($_POST["newsletterMessage"])) {

    if (isset($_POST['g-recaptcha-response'])) {

        $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
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
                sendMail($newletterEmails, $newletterSubject, $newletterMessage);
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

// Mail code

function sendMail($newsletterEmails, $newsletterSubject, $newsletterMessage)
{
    date_default_timezone_set('Etc/UTC');
    require_once '../PHPMailer/PHPMailerAutoload.php';
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
    $mail->setFrom("vishalbait02@gmail.com", "GIT SHODH 2K20");
    $mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');
    $mail->addAddress($newsletterEmails, "GIT SHODH 2K20 Users");
    $mail->Subject = $newsletterSubject;

    // multiple attachment
    for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
        $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
    }

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML("<!doctype html><html><body>$newsletterMessage</body></html>");

    $mail->AltBody = $newsletterMessage;

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
