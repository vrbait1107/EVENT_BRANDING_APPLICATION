$(document).ready(function () {
  let chart1 = "chart1";

  $.ajax({
    url: "ajaxHandlerPHP/ajaxSynergyAdminCharts.php",
    type: "post",
    data: {
      chart1: chart1,
    },
    success(data) {
      let value = JSON.parse(data);

      google.charts.load("current", {
        packages: ["bar", "corechart"],
      });
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(value);

        var options = {
          chart: {
            title: "Cultural Festival Participant Count Participant Wise",
            subtitle: "Academic Year 2019-2020",
          },
        };

        var chart = new google.charts.Bar(
          document.getElementById("participantCountChartEventWise")
        );

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      // --------------------------->> PIE CHART

      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable(value);

        var options2 = {
          title: "Cultural Festival Participant Count Participant Wise",
          is3D: true,
        };

        var chart2 = new google.visualization.PieChart(
          document.getElementById("participantCountChartEventWise2")
        );

        chart2.draw(data2, options2);
      }
    },
    error(err) {
      alert("Something Went Wrong");
    },
  });
});
