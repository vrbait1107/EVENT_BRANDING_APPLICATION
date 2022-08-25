<?php
//-------------------------------------->> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

// ------------------------------------->> START SESSION
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--First Include Header Script then css -->
    <?php include_once "includes/headerScripts.php";?>
    <link rel="stylesheet" href="css/certificateVerification.css">
    <title><?php echo $techfestName ?> | VERIFY CERTIFICATE</title>

</head>

<body>

    <!-- Include User Navbar -->
    <?php include_once "includes/navbar.php";?>

    <main class="container">
        <div class="row" id="mainContainer">


            <section class="col-md-6">
                <div class="card shadow p-5" data-aos="zoom-in" data-aos-duration="1500">
                    <h3 class="text-center font-time text-uppercase text-primary mb-4">GIT <i><span
                                class="text-danger">SHODH</span></i> Certificate </h3>

                    <form action="verifyCertificate.php" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" id="validate1" name="validateData"
                                placeholder="Enter Your Certificate ID to validate Your Certificate">
                        </div>

                        <input type="submit" name="submit" class="btn btn-block btn-primary rounded-pill mt-4"
                            value="Verify Certificate">

                    </form>
                </div>
            </section>


            <section class="col-md-6">
                <div class="card shadow p-5" data-aos="zoom-in" data-aos-duration="1500">
                    <h3 class="text-center font-time text-uppercase text-secondary mb-4">GIT <i><span
                                class="text-danger">SYNERGY</span></i> Certificate </h3>

                    <form action="verifyCertificate.php" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" name="synergyValidateData"
                                placeholder="Enter Your Certificate ID to validate Your Certificate">
                        </div>

                        <input type="submit" name="synergySubmit" class="btn btn-block btn-secondary rounded-pill mt-4"
                            value="Verify Certificate">
                    </form>
                </div>
            </section>


        </div>
    </main>

     <!-- Include Footer & Footer Scripts -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

</body>

</html>