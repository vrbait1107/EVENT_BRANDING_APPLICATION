<?php

session_start();
$eventName = $_SESSION['eventName'];
$userName= $_SESSION['user'];


require_once '../../configNew.php';

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- header Scripts and Links -->
	<?php include_once "../../includes/headerScripts.php"; ?>

	<title>Page Response</title>

</head>

<body class="my-5">

	<div class="text-center mb-5">
		<a href="../../index.php" class="btn btn-primary">Go to Home Page</a>
	</div>




	<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();

$isValidChecksum = "FALSE";

$paramList = $_POST;

//print_r($_POST);
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
		if ($_POST["STATUS"] == "TXN_SUCCESS") {

			// ##################################   Inserting Data into Database


$sql = "select * from event_information where email = '$userName' and event = '$eventName'";
$result = $conn->query($sql);

if($result->num_rows >0){

	echo "<script>Swal.fire({
			icon: 'warning',
			title: 'Already Registered',
			text: 'You are Already Registered for $eventName Event'
		})</script>";
}


else {
           
			$paymentType = "Online Banking";
			$certificateId = rand();
			$gatewayName = $_POST['GATEWAYNAME'];
			$resMsg = $_POST['RESPMSG'];
			$bankName = $_POST['BANKNAME'];
			$txnId = $_POST['TXNID'];
			$txnAmount = $_POST['TXNAMOUNT'];
			$orderId = $_POST['ORDERID'];
			$status = $_POST['STATUS'];
			$bankTxnId = $_POST['BANKTXNID'];
			$txnDate = $_POST['TXNDATE'];

		
			$sql = "INSERT INTO `event_information`(email, certificateId, event, paymentType,
			 gatewayName, resMsg, bankName, txnId, txnAmount, orderId, status, 
			 bankTxnId, txnDate) VALUES ('$userName','$certificateId','$eventName', '$paymentType', 
			 '$gatewayName', '$resMsg', '$bankName', '$txnId', '$txnAmount', '$orderId', '$status',
			 '$bankTxnId', '$txnDate')";

	        $result = $conn->query($sql);
	
	if(!$result){
		echo "Unable to Registered";
	}


	echo "<script>Swal.fire({
			icon: 'success',
			title: 'Transaction Successful',
			text: 'Congratulation You are Successfully Registered for $eventName Event'
		})</script>";


	  //Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.

			// ************************************* Inserting Data into Database is Complete
		
 //Mail Code

date_default_timezone_set('Etc/UTC');

require '../../PHPMailer/PHPMailerAutoload.php';

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
$mail->setFrom('vishalbait02@gmail.com', 'GIT SHODH 2K20');
$mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');
$mail->addAddress($userName, $userName);
$mail->Subject = "GIT SHODH 2K20";
global $orderId;

$mail->msgHTML("<!doctype html><html><body>
    <h4>Dear $userName,</h4>
    <p>Thank you for registering to $eventName. Your registration and payment has been received.</p>
    <p>Your Order Id is $orderId</p>
    <p>You registered with this email: $userName.</p>
    <p>For more details about $eventName, Please visit our event information page of GIT SHODH website,
    You will get all the information about this event
    also you will get contact details of event coordinator </p>
    <p>We look forward to seeing you on 15/04/2021</p>
    <p>Kind Regards,</p>
    <p>GIT SHODH TEAM</p></body></html>");

$mail->AltBody = "<!doctype html><html><body>Dear $userName, <br/>
Thank you for registering to $eventName. Your registration and payment has been received.</p>
	<p>Your Order Id is $orderId <br/>
	You registered with this email: $userName. <br/>
	For more details about $eventName, Please visit our event information page of GIT SHODH website,
    You will get all the information about this event
	also you will get contact details of event coordinator </br>
	We look forward to seeing you on 15/04/2021 <br/>
	Kind Regards, <br/>
	GIT SHODH TEAM
	</body></html>";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "<h3 class='text-center text-primary'>Check Your Email.</h3>";
}

	}

} // mysqli_num_row Close Bracket

else {
	echo "<script>Swal.fire({
			icon: 'error',
			title: 'Transaction Failed',
			text: 'Transaction Status is Failed'
		})</script>";
}



	if (isset($_POST) && count($_POST)>0 )
	{ 

		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		
		echo '<h3 class="text-success text-uppercase text-center mb-5"> Transaction Details</h3>';
		echo '<table class="table table-bordered">';
		
		foreach($_POST as $paramName => $paramValue) {
			echo '<tr>';
			echo '<td class="text-info">' . $paramName . '</td>';
			echo '<td>' . $paramValue . '</td>';
			echo '</tr>';
				
		}
		echo '</table>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	

}
else {
	echo "<b>Checksum Mismatched.</b>";
	//Process transaction as suspicious.
}

?>

</body>

</html>