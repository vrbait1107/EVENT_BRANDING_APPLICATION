<?php
//--------------------- >> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

//--------------------->> DB CONFIG
require_once '../config/configPDO.php';

//--------------------->> START SESSION
session_start();

$admin = $_SESSION['adminEmail'];

//--------------------->> CHECKING ADMIN
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
    <meta name="author" content="" />

    <title><?php echo $techfestName ?> | ADMINISTARTOR MANAGE FEEDBACK</title>

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
        <main class="container">

            <h1 class="font-Staatliches-heading text-center text-info mt-3 mb-1">MANAGE FEEDBACKS</h1>
            <hr />

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary mb-5" data-toggle="modal"
                data-target="#statisticsModal">
                View Statistics
            </button>

            <div class="row">
                <section class="col-md-12">
                    <div id="readRecordFeedback"></div>
                </section>
            </div>
        </main>


        <!-- Feedback Modal -->
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
                        <p>2. Location</p>
                        <p id="responseQ62"></p>
                        <p>3. Event</p>
                        <p id="responseQ63"></p>
                        <p>4. Event Coordinator</p>
                        <p id="responseQ64"></p>
                        <p>5. Event Fee</p>
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


        <!-- Statistics Modal -->
        <div class="modal fade" id="statisticsModal" tabindex="-1" role="dialog" aria-labelledby="statisticsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statisticsModalLabel">FEEDBACK INFORMATION STATISTICS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div id="statisticsData">

                            <div>
                                <label for="totalFeedback" style="font-size: 20px;">Total Feedback Submitted</label>
                                <p id="totalFeedback"></p>
                            </div>

                            <hr />

                            <div>
                                <label for="likelyAttendRating" style="font-size: 20px;">Average Likely Attend
                                    Rating</label>
                                <p id="likelyAttendRating"></p>
                            </div>

                            <hr />

                            <div>
                                <label for="likelyRecommendRating" style="font-size: 20px;">Average Recommend
                                    Rating</label>
                                <p id="likelyRecommendRating"></p>
                            </div>

                            <hr />

                            <div>
                                <label for="eventLocationRating" style="font-size: 20px;">Average Event Location
                                    Rating</label>
                                <p id="eventLocationRating"></p>
                            </div>

                            <hr />

                            <div>
                                <label for="eventRating" style="font-size: 20px;">Average Event Rating</label>
                                <p id="eventRating"></p>
                            </div>

                            <hr />


                            <div>
                                <label for="eventCoordinatorRating" style="font-size: 20px;">Average Event Coordinator
                                    Rating</label>
                                <p id="eventCoordinatorRating"></p>
                            </div>

                            <hr />

                            <div>
                                <label for="eventFeeRating" style="font-size: 20px;">Average Event Fee Rating</label>
                                <p id="eventFeeRating"></p>
                            </div>

                            <hr />

                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


        <!--Include Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>
    </div>

    <!-- Include Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!-- Javascript -->
    <script src="js/manageFeedback.js"></script>

    <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>