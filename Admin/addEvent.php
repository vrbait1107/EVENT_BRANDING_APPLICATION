<?php 
// Craeting Database Connection
require_once '../configNew.php';
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
    <meta name="author" content="Vishal Bait" />

    <title>Add Events</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

</head>

<body class="sb-nav-fixed">


    <?php



if(isset($_POST['addEvent'])){

            // To avoid sql injection and cross site scripting also remove white spaces
            function security($data){
            global $conn;
            $data = trim($data);
            $data = $conn->real_escape_string($data);
            $data = htmlentities($data);
            return $data;
            }

 $eventName = security($_POST['eventName']);
 $eventPrice = security($_POST['eventPrice']);
 $eventPrize = security($_POST['eventPrize']);
 $eventSponsor = security($_POST['eventSponsor']);
 $eventDepartment = security($_POST['eventDepartment']);
 $eventDescription = security($_POST['eventDescription']);
 $eventRules = security($_POST['eventRules']);
 $eventCoordinator = security($_POST['eventCoordinator']);
 $eventStartDate = security($_POST['eventStartDate']);
 $eventEndDate = security($_POST['eventEndDate']);


 $eventImage = $_FILES['eventImage'];
 $eventImageName = $_FILES['eventImage']['name'];
 $eventImageSize = $_FILES['eventImage']['size'];
 $eventImageTmpDir = $_FILES['eventImage']['tmp_name'];
 $eventImageType = $_FILES['eventImage']['type'];

 if($eventImageType ==  'image/jpeg' || $eventImageType ==  'image/jpg' || $eventImageType ==  'image/png') {
   
    if($eventImageSize <= 2097152){
     
        move_uploaded_file($eventImageTmpDir, "../eventImage/".$eventImageName);
       
       
      $sql=   "INSERT INTO events_details_information( eventImage, eventName, eventPrice, eventPrize, eventSponsor,
         eventDepartment, eventDescription, eventRules, eventCoordinator, eventStartDate, eventEndDate)
          VALUES ('$eventImageName','$eventName', '$eventPrice','$eventPrize', '$eventSponsor', '$eventDepartment', 
          '$eventDescription', '$eventRules', '$eventCoordinator', '$eventStartDate', '$eventEndDate' )";


       $result =  $conn->query($sql);

            if($result){
                echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Added Event Successfully'
                    })</script>";
            }
            else{
                    echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to Add Event'
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
        <main class="container mt-3">
            <h1 class="font-time mt-3 mb-1">Add Events</h1> <br />

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Events</li>
            </ol>

            <div class="row">

                <section class="col-md-6 offset-md-3">

                    <form action="" method="post" class="my-1" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Event Image</label> <br />
                            <input type="file" name="eventImage">
                        </div>

                        <div class="form-group">
                            <label>Event Name</label>
                            <input type="text" name="eventName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Event Entry Fee</label>
                            <input type="text" name="eventPrice" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Event Prize</label>
                            <input type="text" name="eventPrize" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Event Sponsor</label>
                            <input type="text" name="eventSponsor" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Event Department</label>
                            <select name="eventDepartment" class="form-control">
                                <option selected disabled>Chooes...</option>
                                <option value="Electronics and Telecommunication">Electronics and Telecommunication
                                </option>
                                <option value="Chemical">Chemical</option>
                                <option value="Computer">Computer</option>
                                <option value="Civil">Civil</option>
                                <option value="Mechanical">Mechanical</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label>Event Description</label>
                            <textarea name="eventDescription" cols="30" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Event Rules</label>
                            <textarea name="eventRules" cols="30" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Event Coordinator</label>
                            <textarea name="eventCoordinator" cols="30" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Event Start Date</label>
                            <input type="date" name="eventStartDate" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Event End Date</label>
                            <input type="date" name="eventEndDate" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add Events" name="addEvent"
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
     $conn->close(); 
     ?>

</body>

</html>