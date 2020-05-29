<?php 
// Creating Database Connection
require_once "../configPDO.php";
// Starting Session
session_start();


// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
    if( !isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if($_SESSION['adminType'] !== "Student Coordinator"){
           header("location:adminLogin.php");
   }
   
    }
      ?>


<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Admin Header Scripts -->
  <?php include_once "includes/adminHeaderScripts.php"; ?>

  <title>GIT SHODH 2K20</title>

</head>

<body class="sb-nav-fixed">

  <!-- Admin Navbar -->
  <?php

    $adminFileName = "studentCoordinatorIndex.php";
    $adminFileData = "studentCoordinatorData.php";
    $adminManage = "#";
   
    include_once "includes/adminNavbar.php";
    ?>


  <main id="layoutSidenav_content">
    <div class="container-fluid">
      <div class="row">


        <!--Response Message -->
        <div id="responseMessage"></div>

        <!-- Delete Response Message -->
        <div id="deleteResponse"></div>

        <!-- Delete Response Message -->
        <div id="updateResponse"></div>


        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">UPDATE PARTICIPANT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form>

                  <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" name="updateFirstName" id="updateFirstName" required>
                  </div>

                  <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" name="updateLastName" id="updateLastName" required>
                  </div>

                  <div class="form-group">
                    <label>Prize</label>
                    <select class="form-control" name="updatePrize" id="updatePrize" required>
                      <option disabled selected>Chooes</option>
                      <option value="NONE">None</option>
                      <option value="First">First</option>
                      <option value="Second">Second</option>
                      <option value="Third">Third</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Attendance Status</label>
                    <select class="form-control" name="updateAttendStatus" id="updateAttendStatus" required>
                      <option disabled selected>Chooes...</option>
                      <option value="absent">Absent</option>
                      <option value="present">Present</option>
                    </select>
                  </div>

                  <input type="hidden" name="hiddenCertificateId" id="hiddenCertificateId">

                </form>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" name="updateData" id="updateData" class="btn btn-info"
                  onclick="updateParticipantDetails()" data-dismiss="modal">Update changes</button>
              </div>

            </div>
          </div>
        </div>



        <div class="card my-4">
          <div class="card-header text-center">
            <h5><i class="fas fa-table mr-1"></i>Event Participant Details (Event Level)</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div id="responseParticipantData"></div>
            </div>
          </div>
        </div>


      </div>
    </div>
    <!--Admin Footer-->
    <?php include_once "includes/adminFooter.php";?>
  </main>

  <!-- Admin Footer Scripts -->
  <?php include_once "includes/adminFooterScripts.php"; ?>

  <!--Custom Js-->
  <script src="js/studentCoordinatorData.js"></script>

  <?php
    // closing Database Connnection
     $conn= null; 
     ?>

</body>

</html>