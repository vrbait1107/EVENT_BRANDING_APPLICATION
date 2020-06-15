<?php
// Creating Database Connection
require_once "../../configPDO.php";

extract($_POST);

// #################### READING RECORD

if (isset($_POST['readRecordData'])) {

    $sql = 'SELECT * FROM synergy_user_information';

    //Preparing Query
    $result = $conn->prepare($sql);

    //Executing Value
    $result->execute();

    if ($result->rowCount() > 0) {

        $data = '<table class= "table table-bordered" id= "dataTable" width="100%" cellspacing="0">
            <thead clas="text-center">
              <th>Certificate ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Department Name</th>
              <th>Event</th>
              <th>Prize</th>
              <th>View Action</th>
             <th>Delete Action</th>
            </thead>

             <tbody>';

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $data .= '<tr class="text-center">
                <td>' . $row['certificateId'] . '</td>
                <td>' . $row['firstName'] . '</td>
                <td>' . $row['lastName'] . '</td>
                <td>' . $row['departmentName'] . '</td>
                <td>' . $row['eventName'] . '</td>
                <td>' . $row['prize'] . '</td>

                  <td>
                  <form action="synergyCertificate.php" class="text-center" method="post">
                    <input type="hidden" name="certificateId" value= ' . $row["certificateId"] . '>
                     <input type="submit" class="btn btn-sm btn-primary text-white text-center" value="VIEW CERTIFICATE"
                      name="view">
                  </form>
                  </td>

                <td> <button class="btn btn-danger" onclick = deleteSynergyData(' . $row["certificateId"] . ')>Delete</button></td>
              </tr>';

        }

        $data .= '</tbody>
          </table>';

        echo $data;

    } else {
        echo "<h4 class='text-center mt-5 text-danger'>No Data available in Database</h4>";
    }

}

// #################### DELETE DATA

if (isset($_REQUEST['deleteId'])) {

    $sql = "DELETE  FROM synergy_user_information WHERE certificateId = :deleteId";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":deleteId", $deleteId);

    //Executing Value
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
