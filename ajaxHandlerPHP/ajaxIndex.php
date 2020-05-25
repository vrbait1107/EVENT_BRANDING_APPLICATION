<?php

require_once "../configPDO.php";
session_start();

extract($_POST);
if(isset($_POST['email'])){


     $sql1 = "SELECT * FROM user_information WHERE email = :email";
     $result1 = $conn->prepare($sql1);
     $result1->bindValue(":email", $email);
     $result1->execute();

     if($result1->rowCount() > 0) {

         
     $sql2 = "SELECT * FROM newsletter_information WHERE email = :email";
     $result2 = $conn->prepare($sql2);
     $result2->bindValue(":email", $email);
     $result2->execute();

     if($result2->rowCount() < 0) {

    
     //Query
      $sql = "INSERT INTO newsletter_information (email, subscribe) VALUES (:email, :Yes)";

      //Prepare Query
      $result = $conn->prepare($sql);

      //Binding Value 
      $result->bindValue(":email", $email);
      $result->bindValue(":Yes", "Yes");

      //Executing Value
      $result->execute();

      if($result){
         echo "You are successfully subscribed to newsletter";
      }
      else {
           echo "You are failed to subscribe newsletter, Please try again";
      }

      }

      else {
           echo "You are already subscribed  to newsletter";
      }
                 
     
     }

     else {
          echo "Please Enter your registered email for this account";
     }

 }

 ?>