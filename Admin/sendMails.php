<?php
session_start();

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

    require_once "../configNew.php";

    if(isset($_POST["sendEmails"])) {

      if(isset($_POST['g-recaptcha-response'])) {

      $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
      $response = json_decode($verifyResponse);

      if($response->success){

       // To avoid sql injection and cross site scripting also remove white spaces
            function security($data){
            global $conn;
            $data = trim($data);
            $data = mysqli_real_escape_string($conn,$data);
            $data = htmlentities($data);
            return $data;
            }

       $targetAudience = security($_POST['targetAudience']);
       $targetSubject = security($_POST['targetSubject']);
       $targetMessage = security($_POST['targetMessage']);

       if($targetAudience === "collegeLevel"){
         $sql = "select  distinct email from event_information";
         $result = $conn->query($sql);

         while($row = $result->fetch_assoc()){
           $targetEmails = $row['email'];

           sendMail($targetEmails, $targetSubject, $targetMessage);
         }
       }

       elseif($targetAudience=== "departmentLevel"){

          $targetDepartment = security($_POST['targetDepartment']);
          $targetEvent = security($_POST['targetEvent']);

         $sql = "select distinct email from event_information where event_information.event in
          (select eventName where departmentName = '$targetDepartment'";
          $result = $conn->query($sql);

          while($row = $result->fetch_assoc()){
           $targetEmails = $row['email'];

           sendMail($targetEmails, $targetSubject, $targetMessage);
         }
       }

       elseif($targetAudience === "eventLevel"){

         $targetDepartment = security($_POST['targetDepartment']);
         $targetEvent = security($_POST['targetEvent']);

         $sql = "select distinct email from event_information where event = '$targetEvent'";
         $result = $conn->query($sql);
          
          while($row = $result->fetch_assoc()){
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
  $adminManage = "facultyCoordinatorManage";
  
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


</body>

</html>