<?php
//Starting Session
session_start();
// Creating Database Connection
require_once "../configPDO.php";

if(!isset($_SESSION['adminEmail'])) {
  header("location:adminLogin.php");
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Admin Header Scripts -->
  <?php include_once "includes/adminHeaderScripts.php"; ?>

  <!-- Google Recaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <title>GIT SHODH 2K20</title>

  <style>
    hr {
      border: 1px dashed black;
    }
  </style>
</head>

<body class="sb-nav-fixed">

  <!-- PHP CODE START -->
  <?php

    if(isset($_POST["sendEmails"])) {

      if(isset($_POST['g-recaptcha-response'])) {

      $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
      $response = json_decode($verifyResponse);

      if($response->success){

       $targetAudience = trim($_POST['targetAudience']);
       $targetSubject = trim($_POST['targetSubject']);
       $targetMessage = trim($_POST['targetMessage']);

       if($targetAudience === "collegeLevel"){

         $sql = "SELECT DISTINCT email FROM event_information";

         //Preparing Query
         $result = $conn->prepare($sql);

         //Executing Query
         $result->execute();

         while($row = $result->fetch(PDO::FETCH_ASSOC)){
           $targetEmails = $row['email'];

           sendMail($targetEmails, $targetSubject, $targetMessage);
         }
       }

       elseif($targetAudience=== "departmentLevel"){

          $targetDepartment = trim($_POST['targetDepartment']);
          $targetEvent = trim($_POST['targetEvent']);

          //Query
          $sql = "SELECT DISTINCT email FROM event_information WHERE event_information.event IN
          (SELECT eventName FROM events_details_information WHERE departmentName = :targetDepartment";

          //Preparing Query
          $result = $conn->prepare($sql);

          //Binding Values
          $result->bindValue(":targetDepartment", $targetDepartment);

          //Executing Query
          $result->execute();

          while($row = $result->fetch(PDO::FETCH_ASSOC)){
           $targetEmails = $row['email'];

           sendMail($targetEmails, $targetSubject, $targetMessage);
         }
       }

       elseif($targetAudience === "eventLevel"){

         $targetDepartment = trim($_POST['targetDepartment']);
         $targetEvent = trim($_POST['targetEvent']);

         $sql = "SELECT distinct email FROM event_information WHERE event = :targetEvent";

         //Preparing Query
         $result = $conn->prepare($sql);

         //Binding Values
         $result->bindValue(":targetEvent", $targetEvent);

         //Executing Query
         $result->execute();
          
          while($row = $result->fetch(PDO::FETCH_ASSOC)){

           $targetEmails = $row['email'];
           sendMail($targetEmails, $targetSubject, $targetMessage);
         }

       }
       else {
         echo "Something Went Wrong";
       }

        
      }// if $response

      else{
        echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Google Recaptcha Error',
            text: 'Please fill Google Recaptcha'
          })</script>";
      }

      }// if(isset($_POST['g-recaptcha-response']))

 }



 // Mail code
 
  function sendMail($targetEmails, $targetSubject, $targetMessage) {
  date_default_timezone_set('Etc/UTC');
  require_once '../PHPMailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "vishalbait02@gmail.com";
  $mail->Password = "9921172153";
  $mail->setFrom("vishalbait02@gmail.com", "GIT SHODH 2K20");
  $mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');
  $mail->addAddress($targetEmails, "GIT SHODH 2K20 Users");
  $mail->Subject = $targetSubject;

  // multiple attachment
  for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
  $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
  }

  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML("<!doctype html><html><body>$targetMessage</body></html>");

  $mail->AltBody = $targetMessage;
  
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  echo "<script>Swal.fire({
      icon: 'success',
      title: 'Success',
      text: 'Email Sent'
    })</script>";
  }
  
  }

