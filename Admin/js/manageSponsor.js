let readRecordSponsor;

$(document).ready(function () {
  // --------------------------------->> READ OPERATION

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
          dom: "Bfrtip",
          buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
          destroy: true, //use for reinitialize datatable
        });
      },
      error() {
        $("#readRecordSponsor").html("Something Went Wrong");
      },
    });
  };

  readRecordSponsor();

  // ----------------------------------------->> CREATE OPERATION

  $("#addSponsorForm").on("submit", function (e) {
    e.preventDefault();

    if ($("#sponsorName").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Sponsor Name Cannot be Empty",
      });
      return false;
    }

    if ($("#sponsoredEvent").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Sponsor Event Cannot be Empty",
      });
      return false;
    }

    if ($("#sponsoredDepartment").val() === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Sponsor Department Cannot be Empty",
      });
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageSponsor.php",
      type: "post",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success(data) {
        $("#addResponse").html(data);
        $("#addSponsorForm").trigger("reset");
        readRecordSponsor();
      },
      error() {
        $("#addResponse").html("Something Went Wrong");
      },
    });
  });
});

//----------------------------------------->> EDIT OPERATION

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

// ----------------------------------------->> DELETE OPERATION

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

//----------------------------------------->> UPDATE OPERATION

const updateSponsor = () => {
  let hiddenId = $("#hiddenId").val();
  let updateSponsorName = $("#updateSponsorName").val();
  let updateSponsoredEvent = $("#updateSponsoredEvent").val();
  let updateSponsoredDepartment = $("#updateSponsoredDepartment").val();

  if (!isNaN(updateSponsorName) || updateSponsorName === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Sponsor Name Cannot be Empty",
    });
    return false;
  }

  if (!isNaN(updateSponsoredEvent) || updateSponsoredEvent === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Sponsor Event Cannot be Empty",
    });
    return false;
  }

  if (!isNaN(updateSponsoredDepartment) || updateSponsoredDepartment === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Sponsor Department Cannot be Empty",
    });
    return false;
  }

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
