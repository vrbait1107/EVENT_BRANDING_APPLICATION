// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
  });

  //### Participant Data
  $("#dataTableParticipants").DataTable({
    dom: "Bfrtip",
    buttons: [
      { extend: "copyHtml5" },
      { extend: "excelHtml5" },
      { extend: "csvHtml5" },
      {
        extend: "pdfHtml5",
        title: function () {
          return "Participants Data";
        },
        orientation: "landscape",
        pageSize: "A3",
        text: "PDF",
        titleAttr: "PDF",
      },
    ],
  });
});
