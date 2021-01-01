<?php

// --------------------------->> DB CONFIG
require_once "../config/configPDO.php";

//------------------------------>> SECRETS
require_once "../config/Secret.php";

// --------------------------->> SESSION START
session_start();

// --------------------------->> EXTRACT DATA
extract($_POST);

// ------------------------------>> CHECKING USER

if (!isset($_SESSION['user'])):
    header("location:../login.php");
endif;

try {

    if (isset($_POST['submit'])) {

        if (isset($_POST['captcha'])) {

            # Avoid XSS Attack
            $attendBefore = $_POST['attendBefore'];
            $likelyAttend = $_POST['likelyAttend'];
            $likelyRecommendFriend = $_POST['likelyRecommendFriend'];
            $likeMost = $_POST['likeMost'];
            $likeLeast = $_POST['likeLeast'];
            $location = $_POST['location'];
            $events = $_POST['events'];
            $coordinators = $_POST['coordinators'];
            $eventsPrice = $_POST['eventsPrice'];
            $suggestion = $_POST['suggestion'];

            if (empty($attendBefore)):
                echo 'Swal.fire({
				        icon: "warning",
				        title: "Required",
				        text: "Please Select Atleast One Option for Question 1",
				      });';
                return;
            endif;

            if (empty($likelyAttend)):
                echo 'Swal.fire({
				        icon: "warning",
				        title: "Required",
				        text: "Please Select Atleast One Option for Question 2",
				      });';
                return;
            endif;

            if (empty($likelyRecommendFriend)):
                echo 'Swal.fire({
				        icon: "warning",
				        title: "Required",
				        text: "Please Select Atleast One Option for Question 3",
				      });';
                return;
            endif;

            if (empty($likeMost)):
                echo 'Swal.fire({
				        icon: "warning",
				        title: "Required",
				        text: "Please fill Question 4 answer",
				      });';
                return;
            endif;

            if (empty($likeLeast)) {
                echo 'Swal.fire({
                icon: "warning",
                title: "Required",
                text: "Please fill Question 5 answer",
            });';
                return;
            }

            if (empty($location)):
                echo 'Swal.fire({
				        icon: "warning",
				        title: "Required",
				        text: "Please Select Atleast One Option for Question 6 Parameter 1",
				      });';
                return;
            endif;

            if (empty($events)):
                echo 'Swal.fire({
				        icon: "warning",
				        title: "Required",
				        text: "Please Select Atleast One Option for Question 6 Parameter 2",
				      });';
                return;
            endif;

            if (empty($coordinators)):
                echo 'Swal.fire({
				        icon: "warning",
				        title: "Required",
				        text: "Please Select Atleast One Option for Question 6 Parameter 3",
				      });';
                return;
            endif;

            if (empty($eventsPrice)):
                echo 'Swal.fire({
				        icon: "warning",
				        title: "Required",
				        text: "Please Select Atleast One Option for Question 6 Parameter 4",
				      });';
                return;
            endif;

            if (empty($suggestion)):
                echo 'Swal.fire({
				        icon: "warning",
				        title: "Required",
				        text: "Please fill Question 7 answer",
				      });';
                return;
            endif;

            # Avoid XSS Attack
            $attendBefore = htmlspecialchars($attendBefore);
            $likelyAttend = htmlspecialchars($likelyAttend);
            $likelyRecommendFriend = htmlspecialchars($likelyRecommendFriend);
            $likeMost = htmlspecialchars($likeMost);
            $likeLeast = htmlspecialchars($likeLeast);
            $location = htmlspecialchars($location);
            $events = htmlspecialchars($events);
            $coordinators = htmlspecialchars($coordinators);
            $eventsPrice = htmlspecialchars($eventsPrice);
            $suggestion = htmlspecialchars($suggestion);

            $email = $_SESSION['user'];
            $secretKey = $recaptchaSecretKey;
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

                    # Preparing Query
                    $result = $conn->prepare($sql);

                    # Binding Values
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

                    # Executing Query
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

// --------------------------->> CLOSE DB CONNECTION
$conn = null;
