<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate Email</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- SweetAlert.js -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


   
</head>
<body>

<?php

if(isset($_GET['token'])) {

$token = $_GET['token'];
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