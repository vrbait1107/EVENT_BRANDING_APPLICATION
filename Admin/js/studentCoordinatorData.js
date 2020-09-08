let readrecordParticipant;

$(document).ready(function () {
  // ---------------------------->> READ OPERATION
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
        $("#dataTableParticipants").DataTable({
          dom: "Bfrtip",
          buttons: [
            { extend: "copyHtml5" },
            { extend: "excelHtml5" },
            { extend: "csvHtml5" },
            {
              extend: "pdfHtml5",
              title: function () {
                return "Participants Data";
              },
              orientation: "landscape",
              pageSize: "A3",
              text: "PDF",
              titleAttr: "PDF",
            },
          ],
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

// ---------------------------->> DELETE OPERATION

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

// ---------------------------->> EDIT OPERATION

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

// ---------------------------->> UPDATE OPERATION

const updateParticipantDetails = () => {
  let hiddenCertificateId = $("#hiddenCertificateId").val();
  let updateFirstName = $("#updateFirstName").val();
  let updateLastName = $("#updateLastName").val();
  let updatePrize = $("#updatePrize").val();
  let updateAttendStatus = $("#updateAttendStatus").val();

  if (!isNaN(updateFirstName) || updateFirstName === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Only Characters are Allowed or First Name Cannot be Empty",
    });
    return false;
  }

  if (!isNaN(updateLastName) || updateLastName === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Only Characters are Allowed or Last Name Cannot be Empty",
    });
    return false;
  }

  if (!isNaN(updatePrize) || updatePrize === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Only Characters are Allowed or Prize Cannot be Empty",
    });
    return false;
  }

  if (!isNaN(updateAttendStatus) || updateAttendStatus === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Only Characters are Allowed or Prize Cannot be Empty",
    });
    return false;
  }

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
