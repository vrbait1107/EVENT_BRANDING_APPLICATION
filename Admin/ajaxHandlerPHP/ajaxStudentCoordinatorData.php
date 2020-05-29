<?php 
// Creating Database Connection
require_once "../../configPDO.php";

// Starting Session
session_start();

    
    extract($_POST);


    //############### Update Participant Data
    if(isset($_POST["hiddenCertificateId"])){

      if($updateFirstName == "" || $updateLastName == "" || 
          $updatePrize == "" || $updateAttendStatus == "") {
          echo "<script>Swal.fire({
          icon: 'error',
          title: 'ERROR',
          text: 'Please fill all the field or select proper Data '
        })</script>";
      }

else {

  //Query
  $sql = "UPDATE user_information INNER JOIN event_information 
  ON user_information.email = event_information.email
  SET user_information.firstName = :updateFirstName,
  user_information.lastName = :updateLastName, 
  event_information.prize = :updatePrize,
  attendStatus = :updateAttendStatus
  WHERE event_information.certificateId= :hiddenCertificateId";

  //Preparing Query
  $result = $conn->prepare($sql);

  //Binding Values
  $result->bindValue(":updateFirstName", $updateFirstName);
  $result->bindValue(":updateLastName", $updateLastName);
  $result->bindValue(":updatePrize", $updatePrize);
  $result->bindValue(":updateAttendStatus", $updateAttendStatus);
  $result->bindValue(":hiddenCertificateId", $hiddenCertificateId);

  //Executing Query
  $result->execute();
  
  if($result){

    echo "<script>Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Data Successfully Updated'
      })</script>";
  }
    else {
      echo "<script>Swal.fire({
          icon: 'error',
          title: 'ERROR',
          text: 'Unable to Update Data'
        })</script>";
    
  }

  }

  }


    //############### Retrive Participant Data into Form

    if(isset($_POST["getCertificateId"])){

    $sql ="SELECT * FROM user_information INNER JOIN event_information ON 
    user_information.email= event_information.email 
    where certificateId = :getCertificateId";

    //Preparing Query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":getCertificateId", $getCertificateId);

    //Executing Query
    $result->execute();
  
    $row= $result->fetch(PDO::FETCH_ASSOC);

    $response = json_encode($row);

    echo $response;

    }

    //############### Delete Participant Data

    if(isset($_POST["deleteCertificateId"])){

      $sql ="DELETE  FROM event_information WHERE certificateId = :deleteCertificateId";

  //Preparing Query
  $result= $conn->prepare($sql);

  //Binding Values
  $result->bindValue(":deleteCertificateId", $deleteCertificateId);

  //Executing Query
  $result->execute();
  
  if($result){
    
    echo "<script>Swal.fire({
        icon: 'success',
        title: 'Deleted',
        text: 'Your Data has been Deleted'
      })</script>";
  }
    else {
      echo "<script>Swal.fire({
          icon: 'error',
          title: 'ERROR',
          text: 'Unable to Delete Data'
        })</script>";
    
    }

  }

    // ############## Reading Records
               if(isset($_POST["readRecord"])){

                $event = $_SESSION['adminEvent'];
        
                $sql ="SELECT * FROM user_information INNER JOIN event_information ON 
                user_information.email= event_information.email 
                WHERE event_information.event = :event ORDER BY firstName ASC";

                //Preparing Query
                $result = $conn->prepare($sql);

                //Binding Value
                $result->bindValue(":event", $event);

                //Executing Value 
                $result->execute();
    

            $data =  '<table class= "table table-bordered" id= "dataTable" width= "100%" cellspacing="0">
                    <thead>
                      <th class="text-success text-center">Certificate ID</th>
                      <th class="text-success text-center">First Name</th>
                      <th class="text-success text-center">Last Name</th>
                      <th class="text-success text-center">College Name</th>
                      <th class="text-success text-center">Department Name</th>
                      <th class="text-success text-center">Academic Year</th>
                      <th class="text-success text-center">Event</th>
                      <th class="text-success text-center">Prize</th>
                      <th class="text-success text-center">Attend Status</th>
                      <th class="text-success text-center">Edit Action</th>
                      <th class="text-success text-center">Delete Action</th>
                      <th class="text-success text-center">TXN Amount</th>
                      <th class="text-success text-center">Order Id</th>
                      <th class="text-success text-center">TXN ID</th>
                      <th class="text-success text-center"> Bank TXN Id</th>
                      <th class="text-success text-center">TXN Date</th>
                      <th class="text-success text-center">TXN Status</th>

                    </thead>

                    <tbody>';


                     while($row= $result->fetch(PDO::FETCH_ASSOC)) {

                    
                      $data .=  '<tr class= "text-center">
                        <td>' . $row['certificateId'] . '</td>
                        <td>'  . $row['firstName'] . '</td>
                        <td>' . $row['lastName'] . '</td>
                        <td>' . $row['collegeName'] . '</td>
                        <td>' . $row['departmentName']. '</td>
                        <td>' . $row['academicYear'] .'</td>
                        <td>' . $row['event']. '</td>
                        <td>'  .$row['prize'] . '</td>
                        <td>'  .$row['attendStatus']. '</td>
                        <td><button class="btn btn-primary" onclick= "getParticipantDetails('.$row['certificateId'].')">Edit</button></td>
                        <td><button class="btn btn-danger" onclick=  "deleteParticipantDetails('.$row['certificateId'].')">Delete</button></td>
                        <td>' . $row['txnAmount'] . '</td>
                        <td>' . $row['orderId']. '</td>
                        <td>' . $row['txnId']. '</td>
                        <td>' . $row['bankTxnId']. '</td>
                        <td>' . $row['txnDate']. '</td>
                        <td>' . $row['status'] . '</td>
                      </tr>';

                     }

                 $data .=  '</tbody>
                            </table>';
                           
                           

                 echo $data;

                    }



?>