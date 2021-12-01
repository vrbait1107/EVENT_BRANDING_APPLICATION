<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//------------------------>> SECRETS
require_once "./config/Secret.php";

//------------------------>> STARTING SESSION
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $techfestName ?> | REACTIVATE USER ACCOUNT</title>

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>

</head>

<body>

    <?php

try {

    if (isset($_POST['reactivate'])) {

        if (isset($_POST['h-captcha-response'])) {

            $secretKey = $hcaptchaSecretKey;

            $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret=' . $secretKey . '&response=' . $_POST['h-captcha-response']);
            $response = json_decode($verifyResponse);

            if ($response->success) {

                # Avoid XSS
                $email = htmlspecialchars($_POST['email']);

                # sql Query
                $sql = "SELECT * FROM user_information WHERE email = :email";

                # Preparing query
                $result = $conn->prepare($sql);

                # Binding Values
                $result->bindValue(":email", $email);

                # Executing Query
                $result->execute();

                if ($result->rowCount() === 0) {
                    echo "<script>Swal.fire({
                icon: 'error',
                title: 'error',
                text: 'No Such email present in database to reactivate your account'
            })</script>";

                } else {

                    # Generate Token
                    $token = bin2hex(random_bytes(15));

                    # Sql Query
                    $sql = "UPDATE user_information SET token = :token WHERE email = :email";

                    # Preparing Query
                    $result = $conn->prepare($sql);

                    # Binding Values
                    $result->bindValue(":token", $token);
                    $result->bindValue(":email", $email);

                    # Executing Query
                    $result->execute();

                    if ($result) {

                        /* PHP MAILER CODE */
                        include_once "./emailCode/emailDisableAccount.php";

                        if (!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        } else {
                            echo " <script>Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Email Sent'
                        })</script>";
                        }

                    }

                }

            }else{
                echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Captcha Error',
                        text: 'Please fill Captcha'
                      })</script>";

            }

        }else{
             echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Captcha Error',
                        text: 'Please fill Captcha'
                      })</script>";
        }

    }

// -------------------------------->> ACTIVATE USER ACCOUNT

    if (isset($_GET['token'])) {

        # Avoid XSS
        $token = htmlspecialchars($_GET['token']);

        # Sql Query
        $sql = "UPDATE user_information SET status = :active WHERE token = :token";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Values
        $result->bindValue(":active", "active");
        $result->bindValue(":token", $token);

        # Executing Query
        $result->execute();

        if ($result) {
            echo "<script>Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Your account is successfully reactivated, We are happy to see you again'
                  })</script>";
        }
    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

?>


    <!-- Include User Navbar -->
    <?php include_once "includes/navbar.php";?>


    <main class="container">
        <div class="row">
            <div class="col-md-6 my-5 offset-md-3">
                <h1 class="font-time text-center">Activate Your Disable Account</h1>
                <h5 class="text-center my-3">To activate your disable account please enter your email address in below
                    input
                    and check your email inbox, then click on link which is sent on your email your account will be
                    Reactivate.</h5>

                <form action="" method="post">

                    <div class="form-group mt-2">
                        <label>Enter Your Email Address</label>
                        <input type="email" name="email" class="form-control" />
                    </div>

                      <div class="text-center my-2">
                            <div class="h-captcha text-center" data-sitekey="<?php echo $hcaptchaSiteKey; ?>"></div>
                        </div>

                    <input type="submit" name="reactivate" value="Submit" class="btn btn-primary btn-block rounded-pill">
                    <h6 class="mt-3"><a href="login.php">Click Here for Login Page</a></h6>
                </form>
            </div>
        </div>
    </main>

    <!-- Include Footer & Footer Scripts -->
    <?php include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

     <!-- Close Database Connection -->
     <?php $conn = null;?>

</body>

</html>