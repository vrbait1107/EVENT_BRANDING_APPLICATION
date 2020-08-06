<?php

// Creating Connection to Database
require_once "configPDO.php";

// Staring Session
session_start();

if (isset($_SESSION["eventDepartmentName"])) {

    if (isset($_POST["eventDepartmentName"])) {

        $eventDepartmentName = $_POST["eventDepartmentName"];

        $_SESSION["eventDepartmentName"] = $eventDepartmentName;

        $sql = "SELECT * FROM events_details_information WHERE eventDepartment = :eventDepartment";
        $result = $conn->prepare($sql);
        $result->bindValue(":eventDepartment", $_SESSION["eventDepartmentName"]);
        $result->execute();

    } else {

        $sql = "SELECT * FROM events_details_information WHERE eventDepartment = :eventDepartment";
        $result = $conn->prepare($sql);
        $result->bindValue(":eventDepartment", $_SESSION["eventDepartmentName"]);
        $result->execute();

    }

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>

    <!--Navbar PHP -->
    <?php include_once "includes/navbar.php";?>

    <?php
if ($result->rowCount() > 0) {
        ?>

  <!-- Promocode Response -->
        <div id="responsePromocode"></div>

    <div class="container mt-5">
        <h2 class="text-danger text-center text-uppercase mb-5 font-time">


            <?php echo $_SESSION["eventDepartmentName"]; ?> Events</h2>

        <div class="row">

            <?php

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $i++;

            ?>

            <div class="col-md-4 mb-5">
                <div class="card shadow text-center">
                    <img src="eventImage/<?php echo $row["eventImage"]; ?>" class="img-fluid">
                    <h5 class="text-danger my-3" id = "entryFee2<?php echo $row['id']; ?>">Entry Fee &#x20b9;<?php echo $row["eventPrice"]; ?></h5>


                        <div class="input-group my-3 px-2">
                            <input type="text" class="form-control" id='event<?php echo $row["id"]; ?>' />
                            <span class="input-group-btn">
                                <button class="btn btn-secondary applyPromocode" id ='<?php echo $row["id"]; ?>'
                                 type="button">Apply Promocode</button>
                            </span>
                        </div>


                    <form method="post" action="Paytm/PaytmKit/TxnTest.php">
                        <input type="hidden" name="eventName" value='<?php echo $row["eventName"]; ?>'>
                        <input type="hidden" name="eventPrice" id = "entryFee3<?php echo $row['id']; ?>" value='<?php echo $row["eventPrice"]; ?>'>
                        <input type="submit" class="btn btn-primary text-uppercase btn-block mb-2 rounded-pill"
                            value="Click here to Register">
                    </form>

                    <button type='button' data-toggle="modal" data-target='#modal<?php echo $i; ?>' class='btn btn-secondary mb-3 rounded-pill
                    text-uppercase'>View Event Information<button>

                </div>
            </div>

            <!--modal Events -->
            <div class="modal fade" id="modal<?php echo $i; ?>" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Rules for
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
                                        <h4
                                            class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow"
                                            id= "entryFee<?php echo $row['id']; ?>">
                                            Entry Fees: <?php echo $row['eventPrice']; ?></h4>

                                        <h4
                                            class="font-weight-bold text-center text-uppercase text-danger mb-5 animated heartBeat slow">
                                            First Prize:<?php echo $row['eventPrize']; ?></h4>


                                        <h4 class="font-weight-bold font-time text-info">Event Description</h4>
                                        <p class="text-justify"><?php echo $row['eventDescription']; ?></p>

                                        <h4 class="font-weight-bold  font-time text-info">Event Rules</h4>
                                        <p class="text-justify"><?php echo $row['eventRules']; ?></p>

                                        <h4 class="font-weight-bold  font-time text-info">Event Sponsor</h4>
                                        <p class="text-justify"><?php echo $row['eventSponsor']; ?></p>

                                        <h4 class="font-weight-bold font-time text-info">Co-ordinators:-</h4>
                                        <p><?php echo $row['eventCoordinator']; ?></p>

                                        <h4 class="font-weight-bold font-time text-info">Event Start Date</h4>
                                        <p><?php echo $row['eventEndDate']; ?></p>

                                        <h4 class="font-weight-bold font-time text-info">Event Date Date</h4>
                                        <p><?php echo $row['eventStartDate']; ?></p>

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

            <!--modal End -->

            <?php
}
    }

} else {
    include_once "includes/headerScripts.php";
}
?>

        </div>
    </div>


    <!-- Footer PHP -->
    <?php include_once "includes/footer.php";?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php";?>
    <script src="js/departmentEvent.js"></script>
    <script>
    if (window . history . replaceState) {
    window . history . replaceState(null, null, window . location . href);
    }
    </script>

    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>