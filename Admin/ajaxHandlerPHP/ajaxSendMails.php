<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

//----------------------->> STARTING SESSION

session_start();

//---------------------------->> SECRETS
require "../../config/Secret.php";

extract($_POST);
extract($_FILES);

# CHECKING ADMIN

if (!isset($_SESSION['adminType'])) {
    header("location:../adminLogin.php");
}

try {

    if (isset($_POST["targetMessage"])) {

        if (isset($_POST['g-recaptcha-response'])) {

            $secretKey = $recaptchaSecretKey;
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
            $response = json_decode($verifyResponse);

            if ($response->success) {

                if ($targetAudience === "collegeLevel") {

                    if ($targetAudience == "") {
                        echo "<script>Swal.fire({
                                icon: 'warning',
                                title: 'Warning',
                                text: 'Target Audience cannot be Empty'
                            })</script>";
                        exit;
                    }

                    $sql = "SELECT DISTINCT email FROM event_information";

                    # Preparing Query
                    $result = $conn->prepare($sql);

                    # Executing Query
                    $result->execute();

                    $collegeArray = array();

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        array_push($collegeArray, $row['email']);
                    }

                    $targetEmails = $collegeArray;

                    sendMail($targetEmails, $targetSubject, $targetMessage);

                } elseif ($targetAudience === "departmentLevel") {

                    if ($targetAudience == "" || $targetDepartment == "") {
                        echo "<script>Swal.fire({
                            icon: 'warning',
                            title: 'Warning',
                            text: 'Target Audience & Department cannot be Empty'
                            })</script>";
                        exit;
                    }

                    $targetDepartment = $_POST['targetDepartment'];

                    # Query
                    $sql = "SELECT DISTINCT email FROM event_information WHERE event_information.event IN
          (SELECT eventName FROM events_details_information WHERE eventDepartment = :targetDepartment)";

                    # Preparing Query
                    $result = $conn->prepare($sql);

                    # Binding Values
                    $result->bindValue(":targetDepartment", $targetDepartment);

                    # Executing Query
                    $result->execute();

                    $departmentArray = array();

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        array_push($departmentArray, $row['email']);
                    }

                    $targetEmails = $departmentArray;

                    sendMail($targetEmails, $targetSubject, $targetMessage);

                } elseif ($targetAudience === "eventLevel") {

                    if ($targetAudience == "" || $targetDepartment == "" || $targetEvent == "") {
                        echo "<script>Swal.fire({
                            icon: 'warning',
                            title: 'Warning',
                            text: 'Target Audience & Department cannot be Empty'
                            })</script>";
                        exit;
                    }

                    $sql = "SELECT distinct email FROM event_information WHERE event = :targetEvent";

                    # Preparing Query
                    $result = $conn->prepare($sql);

                    # Binding Values
                    $result->bindValue(":targetEvent", $targetEvent);

                    # Executing Query
                    $result->execute();

                    $eventArray = array();

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        array_push($eventArray, $row['email']);
                    }

                    $targetEmails = $eventArray;

                    sendMail($targetEmails, $targetSubject, $targetMessage);

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
        echo "Something Went Wrong";
    }

// Mail code

    function sendMail($targetEmails, $targetSubject, $targetMessage)
    {

        //---------------------------->> SECRETS
        require "../../config/Secret.php";

        /* Include PHP Mailer Code */

        include_once "../../emailCode/emailSendMails.php";

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