?>


  <!--Navbar-->
  <?php

  if($_SESSION['adminType'] === "Administrator") {
  $adminFileName = "adminIndex.php";
  $adminFileData = "adminIndexData.php";
  $adminManage = "adminManage.php";
  
  }
  elseif($_SESSION['adminType'] === "Student Coordinator"){
  $adminFileName = "studentCoordinatorIndex.php";
  $adminFileData = "studentCoordinatorData.php";
  $adminManage = "#";
  }
  elseif($_SESSION['adminType'] === "Faculty Coordinator"){
  $adminFileName = "facultyCoordinatorIndex.php";
  $adminFileData = "facultyCoordinatorData.php";
  $adminManage = "facultyCoordinatorManage.php";
  
  }
  elseif($_SESSION['adminType'] === "Synergy Administrator"){
  $adminFileName = "synergyIndex.php";
  $adminFileData = "synergyData.php";
  $adminManage = "#";
  }
  else{
  $adminFileName = "#";
  $adminFileData = "#";
  $adminManage = "#";
  }

   include_once "includes/adminNavbar.php"; 
   
   ?>

  <div id="layoutSidenav_content">

    <main class="container">
      <div class="row">
        <section class="col-md-6 my-5 offset-md-3">
          <h2 class="text-center text-primary font-time">Send Mails to Participants</h2>
          <hr>

          <form action="" method="post" name="sendMailForm" onsubmit= "return sendMailsValidation()" enctype = "multipart/form-data">

            <div class="form-group">
              <label>Target Audience</label>
              <select name="targetAudience" class="form-control">
                <option selected disabled>Choose...</option>
                <option value="collegeLevel">College Level</option>
                <option value="deparmentLevel">Department Level </option>
                <option value="eventLevel">Event Level</option>
              </select>
            </div>


            <div class="form-group">
              <label>If Deparment Level and Event Level Choose Department</label>
              <select name="targetDepartment" class="form-control">
                <option selected disabled>Choose...</option>
                <option value="Electronics and Telecommunication">Electronics and Telecommunication</option>
                <option value="Chemical">Chemical</option>
                <option value="Computer">Computer</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Civil">Civil</option>
              </select>
            </div>

            <div class="form-group">
              <label>If Event Level Choose Event</label>
              <select class="form-control" name="targetEvent">
                <option selected disabled>Choose...</option>
                <option value="Not Applicable">Not Applicable</option>
                <option value="EXTC Paper Presentation">EXTC Paper Presentation</option>
                <option value="EXTC Poster Presentation">EXTC Poster Presentation</option>
                <option value="EXTC Project Presentation">EXTC Project Presentation</option>
                <option value="Tech Boss">Tech Boss</option>
                <option value="Fun Tech">Fun Tech</option>
                <option value="School Event">School Event</option>
                <option value="Logo Contest">Logo Contest</option>
                <option value="Calci War">Calci War</option>
                <option value="Chemical Paper Presentation">Chemical Paper Presentation</option>
                <option value="Chemical Poster Presentation">Chemical Poster Presentation</option>
                <option value="Chemical Project Presentation">Chemical Project Presentation</option>
                <option value="Computer Paper Presentation">Computer Paper Presentation</option>
                <option value="Computer Poster Presentation">Computer Poster Presentation</option>
                <option value="Computer Project Presentation">Computer Project Presentation</option>
                <option value="Mechanical Paper Presentation">Mechanical Paper Presentation</option>
                <option value="Mechanical Poster Presentation">Mechanical Poster Presentation</option>
                <option value="Mechanical Project Presentation">Mechanical Project Presentation</option>
                <option value="Civil Paper Presentation">Civil Paper Presentation</option>
                <option value="Civil Poster Presentation">Civil Poster Presentation</option>
                <option value="Civil Project Presentation">Civil Project Presentation</option>
              </select>
            </div>

            <div class="form-group">
              <label>Subject</label>
              <input type="text" class="form-control" name="targetSubject">
            </div>


            <div class="form-group">
              <label for="message">Your message</label>
              <textarea type="text" id="message" name="targetMessage" rows="3" class="form-control"></textarea>
            </div>

            <div class="form-group">
            <label>Attachments: </label><br/>
            <input type="file" multiple= "multiple" name="file[]" accept=".doc,.jpg,.jpeg,.pdf,.docx,.gif" id="file">
            </div>

            <div class="text-center my-2">
              <div class="g-recaptcha text-center" data-sitekey="6LdGougUAAAAAG96eGund5fScrR1fouBZvyLf1RL"></div>
            </div>

            <div>
              <input type="submit" value="Send Emails" class="btn mt-3 btn-primary btn-block rounded-pill"
                name="sendEmails">
            </div>

          </form>

        </section>
      </div>

    </main>

    <!--Admin Footer-->
    <?php include_once "includes/adminFooter.php";?>

  </div>

  <script src= "../js/form-validation.js"></script>
  <!-- Admin Footer Scripts -->
  <?php include_once "includes/adminFooterScripts.php"; ?>

     <?php
    // closing Database Connnection
     $conn = null; 
     ?>
     
</body>

</html>