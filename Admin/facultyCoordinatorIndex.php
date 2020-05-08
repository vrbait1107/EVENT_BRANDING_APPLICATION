<?php 

 // Creating Database Connection
    require_once "../configNew.php";
//Starting Connection
    session_start();

    // Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
    if( !isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if($_SESSION['adminType'] !== "Faculty Coordinator"){
           header("location:adminLogin.php");
   }
   
    }

    $department = $_SESSION["adminDepartment"];
 
    // display participation count and total revenue

    $sqlData ="select * from event_information
    WHERE event IN (SELECT events_details_information.eventName 
    FROM events_details_information WHERE eventDepartment ='$department')";

    $resultData = $conn->query($sqlData);
    $rowCount = $resultData->num_rows;
   
    $totalAmount = 0;

    while($rowData = $resultData->fetch_assoc()){
     $totalAmount =   $totalAmount + $rowData['txnAmount'];
    } 


    // display admin information count
    $sqlDataAdmin ="select * from admin_information
    WHERE adminType='Student Coordinator' and adminDepartment = '$department'";

    $resultDataAdmin = $conn->query($sqlDataAdmin);
    $rowCountAdmin = $resultDataAdmin->num_rows;

     

    //Extracting Event Name from Database in Array to Show Event Details.

     $sqlData1 ="select eventName from events_details_information
     WHERE eventDepartment ='$department'";

    $resultData1 = $conn->query($sqlData1);

    $events = array();

    while( $rowData1 = $resultData1->fetch_array()){
    array_push($events, $rowData1['eventName']) ;
    }

     // Participation Count Department Wise

    function count1 ($event) {

        global $conn;

        $sql = "select * from event_information where event = '$event'";

        $result = $conn->query($sql);
        $row = $result->num_rows;
        return $row;
    }


     // Display   total revenue departmet wise
    function countRevenue($event) {
    global $conn;

    $sql = "select SUM(txnAmount) as totalAmount from event_information where event = '$event'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalAmount = $row['totalAmount'];
    return $totalAmount+ 0;
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
    $adminManage = "facultyCoordinatorManage.php";
   
    include_once "includes/adminNavbar.php";
    ?>



    <div id="layoutSidenav_content">

        <main class="container-fluid">
            <h2 class="mt-4 text-center font-time text-uppercase">Dashboard for Faculty Coordinator <br />
                <span class="text-danger"><?php echo $_SESSION["adminDepartment"];?></span> </h2>

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

                for($i =0; $i < sizeof($events); $i++){

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


        <!--Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>

    </div>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php"; ?>

    <?php
    // closing Database Connnection
     $conn->close(); 
     ?>

</body>

</html>