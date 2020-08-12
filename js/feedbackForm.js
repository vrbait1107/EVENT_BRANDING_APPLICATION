$(document).ready(function () {
  $("#feedbackForm").on("submit", function (e) {
    e.preventDefault();

    if ($("input[type=radio][name=attendBefore]:checked").length == 0) {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Atleast One Option for Question 1",
      });
      return false;
    }

    if ($("input[type=radio][name=likelyAttend]:checked").length == 0) {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Atleast One Option for Question 2",
      });
      return false;
    }

    if (
      $("input[type=radio][name=likelyRecommendFriend]:checked").length == 0
    ) {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Atleast One Option for Question 3",
      });
      return false;
    }

    if ($("#likeMost").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please fill Question 4 answer",
      });
      return false;
    }

    if ($("#likeLeast").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please fill Question 5 answer",
      });
      return false;
    }

    if ($("input[type=radio][name=location]:checked").length == 0) {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Atleast One Option for Question 6 Parameter 1",
      });
      return false;
    }

    if ($("input[type=radio][name=events]:checked").length == 0) {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Atleast One Option for Question 6 Parameter 2",
      });
      return false;
    }

    if ($("input[type=radio][name=coordinators]:checked").length == 0) {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Atleast One Option for Question 6 Parameter 3",
      });
      return false;
    }

    if ($("input[type=radio][name=eventsPrice]:checked").length == 0) {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Atleast One Option for Question 6 Parameter 4",
      });
      return false;
    }

    if ($("#suggestion").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please fill Question 7 answer",
      });
      return false;
    }

    let attendBefore = $("#attendBefore").val();
    let likelyAttend = $("#likelyAttend").val();
    let likelyRecommendFriend = $("#likelyRecommendFriend").val();
    let likeMost = $("#likeMost").val();
    let likeLeast = $("#likeLeast").val();
    let location = $("#location").val();
    let events = $("#events").val();
    let coordinators = $("#coordinators").val();
    let eventsPrice = $("#eventsPrice").val();
    let suggestion = $("#suggestion").val();
    let submit = "submit";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxFeedbackForm.php",
      type: "post",
      data: {
        submit: submit,
        attendBefore: attendBefore,
        likelyAttend: likelyAttend,
        likelyRecommendFriend: likelyRecommendFriend,
        likeMost: likeMost,
        likeLeast: likeLeast,
        location: location,
        events: events,
        coordinators: coordinators,
        eventsPrice: eventsPrice,
        suggestion: suggestion,
        captcha: grecaptcha.getResponse(),
      },
      beforeSend() {
        $("#responseMessage").html(
          "<h5 class='text-center text-danger'>Submitting Form</h5>"
        );
      },
      success(data) {
        $("#responseMessage").html(data);
        $("#feedbackForm").trigger("reset");
        grecaptcha.reset();
      },
      error() {
        $("#responseMessage").html("Something Went Wrong");
      },
    });
  });
});
