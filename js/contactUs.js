$(document).ready(function () {
  $("#contactForm").on("submit", function (e) {
    e.preventDefault();

    let name = $("#name").val();
    let email = $("#email").val();
    let subject = $("#subject").val();
    let message = $("#message").val();
    let submit = "submit";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxContactUs.php",
      type: "post",
      data: {
        submit: submit,
        name: name,
        email: email,
        subject: subject,
        message: message,
        captcha: grecaptcha.getResponse(),
      },
      beforeSend() {
        $("#responseMessage").html(
          "<h5 class='text-center animated heartBeat infinite text-danger my-3'>Sending Email....</h5>"
        );
      },
      success(data) {
        $("#responseMessage").html(data);
        $("#contactForm").trigger("reset");
        grecaptcha.reset();
      },
      error() {
        $("#responseMessage").html("Something Went Wrong");
      },
    });
  });
});
