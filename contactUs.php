<?php

// Creating Connection to Database
    require_once "configPDO.php";

// Staring Session
    session_start();

if(!isset($_SESSION['user'])) {
 header("location:login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us</title>

    <!--    Animate.css   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
     <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>
    <!-- contact us css   -->
    <link rel="stylesheet" href="css/contactUs.css">
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>



</head>

<body>

    <!--Navbar-->
    <?php include_once "includes/navbar.php"; ?>


    <?php

if(isset($_POST['submit'])){

            $name = trim($_POST['name']);
            $contactEmail = trim($_POST['email']);
            $contactSubject = trim($_POST['subject']);
            $contactMessage = trim($_POST['message']);

             if(isset($_POST['g-recaptcha-response'])) {

            $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
            $response = json_decode($verifyResponse);

                 if($response->success){

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
            $mail->setFrom($contactEmail, $name);
            $mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');
            $mail->addAddress("vishalbait01@gmail.com", "Vishal Bait");
            $mail->Subject = $contactSubject;

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $mail->msgHTML("<!doctype html><html><body>$contactMessage</body></html>");
            $mail->AltBody = $contactMessage;

            if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
            echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Email Sent'
                   })</script>";         
            }


                }// if $response

        else{
        echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Google Recaptcha Error',
                text: 'Please fill Google Recaptcha'
            })</script>";
        }

    }// if(isset($_POST['g-recaptcha-response']))

}


?>


    <main class="mb-5 container">

        <h2 class="font-weight-bold text-center my-4 text-uppercase text-primary animated zoomIn slow">
            Contact us</h2>

        <h5 class="text-center w-responsive mx-auto mb-3 animated zoomIn slow">Do you have any questions? Please do not
            hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</h5>

        <div class="row">

            <section class="col-md-8 wow zoomIn slow">

                <form id="contactForm" name="contactForm" action="" method="POST"
                    onsubmit="return validateFormContact()">

                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email" class="">Your Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="subject" class="">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message">Your message</label>
                        <textarea type="text" id="message" name="message" rows="3"
                            class="form-control md-textarea"></textarea>
                    </div>

                    <div class="text-center my-4">
                        <div class="g-recaptcha text-center" data-sitekey="6LdGougUAAAAAG96eGund5fScrR1fouBZvyLf1RL">
                        </div>
                    </div>

                    <div class="text-center text-md-left">
                        <input class="btn btn-primary rounded-pill btn-block" type="submit" name="submit" value="Send">
                    </div>

                </form>
            </section>


            <section class="col-md-3 text-center wow zoomIn slow">
                <ul class="list-unstyled">
                    <li><i class="fa fa-map-marker mb-2 fa-3x"></i>
                        <h5 class="text-success mb-5">Gharda Institute of Technology Lavel-Khed, Maharashtra, INDIA</h5>
                    </li>

                    <li><i class="fa fa-phone mb-2 fa-3x"></i>
                        <h5 class="text-success mb-5">+ 01 234 567 89</h5>
                    </li>

                    <li><i class="fa fa-envelope mb-2 fa-3x"></i>
                        <h5 class="text-success">git-india.edu.gmail.com</h5>
                    </li>
                </ul>
            </section>

        </div>
    </main>

    
    <!-- WOW.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <!--Form Validation-->
    <script src="js/form-validation.js"> </script>

    <!-- Footer PHP -->
    <?php include_once "includes/footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

    <?php
    // closing Database Connnection
     $conn= null; 
     ?>

</body>

</html>