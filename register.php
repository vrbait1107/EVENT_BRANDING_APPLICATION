<?php

// Creating Connection to Database
    require_once "configNew.php";

// Staring Session
    session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- header Scripts and Links -->
  <?php include_once "includes/headerScripts.php"; ?>
  <!-- Event-Reg css -->
  <link rel="stylesheet" href="css/event-reg.css">
  <!-- Animate css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!-- Google Recaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>


  <title>GIT SHODH 2K20 Registration</title>
  <style>
    a {
      text-decoration: none !important;
    }
  </style>

</head>

<body>

  <!--PHP CODE START -->

  <?php

$login= "login.php";

if (isset($_POST['submit'])) {

    if(isset($_POST['g-recaptcha-response'])) {

    $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
    $response = json_decode($verifyResponse);

        if($response->success){

        // To avoid sql injection and cross site scripting also remove white spaces
        function security($data){
        global $conn;
        $data = trim($data);
        $data = $conn->real_escape_string($data);
        $data = htmlentities($data);
        return $data;
        }

        // calling function to perform security task
        $userName =   security($_POST['userName']);
        $firstName =  security($_POST['firstName']);
        $lastName =  security($_POST['lastName']);
        $mobileNumber =  security($_POST['mobileNumber']);
        $collegeName =  security($_POST['collegeName']);
        $department = security($_POST['department']);
        $year =  security($_POST['year']);
        $password =  security($_POST['password']);
        $confirm_password =  security($_POST['confirm_password']);
        $token = bin2hex(random_bytes(15));

        $hashPass = password_hash($password, PASSWORD_BCRYPT);
        $hashConPass = password_hash($confirm_password, PASSWORD_BCRYPT);

        $sql1 ="select* from user_information where user_information.email ='$userName'";
        $res1= $conn->query($sql1);

              if($res1->num_rows > 0) {

              echo "<script>Swal.fire({
                  icon: 'warning',
                  title: 'Account is Already Exist',
                  text: 'You are already registerd with GIT Shodh 2K20,Login to Continue',
                  footer: '<a href = $login >Go to the Login Page</a>'
                })</script>";

                }

              else {
            
              $sql = "insert into user_information(email, firstName, lastName, 
              mobileNumber, collegeName, departmentName, academicYear, mainPassword, confirmPass, token) VALUES ('$userName', '$firstName', '$lastName', 
              '$mobileNumber', '$collegeName', '$department', '$year', '$hashPass', '$hashConPass', '$token')";

              $result = $conn->query($sql);

                    if($result){ 
                  
                      echo "<script>Swal.fire({
                          icon: 'success',
                          title: 'Activate Your Account',
                          text: 'Check Your Email for activate your account'
                        })</script>";

                      // Mail Code

                      date_default_timezone_set('Etc/UTC');

                      require 'PHPMailer/PHPMailerAutoload.php';

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
                      $mail->setFrom('vishalbait02@gmail.com', 'GIT SHODH 2K20');
                      $mail->addReplyTo('non-reply@gmail.com', 'GIT SHODH 2K20');
                      $mail->addAddress($userName, $userName);
                      $mail->Subject = "Activate Your GIT SHODH 2K20  Account";

                      //Read an HTML message body from an external file, convert referenced images to embedded,
                      //convert HTML into a basic plain-text alternative body

                    

    $mail->msgHTML("<!doctype html>
    <html>
    <body>
    <p>Thank you $userName for creating an account with GIT SHODH 2K20</p>
    <p>There's just one more step before you can login and participate in a event: you need to activate your GIT SHODH
        account. To activate your account, click the following link. If that doesn't work, copy and paste the link into
        your browser's address bar.</p>
    <p>http://localhost/EBA/activateEmail.php?token=$token</p>
    <p>If you didn't create an account, you don't need to do anything; you won't receive any more email from us. If you
        need assistance, please do not reply to this email message. Check the help section of the GIT SHODH website.</p>
  </body>
  </html>");


  $mail->AltBody = "Thank you $userName for creating an account with GIT SHODH 2K20 <br/>
  There's just one more step before you can login and participate in a event: you need to activate your GIT SHODH
  account. To activate your account, click the following link. If that doesn't work, copy and paste the link into
  your browser's address bar. <br/>
  http://localhost/EBA/activateEmail.php?token=$token <br/>
  If you didn't create an account, you don't need to do anything; you won't receive any more email from us. If you
  need assistance, please do not reply to this email message. Check the help section of the GIT SHODH website.";

                          if (!$mail->send()) {
                              echo "Mailer Error: " . $mail->ErrorInfo;
                          } else {
                              echo "<h3 class='text-center text-primary'>Check Your Email.</h3>";
                          }

  // Mail Code End
                    } 

                    else {
                    echo '<script>Swal.fire({
                        icon: "error",
                        title: "Eror",
                        text: "Something Went Wrong",
                        footer: "<a href>Go to the Login Page</a>"
                      })</script>';
                    }

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

} // isset bracket

