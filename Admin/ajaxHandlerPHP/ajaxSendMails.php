<?php
// Creating Database Connection
require_once "../../configPDO.php";

// Starting Session
session_start();

extract($_POST);
extract($_FILES);

if (isset($_POST["targetMessage"])) {

    if (isset($_POST['g-recaptcha-response'])) {

        $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
        $response = json_decode($verifyResponse);

        if ($response->success) {

            if ($targetAudience === "collegeLevel") {

                $sql = "SELECT DISTINCT email FROM event_information";

                //Preparing Query
                $result = $conn->prepare($sql);

                //Executing Query
                $result->execute();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $targetEmails = $row['email'];

                    sendMail($targetEmails, $targetSubject, $targetMessage);
                }
            } elseif ($targetAudience === "departmentLevel") {

                $targetDepartment = trim($_POST['targetDepartment']);
                $targetEvent = trim($_POST['targetEvent']);

                //Query
                $sql = "SELECT DISTINCT email FROM event_information WHERE event_information.event IN
          (SELECT eventName FROM events_details_information WHERE departmentName = :targetDepartment";

                //Preparing Query
                $result = $conn->prepare($sql);

                //Binding Values
                $result->bindValue(":targetDepartment", $targetDepartment);

                //Executing Query
                $result->execute();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $targetEmails = $row['email'];

                    sendMail($targetEmails, $targetSubject, $targetMessage);
                }

            } elseif ($targetAudience === "eventLevel") {

                $targetDepartment = trim($_POST['targetDepartment']);
                $targetEvent = trim($_POST['targetEvent']);

                $sql = "SELECT distinct email FROM event_information WHERE event = :targetEvent";

                //Preparing Query
                $result = $conn->prepare($sql);

                //Binding Values
                $result->bindValue(":targetEvent", $targetEvent);

                //Executing Query
                $result->execute();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $targetEmails = $row['email'];
                    sendMail($targetEmails, $targetSubject, $targetMessage);
                }

            } else {
                echo "Something Went Wrong";
            }

        } else {
            echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Google Recaptcha Error',
            text: 'Please fill Google Recaptcha'
          })</script>";
        }

    }

} else {
    echo "Vat lavlis";
}

// Mail code

function sendMail($targetEmails, $targetSubject, $targetMessage)
{
    date_default_timezone_set('Etc/UTC');
    require_once '../../PHPMailer/PHPMailerAutoload.php';
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
    $mail->addAddress($targetEmails, "GIT SHODH 2K20 Users");
    $mail->Subject = $targetSubject;

    // multiple attachment
    for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
        $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
    }

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML("<!doctype html><html><body>$targetMessage</body></html>");

    $mail->AltBody = $targetMessage;

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
