<?php

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";
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
    $sql = "SELECT * FROM user_information WHERE token = :token";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":token", $token);

    //Executing Query
    $result->execute();

    $row = $result->fetch(PDO::FETCH_ASSOC);

    $dbtokenDate = strtotime($row['tokenDate']);

    $currentDatetime = date("Y-m-d H:i:s");

    $currentDatetimeMain = strtotime($currentDatetime);

    if ($dbtokenDate >= $currentDatetimeMain) {

        $sql1 = "UPDATE user_information SET status = :active WHERE token = :token";

        $result1 = $conn->prepare($sql1);
        $result1->bindValue(":active", "active");
        $result1->bindValue(":token", $token);
        $result->execute();

        if ($result1) {
            echo "<script>Swal.fire({
        icon: 'success',
        title: 'Account is Activated',
        text: 'Your account is successfully activated, Please Login to Continue',
        footer: '<a href = $login >Go to the Login Page</a>'
      })</script>";
        }

    } else {
        echo "<script>Swal.fire({
        icon: 'warning',
        title: 'Token Time Expire',
        text: 'Please Register Again',
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