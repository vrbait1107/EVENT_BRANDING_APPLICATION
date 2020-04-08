<?php 
require_once "../config.php";
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--SweetAlert.js-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <title>GIT SHODH 2K20 Administrator Dashboard</title>

  <style>
    .btn {
      margin-bottom: 5px;
      text-align: center;
    }

    body {
      margin-top: 50px;
      margin-bottom: 50px;
    }
  </style>
</head>

<body>

  <main class="container">
    <div class="row">
      <section class="col-12">

        <div class="text-center mb-3">
          <a href="adminIndex.php" class="btn btn-primary rounded-Pill">Go to Dashboard</a>
        </div>

        <?php

//  Retriving all the Information From the Database

$sql ="select * FROM user_information INNER JOIN event_information ON 
user_information.email= event_information.email ORDER By firstName ASC";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0) {

        ?>

        <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>

          <thead>
            <th class='text-success text-center'>Certificate ID</th>
            <th class='text-success text-center'>First Name</th>
            <th class='text-success text-center'>Last Name</th>
            <th class='text-success text-center'>College Name</th>
            <th class='text-success text-center'>Department Name</th>
            <th class='text-success text-center'>Academic Year</th>
            <th class='text-success text-center'>Event</th>
            <th class='text-success text-center'>Prize</th>
          </thead>

          <tbody>

            <?php
          while($row =mysqli_fetch_assoc($result)){ 
          ?>

            <tr>
              <td class='text-center'> <?php echo $row['certificateId']?> </td>
              <td class='text-center'> <?php echo $row['firstName'] ?></td>
              <td class='text-center'> <?php echo $row['lastName'] ?></td>
              <td class='text-center'> <?php echo $row['collegeName'] ?> </td>
              <td class='text-center'> <?php echo $row['departmentName'] ?></td>
              <td class='text-center'> <?php echo $row['academicYear'] ?></td>
              <td class='text-center'> <?php echo $row['event'] ?></td>
              <td class='text-center'> <?php echo $row['prize'] ?> </td>
            </tr>

            <?php 
            }
            ?>

          </tbody>
        </table>

        <?php
        }
        ?>

      </section>
    </div>
  </main>


  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>

</body>

</html>