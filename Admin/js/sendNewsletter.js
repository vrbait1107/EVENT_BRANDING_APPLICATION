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

    let dataValue = new FormData(this);

    dataValue.append(
      "newsletterMessage",
      CKEDITOR.instances["newsletterMessage"].getData()
    );

    $.ajax({
      url: "ajaxHandlerPHP/ajaxSendNewsletter.php",
      type: "post",
      data: dataValue,
      contentType: false,
      processData: false,
      beforeSend() {
        $("#responseMessage").html("<h5>Sending Emails....</h5>");
      },
      success(data) {
        $("#responseMessage").html(data);
        grecaptcha.reset();
        $("#sendNewsletterForm").trigger("reset");
        CKEDITOR.instances["newsletterMessage"].setData(null);
      },
      error() {
        $("#responseMessage").html("Something Went Wrong");
      },
    });
  });
});
