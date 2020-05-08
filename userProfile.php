<?php 

// Creating Connection to Database
    require_once "configNew.php";

// Staring Session
    session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
}

$email = $_SESSION['user'];

$sql = "select * from user_information where email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


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

     <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>
    
</head>

<body>


    <!-- Update the Profile Data -->
    <?php 

if(isset($_POST['update'])) {

    // To avoid sql injection and cross site scripting also remove white spaces
    function security($data){
    global $conn;
    $data = trim($data);
    $data = $conn->real_escape_string($data);
    $data = htmlentities($data);
    return $data;
    }

    // calling function to perform security task
    $firstName = security($_POST['firstName']);
    $lastName = security($_POST['lastName']);
    $mobileNumber = security($_POST['mobileNumber']);
    $collegeName = security($_POST['collegeName']);
    $departmentName = security($_POST['departmentName']);
    $academicYear = security($_POST['academicYear']);

    
    $sql = "update user_information set firstName ='$firstName', lastName = '$lastName', 
    mobileNumber = '$mobileNumber', collegeName = '$collegeName', departmentName = '$departmentName',
    academicYear = '$academicYear' where email = '$email'";

    $result = $conn->query($sql);

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
    <?php include_once "includes/navbar.php"; ?>


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
    <?php include_once "includes/footer.php" ?>
    <!-- Footer Script -->
     <?php include_once "includes/footerScripts.php"; ?>
    <!-- Form Validation -->
    <script src="js/form-validation.js"></script>

     <?php
    // closing Database Connnection
     $conn->close(); 
     ?>
     
</body>

</html>