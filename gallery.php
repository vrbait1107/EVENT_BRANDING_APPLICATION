<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GIT Gallery</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        integrity="sha256-PZLhE6wwMbg4AB3d35ZdBF9HD/dI/y4RazA3iRDurss=" crossorigin="anonymous" />


</head>

<body>

    <!--Navbar.php-->
    <?php include_once "includes/navbar.php" ?>

    <main class="container">
        <h1 class="text-center font-time text-primary text-uppercase my-5">GIT, Lavel Gallery</h1>


        <div class="row mx-auto images">

            <?php

    for($i=1; $i< 21; $i++ ){

        ?>
            <section class="col-md-4 mb-5">
                <a href="gallery/slide<?php echo $i; ?>.jpg">
                    <img src="gallery/slide<?php echo $i; ?>.jpg" class="img-fluid w-100" alt="images"
                        style="height:280px">
                </a>
            </section>
            <?php
    }
    ?>

        </div>
    </main>


    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha256-P93G0oq6PBPWTP1IR8Mz/0jHHUpaWL0aBJTKauisG7Q=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function () {
            $('.images').magnificPopup({
                delegate: "a",
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>

</body>

</html>