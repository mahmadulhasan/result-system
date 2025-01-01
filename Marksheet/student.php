<?php
ob_start();
include "header.php";
include "../config.php";
$school = "";
$pin = "";
$state = "";
if (isset($_POST['state'])) {
    $state = $_POST['state'];
}
if (isset($_POST['pin'])) {
    $pin = $_POST['pin'];
}
if (isset($_POST['school'])) {
    $school = $_POST['school'];
}


$sql = "SELECT `id`, `address` FROM `school_details` WHERE  `school_name` = '$school' AND `state` ='$state' AND `pin_code` ='$pin'";

$result = $conn->query($sql);
if(!$result)
 {  echo "something wrong";
     exit;
     
 }
$row = $result->fetch_assoc();
$s_id = $row['id'];
$_SESSION['sid'] = $s_id;
$address = $row['address'];


?>



<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">


    <div class="container px-4 py-5 px-md-5  text-lg-start my-5">
        <div class="row gx-lg-5  mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Select your  <br />
                    <span style="color: hsl(218, 81%, 75%)">details</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form action="view-result.php" method="post">
                            <!-- Class -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="class">Class</label>
                                <select id="class" name="class" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>

                            <!-- Session -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="session">Session</label>
                                <select id="session" name="session" class="form-control">
                                </select>
                            </div>

                            <!-- Section -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="section">Section</label>
                                <select id="section" name="section" class="form-control">
                                    
                                </select>
                            </div>

                            <!-- Exam Name -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="exam">Exam Name</label>
                                <select id="exam" name="exam" class="form-control">
                                    
                                </select>
                            </div>

                            

                            <!-- Roll No -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="roll">Roll No</label>
                                <input type="text" name="roll" id="roll" class="form-control" />
                            </div>
                            <!-- Name -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" />
                            </div>

                            <input type="hidden" name="school" value="<?php echo $school; ?>">
                            <input type="hidden" name="pin" value="<?php echo $pin; ?>">
                            <input type="hidden" name="address" value="<?php echo $address; ?>">

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Sign in
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<?php
include "footer.php";
?>


<!-- request ajax -->
 <script>
document.getElementById('class').addEventListener('change', function () {
    var class_no = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_sessions.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById('session').innerHTML = this.responseText;
            document.getElementById('section').innerHTML = '<option value="">--Select--</option>'; // Reset section
            document.getElementById('exam').innerHTML = '<option value="">--Select--</option>';   // Reset exam
        }
    };
    xhr.send('class_no=' + class_no);
});

document.getElementById('session').addEventListener('change', function () {
    var class_no = document.getElementById('class').value;
    var session = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_sections.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById('section').innerHTML = this.responseText;
            document.getElementById('exam').innerHTML = '<option value="">--Select--</option>';   // Reset exam
        }
    };
    xhr.send('class_no=' + class_no + '&session=' + session);
});

document.getElementById('section').addEventListener('change', function () {
    var class_no = document.getElementById('class').value;
    var session = document.getElementById('session').value;
    var section = this.value;
    var s_id = "<?php echo $s_id; ?>";  // Get the s_id value

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_exams.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status === 200) {
            console.log(this.responseText);  // Debugging: log the response
            document.getElementById('exam').innerHTML = this.responseText;
        } else {
            console.error('Error: ' + this.status);  // Handle any HTTP errors
        }
    };
    xhr.send('class_no=' + class_no + '&session=' + session + '&section=' + section + '&s_id=' + s_id); // Send s_id along with other data
});



 </script>