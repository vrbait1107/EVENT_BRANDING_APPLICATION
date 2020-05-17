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

    <title>Manage Sponsors</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

</head>

<body class="sb-nav-fixed">


    <?php

    
// update sponsor information
if(isset($_POST['update'])){

           
 $sponsorName= security($_POST['sponsorName']);
 $sponsoredEvent = security($_POST['sponsoredEvent']);
 $sponsoredDepartment = security($_POST['sponsoredDepartment']);
 $sponsorLogo = $_FILES['sponsorLogo'];

 $sponsorLogoName = $_FILES['sponsorLogo']['name'];
 $sponsorLogoSize = $_FILES['sponsorLogo']['size'];
 $sponsorLogoTmpDir = $_FILES['sponsorLogo']['tmp_name'];
 $sponsorLogoType = $_FILES['sponsorLogo']['type'];

 if($sponsorLogoType ==  'image/jpeg' || $sponsorLogoType ==  'image/jpg' || $sponsorLogoType ==  'image/png') {
   
    if($sponsorLogoSize <= 2097152){
     
        move_uploaded_file($sponsorLogoTmpDir, "../sponsorLogo/".$sponsorLogoName);

        $hidden = $_REQUEST['hiddenId'];
       
       $sqlUpdate = "UPDATE sponsor_information SET sponsorName = '$sponsorName', sponsorLogo = '$sponsorLogoName' , sponsoredEvent = '$sponsoredEvent', 
       sponsoredDepartment = '$sponsoredDepartment' where id = {:hidden}"; 


         //Preparing Query
       $resultUpdate = $conn->prepare($sql);

       //Binding Value
       $resultUpdate->bindValue(":sponsorName", $sponsorName);
       $resultUpdate->bindValue(":sponsorLogoName", $sponsorLogoName);
       $resultUpdate->bindValue(":sponsoredEvent", $sponsoredEvent);
       $resultUpdate->bindValue(":sponsoredDepartment", $sponsoredDepartment);
       $resultUpdate->bindValue(":hidden", $hidden);
       
       //Executing Query
       $resultUpdate->execute();

            if($resultUpdate){
                echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Sponsor Data Update Successfully'
                    })</script>";
            }
            else{
                    echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed Update Sponsor Data'
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
 
    unset($_REQUEST['edit']); // unsetting request of edit
}

// query for retriving data into tables
$sql = "SELECT * FROM sponsor_information";

$result = $conn->prepare($sql);
$result->execute();

// delete sponsor from table 

if(isset($_REQUEST['delete'])){

   $hiddenId = $_REQUEST['hiddenId'];
   $sqlDelete = "DELETE FROM sponsor_information WHERE id = '$hiddenId'";

   //Preparing Query
   $resultDelete = $conn->prepare($sqlDelete);

   //Binding Value 
   $resultDelete->bindValue(":hiddenId", $hiddenId);

   //Executing Query
   $resultDelete->execute();

   if($resultDelete) {
       echo "<script>Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Sponsor data deleted successfully'
        })</script>";
   }
   else{
       echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'We are failed to delete sponsor data'
        })</script>"; 
   }
}


// edit and retrive data into table 

if(isset($_REQUEST['edit'])) {

$hiddenId = $_REQUEST['hiddenId'];

$sqlEdit = "SELECT * FROM sponsor_information WHERE id = '$hiddenId'";

//Preparing Query
$resultEdit = $conn->prepare($sqlEdit);

//Binding Value 
$resultEdit->bindvalue(":hiddenId,", $hiddenId);

//Executing Query
$resultEdit->execute();

$rowEdit = $resultEdit->fetch(PDO::FETCH_ASSOC);

 $sponsorName = $rowEdit["sponsorName"];
 $sponsoredDepartment = $rowEdit["sponsoredDepartment"];
 $sponsoredEvent = $rowEdit["sponsoredEvent"];
}
?>

    <!-- Admin Navbar -->
    <?php include_once "includes/adminNavbar.php"; ?>


    <div id="layoutSidenav_content">
        <main class="container mt-3">
            <div class="row">

                <h1 class="font-time mt-3 mb-3">Manage Sponsors</h1>

                <section class="col-md-12">

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Manage Sponsors</li>
                    </ol>

                    <!--Form for updating Data -->

                    <div class="col-md-6 offset-md-3">
                        <form action="" method="post" class="my-3" enctype="multipart/form-data">

                            <div class="form-group col-md-12">
                                <label>Sponsor</label>
                                <input type="text" name="sponsorName"  class="form-control"
                               value="<?php
                                if(isset($_REQUEST['edit'])){
                                echo $rowEdit['sponsorName'];
                                } ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Sponsored Event</label>
                                <input type="text" name="sponsoredEvent" class="form-control"
                                 value="<?php
                                if(isset($_REQUEST['edit'])){
                                echo $rowEdit['sponsoredEvent'];
                                } ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Sponsor Department</label>
                                <input type="text" name="sponsoredDepartment" class="form-control"
                                 value="<?php
                                if(isset($_REQUEST['edit'])){
                                echo $rowEdit['sponsoredDepartment'];
                                } ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Sponsor Logo</label> <br />
                                <input type="file" name="sponsorLogo">
                            </div>

                            <input type="submit" name="update" value="Update Sponsor"
                                class="btn btn-primary btn-block rounded-pill">
                        </form>

                    </div>

                    <?php

                    if($result->rowCount() > 0 ) {

                        ?>

                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                        <thead>
                            <th class='text-success text-center'>id</th>
                            <th class='text-success text-center'>Sponsor Name</th>
                            <th class='text-success text-center'>Sponsored Event</th>
                            <th class='text-success text-center'>Sponsored Department</th>
                            <th class='text-success text-center'>Action 1</th>
                            <th class='text-success text-center'>Action 2</th>
                        </thead>
                        <tbody>

                            <?php
                                          while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                          ?>

                            <tr>
                                <td class='text-center'> <?php echo $row['id'] ?></td>
                                <td class='text-center'> <?php echo $row['sponsorName'] ?></td>
                                <td class='text-center'> <?php echo $row['sponsoredEvent'] ?></td>
                                <td class='text-center'> <?php echo $row['sponsoredDepartment'] ?></td>

                                <td class='text-center'>
                                    <form action="">
                                        <input type="hidden" name="hiddenId" value='<?php echo $row["id"] ?>'>
                                        <input type="submit" name="edit" class="btn sm-btn btn-primary" value="Edit"
                                            data-toggle="modal" data-target="#updateSponsor">
                                    </form>
                                </td>

                                <td class='text-center'>
                                    <form action="" >
                                        <input type="hidden" name="hiddenId" value='<?php echo $row["id"] ?>'>
                                        <input type="submit" name="delete" class="btn sm-btn btn-danger" value="Delete">
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
                   ?>

                </section>
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