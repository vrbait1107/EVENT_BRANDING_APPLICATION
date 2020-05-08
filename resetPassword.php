<?php

// Creating Connection to Database
    require_once "configNew.php";

// Staring Session
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>

</head>

<body>

    <?php

if(isset($_GET['token'])) {
$token = $_GET['token'];
    

    if(isset($_POST['resetPassword'])){

        // To avoid sql injection and cross site scripting also remove white spaces
        function security($data){
        global $conn;
        $data = trim($data);
        $data = $conn->real_escape_string($data);
        $data = htmlentities($data);
        return $data;
        }

        // calling function to perform security task
        $userType = security($_POST['userType']);
        $newPassword = security($_POST['newPassword']);
        $confirmNewPassword = security($_POST['confirmNewPassword']);

   
        if($newPassword=== $confirmNewPassword) {
        $newPassword = password_hash($newPassword,PASSWORD_BCRYPT);
        $confirmNewPassword = password_hash($confirmNewPassword,PASSWORD_BCRYPT);

            if($userType == "User"){
            $sql = "update user_information set mainPassword='$newPassword', confirmPass = '$newPassword' where token = '$token'";

            $result = $conn->query($sql);
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
            $result = $conn->query($sql);
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
    <?php include_once "includes/navbar.php"; ?>


    <main class="container">
        <div class="row">
            <section class="col-md-6 my-5 offset-md-3">
                <div class="card shadow p-5">
                    <h3 class="text-center font-time text-uppercase">
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
    <?php include_once "includes/footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

     <?php
    // closing Database Connnection
     $conn->close(); 
     ?>

</body>

</html>