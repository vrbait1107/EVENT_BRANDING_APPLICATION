<?php
//Starting Session
session_start();

// ------------------------->> DB CONFIG
require_once "../configPDO.php";

//---------------------------->> SECRETS
require_once "../config/Secret.php";

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

  <!-- Admin Header Scripts -->
  <?php include_once "includes/adminHeaderScripts.php";?>

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

  <?php
// Include Common Anchor
include_once "includes/commonAnchor.php";
//Including Admin Navbar
include_once "includes/adminNavbar.php";
?>

  <div id="layoutSidenav_content">

    <main class="container">
      <div class="row">
        <section class="col-md-6 my-5 offset-md-3">
          <h2 class="text-center text-primary font-time">Send Newsletter</h2>
          <hr>

          <form action="" method="post" name="sendNewsletterForm" id="sendNewsletterForm" enctype="multipart/form-data">


            <div class="form-group">
              <label>Subject</label>
              <input type="text" class="form-control" name="newsletterSubject" id="newsletterSubject" required>
            </div>


            <div class="form-group">
              <label for="message">Your message</label>
              <textarea type="text" id="newsletterMessage" name="newsletterMessage" rows="3" class="form-control"
                required></textarea>
            </div>

            <div class="form-group">
              <label>Attachments: </label><br />
              <input type="file" multiple="multiple" name="file[]" accept=".doc,.jpg,.jpeg,.pdf,.docx,.gif" id="file">
            </div>

            <div class="text-center my-2">
              <div class="g-recaptcha text-center" data-sitekey=<?php echo $recaptchaSiteKey; ?>></div>
            </div>

            <!-- Response Message -->
            <div id="responseMessage" class="text-danger"></div>

            <div>
              <input type="submit" value="Send Newsletter" class="btn mt-3 btn-primary btn-block rounded-pill"
                name="sendNewsletter" id="sendNewsletter">
            </div>

          </form>

        </section>
      </div>

    </main>

    <!--Admin Footer-->
    <?php include_once "includes/adminFooter.php";?>

  </div>

  <!-- Admin Footer Scripts -->
  <?php include_once "includes/adminFooterScripts.php";?>

  <!-- Custom JS -->
  <script src="js/sendNewsletter.js"></script>

   <script>
        CKEDITOR . replace('newsletterMessage');
    </script>
  <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>