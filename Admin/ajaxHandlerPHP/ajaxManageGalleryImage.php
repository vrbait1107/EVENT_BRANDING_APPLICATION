 <?php

require_once "../../configPDO.php";

extract($_POST);

if (isset($_FILES['galleryImages'])) {

    if (is_array($_FILES)) {

        foreach ($_FILES['galleryImages']["name"] as $name => $value) {

            $sql = "INSERT INTO gallery_information (galleryImage) VALUES (:galleryImages)";
            $result = $conn->prepare($sql);
            $result->bindValue(":galleryImages", $value);
            $result->execute();

            $source = $_FILES['galleryImages']["tmp_name"][$name];

            move_uploaded_file($source, "C:/xampp/htdocs/EBA/gallery/" . $value);

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

// ########################## Reading Record

if (isset($_POST['readRecord'])) {

//Query
    $sql = "SELECT * FROM gallery_information";

//Preparing Query
    $result = $conn->prepare($sql);

//Executing Query
    $result->execute();

    if ($result->rowCount() > 0) {

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

        $count = 1;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $data .= '<tr>
                            <td>' . $count . '</td>
                            <td>' . $row['galleryImage'] . '</td>
<td><img src= "../gallery/' . $row['galleryImage'] . '" class="img-fluid" style= "height:120px" > </td>
                            <td><button class="btn btn-danger" onclick="deleteGalleryDetails(' . $row['id'] . ')">Delete</buttton></td>
                        </tr>';
            $count++;

        }

        $data .= '</tbody>
                </table>';

        echo $data;

    } else {
        echo "No Data avialable in database";
    }

}

// ##################### DELETING GALLERY IMAGES

if (isset($_POST['deleteId'])) {

    $sql = "DELETE FROM gallery_information WHERE id = :deleteId";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":deleteId", $deleteId);

    //Executing Query
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
