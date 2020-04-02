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
    <title>Event Page</title>
    
<!-- Navbar css -->
    <link rel="stylesheet" href="css/nav.css">
<!--  Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<!--Bootstrap CSS-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--Font-Awesome CSS-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .col-md-6{
        font-family: 'Times New Roman', Times, serif;
        
    }

    .btn {
        font-family: sans-serif !important;
        
    }

</style>

</head>

<body>

    <!--NAVBAR-->

    <?php include_once "navbar.php"; ?>


    <main class="container">
        <div class="row">
            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title text-success font-weight-bold text-center text-uppercase mt-2">EXTC ENGINEERING</h3>
                    <img src="images/EXTC.jpg" class="img-fluid" style="height:300px">
                    <a href="extcEvents.php" class="text-uppercase text-center btn btn-primary my-3 rounded-pill">Click
                        Here to View EXTC events</a>
                </div>
            </section>

        <section class="col-md-6 my-5">
            <div class="card p-4 shadow wow zoomIn slow">
                <h3 class="card-title text-success font-weight-bold text-center text-uppercase mt-2">CHEMICAL ENGINEERING</h3>
                <img src="images/CHEM.jpg" class="w-100" style="height:300px">
                <a href="chemEvents.php" class="text-uppercase text-center btn btn-primary my-3 rounded-pill">Click Here
                    to View CHEMICAL events</a>
            </div>
        </section>
    </div>


    <div class="row">
        <section class="col-md-6 my-5">
            <div class="card p-4 shadow wow zoomIn slow">
                <h3 class="card-title text-success font-weight-bold text-center text-uppercase mt-2">COMPUTER ENGINEERING</h3>
                <img src="images/COMP.jpg" class="img-fluid" style="height:300px">
                <a href="compEvents.php" class="text-uppercase text-center btn btn-primary my-3 rounded-pill">Click Here
                    to View COMPUTER events</a>
            </div>
        </section>
    

        <section class="col-md-6 my-5">
            <div class="card p-4 shadow wow zoomIn slow">
                <h3 class="card-title font-weight-bold text-success text-center text-uppercase mt-2">MECHANICAL ENGINEERING</h3>
                <img src="images/MECH.jpg" class="img-fluid" style="height:300px">
                <a href="mechEvents.php" class="text-uppercase text-center btn btn-primary my-3 rounded-pill">Click Here
                    to View MECHANICAL events</a>
            </div>
        </section>
    </div>

    

    <div class="row">
        <section class="col-md-6 my-5">
            <div class="card p-4 shadow wow zoomIn slow">
                <h3 class="card-title text-success font-weight-bold text-center text-uppercase mt-2">CIVIL ENGINEERING</h3>
                <img src="images/CIVIL.jpg" class="img-fluid" style="height:300px">
                <a href="civilEvents.php" class="text-uppercase text-center btn btn-primary my-3 rounded-pill">Click Here
                    to View CIVIL events</a>
            </div>
        </section>
    </div>
    </main>



    <?php include_once 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
        </script>

    <script src="js/nav.js"></script>
    <script src="js/jquery.min.js"></script>

</body>

</html>