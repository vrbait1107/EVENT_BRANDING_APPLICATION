$(document).ready(function () {
  // EXTC

  $("#extcForm").on("submit", function (e) {
    e.preventDefault();
    let department = "department";
    let eventDepartmentName = "Electronics and Telecommunication";

    $.ajax({
      url: "./departmentalEvents.php",
      type: "post",
      data: {
        eventDepartmentName: eventDepartmentName,
        department: department,
      },
      success() {},
      error(err) {
        alert("Something Went Wrong");
      },
    });
  });

  // Chemical

  $("#chemicalForm").on("submit", function (e) {
    e.preventDefault();

    let eventDepartmentName = "Chemical";
    let department = "department";

    $.ajax({
      url: "./departmentalEvents.php",
      type: "post",
      data: {
        eventDepartmentName: eventDepartmentName,
        department: department,
      },
      success() {},
      error(err) {
        alert("Something Went Wrong");
      },
    });
  });

  // civil

  $("#civilForm").on("submit", function (e) {
    e.preventDefault();

    let eventDepartmentName = "civil";
    let department = "department";

    $.ajax({
      url: "./departmentalEvents.php",
      type: "post",
      data: {
        eventDepartmentName: eventDepartmentName,
        department: department,
      },
      success() {},
      error(err) {
        alert("Something Went Wrong");
      },
    });
  });

  // mechanical

  $("#mechanicalForm").on("submit", function (e) {
    e.preventDefault();

    let eventDepartmentName = "mechanical";
    let department = "department";

    $.ajax({
      url: "./departmentalEvents.php",
      type: "post",
      data: {
        eventDepartmentName: eventDepartmentName,
        department: department,
      },
      success() {},
      error(err) {
        alert("Something Went Wrong");
      },
    });
  });

  // Computer

  $("#computerForm").on("submit", function (e) {
    e.preventDefault();

    let eventDepartmentName = "computer";
    let department = "department";

    $.ajax({
      url: "./departmentalEvents.php",
      type: "post",
      data: {
        eventDepartmentName: eventDepartmentName,
        department: department,
      },
      success() {},
      error(err) {
        alert("Something Went Wrong");
      },
    });
  });
});
