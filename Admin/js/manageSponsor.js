let readRecordSponsor;

$(document).ready(function () {
  readRecordSponsor = () => {
    let readRecord = "readRecord";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageSponsor.php",
      type: "post",
      data: {
        readRecord: readRecord,
      },
      success(data) {
        $("#readRecordSponsor").html(data);
        $("#dataTable").DataTable({
          destroy: true, //use for reinitialize datatable
        });
      },
      error() {
        $("#readRecordSponsor").html("Something Went Wrong");
      },
    });
  };

  readRecordSponsor();

  // ########## ADD SPONSOR INFORMATION

  $("#addSponsorForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageSponsor.php",
      type: "post",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success(data) {
        $("#addResponse").html(data);
        readRecordSponsor();
      },
      error() {
        $("#addResponse").html("Something Went Wrong");
      },
    });
  });
});

//########### RETRIVE DATA INTO FORM
const getSponsorInformation = (id) => {
  let editId = id;
  $.ajax({
    url: "ajaxHandlerPHP/ajaxManageSponsor.php",
    type: "post",
    data: {
      editId: editId,
    },
    success(data) {
      let sponsor = JSON.parse(data);
      $("#updateSponsorName").val(sponsor.sponsorName);
      $("#updateSponsoredEvent").val(sponsor.sponsoredEvent);
      $("#updateSponsoredDepartment").val(sponsor.sponsoredDepartment);
      $("#hiddenId").val(sponsor.id);
    },
  });
  $("#updateModal").modal("show");
};

// ################# DELETE SPONSOR INFORMATION
const deleteSponsorInformation = (id) => {
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
        url: "ajaxHandlerPHP/ajaxManageSponsor.php",
        type: "post",
        data: {
          deleteId: deleteId,
        },
        success(data) {
          $("#deleteResponse").html(data);
          $("#dataTable").DataTable({
            destroy: true, //use for reinitialize datatable
          });
          readRecordSponsor();
        },
        error() {
          $("#deleteResponse").html("Something Went Wrong");
        },
      });
    }
  });
};

const updateSponsor = () => {
  let hiddenId = $("#hiddenId").val();
  let updateSponsorName = $("#updateSponsorName").val();
  let updateSponsoredEvent = $("#updateSponsoredEvent").val();
  let updateSponsoredDepartment = $("#updateSponsoredDepartment").val();

  $.ajax({
    url: "ajaxHandlerPHP/ajaxManageSponsor.php",
    type: "post",
    data: {
      hiddenId: hiddenId,
      updateSponsorName: updateSponsorName,
      updateSponsoredEvent: updateSponsoredEvent,
      updateSponsoredDepartment: updateSponsoredDepartment,
    },
    success(data) {
      $("#updateResponse").html(data);
      $("#dataTable").DataTable({
        destroy: true, //use for reinitialize datatable
      });
      readRecordSponsor();
    },
    error() {
      $("#updateResponse").html("Something Went Wrong");
    },
  });
};
