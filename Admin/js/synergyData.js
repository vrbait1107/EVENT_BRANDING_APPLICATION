let readRecord;

$(document).ready(function () {
  // ---------------------------->> READ OPERATION
  readRecord = () => {
    let readRecordData = "readRecord";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxSynergyData.php",
      type: "post",
      data: {
        readRecordData: readRecordData,
      },
      success(data) {
        $("#responseMessage").html(data);
        $("#dataTable").DataTable({
          dom: "Bfrtip",
          buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
          destroy: true, //use for reinitialize datatable
        });
      },
      error() {
        $("#responseMessage").html("Something Went Wrong");
      },
    });
  };

  readRecord();
});

// ---------------------------->> EDIT OPERATION

const getParticipantDetails = (id) => {
  let editId = id;

  $.ajax({
    url: "ajaxHandlerPHP/ajaxSynergyData.php",
    type: "post",
    data: {
      editId: editId,
    },
    success: function (data) {
      let user = JSON.parse(data);
      $("#updateFirstName").val(user.firstName);
      $("#updateLastName").val(user.lastName);
      $("#updatePrize").val(user.prize);
      $("#updateAttendStatus").val(user.attendStatus);
      $("#hiddenCertificateId").val(user.certificateId);
    },
    error: function (data) {
      $("#deleteResponse").html("Something Went Wrong");
    },
  });

  $("#updateModal").modal("show");
};

// ---------------------------->> UPDATE OPERATION

const updateParticipantDetails = () => {
  let updateId = $("#hiddenCertificateId").val();
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
    url: "ajaxHandlerPHP/ajaxSynergyData.php",
    type: "post",
    data: {
      updateId,
      updateFirstName,
      updateLastName,
      updatePrize,
      updateAttendStatus,
    },
    success(data) {
      $("#updateResponse").html(data);
      $("#dataTable").DataTable({
        destroy: true, //use for reinitialize datatable
      });
      readRecord();
    },
    error: function (data) {
      $("#updateResponse").html("Something Went Wrong");
    },
  });
  $("#updateModal").modal("hide");
};

// ---------------------------->> DELETE OPERATION

const deleteParticipantDetails = (id) => {
  let deleteId = id;
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
        url: "ajaxHandlerPHP/ajaxSynergyData.php",
        type: "post",
        data: {
          deleteId: deleteId,
        },
        success(data) {
          $("#deleteResponse").html(data);
          readRecord();
        },
        error: function (data) {
          $("#deleteResponse").html("Something Went Wrong");
        },
      });
    }
  });
};
