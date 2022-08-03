// --------------------------------------->> LOADER
window.onload = () => {
  document.getElementById("loader").style.display = "none";
};

// ---------------------------------------->> CANCEL NOTICE

setTimeout(function () {
  Swal.fire({
    title: "<strong>CANCELLATION NOTICE</strong>",
    icon: "info",
    width: 800,
    padding: "2em",
    html:
      '<p class="text-justify">Due to the unfortunate outbreak of COVID-19 in India, the administration of GIT, Lavel has decided to cancel this edition of the techfest as a precautionary measure according to Goverment of India  guidelines for the safety of participants.</p> <br/>' +
      '<h3 class ="font-time">Thank you for showing interest in GIT SHODH 2K20. <br> Hope to see you at GIT SHODH 2K21 </h3> <br> <h3 class="text-danger font-time"> Stay Safe, Stay Home</h3>',
  });
}, 3000);

// ---------------------------------------->> AJAX REQUEST

$(document).ready(function () {
  $("#submit").click(function () {
    let email = $("#email").val();
    $.ajax({
      url: "ajaxHandlerPHP/ajaxIndex.php",
      type: "post",
      data: {
        email,
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
