let readrecordGallery;
$(document).ready(function () {
  // ---------------------------->> READ OPERATION
  readrecordGallery = () => {
    let readRecord = "readRecord";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageGalleryImage.php",
      type: "post",
      data: {
        readRecord: readRecord,
      },
      success: function (data) {
        $("#responseMessage").html(data);
        $("#dataTable").DataTable({
          dom: "Bfrtip",
          buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
          destroy: true, //use for reinitialize datatable
        });
      },
      error: function () {
        $("#responseMessage").fadeIn().html("Something Went Wrong");
      },
    });
  };

  readrecordGallery();

  // ---------------------------->> CREATE OPERATION

  $("#galleryForm").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageGalleryImage.php",
      type: "post",
      data: new FormData(this),
      contentType: false,
      processData: false,
      beforeSend() {
        $("#addResponse").html("Uploading Images...");
      },
      success: function (data) {
        $("#addResponse").html(data);
        $("#galleryForm").trigger("reset");
        readrecordGallery();
      },
      error: function () {
        $("#addResponse").fadeIn().html("Something Went Wrong");
      },
    });
  });
});

// ---------------------------->> DELETE OPERATION

const deleteGalleryDetails = (id) => {
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
        url: "ajaxHandlerPHP/ajaxManageGalleryImage.php",
        type: "post",
        data: {
          deleteId: deleteId,
        },
        success: function (data) {
          $("#deleteResponse").html(data);
          $("#dataTable").DataTable({
            destroy: true, //use for reinitialize datatable
          });
          readrecordGallery();
        },
        error: function () {
          $("#responseMessage").fadeIn().html("Something Went Wrong");
        },
      });
    }
  });
};
