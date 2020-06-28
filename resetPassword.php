    <?php

// Creating Connection to Database
require_once "configPDO.php";

// Staring Session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php";?>

</head>

<body>

    <?php

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    if (isset($_POST['resetPassword'])) {

        // triming the white spaces
        $userType = trim($_POST['userType']);
        $newPassword = trim($_POST['newPassword']);
        $confirmNewPassword = trim($_POST['confirmNewPassword']);

        if ($newPassword === $confirmNewPassword) {
            $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $confirmNewPassword = password_hash($confirmNewPassword, PASSWORD_BCRYPT);

            if ($userType == "User") {

                // SQL Query
                $sql = "UPDATE user_information SET password= :newPassword WHERE token = :token";

                // Preparing Query
                $result = $conn->prepare($sql);

                // Binding Value
                $result->bindValue(":newPassword", $newPassword);
                $result->bindValue(":token", $token);

                //Executing Query
                $result->execute();

                if ($result) {
                    echo "<script>Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: 'Your Password Reset Successful, Please Login to Continue'
            })</script>";
                }

            } else {

                // SQL Query
                $sql = "UPDATE admin_information SET adminPassword= :newPassword WHERE token = :token";

                //Preparing Query
                $result = $conn->query($sql);

                //Binding Value
                $result->bindValue(":newPassword", $newPassword);
                $result->bindValue(":token", $token);

                //Executing Query
                $result->execute();

                if ($result) {
                    echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Your Password Reset Successful, Please Login to Continue'
            })</script>";

                }

            }

        } else {
            echo "<script>Swal.fire({
                icon: 'warning',
                title: '',
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
                        <form action="" method="post">

                            <div class="form-group">
                                <label>User Type</label>
                                <select class="form-control" name="userType">
                                    <option value="User">Normal User</option>
                                    <option value="Administrator">Administrator</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Enter New Password</label>
                                <input type="password" class="form-control" name="newPassword">
                            </div>

                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" class="form-control" name="confirmNewPassword">
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

    <!-- Footer PHP -->
    <?php include_once "includes/footer.php";?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php";?>

     <?php
// closing Database Connnection
$conn = null;
?>

</body>

</html>