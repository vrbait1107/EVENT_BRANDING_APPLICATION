<?php
//----------------------------------------->> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "../config/techfestName.php";

//---------------------------->> START SESSION
session_start();

//--------------------->> DB CONFIG
require_once '../config/configPDO.php';

//---------------------------->> SECRETS
require_once "../config/Secret.php";

//---------------------------->> CHECKING ADMIN
if (!isset($_SESSION['adminEmail'])) {
    header("location:adminLogin.php");
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- First Admin Header Scripts then Google Recaptcha -->
  <?php include_once "includes/adminHeaderScripts.php";?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <title><?php echo $techfestName ?> | ADMINISTARTOR SEND EMAILS </title>

  <style>
    hr {
      border: 1px dashed black;
    }
  </style>
</head>

<body class="sb-nav-fixed">


  <!--Include Navbar & Common Anchor-->
  <?php
include_once "includes/commonAnchor.php";
include_once "includes/adminNavbar.php";
?>

  <div id="layoutSidenav_content">

    <main class="container">
      <div class="row">
        <section class="col-md-6 my-5 offset-md-3">
          <h2 class="text-center text-primary font-time">Send Mails to Participants</h2>
          <hr>

          <form action="" method="post" name="sendMailForm" id="sendMailForm" enctype="multipart/form-data">



            <div class="form-group">
              <label>Target Audience</label>
              <select name="targetAudience" id="targetAudience" class="form-control">
                <option selected disabled>Choose...</option>
                <option value="collegeLevel">College Level</option>
                <option value="deparmentLevel">Department Level </option>
                <option value="eventLevel">Event Level</option>
              </select>
            </div>


            <div class="form-group">
              <label>If Deparment Level and Event Level Choose Department</label>
              <select name="targetDepartment" id="targetDepartment" class="form-control">
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
              <select class="form-control" name="targetEvent" id="targetEvent">
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
              <input type="text" class="form-control" name="targetSubject" id="targetSubject">
            </div>


            <div class="form-group">
              <label for="message">Your message</label>
              <textarea type="text" id="targetMessage" name="targetMessage" rows="3" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label>Attachments: </label><br />
              <input type="file" multiple="multiple" name="file[]" accept=".doc,.jpg,.jpeg,.pdf,.docx,.gif" id="file">
            </div>

            <div class="text-center my-2">
              <div class="g-recaptcha text-center" data-sitekey=<?php echo $recaptchaSiteKey; ?>></div>
            </div>

            <div id="responseMessage" class="text-danger"></div>

            <div>
              <input type="submit" value="Send Emails" class="btn mt-3 btn-primary btn-block rounded-pill"
                name="sendEmails" id="sendEmails">
            </div>

          </form>

        </section>
      </div>

    </main>

    <!-- Include Admin Footer-->
    <?php include_once "includes/adminFooter.php";?>

  </div>

  <!-- Include Admin Footer Scripts -->
  <?php include_once "includes/adminFooterScripts.php";?>

  <!-- Javascript -->
  <script src="js/sendMails.js"></script>
   <script>
        CKEDITOR . replace('targetMessage');
    </script>

   <!-- Close Database Connection -->
  <?php $conn = null;?>

</body>

</html>