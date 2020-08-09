<?php
// Starting Session
session_start();
// Starting DB Connection
require_once '../configPDO.php';

if (isset($_SESSION['Admin'])) {
    header('location:synergyIndex.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYNERGY 2K20 LOGIN</title>

    <!--Event-Reg.css-->
    <link rel="stylesheet" href="../css/event-reg.css">
    <!-- header Scripts and Links -->
    <?php include_once "../includes/headerScripts.php";?>
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
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

<body>

    <!-- PHP CODE START -->

    <?php

if (isset($_POST['login'])) {

    // Removing White Spaces
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT adminPassword FROM admin_information WHERE email='$email'";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":email", $email);

    //Executing Query
    $result->execute();

    //Fetching from DB in Associative array
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $dbPassword = $row['adminPassword'];

    if (password_verify($password, $dbPassword) && ($email = 'gitshodhadmin@gmail.com')) {
        $_SESSION['Admin'] = $email;
        header("Location:synergyIndex.php");
    } else {
        echo "<script>Swal.fire({
                icon: 'error',
                title: 'Unable to Login',
                text: 'Please Check Your Credentials!'
            })</script>";
    }

}
?>

    <!-- PHP CODE END -->


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="#">GIT SHODH/SYNERGY 2K20</a>
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



    <main class="container mt-4">
        <div class="row">
            <section class="col-md-6 offset-md-3">
                <div class="card shadow p-5">

                    <h2 class="text-center font-time text-uppercase">GIT <span class="text-danger">SYNERGY</span> 2K20 LOGIN</h2>
                    <hr>

                    <form action="" method="post">

                        <div class="text-center">
                            <span class="text-warning"><i class="fa fa-users fa-5x"></i></span>
                        </div>

                        <div class="form-group">
                            <label>Enter Your Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                autocomplete="off" required>
                        </div>

                        <label for="Password">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter Password" aria-label="Enter Password"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye"
                                        aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="#" class="text-danger font-weight-bold" name="forget_password">Forgot your
                                password?</a>
                        </div>

                        <div class="text-center my-2">
                            <div class="g-recaptcha text-center"
                                data-sitekey="6LdGougUAAAAAG96eGund5fScrR1fouBZvyLf1RL"></div>
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

    <!-- Footer Script -->
    <?php include_once "../includes/footerScripts.php";?>


    <!-- Hiding and Showing Password -->
    <script type="text/javascript">

        $(document).ready(function () {
            $('#basic-addon2').click(function () {
                let passwordField = $("#password");
                let passwordFieldType = passwordField.attr('type');

                if (passwordFieldType == "password") {
                    passwordField.attr("type", "text");
                    $(this).html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');

                }
                else {
                    passwordField.attr("type", "password");
                    $(this).html('<i class="fa fa-eye" aria-hidden="true"></i>');
                }
            })
        })
    </script>


    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>