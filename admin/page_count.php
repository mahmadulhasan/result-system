<?php
// Query to get data for the last 90 days
$query = "SELECT `date`, `homepage_count`, `aboutpage_count`, `contactpage_count` 
          FROM `visitor_counts` 
          WHERE `date` >= CURDATE() - INTERVAL 90 DAY 
          ORDER BY `date` ASC";
$result = $conn->query($query);

// Prepare an array for all 90 days
$currentDate = new DateTime(); // Get the current date
$data = [];
$allDays = []; // Array to store all 90 days, even with zero data

// Populate the $data array with actual data from the database
while ($row = $result->fetch_assoc()) {
    $date = $row['date'];
    $dateObj = new DateTime($date);
    $interval = $currentDate->diff($dateObj); // Calculate the difference
    $day = $interval->days + 1; // Day relative to today
    
    // Add the data to the array
    $data[] = [
        (int)$day,
        (int)$row['homepage_count'],
        (int)$row['aboutpage_count'],
        (int)$row['contactpage_count'],
        $date
    ];
}

// Generate all 90 days (from today to 90 days ago)
for ($i = 0; $i < 90; $i++) {
    $day = $i + 1; // Day starting from 1 for today
    $found = false;

    // Check if the data for this day exists
    foreach ($data as $row) {
        if ($row[0] === $day) {
            $found = true;
            break;
        }
    }

    // If data for this day is not found, add zero data
    if (!$found) {
        $data[] = [
            $day, // Day
            0, // Homepage Visitors
            0, // About Page Visitors
            0, // Contact Page Visitors
            "" // No date for zero data
        ];
    }
}

// Sort the data by day to ensure the chart is in correct order
usort($data, function($a, $b) {
    return $a[0] - $b[0];
});

// Encode the data as JSON for JavaScript
$jsonData = json_encode($data);
?>


<script>
    google.charts.load('current', {'packages':['line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Day');
        data.addColumn('number', 'Homepage Visitors');
        data.addColumn({type: 'string', role: 'tooltip'}); // Tooltip for homepage
        data.addColumn('number', 'About Page Visitors');
        data.addColumn({type: 'string', role: 'tooltip'}); // Tooltip for about page
        data.addColumn('number', 'Contact Page Visitors');
        data.addColumn({type: 'string', role: 'tooltip'}); // Tooltip for contact page

        // Use PHP data
        var visitorData = <?php echo $jsonData; ?>;

        // Transform data to include tooltips and ensure every day has a count
        var formattedData = visitorData.map(row => [
            row[0], // Day number
            row[1], `Date: ${row[4]} | Homepage: ${row[1]}`, // Tooltip for homepage
            row[2], `Date: ${row[4]} | About Page: ${row[2]}`, // Tooltip for about page
            row[3], `Date: ${row[4]} | Contact Page: ${row[3]}` // Tooltip for contact page
        ]);

        data.addRows(formattedData);

        var options = {
            chart: {
                title: 'Visitor Counts (Last 90 Days)',
                subtitle: 'Daily data for Homepage, About Page, and Contact Page'
            },
            width: 1300,
            height: 500,
            vAxis: { minValue: 0 }, // Y-axis starts at 0
            tooltip: { isHtml: true } // Enable HTML tooltips
        };

        var chart = new google.charts.Line(document.getElementById('linechart_material'));
        chart.draw(data, google.charts.Line.convertOptions(options));

        // Redraw on window resize
        window.addEventListener('resize', function() {
            chart.draw(data, google.charts.Line.convertOptions(options));
        });
    }
</script>
<section class="container my-5">
    <h3 style="color:blue;">Page visitor of Last 3 Months</h3>
    
<div id="linechart_material"  class="container overflow-auto"></div>
</section>
  
