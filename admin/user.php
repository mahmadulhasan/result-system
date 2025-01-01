<?php
include "../config.php";
include "header.php";
require "../Mailer.php"; // Include the Mailer class

if($_SESSION['admin-login'] != true){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}

if(($_SESSION['admin-login'] != true)&&($_SESSION['position'] == 'super_admin')){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('You don't have authorization');</script>";
    exit();
}

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    
    // Check for duplicate email or phone
    $duplicate_check_query = "SELECT * FROM `admin` WHERE `email` = '$email' OR `phone` = '$phone'";
    $duplicate_check_result = $conn->query($duplicate_check_query);
    
    if ($duplicate_check_result->num_rows > 0) {
        echo "<script>alert('An account with this email or phone number already exists.');</script>";
    } else {
        $query = "INSERT INTO `admin`(`id`, `name`, `email`, `phone`, `address`, `date`,`position`) VALUES ('','$name','$email','$phone','$address', NOW(),'admin')";
        
        if ($conn->query($query) === TRUE) {
            $inserted_id = $conn->insert_id;
            $current_year = date("Y");
            $user_id = "AD100" . $current_year . $inserted_id;
            
            $default_password = password_hash("ikeworld", PASSWORD_BCRYPT);

            $update_query = "UPDATE `admin` SET `user_id` = '$user_id', `password` = '$default_password' WHERE `id` = $inserted_id";
            
            if ($conn->query($update_query) === TRUE) {
                // Instantiate Mailer class and send email
                $mailer = new Mailer();
                $subject = "Congratulations, New Admin!";
                $body = "
                    <h2>Congratulations on becoming a new admin!</h2>
                    <p>You can now manage your account.</p>
                    <p><strong>Temporary Password:</strong> ikeworld</p>
                    <p>Please update your password as soon as possible: <a href='https://result.demoikeworld.com/admin/Forget_password'>Reset Password</a></p>
                ";

                $mailStatus = $mailer->sendMail($email, $name, $subject, $body);

                if ($mailStatus === "Email sent successfully.") {
                    echo "<script>
                            alert('Admin added successfully. Email sent successfully.');
                            window.location.href = 'user.php';
                          </script>";
                } else {
                    echo "<script>
                            alert('Admin added successfully, but there was an error sending the email: $mailStatus');
                            window.location.href = 'user.php';
                          </script>";
                }
            } else {
                echo "Error updating user_id and password: " . $conn->error;
            }
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}
?>



<section class="m-5" style="background:none !important;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>User</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New User+
        </button>
    </div>
    <hr>

   <!-- Bootstrap Table structure-->
    <div class="mt-4 text-center overflow-auto">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Joining Date</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    
            <?php
            // Query to fetch data in descending order of `id`
            $query = "SELECT `id`, `user_id`, `name`, `email`, `phone`, `address`,`date`, `position` FROM `admin` ORDER BY `id` DESC";
            $result = $conn->query($query);
    
            // Initialize serial number counter
            $serial_no = 1;
    
            // Check if there are results and display them in the table
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $serial_no++ . '</td>
                            <td>' . $row["user_id"] . '</td>
                            <td>' . $row["name"] . '</td>
                            <td>' . $row["email"] . '</td>
                            <td>' . $row["phone"] . '</td>
                            <td>' . $row["address"] . '</td>
                            <td>' . $row["date"] . '</td>
                            <td>' . $row["position"] . '</td>
                            <td>
                                    <select class="form-select" onchange="updateStatus(' . $row['id'] . ', this.value)">
                                        <option value="admin"' . ($row["position"] === 'admin' ? ' selected' : '') . '>Admin	</option>
                                        <option value="super_admin"' . ($row["position"] === 'super_admin' ? ' selected' : '') . '>Super Admin</option>
                                    </select>
                                    <button type="button" class="btn btn-danger mt-2" onclick="confirmDelete(' . $row['id'] . ')">Remove</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for Notice Submission -->
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="heading" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="page" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="page" class="col-form-label">Phone No:</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="page" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit_notice">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    function updateStatus(id, position){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","update_admin_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 && xhr.status === 200){
                alert(xhr.responseText); // Display the response from the server
            }
        };
        xhr.send("id="+id+"&position="+position);
    }
         // Function to confirm deletion
    function confirmDelete(id) {
        // Ask for confirmation
        var confirmation = confirm("Are you sure?  This will permanently remove the Admin.");
        if (confirmation) {
            // If confirmed, redirect to the delete action
            window.location.href = "delete_admin.php?id=" + id;
        }
    }
</script>


<?php
include "footer.php";
?>