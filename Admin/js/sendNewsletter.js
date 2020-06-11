$(document).ready(function () {
  $("#sendNewsletterForm").on("submit", function (e) {
    e.preventDefault();

    if ($("#newsletterSubject").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please fill Proper Subject",
      });
      return false;
    }

    if ($("#targetDepartment").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please fill Proper Message",
      });
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxSendNewsletter.php",
      type: "post",
      data: new FormData(this),
      contentType: false,
      processData: false,
      beforeSend() {
        $("#responseMessage").html("<h5>Sending Emails....</h5>");
      },
      success(data) {
        $("#responseMessage").html(data);
        $("#sendNewsletterForm").trigger("reset");
        $("#sendNewsletterForm").trigger("reset");
        grecaptcha.reset();
      },
      error() {
        $("#responseMessage").html("Something Went Wrong");
      },
    });
  });
});
