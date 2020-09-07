<?php
///------------------------------>> DB CONFIG
require_once "config/configPDO.php";


// Staring Session
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Generator</title>

    <!-- Animate css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>


    <!-- Navbar-->
    <?php include_once 'includes/navbar.php';?>

    <main class="container">
        <div class="row">

            <section class="col-md-6 offset-md-3">
                <div class="card shadow animated zoomIn slow p-5 my-5">

                    <h2 class="text-center font-time font-weight-bold mb-4">GIT <span class="text-danger font-weight-bold">
                            SHODH </span>CERTIFICATE</h2>

                    <?php

$email = $_SESSION['user'];

//Query for showing certificate details
$sql = "select * FROM user_information INNER JOIN event_information ON
user_information.email= event_information.email
WHERE user_information.email = :email and attendStatus = :present";

//Preapring Query
$result = $conn->prepare($sql);

//Binding Values
$result->bindValue(":email", $email);
$result->bindValue(":present", "present");

//Executing Query
$result->execute();

if ($result->rowCount() > 0) {

    echo "<table class='table'>";
    echo "<thead>";
    echo "<th class='text-center'>Event</th>";
    echo "<th class='text-center'>Action</th>";
    echo "</thead>";

    echo "<tbody>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td class='text-center'>" . $row['event'] . "</td>";
        $event = $row['event'];
        echo "<td>
    <form action ='certGeneration.php' method ='post'>
    <input type='hidden' name='event1' value= '$event' />
    <input type='submit' class='btn btn btn-primary rounded-pill' name='submit' value='Generate Your Certificate'>
    </form>
    </td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

}
?>

                </div>
            </section>
        </div>
    </main>

    <!-- Footer PHP -->
    <?php include_once "includes/footer.php";?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php";?>

     <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>