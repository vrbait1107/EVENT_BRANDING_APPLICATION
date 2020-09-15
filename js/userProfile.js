$(document).ready(function () {
  //---------------------------------->> READ OPERATION
  const getProfileDetails = () => {
    let getProfileData = "getProfileData";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxUserProfile.php",
      type: "post",
      data: {
        getProfileData: getProfileData,
      },
      success(data) {
        let profile = JSON.parse(data);
        $("#showProfileImage").attr(
          "src",
          `images/profileImage/${profile.profileImage}`
        );
        $("#updateFirstName").val(profile.firstName);
        $("#updateLastName").val(profile.lastName);
        $("#updateMobileNumber").val(profile.mobileNumber);
        $("#updateCollegeName").val(profile.collegeName);
        $("#updateDepartmentName").val(profile.departmentName);
        $("#updateAcademicYear").val(profile.academicYear);
        $("#hiddenEmail").val(profile.email);
        $("#hiddenEmail2").val(profile.email);
        $("#hiddenImageName").val(profile.profileImage);
      },
    });
  };

  getProfileDetails();

  //---------------------------------->> UPDATE OPERATION

  $("#userProfileForm").on("submit", function (event) {
    event.preventDefault();

    let updateFirstName = $("#updateFirstName").val();
    let updateLastName = $("#updateLastName").val();
    let updateMobileNumber = $("#updateMobileNumber").val();
    let updateCollegeName = $("#updateCollegeName").val();
    let updateDepartmentName = $("#updateDepartmentName").val();
    let updateAcademicYear = $("#updateAcademicYear").val();
    let hiddenEmail = $("#hiddenEmail").val();

    if (!isNaN(updateFirstName) || updateFirstName === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Only Characters are allowed or first name cannot be empty",
      });
      return false;
    }

    if (!isNaN(updateLastName) || updateLastName === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Only Characters are allowed or Last Name cannot be empty",
      });
      return false;
    }

    if (updateMobileNumber === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Mobile Number cannot be empty",
      });
      return false;
    }

    if (!isNaN(updateCollegeName) || updateCollegeName === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Only Characters are allowed or College Name cannot be empty",
      });
      return false;
    }

    if (!isNaN(updateDepartmentName) || updateDepartmentName === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Only Characters are allowed or Department Name cannot be empty",
      });
      return false;
    }

    if (!isNaN(updateAcademicYear) || updateAcademicYear === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Only Characters are allowed or Academic Year cannot be empty",
      });
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxUserProfile.php",
      type: "post",
      data: {
        updateFirstName: updateFirstName,
        updateLastName: updateLastName,
        updateMobileNumber: updateMobileNumber,
        updateCollegeName: updateCollegeName,
        updateDepartmentName: updateDepartmentName,
        updateAcademicYear: updateAcademicYear,
        hiddenEmail: hiddenEmail,
      },
      success(data) {
        $("#updateResponse").html(data);
        getProfileDetails();
      },
    });
  });

  // ----------------------->>  CHANGE PROFILE IMAGE

  $("#changeProfileImageForm").on("submit", function (event) {
    event.preventDefault();

    let imageName = $("updateProfileImage").val();

    $.ajax({
      url: "ajaxHandlerPHP/ajaxUserProfile.php",
      type: "post",
      data: new FormData(this),
      contentType: false,
      processData: false,

      beforeSend() {
        $("#updateResponse").html("Image uploading....");
      },
      success(data) {
        $("#updateResponse").html(data);
        getProfileDetails();
      },
    });
  });
});
