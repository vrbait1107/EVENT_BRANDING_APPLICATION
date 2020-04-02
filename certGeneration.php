
<?php 
session_start();
require_once "config.php";

$buttonEvent= $_POST['event1'];
$vrb = $_SESSION['user'];
$sql ="select * FROM user_information INNER JOIN event_information ON 
user_information.email= event_information.email 
WHERE user_information.email = '$vrb' and event_information.event = '$buttonEvent'";

$res= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);


$firstName = $row['firstName'];
$lastName = $row['lastName'];
$department= $row['departmentName'];
$prize = $row['prize'];
$validate =$row['certificateId'];
$event = $row['event'];

?>


<!DOCTYPE html>
<html>

<head>
    <title>Certificate</title>
    <link rel="stylesheet" href="css/certificate.css">

    <style type="text/css">
        .cert {
            margin: auto;
            background-image: url(cert-images/extc-cert.jpg);
            width: 1200px;
            height: 750px;
            background-repeat: no-repeat;
            background-size: 1200px 750px;
        }

        #qrcode{
            padding-top:25px;
        }
        
     .validate {
    color:red !important;
}

span {
    color:blue;
}

button {
    margin-left: 45%;
    background-color:#0275d8;
    color:white;
    padding: 5px 15px 5px 15px;
    font-size:18px;
    border-radius:10px;

}
   
section .center {
    display: block;
    margin-left: 46%;
}
    </style>

</head>


<body  onload="makeCode()">

    <button id="btnPrint">Save as PDF</button>

    <section class="cert">
        <!--         Content of Certificate         -->

        <p> Mr./Ms.<span><?php echo $firstName?></span>&nbsp;<span><?php echo $lastName?></span> of
            <span><?php echo $department?></span>&nbsp;Department <br><br>
            has Participated in <span><?php echo $event ?></span> Event of Shodh 2K20 held <br><br>
            during 07-08 March 2020 at GIT, Lavel & Won <span><?php echo $prize?></span> Prize. </p>

        <span id="qrcode" class="center" style="width:100px; height:100px; margin-top:15px;"></span>

        <p class="footer-text"><b><span class="validate">Certficate Id: <?php echo $validate ?></span><br>
        This is computer generated Certificate does not required any signature, to Authenticate this Certificate <br> 
        Go to GIT SHODH Verification System Page.</b></p>
    </section>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">

var a= "<?php echo $firstName ?>" ;
var b="<?php  echo $lastName ?>";
var c= "<?php  echo $department?>";
var d= "<?php  echo $event ?>" ;
var e= "<?php echo $prize ?>";
</script>

<script type="text/javascript" src="js/qrcode.js"></script>
<script type="text/javascript" src="js/php-certQrCode.js"> </script>



    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var printButton = document.getElementById("btnPrint");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
    
        window.print();
        });
    </script>

</body>
</html>