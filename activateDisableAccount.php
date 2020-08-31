<?php
//------------------------>> DB CONFIG
require_once "configPDO.php";

//------------------------>> SECRETS
require_once "./config/Secret.php";

// Staring Session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reactivate User Account</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>

    <?php

if (isset($_POST['reactivate'])) {

    $email = $_POST['email'];

    // sql Query
    $sql = "SELECT * FROM user_information WHERE email = :email";

    //Preparing query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":email", $email);

    //Executing Query
    $result->execute();

    if ($result->rowCount() === 0) {
        echo "<script>Swal.fire({
                icon: 'error',
                title: 'error',
                text: 'No Such email present in database to reactivate your account'
            })</script>";
    } else {

        $token = bin2hex(random_bytes(15));

        $sql = "UPDATE user_information SET token = :token WHERE email = :email";

        //Preparing Query
        $result = $conn->prepare($sql);

        //Binding Values
        $result->bindValue(":token", $token);
        $result->bindValue(":email", $email);

        //Executing Query
        $result->execute();

        if ($result) {

            /* PHP MAILER CODE */
            include_once "./emailCode/emailDisableAccount.php";

            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo " <script>Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Email Sent'
                        })</script>";
            }

        }

    }

}

// Activate User Account after Clicking Link

if (isset($_GET['token'])) {

    $token = $_GET['token'];

    $sql = "UPDATE user_information SET status = :active WHERE token = :token";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":active", "active");
    $result->bindValue(":token", $token);

    //Executing Query
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Your account is successfully reactivated, We are happy to see you again'
                  })</script>";
    }
}

?>


    <!-- Navbar PHP -->
    <?php include_once "includes/navbar.php";?>


    <main class="container">
        <div class="row">
            <div class="col-md-6 my-5 offset-md-3">
                <h1 class="font-time text-center">Activate Your Disable Account</h1>
                <h5 class="text-center my-3">To activate your disable account please enter your email address in below
                    input
                    and check your email inbox, then click on link which is sent on your email your account will be
                    Reactivate.</h5>

                <form action="" method="post">

                    <div class="form-group mt-2">
                        <label>Enter Your Email Address</label>
                        <input type="email" name="email" class="form-control" />
                    </div>

                    <input type="submit" name="reactivate" value="Submit" class="btn btn-primary btn-block rounded-pill">
                    <h6 class="mt-3"><a href="login.php">Click Here for Login Page</a></h6>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer PHP -->
    <?php include_once "includes/footer.php";?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php";?>

     <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>