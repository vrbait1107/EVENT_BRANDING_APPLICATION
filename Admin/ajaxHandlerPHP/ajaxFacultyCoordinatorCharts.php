<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

// ---------------------->> SESSION
session_start();

extract($_POST);

$department = $_SESSION["adminDepartment"];

try {

// ------------------------->>  EXTRACTING EVENT NAME FROM DB IN ARRAY.

    $sqlData1 = "SELECT eventName from events_details_information
     WHERE eventDepartment = :department";
    $resultData1 = $conn->prepare($sqlData1);
    $resultData1->bindValue(":department", $department);
    $resultData1->execute();

    $events = array();

    while ($rowData1 = $resultData1->fetch(PDO::FETCH_ASSOC)) {
        array_push($events, $rowData1['eventName']);
    }

// ------------------------->> PARTICIPANTS COUNT EVENT WISE

    function count1($conn, $event)
    {

        $sql = "SELECT * FROM event_information WHERE event = :event";
        $result = $conn->prepare($sql);
        $result->bindValue(":event", $event);
        $result->execute();
        $row = $result->rowCount();
        return $row;
    }

//------------------------->> DISPLAY REVENUE DEVENT WISE

    function countRevenue($conn, $event)
    {
        $sql = "SELECT SUM(txnAmount) AS totalAmount FROM event_information WHERE event = :event";
        $result = $conn->prepare($sql);
        $result->bindValue(":event", $event);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalAmount = $row['totalAmount'];
        return $totalAmount + 0;
    }

    if (isset($_POST["chart"])) {

        $chartArray = [];
        array_push($chartArray, ["Events", "Revenue"]);

        for ($i = 0; $i < sizeof($events); $i++) {
            array_push($chartArray, [$events[$i], countRevenue($conn, $events[$i])]);
        }

        $newArray = json_encode($chartArray);

        echo $newArray;

    }

    if (isset($_POST["chart1"])) {

        $chartArray2 = [];

        array_push($chartArray2, ["Events", "Participant Count"]);

        for ($i = 0; $i < sizeof($events); $i++) {
            array_push($chartArray2, [$events[$i], count1($conn, $events[$i])]);
        }

        $newArray = json_encode($chartArray2);

        echo $newArray;

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
# Development Purpose Error Only
    echo "Error " . $e->getMessage();
}
