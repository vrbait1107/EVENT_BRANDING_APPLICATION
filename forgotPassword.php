<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password Page</title>

    <!--Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--SweetAlert.js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <style>
        h3 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
    </style>
</head>

<body>

<!-- PHP Code Start -->

<?php 
require_once "config.php";

// Generating Random Password to Send Over Email.
    function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);
}

$pass = rand_string(10);

if(isset($_POST['submit'])){
    $email = $_POST['email'];

    // Mail Code 

date_default_timezone_set('Etc/UTC');

require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "vishalbait02@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "9921172153";

//Set who the message is to be sent from
$mail->setFrom('vishalbait02@gmail.com', 'Vishal Bait');

//Set an alternative reply-to address
$mail->addReplyTo('non-reply@gmail.com', 'vishal bait');

//Set who the message is to be sent to
$mail->addAddress($email, $email);

//Set the subject line
$mail->Subject = "GIT SHODH 2K20 PASSWORD RECOVERY";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<!doctype html><html><body><h1>$email Your Password is Successfully Reset. 
    Your Password is Now $pass, Go to login page & Enter above Password for login. </h1></body></html>");

//Replace the plain text body with one created manually
$mail->AltBody = "$email Your Password is Successfully  Reset. 
    Your Password is Now $pass, Go to login page & Enter above Password for login.";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {

    $pass = password_hash($pass,PASSWORD_BCRYPT);
   
    $sql = "UPDATE user_information SET mainPassword ='$pass', confirmPass = '$pass'  WHERE email = '$email'";
    $result1 = mysqli_query($conn, $sql);
    if($result1) {
         echo "<script>Swal.fire({
        icon: 'success',
        title: 'Successful',
        text: 'Your Password has been Successfully Reset, Check Your Mail.'
           })</script>";

    }
    else{
        echo "<script>Swal.fire({
        icon: 'error',
        title: 'Failed',
        text: 'We are failed to reset your password.'
           })</script>";
    }

    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
 
}

?>


<!-- PHP Code Ended -->



    <main class="container">
        <div class="row mt-5">
            <section class="col-md-6 offset-md-3 mt-5">
                <div class="card shadow p-5">

                    <div class="card-header text-white bg-info mb-3">
                        <h3 class="text-center text-uppercase">Password Recovery</h3>
                    </div>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Enter Your Email</label>
                            <input type="email" name="email" id="email" class="form-control mb-3" autocomplete="off">
                            <input type="submit" value="Submit" name="submit"
                                class="btn btn-primary btn-block rounded-pill">
                        </div>
                    </form>
                    <a href="login.php" class="text-danger font-weight-bold">Go to Login Page</a>
                </div>
            </section>
        </div>
    </main>


</body>

</html>