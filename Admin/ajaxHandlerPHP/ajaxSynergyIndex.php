<?php
// Creating Database Connection
require_once "../../configPDO.php";

// Starting Session
session_start();

extract($_POST);

if (isset($_POST['submit'])) {

    $certificateId = htmlspecialchars($_POST["certificateId"]);
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $departmentName = htmlspecialchars($_POST["departmentName"]);
    $eventName = htmlspecialchars($_POST["eventName"]);
    $prize = htmlspecialchars($_POST["prize"]);

    $sql = "INSERT INTO synergy_user_information (certificateId, firstName, lastName, departmentName,
        eventName, prize) VALUES ( :certificateId, :firstName, :lastName, :department, :event, :prize)";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":certificateId", $certificateId);
    $result->bindValue(":firstName", $firstName);
    $result->bindValue(":lastName", $lastName);
    $result->bindValue(":department", $department);
    $result->bindValue(":event", $event);
    $result->bindValue(":prize", $prize);

    //Executing Query
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Inserted Successfully!'
                })</script>";
    } else {
        echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something Went Wrong!'
                    })</script>";
    }

}
