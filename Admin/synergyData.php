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
                      <option disabled selected>Choose</option>
                      <option value="None">None</option>
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



      <div class="row">
        <section class="col-12 mt-5">

          <!-- Delete Response -->
          <div id="deleteResponse"></div>
          <!-- Read Record -->
          <div id="responseMessage"></div>
          <!-- Update Response-->
          <div id="updateResponse"></div>

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