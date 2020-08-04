<?php

// Creating Connection to Database
require_once "configPDO.php";

// Staring Session
session_start();

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

    <!-- header Scripts and Links -->
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

// sql Query
$sql = "SELECT * FROM news_information";

//Preparing Query
$result = $conn->prepare($sql);

//Executing Query no need to Bind Values here
$result->execute();

?>

    <!--Navbar.php-->
    <?php include_once "includes/navbar.php"?>


    <main class="container">

        <h3 class="text-center alert alert-info font-time my-5 text-uppercase">News & Notifications</h3>

        <div class="row">

            <?php

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


    <!--Footer.PHP-->
    <?php include_once 'includes/footer.php';?>
    <script src="js/form-validation.js"></script>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php";?>

    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>