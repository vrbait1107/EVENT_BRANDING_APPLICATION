 <?php

//----------------------->> DB CONFIG
require_once "../../config/configPDO.php";

extract($_POST);

# CHECKING ADMIN

if (!isset($_SESSION['adminType'])) {
    header("location:../adminLogin.php");
}


try {

// --------------------------------->> CREATE OPERATION

    if (isset($_FILES['galleryImages'])) {

        if (is_array($_FILES)) {

            foreach ($_FILES['galleryImages']["name"] as $name => $value) {

                $sql = "INSERT INTO gallery_information (galleryImage) VALUES (:galleryImages)";
                $result = $conn->prepare($sql);
                $result->bindValue(":galleryImages", $value);
                $result->execute();

                $source = $_FILES['galleryImages']["tmp_name"][$name];

                move_uploaded_file($source, "C:/xampp/htdocs/EBA/images/gallery/" . $value);

            }
            if ($result) {
                echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Images is Successfully Uploaded'
            })</script>";

            }
        }

    }

// --------------------------------->> READ OPERATION

    if (isset($_POST['readRecord'])) {

        # Query
        $sql = "SELECT * FROM gallery_information";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Executing Query
        $result->execute();

        $data = '<table class="table table-bordered text-center" id="dataTable" class="display" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Image Name</th>
                            <th>Image</th>
                            <th>Delete Action</th>
                        </tr>
                    </thead>
                    <tbody>';

        if ($result->rowCount() > 0) {

            $count = 1;
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $data .= '<tr>
                            <td>' . $count . '</td>
                            <td>' . $row['galleryImage'] . '</td>
<td><img src= "../images/gallery/' . $row['galleryImage'] . '" class="img-fluid" style= "height:120px" > </td>
                            <td><button class="btn btn-danger" onclick="deleteGalleryDetails(' . $row['id'] . ')"><i class="fa fa-trash-alt"></i></button></td>
                        </tr>';
                $count++;

            }

        } else {
            $data .= '<tr class="text-center">
    <td colspan="4">No Records Found</td>
    </tr>';

        }

        $data .= '</tbody>
                </table>';

        echo $data;

    }

// // --------------------------------->> DELETE OPERATION

    if (isset($_POST['deleteId'])) {

        $sql = "DELETE FROM gallery_information WHERE id = :deleteId";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Value
        $result->bindValue(":deleteId", $deleteId);

        # Executing Query
        $result->execute();

        if ($result) {
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Image is Successfully Deleted'
            })</script>";

        } else {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'We are failed to delete image'
            })</script>";
        }

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();

}