$(document).ready(function () {
  $("#userRegisterForm").on("submit", function (e) {

    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();
    let email = $("#email").val();
    let collegeName = $("#collegeName").val();
    let department = $("#department").val();
    let year = $("#year").val();
    let mobileNumber = $("#mobileNumber").val();
    let password = $("#password").val();
    let confirmPassword = $("#confirmPassword").val();

    if (!isNaN(firstName) || firstName === "") {
      return swalError("Please Provide Proper First Name.");
    }

    if (!isNaN(lastName) || lastName === "") {
      return swalError("Please Provide Proper Last Name.");
    }

    if (email === "") {
      return swalError("Please Provide Proper Email.");
    }

    if (!isNaN(collegeName) || collegeName === "") {
      return swalError("Please Provide Proper College Name.");
    }

    if (!isNaN(department) || department === "") {
      return swalError("Please Provide Proper Department Name.");
    }

    if (!isNaN(year) || year === "") {
      return swalError("Please Provide Proper Academic Year.");
    }

    if (isNaN(mobileNumber) === "") {
      return swalError("Please Provide Proper Valid Mobile Number");
    }

    if (mobileNumber.length !== 10) {
      return swalError("Please Provide Proper Valid Mobile Number");
    }

    if (password.length < 8) {
      return swalError("Password length must be atleast 8 Characters.");
    }

    if (!/[a-z]/g.test(password)) {
      return swalError("Password must contain at least one Lowercase Letter (a-z).");
    }

    if (!/[A-Z]/g.test(password)) {
      return swalError("Password must contain at least one Uppercase Letter (A-Z).");
    }

    if (!/\d/g.test(password)) {
      return swalError("Password must contain at least one number (0-9).");
    }

    if (!/[-!$%^&*()_+|~=`{}[:;<>?,.@#\]]/g.test(password)) {
      return swalError("Password must contain at least one Special Character. ([-!$%^&*()_+|~=`{}[:;<>?,.@#]).");
    }

    if (password !== confirmPassword) {
      return swalError("Password & Confirm password field are not Same.");
    }

  });
});


function swalError(message) {
  Swal.fire({
    icon: "error",
    title: "ERROR",
    text: message,
  });
  return false;
}
