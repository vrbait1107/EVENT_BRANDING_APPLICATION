<?php

// Creating Database Connection
require_once "../configPDO.php";
//Starting Session
session_start();

// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
if (!isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if ($_SESSION['adminType'] !== "Administrator") {
        header("location:adminLogin.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Vishal Bait" />
    <title>Event Statistics Charts for Administrator</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>

<body class="sb-nav-fixed">

    <!-- Admin Navbar & Common Anchor -->
    <?php
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>

    <main id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 card">

                    <!-- Google Chart -->
                    <div class="row my-5" style="width: 800px; height: 500px; margin-left: 80px;"
                        id="revenueChartDepartmentWise">
                    </div>

                    <!-- Google Chart -->
                    <div class="row my-5" style="width: 800px; height: 500px; margin-left: 80px;"
                        id="participantCountChartDepartmentWise">
                    </div>


                </div>
            </div>
        </div>

        <!--Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>
    </main>

    <?php
// Admin Footer Scripts
include_once "includes/adminFooterScripts.php";
?>
    <script src="js/adminCharts.js"></script>

    <?php
// Closing Database Connnection
$conn = null;
?>


</body>

</html>