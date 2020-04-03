<?php
require_once "../config.php";


// Checking That Admin Login or Not if Logged in Redirect
// to Index.php page otherwise redirect to AdminLogin page
session_start();

if(isset($_SESSION['adminEmail']) &&  $_SESSION['adminType'] && $_SESSION['adminDepartment'] && $_SESSION['adminEvent']){
    if($_SESSION['adminType']=='Administrator') {
    header('Location:adminIndex.php');
}
elseif ($_SESSION['adminType']=='Faculty Coordinator') {
    header('Location:facultyCoordinatorIndex.php');
}

elseif($_SESSION['adminType']=='Student Coordinator') {
    header('Location:studentCoordinatorIndex.php');
}

else {
    header('Location:adminLogin.php');
}
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="../css/event-reg.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <style>
        .col-md-6 {
            margin-top: 20px;
        }

        .btn {
            border-radius: 30px;
        }

        .fa-users {
            border-radius: 100%;
            border: 2px solid #f0ad4e;
            padding: 10px;
        }
    </style>
</head>

<body class="mb-5">


    <!-- PHP CODE START  -->

    <?php

if(isset($_POST['login'])){

    // Checking that username and Password of Admin if Correct Redirect to the index page
    // otherwise give an error retype the password

$adminUserName= $_POST['email'];
$adminType = $_POST['adminType'];
$adminDepartment= $_POST['adminDepartment'];
$adminEvent= $_POST['adminEvent'];
$adminPassword = $_POST['password'];


// To Avoid SQL Injection
$adminUserName=mysqli_real_escape_string($conn,$adminUserName);
$adminType=mysqli_real_escape_string($conn,$adminType);
//$adminDepartment=mysqli_real_escape_string($conn,$adminDepartment);
$adminEvent=mysqli_real_escape_string($conn,$adminEvent);
$adminPassword=mysqli_real_escape_string($conn,$adminPassword);

// To Avoid Cross Site Scripting
$adminUserName= htmlentities($adminUserName);
$adminType= htmlentities($adminType);
//$adminDepartment=htmlentities($adminDepartment);
$adminEvent=htmlentities($adminEvent);
$adminPassword=htmlentities($adminPassword);


$sql = "select adminPassword from admin_information where admin_information.email  = '$adminUserName' 
AND admin_information.adminType ='$adminType' AND admin_information.adminEvent = '$adminEvent' AND
admin_information.adminDepartment = '$adminDepartment'";
$result= mysqli_query($conn,$sql);

if($result){

 $row=mysqli_fetch_assoc($result);
$password= $row['adminPassword'];

if(password_verify($adminPassword,$password) && ($adminType==="Administrator") && 
($adminDepartment==="Not Applicable") && ($adminEvent==="Not Applicable")){
    $_SESSION['adminEmail'] = $adminUserName;
    $_SESSION['adminType'] = $adminType;
    $_SESSION['adminDepartment'] = $adminDepartment;
    $_SESSION['adminEvent'] = $adminEvent;
    header('Location:adminIndex.php');
}
 elseif(password_verify($adminPassword,$password) && ($adminType==="Student Coordinator")){
    $_SESSION['adminEmail'] = $adminUserName;
    $_SESSION['adminType'] = $adminType;
    $_SESSION['adminDepartment'] = $adminDepartment;
    $_SESSION['adminEvent'] = $adminEvent;
    header('Location:studentCoordinatorIndex.php');
 }


 elseif(password_verify($adminPassword,$password) && ($adminType==="Faculty Coordinator")){
    $_SESSION['adminEmail'] = $adminUserName;
    $_SESSION['adminType'] = $adminType;
    $_SESSION['adminDepartment'] = $adminDepartment;
    $_SESSION['adminEvent'] = $adminEvent;
    header('Location:facultyCoordinatorIndex.php');
 }


else {
    
     echo "<script>Swal.fire({
        icon: 'error',
        title: 'Unable to Login',
        text: 'Please Check Your Credential or Check Your User Role'
      })</script>";
}

} // if result close bracket

else{
    echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something Went Wrong'
        })</script>";
}

} // isset Close bracket
?>




    <!-- PHP CODE END   -->


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="#">GIT SHODH/SYNERGY 2K20</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="../register.php">SHODH Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="../login.php">SHODH Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="adminLogin.php">SHODH Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="synergyLogin.php">SYNERGY Admin Login</a>
                </li>
            </ul>
        </div>
    </nav>




    <main class="container">
        <div class="row">
           
            <section class="col-md-6 offset-md-3">

                <div class="card shadow p-5">
                    <h2 class="text-center text-uppercase mb-4 mt-2">Welcome Administrator</h2>

                    <form action="" method="post">
                        <div class="text-center">
                            <span class="text-warning"><i class="fa fa-users fa-5x"></i></span>
                        </div>
                        <div class="form-group">
                            <label>Enter Your Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                required>
                        </div>


                        <div class="form-group">
                            <label>Admin Type</label>
                            <select class="form-control" name="adminType">
                                <option value="Administrator">Administrator</option>
                                <option value="Faculty Coordinator">Faculty Coordinator</option>
                                <option value="Student Coordinator">Student Coordinator</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Admin Department</label>
                            <select class="form-control" name="adminDepartment">
                                <option value="Not Applicable">Not Applicable</option>
                                <option value="Electronics & Telecommunication">Electronics & Telecommunication</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Computer">Computer</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Admin Event</label>
                            <select class="form-control" name="adminEvent">
                                <option value="Not Applicable">Not Applicable</option>
                                <option value="EXTC Paper Presentation">EXTC Paper Presentation</option>
                                <option value="EXTC Poster Presentation">EXTC Poster Presentation</option>
                                <option value="EXTC Project Presentation">EXTC Project Presentation</option>
                                <option value="Tech Boss">Tech Boss</option>
                                <option value="Fun Tech">Fun Tech</option>
                                <option value="School Event">School Event</option>
                                <option value="Logo Contest">Logo Contest</option>
                                <option value="Calci War">Calci War</option>
                                <option value="Chemical Paper Presentation">Chemical Paper Presentation</option>
                                <option value="Chemical Poster Presentation">Chemical Poster Presentation</option>
                                <option value="Chemical Project Presentation">Chemical Project Presentation</option>
                                <option value="Computer Paper Presentation">Computer Paper Presentation</option>
                                <option value="Computer Poster Presentation">Computer Poster Presentation</option>
                                <option value="Computer Project Presentation">Computer Project Presentation</option>
                                <option value="Mechanical Paper Presentation">Mechanical Paper Presentation</option>
                                <option value="Mechanical Poster Presentation">Mechanical Poster Presentation</option>
                                <option value="Mechanical Project Presentation">Mechanical Project Presentation</option>
                                <option value="Civil Paper Presentation">Civil Paper Presentation</option>
                                <option value="Civil Poster Presentation">Civil Poster Presentation</option>
                                <option value="Civil Project Presentation">Civil Project Presentation</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required autocomplete="off">
                        </div>

                        <div class="form-group">
                         <a href="../forgotPassword.php" class="text-danger font-weight-bold">Forgot your password?</a>
                        </div>



                        <div class="form-group">
                            <input class="btn btn-primary btn-block mt-3" type="submit" class="form-control"
                                name="login" id="login" value="Login">
                        </div>
                    </form>
                </div>
            </section>
            
        </div>
    </main>

</body>

</html>