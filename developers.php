<?php

//-------------------------->> START SESSION
session_start();

//-------------------------->> CHECKING USER
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Developer Page</title>


    <!-- First Include Header Scripts then ImageHover.css then AOS Animation-->
    <?php include_once "includes/headerScripts.php";?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/imagehover.css/2.0.0/css/imagehover.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>

    <!--Include User Navbar-->
    <?php include_once "includes/navbar.php";?>

    <main class="container">
        <h3 class="text-center text-uppercase my-5 alert alert-info font-time">Developers</h3>
        <div class="row">


            <section class="col-md-4 mb-5">
                <div class="card shadow p-3" data-aos="zoom-in" data-aos-duration="1500">
                    <figure class="imghvr-zoom-out">
                        <img src="images/developers/developer1.jpg" class="img-fluid" alt="Vishal Bait">

                        <figcaption>
                            <div class="text-center my-3">
                                <h4 class="font-time mb-4">VISHAL BAIT</h4>
                                <h5>Web Designer, Database, Back-End & Front-End Developer </h5>

                                <div class="mt-3">
                                    <h6 class="mb-2">Follow Me on Social Media</h6>
                                    <i class="fab fa-facebook fa-2x ml-2"><a
                                            href="https://www.facebook.com/vrbait1107"></a></i>
                                    <i class="fab fa-instagram fa-2x ml-2"><a
                                            href="https://www.instagram.com/vrbait1107/"></a></i>
                                    <i class="fab fa-twitter fa-2x ml-2"><a
                                            href="https://twitter.com/vrbait1107"></a></i>
                                    <i class="fab fa-linkedin fa-2x ml-2"><a
                                            href="https://in.linkedin.com/in/vrbait1107"></a></i>
                                    <i class="fab fa-github fa-2x ml-2"><a href="https://github.com/vrbait1107"></a></i>
                                </div>
                            </div>

                        </figcaption>
                    </figure>
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <h4 class="font-time mb-2 text-primary">VISHAL BAIT</h4>
                    <h5 class="font-time">Web Designer, Database, Back-End & Front-End Developer </h5>
                </div>
            </section>


            <section class="col-md-4 mb-5">
                <div class="card shadow p-3" data-aos="zoom-in" data-aos-duration="1500">

                    <figure class="imghvr-zoom-out">
                        <img src="images/developers/developer2.jpg" class="img-fluid" alt="Suraj Mohite">

                        <figcaption>
                            <div class="text-center my-3">
                                <h4 class="font-time mb-4">SURAJ MOHITE</h4>
                                <h5>Front-End Developer </h5>

                                <div class="mt-3">
                                    <h6 class="mb-2">Follow Me on Social Media</h6>
                                    <i class="fab fa-facebook fa-2x ml-2"><a href="#"></a></i>
                                    <i class="fab fa-instagram fa-2x ml-2"><a href="#"></a></i>
                                    <i class="fab fa-twitter fa-2x ml-2"><a href="#"></a></i>
                                    <i class="fab fa-linkedin fa-2x ml-2"><a href="#"></a></i>
                                    <i class="fab fa-github fa-2x ml-2"><a href="#"></a></i>
                                </div>
                            </div>

                        </figcaption>
                    </figure>
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <h4 class="font-time mb-2 text-primary">SURAJ MOHITE</h4>
                    <h5 class="font-time">Front-End Developer </h5>
                </div>


            </section>


            <section class="col-md-4 mb-5">
                <div class="card shadow p-3" data-aos="zoom-in" data-aos-duration="1500">

                    <figure class="imghvr-zoom-out">
                        <img src="images/developers/developer3.jpg" class="img-fluid" alt="Onkar Mokashi">
                        <figcaption>

                            <div class="text-center my-3" data-aos="fade-up">
                                <h4 class="font-time mb-4">ONKAR MOKASHI</h4>
                                <h5>Back-End Developer and Android Application Developer </h5>
                            </div>

                            <div class="mt-3 text-center">
                                <h6 class="mb-2">Follow Me on Social Media</h6>
                                <i class="fab fa-facebook fa-2x ml-2"><a href="#"></a></i>
                                <i class="fab fa-instagram fa-2x ml-2"><a href="#"></a></i>
                                <i class="fab fa-twitter fa-2x ml-2"><a href="#"></a></i>
                                <i class="fab fa-linkedin fa-2x ml-2"><a href="#"></a></i>
                                <i class="fab fa-github fa-2x ml-2"><a href="#"></a></i>
                            </div>

                        </figcaption>
                    </figure>
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <h4 class="font-time mb-2 text-primary">ONKAR MOKASHI</h4>
                    <h5 class="font-time">Back-End Developer and Android Application Developer </h5>
                </div>

            </section>
        </div>
    </main>


    <!-- AOS Library-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

     <!-- Include Footer & Footer Script -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

</body>

</html>