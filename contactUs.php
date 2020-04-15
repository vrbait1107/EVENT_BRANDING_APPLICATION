<?php
session_start();
if(!isset($_SESSION['user'])) {
 header("location:login.php");
  require_once "config.php";
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- contact us css   -->
    <link rel="stylesheet" href="css/contactUs.css">
    <!-- Font-Awesome css   -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>



</head>

<body>

    <!--Navbar-->
    <?php include_once "navbar.php"; ?>


    <?php

if(isset($_POST['submit'])){

            $name = trim($_POST['name']);
            $contactEmail = trim($_POST['email']);
            $contactSubject = trim($_POST['subject']);
            $contactMessage = trim($_POST['message']);

            $name = mysqli_real_escape_string($conn,$name);
            $contactEmail =  mysqli_real_escape_string($conn,$contactEmail);
            $contactSubject = mysqli_real_escape_string($conn,$contactSubject);
            $contactMessage =  mysqli_real_escape_string($conn,$contactMessage);

            $name = htmlentities($name);
            $contactEmail =  htmlentities($contactEmail);
            $contactSubject = htmlentities($contactSubject);
            $contactMessage =  htmlentities($contactMessage);


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
            echo "
            <script>Swal.fire({
                    icon: 'Success',
                    title: 'Success',
                    text: 'Email Sent'
                })</script>";         }

             function save_mail($mail) {
            //You can change 'Sent Mail' to any other folder or tag
            $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

            //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
            $imapStream = imap_open($path, $mail->Username, $mail->Password);

            $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
            imap_close($imapStream);

            return $result;
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

                <form id="contact-form" name="contact-form" action="" method="POST"
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

    <!--Footer.PHP-->
    <?php include_once 'footer.php'; ?>

    <!-- WOW.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <!--Form Validation-->
    <script src="js/form-validation.js"> </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

    <!--Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

    <!--Bootstrap JS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>