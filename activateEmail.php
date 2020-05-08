<?php
// Creating Connection to Database
    require_once "configNew.php";
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
$token = $conn->real_escape_string($token);
$token = htmlentities($token);

$login = "login.php";
$sql = "update user_information set status='active' where token = '$token'";
$result = $conn->query($sql);
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

     <?php
    // closing Database Connnection
     $conn->close(); 
     ?>
   
</body>
</html>