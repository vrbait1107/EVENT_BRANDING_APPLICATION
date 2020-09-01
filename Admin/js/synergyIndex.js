$(document).ready(function () {
  $("#synergyForm").submit(function (e) {
    e.preventDefault();

    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();
    let department = $("#department").val();
    let event = $("#event").val();
    let prize = $("#prize").val();
    let certificateId = parseInt(Math.random() * 1000000000);
    let submit = "submit";

    if (!isNaN(firstName) || firstName === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "First Name cannot be Number or cannot be Empty",
      });
      return false;
    }

    if (!isNaN(lastName) || lastName === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Last Name cannot be Number or cannot be Empty",
      });
      return false;
    }

    if (!isNaN(department) || department === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Department cannot be Number or cannot be Empty",
      });
      return false;
    }

    if (!isNaN(event) || event === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Event cannot be Number or cannot be Empty",
      });
      return false;
    }

    if (!isNaN(prize) || prize === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Prize cannot be Number or cannot be Empty",
      });
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxSynergyIndex.php",
      type: "post",
      data: {
        firstName: firstName,
        lastName: lastName,
        department: department,
        event: event,
        prize: prize,
        certificateId: certificateId,
        submit: submit,
      },
      beforeSend() {
        $("#responseMessage").html('<h5 class="text-danger">Processing</h5>');
      },
      success(data) {
        $("#responseMessage").html(data);
        $("#synergyForm").trigger("reset");
      },
      error() {
        $("#responseMessage").html("Something Went Wrong");
      },
    });
  });
});
