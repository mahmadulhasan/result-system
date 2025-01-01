<?php
include "../config.php";
include "header.php";


?>



<section class="container py-5 text-center" style="min-height:90vh;">
    <div class="card py-5" style="max-height:650px; border:none !important">
        <h5 class="card-header bg-info">Latest Resul Published</h5>
        <div class="card-body overflow-auto">
        <?php
        $query = "SELECT * FROM `published_result` WHERE 1 ORDER BY `id` DESC LIMIT 200";
        $res = $conn->query($query);

        if ($res->num_rows > 0) {
            // Get the current date and time
            $currentDate = new DateTime();
            
            while ($row = $res->fetch_assoc()) {
                // Convert publish date and time to DateTime objects
                $publishDateTime = new DateTime($row['publish_date'] . ' ' . $row['publish_time']);
                
                if ($currentDate >= $publishDateTime) {
                    echo '<form method="POST" action="data.php" style="display:inline;">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<input type="hidden" name="school_name" value="' . $row['school_name'] . '">';
                    echo '<input type="hidden" name="school_add" value="' . $row['school_add'] . '">';
                    echo '<input type="hidden" name="school_pin" value="' . $row['school_pin'] . '">';
                    echo '<input type="hidden" name="class" value="' . $row['class'] . '">';
                    echo '<input type="hidden" name="section" value="' . $row['section'] . '">';
                    echo '<input type="hidden" name="session" value="' . $row['session'] . '">';
                    echo '<input type="hidden" name="exam_name" value="' . $row['exam_name'] . '">';
                    echo '<button type="submit" style="background:none; border:none; padding:0; margin:0; text-align:left; color:blue; text-decoration:none; cursor:pointer; color:black;">';
                    echo $row['school_name'] . ', ' . $row['school_add'] . '-' . $row['school_pin'] . '<br>';
                    echo 'Class: ' . $row['class'] . ', Section: ' . $row['section'] . ', Session: ' . $row['session'] . ', Exam: ' . $row['exam_name'];
                    echo '</button>';
                    echo '</form>';
                    echo "<hr>"; // Add a horizontal line between rows
                }
                
            }
        } else {
            echo "No results found.";
        }
    ?>

    </div>
</section>


<?php
include "footer.php";
?>