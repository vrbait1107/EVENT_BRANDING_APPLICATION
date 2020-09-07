<?php

//--------------------->> DB CONFIG
require_once '../config/configPDO.php';

// Starting Session
session_start();

$admin = $_SESSION['adminEmail'];

if (!isset($_SESSION['adminEmail'])) {
    header('location:adminLogin.php');
}

// ---------------------------->> COMMON ANCHOR

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

    <title>Manage Sponsors</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">


    <!-- Admin Navbar -->
    <?php include_once "includes/adminNavbar.php";?>


    <div id="layoutSidenav_content">
        <main class="container mt-3">

            <h1 class="font-time mt-3 mb-3">Add/ Manage Sponsors</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn justify-content-end btn-primary my-2" data-toggle="modal"
                data-target="#addModal">
                Click Here to Add Sponsor
            </button>

            <!-- Delete Response -->
            <div id="deleteResponse"></div>
            <!-- Update Response -->
            <div id="updateResponse"></div>
            <!-- Add Response -->
            <div id="addResponse"></div>

            <div class="row">

                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">ADD SPONSOR</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <form id="addSponsorForm" method="POST" enctype="multipart/form-data">

                                    <div class="form-group col-md-12">
                                        <label>Sponsor</label>
                                        <input type="text" name="sponsorName" id="sponsorName" class="form-control">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Sponsored Event</label>
                                        <input type="text" name="sponsoredEvent" id="sponsoredEvent"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Sponsor Department</label>
                                        <input type="text" name="sponsoredDepartment" id="sponsoredDepartment"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Sponsor Logo</label> <br />
                                        <input type="file" name="sponsorLogo" id="sponsorLogo"
                                            accept=".jpg, .jpeg, .png">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="addSponsor" id="addSponsor"
                                            class="btn btn-primary">Add Sponsor </button>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>



                <!-- Update Modal -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">UPDATE SPONSOR</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <form enctype="multipart/form-data">

                                    <div class="form-group col-md-12">
                                        <label>Sponsor</label>
                                        <input type="text" name="updateSponsorName" id="updateSponsorName"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Sponsored Event</label>
                                        <input type="text" name="updateSponsoredEvent" id="updateSponsoredEvent"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Sponsor Department</label>
                                        <input type="text" name="updateSponsoredDepartment"
                                            id="updateSponsoredDepartment" class="form-control">
                                    </div>

                                    <input type="hidden" name="hiddenId" id="hiddenId">

                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" name="updateSponsor" id="updateSponsor" onclick="updateSponsor()"
                                    data-dismiss="modal" class="btn btn-primary">Update Sponsor</button>
                            </div>

                        </div>
                    </div>
                </div>

                <section class="col-md-12">

                    <!-- Reading Record of Sponsor-->
                    <div class="mt-3" id="readRecordSponsor"></div>

                </section>
        </main>
        <!--Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>
    </div>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!-- Custom JS Script -->
    <script src="js/manageSponsor.js"></script>

    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>