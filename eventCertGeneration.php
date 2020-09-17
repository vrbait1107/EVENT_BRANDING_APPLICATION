<?php

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//------------------------------>> START SESSION
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GIT SHODH 2K20 | EVENT CERTIFICATES</title>

    <!-- First AOS Animation then Include Header Scripts-->
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>


    <!--Include User Navbar-->
    <?php include_once 'includes/navbar.php';?>

    <main class="container">
        <div class="row">

            <section class="col-md-6 offset-md-3">
                <div class="card shadow p-5 my-5" data-aos="zoom-in" data-aos-duration="1500">

                    <h2 class="text-center font-time font-weight-bold mb-4">GIT <span class="text-danger font-weight-bold">
                            SHODH </span>CERTIFICATE</h2>

                    <?php

$email = $_SESSION['user'];

// Sql Query
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

    echo "<table class='table'>
    <thead>
    <th class='text-center'>Event</th>
    <th class='text-center'>Action</th>
    </thead>
    <tbody>";

    // Fetching Values From Database
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
        <td class='text-center'>" . $row['event'] . "</td>";
        $event = $row['event'];
        echo "<td>
    <form action ='certGeneration.php' method ='post'>
    <input type='hidden' name='event1' value= '$event' />
    <input type='submit' class='btn btn btn-primary rounded-pill' name='submit' value='Generate Your Certificate'>
    </form>
    </td>
    </tr>";
    }

    echo "</tbody>
    </table>";

}
?>

                </div>
            </section>
        </div>
    </main>

    <!-- Include Footer & Footer Scripts -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

 <!-- AOS Library -->
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <script>AOS.init();</script>

 <!-- Close Database Connection -->
 <?php $conn = null;?>

</body>

</html>