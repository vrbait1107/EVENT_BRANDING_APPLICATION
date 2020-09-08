<?php

//----------------------------->> START SESSION
session_start();

//----------------------------->> CHECKING USER
if (!isset($_SESSION['user'])) {
    header("location:login.php");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Vishal Bait">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>About Page</title>

   <link rel="stylesheet" href="css/aboutPage.css">

    <!-- First Animate CSS then Include Header Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>

    <!-- Include User Navbar-->
    <?php include_once "includes/navbar.php";?>

    <main class="container">
        <div class="row">


            <section class="col-md-10 offset-md-1">
                <div class="card shadow animated zoomIn slow p-5 my-5 text-justify">

                    <h1 class="text-white p-1 text-center text-uppercase font-time bg-info">An OverView</h1>
                    <hr>
                    <p>SHODH, GIT Lavel is the annual science and technology festival of the Gharda Institute of
                        Technology Lavel.
                        Started in 2008 with the aim of providing a platform for the Indian student community to develop
                        and showcase
                        their technical prowess. </p>
                    <p>Year after year, SHODH explores the various aspects of science and technology and the profound
                        impacts they have
                        on our lives. For the last 12 years, SHODH has constantly grown, evolved, and pushed the
                        boundaries of what a
                        college fest can be. With something to offer for everyone, SHODH is the ideal destination for
                        all technophiles:
                        young or old, beginner or expert, student or professional to witness, learn and experience the
                        wonders of science
                        and technology.</p>
                    <p> This year marks the 12th Edition of SHODH, GIT Lavel. The fest shall take place from 7th to 8th
                        of March,
                        2020 at the beautiful, green campus of GIT Lavel in Maharashtra, India. Boasting of a huge
                        roster of exciting and
                        engaging events, this edition of SHODH promises to be grander, greater and more glorious than
                        ever before.</p>
                    <p> So grab your friends, mark your calendars, and gear up for Kokan’s Largest Science and
                        Technology Festival. </p>

                </div>
            </section>
        </div>
    </main>

    <!-- Include Footer & Footer Scripts -->
    <?php
include_once 'includes/footer.php';
include_once "includes/footerScripts.php";
?>

</body>

</html>