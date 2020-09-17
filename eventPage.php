<?php

//---------------------------------->> START SESSION
session_start();

//---------------------------------->> CHECKING USER
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
    <title>GIT SHODH 2K20 | DEPARTMENTS</title>

    <!-- First Animate.css then Header Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>

    <!--Include User Navbar-->
    <?php include_once "includes/navbar.php";?>

    <main class="container text-uppercase">
        <div class="row">

            <section class="col-md-4 my-5">
                <div class="wow zoomIn slow">

                    <img src="images/departments/EXTC.jpg" class="img-fluid w-100" style="height:250px">
                    <h5 class="alert alert-info font-time text-center">EXTC
                        ENGINEERING</h5>

                    <form id="extcForm" action="departmentalEvents.php" method="post" >
                        <input type="submit" class="text-center text-uppercase btn btn-block btn-primary rounded-pill"
                            value="View Events">
                            <input type="hidden" name="eventDepartmentName" value="Electronics and Telecommunication">
                    </form>

                </div>
            </section>

            <section class="col-md-4 my-5">
                <div class="wow zoomIn slow">

                    <img src="images/departments/CHEM.jpg" class="img-fluid w-100" style="height:250px">
                    <h5 class="alert alert-info font-time text-center">CHEMICAL
                        ENGINEERING</h5>

                    <form id="chemicalForm" action="departmentalEvents.php" method="post">
                        <input type="submit" class="text-center text-uppercase btn btn-block btn-primary rounded-pill"
                            value="View Events">
                             <input type="hidden" name="eventDepartmentName" value="Chemical">
                    </form>

                </div>
            </section>

            <section class="col-md-4 my-5">
                <div class="wow zoomIn slow">
                    <img src="images/departments/COMP.jpg" class="img-fluid w-100" style="height:250px">
                    <h5 class="alert alert-info font-time text-center">COMPUTER
                        ENGINEERING</h5>

                    <form id="computerForm" action="departmentalEvents.php" method="post">
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

                    <img src="images/departments/MECH.jpg" class="img-fluid w-100" style="height:250px">

                    <h5 class="font-time alert alert-info text-center">MECHANICAL
                        ENGINEERING</h5>

                    <form id="mechanicalForm" action="departmentalEvents.php" method="post">
                        <input type="submit" class="btn-block text-uppercase text-center btn btn-primary rounded-pill"
                            value="View Events">
                             <input type="hidden" name="eventDepartmentName" value="Mechanical">
                    </form>

                </div>
            </section>

            <section class="col-md-4 mb-5">
                <div class="wow zoomIn slow">

                    <img src="images/departments/CIVIL.jpg" class="img-fluid w-100" style="height:250px">
                    <h5 class="alert alert-info font-time text-center">CIVIL
                        ENGINEERING</h5>

                    <form id="civilForm" action="departmentalEvents.php" method="post">
                        <input type="submit" class="text-center text-uppercase btn-block btn btn-primary rounded-pill"
                            value="View Events">
                        <input type="hidden" name="eventDepartmentName" value="Civil">
                    </form>

                </div>
            </section>
        </div>

    </main>

    <!-- WOW.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <!-- Include Footer & Footer Scripts -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

    <!-- Javascript -->
    <script src="js/eventPage.js"></script>

</body>

</html>