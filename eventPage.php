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
            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title text-success font-time text-center mt-2">EXTC
                        ENGINEERING</h3>
                    <img src="images/EXTC.jpg" class="img-fluid" style="height:300px">

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit"
                            class="font-sans text-center text-uppercase btn btn-block btn-primary my-3 rounded-pill"
                            value="Click Here to View EXTC events">
                        <input type="hidden" name="eventDepartmentName" value="Electronics and Telecommunication">
                    </form>

                </div>
            </section>

            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title text-success font-time text-center mt-2">CHEMICAL
                        ENGINEERING</h3>
                    <img src="images/CHEM.jpg" class="w-100" style="height:300px">

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit"
                            class="font-sans text-center text-uppercase btn btn-block btn-primary my-3 rounded-pill"
                            value="Click Here to View CHEMICAL events">
                        <input type="hidden" name="eventDepartmentName" value="Chemical">
                    </form>

                </div>
            </section>
        </div>


        <div class="row">
            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title text-success font-time text-center  mt-2">COMPUTER
                        ENGINEERING</h3>
                    <img src="images/COMP.jpg" class="img-fluid" style="height:300px">

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit"
                            class="font-sans text-center text-uppercase btn-block btn btn-primary my-3 rounded-pill"
                            value="Click Here to View COMPUTER events">
                        <input type="hidden" name="eventDepartmentName" value="Computer">
                    </form>

                </div>
            </section>


            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title font-time text-success text-center mt-2">MECHANICAL
                        ENGINEERING</h3>
                    <img src="images/MECH.jpg" class="img-fluid" style="height:300px">

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit"
                            class="font-sans btn-block text-uppercase text-center btn btn-primary my-3 rounded-pill"
                            value="Click Here to View MECHANICAL events">
                        <input type="hidden" name="eventDepartmentName" value="Mechanical">
                    </form>

                </div>
            </section>
        </div>



        <div class="row">
            <section class="col-md-6 my-5">
                <div class="card p-4 shadow wow zoomIn slow">
                    <h3 class="card-title text-success font-time text-center mt-2">CIVIL
                        ENGINEERING</h3>
                    <img src="images/CIVIL.jpg" class="img-fluid" style="height:300px">

                    <form action="departmentalEvents.php" method="post">
                        <input type="submit"
                            class="font-sans text-center text-uppercase btn-block btn btn-primary my-3 rounded-pill"
                            value="Click Here to View CIVIL events">
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