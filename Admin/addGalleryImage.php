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
    $adminManage = "facultyCoordinatorManage.php";

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
    <meta name="author" content="Vishal Bait" />

    <title>Add Gallery Images </title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

</head>

<body class="sb-nav-fixed">

    <?php

    if(isset($_POST["addGalleryImage"])) {
     $galleryImage = $_FILES["galleryImage"];

     $galleryImageName = $_FILES["galleryImage"]['name'];
     $galleryImageSize = $_FILES["galleryImage"]['size'];
     $galleryImageType = $_FILES["galleryImage"]['type'];
     $galleryImageTmpDir = $_FILES["galleryImage"]["tmp_name"];

     if($galleryImageType ==  'image/jpeg' || $galleryImageType ==  'image/jpg' || $galleryImageType ==  'image/png') {
   
    if($galleryImageSize <= 2097152){

    
        move_uploaded_file($galleryImageTmpDir, "../gallery/".$galleryImageName);

        $sql = "INSERT INTO gallery_information (galleryImage) VALUES (:galleryImageName)";

        //Preparing Query
        $result = $conn->prepare($sql);

        //Binding Values 
        $result->bindValue(":galleryImageName", $galleryImageName);

        // Executing Result
        $result->execute();


        if($result){
            echo "<script>Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: 'Image Successfully added to gallery'
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
        <main class="container-fluid">

            <h1 class="font-time mt-3 mb-1">Add Gallery Images</h1> <br />

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Gallery Images</li>
            </ol>

            <div class="row">
                <section class="col-md-6 offset-md-3">


                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="galleryImage">Add Gallery Images</label>
                            <input multiple="multiple" type="file" class="form-control-file"  name="galleryImage"
                                id="galleryImage">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add Gallery Images" name="addGalleryImage"
                                class="btn btn-primary btn-block rounded-pill">
                        </div>

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
     $conn= null; 
     ?>

</body>

</html>