<?php

require_once "config/techfestName.php";

require_once "config/configPDO.php";

session_start();

//------------------------------>> VISITOR COUNTER

try {

    $visitorIpAddress = $_SERVER['REMOTE_ADDR'];

    $sql1 = "SELECT * FROM visitor_counter WHERE ipAddress = :visitorIpAddress";
    $result1 = $conn->prepare($sql1);
    $result1->bindValue("visitorIpAddress", $visitorIpAddress);
    $result1->execute();

    # Total row Count
    $totaVisitor = $result1->rowCount();

    if ($totaVisitor == 0) {
        $sql2 = "INSERT INTO visitor_counter (ipAddress) VALUES (:visitorIpAddress)";
        $result2 = $conn->prepare($sql2);
        $result2->bindValue(":visitorIpAddress", $visitorIpAddress);
        $result2->execute();
    }

    $sql = "SELECT * FROM visitor_counter";
    $result = $conn->prepare($sql);
    $result->execute();

    if ($result) {
        $totaVisitors = $result->rowCount();
    }
} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

?>

<!Doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">

    <!--First Inlude Header Scripts, then Loader.css then Index.css-->
    <?php include_once "includes/headerScripts.php"; ?>
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/index.css">

    <title><?php echo $techfestName ?> | HOME</title>

</head>

<body>


    <!--Loader-->
    <div id="loader"></div>

    <!--Include User Navbar-->
    <?php include_once "includes/navbar.php"; ?>


    <main class="container-fluid welcome-section">
        <div class="row mx-auto text-center">
            <h1 class="p-3 font-Staatliches-heading mx-auto text-white" data-aos="zoom-in" data-aos-duration="1500">Welcome to <?php echo $techfestName ?> <br> National Level
                Techfest </h1>
            <picture>
                <source srcset="images/home/shodh1.webp" type="image/webp">
                <img src="images/home/shodh1.jpg" class="d-block w-100 img-fluid" alt="GIT SHODH">
            </picture>
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
                                <picture>
                                    <source srcset="images/home/git1.webp" type="image/webp">
                                    <img src="images/home/git1.jpg" class="d-block w-100 img-fluid" alt="git1">
                                </picture>
                            </div>
                            <div class="carousel-item">
                                <picture>
                                    <source srcset="images/home/git2.webp" type="image/webp" loading="lazy">
                                    <img src="images/home/git2.jpg" class="d-block w-100 img-fluid" alt="git2" loading="lazy">
                                </picture>
                            </div>
                            <div class="carousel-item">
                                <picture>
                                    <source srcset="images/home/git4.webp" type="image/webp" loading="lazy">
                                    <img src="images/home/git4.jpg" class="d-block w-100 img-fluid" alt="git4" loading="lazy">
                                </picture>

                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </section>

            <section class="col-md-5">
                <h3 class="text-center font-time text-white">ABOUT <?php echo $techfestName ?></h3>
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


    <!--Newsletter Section-->

    <div class="container">
        <div class="row">
            <section class="col-md-6 offset-md-3 py-5">
                <h2 class="text-center text-uppercase font-time mb-4">Subscribe to our newsletter</h2>

                <form id="newsletterForm"
                    hx-post="ajaxHandlerPHP/ajaxIndex.php"
                    hx-trigger="click #submit"
                    hx-target="#responseMessage"
                    hx-swap="innerHTML"
                    hx-vals='{"email": "subscribe"}'>

                    <div class="text-center mt-2">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" id="submit">Subscribe Now</button>
                        </div>
                        <span class="text-danger">
                            You must Login to subscribe to the Newsletter. You will receive the newsletter at your registered email.
                        </span>
                    </div>

                    <h5 id="responseMessage" class="mt-3 text-center font-time"></h5>
                </form>

            </section>
        </div>
    </div>


    <hr>

    <!-- Visitor Counter-->
    <div class="visitor-container p-3">
        <h3 class="text-uppercase text-center text-dark font-time">Total Visitor
            Count: <?php echo $totaVisitors ?></h3>
    </div>

    <!-- Include Footer & Footer Scripts PHP -->
    <?php
    include_once "includes/footer.php";
    include_once "includes/footerScripts.php";
    ?>

    <!-- Index js -->
    <script src="js/index.js"></script>

    <!-- Close Database Connection -->
    <?php $conn = null; ?>

</body>

</html>