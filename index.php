<?php
session_start();
if(!isset($_SESSION['user'])) {
 header("location:login.php");
}

require_once "config.php";

$visitorIpAddress = $_SERVER['REMOTE_ADDR'];

$sql1 = "select * from visitor_counter where ipAddress = '$visitorIpAddress'";
$result1 = mysqli_query($conn,$sql1);
$totaVisitor =  mysqli_num_rows($result1);

if($totaVisitor == 0) {
$sql2 = "Insert into visitor_counter (ipAddress) values ('$visitorIpAddress')";
$result2 = mysqli_query($conn,$sql2);
}


// Retrive Data from Database
$sql = "select * from visitor_counter";
$result = mysqli_query($conn,$sql);

if($result){
    $totaVisitors =  mysqli_num_rows($result);
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
    <?php include_once "headerScripts.php"; ?>
     <!--Loader-->
    <link rel="stylesheet" href="css/loader.css">

    <style>
       
        .container-fluid {
            background: #24C6DC;
            background: -webkit-linear-gradient(to right, #514A9D, #24C6DC);
            background: linear-gradient(to right, #514A9D, #24C6DC);
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
    <?php include_once "navbar.php"; ?>


    <main class="container">

        <section class="my-4  animated flip">
            <h1 class="text-center font-time">Welocome To GIT Shodh 2K20</h1>
            <h4 class="text-center font-time text-danger">Registration are Open.!!!</h4>
        </section>
        <hr>

        <div class="row">
            <section class="col-md-12">
                <div class="card shadow bg-aliceblue p-3 my-5">

                    <i>
                        <h1 class="text-center text-danger font-time">Gharda Institute of Technology, Lavel</h1>
                    </i>
                    <i>
                        <h1 class="text-center text-danger font-time">SHODH 2K20</h1>
                    </i>
                    <h1 class="text-center animated flip font-time"> National Level Techfest</h1>

                </div>
            </section>
        </div>

        <div class="row">
            <section class="col-md-12 mb-5">
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
        </div>
    </main>

    <div class="container-fluid">
        <div class="row">
            <section class="col-md-6 my-5 offset-md-3 text-center">

                <div class="card-header bg-lightblack">
                    <h1 class="text-uppercase font-time text-white">Visitor
                        Counter</h1>
                </div>

                <div class="card-body">
                    <p class="display-3 text-white font-time"><?php echo $totaVisitors ?> </p>
                </div>

            </section>
        </div>
    </div>

    <!-- Footer PHP -->
    <?php include_once "footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "footerScripts.php"; ?>

    <script>
        window.onload = () => {
            document.getElementById("loader").style.display = "none";
        };
    </script>

</body>

</html>