<script>
function validform() {
    // Get form values
    var phone = document.getElementById('phone').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;

    // Validate phone number (must be 10 digits and numeric)
    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone)) {
        alert("Phone number must be a 10-digit number.");
        return false;
    }

    // Validate password (must contain at least one uppercase letter, one lowercase letter, one special character, and be more than 8 characters long)
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    if (!passwordRegex.test(password)) {
        alert("Password must contain at least one uppercase letter (A-Z), one lowercase letter (a-z), one special character, and must be more than 8 characters long.");
        return false;
    }

    // Validate that password and confirm password match
    if (password !== cpassword) {
        alert("Password and Confirm Password do not match.");
        return false;
    }

    // If all validations pass, allow the form to submit
    return true;
}
</script>

<?php
ob_start();
include "header.php";
include "../config.php";
require "../Mailer.php"; // Include the Mailer class

if (isset($_POST['sname'])) {
    $sname = $_POST['sname'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $date = date("Y-m-d"); // Current date

    // Check if passwords match
    if ($password !== $cpassword) {
        echo "<script>
                alert('Password and Confirm Password do not match.');
                window.history.back();
              </script>";
        exit;
    }

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
        $sql = "INSERT INTO `school_details`(`id`, `school_name`, `email`, `phone_no`, `state`, `pin_code`, `address`, `date`, `password`, `status`) VALUES ('','$scname','$mail','$phone','$state','$pin','$address','$date','$encrypted_password', 'inactive')";
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

        echo '<script>
            window.location.href = "index.php";
        </script>';
    }
}
?>



<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
    <style>
        .span {
            font-size: 0.8rem;
            color: red;
        }
    </style>


    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 mb-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Register your <br />
                    <span style="color: hsl(218, 81%, 75%)">School</span>
                </h1>

            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">

                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <span class="span">All field are required</span>
                    <div class="card-body px-4 py-5 px-md-5">
                        <form method="post" action="registerSchool.php" onsubmit="return validform()">

                            <!-- School Name -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">School Name</label><span
                                    class="span">*</span>
                                <input type="text" name="sname" id="sname" class="form-control" required />
                            </div>
                            <!-- email -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Email id</label><span
                                    class="span">*</span>
                                <input type="email" name="mail" id="mail" class="form-control" required />

                            </div>
                            <!-- telephone input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Phone no.</label><span
                                    class="span">*</span>
                                <input type="tel" name="phone" id="phone" class="form-control" required />
                                <span class="span">only 10 digit number like: 97******00</span>
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
                            <!-- pin input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">PIN code</label><span
                                    class="span">*</span>
                                <input type="text" name="pin" id="pin" class="form-control" required />
                            </div>
                            <!-- Adress input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Comunication Address</label><span
                                    class="span">*</span>
                                <input type="text" name="address" id="address" class="form-control" required />
                            </div>

                            <!-- chose password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Create Password</label><span
                                    class="span">*</span>
                                <input type="password" name="password" id="password" class="form-control" required />
                                <span class="span">
                                    Password must contain atleast one A-Z, a-z & one special charecter <br>
                                    Password must be more than 8 charecter
                                </span>
                            </div>
                            <!--confirm password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Confirm Password</label><span
                                    class="span">*</span>
                                <input type="password" name="cpassword" id="cpassword" class="form-control" required />
                            </div>




                            <!-- Submit button -->
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-block mb-4">
                                Sign up
                            </button>


                        </form>
                        <!-- Register buttons -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->





<?php
include "footer.php";
?>