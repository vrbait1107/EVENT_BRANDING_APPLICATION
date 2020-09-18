<?php

//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

//------------------------------>> START SESSION
session_start();

//------------------------------>> CHECKING USER
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $techfestName ?> | USER ACCOUNT</title>

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>

    <style>
        body footer {
            position: static;
        }
    </style>

</head>


<body>

    <!-- Include User Navbar-->
    <?php include_once "includes/navbar.php";?>


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

                    <!-- CHANGE PASSWORD -->

                    <div class="tab-pane fade show active" id="pills-password" role="tabpanel"
                        aria-labelledby="pills-password-tab">

                        <section class="mt-5">
                            <h3 class="text-center font-time font-weight-bold text-uppercase">
                                Change Password
                            </h3>

                            <hr>

                            <form action="" method="post">

                                <div id="changePasswordResponse"></div>

                                <div class="form-group">
                                    <label>Enter Current Password</label>
                                    <input type="password" class="form-control" name="currentPassword"
                                        id="currentPassword">
                                </div>

                                <div class="form-group">
                                    <label>Enter New Password</label>
                                    <input type="password" class="form-control" name="newPassword" id="newPassword">
                                     <small class="text-danger">Password should Contain atleast 8 Character, Minimum
                                            one uppercase letter,
                                            Minimum one lowercase letter,
                                            Minimum one number, Minimum one special character. </small>
                                </div>

                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input type="password" class="form-control" name="conNewPassword"
                                        id="conNewPassword">
                                </div>

                                <button type="submit" class="btn btn-danger mt-3 rounded-pill btn-block"
                                    name="changePassword" id="changePassword">
                                    Change Password
                                </button>

                            </form>
                        </section>
                    </div>

                    <!-- CHANGE EMAIL -->

                    <div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">

                        <section>
                            <h3 class="text-center font-time mt-5">YOUR EMAIL ADDRESS</h3>
                            <h5 class="text-center"><?php echo $_SESSION['user']; ?></h5>


                            <h3 class="font-time mt-5 text-uppercase text-center">Change Email address
                            </h3>

                            <hr>

                            <form action="" method="post">

                                <div id="changeEmailResponse"></div>

                                <div class="form-group">
                                    <label>Enter a new email address</label>
                                    <input type="email" name="newEmail" id="newEmail" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Confirm to change email address by entering Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <input type="submit" class="btn btn-danger btn-block rounded-pill" name="changeEmail"
                                    id="changeEmail" value="Change my email Address">

                            </form>
                        </section>
                    </div>

                    <!-- DISABLE ACCOUNT -->

                    <div class="tab-pane fade" id="pills-disable" role="tabpanel" aria-labelledby="pills-disable-tab">

                        <h3 class="text-center mt-5"><?php echo $_SESSION['user']; ?>, we’re sorry to see you go</h3>

                        <hr />

                        <p>Disabling your account will not remove your all data, It just temporary disable you account
                            disabling your account can be undone.</p>

                        <p> There is way to restore your account go to login Page of GIT SHODH 2K20 & Click on Activate
                            my disable account link</p>

                        <form>
                            <div id="disableAccountResponse"></div>

                            <div class="form-group">
                                <input type="button" value="Disable Your Account" name="disableAccount"
                                    id="disableAccount" class="btn btn-danger btn-block rounded-pill mt-3">
                            </div>
                        </form>

                    </div>

                </div>

            </section>
        </div>
    </main>

    <!-- Include Footer & Footer Scripts PHP -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

    <!-- Javascript -->
    <script src="js/userAccount.js"></script>

    <!-- Close DB Connection -->
    <?php $conn = null;?>

</body>

</html>