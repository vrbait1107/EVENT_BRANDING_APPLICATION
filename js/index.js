// --------------------------------------->> LOADER
window.onload = () => {
  document.getElementById("loader").style.display = "none";
};

// ---------------------------------------->> AJAX REQUEST

$(document).ready(function () {
  $("#submit").click(function () {
    $.ajax({
      url: "ajaxHandlerPHP/ajaxIndex.php",
      type: "post",
      data: {
        email: 'subscribe',
      },
      success: function (data) {
        $("form").trigger("reset"), $("#responseMessage").fadeIn().html(data);

        setTimeout(() => {
          $("#responseMessage").fadeOut("slow");
        }, 2000);
      },
      error: function () {
        $("form").trigger("reset"),
          $("#responseMessage").fadeIn().html("Something Went Wrong");
      },
    });
  });
});
