<?php

// --------------------------->> DB CONNECTION
require_once "../configPDO.php";

// --------------------------->> SESSION START
session_start();

// --------------------------->> EXTRACT DATA
extract($_POST);

if (isset($_POST['submit'])) {

    if (isset($_POST['captcha'])) {

        // Avoid XSS Attack

        $attendBefore = htmlspecialchars($_POST['attendBefore']);
        $likelyAttend = htmlspecialchars($_POST['likelyAttend']);
        $likelyRecommendFriend = htmlspecialchars($_POST['likelyRecommendFriend']);
        $likeMost = htmlspecialchars($_POST['likeMost']);
        $likeLeast = htmlspecialchars($_POST['likeLeast']);
        $location = htmlspecialchars($_POST['location']);
        $events = htmlspecialchars($_POST['events']);
        $coordinators = htmlspecialchars($_POST['coordinators']);
        $eventsPrice = htmlspecialchars($_POST['eventsPrice']);
        $suggestion = htmlspecialchars($_POST['suggestion']);

        $email = $_SESSION['user'];
        $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['captcha']);
        $response = json_decode($verifyResponse);

        if ($response->success) {

            $sqlCheck = "SELECT * FROM feedback_information WHERE email = :email";
            $resultCheck = $conn->prepare($sqlCheck);
            $resultCheck->bindValue(":email", $email);
            $resultCheck->execute();

            if ($resultCheck->rowCount() > 0) {
                echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Your already Submitted feedback form'
             })</script>";

            } else {

                $sql = "INSERT INTO feedback_information (email, attendBefore, likelyAttend, likelyRecommendFriend,
     likeMost, likeLeast, location, events, coordinators, eventsPrice, suggestion) VALUES
      (:email, :attendBefore, :likelyAttend, :likelyRecommendFriend, :likeMost, :likeLeast, :location,
       :events, :coordinators, :eventsPrice, :suggestion)";

                //Preparing Query
                $result = $conn->prepare($sql);

                //Binding Values
                $result->bindValue(":email", $email);
                $result->bindValue(":attendBefore", $attendBefore);
                $result->bindValue(":likelyAttend", $likelyAttend);
                $result->bindValue(":likelyRecommendFriend", $likelyRecommendFriend);
                $result->bindValue(":likeMost", $likeMost);
                $result->bindValue(":likeLeast", $likeLeast);
                $result->bindValue(":location", $location);
                $result->bindValue(":events", $events);
                $result->bindValue(":coordinators", $coordinators);
                $result->bindValue(":eventsPrice", $eventsPrice);
                $result->bindValue(":suggestion", $suggestion);

                //Executing Query
                $result->execute();

                if ($result) {
                    echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Your Feedback is Successfully Submitted'
            })</script>";

                } else {
                    echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'We are failed to Submit your feedback'
                })</script>";
                }
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

// --------------------------->> CLOSE DB CONNECTION
$conn = null;
