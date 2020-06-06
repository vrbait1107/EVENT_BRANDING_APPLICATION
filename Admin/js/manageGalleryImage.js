let readrecordGallery;
$(document).ready(function () {
  // ##############  Reading Record
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
          destroy: true, //use for reinitialize datatable
        });
      },
      error: function () {
        $("#responseMessage").fadeIn().html("Something Went Wrong");
      },
    });
  };

  readrecordGallery();

  //################## ADDING IMAGES

  $("#galleryImages").change(function () {
    var formData = new FormData();
    var files = $("#galleryImages")[0].files;

    if (files.length > 10) {
      alert("You can not select more than 10 files");
    } else {
      for (let i = 0; i < files.length; i++) {
        var name = document.getElementById("galleryImages").files[i].name;
        formData.append(
          "file[]",
          document.getElementById("galleryImages").files[i]
        );
      }
    }
    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageGalleryImage.php",
      type: "post",
      data: formData,
      success: function (data) {
        $("#addResponse").html(data);
      },
      error: function () {
        $("#addResponse").fadeIn().html("Something Went Wrong");
      },
    });
  });
});

//################ Delete Gallery Data

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
          readrecordParticipant();
        },
        error: function () {
          $("#responseMessage").fadeIn().html("Something Went Wrong");
        },
      });
    }
  });
};
