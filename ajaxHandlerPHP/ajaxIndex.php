<?php

// --------------------------->> DB CONFIG

require_once "../config/configPDO.php";

// --------------------------->> SESSION START

session_start();

// --------------------------->> EXTRACT DATA

extract($_POST);

if (isset($_POST['email'])) {

    $email = htmlspecialchars($_POST["email"]);

    $sql1 = "SELECT * FROM user_information WHERE email = :email";
    $result1 = $conn->prepare($sql1);
    $result1->bindValue(":email", $email);
    $result1->execute();

    if ($result1->rowCount() > 0) {

        $sql2 = "SELECT * FROM newsletter_information WHERE email = :email";
        $result2 = $conn->prepare($sql2);
        $result2->bindValue(":email", $email);
        $result2->execute();

        if ($result2->rowCount() < 0) {

            //Query
            $sql = "INSERT INTO newsletter_information (email, subscribe) VALUES (:email, :Yes)";

            //Prepare Query
            $result = $conn->prepare($sql);

            //Binding Value
            $result->bindValue(":email", $email);
            $result->bindValue(":Yes", "Yes");

            //Executing Value
            $result->execute();

            if ($result) {

                echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'You are successfully subscribed to newsletter'
                })</script>";

            } else {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'You are failed to subscribe newsletter, Please try again'
                })</script>";
            }

        } else {
            echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'You are already subscribed to newsletter'
                })</script>";
        }

    } else {
        echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Please Enter your registered email for this account'
                })</script>";
    }

}
