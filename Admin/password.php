<?php 
require_once ('../config.php');
session_start();
$admin =$_SESSION['adminEmail'];
if(!isset($_SESSION['adminEmail'])){
    header('location:adminLogin.php');
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
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
        <style>
        h3{
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
    </style>
</head>

<body>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 mt-5">


                        <?php
// Changin Admin Password

if(isset($_POST['changePassword'])) {
    $password = $_POST['password'];
    $password = mysqli_real_escape_string($conn, $password);
    $password = htmlentities($password);

    $conPassword = $_POST['conPassword'];
    $conPassword = mysqli_real_escape_string($conn, $conPassword);
    $conPassword = htmlentities($conPassword);


    if($password ===  $conPassword)
    {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $hashConPassword = password_hash($conPassword, PASSWORD_BCRYPT);

        $sql = "update admin_information SET adminPassword = '$hashPassword' where admin_information.email = '$admin'";

        $result = mysqli_query($conn,$sql);
        if($result){
        echo "<h3 class='text-warning text-center'>Your Password is Successfully Changed</h3>";
        }
        else {
        echo "<h3 class='text-danger text-center'>Something Went Wrong We are Failed to Change Your Password</h3>";
        }

     

} // if result password

else {
    echo "<h1>password and Confirm Password don't match</h1>";
}
    
} // isset post change Password bracket


?>


<div class="card shadow-lg border-0 rounded-lg p-5  mt-3">
                                
                                <h3 class="text-center text-uppercase text-secondary my-2">Change Password</h3>

                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control py-4" id="password" type="password"
                                            name="password" placeholder="Enter New Password" />
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input class="form-control py-4" id="conPassword" type="password"
                                            name="conPassword" placeholder="Confirm New Password" />
                                        </div>

                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="adminLogin.php">Return to login</a>
                                            <input type="submit" class="btn btn-primary" name="changePassword" value="Change Password">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

</body>

</html>