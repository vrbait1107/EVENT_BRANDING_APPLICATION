<?php
// Creating Database Connection
require_once "../../configPDO.php";

// Starting Session
session_start();

extract($_POST);

//############# READING RECORD OF EVENT INFORMATION
if (isset($_POST["readRecord"])) {

//Query
    $sql = "SELECT * FROM events_details_information";

// Preparing Query
    $result = $conn->prepare($sql);

//Executing Value
    $result->execute();

    if ($result->rowCount() > 0) {

        $data = '<table class= "table table-striped table-bordered" id= "dataTable" width= "100%" cellspacing="0">
                        <thead class="text-center">
                            <th>Sr.No.</th>
                            <th>Event Name</th>
                            <th>Event Fee</th>
                            <th>Event Prize</th>
                            <th>Event Sponsor</th>
                            <th>Event Department</th>
                            <th>Event Description</th>
                            <th>Event Rules</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th >Edit</th>
                            <th >Delete</th>
                        </thead>
                        <tbody>';
        $number = 1;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $data .= '<tr>
            <td>' . $number . '</td>
            <td>' . $row['eventName'] . '</td>
            <td>' . $row['eventPrice'] . '</td>
            <td>' . $row["eventPrize"] . '</td>
             <td>' . $row['eventSponsor'] . '</td>
            <td>' . $row['eventDepartment'] . '</td>
            <td>' . $row["eventDescription"] . '</td>
             <td>' . $row['eventRules'] . '</td>
            <td>' . $row['eventStartDate'] . '</td>
            <td>' . $row["eventEndDate"] . '</td>
            <td><button class="btn btn-primary" onclick= "getEventInformation(' . $row['id'] . ')"> Edit </button></td>
            <td><button class="btn btn-danger" onclick= "deleteEventInformation(' . $row['id'] . ')"> Delete </button></td>
             </tr>';
            $number++;
        }

        $data .= '</tbody>
        </table>';

        echo $data;

    } else {
        echo "<script>Swal.fire({
          icon: 'warning',
          title: 'Warning',
          text: 'No data available in database'
          })</script>";

    }
}

extract($_FILES);

//############## ADD EVENT

if (isset($_POST['eventName'])) {

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

            move_uploaded_file($eventImageTmpDir, "C:/xampp2/htdocs/EBA/eventImage/" . $eventImageName);

            // Query
            $sql = "INSERT INTO events_details_information( eventImage, eventName, eventPrice, eventPrize, eventSponsor,
         eventDepartment, eventDescription, eventRules, eventCoordinator, eventStartDate, eventEndDate)
          VALUES (:eventImageName, :eventName, :eventPrice, :eventPrize, :eventSponsor, :eventDepartment,
          :eventDescription, :eventRules, :eventCoordinator, :eventStartDate, :eventEndDate)";

            // Preparing Query
            $result = $conn->prepare($sql);

            //Binding Values
            $result->bindValue(":eventImageName", $eventImageName);
            $result->bindValue(":eventName", $eventName);
            $result->bindValue(":eventPrice", $eventPrice);
            $result->bindValue(":eventPrize", $eventPrize);
            $result->bindValue(":eventSponsor", $eventSponsor);
            $result->bindValue(":eventDepartment", $eventDepartment);
            $result->bindValue(":eventDescription", $eventDescription);
            $result->bindValue(":eventRules", $eventRules);
            $result->bindValue(":eventCoordinator", $eventCoordinator);
            $result->bindValue(":eventStartDate", $eventStartDate);
            $result->bindValue(":eventEndDate", $eventEndDate);

            //Executing Query
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

//######### DELETING EVENT INFORMATION

if (isset($_POST['deleteId'])) {
    // Query
    $sql = "DELETE FROM events_details_information WHERE id = :deleteId";

    // Preapring query
    $result = $conn->prepare($sql);

    // Binding Values
    $result->bindValue(":deleteId", $deleteId);

    //Executing Query
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

//######## GET EVENT INFORMATION

if (isset($_POST['editId'])) {
    // Query
    $sql = "SELECT * FROM events_details_information WHERE id= :editId";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":editId", $editId);

    //Executing Query
    $result->execute();

    $row = $result->fetch(PDO::FETCH_ASSOC);

    $response = json_encode($row);

    echo $response;

}

// ####################### UPDATE EVENT INFORMATION

if (isset($_POST['hiddenId'])) {

// Query
    $sql = "UPDATE events_details_information SET eventName = :updateEventName, eventPrice = :updateEventPrice,
    eventPrize = :updateEventPrize, eventSponsor = updateEventSponsor, eventDepartment = :updateEventDepartment,
    eventDescription = :updateEventDescription, eventRules = :updateEventRules, eventCoordinator = :updateEventCoordinator,
    eventStartDate = :updateEventStartDate, updateEventEndDate = :updateEventEndDate WHERE id = :hiddenId";

    //Preparing Query
    $result = $conn->prepare($sql);

    // Binding Value
    $result->bindValue(":updateEventName", $updateEventName);
    $result->bindValue(":updateEventPrice", $updateEventPrice);
    $result->bindValue(":updateEventPrize", $updateEventPrize);
    $result->bindValue("updateEventSponsor", $updateEventSponsor);
    $result->bindValue(":updateEventDepartment", $updateEventDepartment);
    $result->bindValue(":updateEventDescription", $updateEventDescription);
    $result->bindValue(":updateEventRules", $updateEventRules);
    $result->bindValue(":updateEventCoordinator", $updateEventCoordinator);
    $result->bindValue(":updateEventStartDate", $updateEventStartDate);
    $result->bindValue(":updateEventEndDate", $updateEventEndDate);
    $result->bindValue(":hiddenId", $hiddenId);

    //Executing Query
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
