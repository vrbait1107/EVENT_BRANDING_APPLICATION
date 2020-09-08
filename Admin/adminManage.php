<?php

//--------------------->> DB CONFIG
require_once '../config/configPDO.php';

//--------------------->> START SESSION
session_start();

//--------------------->> DB ADMIN
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
    <meta name="author" content="" />
    <title>Administrator</title>

    <!-- Include Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>


</head>

<body class="sb-nav-fixed">

    <!-- Include Admin Navbar & Include Common Anchor -->
    <?php
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>

    <main id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">

                <!-- Button trigger modal -->
                <button type="button" class="btn justify-content-end btn-primary my-5" data-toggle="modal"
                    data-target="#exampleModal">
                    Click Here to Add Admin Profile
                </button>


                <!--Response Message -->
                <div id="responseMessage"></div>

                <!-- Delete Response Message -->
                <div id="deleteResponse"></div>

                 <!-- Delete Response Message -->
                <div id="updateResponse"></div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADD ADMINISTRATOR PROFILE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <h5 class="text-danger text-center mb-3">Note: Main Addministrator Can Add Only
                                    Faculty
                                    Coordinators</h5>

                                <form>

                                    <div class="form-group">
                                        <label>Enter Your Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email" required>
                                    </div>


                                    <div class="form-group">
                                        <label>Admin Type</label>
                                        <select class="form-control" name="adminType" id="adminType">
                                            <option value="Administrator">Administrator</option>
                                            <option value="Faculty Coordinator">Faculty Coordinator</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Admin Department</label>
                                        <select class="form-control" name="adminDepartment" id="adminDepartment">
                                            <option value="Not Applicable">Not Applicable</option>
                                            <option value="Electronics and Telecommunication">Electronics and
                                                Telecommunication
                                            </option>
                                            <option value="Chemical">Chemical</option>
                                            <option value="Computer">Computer</option>
                                            <option value="Mechanical">Mechanical</option>
                                            <option value="Civil">Civil</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Admin Event</label>
                                        <select class="form-control" name="adminEvent" id="adminEvent">
                                            <option value="Not Applicable">Not Applicable</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="adminPassword" id="adminPassword"
                                            placeholder="Password" required autocomplete="off">
                                    </div>

                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" name="addAdmin" id="addAdmin" data-dismiss="modal"
                                    class="btn btn-primary">Save changes</button>
                            </div>

                        </div>
                    </div>
                </div>



                <!-- Update Modal -->
                <div class="modal fade" id="updateModal1" tabindex="-1" role="dialog"
                    aria-labelledby="updateModal1Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModal1Label">UPDATE ADMINISTRATOR PROFILE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">


                                <form>

                                    <div class="form-group">
                                        <label>Enter Your Email</label>
                                        <input type="email" class="form-control" name="updateEmail" id="updateEmail"
                                            placeholder="Email" required>
                                    </div>


                                    <div class="form-group">
                                        <label>Admin Type</label>
                                        <select class="form-control" name="updateAdminType" id="updateAdminType">
                                            <option value="Administrator">Administrator</option>
                                            <option value="Faculty Coordinator">Faculty Coordinator</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Admin Department</label>
                                        <select class="form-control" name="updateAdminDepartment"
                                            id="updateAdminDepartment">
                                            <option value="Not Applicable">Not Applicable</option>
                                            <option value="Electronics and Telecommunication">Electronics and
                                                Telecommunication
                                            </option>
                                            <option value="Chemical">Chemical</option>
                                            <option value="Computer">Computer</option>
                                            <option value="Mechanical">Mechanical</option>
                                            <option value="Civil">Civil</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Admin Event</label>
                                        <select class="form-control" name="updateAdminEvent" id="updateAdminEvent">
                                            <option value="Not Applicable">Not Applicable</option>
                                        </select>
                                    </div>

                                    <input type="hidden" name="hiddenEmail" id="hiddenEmail">
                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" name = "updateData" id ="updateData"
                                    class="btn btn-info" onclick= "updateAdminDetails()" data-dismiss="modal">Update changes</button>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Administrator Details</div>
            <div class="card-body">
                <div class="table-responsive">
                     <!-- Response of ReadRecord -->
                    <div id="responseAdminData"></div>
                </div>
            </div>
        </div>

        <!--Include Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>

    </main>

    <!--  Include Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!--  Javascript -->
    <script src="js/manageAdmin.js"></script>

     <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>