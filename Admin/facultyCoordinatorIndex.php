<?php
//------------------------------->> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

//------------------------------->> DB CONFIG
require_once '../config/configPDO.php';

// ------------------------------>> SESSION
session_start();

// ------------------------------>> CHECKING ADMIN
if (!isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if ($_SESSION['adminType'] !== "Faculty Coordinator") {
        header("location:adminLogin.php");
    }

}

$department = $_SESSION["adminDepartment"];

// ------------------------->>  DISPLAY PARTICIPATION COUNT & TOTAL REVENUE

$sqlData = "SELECT * FROM event_information
    WHERE event IN (SELECT events_details_information.eventName
    FROM events_details_information WHERE eventDepartment ='$department')";
$resultData = $conn->prepare($sqlData);
$resultData->bindValue(":department", $department);
$resultData->execute();
$rowCount = $resultData->rowCount();
$totalAmount = 0;

while ($rowData = $resultData->fetch(PDO::FETCH_ASSOC)) {
    $totalAmount = $totalAmount + $rowData['txnAmount'];
}

// ------------------------->>  DISPLAY ADMIN INFORMATION COUNT

$sqlDataAdmin = "SELECT * FROM admin_information
WHERE adminType = :studentCoordinator AND adminDepartment = :department";
$resultDataAdmin = $conn->prepare($sqlDataAdmin);
$resultDataAdmin->bindValue(":studentCoordinator", "Student Coordinator");
$resultDataAdmin->bindValue(":department", $department);
$resultDataAdmin->execute();
$rowCountAdmin = $resultDataAdmin->rowCount();

// ------------------------->>  EXTRACTING EVENT NAME FROM DB IN ARRAY.

$sqlData1 = "SELECT eventName from events_details_information
     WHERE eventDepartment = :department";
$resultData1 = $conn->prepare($sqlData1);
$resultData1->bindValue(":department", $department);
$resultData1->execute();

$events = array();

while ($rowData1 = $resultData1->fetch(PDO::FETCH_ASSOC)) {
    array_push($events, $rowData1['eventName']);
}

// ------------------------->> PARTICIPANTS COUNT EVENT WISE

function count1($event)
{
    global $conn;
    $sql = "SELECT * FROM event_information WHERE event = '$event'";
    $result = $conn->prepare($sql);
    $result->bindValue(":event", $event);
    $result->execute();
    $row = $result->rowCount();
    return $row;
}

//------------------------->> DISPLAY TOTAL REVENUE EVENT WISE

function countRevenue($event)
{
    global $conn;
    $sql = "SELECT SUM(txnAmount) AS totalAmount FROM event_information WHERE event = :event";
    $result = $conn->prepare($sql);
    $result->bindValue(":event", $event);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $totalAmount = $row['totalAmount'];
    return $totalAmount + 0;
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
    <title><?php echo $techfestName ?> | FACULTY COORDINATOR DASHBOARD</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">

    <!-- Include Admin Navbar -->
    <?php
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>



    <div id="layoutSidenav_content">

        <main class="container-fluid">
            <h2 class="mt-4 text-center font-time text-uppercase">Dashboard for Faculty Coordinator <br />
                <span class="text-danger"><?php echo $_SESSION["adminDepartment"]; ?></span> </h2>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>


            <!-- Display Data Related to Event held by Department-->

            <div class="row">
                <!-- Total Participation of the Events -->
                <section class="col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Participations</div>
                                    <div class="h5 mb-0 font-weight-bold"><?php echo $rowCount; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-3x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Total Earnings of Events -->
                <section class="col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Earnings</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#8377;
                                        <?php echo $totalAmount; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-rupee-sign text-warning fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Total student admin -->
                <section class="col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Student Coordinator</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $rowCountAdmin; ?></div>
                                </div>
                                <div class="col-auto">
                                    <img src="https://img.icons8.com/wired/50/000000/admin-settings-male.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <!-- Collaspe Bar for Display Data-->

            <div class="accordion" id="accordionExample">
                <div class="card">

                    <!--Collaspe One-->

                    <div class="card-header" id="headingOne">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            <h5 class="text-center text-uppercase my-2 font-time">Participation Count and Revenue
                                Event
                                Wise</h5>
                        </button>
                    </div>

                    <!--Collaspe One Target-->

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">


                        <div class="row">

                            <?php

for ($i = 0; $i < sizeof($events); $i++) {

    ?>

                            <!-- Total student Participant Event -->

                            <section class="col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Student Participants <br />
                                                    <span class="text-danger"><?php echo $events[$i]; ?></span>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo count1($events[$i]) ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-3x text-warning"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <!-- Total Event Revenue Events Wise -->

                            <section class="col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                    Total Event Revenue <br />
                                                    <span class="text-danger"><?php echo $events[$i]; ?></span>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    &#8377; <?php echo countRevenue($events[$i]) ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-rupee-sign text-warning fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <?php

}

?>

                        </div>
                    </div>
                </div>
            </div>

        </main>


        <!-- Include Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>

    </div>

    <!-- Include Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!-- Closing Database Connnection -->
    <?php $conn = null;?>

</body>

</html>