<?php
include "../config.php";
include "header.php";

if($_SESSION['admin-login'] != true){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}

if(($_SESSION['admin-login'] != true)&&($_SESSION['position'] == 'super_admin')){
    echo "<script>window.location.href = 'message.php';</script>";
    echo "<script>alert('You don't have authorization');</script>";
    exit();
}
?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
    }
</style>

<section class="m-5" style="background:none !important;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>All Messages</h3>
        
    </div>
    <hr>
    
    <div class="overflow-auto">
    <!-- Table data here -->
        <table class="table table-bordered table-striped ">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to fetch data in descending order of `id`
                $query = "SELECT `id`, `name`, `email`, `message`, `date` FROM `contact_form`   ORDER BY `id` DESC LIMIT 10";
                $result = $conn->query($query);
        
                // Initialize serial number counter
                $serial_no = 1;
        
                // Check if there are results and display them in the table
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>' . $serial_no++ . '</td>
                                <td>' . htmlspecialchars($row["date"]) . '</td>
                                <td>' . htmlspecialchars($row["name"]) . '</td>
                                <td><a href="mailto:' . htmlspecialchars($row["email"]) . '">' . htmlspecialchars($row["email"]) . '</a></td>
                                <td>' . htmlspecialchars($row["message"]) . '</td>
                              </tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No records found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</section>


<?php include "footer.php"; ?>
