<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//------------------------------>> SECRETS
require_once "./config/Secret.php";

//------------------------------>> STARTING SESSION
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $techfestName ?> | CONTACT US</title>

    <!-- First Include Header Scripts then Google Recaptcha then CkEditor-->
    <?php include_once "includes/headerScripts.php";?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

</head>

<body>

    <!--Include Navbar-->
    <?php include_once "includes/navbar.php";?>

    <main class="mb-5 container">

        <h1 class="text-center mt-5 text-uppercase font-Staatliches-heading" data-aos="zoom-in" data-aos-duration="1500">
            Contact us</h1>
        <hr class="mb-5" style="border-top: 2px solid rgba(0,0,0,.1);"/>

        <h5 class="text-center w-responsive mx-auto mb-3" data-aos="zoom-in" data-aos-duration="1500">Do you have any questions? Please do not
            hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</h5>

        <div class="row">

            <section class="col-md-8" data-aos="zoom-in" data-aos-duration="1500">

                <form id="contactForm" action="" method="POST">

                    <!-- Response Message -->
                    <div id="responseMessage"></div>

                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="">Your Email</label>
                        <input type="text" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Your message</label>
                        <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea"></textarea required>
                    </div>

                    <div class="text-center my-4">
                        <div class="g-recaptcha text-center" data-sitekey= <?php echo $recaptchaSiteKey; ?>>
                        </div>
                    </div>

                    <div class="text-center text-md-left">
                        <input class="btn btn-primary rounded-pill btn-block" type="submit" id="submit" name="submit" value="Send">
                    </div>

                </form>
            </section>


            <section class="col-md-3 text-center" data-aos="zoom-in" data-aos-duration="1500">
                <ul class="list-unstyled">
                    <li><i class="fa fa-map-marker mb-2 fa-3x"></i>
                        <h5 class="text-success mb-5">Gharda Institute of Technology Lavel-Khed, Maharashtra, INDIA</h5>
                    </li>

                    <li><i class="fa fa-phone mb-2 fa-3x"></i>
                        <h5 class="text-success mb-5">+ 01 234 567 89</h5>
                    </li>

                    <li><i class="fa fa-envelope mb-2 fa-3x"></i>
                        <h5 class="text-success">git-india.edu.in</h5>
                    </li>
                </ul>
            </section>

        </div>
    </main>

    <script>
        CKEDITOR.replace("message")
    </script>

    <!--Include Footer & Footer Scripts -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

    <!--Javascript-->
    <script src="js/contactUs.js"> </script>

    <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>