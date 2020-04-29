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

    <!--Event-Reg.css-->
    <link rel="stylesheet" href="../css/event-reg.css">
     <!-- header Scripts and Links -->
    <?php include_once "../includes/headerScripts.php"; ?>
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

    <!-- Footer Script -->
    <?php include_once "../includes/footerScripts.php"; ?>


</body>

</html>