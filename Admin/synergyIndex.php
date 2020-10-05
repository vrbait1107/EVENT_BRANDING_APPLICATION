<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

//--------------------->> DB CONFIG
require_once '../config/configPDO.php';

// ---------------------->> START SESSION
session_start();

//------------------------>> CHECKING ADMIN
if (!isset($_SESSION['Admin'])) {
    header('location:synergyLogin.php');
}
?>

<?php
try {

    //------------------------->>  DISPLAY PARTICIPATION COUNT

    $sql = "SELECT * FROM synergy_event_registrations";
    $result = $conn->prepare($sql);
    $result->execute();
    $rowParticipantCount = $result->rowCount();

    //------------------------->>  EXTRACT EVENT NAME IN ARRAY

    $sql1 = "SELECT * FROM synergy_events_details";
    $result1 = $conn->prepare($sql1);
    $result1->execute();

    $eventArray = array();

    while ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
        array_push($eventArray, $row1['eventName']);
    }

    //------------------------->>  DISPLAY PARTICIPATION COUNT EVENT WISE

    function participantCount($conn, $event)
    {
        $sql = "SELECT * FROM synergy_event_registrations WHERE eventName = :event";
        $result = $conn->prepare($sql);
        $result->bindValue(":event", $event);
        $result->execute();
        $count = $result->rowCount();
        return $count;
    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
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
    <title><?php echo $culturalFestName ?> | SYNERGY ADMINISTRATOR DASHBOARD</title>

    <!-- Include Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">


    <!-- Include Admin Navbar & Common Anchor -->
    <?php
$_SESSION['adminType'] = 'Synergy Administrator';
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>

    <div id="layoutSidenav_content">

        <main class="container">
            <h1 class="mt-2 font-Staatliches-heading text-center text-info">Dashboard for Synergy Administrator</h1>
            <hr />


            <div class="row">
                <!-- Total Participation of the Events -->
                <section class="col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Participations</div>
                                    <div class="h5 mb-0 font-weight-bold"><?php echo $rowParticipantCount; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-3x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <hr />

            <h4 class="text-center text-info text-uppercase my-4 font-time">Participation Count Event Wise</h4>

            <div class="row">

                <!--Participant Count Event Wise -->

                <?php foreach ($eventArray as $eventName): ?>

                <section class="col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Student Participants <br />
                                        <span class="text-danger"><?php echo $eventName; ?></span>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold">
                                        <?php echo participantCount($conn, $eventName) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-3x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <?php endforeach;?>

            </div>

        </main>

        <!--Include Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>

    </div>

    <!-- Include Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>