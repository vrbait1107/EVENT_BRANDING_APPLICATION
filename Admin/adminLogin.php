<?php

//Creating Database Connection
require_once "../configPDO.php";
//Starting Session
session_start();

// Checking That Admin Login or Not if Logged in Redirect
// to Index.php page otherwise redirect to AdminLogin page

if (isset($_SESSION['adminEmail']) && $_SESSION['adminType'] && $_SESSION['adminDepartment'] && $_SESSION['adminEvent']) {
    if ($_SESSION['adminType'] == 'Administrator') {
        header('Location:adminIndex.php');

    } elseif ($_SESSION['adminType'] == 'Faculty Coordinator') {
        header('Location:facultyCoordinatorIndex.php');

    } elseif ($_SESSION['adminType'] == 'Student Coordinator') {
        header('Location:studentCoordinatorIndex.php');

    } else {
        header('Location:adminLogin.php');
    }
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
    <title>Admin Login Page</title>

     <!-- header Scripts and Links -->
    <?php include_once "../includes/headerScripts.php";?>
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        .col-md-6 {
            margin-top: 20px;
        }

        .fa-users {
            border-radius: 100%;
            border: 2px solid #f0ad4e;
            padding: 10px;
        }

        .font-time{
            font-family: "Times New Roman";
            font-weight: bold;
        }
    </style>
</head>

<body class="mb-5">


    <!-- PHP CODE START  -->

    <?php

if (isset($_POST['login'])) {

    if (isset($_POST['g-recaptcha-response'])) {

        $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
        $response = json_decode($verifyResponse);

        if ($response->success) {

            $adminUserName = trim($_POST['email']);
            $adminType = trim($_POST['adminType']);
            $adminDepartment = trim($_POST['adminDepartment']);
            $adminEvent = trim($_POST['adminEvent']);
            $adminPassword = trim($_POST['password']);

            $sql = "SELECT adminPassword FROM admin_information WHERE admin_information.email  = :adminUserName
            AND admin_information.adminType = :adminType AND admin_information.adminEvent = :adminEvent AND
            admin_information.adminDepartment = :adminDepartment";

            //Preparing Query
            $result = $conn->prepare($sql);

            //Binding Values
            $result->bindValue(":adminUserName", $adminUserName);
            $result->bindValue(":adminType", $adminType);
            $result->bindValue(":adminEvent", $adminEvent);
            $result->bindValue(":adminDepartment", $adminDepartment);

            //Executing Value
            $result->execute();

            if ($result) {

                $row = $result->fetch(PDO::FETCH_ASSOC);
                $password = $row['adminPassword'];

                if (password_verify($adminPassword, $password) && ($adminType === "Administrator") &&
                    ($adminDepartment === "Not Applicable") && ($adminEvent === "Not Applicable")) {
                    $_SESSION['adminEmail'] = $adminUserName;
                    $_SESSION['adminType'] = $adminType;
                    $_SESSION['adminDepartment'] = $adminDepartment;
                    $_SESSION['adminEvent'] = $adminEvent;
                    header('Location:adminIndex.php');

                } elseif (password_verify($adminPassword, $password) && ($adminType === "Student Coordinator")) {
                    $_SESSION['adminEmail'] = $adminUserName;
                    $_SESSION['adminType'] = $adminType;
                    $_SESSION['adminDepartment'] = $adminDepartment;
                    $_SESSION['adminEvent'] = $adminEvent;
                    header('Location:studentCoordinatorIndex.php');

                } elseif (password_verify($adminPassword, $password) && ($adminType === "Faculty Coordinator")) {
                    $_SESSION['adminEmail'] = $adminUserName;
                    $_SESSION['adminType'] = $adminType;
                    $_SESSION['adminDepartment'] = $adminDepartment;
                    $_SESSION['adminEvent'] = $adminEvent;
                    header('Location:facultyCoordinatorIndex.php');

                } else {
                    echo "<script>Swal.fire({
                                icon: 'error',
                                title: 'Unable to Login',
                                text: 'Please Check Your Credential or Check Your User Role'
                            })</script>";
                }

            } else {
                echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something Went Wrong'
                        })</script>";
            }

        } else {
            echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Google Recaptcha Error',
                        text: 'Please fill Google Recaptcha'
                    })</script>";
        }

    }

}
?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="#">GIT SHODH/SYNERGY 2K21</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav font-weight-bold">
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

                <div class="card shadow px-4 py-5">
                    <h2 class="text-center text-uppercase mt-4 font-time">GIT
                   <span class="text-danger">SHODH</span> 2K21 ADMIN LOGIN</h2>

                   <hr/>

                    <form action="" method="post">

                        <div class="text-center mb-3">
                            <span class="text-warning"><i class="fa fa-users fa-5x"></i></span>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Admin Email</label>
                            </div>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                required>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Admin Type</label>
                            </div>
                            <select class="custom-select" name="adminType">
                                <option selected disabled>Choose...</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Faculty Coordinator">Faculty Coordinator</option>
                                <option value="Student Coordinator">Student Coordinator</option>
                            </select>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Admin Department</label>
                            </div>
                            <select class="custom-select" name="adminDepartment">
                                <option selected disabled>Choose...</option>
                                <option value="Not Applicable">Not Applicable</option>
                                <option value="Electronics and Telecommunication">Electronics and Telecommunication</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Computer">Computer</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                            </select>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Admin Event</label>
                            </div>
                            <select class="custom-select" name="adminEvent">
                                <option selected disabled>Choose...</option>
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

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Admin Password</label>
                            </div>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required autocomplete="off">
                        </div>

                        <div class="text-center my-2">
                            <div class="g-recaptcha text-center"
                                data-sitekey="6LdGougUAAAAAG96eGund5fScrR1fouBZvyLf1RL"></div>
                        </div>

                        <div class="form-group">
                            <a href="../forgotPassword.php" class="text-danger font-weight-bold">Forgot your
                                password?</a>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-block rounded-pill mt-3" type="submit"
                                class="form-control" name="login" id="login" value="Login">
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </main>

    <!--Footer Scripts-->
    <?php include_once "../includes/footerScripts.php"?>

    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>