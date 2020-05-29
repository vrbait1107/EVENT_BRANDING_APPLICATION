<?php 

//Starting Database Conection
require_once "../configPDO.php";

// Starting Session
session_start();


// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
    if( !isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if($_SESSION['adminType'] !== "Faculty Coordinator"){
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
    <title>Dashboard-Faculty Coordinator</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

</head>

<body class="sb-nav-fixed">

    <!-- Admin Navbar -->
    <?php

    $adminFileName = "facultyCoordinatorIndex.php";
    $adminFileData = "facultyCoordinatorData.php";
    $adminManage =  "facultyCoordinatorManage.php";
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
                                <h5 class="text-danger text-center mb-3">Note: Faculty Coordinator Can Add Only
                                    Student
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
                                            <option value="Faculty Coordinator">Faculty Coordinator</option>
                                            <option value="Student Coordinator">Student Coordinator</option>
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
                                            <option value="EXTC Paper Presentation">EXTC Paper Presentation</option>
                                            <option value="EXTC Poster Presentation">EXTC Poster Presentation</option>
                                            <option value="EXTC Project Presentation">EXTC Project Presentation</option>
                                            <option value="Tech Boss">Tech Boss</option>
                                            <option value="Fun Tech">Fun Tech</option>
                                            <option value="School Event">School Event</option>
                                            <option value="Logo Contest">Logo Contest</option>
                                            <option value="Calci War">Calci War</option>
                                            <option value="Chemical Paper Presentation">Chemical Paper Presentation
                                            </option>
                                            <option value="Chemical Poster Presentation">Chemical Poster Presentation
                                            </option>
                                            <option value="Chemical Project Presentation">Chemical Project Presentation
                                            </option>
                                            <option value="Computer Paper Presentation">Computer Paper Presentation
                                            </option>
                                            <option value="Computer Poster Presentation">Computer Poster Presentation
                                            </option>
                                            <option value="Computer Project Presentation">Computer Project Presentation
                                            </option>
                                            <option value="Mechanical Paper Presentation">Mechanical Paper Presentation
                                            </option>
                                            <option value="Mechanical Poster Presentation">Mechanical Poster
                                                Presentation
                                            </option>
                                            <option value="Mechanical Project Presentation">Mechanical Project
                                                Presentation
                                            </option>
                                            <option value="Civil Paper Presentation">Civil Paper Presentation</option>
                                            <option value="Civil Poster Presentation">Civil Poster Presentation</option>
                                            <option value="Civil Project Presentation">Civil Project Presentation
                                            </option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password" required autocomplete="off">
                                    </div>

                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" name="addFacultyAdmin" id="addFacultyAdmin" data-dismiss="modal"
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
                                            <option value="Faculty Coordinator">Faculty Coordinator</option>
                                            <option value="Student Coordinator">Student Coordinator</option>
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
                                            <option value="EXTC Paper Presentation">EXTC Paper Presentation</option>
                                            <option value="EXTC Poster Presentation">EXTC Poster Presentation</option>
                                            <option value="EXTC Project Presentation">EXTC Project Presentation</option>
                                            <option value="Tech Boss">Tech Boss</option>
                                            <option value="Fun Tech">Fun Tech</option>
                                            <option value="School Event">School Event</option>
                                            <option value="Logo Contest">Logo Contest</option>
                                            <option value="Calci War">Calci War</option>
                                            <option value="Chemical Paper Presentation">Chemical Paper Presentation
                                            </option>
                                            <option value="Chemical Poster Presentation">Chemical Poster Presentation
                                            </option>
                                            <option value="Chemical Project Presentation">Chemical Project Presentation
                                            </option>
                                            <option value="Computer Paper Presentation">Computer Paper Presentation
                                            </option>
                                            <option value="Computer Poster Presentation">Computer Poster Presentation
                                            </option>
                                            <option value="Computer Project Presentation">Computer Project Presentation
                                            </option>
                                            <option value="Mechanical Paper Presentation">Mechanical Paper Presentation
                                            </option>
                                            <option value="Mechanical Poster Presentation">Mechanical Poster
                                                Presentation
                                            </option>
                                            <option value="Mechanical Project Presentation">Mechanical Project
                                                Presentation
                                            </option>
                                            <option value="Civil Paper Presentation">Civil Paper Presentation</option>
                                            <option value="Civil Poster Presentation">Civil Poster Presentation</option>
                                            <option value="Civil Project Presentation">Civil Project Presentation
                                            </option>
                                        </select>
                                    </div>

                                    <input type="hidden" name="hiddenEmail" id="hiddenEmail">
                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" name="updateData" id="updateData" class="btn btn-info"
                                    onclick="updateAdminDetails()" data-dismiss="modal">Update changes</button>
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
                    <div id="responseFacultyAdminData"></div>
                </div>
            </div>
        </div>


        <!--Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>

    </main>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php"; ?>

    <!-- Custom js -->
    <script src="js/manageFacultyCoordinator.js"></script>

    <?php
    // closing Database Connnection
     $conn = null; 
     ?>

</body>

</html>