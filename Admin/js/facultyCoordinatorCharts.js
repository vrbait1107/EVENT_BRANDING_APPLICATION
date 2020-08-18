$(document).ready(function () {
  let chart = "chart";
  let chart1 = "chart1";

  $.ajax({
    url: "ajaxHandlerPHP/ajaxFacultyCoordinatorCharts.php",
    type: "post",
    data: {
      chart: chart,
    },
    success(data) {
      let value = JSON.parse(data);

      //------------------------>> START
      google.charts.load("current", { packages: ["bar"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(value);

        var options = {
          chart: {
            title: "Technical Festival Event Revenue Event Wise",
            subtitle: "Academic Year 2019-2020",
          },
        };

        var chart = new google.charts.Bar(
          document.getElementById("revenueChartEventWise")
        );

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      //------------------------>> END
    },
    error(err) {
      alert("Something Went Wrong");
    },
  });

  //-------------------->> SECOND AJAX

  $.ajax({
    url: "ajaxHandlerPHP/ajaxFacultyCoordinatorCharts.php",
    type: "post",
    data: {
      chart1: chart1,
    },
    success(data) {
      let value = JSON.parse(data);
      //------------------------>> START
      google.charts.load("current", { packages: ["bar"] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(value);

        var options = {
          chart: {
            title: "Technical Festival Event Participant Count Event Wise",
            subtitle: "Academic Year 2019-2020",
          },
        };

        var chart = new google.charts.Bar(
          document.getElementById("participantCountChartEventWise")
        );

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      //------------------------>> END
    },
    error(err) {
      alert("Something Went Wrong");
    },
  });
});
