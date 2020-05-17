<?php 
// Craeting Database Connection
require_once '../configPDO.php';
// Starting Session
session_start();

$admin =$_SESSION['adminEmail'];

if(!isset($_SESSION['adminEmail'])){
  header('location:adminLogin.php');
}

if($_SESSION['adminType'] === "Administrator") {
    $adminFileName = "adminIndex.php";
    $adminFileData = "adminIndexData.php";
    $adminManage = "adminManage.php";

}
elseif($_SESSION['adminType'] === "Student Coordinator"){
    $adminFileName = "studentCoordinatorIndex.php";
    $adminFileData = "studentCoordinatorData.php";
    $adminManage = "#";
} 
elseif($_SESSION['adminType'] === "Faculty Coordinator"){
    $adminFileName = "facultyCoordinatorIndex.php";
    $adminFileData = "facultyCoordinatorData.php";
    $adminManage = "facultyCoordinatorManage";

}
elseif($_SESSION['adminType'] === "Synergy Administrator"){
    $adminFileName = "synergyIndex.php";
    $adminFileData = "synergyData.php";
    $adminManage = "#";
}
else{
    $adminFileName = "#";
    $adminFileData = "#";
    $adminManage = "#";
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

    <title>Add Sponsors</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

</head>

<body class="sb-nav-fixed">


<?php

if(isset($_POST['addSponsor'])){


 $sponsorName= trim($_POST['sponsorName']);
 $sponsoredEvent = trim($_POST['sponsoredEvent']);
 $sponsoredDepartment = trim($_POST['sponsoredDepartment']);
 $sponsorLogo = $_FILES['sponsorLogo'];

 $sponsorLogoName = $_FILES['sponsorLogo']['name'];
 $sponsorLogoSize = $_FILES['sponsorLogo']['size'];
 $sponsorLogoTmpDir = $_FILES['sponsorLogo']['tmp_name'];
 $sponsorLogoType = $_FILES['sponsorLogo']['type'];

 if($sponsorLogoType ==  'image/jpeg' || $sponsorLogoType ==  'image/jpg' || $sponsorLogoType ==  'image/png') {
   
    if($sponsorLogoSize <= 2097152){
     
        move_uploaded_file($sponsorLogoTmpDir, "../sponsorLogo/".$sponsorLogoName);
       
        //Query
       $sql = "INSERT INTO sponsor_information (sponsorName, sponsorLogo, sponsoredEvent, 
       sponsoredDepartment) VALUES(:sponsorName, :sponsorLogoName, :sponsoredEvent, :sponsoredDepartment)";
       
        //Preparing Query
       $result = $conn->prepare($sql);

       //Binding Value
       $result->bindValue(":sponsorName", $sponsorName);
       $result->bindValue(":sponsorLogoName", $sponsorLogoName);
       $result->bindValue(":sponsoredEvent", $sponsoredEvent);
       $result->bindValue(":sponsoredDepartment", $sponsoredDepartment);
       
       //Executing Query
       $result->execute();

            if($result){
                echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Added Sponsor Successfully'
                    })</script>";
            }
            else{
                    echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to Add Sponsor'
                    })</script>";
            }

    }
    else{
      echo "<script>Swal.fire({
      icon: 'error',
      title: 'Image size exeeded',
      text: 'Please Upload File less than 2MB'
      })</script>";
    }


 }
 else{
      echo "<script>Swal.fire({
      icon: 'error',
      title: 'Image Format Not Supported',
      text: 'Supported Types are jpg,jpeg,png'
      })</script>";
 }
 
 
}

?>

    <!-- Admin Navbar -->
 <?php include_once "includes/adminNavbar.php"; ?>


    <div id="layoutSidenav_content">
        <main class="container mt-5">
            <div class="row">

                <h1 class="font-time mt-3 mb-3">Add Sponsors</h1>

                <section class="col-md-12">

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Add Sponsors</li>
                    </ol>

                    <form action="" method="post" class="my-3" enctype="multipart/form-data">

                        <div class="form-group col-md-6 offset-md-3">
                            <label>Sponsor</label>
                            <input type="text" name="sponsorName" class="form-control">
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <label>Sponsored Event</label>
                            <input type="text" name="sponsoredEvent" class="form-control">
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <label>Sponsor Department</label>
                            <input type="text" name="sponsoredDepartment" class="form-control">
                        </div>

                        <div class="form-group col-md-6 offset-md-3">
                            <label>Sponsor Logo</label> <br />
                            <input type="file" name="sponsorLogo">
                        </div>

                        <input type="submit" name="addSponsor" value="Add Sponsor"
                            class="btn btn-primary offset-md-3 btn-logo col-md-6 rounded-pill">
                    </form>

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
     $conn-= null; 
     ?>

</body>

</html>