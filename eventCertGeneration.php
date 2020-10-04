<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//------------------------------>> START SESSION
session_start();

//---------------------------------->> CHECKING USER
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $techfestName ?> | EVENT CERTIFICATES</title>

    <!-- Include Header Scripts-->
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>


    <!--Include User Navbar-->
    <?php include_once 'includes/navbar.php';?>

    <main class="container">
        <div class="row">

            <!-- Shodh Certificate Generate -->
            <section class="col-md-6">
                <div class="card shadow p-5 my-5" data-aos="zoom-in" data-aos-duration="1500">

                    <h2 class="text-center font-time font-weight-bold mb-4"><span
                            class="text-danger font-weight-bold">
                            SHODH </span>CERTIFICATES</h2>

                    <?php

try {

    $email = $_SESSION['user'];

    # Sql Query
    $sql = "SELECT * FROM user_information INNER JOIN event_information ON
user_information.email= event_information.email
WHERE user_information.email = :email AND attendStatus = :present";

    # Preapring Query
    $result = $conn->prepare($sql);

    # Binding Values
    $result->bindValue(":email", $email);
    $result->bindValue(":present", "present");

    # Executing Query
    $result->execute();

    if ($result->rowCount() > 0) {

        echo "<table class='table'>
    <thead>
    <th class='text-center'>Event</th>
    <th class='text-center'>Action</th>
    </thead>
    <tbody>";

        # Fetching Values From Database
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

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

?>

                </div>
            </section>

            <!-- Synergy Certificate Generate -->
            <section class="col-md-6">
                <div class="card shadow p-5 my-5" data-aos="zoom-in" data-aos-duration="1500">

                    <h2 class="text-center font-time font-weight-bold mb-4"><span
                            class="text-danger font-weight-bold">
                            SYNERGY </span>CERTIFICATES</h2>

                    <?php

try {

    $email = $_SESSION['user'];

    # Sql Query
    $sql1 = "SELECT * FROM user_information INNER JOIN synergy_event_registrations ON
user_information.email= synergy_event_registrations.email
WHERE user_information.email = :email AND attendStatus = :present";

    # Preapring Query
    $result1 = $conn->prepare($sql1);

    # Binding Values
    $result1->bindValue(":email", $email);
    $result1->bindValue(":present", "present");

    # Executing Query
    $result1->execute();

    if ($result1->rowCount() > 0) {

        echo "<table class='table'>
    <thead>
    <th class='text-center'>Event</th>
    <th class='text-center'>Action</th>
    </thead>
    <tbody>";

        # Fetching Values From Database
        while ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
        <td class='text-center'>" . $row1['eventName'] . "</td>";
            $event = $row1['eventName'];
            echo "<td class='text-center'>
    <form action ='Admin/synergyCertificate.php' method ='post'>
    <input type='hidden' name='event1' value= '$event' />
    <input type='submit' class='btn btn btn-primary rounded-pill' name='submit' value='Generate Your Certificate'>
    </form>
    </td>
    </tr>";
        }

        echo "</tbody>
    </table>";

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
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


    <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>