<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

// -------------------------->>START SESSION
session_start();

//-------------------------->> DB CONFIG
require_once '../config/configPDO.php';

if (isset($_POST['event1'])) {
    $_SESSION["buttonEvent"] = htmlspecialchars($_POST['event1']);
    $buttonEvent = $_SESSION["buttonEvent"];
} else {
    $buttonEvent = $_SESSION["buttonEvent"];
}

$email = $_SESSION['user'];

try {

// ----------------------------->> EXTRACT ALL INFO. ABOUT USER & HIS/HER PARTICIPATION

    $sql = "SELECT * FROM user_information INNER JOIN synergy_event_registrations ON
user_information.email= synergy_event_registrations.email
WHERE user_information.email = :email AND synergy_event_registrations.eventName = :buttonEvent";

    $result = $conn->prepare($sql);

    $result->bindValue(":email", $email);
    $result->bindValue(":buttonEvent", $buttonEvent);

    $result->execute();

    $row = $result->fetch(PDO::FETCH_ASSOC);

    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $department = $row['departmentName'];
    $collegeName = $row['collegeName'];
    $prize = $row['prize'];
    $validate = $row['certificateId'];
    $event = $row['eventName'];

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();

}

?>


<!DOCTYPE html>
<html>

<head>
    <title><?php echo $culturalFestName ?>  | SYNERGY CERTIFICATE</title>
    <link rel="stylesheet" href="css/synergyCertificate.css">

    <style>
        .cert {
            margin: auto;
            background-image: url(../images/cert-images/synergy2-cert.jpg);
            width: 1200px;
            height: 765px;
            background-repeat: no-repeat;
            background-size: 1200px 765px;
        }

        .para {
            padding-top: 360px !important;
            font-size: 25px !important;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        span {
            color: blue;
        }

        .footer-text {
            padding-top: 20px;
            font-size: 20px;
            text-align: center;
        }

        div .center {
            display: block;
            margin-left: 46%;
        }

        .validate {
            color: red !important;
        }

        .center {
            display: block;
            margin-left: 46%;
        }
    </style>

</head>

<body onload="makeCode()">

    <section class="cert">

        <!-- Content of Certificate -->

        <p class="para"> Mr./Ms.<span><?php echo $firstName ?></span> <span><?php echo $lastName ?></span> of
            <span><?php echo $department ?></span> Department from <br><br>
           <span><?php echo $collegeName ?></span> College has Participated in <span><?php echo $event ?></span><br> <br> Event of <?php echo $culturalFestName ?> held during
            <?php echo $culturalFestDate ?> at GIT, Lavel & Won <span><?php echo $prize ?></span> Prize. </p>


        <div class="text-center mx-auto">
            <span id="qrcode" class="center" style="width:100px; height:100px;"></span>
        </div>
        <p class="footer-text text-center"><b><span class="validate">Certficate Id: <?php echo $validate ?></span><br>
                This is computer generated Certificate does not required any signature, to Authenticate this Certificate
                <br>
                Go to GIT SHODH/SYNERGY Verification System Page.</b></p>

    </section>



    <!-- JS Variables to Convert data into QR Code-->
    <script type="text/javascript">
        let a = "<?php echo $firstName ?>";
        let b = "<?php echo $lastName ?>";
        let c = "<?php echo $department ?>";
        let d = "<?php echo $event ?>";
        let e = "<?php echo $prize ?>";
        let f = "<?php echo $validate ?>";
    </script>

    <!-- QR Code JS Library-->
    <script type="text/javascript" src="../js/qrcode.min.js"></script>

    <!-- Convert JS Variable data into QR Code takes input above JS Variable-->
    <script type="text/javascript" src="../js/php-certQrCode.js"> </script>

      <!--Script of Button to Save PDF-->
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var printButton = document.getElementById("btnPrint");
            //Set the print button visibility to 'hidden'
            printButton.style.visibility = 'hidden';
            //Print the page content

            window.print();
        });
    </script>

     <script>
    if (window . history . replaceState) {
    window . history . replaceState(null, null, window . location . href);
    }
    </script>


    <!-- Close Database Connection -->
  <?php $conn = null;?>

</body>

</html>