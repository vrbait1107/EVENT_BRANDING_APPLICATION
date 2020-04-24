<?php
session_start();
require_once "config.php";
if(!isset($_SESSION['user'])) {
header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

     <!-- header Scripts and Links -->
    <?php include_once "headerScripts.php"; ?>
    
</head>


<body>

    <!-- PHP Code Start -->
    <?php

if(isset($_POST['changePassword'])){
    
$email = $_SESSION['user'];

    // To avoid sql injection and cross site scripting also remove white spaces
    function security($data){
    global $conn;
    $data = trim($data);
    $data = mysqli_real_escape_string($conn,$data);
    $data = htmlentities($data);
    return $data;
    }

    // calling function to perform security task
    $currentPassword = security($_POST['currentPassword']);
    $newPassword = security($_POST['newPassword']);
    $conNewPassword = security($_POST['conNewPassword']);

$sql = "select mainPassword from user_information where email = '$email'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$dbPassword = $row['mainPassword'];

    if(password_verify($currentPassword,$dbPassword)) {
       
        if( $newPassword===  $conNewPassword ) {

        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $conNewPassword= password_hash($conNewPassword, PASSWORD_BCRYPT);

        $sql1 = "update user_information set mainPassword= '$newPassword', confirmPass ='$newPassword' where email = '$email'";
        $result1 = mysqli_query($conn, $sql1);

            if($result1) {
       
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

        }

        else {
      
       echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Field does not match',
            text: 'New Password and Confirm New Password field are not match'
        })</script>";
        }

    }

    else{
       
    echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Field does not match',
            text: 'Current Password is not Correct'
        })</script>";
    }

}

?>

    <!-- Navbar PHP -->
    <?php include_once "navbar.php"; ?>


    <main class="container">
        <div class="row">
            <section class="col-md-6 my-5 offset-md-3">
                <div class="card shadow p-5">
                    <h3 class="text-center font-time font-weight-bold text-uppercase">
                        Change Password
                    </h3>
                    <hr>

                    <div class="card-body">
                        <form action="" method="post">

                            <div class="form-group">
                                <label>Enter Current Password</label>
                                <input type="password" class="form-control" name="currentPassword">
                            </div>

                            <div class="form-group">
                                <label>Enter New Password</label>
                                <input type="password" class="form-control" name="newPassword">
                            </div>

                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" class="form-control" name="conNewPassword">
                            </div>

                            <button type="submit" class="btn btn-danger mt-3 rounded-pill btn-block"
                                name="changePassword">
                                Change Password
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer PHP -->
    <?php include_once "footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "footerScripts.php"; ?>

</body>

</html>