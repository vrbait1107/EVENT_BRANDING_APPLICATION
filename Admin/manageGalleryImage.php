<?php
// Creating Database Connection
require_once '../configPDO.php';
// Starting Session
session_start();

$admin = $_SESSION['adminEmail'];
if (!isset($_SESSION['adminEmail'])) {
    header('location:adminLogin.php');
}

// Include Common Anchor
include_once "includes/commonAnchor.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Vishal Bait" />

    <title>Add/Manage Gallery Images </title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">


    <!-- Admin Navbar -->
    <?php include_once "includes/adminNavbar.php";?>


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

        <!--Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>
    </div>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <script src="js/manageGalleryImage.js"></script>

    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>