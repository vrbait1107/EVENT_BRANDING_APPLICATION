<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

//--------------------->> DB CONFIG
require_once '../config/configPDO.php';

//--------------------->> START SESSION
session_start();

//--------------------->> CHECKING ADMIN
if (!isset($_SESSION['Admin'])) {
    header('Location:synergyLogin.php');
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Include Admin header Scripts -->
  <?php include_once "includes/adminHeaderScripts.php";?>

  <title><?php echo $culturalFestName ?> | SYNERGY ADMINISTRATOR EVENT PARTICIPANT DETAILS</title>

</head>

<body class="sb-nav-fixed">


  <!-- Admin Navbar & Common Anchor-->
  <?php
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>

  <div id="layoutSidenav_content">
    <main class="container-fluid">
      <div class="row">
        <section class="col-12 mt-5">

          <!-- Delete Response -->
          <div id="deleteResponse"></div>
          <!-- Read Record -->
          <div id="responseMessage"></div>

        </section>
      </div>
    </main>

    <!-- Include Admin Footer-->
    <?php include_once "includes/adminFooter.php";?>

  </div>

  <!-- Include Admin Footer Scripts -->
  <?php include_once "includes/adminFooterScripts.php";?>

  <!-- Custom JS -->
  <script src="js/synergyData.js"></script>

  <!-- Close Database Connection -->
  <?php $conn = null;?>

</body>

</html>