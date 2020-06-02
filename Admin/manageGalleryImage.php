<?php
// Craeting Database Connection
require_once '../configPDO.php';
// Starting Session
session_start();

$admin = $_SESSION['adminEmail'];
if (!isset($_SESSION['adminEmail'])) {
    header('location:adminLogin.php');
}

if ($_SESSION['adminType'] === "Administrator") {
    $adminFileName = "adminIndex.php";
    $adminFileData = "adminIndexData.php";
    $adminManage = "adminManage.php";

} elseif ($_SESSION['adminType'] === "Student Coordinator") {
    $adminFileName = "studentCoordinatorIndex.php";
    $adminFileData = "studentCoordinatorData.php";
    $adminManage = "#";

} elseif ($_SESSION['adminType'] === "Faculty Coordinator") {
    $adminFileName = "facultyCoordinatorIndex.php";
    $adminFileData = "facultyCoordinatorData.php";
    $adminManage = "facultyCoordinatorManage.php";

} elseif ($_SESSION['adminType'] === "Synergy Administrator") {
    $adminFileName = "synergyIndex.php";
    $adminFileData = "synergyData.php";
    $adminManage = "#";

} else {
    $adminFileName = "#";
    $adminFileData = "#";
    $adminManage = "#";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Vishal Bait" />

    <title>Manage Gallery Images </title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">

    <?php
// Displaying All Gallery Images into Table
$sql = "SELECT * FROM gallery_information";

//Preparing Query
$result = $conn->prepare($sql);

// Executing Query
$result->execute();

// Deleting Images

if (isset($_REQUEST['delete'])) {
    $hiddenId = $_REQUEST['hiddenId'];
    $hiddenImage = $_REQUEST['hiddenImage'];

    $sqlDelete = "DELETE FROM gallery_information WHERE id = :hiddenId";

    //Preparing Query
    $resultDelete = $conn->prepare($sqlDelete);

    //Binding Value
    $resultDelete->bindValue(":hiddenId", $hiddenId);

    //Executing Query
    $resultDelete->execute();

    if ($resultDelete) {
        echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Image is Successfully Deleted'
            })</script>";

        $file = '../gallery/' . $hiddenImage;
        unlink($file);

    } else {
        echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'We are failed to delete image'
            })</script>";
    }

    unset($_REQUEST['delete']);

}

?>


    <!-- Admin Navbar -->
    <?php include_once "includes/adminNavbar.php";?>


    <div id="layoutSidenav_content">
        <main class="container-fluid">

            <h1 class="font-time mt-3 mb-1">Manage Gallery Images</h1> <br />

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Manage Gallery Images</li>
            </ol>

            <div class="row">

                <?php

if ($result->rowCount() > 0) {

    ?>

                <table class="table table-bordered text-center col-md-8 offset-md-2" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Image Name</th>
                            <th>Image</th>
                            <th>Delete Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>

                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['galleryImage']; ?></td>
                            <td class="text-center"><img src="../gallery/<?php echo $row['galleryImage']; ?>"
                                    alt="galleryImage" class="img-fluid" style="height:200px"></td>
                            <td>
                                <form action="">
                                    <input type="hidden" name="hiddenId" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="hiddenImage" value="<?php echo $row['galleryImage']; ?>" >
                                    <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                            </td>
                            </form>
                        </tr>

                        <?php
}
    ?>

                    </tbody>
                </table>


                <?php
} else {
    echo "No Image in gallery";
}

?>

            </div>
        </main>

        <!--Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>
    </div>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>