<?php
//Starting Session
session_start();
// Creating Database Connection
require_once "../configPDO.php";

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

  <!-- PHP CODE START -->
  <?php

if (isset($_POST["sendEmails"])) {

    if (isset($_POST['g-recaptcha-response'])) {

        $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
        $response = json_decode($verifyResponse);

        if ($response->success) {

            $newletterSubject = trim($_POST['newletterSubject']);
            $newletterMessage = trim($_POST['newletterMessage']);

            $sql = "SELECT DISTINCT email FROM newsletter_information";

            //Preparing Query
            $result = $conn->prepare($sql);

            //Executing Query
            $result->execute();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $newsletterEmails = $row['email'];

                sendMail($newletterEmails, $newletterSubject, $newletterMessage);
            }

        } // if $response

        else {
            echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Google Recaptcha Error',
            text: 'Please fill Google Recaptcha'
          })</script>";
        }

    } // if(isset($_POST['g-recaptcha-response']))

}

// Mail code

function sendMail($newsletterEmails, $newsletterSubject, $newsletterMessage)
{
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
    $mail->addAddress($newsletterEmails, "GIT SHODH 2K20 Users");
    $mail->Subject = $newsletterSubject;

    // multiple attachment
    for ($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) {
        $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
    }

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML("<!doctype html><html><body>$newsletterMessage</body></html>");

    $mail->AltBody = $newsletterMessage;

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

          <form action="" method="post" name="sendMailForm"  enctype = "multipart/form-data">


            <div class="form-group">
              <label>Subject</label>
              <input type="text" class="form-control" name="newsletterSubject" required>
            </div>


            <div class="form-group">
              <label for="message">Your message</label>
              <textarea type="text" id="message" name="newsletterMessage" rows="3" class="form-control" required></textarea>
            </div>

            <div class="form-group">
            <label>Attachments: </label><br/>
            <input type="file" multiple= "multiple" name="file[]" accept=".doc,.jpg,.jpeg,.pdf,.docx,.gif" id="file">
            </div>

            <div class="text-center my-2">
              <div class="g-recaptcha text-center" data-sitekey="6LdGougUAAAAAG96eGund5fScrR1fouBZvyLf1RL"></div>
            </div>

            <div>
              <input type="submit" value="Send Newsletter" class="btn mt-3 btn-primary btn-block rounded-pill"
                name="sendNewsletter">
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

     <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>