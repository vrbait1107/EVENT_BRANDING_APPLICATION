<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

extract($_POST);

# CHECKING ADMIN 

 if ($_SESSION['adminType'] !== "Synergy Administrator") {
        header("location:../adminLogin.php");
    }

try {

// ---------------------------->> READ OPERATION

    if (isset($_POST['readRecordData'])) {

        $sql = 'SELECT * FROM user_information INNER JOIN synergy_event_registrations ON
        user_information.email = synergy_event_registrations.email';

        # Preparing Query
        $result = $conn->prepare($sql);

        # Executing Value
        $result->execute();

        $data = '<table class= "table table-bordered" id= "dataTable" width="100%" cellspacing="0">
            <thead clas="text-center">
               <th>Certificate ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>College Name</th>
                      <th>Department Name</th>
                      <th>Academic Year</th>
                      <th>Event</th>
                      <th>Prize</th>
                      <th>Attend Status</th>
                      <th>Edit Action</th>
                      <th>Delete Action</th>
            </thead>

             <tbody>';

        if ($result->rowCount() > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $data .= '<tr class="text-center">
                <td>' . $row['certificateId'] . '</td>
                <td>' . $row['firstName'] . '</td>
                <td>' . $row['lastName'] . '</td>
                <td>' . $row['collegeName'] . '</td>
                <td>' . $row['departmentName'] . '</td>
                <td>' . $row['academicYear'] . '</td>
                <td>' . $row['eventName'] . '</td>
                <td>' . $row['prize'] . '</td>
                <td>' . $row['attendStatus'] . '</td>
                <td><button class="btn btn-primary" onclick= "getParticipantDetails(' . $row['certificateId'] . ')"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger" onclick=  "deleteParticipantDetails(' . $row['certificateId'] . ')"><i class="fa fa-trash-alt"></i></button></td>
                </tr>';

            }

        } else {
            $data .= '<tr class="text-center">
        <td colspan="11" class="font-weight-bold">No Records Found</td>
        </tr>';
        }

        $data .= '</tbody>
          </table>';

        echo $data;

    }

    //-------------------------------------->>  EDIT OPERATION

    if (isset($_POST["editId"])) {

        $sql = "SELECT * FROM user_information INNER JOIN synergy_event_registrations ON
    user_information.email= synergy_event_registrations.email
    where certificateId = :editId";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Values
        $result->bindValue(":editId", $editId);

        # Executing Query
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $response = json_encode($row);

        echo $response;

    }

    //-------------------------------------->>  UPDATE OPERATION

    if (isset($_POST["updateId"])) {

        $updateFirstName = htmlspecialchars($_POST["updateFirstName"]);
        $updateLastName = htmlspecialchars($_POST["updateLastName"]);
        $updatePrize = htmlspecialchars($_POST["updatePrize"]);
        $updateAttendStatus = htmlspecialchars($_POST["updateAttendStatus"]);

        if ($updateFirstName == "" || $updateLastName == "" ||
            $updatePrize == "" || $updateAttendStatus == "") {
            echo "<script>Swal.fire({
          icon: 'error',
          title: 'ERROR',
          text: 'Please fill all the field or select proper Data '
        })</script>";
        } else {

            # Query

            $sql = "UPDATE user_information INNER JOIN synergy_event_registrations
            ON user_information.email = synergy_event_registrations.email
            SET user_information.firstName = :updateFirstName,
            user_information.lastName = :updateLastName,
            synergy_event_registrations.prize = :updatePrize,
            attendStatus = :updateAttendStatus
            WHERE synergy_event_registrations.certificateId= :updateId";

            # Preparing Query
            $result = $conn->prepare($sql);

            # Binding Values
            $result->bindValue(":updateFirstName", $updateFirstName);
            $result->bindValue(":updateLastName", $updateLastName);
            $result->bindValue(":updatePrize", $updatePrize);
            $result->bindValue(":updateAttendStatus", $updateAttendStatus);
            $result->bindValue(":updateId", $updateId);

            # Executing Query
            $result->execute();

            if ($result) {
                echo "<script>Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data Successfully Updated'
                })</script>";

            } else {
                echo "<script>Swal.fire({
                icon: 'error',
                title: 'ERROR',
                text: 'Unable to Update Data'
              })</script>";

            }

        }

    }

// ---------------------------->> DELETE OPERATION

    if (isset($_POST['deleteId'])) {

        $sql = "DELETE  FROM synergy_event_registrations WHERE certificateId = :deleteId";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Value
        $result->bindValue(":deleteId", $deleteId);

        # Executing Value
        $result->execute();

        if ($result) {
            echo "<script>Swal.fire({
            icon: 'success',
            title: 'Deleted',
            text: 'Your Data has been Deleted'
          })</script>";

        } else {
            echo "<script>Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'Unable to Delete Data'
          })</script>";

        }

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}
