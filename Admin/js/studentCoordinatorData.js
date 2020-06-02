let readrecordParticipant;

$(document).ready(function () {
  // ##############  Reading Record
  readrecordParticipant = () => {
    let readRecord = "readRecord";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxStudentCoordinatorData.php",
      type: "post",
      data: {
        readRecord: readRecord,
      },
      success: function (data) {
        $("#responseParticipantData").html(data);
        $("#dataTable").DataTable({
          destroy: true, //use for reinitialize datatable
        });
      },
      error: function () {
        $("#responseMessage").fadeIn().html("Something Went Wrong");
      },
    });
  };

  readrecordParticipant();
});

//################ Delete Participant Data
const deleteParticipantDetails = (id) => {
  let deleteCertificateId = id;

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
        url: "ajaxHandlerPHP/ajaxStudentCoordinatorData.php",
        type: "post",
        data: {
          deleteCertificateId: deleteCertificateId,
        },
        success: function (data) {
          $("#deleteResponse").html(data);
          $("#dataTable").DataTable({
            destroy: true, //use for reinitialize datatable
          });
          readrecordParticipant();
        },
        error: function () {
          $("#responseMessage").fadeIn().html("Something Went Wrong");
        },
      });
    }
  });
};

//################## Retrieve Participant Data in the Form
const getParticipantDetails = (id) => {
  let getCertificateId = id;

  $.ajax({
    url: "ajaxHandlerPHP/ajaxStudentCoordinatorData.php",
    type: "post",
    data: {
      getCertificateId: getCertificateId,
    },
    success: function (data) {
      let user = JSON.parse(data);
      $("#updateFirstName").val(user.firstName);
      $("#updateLastName").val(user.lastName);
      $("#updatePrize").val(user.prize);
      $("#updateAttendStatus").val(user.attendStatus);
      $("#hiddenCertificateId").val(user.certificateId);
    },
    error: function () {
      $("#responseMessage").fadeIn().html("Something Went Wrong");
    },
  });

  $("#updateModal").modal("show");
};

//############### Update Participant Data
const updateParticipantDetails = () => {
  let hiddenCertificateId = $("#hiddenCertificateId").val();
  let updateFirstName = $("#updateFirstName").val();
  let updateLastName = $("#updateLastName").val();
  let updatePrize = $("#updatePrize").val();
  let updateAttendStatus = $("#updateAttendStatus").val();

  $.ajax({
    url: "ajaxHandlerPHP/ajaxStudentCoordinatorData.php",
    type: "post",
    data: {
      hiddenCertificateId: hiddenCertificateId,
      updateFirstName: updateFirstName,
      updateLastName: updateLastName,
      updatePrize: updatePrize,
      updateAttendStatus: updateAttendStatus,
    },
    success: function (data) {
      $("#updateResponse").html(data);
      $("#dataTable").DataTable({
        destroy: true, //use for reinitialize datatable
      });
      readrecordParticipant();
    },
    error: function () {
      $("#responseMessage").fadeIn().html("Something Went Wrong");
    },
  });
};