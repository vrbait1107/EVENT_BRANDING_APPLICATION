<?php

// --------------------------->> DB CONFIG
require_once "../config/configPDO.php";

// --------------------------->> SESSION START

session_start();

// --------------------------->> EXTRACT DATA

extract($_POST);

// --------------------------->> APPLY PROMOCODE

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
            $discountValue = $dbEventPrice * 0.01 * $dbDiscount;
            $newValue = $dbEventPrice - $discountValue;
            echo $newValue;
        }
    } else {
        echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Invalid Promocode',
                        text: 'Check Your Promocode Again'
                    })</script>";

    }

}
