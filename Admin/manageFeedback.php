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

    <title>Manage Feedback</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">


    <!-- Admin Navbar -->
    <?php include_once "includes/adminNavbar.php";?>


    <div id="layoutSidenav_content">
        <main class="container-fluid">

            <h1 class="font-time mt-3 mb-1">Manage Feedbacks</h1> <br />
            <div class="row">
                <section class="col-md-12">
                    <div id="readRecordFeedback"></div>
                </section>
            </div>
        </main>


        <!-- Add Modal -->
        <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackModalLabel">FEEDBACK INFORMATION</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <h5 class="text-info">Q.1 Have you participated in any event in GIT SHODH before? </h5>
                        <p id="responseQ1"></p>
                        <hr />

                        <h5 class="text-info">Q.2 How likely are you to attend one of our events in the future?</h5>
                        <p id="responseQ2"></p>
                        <hr />

                        <h5 class="text-info">Q.3 How likely are you to recommend our events to a friend?</h5>
                        <p id="responseQ3"></p>
                        <hr />

                        <h5 class="text-info">Q.4 What did you like most about the event?</h5>
                        <p id="responseQ4"></p>
                        <hr />

                        <h5 class="text-info">Q.5 What did you like least about the event?</h5>
                        <p id="responseQ5"></p>
                        <hr />

                        <h5 class="text-info">Q.6 Overall Satisfaction</h5>
                        <p>1. Overall Satisfaction</p>
                        <p id="responseQ61"></p>
                        <p>2. Location</p>
                        <p id="responseQ62"></p>
                        <p>3. Event</p>
                        <p id="responseQ63"></p>
                        <p>4. Event Coordinator</p>
                        <p id="responseQ64"></p>
                        <p>5. Event Price</p>
                        <p id="responseQ65"></p>
                        <hr />

                        <h5 class="text-info">Q.7 How can we improve this event?</h5>
                        <p id="responseQ7"></p>
                        <hr />

                        <h5 class="text-info">Submitted Date</h5>
                        <p id="responseDate"></p>
                        <hr />
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>




        <!--Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>
    </div>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!-- Custom Js Script -->
    <script src="js/manageFeedback.js"></script>

    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>