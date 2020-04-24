<?php 
require_once "../config.php";
session_start();


// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
if(!isset($_SESSION['adminEmail'])) {
     header("location:adminLogin.php");
 }

   // Display Data related to Events
   $adminEvent = $_SESSION["adminEvent"];

   $sql = "select * from event_information where event = '$adminEvent'";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);

   $rowCount = mysqli_num_rows($result);
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
    <meta name="author" content="Vishal Bait" />

    <title>Dashboard-Student Coordinator</title>

     <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

</head>


<body class="sb-nav-fixed">


    <!-- Admin Navbar -->
    <?php

    $adminFileName = "studentCoordinatorIndex.php";
    $adminFileData = "studentCoordinatorData.php";
    $adminManage = "#";
   
    include_once "includes/adminNavbar.php";
    ?>


    <div id="layoutSidenav_content">

        <main class="container-fluid">
            <h1 class="mt-4 text-center">Dashboard for Student Coordinator <?php echo $adminEvent;?>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>


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
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                    <i class="fas fa-rupee-sign fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2019</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php"; ?>

</body>

</html>