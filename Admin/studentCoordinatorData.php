<?php 
require_once "../config.php";
session_start();


// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
      if(!isset($_SESSION['adminEmail']) &&  
      $_SESSION['adminType'] && 
      $_SESSION['adminDepartment'] && 
      $_SESSION['adminEvent']){
      header('Location:adminLogin.php');
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
  <!-- Animate css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!-- sweetAlert.js -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <title>GIT SHODH 2K20</title>

  <style>
    .btn {
      margin-bottom: 5px;
      text-align: center;
    }

    body {
      margin-top: 50px;
    }

    .nav-link {
      font-size: 20px;
      font-weight: bold;
    }
  </style>

</head>

<body>

  <?php


// #############################   SQL Querry for Update the Data  ###########################


  if(isset($_REQUEST['update'])) { // Checking if the Field is Empty or Not

  if(($_REQUEST['firstName'])== "" || ($_REQUEST['lastName'])== "" || ($_REQUEST['certificateId']=="")) {
  echo "<small>Please Fill All Field </small> <hr>";
}

else {

  $firstName= $_POST['firstName'];
  $lastName= $_POST['lastName'];
  $prize = $_POST['prize'];
  $attendStatus = $_POST['attendStatus'];
  
  $sql1 = "update user_information INNER JOIN event_information 
  ON user_information.email= event_information.email
  SET user_information.firstName ='$firstName',
  user_information.lastName ='$lastName', 
  event_information.prize = '$prize',
  attendStatus = '$attendStatus'
  WHERE event_information.certificateId={$_REQUEST['certificateId']}";

  if(mysqli_query($conn,$sql1)){

    echo "<script>Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Data Successfully Updated'
      })</script>";
  }
    else {
      echo "<script>Swal.fire({
          icon: 'error',
          title: 'ERROR',
          text: 'Unable to Update Data'
        })</script>";
    
  }

}

  }

  // When Edit button is Pressed Retrive the Data in Form to Update Data


  if(isset($_REQUEST['edit'])) {

    $sql ="select * FROM user_information INNER JOIN event_information ON 
    user_information.email= event_information.email 
    where certificateId = {$_REQUEST['certificateId']}";
  
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
  }
  

// #############################   SQL Querry for Delete the Data  ###########################

if(isset($_REQUEST['delete'])) {

  $sql ="delete  FROM event_information 
  where certificateId = {$_REQUEST['certificateId']}";

  $result = mysqli_query($conn,$sql);

  if($result){
    
    echo "<script>Swal.fire({
        icon: 'success',
        title: 'Deleted',
        text: 'Your Data has been Deleted'
      })</script>";
  }
    else {
      echo "<script>Swal.fire({
          icon: 'error',
          title: 'ERROR',
          text: 'Unable to Delete Data'
        })</script>";
    
  }
  
}

?>


  <main class="container">
    <div class="row">

      <section class="col-md-6 offset-md-3">

        <div class="text-center mb-3 nav-link">
          <a href="studentCoordinatorIndex.php" class="text-center btn btn-info text-white">Go to Dashboard</a>
        </div>

        <div class="card shadow p-5 mb-5">

          <div class="card-header mb-3 text-center">
            <h5>Edit/Update Participant Details</h5>
          </div>


          <!-- The Form that is Used for Edit Data -->

          <form class="form1" action="" method="post">

            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" value="<?php 
          if(isset($row['firstName'])){
            echo $row['firstName'];
            } 
            ?>" required>
            </div>

            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" value="<?php 
          if(isset($row['lastName'])){
            echo $row['lastName'];
            } 
            ?>" required>
            </div>

            <div class="form-group">
              <label>Prize</label>
              <select class="form-control" name="prize" id="prize">
                <option value="NONE">None</option>
                <option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
              </select>
            </div>

            <div class="form-group">
              <label>Attendance Status</label>
              <select class="form-control" name="attendStatus" id="attendStatus">
                <option value="absent">Absent</option>
                <option value="present">Present</option>
              </select>
            </div>

            <input type="submit" class="btn btn-primary rounded-pill btn-block" value="Update" name="update">

          </form>
        </div>
      </section>
    </div>


    <div class="row">
      <section class="col-md-12">

        <div class="card mb-4">

          <div class="card-header text-center">
            <h5><i class="fas fa-table mr-1"></i>
              Event Participant Details (Event Level)</h5>
          </div>

          <div class="card-body">
            <div class="table-responsive">


              <?php

                // Retrive the data from the database in table
                $event = $_SESSION['adminEvent'];
        

                $sql ="select * FROM user_information INNER JOIN event_information ON 
                user_information.email= event_information.email 
                where event_information.event ='$event' ORDER By firstName ASC";

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
                  <th class='text-success text-center'>Attend Status</th>
                  <th class='text-success text-center'>Action</th>
                  <th class='text-success text-center'>TXN Amount</th>
                  <th class='text-success text-center'>Order Id</th>
                  <th class='text-success text-center'>TXN ID</th>
                  <th class='text-success text-center'> Bank TXN Id</th>
                  <th class='text-success text-center'>TXN Date</th>
                  <th class='text-success text-center'>TXN Status</th>

                </thead>

                <tbody>

                  <?php
                  while($row = mysqli_fetch_assoc($result)){
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
                    <td class='text-center'> <?php echo $row['attendStatus'] ?></td>


                    <td>
                      <form class="text-center" action="">
                        <input type="hidden" name="certificateId" value='<?php echo $row ["certificateId"] ?>'>
                        <input type="submit" class="btn btn-sm btn-primary text-white font-weight-bold" value="EDIT"
                          name="edit">
                        <input type="submit" class="btn btn-sm btn-danger text-white font-weight-bold" value="DELETE"
                          name="delete">
                      </form>
                    </td>

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

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>

</body>


</html>