<?php

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

// ----------------------------->> START SESSION
session_start();

//------------------------------>> CHECKING USER
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News & Notifications</title>

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>

    <style>
        hr {
            border: 1px solid black;
            margin-bottom: 25px;
        }
    </style>

</head>

<body>

    <?php

// Sql Query
$sql = "SELECT * FROM news_information";

//Preparing Query
$result = $conn->prepare($sql);

//Executing Query
$result->execute();

?>

    <!--Include User Navbar-->
    <?php include_once "includes/navbar.php"?>


    <main class="container">

        <h3 class="text-center alert alert-info font-time my-5 text-uppercase">News & Notifications</h3>

        <div class="row">

            <?php

// Checking Count of Database Records
if ($result->rowCount() > 0) {
    ?>

            <section class="col-md-12 mb-5">
                <div class="table-responsive">
                    <table class="table table-bordered border-dark">
                        <thead class="text-center">
                            <tr>
                                <th>Sr. No</th>
                                <th>Tile</th>
                                <th>Description</th>
                                <th>Posted Date</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">

                            <?php

    // Fetching Values from Database
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td class="text-justify"><?php echo $row["newsTitle"]; ?></td>
                                <td class="text-justify"><?php echo $row["newsDescription"]; ?></td>
                                <td><?php echo $row["postedDate"]; ?></td>

                            </tr>

                            <?php
}
} else {
    echo "<script>Swal.fire({
                            icon: 'warning',
                            title: 'News Unavailable',
                            text: 'No News Available'
                            })</script>";
}
?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>


    <!--Include Footer & Footer Scripts-->
    <?php
include_once 'includes/footer.php';
include_once "includes/footerScripts.php";
?>

     <!--Include Footer & Footer Scripts-->
    <script src="js/form-validation.js"></script>

     <!--Close Database Connection-->
    <?php $conn = null;?>

</body>

</html>