$(document).ready(function () {
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
          `profileImage/${profile.profileImage}`
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

  $("#userProfileForm").on("submit", function (event) {
    event.preventDefault();
    let updateFirstName = $("#updateFirstName").val();
    let updateLastName = $("#updateLastName").val();
    let updateMobileNumber = $("#updateMobileNumber").val();
    let updateCollegeName = $("#updateCollegeName").val();
    let updateDepartmentName = $("#updateDepartmentName").val();
    let updateAcademicYear = $("#updateAcademicYear").val();
    let hiddenEmail = $("#hiddenEmail").val();

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

  // ############# Change Profile Image
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
