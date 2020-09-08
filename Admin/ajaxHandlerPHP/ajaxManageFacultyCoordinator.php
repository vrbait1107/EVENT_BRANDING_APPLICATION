<?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

//----------------------->> STARTING SESSION

session_start();

$sessinAdminDepartment = $_SESSION["adminDepartment"];

extract($_POST);

// ----------------------->>  UPDATE OPERATION

if (isset($_POST['hiddenEmail'])) {

    $updateEmail = htmlspecialchars($_POST["updateEmail"]);
    $$updateAdminType = htmlspecialchars($_POST["$updateAdminType"]);
    $updateAdminDepartment = htmlspecialchars($_POST["updateAdminDepartment"]);
    $updateAdminEvent = htmlspecialchars($_POST["updateAdminEvent"]);
    $hiddenEmail = htmlspecialchars($_POST["hiddenEmail"]);

    //Query
    $sql = "UPDATE admin_information SET email = :email, adminType = :adminType,
         adminDepartment = :adminDepartment,  adminEvent = :adminEvent WHERE email = :hiddenEmail";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":email", $updateEmail);
    $result->bindValue(":adminType", $updateAdminType);
    $result->bindValue(":adminDepartment", $updateAdminDepartment);
    $result->bindValue(":adminEvent", $updateAdminEvent);
    $result->bindValue(":hiddenEmail", $hiddenEmail);

    // Executing the Query
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Admin Profile Successfully Updated'
                })</script>";
    } else {
        echo "<script>Swal.fire({
                    icon: 'Error',
                    title: 'Error',
                    text: 'We failed to Update Admin Profile'
                })</script>";
    }

}

// -------------------------->>  EDIT OPERATION

if (isset($_POST['editEmail']) && isset($_POST['editEmail']) !== "") {

    //Query
    $sql = "SELECT * FROM admin_information WHERE email = :editEmail";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":editEmail", $editEmail);

    //Executing Query
    $result->execute();

    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
    } else {
        echo "No Data Found";
    }

}

// ------------------------>> DELETE OPERATION

if (isset($_POST['deleteEmail']) && isset($_POST['deleteEmail']) !== "") {

    //Query
    $sql = "DELETE FROM admin_information WHERE email = :deleteEmail";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":deleteEmail", $deleteEmail);

    //Executing Query
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Successfully Deleted'
                })</script>";
    } else {
        echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'ERROR',
                    text: 'We are failed to delete data'
                })</script>";
    }

}

// --------------------------->>  READ OPERATION

if (isset($_POST["readRecord"])) {

    $sql = 'SELECT * FROM admin_information WHERE adminType = :studentCoordinator AND adminDepartment = :sessionAdminDepartment';

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":studentCoordinator", "Student Coordinator");
    $result->bindValue(":sessionAdminDepartment", $sessinAdminDepartment);

    //Executing Query
    $result->execute();

    $data = '<table class="table table-striped table id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Email</th>
                        <th>Admin Type</th>
                        <th>Admin Department</th>
                        <th>Admin Event</th>
                        <th>Edit Action </th>
                        <th>Delete Action</th>
                    </tr>
                </thead>

            <tbody>';

    if ($result->rowCount() > 0) {

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $mail = $row['email'];

            $data .= '<tr class="text-center">
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['adminType'] . '</td>
                            <td>' . $row['adminDepartment'] . '</td>
                            <td>' . $row['adminEvent'] . '</td>
                            <td>
                            <button class="btn btn-primary" onclick= ' . "getAdminDetails('$mail')" . '><i class="fas fa-edit"></i></button>
                             </td>
                            <td>
                            <button class="btn btn-danger" onclick= ' . "deleteFacultyAdmin('$mail')" . ' ><i class="fa fa-trash-alt"></i></button>
                            </td>

                            </tr>';
        }

    } else {
        $data .= '<tr class="text-center">
    <td colspan="6">No Records Found</td>
    </tr>';
    }

    $data .= '</tbody>
                            </table>';

    echo $data;

}

// ---------------------------------->>  CREATE OPERATION

if (isset($_POST['create'])) {

    $email = htmlspecialchars($_POST["email"]);
    $adminType = htmlspecialchars($_POST["adminType"]);
    $adminDepartment = htmlspecialchars($_POST["adminDepartment"]);
    $adminEvent = htmlspecialchars($_POST["adminEvent"]);
    $password = htmlspecialchars($_POST["adminPassword"]);

    $hashPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM admin_information WHERE admin_information.email = :email";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":email", $email);

    //Executing Query
    $result->execute();

    if ($result->rowCount() > 0) {

        echo "<script>Swal.fire({
        icon: 'warning',
        title: 'Unable to Insert Data',
        text: 'Admin Profile Already Exist'
    })</script>";

    } else {

        $sql = "INSERT INTO admin_information (email, adminType, adminDepartment, adminEvent,
adminPassword) VALUES (:email, :adminType, :adminDepartment, :adminEvent, :hashPassword)";

        //Preparing Query
        $result = $conn->prepare($sql);

        //Binding Value
        $result->bindValue(":email", $email);
        $result->bindValue("adminType", $adminType);
        $result->bindValue("adminDepartment", $adminDepartment);
        $result->bindValue("adminEvent", $adminEvent);
        $result->bindValue(":hashPassword", $hashPassword);

        //Executing Query
        $result->execute();

        if ($result) {
            echo "<script>Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Successfully Inserted Admin Profile'
    })</script>";

        } else {
            echo "<script>Swal.fire({
        icon: 'error',
        title: 'ERROR',
        text: 'Something Went Wrong'
    })</script>";

        }

    }
}
