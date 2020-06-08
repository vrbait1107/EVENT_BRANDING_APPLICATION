let readRecordNews;
$(document).ready(function () {
  readRecordNews = () => {
    let readRecord = "readRecord";
    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageNews.php",
      type: "post",
      data: {
        readRecord: readRecord,
      },
      success(data) {
        $("#recordResponse").html(data);
        $("#dataTable").DataTable({
          dom: "Bfrtip",
          buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
          destroy: true, //use for reinitialize datatable
        });
      },
      error() {
        $("#recordResponse").html("Something Went Wrong");
      },
    });
  };

  readRecordNews();

  // ######## ADDING NEWS & NOTIFICATION

  $("#addNews").click(function () {
    let addNews = "addNews";
    let newsTitle = $("#newsTitle").val();
    let newsDescription = $("#newsDescription").val();

    $.ajax({
      url: "ajaxHandlerPHP/ajaxManageNews.php",
      type: "post",
      data: {
        addNews: addNews,
        newsTitle: newsTitle,
        newsDescription: newsDescription,
      },
      success(data) {
        $("#addResponse").html(data);
        readRecordNews();
      },
      error() {
        $("#addResponse").html("Something Went Wrong");
      },
    });
  });
});

// ############ DELETE NEWS INFORMATION

const deleteNewsInformation = (id) => {
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
        url: "ajaxHandlerPHP/ajaxManageNews.php",
        type: "post",
        data: {
          deleteId: deleteId,
        },
        success(data) {
          $("#deleteResponse").html(data);
          readRecordNews();
        },
        error() {
          $("#deleteResponse").html("Something Went Wrong");
        },
      });
    }
  });
};

// ######### GET INFORMATION IN FORM

const getNewsInformation = (id) => {
  let editId = id;

  $.ajax({
    url: "ajaxHandlerPHP/ajaxManageNews.php",
    type: "post",
    data: {
      editId: editId,
    },
    success(data) {
      alert(data);
      let news = JSON.parse(data);
      $("#updateNewsTitle").val(news.newsTitle);
      $("#updateNewsDescription").val(news.newsDescription);
      $("#hiddenId").val(news.id);
    },
  });

  $("#updateModal").modal("show");
};

const updateNews = () => {
  let updateNewsTitle = $("#updateNewsTitle").val();
  let updateNewsDescription = $("#updateNewsDescription").val();
  let hiddenId = $("#hiddenId").val();

  $.ajax({
    url: "ajaxHandlerPHP/ajaxManageNews.php",
    type: "post",
    data: {
      updateNewsTitle: updateNewsTitle,
      updateNewsDescription: updateNewsDescription,
      hiddenId: hiddenId,
    },
    success(data) {
      $("#updateResponse").html(data);
    },
    error() {
      $("#updateResponse").html(data);
    },
  });
};
