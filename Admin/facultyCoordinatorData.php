<?php

//--------------------------------->> DB CONFIG
require_once '../config/configPDO.php';

//--------------------------------->> SESSION START
session_start();

//--------------------------------->> CHECKING ADMIN
if (!isset($_SESSION['adminEmail']) || ($_SESSION['adminType'])) {

    if ($_SESSION['adminType'] !== "Faculty Coordinator") {
        header("location:adminLogin.php");
    }

}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Include Admin Header Scripts -->
  <?php include_once "includes/adminHeaderScripts.php";?>

  <title>GIT SHODH 2K20 | SHODH ADMINISTRATOR EVENT PARTICIPANT DETAILS</title>
</head>

<body class="sb-nav-fixed">

  <!-- Include Admin Navbar -->
  <?php
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>


  <div id="layoutSidenav_content">
    <main class="container-fluid">
      <div class="row">

        <section class="col-12">

          <div class="text-center my-3">
            <a href="../Paytm/PaytmKit/TxnStatus.php" class="btn btn-primary rounded-pill">Click Here for More Banking
              Details</a>
          </div>


          <div class="card mb-4">

            <div class="card-header text-center">
              <h5><i class="fas fa-table mr-1"></i>
                Event Participant Details (Department Level)</h5>
            </div>

            <div class="card-body">
              <div class="table-responsive">

                <?php

$department = $_SESSION['adminDepartment'];

// Sql Query

$sql = "SELECT * FROM user_information INNER JOIN event_information
        ON user_information.email= event_information.email
        WHERE event_information.event IN (SELECT events_details_information.eventName
        FROM events_details_information WHERE eventDepartment = :department)";

//Preparing Query
$result = $conn->prepare($sql);

//Binding Value
$result->bindValue(":department", $department);

//Executing Query
$result->execute();

?>

                <table class='table table-bordered table-striped' id='dataTableParticipants' width='100%' cellspacing='0'>
                  <thead>
                  <tr class='text-success text-center'>
                    <th >Certificate ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>College Name</th>
                    <th>Department Name</th>
                    <th>Academic Year</th>
                    <th>Event</th>
                    <th>Prize</th>
                    <th>TXN Amount</th>
                    <th>Order Id</th>
                    <th>TXN ID</th>
                    <th> Bank TXN Id</th>
                    <th>TXN Date</th>
                    <th>TXN Status</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php

// Checking Records Count
if ($result->rowCount() > 0) {

    // Fetching Data value
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>

                    <tr class='text-center'>
                      <td > <?php echo $row['certificateId'] ?></td>
                      <td> <?php echo $row['firstName'] ?></td>
                      <td> <?php echo $row['lastName'] ?></td>
                      <td> <?php echo $row['collegeName'] ?></td>
                      <td> <?php echo $row['departmentName'] ?></td>
                      <td> <?php echo $row['academicYear'] ?> </td>
                      <td> <?php echo $row['event'] ?></td>
                      <td> <?php echo $row['prize'] ?></td>
                      <td> <?php echo $row['txnAmount'] ?> </td>
                      <td> <?php echo $row['orderId'] ?> </td>
                      <td> <?php echo $row['txnId'] ?> </td>
                      <td> <?php echo $row['bankTxnId'] ?> </td>
                      <td> <?php echo $row['txnDate'] ?> </td>
                      <td> <?php echo $row['status'] ?> </td>
                    </tr>

                    <?php

    }

} else {
    echo "<tr>
  <td colspan='14' class='font-weight-bold text-center'> No Records Found </td>
  <tr>";
}

?>

                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </section>

      </div>
    </main>

    <!--Include Admin Footer-->
    <?php include_once "includes/adminFooter.php";?>

  </div>

  <!-- Include Admin Footer Scripts -->
  <?php include_once "includes/adminFooterScripts.php";?>

  <!-- Closing Database Connnection -->
   <?php $conn = null;?>

</body>

</html>