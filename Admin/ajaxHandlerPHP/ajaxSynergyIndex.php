<?php
//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

//----------------------->> STARTING SESSION
session_start();

extract($_POST);

try {

    if (isset($_POST['submit'])) {

        $certificateId = htmlspecialchars($_POST["certificateId"]);
        $firstName = htmlspecialchars($_POST["firstName"]);
        $lastName = htmlspecialchars($_POST["lastName"]);
        $department = htmlspecialchars($_POST["department"]);
        $event = htmlspecialchars($_POST["event"]);
        $prize = htmlspecialchars($_POST["prize"]);

        #  Sql Query
        $sql = "INSERT INTO synergy_user_information (certificateId, firstName, lastName, departmentName,
        eventName, prize) VALUES ( :certificateId, :firstName, :lastName, :department, :event, :prize)";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Value
        $result->bindValue(":certificateId", $certificateId);
        $result->bindValue(":firstName", $firstName);
        $result->bindValue(":lastName", $lastName);
        $result->bindValue(":department", $department);
        $result->bindValue(":event", $event);
        $result->bindValue(":prize", $prize);

        # Executing Query
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

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}
