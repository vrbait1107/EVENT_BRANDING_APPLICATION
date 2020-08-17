<?php
// Creating Database Connection
require_once "../../configPDO.php";

extract($_POST);

function countRevenue($conn, $department)
{
    $sql = "SELECT SUM(txnAmount) AS totalAmount FROM event_information WHERE event IN
        (SELECT eventName FROM events_details_information WHERE eventDepartment = :department)";

    $result = $conn->prepare($sql);
    $result->bindValue(":department", $department);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $totalAmount = $row['totalAmount'];
    return $totalAmount + 0;
}

function count1($conn, $department)
{

    $sql = "SELECT * FROM event_information WHERE event IN
        (SELECT eventName FROM events_details_information WHERE eventDepartment = :department)";

    $result = $conn->prepare($sql);

    $result->bindValue(":department", $department);

    $result->execute();

    $row = $result->rowCount();

    return $row;
}

if (isset($_POST["chart"])) {

    $chartArray = [];
    array_push($chartArray, ["Department", "Revenue"]);
    array_push($chartArray, ["EXTC", countRevenue($conn, "Electronics and Telecommunication")]);
    array_push($chartArray, ["Chemical", countRevenue($conn, "Chemical")]);
    array_push($chartArray, ["Civil", countRevenue($conn, "Civil")]);
    array_push($chartArray, ["Computer", countRevenue($conn, "Computer")]);
    array_push($chartArray, ["Mechanical", countRevenue($conn, "Mechanical")]);

    $chartArray2 = [];
    array_push($chartArray2, ["Department", "Participant Count"]);
    array_push($chartArray2, ["EXTC", count1($conn, "Electronics and Telecommunication")]);
    array_push($chartArray2, ["Chemical", count1($conn, "Chemical")]);
    array_push($chartArray2, ["Civil", count1($conn, "Civil")]);
    array_push($chartArray2, ["Computer", count1($conn, "Computer")]);
    array_push($chartArray2, ["Mechanical", count1($conn, "Mechanical")]);

    $newArray = json_encode($chartArray);

    echo $newArray;

}

if (isset($_POST["chart1"])) {

    $chartArray2 = [];
    array_push($chartArray2, ["Department", "Participant Count"]);
    array_push($chartArray2, ["EXTC", count1($conn, "Electronics and Telecommunication")]);
    array_push($chartArray2, ["Chemical", count1($conn, "Chemical")]);
    array_push($chartArray2, ["Civil", count1($conn, "Civil")]);
    array_push($chartArray2, ["Computer", count1($conn, "Computer")]);
    array_push($chartArray2, ["Mechanical", count1($conn, "Mechanical")]);

    $newArray = json_encode($chartArray2);

    echo $newArray;

}
