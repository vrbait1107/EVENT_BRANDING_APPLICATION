<?php
// Creating Connection to Database
require_once "configPDO.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate Email</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php";?>

</head>
<body>

<?php

if (isset($_GET['token'])) {

    $token = $_GET['token'];

    $login = "login.php";

//Query
    $sql = "UPDATE user_information SET status= :active WHERE token = :token";

//Preparing Query
    $result = $conn->prepare($sql);

//Binding Values
    $result->bindValue(":active", "active");
    $result->bindValue(":token", $token);

//Executing Query
    $result->execute();

    if ($result) {
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
$conn = null;
?>

</body>
</html>