<?php
// Creating Database Connection
require_once "../../configPDO.php";

extract($_POST);

// ############ Reading Record od Sponsor Information

if (isset($_POST["readRecord"])) {

    $sql = "SELECT * FROM sponsor_information";

    $result = $conn->prepare($sql);
    $result->execute();

    $data = '<table class= "table table-striped table-bordered" class="display" id= "dataTable" width= "100%" cellspacing="0">
                        <thead class="text-center">
                            <th >id</th>
                            <th >Sponsor Name</th>
                            <th >Sponsored Event</th>
                            <th >Sponsored Department</th>
                             <th >Sponsored Logo</th>
                            <th >Edit</th>
                            <th >Delete</th>
                        </thead>
                        <tbody>';

    if ($result->rowCount() > 0) {

        $number = 1;

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $data .= '<tr class="text-center">
                                <td>' . $number . '</td>
                                <td>' . $row['sponsorName'] . '</td>
                                <td>' . $row['sponsoredEvent'] . '</td>
                                <td>' . $row['sponsoredDepartment'] . '</td>
                                <td> <img src= "../sponsorLogo/' . $row['sponsorLogo'] . '" class="img-fluid" style = "height:60px"> </td>
                                <td><button class="btn btn-primary" onclick = "getSponsorInformation(' . $row['id'] . ')"><i class="fas fa-edit"></i></button></td>
                                <td><button class="btn btn-danger" onclick = "deleteSponsorInformation(' . $row['id'] . ')"><i class="fa fa-trash-alt"></i></button></td>
                                </tr>';

            $number++;

        }

    } else {
        $data .= '<tr class="text-center">
    <td colspan="7">No Records Found</td>
    </tr>';

    }

    $data .= '</tbody>
                  </table>';

    echo $data;

}

// ##################### DELETE SPONSOR DATA
if (isset($_POST['deleteId'])) {

    $sql = "DELETE FROM sponsor_information WHERE id = :deleteId";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":deleteId", $deleteId);

    //Executing Query
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Sponsor data deleted successfully'
        })</script>";
    } else {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'We are failed to delete sponsor data'
        })</script>";
    }
}

// ########## ADD SPONSOR

extract($_FILES);

if (isset($_FILES['sponsorLogo'])) {

    $sponsorLogoName = $_FILES['sponsorLogo']['name'];
    $sponsorLogoSize = $_FILES['sponsorLogo']['size'];
    $sponsorLogoTmpDir = $_FILES['sponsorLogo']['tmp_name'];

    if ($sponsorLogoName == " ") {
        echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: 'Please Select Proper Image'
            })</script>";
    } else {

        if ($sponsorLogoSize <= 2097152) {

            move_uploaded_file($sponsorLogoTmpDir, "C:/xampp/htdocs/EBA/sponsorLogo/" . $sponsorLogoName);

            //Query
            $sql = "INSERT INTO sponsor_information (sponsorName, sponsorLogo, sponsoredEvent,
       sponsoredDepartment) VALUES(:sponsorName, :sponsorLogoName, :sponsoredEvent, :sponsoredDepartment)";

            //Preparing Query
            $result = $conn->prepare($sql);

            //Binding Value
            $result->bindValue(":sponsorName", $sponsorName);
            $result->bindValue(":sponsorLogoName", $sponsorLogoName);
            $result->bindValue(":sponsoredEvent", $sponsoredEvent);
            $result->bindValue(":sponsoredDepartment", $sponsoredDepartment);

            //Executing Query
            $result->execute();

            if ($result) {
                echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Added Sponsor Successfully'
                    })</script>";
            } else {
                echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to Add Sponsor'
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

// ######### EDIT & RETRIVE DATA IN TABLES

if (isset($_POST['editId'])) {

    $sql = "SELECT * FROM sponsor_information WHERE id = :editId";

//Preparing Query
    $result = $conn->prepare($sql);

//Binding Value
    $result->bindvalue(":editId", $editId);

//Executing Query
    $result->execute();

    $row = $result->fetch(PDO::FETCH_ASSOC);

    $response = json_encode($row);

    echo $response;

}

// ######### UPDATE SPONSOR INFORMATION

if (isset($_POST['hiddenId'])) {

    $sql = "UPDATE sponsor_information SET sponsorName = :updateSponsorName, sponsoredEvent = :updateSponsoredEvent,
       sponsoredDepartment = :updateSponsoredDepartment WHERE id = :hiddenId";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":updateSponsorName", $updateSponsorName);
    $result->bindValue(":updateSponsoredEvent", $updateSponsoredEvent);
    $result->bindValue(":updateSponsoredDepartment", $updateSponsoredDepartment);
    $result->bindValue(":hiddenId", $hiddenId);

    //Executing Query
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Sponsor Data Updated Successfully'
                    })</script>";
    } else {
        echo "<script>Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed Update Sponsor Data'
                        })</script>";
    }

}
