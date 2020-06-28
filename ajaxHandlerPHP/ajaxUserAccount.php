<?php

// ##### Creating Database Connection
require_once "../configPDO.php";
//####### Starting Session
session_start();

// ################### User Session Variable

$email = $_SESSION['user'];

// Extracting Post data
extract($_POST);

// ######################## Change Password

if (isset($_POST['changePassword'])) {

    $email = $_SESSION['user'];

//Query
    $sql = "SELECT password FROM user_information WHERE email = :email";

//Preparing Query
    $result = $conn->prepare($sql);

//Binding Values
    $result->bindValue(":email", $email);

//Executing Query
    $result->execute();

//Fetching Value in associative array
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

// ######################  Change Email Address

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

//##################### Disable Account

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

// closing Database Connnection
$conn = null;
