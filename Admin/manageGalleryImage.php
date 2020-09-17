<?php

//----------------------------->> DB CONFIG
require_once '../config/configPDO.php';

//----------------------------->> START SESSION
session_start();

$admin = $_SESSION['adminEmail'];

//----------------------------->> CHECKING ADMIN
if (!isset($_SESSION['adminEmail'])) {
    header('location:adminLogin.php');
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

    <title>GIT SHODH 2K20 | ADMINISTARTOR MANAGE GALLERY</title>

    <!-- Include Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">


    <!-- Include Admin Navbar & Common Anchor -->
    <?php
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";

?>


    <div id="layoutSidenav_content">
        <main class="container-fluid">

            <h1 class="font-time mt-3 mb-1">Add/Manage Gallery Images</h1> <br />

            <div class="row">

                <!-- Delete Response -->
                <div id="deleteResponse"></div>

                <section class="col-md-6 offset-md-3">
                    <form id="galleryForm" action="" method="post" enctype="multipart/form-data">
                        <!-- Add Response -->
                        <div id="addResponse" class="my-3"></div>
                        <div class="form-group">
                            <label for="galleryImages">Insert Gallery Images</label> <br />
                            <input type="file" multiple accept=".jpg, .jpeg, .png" name="galleryImages[]"
                                id="galleryImages">
                            <br />
                            <input type="submit" value="Insert" class="btn mt-3 btn-primary rounded-pill btn-block">
                        </div>
                    </form>
                </section>


                <div class="table-responsive">
                    <!-- reading record -->
                    <div id="responseMessage"></div>
                </div>


            </div>
        </main>

        <!--Include Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>
    </div>

    <!-- Include Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

     <!-- Javascript -->
    <script src="js/manageGalleryImage.js"></script>

     <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>