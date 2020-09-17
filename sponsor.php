<?php

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//------------------------------>> START SESSION
session_start();

//------------------------------>> CHECKING USER
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}

//------------------------------>> EXTRACT DATA FROM DB

// Sql Query
$sql = "SELECT * FROM sponsor_information";

// Preparing Query
$result = $conn->prepare($sql);

// Executing Query
$result->execute();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIT SHODH 2K20 | SPONSORS</title>
    <link rel="stylesheet" href="css/sponsor.css">

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>

     <!-- Include User Navbar -->
    <?php include_once "includes/navbar.php";?>

    <main class="container mt-5">

        <h3 class="alert alert-info text-center mb-5 font-time">SPONSOR PAGE</h3>
        <div class="row" id="mainContainer">

    <?php

//Checking Count
if ($result->rowCount() > 0) {

    // Fetching Data from Database
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $sponsorLogo = $row["sponsorLogo"];
        $sponsorName = $row["sponsorName"];

        ?>

            <section class="col-md-4 mx-auto mb-5">
                <div class="card shadow" style="height:150px;">
                    <img src="images/sponsorLogo/<?php echo $sponsorLogo; ?>" class="img-fluid w-100 my-auto">
                </div>
                <h5 class="text-center text-uppercase alert alert-info text-dark font-time"><?php echo $sponsorName; ?>
                </h5>
            </section>

            <?php
}
}
?>

        </div>
    </main>

    <!-- Include Footer & Footer Scripts -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

    <!-- Close DB Connection -->
    <?php $conn = null;?>

</body>

</html>