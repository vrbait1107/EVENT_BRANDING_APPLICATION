<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $techfestName?> | ACTIVATE ACCOUNT</title>

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>

</head>
<body>

<?php

if (isset($_GET['token'])) {

    try {

        # Avoid XSS Attack
        $token = htmlspecialchars($_GET['token']);

        $login = "login.php";

        # Query
        $sql = "SELECT * FROM user_information WHERE token = :token";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Values
        $result->bindValue(":token", $token);

        # Executing Query
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $dbtokenDate = strtotime($row['tokenDate']);

        $currentDatetime = date("Y-m-d H:i:s");

        $currentDatetimeMain = strtotime($currentDatetime);

        # Checking Wether token time expired or not.
        if ($dbtokenDate >= $currentDatetimeMain) {

            $sql1 = "UPDATE user_information SET status = :active WHERE token = :token";

            $result1 = $conn->prepare($sql1);
            $result1->bindValue(":active", "active");
            $result1->bindValue(":token", $token);
            $result1->execute();

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

    } catch (PDOException $e) {
        echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
        # Development Purpose Error Only
        echo "Error " . $e->getMessage();
    }

}

?>

    <!-- Close Database Connection -->
     <?php $conn = null;?>

</body>
</html>