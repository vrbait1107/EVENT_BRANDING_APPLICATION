<?php
require_once '../config.php';
session_start();
if(isset($_SESSION['Admin'])) {
    header('location:synergyIndex.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYNERGY 2K20 LOGIN</title>

    <!--Bootstrap.css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Font-Awesome.css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Event-Reg.css-->
    <link rel="stylesheet" href="../css/event-reg.css">
    <!--SweetAlert.js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <style>
        .fa-users {
            border-radius: 100%;
            border: 2px solid #f0ad4e;
            padding: 10px;
        }
    </style>
</head>

<body>

    <!-- PHP CODE START -->

    <?php
        
        if(isset($_POST['login'])) {

        // To avoid sql injection and cross site scripting also remove white spaces
        function security($data){
        global $conn;
        $data = trim($data);
        $data = mysqli_real_escape_string($conn,$data);
        $data = htmlentities($data);
        return $data;
        }

         // calling function to perform security task
        $email = security($_POST['email']);
        $password = security($_POST['password']);

        $sql = "select adminPassword from admin_information where email='$email'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $dbPassword = $row['adminPassword'];

        if(password_verify($password,$dbPassword) && ($email='gitshodhadmin@gmail.com')){
            $_SESSION['Admin'] = $email;
            header ("Location:synergyIndex.php");
        }

        else {
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



    <main class="container mt-4">
        <div class="row">
            <section class="col-md-6 offset-md-3">
                <div class="card shadow p-5">

                    <h2 class="text-center text-uppercase">GIT <span class="text-danger">SYNERGY</span> 2K20 LOGIN</h2>
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

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required autocomplete="off">
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


    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!--Proper.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <!--Bootstrap.js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>