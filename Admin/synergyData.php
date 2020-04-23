<?php 
require_once "../config.php";
session_start();

// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
if(!isset($_SESSION['Admin'])){
    header('Location:synergyLogin.php');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

    <title>GIT SYNERGY 2K20</title>

    <style>
    .btn {
      margin-bottom:5px;
      text-align:center;
    }

    body {
      margin-top:50px;
    }

    .form1 {
      margin-bottom: 100px;
    }
    
    </style>
  </head>

  <body>

  <?php


// #############################   SQL Querry for Delete the Data  ###########################

if(isset($_REQUEST['delete'])) {

  $sql ="delete  FROM synergy_user_information where certificateId = {$_POST['certificateId']}";
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
          <section class="col-12">

<div class="text-center mb-5">
          <a href="synergyIndex.php" class= "btn btn-primary">Go to Dashboard</a>
  </div>
          <?php
         
        
$sql ='select * FROM synergy_user_information';
$result = mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0) {

echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
echo "<thead>";
echo "<th class='text-success text-center'>Certificate ID</th>";
echo "<th class='text-success text-center'>First Name</th>";
echo "<th class='text-success text-center'>Last Name</th>";
echo "<th class='text-success text-center'>Department Name</th>";
echo "<th class='text-success text-center'>Event</th>";
echo "<th class='text-success text-center'>Prize</th>";
echo "<th class='text-success text-center'>Action</th>";
echo "</thead>";

echo "<tbody>";

while($row =mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td class='text-center'>". $row['certificateId']. "</td>";
    echo "<td class='text-center'>". $row['firstName']. "</td>";
    echo "<td class='text-center'>". $row['lastName']. "</td>";
    echo "<td class='text-center'>". $row['departmentName'] ."</td>";
    echo "<td class='text-center'>" .$row['eventName']  . "</td>";
    echo "<td class='text-center'>" .$row['prize']  . "</td>";
    echo '<td >
    <form action="synergyCertificate.php"class="text-center" method="post">
    <input type="hidden" name="certificateId" value='. $row ["certificateId"].'>
    <input type="submit" class="btn btn-sm btn-primary text-white text-center" value="VIEW CERTIFICATE" name="view">
     </form>
     <form action="" class="text-center" method="post">
     <input type="hidden" name="certificateId" value='. $row ["certificateId"].'>
     <input type="submit" class="btn btn-sm btn-danger text-white text-center" value="DELETE CERTIFICATE" name="delete">
      </form>
    </td>';
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

}

else {
  echo "<h4 class='text-center text-danger'>No Data available in Database</h4>";
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


