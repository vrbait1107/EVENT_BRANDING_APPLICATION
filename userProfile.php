<?php 

// Creating Connection to Database
    require_once "configPDO.php";

// Staring Session
    session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
}

$email = $_SESSION['user'];

$sql = "SELECT * FROM user_information WHERE email = :email";

// Preparing Query
$result= $conn->prepare($sql);

//Binding Value
$result->bindValue(":email", $email);

//Executing Value
$result->execute();

//Fetching Value
$row = $result->fetch(PDO::FETCH_ASSOC);

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

    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $mobileNumber = trim($_POST['mobileNumber']);
    $collegeName = trim($_POST['collegeName']);
    $departmentName = trim($_POST['departmentName']);
    $academicYear = trim($_POST['academicYear']);

    //Query
    $sql = "UPDATE user_information SET firstName = :firstName, lastName = :lastName, 
    mobileNumber = :mobileNumber, collegeName = :collegeName, departmentName = :departmentName,
    academicYear = :academicYear WHERE email = :email";

    // Preparing query
    $result = $conn->prepare($sql);
 
    //Binding Values
    $result->bindValue(":firstName", $firstName);
    $result->bindValue(":lastName",$lastName);
    $result->bindValue(":mobileNumber",  $mobileNumber);
    $result->bindValue(":collegeName", $collegeName);
    $result->bindValue(":departmentName", $departmentName);
    $result->bindValue(":academicYear", $academicYear);
    $result->bindValue(":email", $email);
    
    //Executing query
    $result->execute();

    if($result) {
        echo "<script>Swal.fire({
        icon: 'success',
        title: 'Successful',
        text: 'Your Data is Successfully Updated'
           })</script>";

    }
    else{
         echo "<script>Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'We are failed to update data'
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
     $conn= null; 
     ?>
     
</body>

</html>