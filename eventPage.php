<?php

//Starting Session
session_start();

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
    <title>Event Page</title>


    <!--  Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>

    <!--NAVBAR-->

    <?php include_once "includes/navbar.php";?>


    <main class="container text-uppercase">
        <div class="row">

            <section class="col-md-4 my-5">
                <div class="wow zoomIn slow">

                    <img src="images/EXTC.jpg" class="img-fluid" style="height:250px">
                    <h5 class="alert alert-info font-time text-center">EXTC
                        ENGINEERING</h5>

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit" class="text-center text-uppercase btn btn-block btn-primary rounded-pill"
                            value="View Events">
                        <input type="hidden" name="eventDepartmentName" value="Electronics and Telecommunication">
                    </form>

                </div>
            </section>

            <section class="col-md-4 my-5">
                <div class="wow zoomIn slow">

                    <img src="images/CHEM.jpg" class="w-100" style="height:250px">
                    <h5 class="alert alert-info font-time text-center">CHEMICAL
                        ENGINEERING</h5>

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit" class="text-center text-uppercase btn btn-block btn-primary rounded-pill"
                            value="View Events">
                        <input type="hidden" name="eventDepartmentName" value="Chemical">
                    </form>

                </div>
            </section>

            <section class="col-md-4 my-5">
                <div class="wow zoomIn slow">
                    <img src="images/COMP.jpg" class="img-fluid" style="height:250px">
                    <h5 class="alert alert-info font-time text-center">COMPUTER
                        ENGINEERING</h5>

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit" class="text-center text-uppercase btn-block btn btn-primary rounded-pill"
                            value="View Events">
                        <input type="hidden" name="eventDepartmentName" value="Computer">
                    </form>

                </div>
            </section>

        </div>


        <div class="row">

            <section class="col-md-4 mb-5">
                <div class="wow zoomIn slow">

                    <img src="images/MECH.jpg" class="img-fluid w-100" style="height:250px">

                    <h5 class="font-time alert alert-info text-center">MECHANICAL
                        ENGINEERING</h5>

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit" class="btn-block text-uppercase text-center btn btn-primary rounded-pill"
                            value="View Events">
                        <input type="hidden" name="eventDepartmentName" value="Mechanical">
                    </form>

                </div>
            </section>

            <section class="col-md-4 mb-5">
                <div class="wow zoomIn slow">

                    <img src="images/CIVIL.jpg" class="img-fluid" style="height:250px">
                    <h5 class="alert alert-info font-time text-center">CIVIL
                        ENGINEERING</h5>

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit" class="text-center text-uppercase btn-block btn btn-primary rounded-pill"
                            value="View Events">
                        <input type="hidden" name="eventDepartmentName" value="Civil">
                    </form>

                </div>
            </section>
        </div>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <!-- Footer PHP -->
    <?php include_once "includes/footer.php";?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php";?>


</body>

</html>