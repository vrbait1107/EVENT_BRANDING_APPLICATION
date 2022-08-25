<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//------------------------------>> START SESSION
session_start();

try {

    if (isset($_POST["eventDepartmentName"])) {

        $eventDepartmentName = htmlspecialchars($_POST["eventDepartmentName"]);

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
    <title><?php echo $techfestName ?> | EVENT REGISTRATION & INFORMATION</title>

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

  <!-- Promocode Response -->
        <div id="responsePromocode"></div>

    <div class="container mt-5">
        <h1 class="text-info text-center text-uppercase mb-5 font-Staatliches-heading">

            <?php echo $_SESSION["eventDepartmentName"]; ?> Events</h1>

            <div class="text-center mb-5">
                <h6 class="alert text-uppercase font-weight-bold alert-danger"><i class="fa fa-exclamation-triangle"></i> You are not logged in, Please Log in for event registration</h6>
            </div>
            

        <div class="row">

            <?php
# Fetching Database Values
    $i = 0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $i++;

        ?>

            <div class="col-md-4 mb-5">
                <div class="card shadow text-center">
                    <img title="<?php echo $row["eventName"]; ?>" src="images/eventImage/<?php echo $row["eventImage"]; ?>" class="img-fluid">
                    <h5 class="text-danger my-3" id = "entryFee2<?php echo $row['id']; ?>">Entry Fee &#x20b9;<?php echo $row["eventPrice"]; ?></h5>


                    <?php if(!empty($_SESSION['user'])){ ?>

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

                    <?php } ?>

                    <button type='button' title='View Event Information' data-toggle="modal" data-target='#modal<?php echo $i; ?>' class='btn btn-secondary mb-3 rounded-pill
                    text-uppercase'>View Event Information</button>

                </div>
            </div>

            <!--Modal Events -->
            <div class="modal fade" id="modal<?php echo $i; ?>" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
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
    if (window . history . replaceState) {
    window . history . replaceState(null, null, window . location . href);
    }
    </script>

    <!-- Close Database Connection -->
    <?php $conn = null;?>

</body>

</html>