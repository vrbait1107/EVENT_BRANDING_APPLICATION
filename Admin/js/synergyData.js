let readRecord;

$(document).ready(function () {
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

const deleteSynergyData = (id) => {
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
        success: function (data) {
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
