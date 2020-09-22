<?php

$currentCookieParams = session_get_cookie_params();
$cookie_domain = 'localhost';
if (PHP_VERSION_ID >= 70300) {
    session_set_cookie_params([
        'lifetime' => $currentCookieParams["lifetime"],
        'path' => '/',
        'domain' => $cookie_domain,
        'secure' => "1",
        'httponly' => "1",
        'samesite' => 'None',
    ]);
} else {
    session_set_cookie_params(
        $currentCookieParams["lifetime"],
        '/; samesite=None',
        $cookie_domain,
        "1",
        "1"
    );
}

session_start();

// ini_set('session.cookie_secure', "1");
// ini_set('session.cookie_httponly', "1");
// ini_set('session.cookie_samesite', 'None');

$userName = $_SESSION['user'];
$eventName = $_SESSION['eventName'];
print_r($_SESSION);

//-------------------->> DB CONFIG
require_once '../../config/configPDO.php';

//-------------------->> SECRETS
require_once "../../config/Secret.php";

?>




<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Include Header Scripts -->
	<?php include_once "../../includes/headerScripts.php";?>

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
require_once "./lib/config_paytm.php";
require_once "./lib/encdec_paytm.php";

$paytmChecksum = "";
$paramList = array();

$isValidChecksum = "FALSE";

$paramList = $_POST;

//print_r($_POST);
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

if ($isValidChecksum == "TRUE") {
    if ($_POST["STATUS"] == "TXN_SUCCESS") {

        // ##################################   Inserting Data into Database

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

        $sql = "INSERT INTO event_information (email, certificateId, event, paymentType,
			 gatewayName, resMsg, bankName, txnId, txnAmount, orderId, status,
			 bankTxnId, txnDate) VALUES (:userName, :certificateId, :eventName, :paymentType,
			 :gatewayName, :resMsg, :bankName, :txnId, :txnAmount, :orderId, :status,
			 :bankTxnId, :txnDate)";

        //Preparing Query
        $result = $conn->prepare($sql);

        //Binding Value
        $result->bindValue(":userName", $userName);
        $result->bindValue(":certificateId", $certificateId);
        $result->bindValue(":eventName", $eventName);
        $result->bindValue(":paymentType", $paymentType);
        $result->bindValue(":gatewayName", $gatewayName);
        $result->bindValue(":resMsg", $resMsg);
        $result->bindValue(":bankName", $bankName);
        $result->bindValue(":txnId", $txnId);
        $result->bindValue(":txnAmount", $txnAmount);
        $result->bindValue(":orderId", $orderId);
        $result->bindValue(":status", $status);
        $result->bindValue(":bankTxnId", $bankTxnId);
        $result->bindValue(":txnDate", $txnDate);

        //Executing Query
        $result->execute();

        if ($result) {

            /* PHP MAILER CODE */

            include_once "../../emailCode/emailEventRegistration.php";

            if (!$mail->send()) {
                echo "<script>Swal.fire({
                    icon: 'Warning',
                    title: 'Transaction Successful & Email Error',
                    text: 'Congratulation You are Successfully Registered for $eventName Event,
                    But there is issue with sending Email to your account, Please Contact Event Coordinator'
                })</script>";

            } else {
                echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Transaction Successful',
                    text: 'Congratulation You are Successfully Registered for $eventName Event'
                })</script>";

            }

        } else {
            echo "<script>Swal.fire({
			icon: 'Warning',
			title: 'Transaction Successful',
            text: 'Your Transaction is successful, but we are unable to save your details
             in database, Please contact Event Coordinator'
		})</script>";

        }

        //Process your transaction here as success transaction.
        //Verify amount & order id received from Payment gateway with your application's order id and amount.

    } else {
        echo "<script>Swal.fire({
			icon: 'error',
			title: 'Transaction Failed',
			text: 'Transaction Status is Failed'
		})</script>";
    }

    if (isset($_POST) && count($_POST) > 0) {

        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-md-12">';

        echo '<h3 class="text-success text-uppercase text-center mb-5"> Transaction Details</h3>';
        echo '<table class="table table-bordered">';

        foreach ($_POST as $paramName => $paramValue) {
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

} else {
    echo "<b>Checksum Mismatched.</b>";
    //Process transaction as suspicious.
}

?>

</body>

</html>