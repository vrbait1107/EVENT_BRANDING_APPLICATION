<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

extract($_POST);

try {

// ---------------------------->> READ OPERATION

    if (isset($_POST['readRecordData'])) {

        $sql = 'SELECT * FROM synergy_user_information';

        # Preparing Query
        $result = $conn->prepare($sql);

        # Executing Value
        $result->execute();

        $data = '<table class= "table table-bordered" id= "dataTable" width="100%" cellspacing="0">
            <thead clas="text-center">
              <th>Certificate ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Department Name</th>
              <th>Event</th>
              <th>Prize</th>
              <th>View</th>
             <th>Delete</th>
            </thead>

             <tbody>';

        if ($result->rowCount() > 0) {

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

                <td> <button class="btn btn-danger" onclick = deleteSynergyData(' . $row["certificateId"] . ')><i class="fa fa-trash"></i></button></td>
              </tr>';

            }

        } else {
            $data .= '<tr class="text-center">
        <td colspan="6" class="font-weight-bold">No Records Found</td>
        </tr>';
        }

        $data .= '</tbody>
          </table>';

        echo $data;

    }

// ---------------------------->> DELETE OPERATION

    if (isset($_POST['deleteId'])) {

        $sql = "DELETE  FROM synergy_user_information WHERE certificateId = :deleteId";

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
