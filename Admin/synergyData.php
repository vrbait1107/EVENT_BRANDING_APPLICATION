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

  <!-- Admin header Scripts -->
  <?php include_once "includes/adminHeaderScripts.php"; ?>

  <title>GIT SYNERGY 2K20</title>

  <style>
    .btn {
      margin-bottom: 5px;
      text-align: center;
    }

    body {
      margin-top: 50px;
    }

    .form1 {
      margin-bottom: 100px;
    }
  </style>
</head>

<body class="sb-nav-fixed">

  <?php


// SQL Querry for Delete the Data

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

  <!-- Admin Navbar -->
  <?php

    $adminFileName = "synergyIndex.php";
    $adminFileData = "synergyData.php";
    $adminManage = "#";
    include_once "includes/adminNavbar.php";
    ?>


  <main class="container-fluid">
    <div class="row">
      <section class="col-12">


        <?php
         
        $sql ='select * FROM synergy_user_information';
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0) {
        ?>

        <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
          <thead>
            <th class='text-success text-center'>Certificate ID</th>
            <th class='text-success text-center'>First Name</th>
            <th class='text-success text-center'>Last Name</th>
            <th class='text-success text-center'>Department Name</th>
            <th class='text-success text-center'>Event</th>
            <th class='text-success text-center'>Prize</th>
            <th class='text-success text-center'>Action</th>
          </thead>

          <tbody>

            <?php

            while($row =mysqli_fetch_assoc($result)){

              ?>

            <tr>

              <td class='text-center'><?php echo $row['certificateId']; ?></td>
              <td class='text-center'><?php echo $row['firstName']; ?></td>
              <td class='text-center'><?php echo $row['lastName']; ?></td>
              <td class='text-center'><?php echo $row['departmentName']; ?></td>
              <td class='text-center'><?php echo $row['eventName']; ?></td>
              <td class='text-center'><?php echo $row['prize']; ?> </td>

              <td>
                <form action="synergyCertificate.php" class="text-center" method="post">
                  <input type="hidden" name="certificateId" value='<?php echo $row ["certificateId"]; ?>'>
                  <input type="submit" class="btn btn-sm btn-primary text-white text-center" value="VIEW CERTIFICATE"
                    name="view">
                </form>

                <form action="" class="text-center" method="post">
                  <input type="hidden" name="certificateId" value='<?php echo $row ["certificateId"]; ?>'>
                  <input type="submit" class="btn btn-sm btn-danger text-white text-center" value="DELETE CERTIFICATE"
                    name="delete">
                </form>
              </td>

            </tr>

            <?php
            }

            ?>

          </tbody>
        </table>

        <?php
         }

        else {
          echo "<h4 class='text-center mt-5 text-danger'>No Data available in Database</h4>";
        }

        ?>

      </section>
    </div>
  </main>

  <!-- Admin Footer Scripts -->
  <?php include_once "includes/adminFooterScripts.php"; ?>

</body>

</html>