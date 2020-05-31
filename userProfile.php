<?php 

// Creating Connection to Database
    require_once "configPDO.php";

// Staring Session
    session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>

</head>

<body>

    <!-- Navbar PHP -->
    <?php include_once "includes/navbar.php"; ?>


    <main class="container">
        <div class="row">
            <section class="col-md-6  my-5 offset-md-3">


                <div class="card shadow p-5">

                    <div class="card-header">
                        <h3 class="text-center text-uppercase">User Profile</h3>
                        <p class="text-center">Add information about yourself</p>
                    </div>

                    <hr>

                    <div id="updateResponse"></div>

                    <!-- Change Profile Image -->
                    <form method="post" enctype="multipart/form-data" id="changeProfileImageForm">
                        <div class="form-group">
                            <label>Change Profile Image</label>
                            <input type="file" id="updateProfileImage" class="form-control-file" accept=".jpg, .jpeg, .png" name="updateProfileImage">
                            <input type="hidden" name="hiddenImageName" id="hiddenImageName">
                            <input type="hidden" name="hiddenEmail2" id="hiddenEmail2">
                            <input type="submit" value="Change Profile Image" class="btn btn-primary mt-3"
                                id="changeProfileImage">
                        </div>
                    </form>

                    <form action="" method="post" name="userProfileForm" id="userProfileForm">

                        <div class="text-center">
                            <img src="" id="showProfileImage" class="img-fluid rounded-circle mb-3"
                                style="height:150px">
                        </div>

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="updateFirstName" id="updateFirstName">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="updateLastName" id="updateLastName">
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="updateMobileNumber" id="updateMobileNumber">
                        </div>


                        <div class="form-group">
                            <label>Academic Year</label>
                            <input type="text" class="form-control" name="updateAcademicYear" id="updateAcademicYear">
                        </div>

                        <div class="form-group">
                            <label>Department Name</label>
                            <input type="text" class="form-control" name="updateDepartmentName"
                                id="updateDepartmentName">
                        </div>

                        <div class="form-group">
                            <label>College Name</label>
                            <input type="text" class="form-control" name="updateCollegeName" id="updateCollegeName">
                        </div>

                        <input type="hidden" name="hiddenEmail" id="hiddenEmail">

                        <input type="submit" value="Update" name="updateUserProfile" id="updateUserProfile"
                            class="btn btn-primary btn-block rounded-pill">

                    </form>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer PHP -->
    <?php include_once "includes/footer.php" ?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>
    <!-- Custom JS -->
    <script src="js/userProfile.js"></script>


    <?php
    // closing Database Connnection
     $conn= null; 
     ?>

</body>

</html>