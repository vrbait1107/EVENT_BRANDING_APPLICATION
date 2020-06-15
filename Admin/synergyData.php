<?php
// Starting Database Connection
require_once "../configPDO.php";
// Starting Session
session_start();

// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
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

  <!-- Admin header Scripts -->
  <?php include_once "includes/adminHeaderScripts.php";?>

  <title>GIT SYNERGY 2K20</title>

</head>

<body class="sb-nav-fixed">


  <!-- Admin Navbar -->
  <?php

$adminFileName = "synergyIndex.php";
$adminFileData = "synergyData.php";
$adminManage = "#";
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

    <!--Admin Footer-->
    <?php include_once "includes/adminFooter.php";?>

  </div>

  <!-- Admin Footer Scripts -->
  <?php include_once "includes/adminFooterScripts.php";?>

  <!-- Custom JS -->
  <script src="js/synergyData.js"></script>

  <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>