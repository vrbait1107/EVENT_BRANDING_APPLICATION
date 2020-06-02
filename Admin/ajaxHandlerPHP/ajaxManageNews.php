<?php
// Creating Database Connection
require_once "../../configPDO.php";

// Starting Session
session_start();

extract($_POST);

// ############ ADDING NEWS & NOTIFICATION

if (isset($_POST["addNews"])) {

    // Query
    $sql = "INSERT INTO news_information (newsTitle, newsDescription, postedDate) VALUES (:newsTitle, :newsDescription, :now1)";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":newsTitle", $newsTitle);
    $result->bindValue(":newsDescription", $newsDescription);
    $result->bindValue(":now1", "now()");

    //Executing Query
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
          icon: 'success',
          title: 'Successful',
          text: 'News Added Successfully'
          })</script>";
    } else {
        echo "<script>Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'We are failed to Add News'
          })</script>";
    }

}
//############# Reading Record
if (isset($_POST["readRecord"])) {

//Query
    $sql = "SELECT * FROM news_information";

// Preparing Query
    $result = $conn->prepare($sql);

//Executing Value
    $result->execute();

    if ($result->rowCount() > 0) {

        $data = '<table class= "table table-striped table-bordered" id= "dataTable" width= "100%" cellspacing="0">
                        <thead class="text-center">
                            <th>Sr.No.</th>
                            <th>News Title</th>
                            <th>News Description</th>
                            <th>Posted Date</th>
                            <th >Edit</th>
                            <th >Delete</th>
                        </thead>
                        <tbody>';
        $number = 1;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $data .= '<tr>
            <td>' . $number . '</td>
            <td>' . $row['newsTitle'] . '</td>
            <td>' . $row['newsDescription'] . '</td>
            <td>' . $row["postedDate"] . '</td>
            <td><button class="btn btn-primary" onclick= "getNewsInformation(' . $row['id'] . ')"> Edit </button></td>
            <td><button class="btn btn-danger" onclick= "deleteNewsInformation(' . $row['id'] . ')"> Delete </button></td>
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

//########## DELETE NEWS INFORMATION

if (isset($_POST['deleteId'])) {

    $sql = "DELETE FROM news_information WHERE id = :deleteId";

    // Preparing Query
    $result = $conn->prepare($sql);

    // Binding Values
    $result->bindValue(":deleteId", $deleteId);

    //Execute Query
    $result->execute();

    if ($result) {
        echo "<script>Swal.fire({
          icon: 'success',
          title: 'Deleted',
          text: 'News Data successfully Deleted'
          })</script>";

    } else {
        echo "<script>Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'We are failed to Delete data'
          })</script>";

    }
}

//##############  RETRIVE DATA INTO FORM

if (isset($_POST["editId"])) {

    $sql = "SELECT * FROM news_information WHERE id = :editId";

    // Prepare Query
    $result = $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":editId", $editId);

    //Executing Query
    $result->execute();

    $row = $result->fetch(PDO::FETCH_ASSOC);

    $response = json_encode($row);

    echo $response;
}

//####################### UPDATE NEWS INFORMATION

if (isset($_POST["hiddenId"])) {
    $sql = "UPDATE news_information SET newsTitle= :updateNewsTitle,
    newsDescription = :updateNewsDescription WHERE id = :hiddenId";

    $result = $conn->prepare($sql);

    $result->bindValue(":updateNewsTitle", $updateNewsTitle);
    $result->bindValue(":updateNewsDescription", $updateNewsDescription);
    $result->bindValue(":hiddenId", $hiddenId);

    if ($result) {
        echo "<script>Swal.fire({
          icon: 'success',
          title: 'Updated',
          text: 'News Data successfully Updated'
          })</script>";
    } else {
        echo "<script>Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'We failed to update Data'
          })</script>";

    }
}
