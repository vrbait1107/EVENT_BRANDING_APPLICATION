let readrecordAdmin;

$(document).ready(function () {
  // ##############  Reading Record
  readrecordAdmin = () => {
    let readRecord = "readRecord";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageAdmin.php",
      type: "post",
      data: {
        readRecord: readRecord,
      },
      success: function (data) {
        $("#responseAdminData").html(data);
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

  readrecordAdmin();

  // ###############   Add Admin
  $("#addAdmin").click(function () {
    let email = $("#email").val();
    let adminType = $("#adminType").val();
    let adminDepartment = $("#adminDepartment").val();
    let adminEvent = $("#adminEvent").val();
    let adminPassword = $("#adminPassword").val();

    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageAdmin.php",
      type: "post",
      data: {
        email: email,
        adminType: adminType,
        adminDepartment: adminDepartment,
        adminEvent: adminEvent,
        adminPassword: adminPassword,
      },

      success: function (data) {
        $("form").trigger("reset");
        $("#responseMessage").fadeIn().html(data);
        $("#dataTable").DataTable({
          destroy: true, //use for reinitialize datatable
        });
        readrecordAdmin();
      },
      error: function () {
        $("form").trigger("reset"),
          $("#responseMessage").fadeIn().html("Something Went Wrong");
      },
    });
  });
});

// #############   Deleting User
const deleteUser = (deleteEmail) => {
  console.log(deleteEmail);

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
        url: "ajaxHandlerPHP/ajaxManageAdmin.php",
        type: "post",
        data: {
          deleteEmail: deleteEmail,
        },
        success: function (data) {
          $("#deleteResponse").html(data);
          readrecordAdmin();
        },
        error: function (data) {
          $("#deleteResponse").html("Something Went Wrong");
        },
      });
    }
  });
};

// ########### Retiive Admin Details

let getAdminDetails = (editEmail) => {
  $("#hiddenEmail").val(editEmail);

  $.ajax({
    url: "ajaxHandlerPHP/ajaxManageAdmin.php",
    type: "post",
    data: {
      editEmail: editEmail,
    },
    success: function (data) {
      let admin = JSON.parse(data);
      $("#updateEmail").val(admin.email);
      $("#updateAdminType").val(admin.adminType);
      $("#updateAdminDepartment").val(admin.adminDepartment);
      $("#updateAdminEvent").val(admin.adminEvent);
      $("#hiddenEmail").val(admin.email);
    },
  });

  $("#updateModal1").modal("show");
};

// ########### Update Admin Details

const updateAdminDetails = () => {
  let updateEmail = $("#updateEmail").val();
  let updateAdminType = $("#updateAdminType").val();
  let updateAdminDepartment = $("#updateAdminDepartment").val();
  let updateAdminEvent = $("#updateAdminEvent").val();
  let hiddenEmail = $("#hiddenEmail").val();

  $.ajax({
    url: "ajaxHandlerPHP/ajaxManageAdmin.php",
    type: "post",
    data: {
      hiddenEmail: hiddenEmail,
      updateEmail: updateEmail,
      updateAdminType: updateAdminType,
      updateAdminDepartment: updateAdminDepartment,
      updateAdminEvent: updateAdminEvent,
    },
    success: function (data) {
      $("#updateModal").modal("hide");
      $("#updateResponse").html(data);
      readrecordAdmin();
    },
  });
};
