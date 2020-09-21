<?php
//----------------------------------------->> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

//--------------------->> DB CONFIG
require_once '../config/configPDO.php';

//--------------------->> START SESSION
session_start();

$admin = $_SESSION['adminEmail'];

//--------------------->> CHECKING ADMIN

if (!isset($_SESSION['adminEmail'])) {
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

      <!-- Include Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

    <title><?php echo $techfestName ?> | ADMINISTARTOR CHANGE PASSWORD</title>

    <style>
        h3 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <?php
if (isset($_POST['changePassword'])) {

    // Removing White Spaces
    $password = trim($_POST['password']);
    $conPassword = trim($_POST['confirmPassword']);

    // Avoid XSS Attack
    $password = htmlspecialchars($_POST['password']);
    $conPassword = htmlspecialchars($_POST['confirmPassword']);

    if ($password === $conPassword) {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $hashConPassword = password_hash($conPassword, PASSWORD_BCRYPT);

        $sql = "UPDATE admin_information SET adminPassword = :hashPassword
                 where admin_information.email = :admin";

        //Preparing Query
        $result = $conn->prepare($sql);

        //Binding Value
        $result->bindValue(":hashPassword", $hashPassword);
        $result->bindValue(":email", $email);

        //Executing Query
        $result->execute();

        if ($result) {
            echo "<script>Swal.fire({
                            icon: 'success',
                            title: 'Successful',
                            text: 'Your Password is Successfully Changed'
                            })</script>";
        } else {
            echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'We are failed to change Password'
                            })</script>";
        }

    } else {
        echo "<script>Swal.fire({
                            icon: 'warning',
                            title: 'Field does not match',
                            text: 'Password and Confirm New Password field are not match'
                        })</script>";
    }

}

?>


   <!-- Include Admin Navbar & Common Anchor -->
  <?php
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>


<div id="layoutSidenav_content">
    <main class="container">
        <div class="row">
            <section class="col-md-6 offset-md-3 mt-5">

                <div class="card shadow-lg border-0 rounded-lg p-5  mt-3">

                    <h3 class="text-center text-uppercase text-secondary my-2">Change Password</h3>

                    <div class="card-body">
                        <form action="" method="POST" id="changePasswordForm">

                            <div class="form-group">
                                <label>New Password</label>
                                <input class="form-control py-4" id="password" type="password" name="password"
                                    placeholder="Enter New Password" />
                                     <small class="text-danger">Password should Contain atleast 8 Character, Minimum
                                            one uppercase letter,
                                            Minimum one lowercase letter,
                                            Minimum one number, Minimum one special character. </small>
                            </div>

                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input class="form-control py-4" id="confirmPassword" type="password" name="confirmPassword"
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

     <!-- Include Admin Footer-->
    <?php include_once "includes/adminFooter.php";?>
</div>

    <!-- Include  Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!-- Javascript -->
    <script src="js/password.js"></script>

     <!-- Close DB Connection -->
     <?php $conn = null;?>

</body>

</html>