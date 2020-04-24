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


    <!--  Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- header Scripts and Links -->
    <?php include_once "headerScripts.php"; ?>

</head>

<body>

    <!--NAVBAR-->

    <?php include_once "navbar.php"; ?>


    <main class="container text-uppercase">
        <div class="row">
            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title text-success font-time text-center mt-2">EXTC
                        ENGINEERING</h3>
                    <img src="images/EXTC.jpg" class="img-fluid" style="height:300px">
                    <a href="extcEvents.php" class="font-sans text-center btn btn-primary my-3 rounded-pill">Click
                        Here to View EXTC events</a>
                </div>
            </section>

            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title text-success font-time text-center mt-2">CHEMICAL
                        ENGINEERING</h3>
                    <img src="images/CHEM.jpg" class="w-100" style="height:300px">
                    <a href="chemEvents.php" class="text-center font-sans btn btn-primary my-3 rounded-pill">Click
                        Here
                        to View CHEMICAL events</a>
                </div>
            </section>
        </div>


        <div class="row">
            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title text-success font-time text-center  mt-2">COMPUTER
                        ENGINEERING</h3>
                    <img src="images/COMP.jpg" class="img-fluid" style="height:300px">
                    <a href="compEvents.php" class="text-center font-sans btn btn-primary my-3 rounded-pill">Click
                        Here
                        to View COMPUTER events</a>
                </div>
            </section>


            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title font-time text-success text-center mt-2">MECHANICAL
                        ENGINEERING</h3>
                    <img src="images/MECH.jpg" class="img-fluid" style="height:300px">
                    <a href="mechEvents.php" class="text-center font-sans btn btn-primary my-3 rounded-pill">Click
                        Here
                        to View MECHANICAL events</a>
                </div>
            </section>
        </div>



        <div class="row">
            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title text-success font-time text-center mt-2">CIVIL
                        ENGINEERING</h3>
                    <img src="images/CIVIL.jpg" class="img-fluid" style="height:300px">
                    <a href="civilEvents.php" class="text-center font-sans btn btn-primary my-3 rounded-pill">Click
                        Here
                        to View CIVIL events</a>
                </div>
            </section>
        </div>
    </main>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <!-- Footer PHP -->
    <?php include_once "footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "footerScripts.php"; ?>


</body>

</html>