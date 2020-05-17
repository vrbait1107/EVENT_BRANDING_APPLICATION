<?php 
// Craeting Database Connection
require_once "../configPDO.php";
// Starting Session
session_start();


// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
    if( !isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if($_SESSION['adminType'] !== "Student Coordinator"){
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

  <title>GIT SHODH 2K20</title>

</head>

<body class="sb-nav-fixed">

  <?php


// #############################   SQL Querry for Update the Data  ###########################


  if(isset($_REQUEST['update'])) { // Checking if the Field is Empty or Not

  if(($_REQUEST['firstName'])== "" || ($_REQUEST['lastName'])== "" || ($_REQUEST['certificateId']=="")|| ($_REQUEST['prize']=="") || ($_REQUEST['attendStatus']=="")) {
   echo "<script>Swal.fire({
          icon: 'error',
          title: 'ERROR',
          text: 'Please fill all the field or select proper Data '
        })</script>";
}

else {

  $firstName= trim($_POST['firstName']);
  $lastName= trim($_POST['lastName']);
  $prize = trim($_POST['prize']);
  $attendStatus = trim($_POST['attendStatus']);
  $reqCertId = $_REQUEST['certificateId'];
  
  //Query
  $sql1 = "update user_information INNER JOIN event_information 
  ON user_information.email= event_information.email
  SET user_information.firstName = :firstName,
  user_information.lastName = :lastName, 
  event_information.prize = :prize,
  attendStatus = :attendStatus
  WHERE event_information.certificateId={:reqCertId}";

  //Preparing Query
  $result1 = $conn->prepare($sql1);

  //Binding Values
  $result1->bindValue(":firstName", $firstName);
  $result1->bindValue(":lastName", $lastName);
  $result1->bindValue(":prize", $prize);
  $result1->bindValue(":attendStatus", $attendStatus);
  $result1->bindValue(":reqCertId", $reqCertId);

  //Executing Query
  $result1->execute();
  
  if($result1){

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

 unset($_REQUEST['edit']); // unsetting request od edit to vanishing data from the form
  }

  // When Edit button is Pressed Retrive the Data in Form to Update Data


  if(isset($_REQUEST['edit'])) {

    $reqCertId = $_REQUEST['certificateId'];

    $sql ="SELECT * FROM user_information INNER JOIN event_information ON 
    user_information.email= event_information.email 
    where certificateId = {:reqCertId}";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":reqCertId", $reqCertId);

    //Executing Query
    $result->execute();
  
    $row= $result->fetch(PDO::FETCH_ASSOC);
  }
  

// #############################   SQL Querry for Delete the Data  ###########################

if(isset($_REQUEST['delete'])) {

  $reqCertId = $_REQUEST['certificateId'];

  $sql ="DELETE  FROM event_information 
  where certificateId = {:reqCertId}";

  //Preparing Query
  $result= $conn->prepare($sql);

  //Binding Values
  $result->bindValue(":reqCertId", $reqCertId);

  //Executing Query
  $result->execute();
  
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

    $adminFileName = "studentCoordinatorIndex.php";
    $adminFileData = "studentCoordinatorData.php";
    $adminManage = "#";
   
    include_once "includes/adminNavbar.php";
    ?>


  <div id="layoutSidenav_content">

    <main class="container-fluid">
      <div class="row">

        <section class="col-md-6 mt-5 offset-md-3">

          <div class="card shadow p-5 mb-5">

            <div class="card-header mb-3 text-center">
              <h5>Edit/Update Participant Details</h5>
            </div>


            <!-- The Form that is Used for Edit Data -->

            <form class="form1" action="" method="post">

              <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="<?php 
         if(isset($_REQUEST['edit'])){
            echo $row['firstName'];
            } 
            ?>" required>
              </div>

              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="lastName"  value="<?php 
          if(isset($_REQUEST['edit'])){
            echo $row['lastName'];
            } 
            ?>" required>
              </div>

              <div class="form-group">
                <label>Prize</label>
                <select class="form-control" name="prize" id="prize" required>
                  <option disabled selected>Chooes</option>
                  <option value="NONE">None</option>
                  <option value="First">First</option>
                  <option value="Second">Second</option>
                  <option value="Third">Third</option>
                </select>
              </div>

              <div class="form-group">
                <label>Attendance Status</label>
                <select class="form-control" name="attendStatus" id="attendStatus" required>
                  <option disabled selected>Chooes...</option>
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
        
                $sql ="SELECT * FROM user_information INNER JOIN event_information ON 
                user_information.email= event_information.email 
                WHERE event_information.event = :event ORDER By firstName ASC";

                //Preparing Query
                $result = $conn->prepare($sql);

                //Binding Value
                $result->bindValue(":event", $event);

                //Executing Value 
                $result->execute();

                if($result->rowCount() >0) {

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
                    <th class='text-success text-center'>Edit</th>
                    <th class='text-success text-center'>Delete</th>
                    <th class='text-success text-center'>TXN Amount</th>
                    <th class='text-success text-center'>Order Id</th>
                    <th class='text-success text-center'>TXN ID</th>
                    <th class='text-success text-center'> Bank TXN Id</th>
                    <th class='text-success text-center'>TXN Date</th>
                    <th class='text-success text-center'>TXN Status</th>

                  </thead>

                  <tbody>

                    <?php
                  while($row = $result->fetch(PDO::FETCH_ASSOC)){
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
                          <input type="submit" class="btn btn-primary text-white" value="Edit"
                            name="edit">
                        </form>
                      </td>


                       <td>
                        <form class="text-center" action="">
                          <input type="hidden" name="certificateId" value='<?php echo $row ["certificateId"] ?>'>
                          <input type="submit" class="btn btn-danger text-white" value="Delete"
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
     $conn= null; 
     ?>
     
</body>
</html>