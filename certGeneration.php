<?php 

// Creating Connection to Database
    require_once "configNew.php";

// Staring Session
    session_start();

$buttonEvent= $_POST['event1'];
$email = $_SESSION['user'];

$sql ="select * FROM user_information INNER JOIN event_information ON 
user_information.email= event_information.email 
WHERE user_information.email = '$email' and event_information.event = '$buttonEvent'";

$result= $conn->query($sql);
$row= $result->fetch_assoc();

$firstName = $row['firstName'];
$lastName = $row['lastName'];
$department= $row['departmentName'];
$prize = $row['prize'];
$validate =$row['certificateId'];
$event = $row['event'];


// Different Certificate for Every Department 
$sql1 = "select * from events_details_information where eventName = '$buttonEvent'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$certificateDepartment = $row1['eventDepartment'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Certificate</title>

    <!-- Certificate CSS-->
    <link rel="stylesheet" href="css/certificate.css">
    <link rel="stylesheet" href="css/certificateShodh.css">
    
    

    <style type="text/css">
        .cert {

            <?php if($certificateDepartment==="Electronics and Telecommunication") {
                echo "background-image: url(cert-images/extc-cert.jpg);";
            }

            elseif($certificateDepartment==="Chemical") {
                echo "background-image: url(cert-images/chem-cert.jpg);";
            }

            elseif($certificateDepartment==="Civil") {
                echo "background-image: url(cert-images/civil-cert.jpg);";
            }

            elseif($certificateDepartment==="Computer") {
                echo "background-image: url(cert-images/comp-cert.jpg);";
            }

            else {
                echo "background-image: url(cert-images/mech-cert.jpg);";
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
        <p class="mainContent"> Mr./Ms.<span><?php echo $firstName?></span>&nbsp;<span><?php echo $lastName?></span> of
            <span><?php echo $department?></span>&nbsp;Department <br><br>
            has Participated in <span><?php echo $event ?></span> Event of Shodh 2K20 held <br><br>
            during 07-08 March 2020 at GIT, Lavel & Won <span><?php echo $prize?></span> Prize. </p>

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

    <!--Jquerry-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <!-- JS Variables to Convert data into QR Code-->
    <script type="text/javascript">
        let a = "<?php echo $firstName ?>";
        let b = "<?php  echo $lastName ?>";
        let c = "<?php  echo $department?>";
        let d = "<?php  echo $event ?>";
        let e = "<?php echo $prize ?>";
        let f = "<?php echo $validate ?>";
    </script>

    <!-- QR Code JS Library-->
    <script type="text/javascript" src="js/qrcode.js"></script>

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

     <?php
    // closing Database Connnection
     $conn->close(); 
     ?>

</body>
</html>