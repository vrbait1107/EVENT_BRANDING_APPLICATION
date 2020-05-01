<?php
session_start();
require_once "config.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reactivate User Account</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>

</head>


<body>

    <?php 
    
    if(isset($_POST['reactivate'])) {
    
       $email = $_POST['email'];

       $sql = "select * from user_information where email = '$email'";
       $result = mysqli_query($conn,$sql);

       if(mysqli_num_rows($result) === 0){
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'error',
                text: 'No Such email present in database to reactivate your account'
            })</script>";
       }
       else{

       $token =  bin2hex(random_bytes(15));

       $sql = "update user_information set token = '$token' where email = '$email'";
       $result = mysqli_query($conn,$sql);

                    if($result){

                    date_default_timezone_set('Etc/UTC');
                    require 'PHPMailer/PHPMailerAutoload.php';

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

                    $mail->addAddress("$email", "$email");

                    $mail->Subject = "GIT SHODH 2K20 Reactivate Your Account";

                    //Read an HTML message body from an external file, convert referenced images to embedded,
                    //convert HTML into a basic plain-text alternative body
                    $mail->msgHTML("<!doctype html><html><body> $email We are happy to see you again in GIT SHODH 2K20,
                    To reactivate account please click on this link http://localhost/EBA/activateDisableAccount.php?token=$token </body></html>");

                    $mail->AltBody = "$email We are happy to see you again in GIT SHODH 2K20,
                    To reactivate account please click on this link http://localhost/EBA/activateDisableAccount.php?token=$token";

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


    // activate user account after clicking link

    if(isset($_GET['token'])){

        $token = $_GET['token'];

        $sql = "update user_information set status = 'active' where token = '$token'";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "<script>Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Your account is successfully reactivated, We are happy to see you again'
                  })</script>"; 
        }
    }

    ?>


    <!-- Navbar PHP -->
    <?php include_once "includes/navbar.php"; ?>


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
    <?php include_once "includes/footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

</body>

</html>