<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate Email</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- SweetAlert.js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <style>
        h3 {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>

</head>

<body>



    <?php

if(isset($_GET['token'])) {
$token = $_GET['token'];
    

    if(isset($_POST['resetPassword'])){
    $userType = $_POST['userType'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];


        if($newPassword=== $confirmNewPassword) {
        $newPassword = password_hash($newPassword,PASSWORD_BCRYPT);
        $confirmNewPassword = password_hash($confirmNewPassword,PASSWORD_BCRYPT);

            if($userType == "User"){
            $sql = "update user_information set mainPassword='$newPassword', confirmPass = '$newPassword' where token = '$token'";

            $result = mysqli_query($conn,$sql);
            if($result){
            echo "<script>Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: 'Your Password Reset Successful, Please Login to Continue'
            })</script>";
            }

            }// if($userType === "user")

            else {
   
            $sql = "update admin_information set adminPassword='$newPassword' where token = '$token'";
            $result = mysqli_query($conn,$sql);
            if($result){
             echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Your Password Reset Successful, Please Login to Continue'
            })</script>";

            }

            }

        }// new == Confirm

        else {
        echo "<script>Swal.fire({
                icon: 'warning',
                title: '',
                text: 'New Password and Confirm Password are not same'
            })</script>";
        }


    }//if(isset($_POST['resetPassword']))

} //if(isset($_GET['token']))

?>



    <!-- Navbar PHP -->
    <?php include_once "navbar.php"; ?>


    <main class="container">
        <div class="row">
            <section class="col-md-6 my-5 offset-md-3">
                <div class="card shadow p-5">
                    <h3 class="text-center text-uppercase">
                        Reset Password
                    </h3>
                    <hr>

                    <div class="card-body">
                        <form action="" method="post">

                            <div class="form-group">
                                <label>User Type</label>
                                <select class="form-control" name="userType">
                                    <option value="User">Normal User</option>
                                    <option value="Administrator">Administrator</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Enter New Password</label>
                                <input type="password" class="form-control" name="newPassword">
                            </div>

                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" class="form-control" name="confirmNewPassword">
                            </div>

                            <button type="submit" class="btn btn-danger mt-3 rounded-pill btn-block"
                                name="resetPassword">
                                Reset Password
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

</html>