let readRecordFeedback;

$(document).ready(function () {
  readRecordFeedback = () => {
    let readRecord = "readRecord";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageFeedback.php",
      type: "post",
      data: {
        readRecord: readRecord,
      },
      success(data) {
        $("#readRecordFeedback").html(data);
        $("#dataTable").DataTable({
          dom: "Bfrtip",
          buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
          destroy: true, //use for reinitialize datatable
        });
      },
      error(err) {
        $("#readRecordFeedback").html("Something Went Wrong");
      },
    });
  };

  readRecordFeedback();
});

// --------------------->>  DELETE FEEDBACK INFORMATION

const deleteFeedbackInformation = (email) => {
  let deleteEmail = email;

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "ajaxHandlerPHP/ajaxManageFeedback.php",
        type: "post",
        data: {
          deleteEmail: deleteEmail,
        },
        success(data) {
          $("#deleteResponse").html(data);
          $("#dataTable").DataTable({
            destroy: true, //use for reinitialize datatable
          });
          readRecordFeedback();
        },
        error() {
          $("#deleteResponse").html("Something Went Wrong");
        },
      });
    }
  });
};

const viewFeedbackInformation = (email) => {
  let viewEmail = email;

  $.ajax({
    url: "ajaxHandlerPHP/ajaxManageFeedback.php",
    type: "post",
    data: {
      viewEmail: viewEmail,
    },
    success(data) {
      let feedback = JSON.parse(data);

      $("#responseQ1").html("Feedback Answer =>" + feedback.attendBefore);
      $("#responseQ2").html("Feedback Answer =>" + feedback.likelyAttend);
      $("#responseQ3").html(
        "Feedback Answer =>" + feedback.likelyRecommendFriend
      );
      $("#responseQ4").html("Feedback Answer =>" + feedback.likeMost);
      $("#responseQ5").html("Feedback Answer =>" + feedback.likeLeast);
      $("#responseQ61").html("Feedback Answer =>" + feedback.overall);
      $("#responseQ62").html("Feedback Answer =>" + feedback.location);
      $("#responseQ63").html("Feedback Answer =>" + feedback.events);
      $("#responseQ64").html("Feedback Answer =>" + feedback.coordinators);
      $("#responseQ65").html("Feedback Answer =>" + feedback.eventsPrice);
      $("#responseQ7").html(feedback.suggestion);
      $("#responseDate").html(feedback.feedbackDate);
    },
  });
  $("#feedbackModal").modal("show");
};
