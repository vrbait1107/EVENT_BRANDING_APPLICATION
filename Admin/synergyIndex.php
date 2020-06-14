<?php
// Starting DB Connnection
require_once "../configPDO.php";
// Staring Session
session_start();

if (!isset($_SESSION['Admin'])) {
    header('location:synergyLogin.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SYNERGY ADMIN</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">


    <!-- Admin Navbar -->
    <?php

$adminFileName = "synergyIndex.php";
$adminFileData = "synergyData.php";
$adminManage = "#";
$_SESSION['adminType'] = 'Synergy Administrator';

include_once "includes/adminNavbar.php";
?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">

                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

                <!--  ADD Administartor Profile Form  -->
                <div class="row">
                    <section class="col-md-6 offset-md-3">

                        <h3 class="text-white text-center bg-info mb-4 p-2"> ADD DATA FOR CERTIFICATE </h3>

                        <form name="synergyForm" id="synergyForm" method="post">

                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" name="firstName" id="firstName"
                                    placeholder="Enter your First Name" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" name="lastName" id="lastName"
                                    placeholder="Enter your Last Name" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="department">Department</label>
                                <select class="form-control" name="department" id="department">
                                    <option selected disabled>Select Department</option>
                                    <option value="Electronics and Telecommunication">Electronics and
                                        Telecommunication
                                    </option>
                                    <option value="Chemical">Chemical</option>
                                    <option value="Civil">Civil</option>
                                    <option value="Mechanical">Mechanical</option>
                                    <option value="Computer">Computer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="event">Event Name</label>
                                <select class="form-control" name="event" id="event">
                                    <option selected disabled>Select Event</option>
                                    <option value="Singing Competition">Singing Competition</option>
                                    <option value="Antakshari">Antakshari</option>
                                    <option value="Fishpond">Fishpond</option>
                                    <option value="Dance Competition">Dance Competition</option>
                                    <option value="Debate Competition">Debate Competition</option>
                                    <option value="Quiz Competition">Quiz Competition</option>
                                    <option value="Fashion Show Competition">Fashion Show Competition</option>
                                    <option value="Drama Competition">Drama Competition</option>
                                    <option value="Group Discussion Competition">Group Discussion Competition
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="prize">Prize</label>
                                <select class="form-control" name="prize" id="prize">
                                    <option selected disabled>Select Prize</option>
                                    <option value="None">None</option>
                                    <option value="First">First</option>
                                    <option value="Second">Second</option>
                                    <option value="Third">Third</option>
                                </select>
                            </div>

                            <div id="responseMessage"></div>

                            <input type="submit" name="submit" value="submit"
                                class="btn btn-primary rounded-pill btn-block mb-5">

                        </form>
                    </section>
                </div>

                <!--  ADD Administartor Profile Form Complete -->
            </div>
        </main>
        <!--Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>

    </div>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>
    <script src="js/synergyIndex.js"></script>


    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>