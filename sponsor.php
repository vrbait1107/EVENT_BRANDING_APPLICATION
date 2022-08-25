<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//------------------------------>> START SESSION
session_start();

//------------------------------>> EXTRACT DATA FROM DB

try {

    # Sql Query
    $sql = "SELECT * FROM sponsor_information";

    # Preparing Query
    $result = $conn->prepare($sql);

    # Executing Query
    $result->execute();
} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $techfestName ?> | SPONSORS</title>
    <link rel="stylesheet" href="css/sponsor.css">

    <!--Include Header Scripts -->
    <?php include_once "includes/headerScripts.php"; ?>

</head>

<body>

    <!-- Include User Navbar -->
    <?php include_once "includes/navbar.php"; ?>

    <main class="container mt-5">

        <h1 class="text-center font-Staatliches-heading"><?php echo $techfestName ?> - SPONSORS</h1>
        <hr style="border-top: 2px solid rgba(0,0,0,.1);"/>

        <div class="row" id="mainContainer">

            <?php

            #Checking Count
            if ($result->rowCount() > 0) {

                # Fetching Data from Database
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
            } else {
                echo "No Records Available in Database";
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
    <?php $conn = null; ?>

</body>

</html>