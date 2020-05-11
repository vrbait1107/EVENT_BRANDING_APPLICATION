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

    <title>Add News</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

</head>

<body class="sb-nav-fixed">

    <?php
if(isset($_POST['addNews'])) {

        // To avoid sql injection and cross site scripting also remove white spaces
        function security($data){
        global $conn;
        $data = trim($data);
        $data = $conn->real_escape_string($data);
        $data = htmlentities($data);
        return $data;
        }

        // calling function to perform security task
        $newsTitle = security($_POST['newsTitle']);
        $newsDescription = security($_POST['newsDescription']);
        

        
               $sql = "INSERT INTO news_information (newsTitle, newsDescription, postedDate) VALUES ('$newsTitle', ' $newsDescription', now())";
                 
                $result = $conn->query($sql);

                        if($result){
                        echo "<script>Swal.fire({
                                icon: 'success',
                                title: 'Successful',
                                text: 'News Added Successfully'
                            })</script>";
                        }
                        else {
                        echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'We are failed to Add News'
                            })</script>";
                        }


} 

    ?>


    <!-- Admin Navbar -->
    <?php include_once "includes/adminNavbar.php"; ?>


    <div id="layoutSidenav_content">
        <main class="container-fluid">

            <h1 class="font-time mt-3 mb-1">Add News/Notification</h1> <br />

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add News/Notification</li>
            </ol>

            <div class="row">
                <section class="col-md-6 offset-md-3">


                    <form action="" method="post">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="newsTitle" id="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="newsDescription" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add News" name="addNews"
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