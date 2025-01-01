<?php
include "../config.php";
include "header.php";

// Check session validation
if (!isset($_SESSION['admin-login']) || $_SESSION['admin-login'] !== true || $_SESSION['position'] !== 'super_admin') {
    echo "<script>alert('Login first please.');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}
?>

<section>
    <div class="card p-5 overflow-auto">
        <h3><a href="school.php">Active Pages</a></h3>
        <hr>
        <?php
        // SQL query to fetch active pages
        $sql = "SELECT `id`, `page_name`, `heading1`, `body1`, `image1`, `heading2`, `body2`, `image2`, `date` FROM `new_pages` WHERE `action` = 'active' ORDER BY `id` DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // Start the table
            echo '<table class="table table-striped table-bordered text-center">
                    <tr class="table-dark">
                        <th>Sl. No.</th>
                        <th>Page Name</th>
                        <th>Heading 1</th>
                        <th>Body 1</th>
                        <th>Image 1</th>
                        <th>Heading 2</th>
                        <th>Body 2</th>
                        <th>Image 2</th>
                        <th>Date</th>
                    </tr>';

            // Initialize the serial number
            $sl_no = 1;

            // Fetch and display rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $sl_no . "</td>
                        <td>" . htmlspecialchars($row['page_name']) . "</td>
                        <td>" . htmlspecialchars($row['heading1']) . "</td>
                        <td>" . htmlspecialchars($row['body1']) . "</td>
                        <td><img src='../" . htmlspecialchars($row['image1']) . "' alt='Image 1' style='width: 100px; height: auto;'></td>
                        <td>" . htmlspecialchars($row['heading2']) . "</td>
                        <td>" . htmlspecialchars($row['body2']) . "</td>
                        <td><img src='../" . htmlspecialchars($row['image2']) . "' alt='Image 2' style='width: 100px; height: auto;'></td>
                        <td>" . htmlspecialchars($row['date']) . "</td>
                      </tr>";
                $sl_no++;
            }

            // End the table
            echo "</table>";
        } else {
            echo "<p>No active pages found.</p>";
        }
        ?>
    </div>
</section>

<section>
    <div class="card p-5 overflow-auto">
        <h3><a href="school.php">Deleted Pages</a></h3>
        <hr>
        <?php
        // SQL query to fetch inactive pages
        $sql = "SELECT `id`, `page_name`, `heading1`, `body1`, `image1`, `heading2`, `body2`, `image2`, `date` FROM `new_pages` WHERE `action` = 'inactive' ORDER BY `id` DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // Start the table
            echo '<table class="table table-striped table-bordered text-center">
                    <tr class="table-dark">
                        <th>Sl. No.</th>
                        <th>Page Name</th>
                        <th>Heading 1</th>
                        <th>Body 1</th>
                        <th>Image 1</th>
                        <th>Heading 2</th>
                        <th>Body 2</th>
                        <th>Image 2</th>
                        <th>Date</th>
                    </tr>';

            // Initialize the serial number
            $sl_no = 1;

            // Fetch and display rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $sl_no . "</td>
                        <td>" . htmlspecialchars($row['page_name']) . "</td>
                        <td>" . htmlspecialchars($row['heading1']) . "</td>
                        <td>" . htmlspecialchars($row['body1']) . "</td>
                        <td><img src='../" . htmlspecialchars($row['image1']) . "' alt='Image 1' style='width: 100px; height: auto;'></td>
                        <td>" . htmlspecialchars($row['heading2']) . "</td>
                        <td>" . htmlspecialchars($row['body2']) . "</td>
                        <td><img src='../" . htmlspecialchars($row['image2']) . "' alt='Image 2' style='width: 100px; height: auto;'></td>
                        <td>" . htmlspecialchars($row['date']) . "</td>
                      </tr>";
                $sl_no++;
            }

            // End the table
            echo "</table>";
        } else {
            echo "<p>No inactive pages found.</p>";
        }
        ?>
    </div>
</section>

<?php
include "footer.php";
?>
