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

try {
    $sql = "SELECT * FROM synergy_events_details";
    $result = $conn->prepare($sql);
    $result->execute();

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $culturalFestName ?> | EVENT REGISTRATION & INFORMATION</title>

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>

    <!--Include Navbar-->
    <?php include_once "includes/navbar.php";?>

    <?php

# Checking Record Counts
if ($result->rowCount() > 0) {
    ?>


    <div class="container mt-5">
        <h2 class="text-danger text-center text-uppercase mb-5 font-Staatliches-heading">Synergy Events</h2>

        <div class="row">

            <?php
# Fetching Database Values
    $i = 0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $i++;

        ?>

            <div class="col-md-4 mb-5">
                <div class="card shadow text-center">

                    <!-- Event Image -->
                    <img src="images/eventImage/synergy/<?php echo $row['eventImage']; ?>" class="img-fluid">

                    <!-- Event Prize -->
                    <h5 class="text-danger my-2">Event Prize &#x20b9;<?php echo $row["eventPrize"]; ?></h5>

                    <!-- Synergy Event Register -->
                    <form action="synergyEventRegister.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="hiddenEventName" value='<?php echo $row["eventName"]; ?>'>
                            <input class='btn btn-primary btn-block mb-2 rounded-pill text-uppercase' type="submit"
                                name="registerEvent" value="Register Here">
                        </div>
                    </form>

                    <!-- Open Modal -->
                    <button type='button' data-toggle="modal" data-target='#modal<?php echo $i; ?>' class='btn btn-secondary mb-3 rounded-pill
                    text-uppercase'>View Event Information</button>


                </div>
            </div>

            <!--Modal Events -->
            <div class="modal fade" id="modal<?php echo $i; ?>" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                <?php echo $row['eventName']; ?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 modal1">

                                        <!-- Event Prize -->
                                        <h4
                                            class="font-weight-bold text-center text-uppercase text-danger mb-5 animated heartBeat slow">
                                            Prize: <?php echo $row['eventPrize']; ?></h4>

                                        <!-- Event Description -->
                                        <h4 class="font-weight-bold font-time text-info">Event Description</h4>
                                        <p class="text-justify"><?php echo $row['eventDescription']; ?></p>

                                        <!-- Event Rules -->
                                        <h4 class="font-weight-bold  font-time text-info">Event Rules</h4>
                                        <p class="text-justify"><?php echo $row['eventRules']; ?></p>

                                        <!-- Event Coordinators -->
                                        <h4 class="font-weight-bold font-time text-info">Co-ordinators:-</h4>
                                        <p><?php echo $row['eventCoordinator']; ?></p>

                                        <!-- Event Start Date -->
                                        <h4 class="font-weight-bold font-time text-info">Event Start Date</h4>
                                        <p><?php echo $row['eventStartDate']; ?></p>

                                        <!-- Event End Date -->
                                        <h4 class="font-weight-bold font-time text-info">Event Date Date</h4>
                                        <p><?php echo $row['eventEndDate']; ?></p>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal End -->

            <?php
}
} else {
    echo "No Records Available in Database";
}

?>

        </div>
    </div>


    <!-- Include Footer & Footer Scripts -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

    <!-- Javascript -->
    <script src="js/departmentEvent.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>