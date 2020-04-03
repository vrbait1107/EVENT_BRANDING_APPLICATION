<?php
session_start();
if(!isset($_SESSION['user'])) {
 header("location:login.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Page</title>



  <!-- Animate CSS-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--AOS ANIMATION-->

    <style>
        h1{
            font-family: 'Times New Roman', Times, serif;
        }
    </style>    
</head>
<body>

    <!-- Navbar-->
    <?php include_once "navbar.php"; ?>

    <main class="container">
        <div class="row">
           
            
            <section class="col-md-10 offset-md-1">
                <div class="card shadow animated zoomIn slow p-5 my-5 text-justify">
                   
                <h1 class="text-white p-1 text-center text-uppercase font-weight-bold bg-info">An OverView</h1>
                <hr>
                <p>SHODH, GIT Lavel is the annual science and technology festival of the Gharda Institute of Technology Lavel. 
                    Started in 2008 with the aim of providing a platform for the Indian student community to develop and showcase 
                    their technical prowess. </p>
                    <p>Year after year, SHODH explores the various aspects of science and technology and the profound impacts they have
                    on our lives. For the last 12 years, SHODH has constantly grown, evolved, and pushed the boundaries of what a 
                    college fest can be. With something to offer for everyone, SHODH is the ideal destination for all technophiles:
                    young or old, beginner or expert, student or professional to witness, learn and experience the wonders of science 
                    and technology.</p>
                   <p> This year marks the 12th Edition of SHODH, GIT Lavel. The fest shall take place from 7th to 8th of March, 
                    2020 at the beautiful, green campus of GIT Lavel in Maharashtra, India. Boasting of a huge roster of exciting and 
                    engaging events, this edition of SHODH promises to be grander, greater and more glorious than ever before.</p>
                  <p> So grab your friends, mark your calendars, and gear up for Kokan’s Largest Science and Technology Festival. </p>
                        
                    </div>
                </section>
        </div>
    </main>


    <?php include_once 'footer.php'; ?>


     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
                         
</body>
</html>