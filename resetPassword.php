    <?php

//------------------------------>> DB CONFIG
require_once "config/configPDO.php";

// ------------------------>> START CONNECTION
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIT SHODH 2K20 | RESET PASSOWRD</title>

    <!-- Include Header Scripts -->
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>

    <?php

if (isset($_GET['token'])) {

    $token = htmlspecialchars($_GET['token']);

    if (isset($_POST['resetPassword'])) {

        // Avoid XSS Attack
        $userType = htmlspecialchars($_POST['userType']);
        $newPassword = htmlspecialchars($_POST['newPassword']);
        $confirmNewPassword = htmlspecialchars($_POST['confirmNewPassword']);

        if ($newPassword === $confirmNewPassword) {
            $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $confirmNewPassword = password_hash($confirmNewPassword, PASSWORD_BCRYPT);

            //---------------------------------------->> USER TYPE = USER

            if ($userType == "User") {

                // Sql Query
                $sql1 = "SELECT * FROM user_information WHERE token = :token";

                // Preparing Query
                $result1 = $conn->prepare($sql1);

                // Binding Value
                $result1->bindValue(":token", $token);

                // Executing Query
                $result1->execute();

                // Fetch Data from Database
                $row1 = $result1->fetch(PDO::FETCH_ASSOC);

                $dbtokenDate = strtotime($row1['tokenDate']);

                $currentDatetime = date("Y-m-d H:i:s");

                $currentDatetimeMain = strtotime($currentDatetime);

                if ($dbtokenDate >= $currentDatetimeMain) {

                    $sql = "UPDATE user_information SET password = :newPassword WHERE token = :token";

                    $result = $conn->prepare($sql);

                    $result->bindValue(":newPassword", $newPassword);
                    $result->bindValue(":token", $token);

                    $result->execute();

                    if ($result) {
                        echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'Your Password Reset Successful, Please Login to Continue'
                        })</script>";

                    } else {
                        echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something Went Wrong'
                        })</script>";
                    }

                } else {
                    echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Token Time Expired',
                        text: 'Please Request Again'
                    })</script>";

                }

                //---------------------------------------->> USER TYPE = ADMIN

            } else {

                // Sql Query
                $sql3 = "SELECT * FROM admin_information WHERE token = :token";

                //Preparing Query
                $result3 = $conn->prepare($sql3);

                //Binding Values
                $result3->bindValue(":token", $token);

                //Executing Query
                $result3->execute();

                $row2 = $result3->fetch(PDO::FETCH_ASSOC);

                $dbtokenDate = strtotime($row2['tokenDate']);

                $currentDatetime = date("Y-m-d H:i:s");

                $currentDatetimeMain = strtotime($currentDatetime);

                if ($dbtokenDate >= $currentDatetimeMain) {

                    // SQL Query
                    $sql4 = "UPDATE admin_information SET adminPassword= :newPassword WHERE token = :token";

                    //Preparing Query
                    $result4 = $conn->query($sql4);

                    //Binding Value
                    $result4->bindValue(":newPassword", $newPassword);
                    $result4->bindValue(":token", $token);

                    //Executing Query
                    $result4->execute();

                    if ($result4) {
                        echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'Your Password Reset Successful, Please Login to Continue'
                    })</script>";

                    } else {
                        echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something Went Wrong'
                        })</script>";
                    }

                } else {echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Token Time Expired',
                        text: 'Please Request Again'
                    })</script>";
                }

            }

        } else {

            echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'New Password and Confirm Password are not same'
            })</script>";
        }

    }

}

?>


    <main class="container">
        <div class="row">
            <section class="col-md-6 my-5 offset-md-3">
                <div class="card shadow p-5">
                    <h3 class="text-center font-time text-uppercase">
                        Reset Password
                    </h3>
                    <hr>

                    <div class="card-body">
                        <form action="" method="post" id="resetPasswordForm">

                            <div class="form-group">
                                <label>User Type</label>
                                <select class="form-control" name="userType" id="userType">
                                    <option value="User">Normal User</option>
                                    <option value="Administrator">Administrator</option>
                                </select>
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
                                <input type="password" class="form-control" name="confirmNewPassword" id="confirmNewPassword">
                            </div>

                            <button type="submit" class="btn btn-danger mt-3 rounded-pill btn-block"
                                name="resetPassword">
                                Reset Password
                            </button>

                            <h6 class="font-sans mt-3">Go to <a href="login.php">login</a> page</h6>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Include Footer & Footer Scripts -->
    <?php
include_once "includes/footer.php";
include_once "includes/footerScripts.php";
?>

    <!-- Close Database Connection -->
     <?php $conn = null;?>

</body>

</html>