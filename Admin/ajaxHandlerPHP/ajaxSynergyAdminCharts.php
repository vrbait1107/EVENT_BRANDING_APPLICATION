<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

extract($_POST);

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

        function participantCount($conn, $event)
        {
            $sql = "SELECT * FROM synergy_event_registrations WHERE eventName = :event";
            $result = $conn->prepare($sql);
            $result->bindValue(":event", $event);
            $result->execute();
            $count = $result->rowCount();
            return $count;
        }

        $chartArray2 = [];

        array_push($chartArray2, ["Event Name", "Participant Count"]);

        foreach ($eventArray as $eventName):

            array_push($chartArray2, [$eventName, participantCount($conn, $eventName)]);

        endforeach;

        $newArray = json_encode($chartArray2);

        echo $newArray;

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}
