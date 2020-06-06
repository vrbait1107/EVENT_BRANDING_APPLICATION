 <?php

require_once "../../configPDO.php";
extract($_POST);

// if (count($_FILES['galleryImages']["name"]) > 0) {

//     for ($count = 0; $count < count($_FILES['galleryImages']["name"]); $count++) {
//         $fileName = $_FILES['galleryImages']['name'][$count];
//         $tmpName = $_FILES['galleryImages']['tmp_name'][$count];
//         if (move_uploaded_file($tmpName, "C:/xampp2/htdocs/EBA/gallery/" . $fileName)) {
//             $sql = "INSERT INTO gallery_information (galleryImage) VALUES (:fileName)";
//             $result = $conn->prepare($sql);
//             $result->bindValue(":fileName", $fileName);
//             $result->execute();
//             if ($result) {
//                 echo '<script>alert("success");<script>';
//             }
//         }
//     }
// }

// ########################## Reading Record

if (isset($_POST['readRecord'])) {

//Query
    $sql = "SELECT * FROM gallery_information";

//Preparing Query
    $result = $conn->prepare($sql);

//Executing Query
    $result->execute();

    if ($result->rowCount() > 0) {

        $data = '<table class="table table-bordered text-center" id="dataTable" width="100%"
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
