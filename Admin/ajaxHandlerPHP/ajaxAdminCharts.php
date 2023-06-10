<?php
require_once "../../config/configPDO.php";

extract($_POST);
session_start();

if ($_SESSION['adminType'] !== "Administrator") {
    header("location:../adminLogin.php");
}

try {

    function countRevenue(PDO $conn, string $department): int
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

    function countParticipants(PDO $conn, string $department): int
    {

        $sql = "SELECT COUNT(*) AS count FROM event_information WHERE event IN
        (SELECT eventName FROM events_details_information WHERE eventDepartment = :department)";

        $result = $conn->prepare($sql);

        $result->bindValue(":department", $department);

        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        return $row['count'];
    }

    if (isset($_POST["chart"])) {

        $revenueChartDetails = [];

        array_push($revenueChartDetails, ["Department", "Revenue"]);
        array_push($revenueChartDetails, ["EXTC", countRevenue($conn, "Electronics and Telecommunication")]);
        array_push($revenueChartDetails, ["Chemical", countRevenue($conn, "Chemical")]);
        array_push($revenueChartDetails, ["Civil", countRevenue($conn, "Civil")]);
        array_push($revenueChartDetails, ["Computer", countRevenue($conn, "Computer")]);
        array_push($revenueChartDetails, ["Mechanical", countRevenue($conn, "Mechanical")]);

        echo json_encode($revenueChartDetails);

    }

    if (isset($_POST["chart1"])) {

        $participantChartDetails = [];
        array_push($participantChartDetails, ["Department", "Participant Count"]);
        array_push($participantChartDetails, ["EXTC", countParticipants($conn, "Electronics and Telecommunication")]);
        array_push($participantChartDetails, ["Chemical", countParticipants($conn, "Chemical")]);
        array_push($participantChartDetails, ["Civil", countParticipants($conn, "Civil")]);
        array_push($participantChartDetails, ["Computer", countParticipants($conn, "Computer")]);
        array_push($participantChartDetails, ["Mechanical", countParticipants($conn, "Mechanical")]);

        echo json_encode($participantChartDetails);
    }
    
} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}
