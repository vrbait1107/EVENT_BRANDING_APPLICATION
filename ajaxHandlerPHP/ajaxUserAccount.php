<?php

// --------------------------->> DB CONFIG
require_once "../config/configPDO.php";

// --------------------------->> SESSION START
session_start();

// --------------------------->> EXTRACT DATA
extract($_POST);

// --------------------------->> SESSION VARIABLE
$email = $_SESSION['user'];

// --------------------------->> CHANGE PASSWORD

if (isset($_POST['changePassword'])) {

    $email = $_SESSION['user'];

    // Avoid XSS Attack

    $newPassword = htmlspecialchars($_POST["newPassword"]);
    $conNewPassword = htmlspecialchars($_POST["conNewPassword"]);
    $currentPassword = htmlspecialchars($_POST["currentPassword"]);

    //Query
    $sql = "SELECT password FROM user_information WHERE email = :email";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":email", $email);

    //Executing Query
    $result->execute();

    //Fetching Value from DB
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $dbPassword = $row['password'];

    if (password_verify($currentPassword, $dbPassword)) {

        if ($newPassword === $conNewPassword) {

            $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $conNewPassword = password_hash($conNewPassword, PASSWORD_BCRYPT);

            //Query
            $sql1 = "UPDATE user_information SET password= :newPassword1 WHERE email = :email";

            //Preparing Query
            $result1 = $conn->prepare($sql1);

            //Binding Values
            $result1->bindValue(":newPassword1", $newPassword);
            $result1->bindValue(":email", $email);

            //Executing Query
            $result1->execute();

            if ($result1) {
                echo "<script>Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: 'Your Password is Successfully Changed'
            })</script>";

            } else {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'We are failed to change Password'
                })</script>";

            }

        } else {
            echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Field does not match',
            text: 'New Password and Confirm New Password field are not match'
        })</script>";
        }

    } else {
        echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Field does not match',
            text: 'Current Password is not Correct'
        })</script>";
    }

}

// --------------------------->>  CHANGE EMAIL ADDRESS

if (isset($_POST['changeEmail'])) {

    $email = $_SESSION['user'];

    //Query
    $sql = "SELECT * FROM user_information WHERE email = :newEmail";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":newEmail", $newEmail);

    //Executing Query
    $result->execute();

    // Checking Wether Email Already Present in database or not
    if ($result->rowCount() > 0) {
        echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Email Already Present in Database',
            text: 'Please Enter New Email Address'
        })</script>";

    } else {
        $sql = "SELECT * FROM user_information WHERE email = :email";

        //Preparing Query
        $result = $conn->prepare($sql);

        //Binding Value
        $result->bindValue(":email", $email);

        //Executing Query
        $result->execute();

        //Fetching Values in associative array
        $row = $result->fetch(PDO::FETCH_ASSOC);

        $dbPassword = $row['password'];

        if (password_verify($Password, $dbPassword)) {

            //sql Query
            $sql = "UPDATE user_information SET email = :newEmail WHERE email = :email";

            //Preparing Query
            $result = $conn->prepare($sql);

            //Binding Values
            $result->bindValue(":newEmail", $newEmail);
            $result->bindValue(":email", $email);

            //Executing Query
            $result->execute();

            if ($result) {
                echo "<script>Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: 'Your Email Successfully Changed'
            })</script>";
            }

        } else {
            echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Check Your Password to Change your Email please enter valid password '
            })</script>";
        }

    }
}

// --------------------------->> DISABLE ACCOUNT

if (isset($_POST['disableAccount'])) {

    $email = $_SESSION['user'];

    //sql Query
    $sql = "UPDATE user_information SET status = :inactive WHERE email = :email";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":inactive", "inactive");
    $result->bindValue(":email", $email);

    //Executing Query
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'sucess',
            text: 'Your Account is successfully Disabled'
            })</script>";
    }
}

// --------------------------->> CLOSE DB CONNECTION
$conn = null;
