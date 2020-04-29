<?php

session_start();
$eventName = $_SESSION['eventName'];
$userName= $_SESSION['user'];


require_once '../../config.php';

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
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

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

		
			$sql = "insert into `event_information`(email, certificateId, event, paymentType,
			 gatewayName, resMsg, bankName, txnId, txnAmount, orderId, status, 
			 bankTxnId, txnDate) VALUES ('$userName','$certificateId','$eventName', '$paymentType', 
			 '$gatewayName', '$resMsg', '$bankName', '$txnId', '$txnAmount', '$orderId', '$status',
			 '$bankTxnId', '$txnDate')";

	$result = mysqli_query($conn,$sql);
	
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


/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../../PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "vishalbait02@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "9921172153";

//Set who the message is to be sent from
$mail->setFrom('vishalbait02@gmail.com', 'Vishal Bait');

//Set an alternative reply-to address
$mail->addReplyTo('non-reply@gmail.com', 'vishal bait');

//Set who the message is to be sent to
$mail->addAddress($userName, $userName);

//Set the subject line
$mail->Subject = "GIT SHODH 2K20";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<!doctype html><html><body><h1> <i><b>$userName</b></i> You are Successfully Registered for $eventName. For More Details about
 <i><b>$eventName</b></i>, Please Contact Event Coordinator of <i><b>$eventName</b></i></h1></body></html>");

//Replace the plain text body with one created manually
$mail->AltBody = "<!doctype html><html><body><h1> <i><b>$userName</b></i> You are Successfully Registered for $eventName. For More Details about
<i><b>$eventName</b></i>, Please Contact Event Coordinator of <i><b>$eventName</b></i></h1></body></html>";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "<h3 class='text-center text-primary'>Check Your Email.</h3>";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
  //Mail Code 

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