<?php

// ------------------------------------->> START SESSION
session_start();

// ------------------------------------->> CHECKING USER
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}

//-------------------------------------->> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//-------------------------------------->> DB CONFIG
require_once "config/configPDO.php";

//--------------------------------------->> SECRETS
require_once "./config/Secret.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--First Include Header Script then google recaptcha -->
    <?php include_once "includes/headerScripts.php";?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title><?php echo $culturalFestName ?> | SYNERGY EVENT REGISTRATION</title>

</head>

<body>

    <?php

if (isset($_POST['hiddenEventName'])) {

    $_SESSION["hiddenEventName"] = htmlspecialchars($_POST['hiddenEventName']);

    $eventName = $_SESSION["hiddenEventName"];

} else {
    $eventName = $_SESSION["hiddenEventName"];
}

//---------------------------------------->> EVENT REGISTRATION

try {

    if (isset($_POST['eventRegister'])) {

        $userName = $_SESSION['user'];
        $eventName = htmlspecialchars($_POST["eventName"]);

        if (isset($_POST['g-recaptcha-response'])) {

            $secretKey = $recaptchaSecretKey;
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
            $response = json_decode($verifyResponse);

            if ($response->success) {

                $sql1 = "SELECT * FROM synergy_event_registrations WHERE eventName = :eventName AND email = :userName";

                # Preparing Query
                $result1 = $conn->prepare($sql1);

                # Binding Values
                $result1->bindValue(":eventName", $eventName);
                $result1->bindValue(":userName", $userName);

                # Executing Query
                $result1->execute();

                if ($result1->rowCount() > 0) {
                    echo "<script>alert('You are Already Registerd for $eventName Event')</script>";

                } else {

                    # Avoid XSS Attack
                    $eventName = htmlspecialchars($_POST['eventName']);
                    $userName = $_SESSION['user'];
                    $certificateId = rand();

                    # Query
                    $sql = "INSERT INTO synergy_event_registrations (email, certificateId, eventName)
                 VALUES (:userName, :certificateId, :eventName)";

                    # Preparing Query
                    $result = $conn->prepare($sql);

                    # Binding Value
                    $result->bindValue(":userName", $userName);
                    $result->bindValue(":certificateId", $certificateId);
                    $result->bindValue(":eventName", $eventName);

                    # Executing Query
                    $result->execute();

                    if ($result) {

                        /* PHP MAILER CODE */

                        include_once "emailCode/emailSynergyEventRegistration.php";

                        if (!$mail->send()) {

                            echo "<h6 class='text-center alert alert-warning'>Congratulation You are Successfully Registered for $eventName Event,
                                    But there is issue with sending Email to your account, Please Contact Event Coordinator</h6>";

                        } else {
                            echo "<h6 class='text-center alert alert-success'>Congratulation You are Successfully Registered for $eventName Event</h6>";
                        }

                    } else {
                        echo "<script>alert('Sorry, We failed to Register you, Please Try Again')</script>";
                    }

                }

            } else {
                echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Google Recaptcha Error',
                        text: 'Please fill Google Recaptcha'
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
?>

    <!-- Include User Navbar -->
    <?php include_once "includes/navbar.php";?>

    <main class="container">

        <div class="row" id="mainContainer">

            <section class="col-md-6 my-5 offset-md-3">

                    <h3 class="text-center font-time text-uppercase mb-5">Event Registrations</h3>

                    <form method="post" action="">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Label</th>
                                    <th scope="col">Value</th>
                                </tr>

                                <tr>
                                    <td scope="row">1</td>
                                    <td><label>Event Name</label></td>
                                    <td>
                                    <?php echo $eventName ?>
                                    <input type="hidden" id="eventName" name="eventName"  value="<?php echo $eventName ?>">
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <div class="text-center my-2">
                            <div class="g-recaptcha text-center" data-sitekey=<?php echo $recaptchaSiteKey; ?>></div>
                        </div>

                        <input value="Register" type="submit" name="eventRegister"
                            class="btn btn-primary btn-block rounded-pill">

                    </form>
            </section>

        </div>
    </main>

    <!-- Include Footer & Footer Scripts -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

</body>

</html>