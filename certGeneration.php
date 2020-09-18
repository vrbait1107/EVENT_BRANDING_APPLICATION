<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

// ----------------------------->> STARTING SESSION
session_start();

$buttonEvent = htmlspecialchars($_POST['event1']);
$email = $_SESSION['user'];

// ----------------------------->> EXTRACT ALL INFO. ABOUT USER & HIS/HER PARTICIPATION

$sql = "SELECT * FROM user_information INNER JOIN event_information ON
user_information.email= event_information.email
WHERE user_information.email = :email AND event_information.event = :buttonEvent";

$result = $conn->prepare($sql);

$result->bindValue(":email", $email);
$result->bindValue(":buttonEvent", $buttonEvent);

$result->execute();

$row = $result->fetch(PDO::FETCH_ASSOC);

$firstName = $row['firstName'];
$lastName = $row['lastName'];
$department = $row['departmentName'];
$prize = $row['prize'];
$validate = $row['certificateId'];
$event = $row['event'];

// ------------------------------------>> DIFF. BACKGROUND FOR DIFFERENT DEPARTMENT

$sql1 = "SELECT * from events_details_information where eventName = '$buttonEvent'";

$result1 = $conn->prepare($sql1);

$result1->bindValue(":buttonEvent", $buttonEvent);

$result1->execute();

$row1 = $result1->fetch(PDO::FETCH_ASSOC);

$certificateDepartment = $row1['eventDepartment'];

?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $techfestName ?> | CERTIFICATE</title>

    <!-- Certificate CSS-->
    <link rel="stylesheet" href="css/certificate.css">
    <link rel="stylesheet" href="css/certificateShodh.css">

    <style type="text/css">
        .cert {

<?php
if ($certificateDepartment === "Electronics and Telecommunication") {
    echo "background-image: url(images/cert-images/extc-cert.jpg);";

} elseif ($certificateDepartment === "Chemical") {
    echo "background-image: url(images/cert-images/chem-cert.jpg);";

} elseif ($certificateDepartment === "Civil") {
    echo "background-image: url(images/cert-images/civil-cert.jpg);";

} elseif ($certificateDepartment === "Computer") {
    echo "background-image: url(images/cert-images/comp-cert.jpg);";

} else {
    echo "background-image: url(images/cert-images/mech-cert.jpg);";
}

?>
           margin: auto;
            width: 1200px;
            height: 750px;
            background-repeat: no-repeat;
            background-size: 1200px 750px;
        }

           </style>

</head>


<body onload="makeCode()">

    <button id="btnPrint">Save as PDF</button>

    <section class="cert">

        <!--Content of Certificate-->
        <p class="mainContent"> Mr./Ms.<span><?php echo $firstName ?></span>&nbsp;<span><?php echo $lastName ?></span> of
            <span><?php echo $department ?></span>&nbsp;Department <br><br>
            has Participated in <span><?php echo $event ?></span> Event of <?php echo $techfestName ?> held <br><br>
            during <?php echo $techfestDate ?> at GIT, Lavel & Won <span><?php echo $prize ?></span> Prize. </p>

        <span id="qrcode" class="center" style="width:100px; height:100px; margin-top:10px;"></span>

        <p class="footer-text">
            <b><span class="validate">Certficate Id: <?php echo $validate ?></span><br>
                This is computer generated Certificate does not required any signature, Verify certificate at<br>
                <a target="_blank"
                    href="http://localhost/EBA/verifyCertificate.php?certificateId=<?php echo $validate ?>">
                    http://localhost/EBA/verifyCertificate.php?certificateId=<?php echo $validate ?>
                </a> or Go to Certificate Verification Page.</b>
        </p>

    </section>

    <!--Jquery-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

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
    <script type="text/javascript" src="js/qrcode.min.js"></script>

    <!-- Convert JS Variable data into QR Code takes input above JS Variable-->
    <script type="text/javascript" src="js/php-certQrCode.js"> </script>


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

    <!-- Close Database Connection -->
     <?php $conn = null;?>

</body>
</html>