<?php

// Creating Connection to Database
    require_once "configNew.php";

// Staring Session
    session_start();

    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }

$sql = "SELECT * FROM sponsor_information";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsor information</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>

</head>

<body>

    <?php include_once "includes/navbar.php";?>


    <?php
                if($result->num_rows >0) {

                    ?>

    <div class="container my-5">
        <h1 class="text-danger text-center mb-5 font-time">SPONSOR PAGE</h1>
        <div class="row">

        <?php

            while($row= $result->fetch_assoc()){
           
            $sponsorLogo = $row["sponsorLogo"];
            $sponsorName = $row["sponsorName"];

            ?>

            <section class="col-md-4 mx-auto mb-5">
                <div class="card shadow" style="height:150px;">
                    <img src= "sponsorLogo/<?php echo $sponsorLogo ?>" class="img-fluid w-100 my-auto">
                </div>
                <h5 class="text-center text-uppercase btn btn-primary btn-block font-time"><?php echo  $sponsorName; ?></h5>
            </section>
            


            <?php
                    }
                }

                ?>

        </div>
    </div>

    <!-- Footer PHP -->
    <?php include_once "includes/footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

    <?php
    // closing Database Connnection
     $conn->close(); 
     ?>

</body>

</html>