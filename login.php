<?php

// Creating Connection to Database
require_once "configPDO.php";

// Staring Session
session_start();

if (isset($_SESSION['user'])) {
    header('Location:index.php');
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- header Scripts and Links -->
  <?php include_once "includes/headerScripts.php";?>
  <!--Local css-->
  <link rel="stylesheet" href="css/event-reg.css">
  <!-- Google Recaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" href="css/login.css">

  <title>GIT SHODH 2K20</title>
  
</head>

<body>

  <!-- PHP CODE START -->
  <?php

if (isset($_POST["login"])) {

    if (isset($_POST['g-recaptcha-response'])) {

        $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
        $response = json_decode($verifyResponse);

        if ($response->success) {

            $userName = $_POST["userName"];
            $password = $_POST["password"];

            $sql = "SELECT password, status FROM user_information WHERE email= :userName";

            // Preparing Query
            $result = $conn->prepare($sql);

            //Binding Value
            $result->bindValue(":userName", $userName);

            // Executing Value
            $result->execute();

            $row = $result->fetch(PDO::FETCH_ASSOC);

            $status = $row['status'];
            $dbpassword = $row['password'];

            if (password_verify($password, $dbpassword)) {
                if ($status == "active") {

                    $_SESSION['user'] = $userName;
                    header("Location:index.php");

                } else {
                    echo "<script>Swal.fire({
              icon: 'warning',
              title: 'Activate Account',
              text: 'Please Activate Your Account'
            })</script>";

                }

            } else {
                echo "<script>Swal.fire({
              icon: 'error',
              title: 'Unable to Login',
              text: 'Please Check Your Credentials'
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


  <!-- PHP CODE END  -->


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="#">GIT SHODH/SYNERGY 2K20</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="register.php">SHODH Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="login.php">SHODH Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="Admin/adminLogin.php">SHODH Admin Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="Admin/synergyLogin.php">SYNERGY Admin Login</a>
        </li>
      </ul>
    </div>
  </nav>




  <main class="container my-4">
    <div class="row">
      <section class="col-md-6 offset-md-3">

        <div class="card shadow p-5">
          <h2 class="text-center text-uppercase font-time alert alert-primary">GIT <span class="text-danger">SHODH</span> 2K20 LOGIN</h2>
          <hr>

          <form action="" method="POST">

            <div class="text-center">
              <span class="text-warning"><i class="fa fa-users fa-5x"></i></span>
            </div>

            <div class="form-group">
              <label for="Email">Username</label>
              <input type="email" name="userName" class="form-control" id="Email" aria-describedby="emailHelp"
                placeholder="Enter Username">
            </div>


            <label for="Password">Password</label>
            <div class="input-group mb-3">
              <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password"
                aria-label="Enter Password" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" aria-hidden="true"></i>
                </span>
              </div>
            </div>


            <div class="form-group">
              <a href="forgotPassword.php" class="text-danger font-weight-bold" name="forget_password">Forgot your
                password?</a>
            </div>


            <div class="form-group">
              <a href="activateDisableAccount.php" class="text-danger font-weight-bold"
                name="activateDisableEmail">Activate
                your
                Disable Account</a>
            </div>

            <div class="text-center my-2">
              <div class="g-recaptcha text-center" data-sitekey="6LdGougUAAAAAG96eGund5fScrR1fouBZvyLf1RL"></div>
            </div>

            <button type="submit" class="btn btn-primary rounded-pill btn-block" name="login">Login</button>
            <h6 class="mt-3">Not have an Account? <a href="register.php"> Create Account Here</a></h6>

          </form>

        </div>
      </section>
    </div>
  </main>


  <!-- Footer Script -->
  <?php include_once "includes/footerScripts.php";?>

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