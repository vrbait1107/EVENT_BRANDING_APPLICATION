<?php
session_start();
if(!isset($_SESSION['user'])) {
 header("location:login.php");
}

require_once "configNew.php";

$visitorIpAddress = $_SERVER['REMOTE_ADDR'];

$sql1 = "select * from visitor_counter where ipAddress = '$visitorIpAddress'";
$result1 = $conn->query($sql1);
$totaVisitor =  $result1->num_rows;

if($totaVisitor == 0) {
$sql2 = "Insert into visitor_counter (ipAddress) values ('$visitorIpAddress')";
$result2 = $conn->query($sql2);
}


// Retrive Data from Database
$sql = "select * from visitor_counter";
$result = $conn->query($sql);

if($result){
    $totaVisitors =  $result->num_rows;
}

?>

<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>GIT SHODH 2K20</title>

    <!--Animate CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>
    <!--Loader-->
    <link rel="stylesheet" href="css/loader.css">

    <style>
        .welcome-section,
        .visitor-container {
            background: #24C6DC;
            background: -webkit-linear-gradient(to right, #514A9D, #24C6DC);
            background: linear-gradient(to right, #514A9D, #24C6DC);
        }

        .second-section {
            background: #136a8a;
            background: -webkit-linear-gradient(to right, #267871, #136a8a);
            background: linear-gradient(to right, #267871, #136a8a);
        }
    </style>

</head>

<body>

    <!--Loader-->
    <!-- MUTLI SPINNER -->
    <div id="loader" class="text-center">
        <div class="multi-spinner-container">
            <div class="multi-spinner">
                <div class="multi-spinner">
                    <div class="multi-spinner">
                        <div class="multi-spinner">
                            <div class="multi-spinner">
                                <div class="multi-spinner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Navbar-->
    <?php include_once "includes/navbar.php"; ?>

    <main class="container-fluid welcome-section">
        <div class="row mx-auto text-center">
            <h1 class="p-3 font-time  mx-auto animated flip slow text-white">Welcome to SHODH 2K20 <br> National Level
                Techfest </h1>
            <img src="gallery/shodh1.jpg" class="img-fluid" alt="">
        </div>
    </main>

    <main class="container-fluid p-5 second-section">
        <div class="row">
            <section class="col-md-7 mt-3 mb-5">
                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/git1.png" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/git2.jpg" class="d-block w-100 img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/git4.jpg" class="d-block w-100 img-fluid" alt="...">

                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </section>

            <section class="col-md-5">
                <h3 class="text-center font-time text-white">ABOUT SHODH 2K20</h3>
                <p class="text-justify text-white">SHODH, GIT Lavel is the annual science and technology festival of
                    the Gharda
                    Institute of Technology
                    Lavel. Started in
                    2008 with the aim of providing a platform for the Indian student community to develop and showcase
                    their technical
                    prowess.

                    Year after year, SHODH explores the various aspects of science and technology and the profound
                    impacts they have on our
                    lives. For the last 12 years, SHODH has constantly grown, evolved, and pushed the boundaries of what
                    a college fest can
                    be. With something to offer for everyone, SHODH is the ideal destination for all technophiles: young
                    or old, beginner or
                    expert, student or professional to witness, learn and experience the wonders of science and
                    technology.

                    This year marks the 12th Edition of SHODH, GIT Lavel. The fest shall take place from 7th to 8th of
                    March, 2020 at the
                    beautiful, green campus of GIT Lavel in Maharashtra, India. Boasting of a huge roster of exciting
                    and engaging events,
                    this edition of SHODH promises to be grander, greater and more glorious than ever before.

                    So grab your friends, mark your calendars, and gear up for Kokan’s Largest Science and Technology
                    Festival.</p>

            </section>
        </div>
    </main>

    <div class="visitor-container p-3">
        <h3 class="text-uppercase text-center text-white font-time">Total Visitor
            Count: <?php echo $totaVisitors ?></h3>
    </div>

    <!-- Footer PHP -->
    <?php include_once "includes/footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

    <script>
        window.onload = () => {
            document.getElementById("loader").style.display = "none";
        };
    </script>

</body>

</html>