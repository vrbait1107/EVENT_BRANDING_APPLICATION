<?php 
require_once "../config.php";
session_start();

// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
if(!isset($_SESSION['adminEmail']) && 
$_SESSION['adminType'] &&
$_SESSION['adminDepartment'] &&
$_SESSION['adminEvent']){
header('Location:adminLogin.php');
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
    <title>Administrator</title>

    <!--Local StyleSheet-->
    <link href="css/styles.css" rel="stylesheet" />
    <!--DataTable Bootstrap-->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <!--Font-Awesome-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
    <!--SweetAlert.js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>



<body class="sb-nav-fixed">

    <?php 
    
    // Inserting Data into admin_information table Database Name is user_registration
    
    if(isset($_POST['addAdmin'])){
    
       $email= $_POST['email'];
       $adminType = $_POST['adminType'];
       $adminDepartment = $_POST['adminDepartment'];
       $adminEvent = $_POST['adminEvent'];
       $password = $_POST['password'];
       $password= password_hash($password,PASSWORD_BCRYPT);
    
       $sql = "select * from admin_information where admin_information.email = '$email'";
       $result = mysqli_query($conn,$sql);
    
       if(mysqli_num_rows($result)>0) {
    
        echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Unable to Insert Data',
                text: 'Admin Profile Already Exist'
            })</script>";
      }
       else{
    
        $sql = "insert into admin_information (email, adminType, adminDepartment, adminEvent, 
        adminPassword) VALUES ('$email','$adminType', '$adminDepartment','$adminEvent', '$password')";
        $result= mysqli_query($conn,$sql);
    
        if($result) {
            echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Successfully Inserted Admin Profile'
                })</script>";
        }
        else {
            echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'ERROR',
                    text: 'Something Went Wrong'
                })</script>";
        }
    
    }
    }
    
    // Inserting data into admin_information is Completed
    ?>


    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="adminIndex.php">Administrator</a><button
            class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button><!-- Navbar Search-->
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
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
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

                        <a class="nav-link" href="adminIndex.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
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
                                        <div>
                                </a>

                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="adminLogin.php">Login</a>
                                        <a class="nav-link" href="password.php">Change Password</a>
                                    </nav>
                                </div>

                            </nav>
                        </div>



                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-area"></i>
                            </div>
                            Charts
                        </a>

                        <a class="nav-link" href="adminIndexData.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-table"></i>
                            </div>
                            Tables
                        </a>

                    </div>
                </div>


                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION['adminType']; ?>
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
                        <div class="col-md-6 offset-md-3">

                            <h5 class="text-danger text-center mb-3">Note: Main Addministrator Can Add Only Faculty
                                Coordinators</h5>

                            <h3 class="text-white text-center bg-info mb-4 p-2"> ADD ADMINISTRATOR PROFILE </h3>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Enter Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                        required>
                                </div>


                                <div class="form-group">
                                    <label>Admin Type</label>
                                    <select class="form-control" name="adminType">
                                        <option value="Administrator">Administrator</option>
                                        <option value="Faculty Coordinator">Faculty Coordinator</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Admin Department</label>
                                    <select class="form-control" name="adminDepartment">
                                        <option value="Not Applicable">Not Applicable</option>
                                        <option value="Electronics & Telecommunication">Electronics & Telecommunication
                                        </option>
                                        <option value="Chemical">Chemical</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Mechanical">Mechanical</option>
                                        <option value="Civil">Civil</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Admin Event</label>
                                    <select class="form-control" name="adminEvent">
                                        <option value="Not Applicable">Not Applicable</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password" required autocomplete="off">
                                </div>


                                <div class="form-group">
                                    <input class="btn btn-primary btn-block rounded-pill mb-5" type="submit"
                                        class="form-control" name="addAdmin" id="addAdmin" value="ADD PROFILE">
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--  ADD Administartor Profile Form Complete -->


                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Administrator Details</div>
                        <div class="card-body">
                            <div class="table-responsive">


                                <?php  

                                // Fetching All Details From user_information Table 

                    $sql = 'select * from admin_information where adminType = "Faculty Coordinator"';
                    $result = mysqli_query($conn,$sql);


                     echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                     echo '<thead>';
                     echo '<tr>';
                     echo '<th>Email</th>';
                     echo '<th>Admin Type</th>';
                     echo '<th>Admin Department</th>';
                     echo '<th>Admin Event</th>';
                     echo '</tr>';
                     echo '</thead>';
                     echo '<tbody>';

                    while($row=mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['adminType'] . '</td>';
                    echo '<td>' . $row['adminDepartment'] . '</td>';
                    echo '<td>' . $row['adminEvent'] . '</td>';
                    echo '</tr>';

                    }

                    echo '</tbody>';
                    echo '</table>';

                            ?>

                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2019</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <!--Script-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>