<?php 
// Creating Database Connection
require_once "../configNew.php";
// Starting Session
session_start();

// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page

 // Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
    if( !isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if($_SESSION['adminType'] !== "Administrator"){
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

  <title>GIT SHODH 2K20 Administrator Dashboard</title>


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
      <div class="row">

        <section class="col-md-12">

          <div class="text-center my-3">
            <a href="../Paytm/PaytmKit/TxnStatus.php" class="btn btn-primary rounded-pill">Click Here for More Banking
              Details</a>
          </div>


          <div class="card mb-4">

            <div class="card-header text-center">
              <h5><i class="fas fa-table mr-1"></i>
                Event Participant Details (College Level)</h5>
            </div>

            <div class="card-body">
              <div class="table-responsive">

                <?php

                  //  Retriving all the Information From the Database

                  $sql ="select * FROM user_information INNER JOIN event_information ON 
                  user_information.email= event_information.email ORDER By firstName ASC";

                  $result = $conn->query($sql);

                  if($result->num_rows >0) {

                ?>

                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>

                  <thead>
                    <th class='text-success text-center'>Certificate ID</th>
                    <th class='text-success text-center'>First Name</th>
                    <th class='text-success text-center'>Last Name</th>
                    <th class='text-success text-center'>College Name</th>
                    <th class='text-success text-center'>Department Name</th>
                    <th class='text-success text-center'>Academic Year</th>
                    <th class='text-success text-center'>Event</th>
                    <th class='text-success text-center'>Prize</th>
                    <th class='text-success text-center'>TXN Amount</th>
                    <th class='text-success text-center'>Order Id</th>
                    <th class='text-success text-center'>TXN ID</th>
                    <th class='text-success text-center'> Bank TXN Id</th>
                    <th class='text-success text-center'>TXN Date</th>
                    <th class='text-success text-center'>TXN Status</th>
                  </thead>

                  <tbody>

                    <?php
          while($row = $result->fetch_assoc()){ 
          ?>

                    <tr>
                      <td class='text-center'> <?php echo $row['certificateId']?> </td>
                      <td class='text-center'> <?php echo $row['firstName'] ?></td>
                      <td class='text-center'> <?php echo $row['lastName'] ?></td>
                      <td class='text-center'> <?php echo $row['collegeName'] ?> </td>
                      <td class='text-center'> <?php echo $row['departmentName'] ?></td>
                      <td class='text-center'> <?php echo $row['academicYear'] ?></td>
                      <td class='text-center'> <?php echo $row['event'] ?></td>
                      <td class='text-center'> <?php echo $row['prize'] ?> </td>
                      <td class='text-center'> <?php echo $row['txnAmount'] ?> </td>
                      <td class='text-center'> <?php echo $row['orderId'] ?> </td>
                      <td class='text-center'> <?php echo $row['txnId'] ?> </td>
                      <td class='text-center'> <?php echo $row['bankTxnId'] ?> </td>
                      <td class='text-center'> <?php echo $row['txnDate'] ?> </td>
                      <td class='text-center'> <?php echo $row['status'] ?> </td>
                    </tr>

                    <?php 
            }
            ?>

                  </tbody>
                </table>

                <?php
        }
        ?>

              </div>
            </div>
          </div>
        </section>


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