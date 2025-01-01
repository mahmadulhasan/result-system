<?php


// Query to get data for the last 90 days
$query = "SELECT `date`, `school_login`, `result_page` FROM `login_count` 
          WHERE `date` >= CURDATE() - INTERVAL 90 DAY 
          ORDER BY `date` ASC";
$result = $conn->query($query);

// Prepare an array for all 90 days
$currentDate = new DateTime();
$data = [];
$datesWithData = [];

// Populate the $data array with actual data from the database
while ($row = $result->fetch_assoc()) {
    $date = $row['date'];
    $datesWithData[$date] = [
        (int)$row['school_login'],
        (int)$row['result_page']
    ];
}

// Generate data for all 90 days (from today to 90 days ago)
for ($i = 0; $i < 90; $i++) {
    $date = $currentDate->format('Y-m-d'); // Get the current date
    if (isset($datesWithData[$date])) {
        $data[] = [
            $i + 1, // Day (1 for today)
            $datesWithData[$date][0], // school_login Visitors
            $datesWithData[$date][1], // result_page Visitors
            $date // Date
        ];
    } else {
        $data[] = [
            $i + 1, // Day
            0, // school_login Visitors
            0, // result_page Visitors
            $date // Date
        ];
    }
    $currentDate->modify('-1 day'); // Move to the previous day
}

// Sort the data by day to ensure the chart is in correct order
usort($data, function($a, $b) {
    return $a[0] - $b[0];
});

// Encode the data as JSON for JavaScript
$jsonData = json_encode($data);
?>


    <section class="container mb-5">
        <h3 style="color:blue;">School Login & Result Page Visitors (Last 3 Months)</h3>
        <div id="loginchart_material" class="container overflow-auto"></div>
    </section>

    <script>
        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('number', 'Day');
            data.addColumn('number', 'School Login');
            data.addColumn({type: 'string', role: 'tooltip'});
            data.addColumn('number', 'Result Page Visitors');
            data.addColumn({type: 'string', role: 'tooltip'});

            // Use PHP data
            var visitorData = <?php echo $jsonData; ?>;

            // Transform data to include tooltips
            var formattedData = visitorData.map(row => [
                row[0], // Day number
                row[1], `Date: ${row[3]} | School login: ${row[1]}`,
                row[2], `Date: ${row[3]} | Result Page visit: ${row[2]}`
            ]);

            data.addRows(formattedData);

            var options = {
                chart: {
                    title: 'Visitor Counts (Last 90 Days)',
                    subtitle: 'Daily data for School Login and Result Page Visits'
                },
                width: 1300,
                height: 500,
                vAxis: { minValue: 0 }, // Y-axis starts at 0
                tooltip: { isHtml: true } // Enable HTML tooltips
            };

            var chart = new google.charts.Line(document.getElementById('loginchart_material'));
            chart.draw(data, google.charts.Line.convertOptions(options));

            // Redraw on window resize
            window.addEventListener('resize', function() {
                chart.draw(data, google.charts.Line.convertOptions(options));
            });
        }
    </script>

