$(document).ready(function () {
  $("#changePasswordForm").on("submit", function () {
    let password = $("#password").val();
    let confirmPassword = $("#confirmPassword").val();

    if (password === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Password Cannot Be Empty",
      });
      return false;
    }

    if (password.length < 8) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password length must be atleast 8 Characters",
      });
      return false;
    }

    if (!/[a-z]/g.test(password)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password must contain at least one Lowercase Letter (a-z)",
      });
      return false;
    }

    if (!/[A-Z]/g.test(password)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password must contain at least one Uppercase Letter (A-Z).",
      });
      return false;
    }

    if (!/\d/g.test(password)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password must contain at least one number (0-9)",
      });
      return false;
    }

    if (!/[-!$%^&*()_+|~=`{}[:;<>?,.@#\]]/g.test(password)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text:
          "Password must contain at least one Special Character. ([-!$%^&*()_+|~=`{}[:;<>?,.@#])",
      });
      return false;
    }

    if (password !== confirmPassword) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password & Confirm Password field don't matching",
      });
      return false;
    }
  });
});
