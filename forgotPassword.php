<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

// ---------------------->> SECRETS
require_once "./config/Secret.php";

// ---------------------->> START SESSION
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>

     <title><?php echo $techfestName ?> | FORGOT PASSWORD</title>
</head>

<body>

    <?php

# Generate Random Token
$token = bin2hex(random_bytes(15));

if (isset($_POST['submit'])) {

    try {

        if (isset($_POST['h-captcha-response'])) {

            $secretKey = $hcaptchaSecretKey;

            $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret=' . $secretKey . '&response=' . $_POST['h-captcha-response']);
            $response = json_decode($verifyResponse);

            if ($response->success) {

                # Remove White Spaces
                $email = trim($_POST['email']);
                $userType = trim($_POST['userType']);

                # Avoid XSS Attack
                $email = htmlspecialchars($_POST['email']);
                $userType = htmlspecialchars($_POST['userType']);

                // ----------------------------------------------------->> USER TYPE = USER
                if ($userType === "user") {

                    # Query
                    $sql = "SELECT email FROM user_information WHERE email = :email";

                    # Preparing Query
                    $result = $conn->prepare($sql);

                    # Binding Value
                    $result->bindValue(":email", $email);

                    # Executing Query
                    $result->execute();

                    if ($result->rowCount() === 1) {

                        /* PHP MAILER CODE */
                        include "./emailCode/emailForgotPassword.php";

                        if (!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;

                        } else {

                            $tokenDate = date("Y-m-d H:i:s");

                            $tokenDateMain = date('Y-m-d H:i:s', strtotime('+45 minutes', strtotime($tokenDate)));

                            # Update Query
                            $sql = "UPDATE user_information SET token = :token, tokenDate = :tokenDateMain  WHERE email = :email";

                            # Preparing Query
                            $result = $conn->prepare($sql);

                            # Binding Value
                            $result->bindValue(":token", $token);
                            $result->bindValue(":tokenDateMain", $tokenDateMain);
                            $result->bindValue(":email", $email);

                            # Executing Query
                            $result->execute();

                            if ($result) {
                                echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'An email with your password reset link has been sent, if the provided email address is registerd with us.'
                    })</script>";

                            } else {
                                echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'We are failed to send email for reset password.'
                    })</script>";

                            }

                        }

                    } else {
                        echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'An email with your password reset link has been sent, if the provided email address is registerd with us.'
                    })</script>";

                    }

                }

                // ----------------------------------------------------->> USER TYPE = ADMINISTRATOR

                elseif ($userType === "admin") {

                    # Query for admin
                    $sql = "SELECT email FROM admin_information WHERE email = :email";

                    # Preparing Query
                    $result = $conn->prepare($sql);

                    # Binding Value
                    $result->bindValue(":email", $email);

                    # Executing Query
                    $result->execute();

                    if ($result->rowCount() === 1) {

                        /* PHP MAILER CODE */

                        include "./emailCode/emailForgotPassword.php";

                        if (!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;

                        } else {

                            $tokenDate = date("Y-m-d H:i:s");
                            $tokenDateMain = date('Y-m-d H:i:s', strtotime('+45 minutes', strtotime($tokenDate)));

                            # Update Query
                            $sql = "UPDATE admin_information SET token = :token, tokenDate = :tokenDateMain  WHERE email = :email";

                            # Preparing Query
                            $result = $conn->prepare($sql);

                            # Binding Value
                            $result->bindValue(":token", $token);
                            $result->bindValue(":tokenDateMain", $tokenDateMain);
                            $result->bindValue(":email", $email);

                            # Executing Query
                            $result->execute();

                            if ($result1) {
                                echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'An email with your password reset link has been sent, if the provided email address is registerd with us.'
                    })</script>";

                            } else {
                                echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'We are failed to send email for reset password.'
                    })</script>";

                            }
                        }

                    } else {
                        echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'An email with your password reset link has been sent, if the provided email address is registerd with us.'
                    })</script>";
                    }

                } else {
                    echo "Something Went Wrong";
                }

            } else {
                echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Captcha Error',
                        text: 'Please fill Captcha'
                      })</script>";

            }
        } else {
            echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Captcha Error',
                        text: 'Please fill Captcha'
                      })</script>";

        }

    } catch (PDOException $e) {
        echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
        # Development Purpose Error Only
        echo "Error " . $e->getMessage();

    }

}

?>



    <main class="container">
        <div class="row my-5">
            <section class="col-md-6 offset-md-3 mb-5">
                <div class="card shadow p-5">


                    <h3 class="text-center text-uppercase font-time text-primary mb-3">Forgot Your Password?</h3>

                    <p class="text-center">We get it, stuff happens. Just enter your email address below and we'll send
                        you a link to reset
                        your password!</p>

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

                         <div class="text-center my-2">
                            <div class="h-captcha text-center" data-sitekey="<?php echo $hcaptchaSiteKey; ?>"></div>
                        </div>

                        <input type="submit" value="Submit" name="submit"
                            class="btn btn-primary mt-3 btn-block rounded-pill">

                    </form>

                    <h6 class="font-sans mt-3">Go to <a href="login.php">login</a> page</h6>
                </div>
            </section>
        </div>
    </main>

    <!-- Include Footer and Footer Scripts -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

     <!-- Close Database Connection -->
     <?php $conn = null;?>

</body>

</html>