<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

//--------------------->> DB CONFIG
require_once '../config/configPDO.php';

// ---------------------->> START SESSION
session_start();

//------------------------>> CHECKING ADMIN
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
    <title><?php echo $culturalFestName ?> | SYNERGY ADMINISTRATOR DASHBOARD</title>

    <!-- Include Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">


    <!-- Include Admin Navbar & Common Anchor -->
    <?php
$_SESSION['adminType'] = 'Synergy Administrator';
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>

    <div id="layoutSidenav_content">

        <main class="container">
                <h1 class="mt-4 font-Staatliches-heading text-center text-info">Dashboard for Synergy Administrator</h1>
                <hr />
        </main>

        <!--Include Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>

    </div>

    <!-- Include Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>