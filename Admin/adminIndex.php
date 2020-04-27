<?php 
require_once "../config.php";
session_start();

    // Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
    if(!isset($_SESSION['adminEmail'])) {
        header("location:adminLogin.php");
    }


    // Display Participation count & total revenue
    $sqlData ="select * from event_information";

    $resultData = mysqli_query($conn,$sqlData);
    $rowCount = mysqli_num_rows($resultData);
   
    $totalAmount = 0;

    while($rowData = mysqli_fetch_assoc($resultData)){
     $totalAmount =   $totalAmount + $rowData['txnAmount'];
    } 

     // display admin information count (Student Coordinator) for college
    
    $sqlDataAdmin ="select * from admin_information
    WHERE adminType='Student Coordinator'";

    $resultDataAdmin = mysqli_query($conn,$sqlDataAdmin);
    $rowCountAdmin = mysqli_num_rows($resultDataAdmin);


     // display admin information count (Faculty Coordinator) for college
    $sqlDataAdmin2 ="select * from admin_information
    WHERE adminType='Faculty Coordinator'";

    $resultDataAdmin2 = mysqli_query($conn,$sqlDataAdmin2);
    $rowCountAdmin2 = mysqli_num_rows($resultDataAdmin2);

    
    // Participation Count Department Wise

    function count1 ($department) {

        global $conn;

        $sql = "select * from event_information where event in 
        (select eventName from events_details_information where eventDepartment = '$department')";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        return $row;
    }


     // Display   total revenue departmet wise
    function countRevenue($department) {
    global $conn;
    $sql = "select * from event_information where event in 
        (select eventName from events_details_information where eventDepartment = '$department')";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    $totalAmount = 0;

    while($row = mysqli_fetch_assoc($result)){
     $totalAmount =   $totalAmount + $row['txnAmount'];
    } 

    return $totalAmount;
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
    <title>Administrator</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

</head>

<body class="sb-nav-fixed">

    <!-- Admin Navbar -->
    <?php

    $adminFileName = "adminIndex.php";
    $adminFileData = "adminIndexData.php";
    $adminManage = "adminManage.php";
   
    include_once "includes/adminNavbar.php";
    ?>

    <div id="layoutSidenav_content">

        <main class="container-fluid">

            <h2 class="mt-4 font-time text-uppercase">Dashboard for Administrator</h2>

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
                                    <div class="h5 mb-0 font-weight-bold">&#8377;
                                        <?php echo $totalAmount; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-rupee-sign text-warning fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Total Faculty Admministartor Count -->
                <section class="col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Faculty Coordinator</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $rowCountAdmin2; ?></div>
                                </div>
                                <div class="col-auto">
                                    <img src="https://img.icons8.com/wired/50/000000/admin-settings-male.png" /> </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Total Admin Count for Student Coordinator -->
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

            <hr>

            <!-- Collaspe Bar for Display Data-->

            <div class="accordion" id="accordionExample">
                <div class="card">

                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                <h5 class="text-center text-uppercase my-4 font-time">Participation Count and Revenue Department
                                    Wise</h5>
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">


                        <div class="row">

                            <?php
                    
                                    $departmentArray =["Electronics and Telecommunication", "Chemical", "Computer", "Civil", "Mechanical"];
                                    for($i= 0; $i < 5; $i++) {
                    
                                ?>

                            <!-- Total Participation Count Department Wise -->
                            <section class="col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Participation <br>
                                                    <span class="text-danger"> <?php echo  $departmentArray[$i]; ?>
                                                    </span>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo count1 ($departmentArray[$i]);?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-3x text-warning"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>




                               <!-- Total Revenue Department Wise -->
                            <section class="col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Revenue <br>
                                                    <span class="text-danger"> <?php echo  $departmentArray[$i]; ?>
                                                    </span>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                   &#8377; <?php echo countRevenue($departmentArray[$i]);?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                 <i class="fas fa-rupee-sign text-warning fa-3x"></i>                                            </div>
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
        <?php include_once "includes/adminFooter.php"; ?>
    </div>


    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php"; ?>

</body>

</html>