<?php 
require_once "../config.php";
session_start();
if(!isset($_SESSION['Admin'])) {
    header('location:synergyLogin.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SYNERGY ADMIN</title>

    <!--Local css-->
    <link href="css/styles.css" rel="stylesheet" />
    <!--Bootstrap css-->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <!--Font-Awesome.css-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
    <!--SweetAlert.js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>



<body class="sb-nav-fixed" <?php if(isset($_POST['submit'])){
    echo "onload='savemessages()'";
}
?>>

    <?php

// Inserting Data into synergy_user_information table Database Name is user_registration

    if(isset($_POST['submit'])){

    $certificateId = rand();
    $firstName=  $_POST["firstName"];
    $lastName=  $_POST["lastName"];
    $department =$_POST["department"];
    $event = $_POST["event"];
    $prize = $_POST["prize"];

    // Avoid SQL Injection
    $firstName = mysqli_real_eascape_string($conn,$firstName);
    $lastName = mysqli_real_eascape_string($conn,$lastName);
    $department = mysqli_real_eascape_string($conn,$department);
    $event = mysqli_real_eascape_string($conn,$event);
    $prize = mysqli_real_eascape_string($conn,$prize);

    // Avoid Cross-Site Scripting
    $firstName = htmlentities($firstName);
    $lastName = htmlentities($lastName);
    $department = htmlentities($department);
    $event = htmlentities($event);
    $prize = htmlentities($prize);

        $sql = "insert INTO synergy_user_information (certificateId, firstName, lastName, departmentName,
        eventName, prize) VALUES ('$certificateId','$firstName','$lastName','$department', '$event','$prize')";
        $result = mysqli_query($conn,$sql);

                if($result){
                echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Inserted Successfully!'
                })</script>";
                }

            else{
                "<script>Swal.fire({
                        icon: 'success',
                        title: 'Error',
                        text: 'Something Went Wrong!'
                    })</script>";
            }
    
    }

?>

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="synergyIndex.php">Synergy Administrator</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>


        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="adminLogout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="synergyIndex.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>

                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                <a class="nav-link collapsed" href="#" data-toggle="collapse"
                                    data-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </a>

                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="adminLogin.php">Login</a>
                                        <a class="nav-link" href="password.php">Change Password</a></nav>
                                </div>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="synergyData.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>


                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:
                        <?php
                         echo $_SESSION['Admin'];
                         ?>
                    </div>

                </div>
            </nav>
        </div>


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">

                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    <!--  ADD Administartor Profile Form  -->
                    <div class="row">
                        <section class="col-md-6 offset-md-3">

                            <h3 class="text-white text-center bg-info mb-4 p-2"> ADD DATA FOR CERTIFICATE </h3>

                            <form action="" method="post" name="myForm" onsubmit="return synergyValidateForm()">

                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName"
                                        placeholder="Enter your First Name" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName"
                                        placeholder="Enter your Last Name" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select class="form-control" name="department" id="department">
                                        <option selected disabled>Select Department</option>
                                        <option value="Electronics and Telecommunication">Electronics and
                                            Telecommunication
                                        </option>
                                        <option value="Chemical">Chemical</option>
                                        <option value="Civil">Civil</option>
                                        <option value="Mechanical">Mechanical</option>
                                        <option value="Computer">Computer</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="event">Event Name</label>
                                    <select class="form-control" name="event" id="event">
                                        <option selected disabled>Select Event</option>
                                        <option value="Singing Competition">Singing Competition</option>
                                        <option value="Antakshari">Antakshari</option>
                                        <option value="Fishpond">Fishpond</option>
                                        <option value="Dance Competition">Dance Competition</option>
                                        <option value="Debate Competition">Debate Competition</option>
                                        <option value="Quiz Competition">Quiz Competition</option>
                                        <option value="Fashion Show Competition">Fashion Show Competition</option>
                                        <option value="Drama Competition">Drama Competition</option>
                                        <option value="Group Discussion Competition">Group Discussion Competition
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="prize">Prize</label>
                                    <select class="form-control" name="prize" id="prize">
                                        <option selected disabled>Select Prize</option>
                                        <option value="None">None</option>
                                        <option value="First">First</option>
                                        <option value="Second">Second</option>
                                        <option value="Third">Third</option>
                                    </select>
                                </div>

                                <input type="submit" name="submit" value="submit"
                                    class="btn btn-primary rounded-pill btn-block mb-5">

                            </form>
                        </section>
                    </div>

                    <!--  ADD Administartor Profile Form Complete -->
                </div>
            </main>
        </div>

        <!--Jquery-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>

        <script type="text/javascript">
            let a = "<?php echo $firstName ?>";
            let b = "<?php  echo $lastName ?>";
            let c = "<?php  echo $department?>";
            let d = "<?php  echo $event ?>";
            let e = "<?php echo $prize ?>";
            let f = "<?php echo $certificateId ?>";
        </script>

        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>
        <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
        <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>

        <script>
            // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "AIzaSyCzbLFCUfBHGmmWWye01lWPvOWhDxESjJc",
                authDomain: "git-shodh-2k20-certificates.firebaseapp.com",
                databaseURL: "https://git-shodh-2k20-certificates.firebaseio.com",
                projectId: "git-shodh-2k20-certificates",
                storageBucket: "git-shodh-2k20-certificates.appspot.com",
                messagingSenderId: "64170861595",
                appId: "1:64170861595:web:9eb79e0a9a68e3b6b144be",
                measurementId: "G-5ZWXWTC1EW"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            firebase.analytics();

            var db = firebase.firestore();
            var messagesRef = db.collection("Synergy Certificate");

            function savemessages() {

                messagesRef.add({
                    First_Name: a,
                    Last_Name: b,
                    Department: c,
                    Event: d,
                    Prize: e,
                    CertificateId: f
                })
                    .then(function () {
                        console.log("Document successfully written!", messagesRef.id);
                    })
                    .catch(function (error) {
                        console.error("Error writing document: ", error);
                    });

            }

        </script>

        <!--JS Validation-->
        <script src="../js/form-validation.js"></script>
        <!--Bootstrap js-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <!--Script-->
        <script src="js/scripts.js"></script>
        <!--Datatable Bootstrap.js-->
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>