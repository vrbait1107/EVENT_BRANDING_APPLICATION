<?php 

//Starting Database Conection
require_once "../configPDO.php";

// Starting Session
session_start();


// Checking if Admin is Login or Not if Not Login Sending to the Admin Login Page
    if( !isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if($_SESSION['adminType'] !== "Faculty Coordinator"){
           header("location:adminLogin.php");
   }
   
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
    <title>Dashboard-Faculty Coordinator</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php"; ?>

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
        
           $sql = "SELECT* FROM admin_information WHERE admin_information.email = '$email'";

           //Preparing Query
           $result = $conn->prepare($sql);

           //Binding Values
           $result->bindValue(":email", $email);

           //Executing Value
           $result->execute();
    
           if( $result->rowCount() >0) {
        
            echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Unable to Insert Data',
                    text: 'Admin Profile Already Exist'
                })</script>";
          }
           else{
        
            $sql = "INSERT INTO admin_information (email, adminType, adminDepartment, adminEvent, 
            adminPassword) VALUES (:email, :adminType, :adminDepartment, :adminEvent, :password)";

            //Preparing Query
            $result= $conn->prepare($sql);

            //Binding Values
            $result->bindValue(":email", $email);
            $result->bindValue(":adminType", $adminType);
            $result->bindValue(":adminDepartment", $adminDepartment);
            $result->bindValue(":adminEvent", $adminEvent);
            $result->bindValue(":password", $password);

            //Executing Query
            $result->execute();
        
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
        
        // delete admin_information
        if(isset($_REQUEST['delete'])){
        
        $delete = $_GET['hiddenEmail'];
        $sql = "DELETE FROM admin_information WHERE email = :delete";

        //Preparing Query
        $result = $conn->prepare($sql);

        //Binding Values
        $result->bindValue(":delete", $delete);

        //Executing Value
        $result->execute();
        
        if($result) {
        echo "
        <script>Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data Successfully Deleted'
            })</script>";
        }
        else {
        echo "
        <script>Swal.fire({
                icon: 'error',
                title: 'ERROR',
                text: 'We are failed to delete data'
            })</script>";
        }
        }
 ?>


    <!-- Admin Navbar -->
    <?php

    $adminFileName = "facultyCoordinatorIndex.php";
    $adminFileData = "facultyCoordinatorData.php";
    $adminManage =  "facultyCoordinatorManage.php";
    include_once "includes/adminNavbar.php";
    ?>



    <div id="layoutSidenav_content">

        <main class="container-fluid">

            <!--  ADD Administartor Profile Form  -->
            <div class="row">

                <section class="col-md-6 mt-5 offset-md-3">

                    <h5 class="text-danger text-center mb-3">Note: Faculty Coordinators Can Add Only Student
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
                                <option value="Student Coordinator">Student Coordinator</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Admin Department</label>
                            <select class="form-control" name="adminDepartment">
                                <option value="Electronics and Telecommunication">Electronics and
                                    Telecommunication
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
                                <option value="EXTC Paper Presentation">EXTC Paper Presentation</option>
                                <option value="EXTC Poster Presentation">EXTC Poster Presentation</option>
                                <option value="EXTC Project Presentation">EXTC Project Presentation</option>
                                <option value="Tech Boss">Tech Boss</option>
                                <option value="Fun Tech">Fun Tech</option>
                                <option value="School Event">School Event</option>
                                <option value="Logo Contest">Logo Contest</option>
                                <option value="Calci War">Calci War</option>
                                <option value="Chemical Paper Presentation">Chemical Paper Presentation
                                </option>
                                <option value="Chemical Poster Presentation">Chemical Poster Presentation
                                </option>
                                <option value="Chemical Project Presentation">Chemical Project Presentation
                                </option>
                                <option value="Computer Paper Presentation">Computer Paper Presentation
                                </option>
                                <option value="Computer Poster Presentation">Computer Poster Presentation
                                </option>
                                <option value="Computer Project Presentation">Computer Project Presentation
                                </option>
                                <option value="Mechanical Paper Presentation">Mechanical Paper Presentation
                                </option>
                                <option value="Mechanical Poster Presentation">Mechanical Poster
                                    Presentation
                                </option>
                                <option value="Mechanical Project Presentation">Mechanical Project
                                    Presentation
                                </option>
                                <option value="Civil Paper Presentation">Civil Paper Presentation</option>
                                <option value="Civil Poster Presentation">Civil Poster Presentation</option>
                                <option value="Civil Project Presentation">Civil Project Presentation
                                </option>
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
                </section>
            </div>


            <!-- Display Student Coordinator Admin Department Wise -->

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Administrator Details</div>
                <div class="card-body">
                    <div class="table-responsive">


                        <?php  

                    // Fetching All Details From user_information Table 
                    $departmentAdmin = $_SESSION["adminDepartment"];

                    $sql = "SELECT * FROM admin_information WHERE adminType = :studentCoordinator AND 
                    adminDepartment = :departmentAdmin";

                    // Preparing Query
                    $result = $conn->prepare($sql);

                    //Binding Values
                    $result->bindValue(":studentCoordinator", "Student Coordinator");
                    $result->bindValue(":departmentAdmin",  $departmentAdmin);

                    // Executing Query
                    $result->execute();
                    ?>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Email</th>
                                    <th>Admin Type</th>
                                    <th>Admin Department</th>
                                    <th>Admin Event</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                        while($row=$result->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                <tr class="text-center">
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['adminType'] ?></td>
                                    <td><?php echo $row['adminDepartment'] ?></td>
                                    <td><?php echo $row['adminEvent'] ?></td>

                                    <td>
                                        <form action="">
                                            <input type="submit" class="btn btn-small btn-danger" value="Delete"
                                                name="delete" />
                                            <input type="hidden" value="<?php echo $row['email'] ?>"
                                                name="hiddenEmail" />
                                        </form>
                                    </td>
                                </tr>

                                <?php
                                         }
                                        ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <!--Admin Footer-->
    <?php include_once "includes/adminFooter.php";?>

    </div>
   
    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php"; ?>

     <?php
    // closing Database Connnection
     $conn = null; 
     ?>

</body>

</html>