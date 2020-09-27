<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

//----------------------->> STARTING SESSION

session_start();

extract($_POST);

try {

//-------------------------------------->>  DELETE OPERATION

    if (isset($_POST["hiddenCertificateId"])) {

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

            $sql = "UPDATE user_information INNER JOIN event_information
            ON user_information.email = event_information.email
            SET user_information.firstName = :updateFirstName,
            user_information.lastName = :updateLastName,
            event_information.prize = :updatePrize,
            attendStatus = :updateAttendStatus
            WHERE event_information.certificateId= :hiddenCertificateId";

            # Preparing Query
            $result = $conn->prepare($sql);

            # Binding Values
            $result->bindValue(":updateFirstName", $updateFirstName);
            $result->bindValue(":updateLastName", $updateLastName);
            $result->bindValue(":updatePrize", $updatePrize);
            $result->bindValue(":updateAttendStatus", $updateAttendStatus);
            $result->bindValue(":hiddenCertificateId", $hiddenCertificateId);

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

//-------------------------------------->>  EDIT OPERATION

    if (isset($_POST["getCertificateId"])) {

        $sql = "SELECT * FROM user_information INNER JOIN event_information ON
    user_information.email= event_information.email
    where certificateId = :getCertificateId";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Values
        $result->bindValue(":getCertificateId", $getCertificateId);

        # Executing Query
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $response = json_encode($row);

        echo $response;

    }

//-------------------------------------->>  DELETE OPERATION

    if (isset($_POST["deleteCertificateId"])) {

        $sql = "DELETE  FROM event_information WHERE certificateId = :deleteCertificateId";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Values
        $result->bindValue(":deleteCertificateId", $deleteCertificateId);

        # Executing Query
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

// -------------------------------------->>  READ OPERATION

    if (isset($_POST["readRecord"])) {

        $event = $_SESSION['adminEvent'];

        $sql = "SELECT * FROM user_information INNER JOIN event_information ON
                user_information.email= event_information.email
                WHERE event_information.event = :event ORDER BY firstName ASC";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Value
        $result->bindValue(":event", $event);

        # Executing Value
        $result->execute();

        $data = '<table class= "table table-bordered" id= "dataTableParticipants" width= "100%" cellspacing="0">
                    <thead>
                    <tr class="text-success text-center">
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
                      <th>TXN Amount</th>
                      <th>Order Id</th>
                      <th>TXN ID</th>
                      <th> Bank TXN Id</th>
                      <th>TXN Date</th>
                      <th>TXN Status</th>
                    </tr>
                    </thead>

                    <tbody>';

        if ($result->rowCount() > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $data .= '<tr class= "text-center">
                        <td>' . $row['certificateId'] . '</td>
                        <td>' . $row['firstName'] . '</td>
                        <td>' . $row['lastName'] . '</td>
                        <td>' . $row['collegeName'] . '</td>
                        <td>' . $row['departmentName'] . '</td>
                        <td>' . $row['academicYear'] . '</td>
                        <td>' . $row['event'] . '</td>
                        <td>' . $row['prize'] . '</td>
                        <td>' . $row['attendStatus'] . '</td>
                        <td><button class="btn btn-primary" onclick= "getParticipantDetails(' . $row['certificateId'] . ')"><i class="fas fa-edit"></i></button></td>
                        <td><button class="btn btn-danger" onclick=  "deleteParticipantDetails(' . $row['certificateId'] . ')"><i class="fa fa-trash-alt"></i></button></td>
                        <td>' . $row['txnAmount'] . '</td>
                        <td>' . $row['orderId'] . '</td>
                        <td>' . $row['txnId'] . '</td>
                        <td>' . $row['bankTxnId'] . '</td>
                        <td>' . $row['txnDate'] . '</td>
                        <td>' . $row['status'] . '</td>
                      </tr>';

            }

        } else {
            $data .= '<tr class="text-center">
    <td colspan="17">No Records Found</td>
    </tr>';
        }

        $data .= '</tbody>
                            </table>';

        echo $data;

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}
