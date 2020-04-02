<?php

session_start();
require_once "../config.php";

        $CertId= $_POST['certificateId'];
        $sql ="select * from synergy_user_information where certificateId = '$CertId'";
        
        $res= mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        
        $validate =$row['certificateId'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $department= $row['departmentName'];
        $event = $row['eventName'];
        $prize = $row['prize'];
?>


<!DOCTYPE html>
<html>

<head>
    <title>Certificate</title>

    <style type="text/css">
        .cert {
            margin: auto;
            background-image: url(../cert-images/synergy2-cert.jpg);
            width: 1200px;
            height: 765px;
            background-repeat: no-repeat;
            background-size: 1200px 765px;
        }

        .cert .para {
            padding-top:350px !important;
        
        }

        body p {
    font-size: 30px;
    text-align: center;
}

span {
    color: blue;
}


.footer-text {
     font-size:20px;
}

div .center {
    display: block;
    margin-left: 46%;
}

.validate {
    color:red !important;
} 

section .center {
    display: block;
    margin-left: 46%;
}
    </style>

</head>

<body onload="makeCode()">
    <section class="cert">

        <!-- Content of Certificate -->

        <p class="para"> Mr./Ms.<span><?php echo $firstName?></span>&nbsp;<span><?php echo $lastName?></span> of
            <span><?php echo $department?></span>&nbsp;Department <br><br>
            has Participated in <span><?php echo $event ?></span> Event of Synergy 2K20 held <br><br>
            during 14-15 March 2020 at GIT, Lavel & Won <span><?php echo $prize?></span> Prize. </p>

        <br>

        <span id="qrcode" class="center" style="width:100px; height:100px;"></span>

        <p class="footer-text"><b><span class="validate">Certficate Id: <?php echo $validate ?></span><br>
        This is computer generated Certificate does not required any signature, to Authenticate this Certificate <br> 
        Go to GIT SHODH/SYNERGY Verification System Page.</b></p>

    </section>

<script type="text/javascript" src="../js/jquery.min.js"></script>  
<script type="text/javascript">

var a= "<?php echo $firstName ?>" ;
var b="<?php  echo $lastName ?>";
var c= "<?php  echo $department?>";
var d= "<?php  echo $event ?>" ;
var e= "<?php echo $prize ?>";
</script>

<script type="text/javascript" src="../js/qrcode.js"></script>
<script type="text/javascript" src="../js/php-certQrCode.js"> </script>

</body>
</html>