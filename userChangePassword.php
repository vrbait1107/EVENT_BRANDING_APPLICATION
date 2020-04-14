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

    <!-- Bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Font-Awesome CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--SweetAlert.js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <style>
        h3 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
    </style>

</head>


<body>

    <!-- PHP Code Start -->
    <?php

if(isset($_POST['changePassword'])){
    
$email = $_SESSION['user'];

$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$conNewPassword = $_POST['conNewPassword'];

// Avoid sql injection
$currentPassword = mysqli_real_escape_string($conn,$currentPassword);
$newPassword = mysqli_real_escape_string($conn,$newPassword);
$conNewPassword = mysqli_real_escape_string($conn,$conNewPassword);

// Avoid cross site scripting
$currentPassword =htmlentities($currentPassword);
$newPassword =htmlentities($newPassword);
$conNewPassword =htmlentities($conNewPassword);

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
                    <h3 class="text-center text-uppercase">
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

</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>