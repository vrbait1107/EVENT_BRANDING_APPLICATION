<!DOCTYPE html>
<html lang="en">

<?php
//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//------------------------------>> START SESSION
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GIT SHODH 2K20 | COLLEGE GALLERY</title>

    <!-- First Header Scripts, then Magnify-pop-up.css-->
    <?php include_once "includes/headerScripts.php";?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        integrity="sha256-PZLhE6wwMbg4AB3d35ZdBF9HD/dI/y4RazA3iRDurss=" crossorigin="anonymous" />

</head>

<body>

    <!-- Include Navbar -->
    <?php include_once "includes/navbar.php"?>

    <main class="container">
        <h3 class="text-center font-time alert alert-info text-uppercase my-5">Gallery</h3>

        <div class="row mx-auto images">

            <?php

// Sql Query
$sql = "SELECT * FROM gallery_information";

//Preparing Query
$result = $conn->prepare($sql);

//Executing Value
$result->execute();

// Fetching Data from Database
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    ?>
            <section class="col-md-4 mb-5">
                <a href="images/gallery/<?php echo $row['galleryImage']; ?>">
                    <img src="images/gallery/<?php echo $row['galleryImage']; ?>" class="img-fluid w-100" alt="images"
                        style="min-height:250px">
                </a>
            </section>
            <?php
}
?>

        </div>
    </main>


    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php";?>

     <!-- Footer-->
    <?php include_once "includes/footer.php";?>

    <!-- Magnify-Pop-up.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha256-P93G0oq6PBPWTP1IR8Mz/0jHHUpaWL0aBJTKauisG7Q=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function () {
            $('.images').magnificPopup({
                delegate: "a",
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>

    <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>