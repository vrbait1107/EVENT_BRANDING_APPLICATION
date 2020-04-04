<?php 
require_once "config.php";
session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
}

$email = $_SESSION['user'];

$sql = "select * from user_information where email = '$email'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);


$firstName= $row['firstName'];
$lastName = $row['lastName'];
$collegeName =$row['collegeName'];
$departmentName =$row['departmentName'];
$academicYear =$row['academicYear'];
$mobileNumber =$row['mobileNumber'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>

    <!-- Bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Font-Awesome CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--SweetAlert.js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>


    <!-- Update the Profile Data -->
    <?php 

if(isset($_POST['update'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $mobileNumber = $_POST['mobileNumber'];
    $collegeName = $_POST['collegeName'];
    $departmentName = $_POST['departmentName'];
    $academicYear = $_POST['academicYear'];

    $sql = "update user_information set firstName ='$firstName', lastName = '$lastName', 
    mobileNumber = '$mobileNumber', collegeName = '$collegeName', departmentName = '$departmentName',
    academicYear = '$academicYear'";
    $result = mysqli_query($conn,$sql);

    if($result) {
        echo "<script>Swal.fire({
        icon: 'success',
        title: 'Successful',
        text: 'Your Data is Successfully Updated'
           })</script>";

    }
}
?>

    <!-- Navbar PHP -->
    <?php include_once "navbar.php" ?>


    <main class="container">
        <div class="row">
            <section class="col-md-6  my-5 offset-md-3">


                <div class="card shadow p-5">

                    <div class="card-header">
                        <h3 class="text-center text-uppercase">User Profile</h3>
                        <p class="text-center">Add information about yourself</p>
                    </div>

                    <hr>

                    <form action="" method="post" name="userProfileForm"
                        onsubmit="return formValidationUserProfileForm()">

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstName" value="<?php echo $firstName; ?>">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastName" value=" <?php echo $lastName; ?>">
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobileNumber"
                                value="<?php echo $mobileNumber; ?>">
                        </div>


                        <div class="form-group">
                            <label>Academic Year</label>
                            <input type="text" class="form-control" name="academicYear"
                                value="<?php echo $academicYear; ?>">
                        </div>

                        <div class="form-group">
                            <label>Department Name</label>
                            <input type="text" class="form-control" name="departmentName"
                                value="<?php echo $departmentName; ?>">
                        </div>

                        <div class="form-group">
                            <label>College Name</label>
                            <input type="text" class="form-control" name="collegeName"
                                value="<?php echo $collegeName; ?>">
                        </div>

                        <input type="submit" value="Update" name="update"
                            class="btn btn-primary btn-block rounded-pill">

                    </form>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer PHP -->
    <?php include_once "footer.php" ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- Form Validation -->
    <script src="js/form-validation.js"></script>

</body>

</html>