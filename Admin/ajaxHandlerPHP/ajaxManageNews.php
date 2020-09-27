<?php
//--------------------------------->> DB CONFIG
require_once "../../config/configPDO.php";

// -------------------------------->> START SESSION
session_start();

extract($_POST);

try {

// --------------------------------->> CREATE OPERATION

    if (isset($_POST["addNews"])) {

        $newsTitle = htmlspecialchars($_POST["newsTitle"]);
        $newsDescription = htmlspecialchars($_POST["newsDescription"]);

        # Query
        $sql = "INSERT INTO news_information (newsTitle, newsDescription, postedDate) VALUES (:newsTitle, :newsDescription, :now1)";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Values
        $result->bindValue(":newsTitle", $newsTitle);
        $result->bindValue(":newsDescription", $newsDescription);
        $result->bindValue(":now1", "now()");

        # Executing Query
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

//---------------------------->>  READ OPERATION

    if (isset($_POST["readRecord"])) {

        # Query
        $sql = "SELECT * FROM news_information";

        #  Preparing Query
        $result = $conn->prepare($sql);

        # Executing Value
        $result->execute();

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

        if ($result->rowCount() > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $data .= '<tr>
            <td>' . $number . '</td>
            <td>' . $row['newsTitle'] . '</td>
            <td>' . $row['newsDescription'] . '</td>
            <td>' . $row["postedDate"] . '</td>
            <td><button class="btn btn-primary" onclick= "getNewsInformation(' . $row['id'] . ')"><i class="fas fa-edit"></i></button></td>
            <td><button class="btn btn-danger" onclick= "deleteNewsInformation(' . $row['id'] . ')"><i class="fa fa-trash-alt"></i></button></td>
             </tr>';
                $number++;
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

// --------------------------------->> DELETE OPERATION

    if (isset($_POST['deleteId'])) {

        $sql = "DELETE FROM news_information WHERE id = :deleteId";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Values
        $result->bindValue(":deleteId", $deleteId);

        # Execute Query
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

// --------------------------------->> EDIT OPERATION

    if (isset($_POST["editId"])) {

        $sql = "SELECT * FROM news_information WHERE id = :editId";

        # Prepare Query
        $result = $conn->prepare($sql);

        # Binding Value
        $result->bindValue(":editId", $editId);

        # Executing Query
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $response = json_encode($row);

        echo $response;
    }

// --------------------------------->> UPDATE OPERATION

    if (isset($_POST["hiddenId"])) {

        $updateNewsTitle = htmlspecialchars($_POST["updateNewsTitle"]);
        $updateNewsDescription = htmlspecialchars($_POST["updateNewsDescription"]);
        $hiddenId = htmlspecialchars($_POST["hiddenId"]);

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

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
# Development Purpose Error Only
    echo "Error " . $e->getMessage();

}
