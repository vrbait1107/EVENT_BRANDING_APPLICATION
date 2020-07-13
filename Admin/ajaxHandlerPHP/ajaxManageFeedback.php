<?php
// Creating Database Connection
require_once "../../configPDO.php";

// Starting Session
session_start();

extract($_POST);

if (isset($_POST["readRecord"])) {
    $sql = "SELECT * FROM user_information INNER JOIN feedback_information
    ON user_information.email = feedback_information.email";

    $result = $conn->prepare($sql);
    $result->execute();

    $data = '<table class= "table table-striped table-bordered" class="display" id= "dataTable" width= "100%" cellspacing="0">
                        <thead class="text-center">
                            <th>Sr.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Department Name</th>
                            <th>Acadmic Year</th>
                            <th>College Name</th>
                            <th>View</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>';

    if ($result->rowCount() > 0) {

        $number = 1;

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $mail = $row['email'];

            $data .= '<tr class="text-center">
                                <td>' . $number . '</td>
                                <td>' . $row['firstName'] . '</td>
                                <td>' . $row['lastName'] . '</td>
                                <td>' . $row['departmentName'] . '</td>
                                <td>' . $row['academicYear'] . '</td>
                                <td>' . $row['collegeName'] . '</td>
                                <td><button class="btn btn-primary" onclick = ' . "viewFeedbackInformation('$mail')" . '><i class="fas fa-eye"></i></button></td>
                                <td><button class="btn btn-danger" onclick = ' . "deleteFeedbackInformation('$mail')" . '><i class="fa fa-trash-alt"></i></button></td>
                                </tr>';

            $number++;

        }

    } else {
        $data .= '<tr class="text-center">
    <td colspan="8">No Records Found</td>
    </tr>';

    }

    $data .= '</tbody>
                  </table>';

    echo $data;

}

//---------------------------------------->> DELETE FEEDBACK INFORMATION

if (isset($_POST['deleteEmail'])) {

    $sql = "DELETE FROM feedback_information WHERE email = :deleteEmail";
    $result = $conn->prepare($sql);
    $result->bindValue(":deleteEmail", $deleteEmail);
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Feedback data deleted successfully'
        })</script>";
    } else {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'We are failed to delete Feedback data'
        })</script>";
    }

}

//---------------------------------------->> VIEW FEEDBACK INFORMATION

if (isset($_POST['viewEmail'])) {

    $sql = "SELECT * FROM feedback_information WHERE email = :viewEmail";
    $result = $conn->prepare($sql);
    $result->bindValue(":viewEmail", $viewEmail);
    $result->execute();

    $row = $result->fetch(PDO::FETCH_ASSOC);

    $data = json_encode($row);

    echo $data;

}
