<section>
    <div class="card  p-5 overflow-auto">
        <h3><a href="school.php">Recent added School</a> </h3>
        <hr>
        <?php
        // SQL query to fetch school names in descending order of their id, limit to 5
        $sql = "SELECT * FROM school_details ORDER BY id DESC LIMIT 5";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Start the table
            echo '<table class="table table-striped table-bordered text-center ">
                    <tr class="table-dark">
                        <th>Sl. No.</th>
                        <th>School Name</th>
                        <th>Address</th>
                        <th>Pin Code</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>';
            
            // Initialize the serial number
            $sl_no = 1;
        
            // Fetch and print school names with serial numbers
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $sl_no . "</td>
                        <td>" . $row['school_name'] . "</td>
                        <td>" . $row['address'] .", ".$row['state'] . "</td>
                        <td>" . $row['pin_code'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['phone_no'] . "</td>
                      </tr>";
                $sl_no++;
            }
            
            // End the table
            echo "</table>";
        } else {
            echo "No schools found.";
        }
        ?>
    </div>
</section>
<section class="row">
    <div class="col-md-6 card  overflow-auto">
        <h3> <a href="notice.php">Latest notice</a> </h3>
        <hr>
        <table class="table table-bordered table-striped ">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Heading</th>
                <th>Body</th>
                <th>Page</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch notices with active status
            $sql = "SELECT `id`, `heading`, `body`, `status`, `page`, `date` FROM `notice` ORDER BY `id` DESC LIMIT 10";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <tr>
                        <td>' . htmlspecialchars($row['date']) . '</td>
                        <td>' . htmlspecialchars($row['heading']) . '</td>
                        <td>' . htmlspecialchars($row['body']) . '</td>
                        <td>' . htmlspecialchars($row['page']) . '</td>
                        <td>' . htmlspecialchars($row['status']) . '</td>
                    </tr>';
                }
            } else {
                echo '
                <tr>
                    <td colspan="5">No active notices available.</td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
    </div>
    <div class="col-md-6 card overflow-auto">
        <h3><a href="user.php">Latest Admin user</a></h3>
        <hr>
        <table class="table table-bordered table-striped ">
        <thead class="table-dark">
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch notices with active status
            $sql = "SELECT * FROM `admin` ORDER BY `id` DESC LIMIT 10";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <tr>
                        <td>' . htmlspecialchars($row['user_id']) . '</td>
                        <td>' . htmlspecialchars($row['name']) . '</td>
                        <td>' . htmlspecialchars($row['email']) . '</td>
                        <td>' . htmlspecialchars($row['phone']) . '</td>
                        <td>' . htmlspecialchars($row['address']) . '</td>
                    </tr>';
                }
            } else {
                echo '
                <tr>
                    <td colspan="5">No active notices available.</td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
    </div>
</section>
