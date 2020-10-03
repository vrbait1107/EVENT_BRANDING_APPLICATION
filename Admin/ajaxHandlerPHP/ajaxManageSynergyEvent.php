<?php
//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

// ---------------------->> STARTING SESSION
session_start();

extract($_POST);

try {

//-------------------------------->> READING OPERATION
    if (isset($_POST["readRecord"])) {

        # Query
        $sql = "SELECT * FROM synergy_events_details";

        #  Preparing Query
        $result = $conn->prepare($sql);

        # Executing Value
        $result->execute();

        $data = '<table class= "table table-striped table-bordered" id= "dataTable" width= "100%" cellspacing="0">
                        <thead class="text-center">
                            <th>Sr.No.</th>
                            <th>Event Name</th>
                            <th>Event Prize</th>
                            <th>Event Description</th>
                            <th>Event Rules</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th >Edit</th>
                            <th >Delete</th>
                        </thead>
                        <tbody>';

        if ($result->rowCount() > 0) {

            $number = 1;
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $data .= '<tr>
            <td>' . $number . '</td>
            <td>' . $row['eventName'] . '</td>
            <td>' . $row["eventPrize"] . '</td>
            <td>' . substr($row["eventDescription"], 0, 100) . ' .....</td>
            <td>' . substr($row['eventRules'], 0, 100) . ' .....</td>
            <td>' . $row['eventStartDate'] . '</td>
            <td>' . $row["eventEndDate"] . '</td>
            <td><button class="btn btn-primary" onclick= "getEventInformation(' . $row['id'] . ')"><i class="fas fa-edit"></i></button></td>
            <td><button class="btn btn-danger" onclick= "deleteEventInformation(' . $row['id'] . ')"><i class="fa fa-trash-alt"></i></button></td>
             </tr>';
                $number++;
            }

        } else {
            $data .= '<tr class="text-center">
    <td colspan="12">No Records Found</td>
    </tr>';
        }

        $data .= '</tbody>
        </table>';

        echo $data;

    }

    extract($_FILES);

//---------------------------------------->> CREATE OPERATION

    if (isset($_POST['eventName'])) {

        #  Avoid XSS Attack
        $eventName = htmlspecialchars($_POST['eventName']);
        $eventPrize = htmlspecialchars($_POST['eventPrize']);
        $eventDescription = $_POST['eventDescription'];
        $eventRules = $_POST['eventRules'];
        $eventCoordinator = $_POST['eventCoordinator'];
        $eventStartDate = htmlspecialchars($_POST['eventStartDate']);
        $eventEndDate = htmlspecialchars($_POST['eventEndDate']);

        $eventImage = $_FILES['eventImage'];
        $eventImageName = $_FILES['eventImage']['name'];
        $eventImageSize = $_FILES['eventImage']['size'];
        $eventImageTmpDir = $_FILES['eventImage']['tmp_name'];

        if ($eventImageName == "") {
            echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: 'Please Select Proper Image'
                    })</script>";

        } else {

            if ($eventImageSize <= 2097152) {

                move_uploaded_file($eventImageTmpDir, "C:/xampp/htdocs/EBA/images/eventImage/synergy/" . $eventImageName);

                #  Query
                $sql = "INSERT INTO synergy_events_details( eventImage, eventName, eventPrize,
         eventDescription, eventRules, eventCoordinator, eventStartDate, eventEndDate)
          VALUES (:eventImageName, :eventName, :eventPrize, :eventDescription, :eventRules,
          :eventCoordinator, :eventStartDate, :eventEndDate)";

                #  Preparing Query
                $result = $conn->prepare($sql);

                # Binding Values
                $result->bindValue(":eventImageName", $eventImageName);
                $result->bindValue(":eventName", $eventName);
                $result->bindValue(":eventPrize", $eventPrize);
                $result->bindValue(":eventDescription", $eventDescription);
                $result->bindValue(":eventRules", $eventRules);
                $result->bindValue(":eventCoordinator", $eventCoordinator);
                $result->bindValue(":eventStartDate", $eventStartDate);
                $result->bindValue(":eventEndDate", $eventEndDate);

                # Executing Query
                $result->execute();

                if ($result) {
                    echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Added Event Successfully'
                    })</script>";

                } else {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to Add Event'
                    })</script>";
                }

            } else {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Image size exeeded',
                    text: 'Please Upload File less than 2MB'
                })</script>";
            }
        }

    }

//---------------------------------------->>  DELETING OPERATION

    if (isset($_POST['deleteId'])) {

        # Query
        $sql = "DELETE FROM synergy_events_details WHERE id = :deleteId";

        # Preapring query
        $result = $conn->prepare($sql);

        # Binding Values
        $result->bindValue(":deleteId", $deleteId);

        # Executing Query
        $result->execute();

        if ($result) {
            echo "<script>Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Event Data successfully deleted'
          })</script>";

        } else {
            echo "<script>Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'We failed to delete data'
          })</script>";

        }
    }

//---------------------------------------------->> EDIT OPERATION

    if (isset($_POST['editId'])) {

        # Query
        $sql = "SELECT * FROM synergy_events_details WHERE id= :editId";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Value
        $result->bindValue(":editId", $editId);

        # Executing Query
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $response = json_encode($row);

        echo $response;

    }

// ------------------------------------->> UPDATE OPERATION

    if (isset($_POST['hiddenId'])) {

        $updateEventName = htmlspecialchars($_POST["updateEventName"]);
        $updateEventPrize = htmlspecialchars($_POST["updateEventPrize"]);
        $updateEventDescription = $_POST["updateEventDescription"];
        $updateEventRules = $_POST["updateEventRules"];
        $updateEventCoordinator = $_POST["updateEventCoordinator"];
        $updateEventStartDate = htmlspecialchars($_POST["updateEventStartDate"]);
        $updateEventEndDate = htmlspecialchars($_POST["updateEventEndDate"]);

        # Query
        $sql = "UPDATE synergy_events_details SET eventName = :updateEventName,
    eventPrize = :updateEventPrize, eventDescription = :updateEventDescription,
    eventRules = :updateEventRules, eventCoordinator = :updateEventCoordinator,
    eventStartDate = :updateEventStartDate, eventEndDate = :updateEventEndDate
    WHERE id = :hiddenId";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Value
        $result->bindValue(":updateEventName", $updateEventName);
        $result->bindValue(":updateEventPrize", $updateEventPrize);
        $result->bindValue(":updateEventDescription", $updateEventDescription);
        $result->bindValue(":updateEventRules", $updateEventRules);
        $result->bindValue(":updateEventCoordinator", $updateEventCoordinator);
        $result->bindValue(":updateEventStartDate", $updateEventStartDate);
        $result->bindValue(":updateEventEndDate", $updateEventEndDate);
        $result->bindValue(":hiddenId", $hiddenId);

        # Executing Query
        $result->execute();

        if ($result) {
            echo "<script>Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Event Details successfully updated'
          })</script>";

        } else {
            echo "<script>Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'We failed to update event details'
          })</script>";

        }

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
# Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

// Close Database Connection
$conn = null;
