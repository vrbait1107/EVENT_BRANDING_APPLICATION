<?php

// Creating Database Connection
require_once "../configPDO.php";
// Starting Session
session_start();
// Extracting Post data
extract($_POST);

// ############## Retrive user profile data into form

if (isset($_POST["getProfileData"])) {

    $email = $_SESSION['user'];

    $sql = "SELECT * FROM user_information WHERE email = :email";

// Preparing Query
    $result = $conn->prepare($sql);

//Binding Value
    $result->bindValue(":email", $email);

//Executing Value
    $result->execute();

//Fetching Value
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $response = json_encode($row);

    echo $response;

}

extract($_FILES);

// ################## Change Profile Image

if (isset($_FILES['updateProfileImage'])) {

    $updateProfileImage = $_FILES['updateProfileImage'];
    $updateProfileImageName = $_FILES['updateProfileImage']['name'];
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

            move_uploaded_file($updateProfileImageTmpDir, "C:/xampp2/htdocs/EBA/profileImage/" . $updateProfileImageName);

            //  Query
            $sql = "UPDATE user_information SET profileImage = :updateProfileImageName WHERE email = :hiddenEmail2";
            // Preparing Query
            $result = $conn->prepare($sql);
            // Binding Values
            $result->bindValue(":updateProfileImageName", $updateProfileImageName);
            $result->bindValue(":hiddenEmail2", $hiddenEmail2);

            $result->execute();

            if ($result) {
                echo "<script>Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: 'Your Profile Image Successfully Changed'
            })</script>";

                $file = "C:/xampp2/htdocs/EBA/profileImage/" . $hiddenImageName;
                unlink($file);

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

// ################### Update User Profile Data

if (isset($_POST["hiddenEmail"])) {

    //Query
    $sql = "UPDATE user_information SET firstName = :updateFirstName, lastName = :updateLastName,
    mobileNumber = :updateMobileNumber, collegeName = :updateCollegeName, departmentName = :updateDepartmentName,
    academicYear = :updateAcademicYear WHERE email = :hiddenEmail";

    // Preparing query
    $result = $conn->prepare($sql);

    //Binding Values
    $result->bindValue(":updateFirstName", $updateFirstName);
    $result->bindValue(":updateLastName", $updateLastName);
    $result->bindValue(":updateMobileNumber", $updateMobileNumber);
    $result->bindValue(":updateCollegeName", $updateCollegeName);
    $result->bindValue(":updateDepartmentName", $updateDepartmentName);
    $result->bindValue(":updateAcademicYear", $updateAcademicYear);
    $result->bindValue(":hiddenEmail", $hiddenEmail);

    //Executing query
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

// closing Database Connnection
$conn = null;
