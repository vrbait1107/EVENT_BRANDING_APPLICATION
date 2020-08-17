<?php
// Creating Database Connection
require_once "../../configPDO.php";

extract($_POST);

// //########## Update Admin Details

if (isset($_POST['hiddenEmail'])) {

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

// ######### Retriving Admin Details into forms

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

// ########### Deleting User

if (isset($_POST['deleteEmail'])) {

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

// ############## Reading Records
if (isset($_POST["readRecord"])) {

    $sql = 'SELECT * FROM admin_information WHERE adminType = :facultyCoordinator';

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":facultyCoordinator", "Faculty Coordinator");

    //Executing Query
    $result->execute();

    $data = '<table class="table table-striped"  id="dataTable" width="100%" cellspacing="0">
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
                            <button class="btn btn-outline-primary" onclick= ' . "getAdminDetails('$mail')" . '><i class="fas fa-edit"></i></button>
                             </td>
                            <td>
                            <button class="btn btn-outline-danger" onclick= ' . "deleteUser('$mail')" . ' ><i class="fa fa-trash-alt"></i></button>
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

// ############# Adding Admin to Database

if (isset($_POST['email'])) {

    $password = password_hash($password, PASSWORD_BCRYPT);

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
adminPassword) VALUES (:email, :adminType, :adminDepartment, :adminEvent, :password)";

//Preparing Query
        $result = $conn->prepare($sql);

//Binding Value
        $result->bindValue(":email", $email);
        $result->bindValue("adminType", $adminType);
        $result->bindValue("adminDepartment", $adminDepartment);
        $result->bindValue("adminEvent", $adminEvent);
        $result->bindValue(":password", $password);

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
