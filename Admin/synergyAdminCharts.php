<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

//--------------------->> DB CONFIG
require_once '../config/configPDO.php';

//Starting Session
session_start();

// ---------------------------------------->> CHECKING ADMIN
if (!isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if ($_SESSION['adminType'] !== "Synergy Administrator") {
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
    <meta name="author" content="" />

    <!-- First Include Admin Header Scripts then Google Charts -->
    <?php include_once "includes/adminHeaderScripts.php";?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title><?php echo $techfestName ?> | SHODH ADMINISTRATOR EVENT STATISTICS CHARTS</title>

</head>

<body class="sb-nav-fixed">

    <!-- Include Admin Navbar & Common Anchor -->
    <?php
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>

    <main id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 card">


                    <!-- Google Column Participant Count Chart -->
                    <div class="row my-5" style="width: 800px; height: 500px; margin-left: 80px;"
                        id="participantCountChartEventWise">
                    </div>

                      <!-- Google Pie Participant Count Chart -->
                    <div class="my-5" style="width: 900px; height: 500px; margin-left: 80px;"
                    id="participantCountChartEventWise2">
                    </div>


                </div>
            </div>
        </div>

        <!--Include Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>
    </main>

    <!-- Include Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!-- javascript -->
    <script src="js/synergyAdminCharts.js"></script>

    <!-- Close DB Connection -->
    <?php $conn = null;?>


</body>

</html>