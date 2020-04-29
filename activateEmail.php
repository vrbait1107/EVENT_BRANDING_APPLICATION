<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate Email</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>
   
</head>
<body>

<?php

if(isset($_GET['token'])) {

$token = $_GET['token'];
$token = mysqli_real_escape_string($conn,$token);
$token = htmlentities($token);

$login = "login.php";
$sql = "update user_information set status='active' where token = '$token'";
$result = mysqli_query($conn,$sql);
if($result){
     echo "<script>Swal.fire({
        icon: 'success',
        title: 'Account is Activated',
        text: 'Your account is successfully activated, Please Login to Continue',
        footer: '<a href = $login >Go to the Login Page</a>'
      })</script>";
}
}

?>
   
</body>
</html>