<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password Page</title>

    <!--Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--SweetAlert.js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!--Font-Awesome CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        h3 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Navbar PHP -->
    <?php include_once "navbar.php"; ?>


    <!-- PHP Code Start -->

<?php 
require_once "config.php";

// Generating Random Password to Send Over Email.
$token =   bin2hex(random_bytes(15));

if(isset($_POST['submit'])){

$email = trim($_POST['email']);
$userType = trim($_POST['userType']);

    // User Part
    if($userType=== "user"){

    $sql = "select email from user_information where email = '$email'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)===1) {

    // Mail PHP code 
    date_default_timezone_set('Etc/UTC');
    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "vishalbait02@gmail.com";
    $mail->Password = "9921172153";
    $mail->setFrom('vishalbait02@gmail.com', 'Vishal Bait');
    $mail->addReplyTo('non-reply@gmail.com', 'vishal bait');
    $mail->addAddress($email, $email);
    $mail->Subject = "GIT SHODH 2K20 PASSWORD RESET";

    $mail->msgHTML("<!doctype html><html><body><h3>$email Please Click below link to reset your password 
   http://localhost/EBA/resetPassword.php?token=$token </h3></body></html>");

    $mail->AltBody = "$email Please Click below link to reset your password 
   http://localhost/EBA/resetPassword.php?token=$token";


            if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            } 

            else {
    
            $sql = "UPDATE user_information SET token ='$token' WHERE email = '$email'";
            $result1 = mysqli_query($conn, $sql);

                if($result1) {
                echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Password Reset Link sent to your email, Check Your Mail.'
                })</script>";
                }

                else{
                echo "<script>Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: 'We are failed to send email for reset password.'
                })</script>";

                }

            }

        } // if($result)

        else {
            echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'No Such Email Found'
            })</script>";
        }

    } //if($userType=== "user") bracket


    // Admin Part
 elseif($userType=== "admin"){

    $sql = "select email from admin_information where email = '$email'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)===1) {

    // Mail PHP code 
    date_default_timezone_set('Etc/UTC');
    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "vishalbait02@gmail.com";
    $mail->Password = "9921172153";
    $mail->setFrom('vishalbait02@gmail.com', 'Vishal Bait');
    $mail->addReplyTo('non-reply@gmail.com', 'vishal bait');
    $mail->addAddress($email, $email);
    $mail->Subject = "GIT SHODH 2K20 PASSWORD RESET";

    $mail->msgHTML("<!doctype html><html><body><h3>$email Please Click below link to reset your password 
   http://localhost/EBA/resetPassword.php?token=$token </h3></body></html>");

    $mail->AltBody = "$email Please Click below link to reset your password 
   http://localhost/EBA/resetPassword.php?token=$token";


            if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            } 

            else {
    
            $sql = "UPDATE user_information SET token ='$token' WHERE email = '$email'";
            $result1 = mysqli_query($conn, $sql);

                if($result1) {
                echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Password Reset Link sent to your email, Check Your Mail.'
                })</script>";
                }

                else{
                echo "<script>Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: 'We are failed to send email for reset password.'
                })</script>";

                }

            } //if ($result)

            }

        else {
            echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'No Such Email Found'
            })</script>";
        }

    } //elseif($userType=== "user") bracket

   else {
    echo "Something Went Wrong";
   }

}

?>

    <!-- PHP Code Ended -->

    <main class="container">
        <div class="row my-5">
            <section class="col-md-6 offset-md-3 mb-5">
                <div class="card shadow p-5">


                    <h3 class="text-center text-uppercase text-primary mb-3">Password Recovery</h3>
                    <hr>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Enter Your Email</label>
                            <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Email"
                                autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>User Type</label>
                            <select name="userType" class="form-control">
                                <option value="user">Normal User</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>

                        <input type="submit" value="Submit" name="submit"
                            class="btn btn-primary mt-3 btn-block rounded-pill">


                    </form>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer PHP -->
    <?php include_once "footer.php"; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>