<?php
include "../config.php";
include "header.php";
require "../Mailer.php"; // Include the Mailer class
if($_SESSION['admin-login'] != true){
    echo "<script>window.location.href = 'index.php';</script>";
    echo "<script>alert('Login first please.');</script>";
    exit();
}

if (isset($_POST['add_school'])) {
    $sname = $_POST['school_name'];
    $mail = $_POST['email'];
    $phone = $_POST['Phone_no'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $address = $_POST['address'];
    $password = 'ikeworld';
    $date = date("Y-m-d"); // Current date

    

    // Encrypt the password if they match
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

    $scname = strtoupper($sname);

    $sql2 = "SELECT `id` FROM `school_details` WHERE `email` = '$mail'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        echo "<script>
                alert('Email already present');
                window.history.back();
              </script>";
        exit;
    } else {
        $sql = "INSERT INTO `school_details`(`id`, `school_name`, `email`, `phone_no`, `state`, `pin_code`, `address`,`date`, `password`,`status`) VALUES ('','$scname','$mail','$phone','$state','$pin','$address','$date','$encrypted_password', 'inactive')";
        $result = $conn->query($sql);

        if ($result) {
            $inserted_id = $conn->insert_id;
            $className = $inserted_id."_class_details";
            $resultTableName = $inserted_id."_resulttablename";

            $sql3 = "CREATE TABLE `$className` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `class_no` INT(11) NOT NULL,
                `section` VARCHAR(50) NOT NULL,
                `session` VARCHAR(50) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            
            $result3 = $conn->query($sql3);

            $sql4 = "CREATE TABLE `$resultTableName` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `result_table_name` VARCHAR(255) NOT NULL,
                `subject_table_name` VARCHAR(255) NOT NULL,
                `exam_name` VARCHAR(255) NOT NULL,
                `class_id` INT(50) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            
            $result4 = $conn->query($sql4);

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $mailer = new Mailer();
        $subject = "Congratulations, $sname";
        $body = "
                    <h2>Congratulations! Your School has been registered </h2>
                    <h2>School name:- $sname </h2>
                    <p>You can now manage your account.</p>
                    <p><strong>Temporary Password:</strong> ikeworld</p>
                    <p>Please update your password as soon as possible: <a href='https://result.demoikeworld.com/School/Forget_password/'>Reset Password</a></p>
                    <br><br>
                    <p>Please wait for admin to active your school then you can perform evry activity and funtionality</p>
                    <p>Thank you</p>
                    <P>result.demoikeworrld.com</p>
                ";

        $mailStatus = $mailer->sendMail($mail, $sname, $subject, $body);

        
        echo "<script>
            alert('School added successfully');
        </script>";
    }
}

?>

<section class="m-5" style="background:none !important;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3>School Details</h3>
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addschool">
            Add New School +
        </button>
    </div>
    <hr>

    <!-- Bootstrap Table structure-->
    <div class="mt-4 text-center overflow-auto">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>School Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>State</th>
                    <th>PIN Code</th>
                    <th>Address</th>
                    <th>Date of Join</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
            // Query to fetch data in descending order of `id`
            $query = "SELECT `id`, `school_name`, `email`, `phone_no`, `state`, `pin_code`, `address`,`date`, `status` FROM `school_details` ORDER BY `id` DESC";
            $result = $conn->query($query);

            // Initialize serial number counter
            $serial_no = 1;

            // Check if there are results and display them in the table
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $serial_no++ . '</td>
                            <td>' . htmlspecialchars($row["school_name"]) . '</td>
                            <td><a href="mailto:' . htmlspecialchars($row["email"]) . '">' . htmlspecialchars($row["email"]) . '</a></td>
                            <td>' . htmlspecialchars($row["phone_no"]) . '</td>
                            <td>' . htmlspecialchars($row["state"]) . '</td>
                            <td>' . htmlspecialchars($row["pin_code"]) . '</td>
                            <td>' . htmlspecialchars($row["address"]) . '</td>
                            <td>' . htmlspecialchars($row["date"]) . '</td>
                            <td>
                                <select class="form-select" onchange="updateStatus(' . $row['id'] . ', this.value)">
                                    <option value="active" ' . ($row['status'] === 'active' ? 'selected' : '') . '>Active</option>
                                    <option value="inactive" ' . ($row['status'] === 'inactive' ? 'selected' : '') . '>Inactive</option>
                                </select>
                            </td>
                          </tr>';
                }
            } else {
                echo '<tr><td colspan="8">No records found.</td></tr>';
            }

            ?>

            </tbody>
        </table>
    </div>
</section>


<!-- adschool Modal -->
<div class="modal fade" id="addschool" tabindex="-1" aria-labelledby="addschool" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addschool">Add New School</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label  class="form-label">School Name</label>
                        <input type="text" class="form-control" name="school_name" id="school_name" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Phone No.</label>
                        <input type="text" class="form-control" name="Phone_no" id="Phone_no" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Pin</label>
                        <input type="text" class="form-control" name="pin" id="pin" required>
                    </div>
                    <!-- state input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">State</label><span class="span">*</span>
                                <select id="state" name="state" class="form-control" required>
                                    <option value="West Bengal">West Bengal</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                </select>
                            </div>
                    <button type="submit" name="add_school" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>






<script>
   
    function updateStatus(id, status) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_school_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        // Send data
        xhr.send("id=" + id + "&status=" + status);
    
        // Handle the response
        xhr.onload = function() {
            if (xhr.status == 200) {
                alert(xhr.responseText); // Display the response from the server
                // Display response in alert
                alert("Status: " + response.status + "\nMessage: " + response.message);
            } else {
                alert("Error: " + xhr.statusText);
            }
        };
    }

</script>

<?php
include "footer.php";
?>
