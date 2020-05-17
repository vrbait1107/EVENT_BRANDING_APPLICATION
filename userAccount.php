<?php

// Creating Connection to Database
    require_once "configPDO.php";

// Staring Session
    session_start();

if(!isset($_SESSION['user'])) {
header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>

    <style>
        body footer {
            position: static;
        }
    </style>

</head>


<body>

    <!-- PHP Code Start -->
    <?php

    // Change user Password

if(isset($_POST['changePassword'])){
    
$email = $_SESSION['user'];

    // triming white space arround string
    $currentPassword = trim($_POST['currentPassword']);
    $newPassword = trim($_POST['newPassword']);
    $conNewPassword = trim($_POST['conNewPassword']);

//Query
$sql = "SELECT mainPassword FROM user_information WHERE email = :email";

//Preparing Query
$result= $conn->prepare($sql);

//Binding Values
$result->bindValue(":email", $email);

//Executing Query
$result->execute();

//Fetching Value in associative array 
$row = $result->fetch(PDO::FETCH_ASSOC);

$dbPassword = $row['mainPassword'];

    if(password_verify($currentPassword,$dbPassword)) {
       
        if( $newPassword===  $conNewPassword ) {

        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $conNewPassword= password_hash($conNewPassword, PASSWORD_BCRYPT);

        //Query
        $sql1 = "UPDATE user_information SET mainPassword= :newPassword1, confirmPass = :newPassword2 WHERE email = :email";
        
        //Preparing Query
        $result1= $conn->prepare($sql1);

        //Binding Values
        $result1->bindValue(":newPassword1", $newPassword);
        $result1->bindValue(":newPassword2", $newPassword);
        $result1->bindValue(":email", $email);

        //Executing Query
        $result1->execute();

    
            if($result1) {
       
            echo "<script>Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: 'Your Password is Successfully Changed'
            })</script>";

            }

            else {
        
            echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'We are failed to change Password'
                })</script>";

            }

        }

        else {
      
       echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Field does not match',
            text: 'New Password and Confirm New Password field are not match'
        })</script>";
        }

    }

    else{
       
    echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Field does not match',
            text: 'Current Password is not Correct'
        })</script>";
    }

}

// Change Email Address

if(isset($_POST['changeEmail'])){

    // Removing white spaces
    $newEmail= trim($_POST['newEmail']);
    $Password = trim($_POST['password']);

    $email = $_SESSION['user'];

    //Query
    $sql = "SELECT * FROM user_information WHERE email = :newEmail";
     
    //Preparing Query
    $result= $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":newEmail", $newEmail);

    //Executing Query
    $result->execute();

    // Checking Wether Email Already Present in database or not
    if($result->rowCount() > 0){
       echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Email Already Present in Database',
            text: 'Please Enter New Email Address'
        })</script>";
    }

    else {
      $sql = "SELECT * FROM user_information WHERE email = :email";

      //Preparing Query
      $result= $conn->prepare($sql);

      //Binding Value
      $result->bindValue(":email", $email);

      //Executing Query
      $result->execute();

      //Fetching Values in associative array
      $row = $result->fetch(PDO::FETCH_ASSOC);

      $dbPassword = $row['mainPassword'];

      if(password_verify($Password,$dbPassword)){

         //sql Query
          $sql = "UPDATE user_information INNER JOIN event_information
           ON user_information.email = event_information email SET email = :newEmail
           WHERE user_information.email = :email AND event_information.email = :email";

          //Preparing Query
          $result= $conn->prepare($sql);

          //Binding Values
          $result->bindValue(":newEmail", $newEmail);
          $result->bindValue(":email", $email);
          $result->bindValue(":email", $email);

          //Executing Query
          $result->execute();

           if($result){
            echo "<script>Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: 'Your Email Successfully Changed'
            })</script>";
           }
      }

      else {
          echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Check Your Password to Change your Email please enter valid password '
            })</script>";
      }

    }
}

// Disable Account 

if(isset($_POST['disable'])){

    $email = $_SESSION['user'];

    //sql Query
    $sql = "UPDATE user_information SET status = :inactive WHERE email = :email";

    //Preparing Query
    $result= $conn->prepare($sql);

    //Binding Value
    $result->bindValue(":inactive", "inactive");
    $result->bindValue(":email", $email);

    //Executing Query
    $result->execute();
    
    if($result){
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'sucess',
            text: 'Your Account is successfully Disabled'
            })</script>";
    }
}



?>

    <!-- Navbar PHP -->
    <?php include_once "includes/navbar.php"; ?>


    <main class="container">
        <div class="row">
            <section class="col-md-6 my-5 offset-md-3">

                <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-password-tab" data-toggle="pill" href="#pills-password"
                            role="tab" aria-controls="pills-password" aria-selected="false">Password</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-email-tab" data-toggle="pill" href="#pills-email" role="tab"
                            aria-controls="pills-email" aria-selected="false">Email Address</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-disable-tab" data-toggle="pill" href="#pills-disable" role="tab"
                            aria-controls="pills-disable" aria-selected="false">Disable Account</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-password" role="tabpanel"
                        aria-labelledby="pills-password-tab">

                        <section class="mt-5">
                            <h3 class="text-center font-time font-weight-bold text-uppercase">
                                Change Password
                            </h3>

                            <hr>
                            <form action="" method="post">

                                <div class="form-group">
                                    <label>Enter Current Password</label>
                                    <input type="password" class="form-control" name="currentPassword">
                                </div>

                                <div class="form-group">
                                    <label>Enter New Password</label>
                                    <input type="password" class="form-control" name="newPassword">
                                </div>

                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input type="password" class="form-control" name="conNewPassword">
                                </div>

                                <button type="submit" class="btn btn-danger mt-3 rounded-pill btn-block"
                                    name="changePassword">
                                    Change Password
                                </button>
                            </form>
                        </section>
                    </div>


                    <div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">

                        <section>
                            <h3 class="text-center font-time mt-5">YOUR EMAIL ADDRESS</h3>
                            <h5 class="text-center"><?php echo $_SESSION['user']; ?></h5>


                            <h3 class="font-time mt-5 text-uppercase text-center">Change Email address
                            </h3>

                            <hr>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Enter a new email address</label>
                                    <input type="email" name="newEmail" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Confirm to change email address by entering Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <input type="submit" class="btn btn-danger btn-block rounded-pill" name="changeEmail"
                                    value="Change my email Address">

                            </form>
                        </section>
                    </div>


                    <div class="tab-pane fade" id="pills-disable" role="tabpanel" aria-labelledby="pills-disable-tab">

                        <h3 class="text-center mt-5"><?php echo $_SESSION['user']; ?>, we’re sorry to see you go</h3>

                        <hr />

                        <p>Disabling your account will not remove your all data, It just temporary disable you account
                            disabling your account can be undone.</p>

                        <p> There is way to restore your account go to activate account Page of GIT SHODH 2K20</p>

                        <form action="" method="post">

                            <div class="form-group">
                                <input type="submit" value="Disable Your Account" name="disable"
                                    class="btn btn-danger btn-block rounded-pill mt-3">
                            </div>
                        </form>

                    </div>

                </div>

            </section>
        </div>
    </main>

    <!-- Footer PHP -->
    <?php include_once "includes/footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

     <?php
    // closing Database Connnection
     $conn = null;
     ?>

</body>

</html>