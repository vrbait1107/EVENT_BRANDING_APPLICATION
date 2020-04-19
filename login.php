<?php
session_start();
if(isset($_SESSION['user'])) {
  header('Location:index.php');
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS, then eventReg.css,  then animate.css,  then font-awesome.css,  then sweetAlert.js -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/event-reg.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Google Recaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <title>GIT SHODH 2K20</title>

  <style>
    .fa-users {
      border-radius: 100%;
      border: 2px solid #f0ad4e;
      padding: 10px;
    }

    a {
      text-decoration: none !important;
    }
  </style>
</head>

<body>

  <!-- PHP CODE START -->
  <?php

    require_once "config.php";

    if(isset($_POST["login"])) {

      if(isset($_POST['g-recaptcha-response'])) {

      $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
      $response = json_decode($verifyResponse);

      if($response->success){

        // To avoid sql injection and cross site scripting also remove white spaces
        function security($data){
        global $conn;
        $data = trim($data);
        $data = mysqli_real_escape_string($conn,$data);
        $data = htmlentities($data);
        return $data;
        }

        // calling function to perform security task
        $userName = security($_POST["userName"]);
        $password = security($_POST["password"]);

        $sql = "select mainPassword from user_information where email='$userName' and status='active'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        $dbpassword = $row['mainPassword'];

        if(password_verify($password,$dbpassword)){
            $_SESSION['user'] = $userName;
            header ("Location:index.php");
          
        }

        else {
          echo "<script>Swal.fire({
              icon: 'error',
              title: 'Unable to Login',
              text: 'Please Check Your Credentials'
            })</script>";
        }

      }// if $response

      else{
        echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Google Recaptcha Error',
            text: 'Please fill Google Recaptcha'
          })</script>";
      }

      }// if(isset($_POST['g-recaptcha-response']))
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
          <h2 class="text-center text-uppercase">GIT <span class="text-danger">SHODH</span> 2K20 LOGIN</h2>
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

            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password">
            </div>

            <div class="form-group">
              <a href="forgotPassword.php" class="text-danger font-weight-bold" name="forget_password">Forgot your
                password?</a>
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


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>