<?php

// Creating Database Connection
require_once "../configPDO.php";
// Starting Session
session_start();
// Extracting Post data
extract($_POST);

//----------------------------------->>APPLY PROMOCODE

if (isset($_POST["apply"])) {

    $sql = "SELECT * FROM events_details_information WHERE id = :eventId";
    $result = $conn->prepare($sql);
    $result->bindValue(":eventId", $eventId);
    $result->execute();

    $row = $result->fetch(PDO::FETCH_ASSOC);
    $dbPromocode = $row["promocode"];
    $dbDiscount = $row["discount"];
    $dbEventPrice = $row['eventPrice'];

    if ($dbPromocode == $promocode && $dbPromocode !== "Not Applicable") {
        if ($dbDiscount !== 0) {
            $discountValue = $dbEventPrice * $dbDiscount * 0.01;
            $newValue = $dbEventPrice - $discountValue;
            echo $newValue;
        }
    }
} else {
    echo "<script>Swal.fire({
                icon: 'error',
                title: 'Invalid Promocode',
                text: 'Check Your Applied Promocode'
            })</script>";

}

// Closing Database Connnection
$conn = null;
