let readRecordEvent;
$(document).ready(function () {
  // --------------------------------------->> Reading Record of Events
  readRecordEvent = () => {
    let readRecord = "readRecord";
    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageEvent.php",
      type: "post",
      data: {
        readRecord: readRecord,
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

  readRecordEvent();

  // --------------------------------------->> ADDING EVENT INFORMATION
  $("#addEventForm").on("submit", function (e) {
    e.preventDefault();

    if ($("#eventName") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event Name cannot be Empty",
      });
      return false;
    }

    if ($("#eventPrice") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event Fee cannot be Empty",
      });
      return false;
    }

    if ($("#promocode") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Promocode cannot be Empty",
      });
      return false;
    }

    if ($("#discount") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Discount cannot be Empty",
      });
      return false;
    }

    if ($("#eventPrize") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event Prize cannot be Empty",
      });
      return false;
    }

    if ($("#eventSponsor") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event Sponsor cannot be Empty",
      });
      return false;
    }

    if ($("#eventDepartment") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event Department cannot be Empty",
      });
      return false;
    }

    if ($("#eventDescription") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event Description cannot be Empty",
      });
      return false;
    }

    if ($("#eventRules") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event Rules cannot be Empty",
      });
      return false;
    }

    if ($("#eventCoordinator") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event Coordinator cannot be Empty",
      });
      return false;
    }

    if ($("#eventStartDate") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event Start Date cannot be Empty",
      });
      return false;
    }

    if ($("#eventEndDate") === "") {
      Swal.fire({
        icon: "warning",
        title: "Warning",
        text: "Event End Date cannot be Empty",
      });
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageEvent.php",
      type: "post",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success(data) {
        $("#addResponse").html(data);
        $("#addEventForm").trigger("reset");
        readRecordEvent();
      },
      error() {
        $("#addResponse").html("Something Went Wrong");
      },
    });
  });
});

// ---------------------------------------------->> DELETING EVENT INFORMATION
const deleteEventInformation = (id) => {
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
        url: "ajaxHandlerPHP/ajaxManageEvent.php",
        type: "post",
        data: {
          deleteId: deleteId,
        },
        success(data) {
          $("#deleteResponse").html(data);
          readRecordEvent();
        },
        error() {
          $("#deleteResponse").html("Something Went Wrong");
        },
      });
    }
  });
};

//------------------------------------->> GET EVENT INFORMATION

const getEventInformation = (id) => {
  let editId = id;

  $.ajax({
    url: "ajaxHandlerPHP/ajaxManageEvent.php",
    type: "post",
    data: {
      editId: editId,
    },
    success(data) {
      let event = JSON.parse(data);
      $("#updateEventName").val(event.eventName);
      $("#updateEventPrice").val(event.eventPrice);
      $("#updatePromocode").val(event.promocode);
      $("#updateDiscount").val(event.discount);
      $("#updateEventPrize").val(event.eventPrize);
      $("#updateEventSponsor").val(event.eventSponsor);
      $("#updateEventDepartment").val(event.eventDepartment);
      $("#updateEventDescription").val(event.eventDescription);
      $("#updateEventRules").val(event.eventRules);
      $("#updateEventCoordinator").val(event.eventCoordinator);
      $("#updateEventStartDate").val(event.eventStartDate);
      $("#updateEventEndDate").val(event.eventEndDate);
      $("#hiddenId").val(event.id);
    },
    error() {
      $("#updateResponse").html("Something Went Wrong");
    },
  });

  $("#updateModal").modal("show");
};

const updateEvent = () => {
  let updateEventName = $("#updateEventName").val();
  let updateEventPrice = $("#updateEventPrice").val();
  let updatePromocode = $("#updatePromocode").val();
  let updateDiscount = $("#updateDiscount").val();
  let updateEventPrize = $("#updateEventPrize").val();
  let updateEventSponsor = $("#updateEventSponsor").val();
  let updateEventDepartment = $("#updateEventDepartment").val();
  let updateEventDescription = $("#updateEventDescription").val();
  let updateEventRules = $("#updateEventRules").val();
  let updateEventCoordinator = $("#updateEventCoordinator").val();
  let updateEventStartDate = $("#updateEventStartDate").val();
  let updateEventEndDate = $("#updateEventEndDate").val();
  let hiddenId = $("#hiddenId").val();

  if (updateEventName === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event Name cannot be Empty",
    });
    return false;
  }

  if (updateEventPrice === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event Fee cannot be Empty",
    });
    return false;
  }

  if (updateDiscount === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Discount cannot be Empty",
    });
    return false;
  }

  if (updatePromocode === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Promocode cannot be Empty",
    });
    return false;
  }

  if (updateEventPrize === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event Prize cannot be Empty",
    });
    return false;
  }

  if (updateEventSponsor === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event Sponsor cannot be Empty",
    });
    return false;
  }

  if (updateEventDepartment === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event Department cannot be Empty",
    });
    return false;
  }

  if (updateEventDescription === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event Description cannot be Empty",
    });
    return false;
  }

  if (updateEventRules === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event Rules cannot be Empty",
    });
    return false;
  }

  if (updateEventCoordinator === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event Coordinator cannot be Empty",
    });
    return false;
  }

  if (updateEventStartDate === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event Start Date cannot be Empty",
    });
    return false;
  }

  if (updateEventEndDate === "") {
    Swal.fire({
      icon: "warning",
      title: "Warning",
      text: "Event End Date cannot be Empty",
    });
    return false;
  }

  $.ajax({
    url: "ajaxHandlerPHP/ajaxManageEvent.php",
    type: "post",
    data: {
      updateEventName: updateEventName,
      updateEventPrice: updateEventPrice,
      updatePromocode: updatePromocode,
      updateDiscount: updateDiscount,
      updateEventPrize: updateEventPrize,
      updateEventSponsor: updateEventSponsor,
      updateEventDepartment: updateEventDepartment,
      updateEventDescription: updateEventDescription,
      updateEventRules: updateEventRules,
      updateEventCoordinator: updateEventCoordinator,
      updateEventStartDate: updateEventStartDate,
      updateEventEndDate: updateEventEndDate,
      hiddenId: hiddenId,
    },
    success(data) {
      $("#updateResponse").html(data);
    },
    error() {
      $("#updateResponse").html("Something Went Wrong");
    },
  });
};
