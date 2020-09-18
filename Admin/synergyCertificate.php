<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

// -------------------------->>START SESSION
session_start();

//-------------------------->> DB CONFIG
require_once '../config/configPDO.php';

//-------------------------->> EXTRACT USER & HIS/HER PARTICIPATION DETAILS FROM DB

$CertId = htmlspecialchars($_POST['certificateId']);

$sql = "SELECT * FROM synergy_user_information WHERE certificateId = :certId";

//Preparing Query
$result = $conn->prepare($sql);

//Binding Value
$result->bindValue(":certId", $CertId);

//Executing the Query
$result->execute();

// Fetching Data from Database
$row = $result->fetch(PDO::FETCH_ASSOC);

$validate = $row['certificateId'];
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$department = $row['departmentName'];
$event = $row['eventName'];
$prize = $row['prize'];
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

        <p class="para"> Mr./Ms.<span><?php echo $firstName ?></span>&nbsp;<span><?php echo $lastName ?></span> of
            <span><?php echo $department ?></span>&nbsp;Department <br><br>
            has Participated in <span><?php echo $event ?></span> Event of <?php echo $culturalFestName ?>
            held <br><br>
            during <?php echo $culturalFestDate ?> at GIT, Lavel & Won <span><?php echo $prize ?></span> Prize. </p>

        <br>


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

    <!-- Close Database Connection -->
  <?php $conn = null;?>

</body>

</html>