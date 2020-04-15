<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Verification</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- SweetAlert.js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- Font-Awesome css   -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .col-md-8 {
            font-family: 'Times New Roman', Times, serif;
            color: blue;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        span {
            color: orange;
        }
    </style>

</head>

<body>

    <!--Navbar.php-->
    <?php include_once "navbar.php" ?>


    <main class="container">
        <div class="row">

            <section class="col-md-8 offset-md-2 text-center">

                <?php
require_once "config.php";
session_start();


  // GIT SHODH Certificate SYSTEM

if(isset($_POST["submit"])) {

$validate =   trim($_POST["validateData"]);

// Avoid SQL Injection
$validate = mysqli_real_escape_string($conn, $validate);
// Avoid Cross Site Scripting
$validate = htmlentities($validate);


$sql ="select * FROM user_information INNER JOIN event_information ON 
user_information.email= event_information.email 
WHERE event_information.certificateId = '$validate'";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $validateCertificate = $row['certificateId'];


    if($validateCertificate===$validate) {

        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $department= $row['departmentName'];
        $collegeName = $row['collegeName'];
        $academicYear =$row['academicYear'];
        $event=$row['event'];
        $prize = $row['prize'];

        echo "<div class= 'card shadow p-5'>";
        echo "<h2 class='mb-5 card-header'>This Certificate Belongs To </h2>";

        echo "<table class='table table-bordered'>";
        echo "<tr>";
        echo "<td><h3><span>First Name</span></h3></td>";
        echo "<td><h3>$firstName</h3></td>";
        echo "</tr>";

        
        echo "<tr>";
        echo "<td><h3><span>Last Name</span></h3></td>";
        echo "<td><h3>$lastName</h3></td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td><h3><span>Department Name</span></h3></td>";
        echo "<td><h3>$department</h3></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><h3><span>Academic Year</span></h3></td>";
        echo "<td><h3>$academicYear</h3></td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td><h3><span>College Name</span></h3></td>";
        echo "<td><h3>$collegeName</h3></td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td><h3><span>Event Name</span></h3></td>";
        echo "<td><h3>$event</h3></td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td><h3><span>Prize</span></h3></td>";
        echo "<td><h3>$prize</h3></td>";
        echo "</tr>";

        echo "</table>";
        echo "</div>";

    }
    
    else {
        echo "<script>Swal.fire({
                icon: 'error',
                title: 'Not Valid',
                text: 'This Certificate is not generated by GIT SHODH/SYNERGY System'
            })</script>";

    }
    

}



// Synergy Verification System Start 



if(isset($_POST["synergySubmit"])) {


    $validate =   trim($_POST["synergyValidateData"]);

    // Avoid SQL Injection
    $validate = mysqli_real_escape_string($conn, $validate);
    // Avoid Cross Site Scripting
    $validate = htmlentities($validate);

    $sql ="select * FROM synergy_user_information 
    WHERE certificateId = '$validate'";
    
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $validateCertificate = $row['certificateId'];

       
        if($validateCertificate===$validate) {
    
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $department= $row['departmentName'];
            $event=$row['eventName'];
            $prize = $row['prize'];
    
    
            echo "<div class='card shadow p-5'>";
            echo "<h2 class='mb-5 card-header'>This Certificate Belongs To </h2>";

    
            echo "<table class='table table-bordered'>";
            echo "<tr>";
            echo "<td><h3><span>First Name</span></h3></td>";
            echo "<td><h3>$firstName</h3></td>";
            echo "</tr>";
    
            
    
            echo "<tr>";
            echo "<td><h3><span>Last Name</span></h3></td>";
            echo "<td><h3>$lastName</h3></td>";
            echo "</tr>";
    
    
            echo "<tr>";
            echo "<td><h3><span>Department Name</span></h3></td>";
            echo "<td><h3>$department</h3></td>";
            echo "</tr>";
    
    
            echo "<tr>";
            echo "<td><h3><span>Event Name</span></h3></td>";
            echo "<td><h3>$event</h3></td>";
            echo "</tr>";
    
    
            echo "<tr>";
            echo "<td><h3><span>Prize</span></h3></td>";
            echo "<td><h3>$prize</h3></td>";
            echo "</tr>";
    
            echo "</table>";
            echo "</div>";
    
        }
        
        else {
            echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Not Valid',
                    text: 'This Certificate is not generated by GIT SHODH/SYNERGY System'
                })</script>"; 
                   }
        
    }
    
?>



            </section>
        </div>
    </main>


    <!--Footer.PHP-->
    <?php include_once 'footer.php'; ?>

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

</body>

</html>