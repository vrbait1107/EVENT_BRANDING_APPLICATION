<?php 
require_once "../config.php";
session_start();


// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
if(!isset($_SESSION['adminEmail']) &&  $_SESSION['adminType'] && $_SESSION['adminDepartment'] && $_SESSION['adminEvent']){
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

  $firstName= $_REQUEST['firstName'];
  $lastName= $_REQUEST['lastName'];
  $prize = $_REQUEST['prize'];
  $attendStatus = $_POST['attendStatus'];
  
  $sql1 = "update user_information INNER JOIN event_information ON user_information.email= event_information.email
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

            <input type="submit" class="btn btn-primary btn-block" value="Update" name="update">

          </form>
        </div>
      </section>
    </div>


    <div class="row">
      <section class="col-12">

        <?php

          // Retrive the data from the database in table
          $event = $_SESSION['adminEvent'];
        

$sql ="select * FROM user_information INNER JOIN event_information ON 
user_information.email= event_information.email 
where event_information.event ='$event' ORDER By firstName ASC";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0) {

echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
echo "<thead>";
echo "<th class='text-success text-center'>Certificate ID</th>";
echo "<th class='text-success text-center'>First Name</th>";
echo "<th class='text-success text-center'>Last Name</th>";
echo "<th class='text-success text-center'>College Name</th>";
echo "<th class='text-success text-center'>Department Name</th>";
echo "<th class='text-success text-center'>Academic Year</th>";
echo "<th class='text-success text-center'>Event</th>";
echo "<th class='text-success text-center'>Prize</th>";
echo "<th class='text-success text-center'>Attend Status</th>";
echo "<th class='text-success text-center'>Action</th>";
echo "</thead>";

echo "<tbody>";

while($row =mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td class='text-center'>". $row['certificateId']. "</td>";
    echo "<td class='text-center'>". $row['firstName']. "</td>";
    echo "<td class='text-center'>". $row['lastName']. "</td>";
    echo "<td class='text-center'>". $row['collegeName'] ."</td>";
    echo "<td class='text-center'>". $row['departmentName'] ."</td>";
    echo "<td class='text-center'>" .$row['academicYear']  . "</td>";
    echo "<td class='text-center'>" .$row['event']  . "</td>";
    echo "<td class='text-center'>" .$row['prize']  . "</td>";
    echo "<td class='text-center'>" .$row['attendStatus']  . "</td>";
    echo '<td >
    <form  class="text-center" action="">
    <input type="hidden" name="certificateId" value='. $row ["certificateId"].'>
    <input type="submit" 
    class="btn btn-sm btn-primary text-white font-weight-bold" value="EDIT" name="edit">
    <input type="submit" 
    class="btn btn-sm btn-danger text-white font-weight-bold" value="DELETE" name="delete">
    </form>
    </td>';
    
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

}
?>

      </section>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>

</body>


</html>