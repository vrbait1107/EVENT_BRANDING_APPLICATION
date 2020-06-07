<?php
// Creating Database Connection
require_once '../configPDO.php';
// Starting Session
session_start();

$admin = $_SESSION['adminEmail'];

if (!isset($_SESSION['adminEmail'])) {
    header('location:adminLogin.php');
}

// Include Common Anchor
include_once "includes/commonAnchor.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Vishal Bait" />

    <title>Manage News</title>

    <!-- Admin Header Scripts -->
    <?php include_once "includes/adminHeaderScripts.php";?>

</head>

<body class="sb-nav-fixed">


    <!-- Admin Navbar -->
    <?php include_once "includes/adminNavbar.php";?>


    <div id="layoutSidenav_content">
        <main class="container-fluid">

            <h1 class="font-time mt-3 mb-1">Add/Manage News/Notification</h1> <br />

            <div class="row">


                <!-- Button trigger modal -->
                <button type="button" class="btn justify-content-end btn-primary my-1" data-toggle="modal"
                    data-target="#addModal">
                    Click Here to Add News/Notification
                </button>


                <!--Response Message -->
                <div id="addResponse"></div>

                <!-- Delete Response Message -->
                <div id="deleteResponse"></div>

                <!-- Delete Response Message -->
                <div id="updateResponse"></div>


                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">ADD NEWS/NOTIFICATION PROFILE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <form>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="newsTitle" id="newsTitle" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="newsDescription" id="newsDescription" class="form-control"
                                            cols="30" rows="10"></textarea>
                                    </div>
                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" name="addNews" id="addNews" data-dismiss="modal"
                                    class="btn btn-primary">Add</button>
                            </div>

                        </div>
                    </div>
                </div>



                   <!-- Update Modal -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">UPDATE NEWS/NOTIFICATION PROFILE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <form>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="updateNewsTitle" id="updateNewsTitle" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="updateNewsDescription" id="updateNewsDescription" class="form-control"
                                            cols="30" rows="10"></textarea>
                                    </div>

                                    <div id="hiddenId"></div>
                                </form>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" name="updateNews" id="updateNews" onclick= "updateNews()" data-dismiss="modal"
                                    class="btn btn-primary">Add</button>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <!-- Reading Record -->
                    <div id="recordResponse" class="mt-5"></div>
                </div>

            </div>
        </main>

        <!--Admin Footer-->
        <?php include_once "includes/adminFooter.php";?>
    </div>

    <!-- Admin Footer Scripts -->
    <?php include_once "includes/adminFooterScripts.php";?>

    <!-- Custom Js Script -->
    <script src="js/manageNews.js"></script>

    <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>