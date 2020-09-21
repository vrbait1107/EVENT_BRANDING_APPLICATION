<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

//----------------------------->> DB CONFIG
require_once '../config/configPDO.php';

//----------------------------->> START SESSION
session_start();

//----------------------------->> CHECKING ADMIN
if (!isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if ($_SESSION['adminType'] !== "Student Coordinator") {
        header("location:adminLogin.php");
    }

}

$adminEvent = $_SESSION["adminEvent"];

//-------------------------------->> DISPLAY EVENT DETAILS

$sql = "SELECT * FROM event_information WHERE event = :adminEvent";

//Preparing Query
$result = $conn->prepare($sql);

//Binding Value
$result->bindValue(":adminEvent", $adminEvent);

//Executing Query
$result->execute();

$row = $result->fetch(PDO::FETCH_ASSOC);

$rowCount = $result->rowCount();
$amount = $row['txnAmount'];
$totalAmount = $amount * $rowCount;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?php echo $techfestName ?> | STUDENT COORDINATOR DASHBOARD</title>

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

        <main class="container-fluid">
            <h2 class="mt-4 font-Staatliches-heading font-time text-center text-info">Dashboard for Student Coordinator <br/>
            <span class="text-danger"><?php echo $adminEvent; ?></span>
            </h2>
        <hr/>

            <div class="row">
                <!-- Total Participation of the Events -->
                <section class="col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Participations</div>
                                    <div class="h5 mb-0 font-weight-bold"><?php echo $rowCount; ?> </div>
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
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Earnings</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#8377;
                                        <?php echo $totalAmount; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-rupee-sign fa-3x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

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