$(document).ready(function () {
  $("#sendMailForm").on("submit", function (e) {
    e.preventDefault();

    if ($("#targetAudience").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Proper Target Audience",
      });
      return false;
    }

    if ($("#targetDepartment").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Proper Target Department",
      });
      return false;
    }

    if ($("#targetEvent").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Proper Target Event",
      });
      return false;
    }

    if ($("#subject").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Proper Target Subject",
      });
      return false;
    }

    if ($("#messagge").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Proper Target Message",
      });
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxSendMails.php",
      type: "post",
      data: new FormData(this),
      contentType: false,
      processData: false,
      beforeSend() {
        $("#responseMessage").html("<h5>Sending Emails....</h5>");
      },
      success(data) {
        $("#responseMessage").html(data);
        $("#sendMailForm").trigger("reset");
        $("#sendMailForm").trigger("reset");
        grecaptcha.reset();
      },
      error() {
        $("#responseMessage").html("Something Went Wrong");
      },
    });
  });
});
