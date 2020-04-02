<?php 
require_once "config.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Generator</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Animate CSS-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <style>
    h2{
        font-family:sans sarif;
        font-weight:bold;
    }

    
    </style>
    
</head>
<body>

<?php include_once 'navbar.php'; ?>
    
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-md-6">
        <div class="card shadow animated zoomIn slow p-5 my-5">
        <h2 class="text-center mb-4">GIT <span class="text-danger font-weight-bold">SHODH </span>CERTIFICATE</h2>

        <?php




$vrb= $_SESSION['user'];

$sql = "select * FROM user_information INNER JOIN event_information ON 
user_information.email= event_information.email 
WHERE user_information.email = '$vrb'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0) {

echo "<table class='table'>";
echo "<thead>";
echo "<th class='text-center'>Event</th>";
echo "<th class='text-center'>Action</th>";
echo "</thead>";

echo "<tbody>";

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td class='text-center'>". $row['event']. "</td>";
    $eventMain= $row['event'];
    echo "<td><form action ='certGeneration.php' method ='post'><input type='hidden' name='event1' value= '$eventMain' />
    <input type='submit' class='btn btn btn-primary rounded-pill' name='submit' value='Generate Your Certificate'></form></td>";
    echo "</tr>";       
}

echo "</tbody>";
echo "</table>";

}
?>

</div>
        </div>
        <div class="col"></div>
    </div>
</div>


<script src="js/nav.js"></script>
</body>
</html>
