<?php
session_start();
require_once '../../config.php';

$eventName =$_POST['eventName'];
$eventPrice = $_POST['eventPrice'];
$userName= $_SESSION['user'];
?>

<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Merchant Check Out Page</title>
	<meta name="GENERATOR" content="Evrsoft First Page">

	<!-- header Scripts and Links -->
	<?php include_once "headerScripts.php"; ?>

	<style>
		h3 {
			font-family: 'Times New Roman', Times, serif;
			font-weight: bold;
			background-color: aliceblue;
		}


		td,
		th {
			font-size: 18px;
		}
	</style>
</head>

<body>

	<?php 

$sql = "select * from event_information where event = '$eventName' and email = '$userName'";
$result = mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0){

	echo "<script>Swal.fire({
			icon: 'warning',
			title: 'Already Registered',
			text: 'You are Already Registerd for $eventName Event'
		})</script>";

}

?>

	<main class="container">
		<div class="row">

			<section class="col-md-6 offset-md-3 card shadow text-center  p-5 my-5">

				<h3 class="text-center text-uppercase mb-5">Event Payment CheckOut Page</h3>

				<form method="post" action="pgRedirect.php">

					<table class="table table-bordered">
						<tbody>
							<tr>
								<th scope="col">S.No</th>
								<th scope="col">Label</th>
								<th scope="col">Value</th>
							</tr>


							<tr>
								<td scope="row">1</td>
								<td><label>Event Name</label></td>
								<td><?php echo $eventName?>
									<input type="hidden" id="eventName" tabindex="1" maxlength="50" size="20"
										name="eventName" autocomplete="off" value="<?php echo $eventName?>">
								</td>
							</tr>


							<tr>
								<input type="hidden" id="ORDER_ID" tabindex="2" maxlength="20" size="20" name="ORDER_ID"
									autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
							</tr>


							<tr>
								<input type="hidden" id="CUST_ID" tabindex="3" maxlength="20" size="20" name="CUST_ID"
									autocomplete="off" value="CUST001">
							</tr>


							<tr>
								<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="20" size="20"
									name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
							</tr>

							<tr>
								<input type="hidden" id="CHANNEL_ID" tabindex="5" maxlength="20" size="20"
									name="CHANNEL_ID" autocomplete="off" value="WEB">
							</tr>

							<tr>
								<td scope="row">2</td>
								<td><label>Event Entry Fee</label></td>
								<td>&#x20b9;<?php echo $eventPrice?>
									<input type="hidden" title="TXN_AMOUNT" tabindex="6" type="text" name="TXN_AMOUNT"
										value=<?php echo $eventPrice?>>
								</td>
							</tr>

						</tbody>
					</table>

					<input value="CheckOut" type="submit" class="btn btn-primary btn-block rounded-pill mt-5"
						onclick="">

				</form>
			</section>
		</div>
	</main>
</body>

</html>