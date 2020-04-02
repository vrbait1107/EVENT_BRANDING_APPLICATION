
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Verification</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<style>

    .col-md-8 {
        font-family: 'Times New Roman', Times, serif;
        color: blue;
        margin-top:50px;
        margin-bottom:50px;
    }

    span{
        color:orange;
    }
    
    </style>

</head>
<body>


<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8 text-center">
            


<?php
require_once "config.php";
session_start();


  // GIT SHODH Certificate SYSTEM

if(isset($_POST["submit"])) {


$validate =   $_POST["validateData"];
$sql ="select * FROM user_information INNER JOIN event_information ON 
user_information.email= event_information.email 
WHERE event_information.certificateId = '$validate'";

    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $validateCertificate = $row['certificateId'];


    if($validateCertificate===$validate) {

        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $department= $row['departmentName'];
        $collegeName = $row['collegeName'];
        $academicYear =$row['academicYear'];
        $event=$row['event'];
        $prize = $row['prize'];


        echo "<h2 class='mb-5'>This Certificate Belongs To </h2>";

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


    $validate =   $_POST["synergyValidateData"];
    $sql ="select * FROM synergy_user_information 
    WHERE certificateId = '$validate'";
    
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        $validateCertificate = $row['certificateId'];
    
    
        if($validateCertificate===$validate) {
    
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $department= $row['departmentName'];
            $event=$row['eventName'];
            $prize = $row['prize'];
    
    
            echo "<h2 class='mb-5'>This Certificate Belongs To </h2>";
    
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



        </div>
        <div class="col"></div>
    </div>
</div>




    
    
</body>
</html>