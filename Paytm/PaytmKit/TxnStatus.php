<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Transaction status query</title>
	<meta name="GENERATOR" content="Evrsoft First Page">

	<!-- header Scripts and Links -->
	<?php include_once "headerScripts.php"; ?>

	<style>
		h1,
		h2 {
			font-family: 'Times New Roman', Times, serif;
			font-weight: bold;
			background-color: aliceblue;
			margin-bottom: 30px;
		}

		body {
			margin-top: 30px;
		}
	</style>
</head>

<body>



	<main class="container">
		<div class="row">
			<section class="col-md-6 offset-md-3">
				<h2 class="text-center text-uppercase">Transaction Status Query</h2>
				<form method="post" action="">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td><label>ORDER_ID::*</label></td>
								<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID"
										autocomplete="off" value="<?php echo $ORDER_ID ?>">
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input value="Status Query" class="btn btn-primary" type="submit" onclick=""></td>
							</tr>
						</tbody>
					</table>
					<br /></br />
					<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
					<h2 class="text-center text-uppercase">Response of Status Query:</h2>
					<table style="border: 1px solid nopadding" class="table table-bordered">
						<tbody>
							<?php
					foreach($responseParamList as $paramName => $paramValue) {
				?>
							<tr>
								<td style="border: 1px solid" class="text-info font-weight-bold">
									<label><?php echo $paramName?></label></td>
								<td style="border: 1px solid" class="text-info font-weight-bold">
									<?php echo $paramValue?></td>
							</tr>
							<?php
					}
				?>
						</tbody>
					</table>
					<?php
		}
		?>
				</form>
			</section>
		</div>
	</main>
</body>

</html>