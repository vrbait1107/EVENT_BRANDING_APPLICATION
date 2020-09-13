$(document).ready(function () {
  // -------------------------->> CHANGE PASSWORD

  $("#changePassword").click(function (e) {
    e.preventDefault();
    let changePassword = "changePassword";
    let newPassword = $("#newPassword").val();
    let conNewPassword = $("#conNewPassword").val();
    let currentPassword = $("#currentPassword").val();

    if (currentPassword === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Current Password Cannot be Empty",
      });
      return false;
    }

    if (newPassword === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "New Password Cannot be Empty",
      });
      return false;
    }

    if (conNewPassword === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Confirm Password Cannot be Empty",
      });
      return false;
    }

    if (newPassword.length < 8) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password length must be atleast 8 Characters",
      });
      return false;
    }

    if (!/[a-z]/g.test(newPassword)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password must contain at least one Lowercase Letter (a-z)",
      });
      return false;
    }

    if (!/[A-Z]/g.test(newPassword)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password must contain at least one Uppercase Letter (A-Z).",
      });
      return false;
    }

    if (!/\d/g.test(newPassword)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password must contain at least one number (0-9)",
      });
      return false;
    }

    if (!/[-!$%^&*()_+|~=`{}[:;<>?,.@#\]]/g.test(newPassword)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text:
          "Password must contain at least one Special Character. ([-!$%^&*()_+|~=`{}[:;<>?,.@#])",
      });
      return false;
    }

    if (newPassword !== conNewPassword) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password & Confirm Password field don't matching",
      });
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxUserAccount.php",
      type: "post",
      data: {
        changePassword: changePassword,
        newPassword: newPassword,
        conNewPassword: conNewPassword,
        currentPassword: currentPassword,
      },
      beforeSend() {
        $("#changeEmailResponse").html("Your Request is Processing");
      },
      success(data) {
        $("#changePasswordResponse").html(data);
        $("form").trigger("reset");
      },
      error() {
        $("#changePasswordResponse").html("Something Went Wrong");
      },
    });
  });

  //---------------------------------------->> CHANGE EMAIL

  $("#changeEmail").click(function (e) {
    e.preventDefault();
    let changeEmail = "changeEmail";
    let newEmail = $("#newEmail").val();
    let password = $("#password").val();

    if (newEmail === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "New Email Cannot be Empty",
      });
      return false;
    }

    if (password === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Password Cannot be Empty",
      });
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxUserAccount.php",
      type: "post",
      data: {
        changeEmail: changeEmail,
        newEmail: newEmail,
        password: password,
      },
      beforeSend() {
        $("#changeEmailResponse").html("Your Request is Processing");
      },
      success(data) {
        $("#changeEmailResponse").html(data);
        $("form").trigger("reset");
      },
      error() {
        $("#changeEmailResponse").html("Something Went Wrong");
      },
    });
  });

  // --------------------------------->> DISABLE ACCOUNT

  $("#disableAccount").click(function () {
    let disableAccount = "disableAccount";

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Disable My Account!",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "ajaxHandlerPHP/ajaxUserAccount.php",
          type: "post",
          data: {
            disableAccount: disableAccount,
          },
          beforeSend() {
            $("#disableAccountResponse").html("Your Request Processing");
          },
          success(data) {
            $("#disableAccountResponse").html(data);
            $("form").trigger("reset");
          },
          error() {
            $("#disableAccountResponse").html("Something Went Wrong");
          },
        });
      }
    });
  });
});
