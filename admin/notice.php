<?php
include "../config.php"; // Database connection
include "header.php"; // Include header file
if($_SESSION['admin-login'] != true){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}

if (isset($_POST['submit_notice'])) {
    // Retrieve form data
    $heading = $conn->real_escape_string($_POST['heading']);
    $body = $conn->real_escape_string($_POST['body']);
    $page = $conn->real_escape_string($_POST['page']);
    $status = $conn->real_escape_string($_POST['status']);
    $date = date("Y-m-d"); // Get current date in Y-m-d format

    // Insert data into the `notice` table
    $query = "INSERT INTO `notice` (`heading`, `body`, `status`, `page`, `date`) 
              VALUES ('$heading', '$body', '$status', '$page', '$date')";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Notice added successfully');</script>";
        // Redirect to avoid re-submission on page reload
        header("Location: notice.php");
        exit(); // Stop further script execution
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<section class="m-5" style="background:none !important;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>NOTICE</h3>
        <!-- Button to Open Modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New Notice +
        </button>
    </div>
    <hr>

    <!-- Bootstrap Table structure -->
    <div class="mt-4 text-center overflow-auto">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>Heading</th>
                    <th>Body</th>
                    <th>Status</th>
                    <th>Page</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to fetch data in descending order of `id`
                $query = "SELECT `id`, `heading`, `body`, `status`, `page`, `date` FROM `notice` ORDER BY `id` DESC";
                $result = $conn->query($query);
    
                // Initialize serial number counter
                $serial_no = 1;
    
                // Check if there are results and display them in the table
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>' . $serial_no++ . '</td>
                                <td>' . htmlspecialchars($row["heading"]) . '</td>
                                <td>' . htmlspecialchars($row["body"]) . '</td>
                                <td>' . htmlspecialchars($row["status"]) . '</td>
                                <td>' . htmlspecialchars($row["page"]) . '</td>
                                <td>' . htmlspecialchars($row["date"]) . '</td>
                                <td>
                                    <select class="form-select" onchange="updateStatus(' . $row['id'] . ', this.value)">
                                        <option value="active"' . ($row["status"] === 'active' ? ' selected' : '') . '>Active</option>
                                        <option value="inactive"' . ($row["status"] === 'inactive' ? ' selected' : '') . '>Inactive</option>
                                    </select>
                                    <button type="button" class="btn btn-danger mt-2" onclick="confirmDelete(' . $row['id'] . ')">Delete</button>
                                </td>
                              </tr>';
                    }
                } else {
                    echo '<tr><td colspan="7">No records found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</section>



  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Notice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for Notice Submission -->
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="heading" class="col-form-label">Heading:</label>
                            <input type="text" class="form-control" id="heading" name="heading" required>
                        </div>
                        <div class="mb-3">
                            <label for="body" class="col-form-label">Body:</label>
                            <textarea class="form-control" id="body" name="body" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="page" class="col-form-label">Page to publish:</label>
                            <select class="form-select" name="page" required>
                                <option value="home">Home Page</option>
                                <option value="school">School Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="col-form-label">Status:</label>
                            <select class="form-select" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit_notice">Add Notice</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
include "footer.php"; // Include footer file
?>
<script>
    function updateStatus(id, status) {
        // Create an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_notice_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send the data to update the status
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText); // Display the response from the server
            }
        };
        xhr.send("id=" + id + "&status=" + status);
    }
     // Function to confirm deletion
    function confirmDelete(id) {
        // Ask for confirmation
        var confirmation = confirm("Are you sure? This will permanently delete the notice.");
        if (confirmation) {
            // If confirmed, redirect to the delete action
            window.location.href = "delete_notice.php?id=" + id;
        }
    }

    // Function to update the status via AJAX (if needed)
    function updateStatus(id, status) {
        // Send a request to update the status (not implemented here)
        // For example, use fetch or XMLHttpRequest to update the status in the database
    }
</script>
