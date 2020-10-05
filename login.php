<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//--------------------------->> SECRETS
require_once "./config/Secret.php";

//-------------------------->> START SESSION
session_start();

//-------------------------->> CHECKING USER
if (isset($_SESSION['user'])) {
    header('Location:index.php');
}

?>


<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Include Header Scripts, then Login.css then Google Recaptcha -->
  <?php include_once "includes/headerScripts.php";?>
  <link rel="stylesheet" href="css/login.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <title><?php echo $techfestName ?> | LOGIN</title>

</head>

<body>

  <?php

if (isset($_POST["login"])) {

    try {

        if (isset($_POST['g-recaptcha-response'])) {

            $secretKey = $recaptchaSecretKey;

            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
            $response = json_decode($verifyResponse);

            if ($response->success) {

                $userName = $_POST["userName"];
                $password = $_POST["password"];

                $userName = trim($_POST["userName"]);
                $password = trim($_POST["password"]);

                $userName = htmlspecialchars($_POST["userName"]);
                $password = htmlspecialchars($_POST["password"]);

                # SQL Query
                $sql = "SELECT password, status FROM user_information WHERE email= :userName";

                # Preparing Query
                $result = $conn->prepare($sql);

                # Binding Value
                $result->bindValue(":userName", $userName);

                # Executing Value
                $result->execute();

                $row = $result->fetch(PDO::FETCH_ASSOC);

                $status = $row['status'];
                $dbpassword = $row['password'];

                # Verify Password
                if (password_verify($password, $dbpassword)) {
                    if ($status == "active") {

                        # If verify redirect to Index Page
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

    } catch (PDOException $e) {
        echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
        # Development Purpose Error Only
        echo "Error " . $e->getMessage();
    }
}
?>

<!-- External Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><?php echo $techfestName ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="Admin/adminLogin.php">Admin Login</a>
                </li>
            </ul>
        </div>
    </nav>


  <main class="container my-4">
    <div class="row">
      <section class="col-md-6 offset-md-3">

        <div class="card shadow p-5">
          <h2 class="text-center text-uppercase font-time">USER LOGIN</h2>
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
              <div class="g-recaptcha text-center" data-sitekey=<?php echo $recaptchaSiteKey; ?>></div>
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

  <!-- Hiding and Showing Password Javascript -->
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

<!-- Close Database Connection -->
  <?php $conn = null;?>

</body>

</html>