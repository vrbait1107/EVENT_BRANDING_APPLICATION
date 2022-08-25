<?php

// --------------------------->> DB CONFIG

require_once "../config/configPDO.php";

// --------------------------->> SESSION START

session_start();

// --------------------------->> EXTRACT DATA

extract($_POST);

// ------------------------------>> CHECKING USER

if (!isset($_SESSION['user'])) {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Please Login to Subscribe.'
    })</script>";
    return;
}

try {

    if (isset($_POST['email']) && !empty($_POST['email'])) {

        $email = $_SESSION["user"];

        $sql2 = "SELECT * FROM newsletter_information WHERE email = :email";
        $result2 = $conn->prepare($sql2);
        $result2->bindValue(":email", $email);
        $result2->execute();

        if ($result2->rowCount() < 0) {

            $sql = "INSERT INTO newsletter_information (email, subscribe) VALUES (:email, :Yes)";

            $result = $conn->prepare($sql);
            $result->bindValue(":email", $email);
            $result->bindValue(":Yes", "Yes");

            # Executing Value
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
    }
    
} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

// --------------------------->> CLOSE DB CONNECTION
$conn = null;
