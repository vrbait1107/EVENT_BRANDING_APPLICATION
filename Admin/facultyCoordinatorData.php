<?php 
require_once "../config.php";
session_start();


// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
if(!isset($_SESSION['adminEmail'])) {
     header("location:adminLogin.php");
 }
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- header Scripts and Links -->
  <?php include_once "../headerScripts.php"; ?>

  <title>GIT SHODH 2K20</title>
</head>

<body>

  <main class="container my-5">
    <div class="row">

      <section class="col-12">

        <div class="text-center mb-3">
          <a href="facultyCoordinatorIndex.php" class="text-white text-center btn btn-primary">Go to Dashboard</a>
        </div>

        <div class="text-center mb-3">
          <a href="../Paytm/PaytmKit/TxnStatus.php" class="btn btn-primary rounded-pill">Click Here for More Banking
            Details</a>
        </div>


        <div class="card mb-4">

          <div class="card-header text-center">
            <h5><i class="fas fa-table mr-1"></i>
              Event Participant Details (Department Level)</h5>
          </div>

          <div class="card-body">
            <div class="table-responsive">

              <?php

        $department = $_SESSION['adminDepartment'];
                
        //Retriving Data From the Database to Show Data in Table

        $sql ="select * FROM user_information INNER JOIN event_information 
        ON user_information.email= event_information.email 
        WHERE event_information.event IN (SELECT admin_information.adminEvent 
        FROM admin_information WHERE adminDepartment ='$department')";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0) {

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
            while($row =mysqli_fetch_assoc($result)){
              ?>

                  <tr>
                    <td class='text-center'> <?php echo $row['certificateId'] ?></td>
                    <td class='text-center'> <?php echo $row['firstName'] ?></td>
                    <td class='text-center'> <?php echo $row['lastName'] ?></td>
                    <td class='text-center'> <?php echo $row['collegeName'] ?></td>
                    <td class='text-center'> <?php echo $row['departmentName'] ?></td>
                    <td class='text-center'> <?php echo $row['academicYear']?> </td>
                    <td class='text-center'> <?php echo $row['event'] ?></td>
                    <td class='text-center'> <?php echo $row['prize'] ?></td>
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
    </div>

    </section>
    </div>
  </main>

  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>

</body>

</html>