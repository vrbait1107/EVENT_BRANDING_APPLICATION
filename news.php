<?php

require_once "config/techfestName.php";

require_once "config/configPDO.php";

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $techfestName ?> | NEWS & NOTIFICATIONS</title>

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php"; ?>

    <style>
        hr {
            border: 1px solid black;
            margin-bottom: 25px;
        }
    </style>

</head>

<body>

    <?php

    try {
        $sql = "SELECT * FROM news_information";
        $result = $conn->prepare($sql);
        $result->execute();
    } catch (PDOException $e) {
        echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
        # Development Purpose Error Only
        echo "Error " . $e->getMessage();
    }

    ?>

    <!--Include User Navbar-->
    <?php include_once "includes/navbar.php" ?>


    <main class="container">

        <h1 class="text-center font-Staatliches-heading mt-5 text-uppercase">News & Notifications</h1>
        <hr class="mb-5" style="border-top: 2px solid rgba(0,0,0,.1);"/>

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


    <!--Include Footer & Footer Scripts-->
    <?php
    include_once 'includes/footer.php';
    include_once "includes/footerScripts.php";
    ?>

    <!--Include Footer & Footer Scripts-->
    <script src="js/form-validation.js"></script>

    <!--Close Database Connection-->
    <?php $conn = null; ?>

</body>

</html>