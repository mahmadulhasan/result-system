<?php

// Queries for the specific months
$last_month_query = "SELECT COUNT(*) AS last_month_total FROM school_details WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) - 1";
$second_last_month_query = "SELECT COUNT(*) AS second_last_month_total FROM school_details WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) - 2";
$third_last_month_query = "SELECT COUNT(*) AS third_last_month_total FROM school_details WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) - 3";
$fourth_last_month_query = "SELECT COUNT(*) AS fourth_last_month_total FROM school_details WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) - 4";
$fifth_last_month_query = "SELECT COUNT(*) AS fifth_last_month_total FROM school_details WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) - 5";

// Execute queries and fetch the results
$last_month_result = $conn->query($last_month_query)->fetch_assoc()['last_month_total'];
$second_last_month_result = $conn->query($second_last_month_query)->fetch_assoc()['second_last_month_total'];
$third_last_month_result = $conn->query($third_last_month_query)->fetch_assoc()['third_last_month_total'];
$fourth_last_month_result = $conn->query($fourth_last_month_query)->fetch_assoc()['fourth_last_month_total'];
$fifth_last_month_result = $conn->query($fifth_last_month_query)->fetch_assoc()['fifth_last_month_total'];



?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
          ["Month", "Registered school", { role: "style" }],
          ["Last Months", <?php echo $last_month_result; ?>, "red"],
          ["2nd Last Months", <?php echo $second_last_month_result; ?>, "gold"],
          ["3rd Last Months", <?php echo $third_last_month_result; ?>, "silver"],
          ["4th Last Months", <?php echo $fourth_last_month_result; ?>, "blue"],
          ["5th Last Month", <?php echo $fifth_last_month_result; ?>, "green"]
        ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "School registration",
        width: '100%',
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_school"));
      chart.draw(view, options);
  }
  </script>
  
 <script>
  google.charts.load('current', {'packages':['line']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Period');
    data.addColumn('number', 'Registrations');

    // Dynamically add rows with PHP values
    data.addRows([
      ['0', 0],
      ['Last Month', <?php echo $last_month_result; ?>],
      ['2nd Months', <?php echo $second_last_month_result; ?>],
      ['3rd Months', <?php echo $third_last_month_result; ?>],
      ['4th Months', <?php echo $fourth_last_month_result; ?>],
      ['5th Months', <?php echo $fifth_last_month_result; ?>]
    ]);

    var options = {
      chart: {
        title: 'School Registrations Over the Last 3 Months',
        subtitle: 'Number of schools registered'
      },
      width: '100%',
      height: 400,
      legend: { position: 'none' } // Remove legend
    };

    var chart = new google.charts.Line(document.getElementById('linechart_school'));
    chart.draw(data, google.charts.Line.convertOptions(options));
  }
</script>


  
<section class="container mb-5">
    <h3 style="color:blue;">School Registration Chart of Last 3 Months</h3>
    <div class="row">
        <div id="columnchart_school" class="col-md-6" style="height: 370px;"></div>
        <div id="linechart_school" class="col-md-6" style="height: 370px;"></div>
        
    </div>
</section>
  
