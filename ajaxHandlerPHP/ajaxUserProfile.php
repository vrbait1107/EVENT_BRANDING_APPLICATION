<?php

// --------------------------->> DB CONFIG
require_once "../config/configPDO.php";

// ---------------------->> START SESSION
session_start();

// ---------------------->> EXTRACT POST DATA
extract($_POST);

// ------------------------------>> CHECKING USER

if (!isset($_SESSION['user'])):
    header("location:../login.php");
endif;

try {

// ---------------------->> EDIT OPERATION

    if (isset($_POST["getProfileData"])) {

        $email = $_SESSION['user'];

        $sql = "SELECT * FROM user_information WHERE email = :email";

        # Preparing Query
        $result = $conn->prepare($sql);

        # Binding Value
        $result->bindValue(":email", $email);

        # Executing Value
        $result->execute();

        # Fetching Value
        $row = $result->fetch(PDO::FETCH_ASSOC);

        $response = json_encode($row);

        echo $response;

    }

    extract($_FILES);

// ---------------------->> CHANGE PROFILE IMAGE

    if (isset($_FILES['updateProfileImage'])) {

        $updateProfileImage = $_FILES['updateProfileImage'];
        $updateProfileImageName = htmlspecialchars($_FILES['updateProfileImage']['name']);
        $updateProfileImageSize = $_FILES['updateProfileImage']['size'];
        $updateProfileImageTmpDir = $_FILES['updateProfileImage']['tmp_name'];

        if ($updateProfileImageName == "") {
            echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Please Select Image',
            text: 'Image cannot be Empty'
            })</script>";

        } else {

            if ($updateProfileImageSize <= 2097152) {

                move_uploaded_file($updateProfileImageTmpDir, "http://localhost/EBA/images/profileImage/" . $updateProfileImageName);

                #  Query
                $sql = "UPDATE user_information SET profileImage = :updateProfileImageName WHERE email = :hiddenEmail2";

                # Preparing Query
                $result = $conn->prepare($sql);

                # Binding Values
                $result->bindValue(":updateProfileImageName", $updateProfileImageName);
                $result->bindValue(":hiddenEmail2", $hiddenEmail2);

                $result->execute();

                if ($result) {
                    echo "<script>Swal.fire({
                            icon: 'success',
                            title: 'Successful',
                            text: 'Your Profile Image Successfully Changed'
                        })</script>";

                    $file = "http://localhost/EBA/images/profileImage/" . $hiddenImageName;

                    if (file_exists($file)) {
                        unlink($file);
                    }

                } else {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'We are failed to change profile Image'
                    })</script>";
                }

            } else {
                echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Image size exeeded',
                text: 'Please Upload File less than 2MB'
            })</script>";
            }

        }

    }

// ---------------------->> UPDATE OPERATION

    if (isset($_POST["hiddenEmail"])) {

        $email = $_SESSION["user"];

        # Avoid XSS Attack
        $updateFirstName = $_POST["updateFirstName"];
        $updateLastName = $_POST["updateLastName"];
        $updateMobileNumber = $_POST["updateMobileNumber"];
        $updateCollegeName = $_POST["updateCollegeName"];
        $updateDepartmentName = $_POST["updateDepartmentName"];
        $updateAcademicYear = $_POST["updateAcademicYear"];

        if (empty($updateFirstName)) {
            echo '<script>Swal.fire({
					icon: "warning",
					title: "Required",
					text: "First Name field cannot be Empty",
				})</script>';
            return;
        }

        if (is_numeric($updateFirstName)) {
            echo '<script>Swal.fire({
					icon: "warning",
					title: "Required",
					text: "Only Characters allowed in First Name field",
				})</script>';
            return;
        }

        if (empty($updateLastName)) {
            echo '<script>Swal.fire({
					icon: "warning",
					title: "Required",
					text: "Last Name field cannot be Empty",
				})</script>';
            return;
        }

        if (empty($updateLastName)) {
            echo '<script>Swal.fire({
					icon: "warning",
					title: "Required",
					text: "Only Characters allowed in Last Name field",
				})</script>';
            return;
        }

        if (empty($updateCollegeName)) {
            echo '<script>Swal.fire({
				    icon: "warning",
					title: "Required",
					text: "College Name field cannot be Empty",
				})</script>';
            return;
        }

        if (is_numeric($updateCollegeName)):
            echo '<script>Swal.fire({
							icon: "warning",
							title: "Required",
		    				text: "Only Characters allowed in College Name field",
						})</script>';
            return;
        endif;

        if (strlen($updateMobileNumber) !== 10) {
            echo '<script>Swal.fire({
					icon: "warning",
				    title: "Required",
					text: "Mobile Numbers Length Should be 10.",
				})</script>';
            return;
        }

        if (!is_numeric($updateMobileNumber)) {
            echo '<script>Swal.fire({
					icon: "warning",
					title: "Required",
					text: "Only Numbers allowed in Mobile Number field",
				})</script>';
            return;
        }

        if (empty($updateCollegeName)) {
            echo '<script>Swal.fire({
					icon: "warning",
					title: "Required",
					text: "College Name field cannot be Empty",
				})</script>';
            return;
        }

        if (empty($updateAcademicYear)) {
            echo '<script>Swal.fire({
					icon: "warning",
					title: "Required",
					text: "Academic Year field cannot be Empty",
				})</script>';
            return;
        }

        # Avoid XSS Attack
        $updateFirstName = htmlspecialchars($updateFirstName);
        $updateLastName = htmlspecialchars($updateLastName);
        $updateMobileNumber = htmlspecialchars($updateMobileNumber);
        $updateCollegeName = htmlspecialchars($updateCollegeName);
        $updateDepartmentName = htmlspecialchars($updateDepartmentName);
        $updateAcademicYear = htmlspecialchars($updateAcademicYear);

        # Query
        $sql = "UPDATE user_information SET firstName = :updateFirstName, lastName = :updateLastName,
    mobileNumber = :updateMobileNumber, collegeName = :updateCollegeName, departmentName = :updateDepartmentName,
    academicYear = :updateAcademicYear WHERE email = :email";

        # Preparing query
        $result = $conn->prepare($sql);

        # Binding Values
        $result->bindValue(":updateFirstName", $updateFirstName);
        $result->bindValue(":updateLastName", $updateLastName);
        $result->bindValue(":updateMobileNumber", $updateMobileNumber);
        $result->bindValue(":updateCollegeName", $updateCollegeName);
        $result->bindValue(":updateDepartmentName", $updateDepartmentName);
        $result->bindValue(":updateAcademicYear", $updateAcademicYear);
        $result->bindValue(":hiddenEmail", $email);

        # Executing query
        $result->execute();

        if ($result) {
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Your Data is Successfully Updated'
            })</script>";

        } else {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'We are failed to update data'
                })</script>";
        }

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

//---------------------->> CLOSE DB CONNECTION

$conn = null;
