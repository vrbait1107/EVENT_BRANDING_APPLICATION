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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--SweetAlert.js-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!--Font-Awesome-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
    crossorigin="anonymous"></script>

  <title>GIT SHODH 2K20 Administrator Dashboard</title>

  <style>
    body {
      margin-top: 50px;
      margin-bottom: 50px;
    }
  </style>
</head>

<body>

  <main class="container">
    <div class="row">

      <section class="col-md-12">

        <div class="text-center mb-3">
          <a href="adminIndex.php" class="btn btn-primary rounded-Pill">Go to Dashboard</a>
        </div>

        <div class="text-center mb-3">
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