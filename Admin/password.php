<?php 
require_once ('../config.php');
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
    $adminManage = "#"
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
    
    <title>Change Password</title>

     <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

    <style>
        h3 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <?php
if(isset($_POST['changePassword'])) {

        // To avoid sql injection and cross site scripting also remove white spaces
        function security($data){
        global $conn;
        $data = trim($data);
        $data = mysqli_real_escape_string($conn,$data);
        $data = htmlentities($data);
        return $data;
        }

        // calling function to perform security task
        $password = security($_POST['password']);
        $password = security($conn, $password);
        $password = security($password);

  
            if($password ===  $conPassword)
            {
                $hashPassword = password_hash($password, PASSWORD_BCRYPT);
                $hashConPassword = password_hash($conPassword, PASSWORD_BCRYPT);

                $sql = "update admin_information SET adminPassword = '$hashPassword'
                 where admin_information.email = '$admin'";
                $result = mysqli_query($conn,$sql);

                        if($result){
                        echo "<script>Swal.fire({
                            icon: 'success',
                            title: 'Successful',
                            text: 'Your Password is Successfully Changed'
                            })</script>";
                        }
                        else {
                        echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'We are failed to change Password'
                            })</script>";
                        }

     

                } // if result password

                else {
                    echo "<script>Swal.fire({
                            icon: 'warning',
                            title: 'Field does not match',
                            text: 'Password and Confirm New Password field are not match'
                        })</script>";
                }
    
} // isset post change Password bracket

    ?>


   <!-- Admin Navbar -->
  <?php include_once "includes/adminNavbar.php"; ?>


<div id="layoutSidenav_content">
    <main class="container-fluid">
        <div class="row">
            <section class="col-md-6 offset-md-3 mt-5">

                <div class="card shadow-lg border-0 rounded-lg p-5  mt-3">

                    <h3 class="text-center text-uppercase text-secondary my-2">Change Password</h3>

                    <div class="card-body">
                        <form action="" method="POST">

                            <div class="form-group">
                                <label>New Password</label>
                                <input class="form-control py-4" id="password" type="password" name="password"
                                    placeholder="Enter New Password" />
                            </div>

                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input class="form-control py-4" id="conPassword" type="password" name="conPassword"
                                    placeholder="Confirm New Password" />
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="adminLogin.php">Return to login</a>
                                <input type="submit" class="btn btn-primary" name="changePassword"
                                    value="Change Password">
                            </div>

                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php"; ?>

</body>

</html>