?>
  <!-- PHP CODE END  -->





  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="#">GIT SHODH/SYNERGY 2K20</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="register.php">SHODH Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="login.php">SHODH Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="Admin/adminLogin.php">SHODH Admin Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase text-dark" href="Admin/synergyLogin.php">SYNERGY Admin Login</a>
        </li>
      </ul>
    </div>
  </nav>





  <div class="container mt-4">

    <h2 class="text-center text-uppercase">git <span class="text-danger">shodh</span> 2K20 Registration</h2>
    <hr>
    <div>
      <h5 class="my-4 text-center">Already have an Account? <a href="login.php"> Please Login here</a></h5>
      <h5 class="text-danger animated heartBeat slow">Note: 1) Following details will be used for your Certificate
        Generation so please provide proper details.</h5>
      <h5 class="text-danger animated heartBeat slow">2) We'll never share your details with anyone else.</h5>
    </div>
    <form action="" method="post" name="myForm" onsubmit="return formValidationRegister()">

      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputEmail4">Enter Your Username</label>
          <input type="email" class="form-control" name="userName" id="inputEmail4" placeholder="Email" required>
        </div>

        <div class="form-group col-md-6">
          <label for="inputFirstName4">First Name</label>
          <input type="text" class="form-control" name="firstName" id="inputFirstName4" placeholder="First Name"
            required>
        </div>

        <div class="form-group col-md-6">
          <label for="inputLastName4">Last Name</label>
          <input type="text" class="form-control" name="lastName" id="inputLastName4" placeholder="Last Name" required>
        </div>


        <div class="form-group col-md-6">
          <label for="inputNumber4">Mobile Number</label>
          <input type="text" class="form-control" name="mobileNumber" id="inputNumber4" placeholder="Mobile Number"
            required>
        </div>

        <div class="form-group col-md-6">
          <label for="inputNumber4">Enter Your College Name</label>
          <input list="collegeNameList" class="form-control" name="collegeName" id="collegeName4"
            placeholder="College Name" autocomplete="off" required>
          <datalist id="collegeNameList">
            <option disabled selected>Choose Your College</option>
            <option> (10 )Anjuman-I-Islam's M. H. Saboo Siddik College of Engineering</option>
            <option> (17 )Bharati Vidyapeeth's College of Engineering</option>
            <option> (55 )Fr. Conceicao Rodrigues College of Engineering</option>
            <option> (116 )CHATRAPATI SHIVAJI MAHARAJ INSTITUTE OF TECHNOLOGY</option>
            <option> (124 )Mahatma Gandhi Mission's College of Engineering and Technology</option>
            <option> (126 )Mahavir Education Trust's Shah and Anchor Kutchi Engineering College</option>
            <option> (174 )Ramrao Adik Institute of Technology</option>
            <option> (237 )Terna Public Charitable Trust's College of Engineering</option>
            <option> (238 )Thadomal Shahani Engineering College</option>
            <option> (356 )Padmabhushan Vasantdada Patil Prathisthan Engineering College</option>
            <option> (366 )Vivekanand Education Society's Institute of Technology</option>
            <option> (368 )Watumull Institute of Electronic Engineering and Computer Technology</option>
            <option> (385 )Jawahar Education Society's Annasaheb Chadaman Patil College of Engineering
            </option>
            <option> (390 )Mandar Education Society's Rajaram Shinde College of Engineering</option>
            <option> (403 )Smt. Indira Gandhi Engineering College</option>
            <option> (426 )Agnel Charities Fr. Conceicao Rodrigues Institute of Technology</option>
            <option> (428 )Datta Meghe College of Engineering</option>
            <option> (438 )Konkan Gyanpeeth's College of Engineering ,R. D. College of Pharmacy</option>
            <option> (442 )Lokmanya Tilak Jankalyan Shikshan Sanstha's Lokmanya Tilak College of Engineering
            </option>
            <option> (443 ) Finolex Academy of Management and Technology's College of Engineering</option>
            <option> (461 )Shivajirao S. Jondhale College of Engineering</option>
            <option> (466 )Vidyavardhini's College of Engineering and Technology</option>
            <option> (522 )Rizvi College of Engineering</option>
            <option> (523 )Rajendra Mane College of Engineering and Technology</option>
            <option> (524 )Manjara Charitable Trust's Rajiv Gandhi Institute of Technology</option>
            <option> (531 )St. Francis Institute of Technology</option>
            <option> (532 )Atharva College of Engineering</option>
            <option> (533 )Sindhudurga Shikshan Prasarak Mandal's College of Engineering</option>
            <option> (534 )Vidyalankar Institute of Technology</option>
            <option> (561 )Mahatma Education Society's Pillai's Institute of Information Technology,
              Enineering Media Studies a</option>
            <option> (688 )The Bombay Salesian Society's Don Bosco Institute of Technology</option>
            <option> (689 )Excelsior Education Society's K. C. College of Engineering</option>
            <option> (690 )South Indian Education Society's College of Engineering</option>
            <option> (691 )K. J. Somaiya Institute of Engineering and Information Technology</option>
            <option> (692 )Saraswati Education Socity's Saraswati College of Engineering</option>
            <option> (734 )Yadavrao Tasgaonkar Institute of Engineering ,Technology & Pharmacy</option>
            <option> (736 )Xavier Institute of Engineering</option>
            <option> (742 )Gharda Institute of Technology</option>
            <option> (751 )SHIVAJIRAO'S JONDHLE COLLEGE OF ENGINEERING & TECHNOLOGY</option>
            <option> (776 )ALAMURI RATNAMALA INSTITUTE OF ENGINEERING</option>
            <option> (779 )ST.JOHN COLLEGE OF ENGINEERING & TECHNOLOGY</option>
            <option> (780 )YADAVRAO TASGAONKAR ENGINEERING & MANAGEMENT</option>
            <option> (802 )THEEM COLLEGE OF ENGINEERING</option>
            <option> (807 )G.V.ACHARYA INSTITUTE OF ENGINEERING</option>
            <option> (822 )PILLAI'S HOCL COLLEGE OF ENGINEERING</option>
            <option> (823 )VIVA INSTITUTE OF TECHNOLOGY</option>
            <option> (824 )SES'S GROUP OF INSTITUTIONS</option>
            <option> (857 )DILKAP RESEARCH INSTT OF ENGG & MGT</option>
            <option> (889 )BHARAT COLLEGE OF ENGINEERING</option>
            <option> (890 )L.R.TIWARI COLLEGE OF ENGG</option>
            <option> (944 )ANJUMAN ISLAM SCHOOL OF ENGG</option>
            <option> (945 )VISWATMAK OM GURUDEV COLLEGE OF ENGG</option>
            <option> (946 )GOPINATH M VEDAK INSTT OF TECHNOLOGY</option>
            <option> (948 )B.R. HARNE COLLEGE OF ENGG & TECHNOLOGY</option>
            <option> (949 )METROPOLITAN INSTT OF TECHNOLOGY</option>
            <option> (978 )MAHARSHI PARSHURAM COLLEGE OF ENGG - VELNESHWAR, GUHAGAR</option>
            <option> (982 )VIDYA VIKAS EDUCATION TRUST, VASAI</option>
            <option> (990 )VISHWANIKETAN INST OF MANG. & ENGINEERING TECH</option>
            <option> (991 )IDAL INSTTITUTE OF TECH.</option>
            <option> (995 )NEW HORIZON INSTITUTE OF TECHNOLOGY & MANAGEMENT</option>
            <option> (996 )A P SHAH INSTITUTE OF TECHNOLOGY</option>
            <option>IF OTHER PLEASE SPECIFY</option>
          </datalist>
        </div>


        <div class="form-group col-md-6">
          <label for="inputNumber4">Enter Your Department Name</label>
          <input list="departmentName" class="form-control" name="department" id="department4"
            placeholder="Department Name" autocomplete="off" required>
          <datalist id="departmentName">
            <option value="Electronics and Telecommunication"></option>
            <option value="Chemical"></option>
            <option value="Civil"></option>
            <option value="Mechanical"></option>
            <option value="Computer"></option>
            <option value="Electrical"></option>
            <option value="Petrochemical"></option>
            <option value="Information Technology"></option>
            <option value="Plastic and Polymer"></option>
            <option value="Instrumentation"></option>
            <option value="Computer Science"></option>
            <option value="Electronics and Communication"></option>
            <option value="Aeronautical"></option>
            <option value="Agricultural"></option>
            <option value="Electrical and Instrumentation"></option>
            <option value="Arts"></option>
            <option value="Commerce"></option>
            <option value="Science"></option>
            <option value="Electronics"></option>
          </datalist>
        </div>

        <div class="form-group col-md-6">
          <label for="inputNumber4">Enter Your Acadmic Year</label>
          <input list="yearName" class="form-control" name="year" id="year4" placeholder="First/Second/Third/Last Year"
            autocomplete="off" required>
          <datalist id="yearName">
            <option value="First Year"></option>
            <option value="Second Year"></option>
            <option value="Third Year"></option>
            <option value="Fourth Year"></option>
          </datalist>
        </div>

        <div class="form-group col-md-6">
          <label for="inputPassword4">Password</label>
          <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password"
            required>
        </div>


        <div class="form-group col-md-6">
          <label for="inputPassword4">Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password" id="inputPassword"
            placeholder="Confirm Password" required>
        </div>
      </div>

      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Check me out
          </label>
        </div>
      </div>

      <div class="text-center my-2">
        <div class="g-recaptcha text-center" data-sitekey="6LdGougUAAAAAG96eGund5fScrR1fouBZvyLf1RL"></div>
      </div>

      <input type="submit" name="submit" class="btn btn-primary" value="Register Here">

    </form>
    <br>
  </div>

  <!-- Footer Script -->
  <?php include_once "includes/footerScripts.php"; ?>
  <!-- Form Validation -->
  <script src="js/form-validation.js"></script>

  <?php
    // closing Database Connnection
     $conn->close(); 
     ?>

</body>

</html>