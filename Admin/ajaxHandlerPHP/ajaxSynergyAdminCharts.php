<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

extract($_POST);

# CHECKING ADMIN

if ($_SESSION['adminType'] !== "Synergy Administrator") {
    header("location:../adminLogin.php");
}

try {

    if (isset($_POST["chart1"])) {

//------------------------->>  EXTRACT EVENT NAME IN ARRAY

        $sql1 = "SELECT * FROM synergy_events_details";
        $result1 = $conn->prepare($sql1);
        $result1->execute();

        $eventArray = array();

        while ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
            array_push($eventArray, $row1['eventName']);
        }

//------------------------->>  DISPLAY PARTICIPATION COUNT EVENT WISE

        function participantCount(PDO $conn, string $event): int
        {
            $sql = "SELECT * FROM synergy_event_registrations WHERE eventName = :event";
            $result = $conn->prepare($sql);
            $result->bindValue(":event", $event);
            $result->execute();
            $count = $result->rowCount();
            return $count;
        }

        $participantChartDetails = [];

        array_push($participantChartDetails, ["Event Name", "Participant Count"]);

        foreach ($eventArray as $eventName):

            array_push($participantChartDetails, [$eventName, participantCount($conn, $eventName)]);

        endforeach;

       echo json_encode($participantChartDetails);

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}
