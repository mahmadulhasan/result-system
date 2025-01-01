<?php
include "../config.php";
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $school_name = $_POST['school_name'];
    $school_add = $_POST['school_add'];
    $school_pin = $_POST['school_pin'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $session = $_POST['session'];
    $exam_name = $_POST['exam_name'];

    $query = "SELECT * FROM `published_result` WHERE `id` = $id";
    $res = $conn->query($query);
    $row = $res->fetch_assoc();
    $result_table_name = $row['result_table_name'];
    $subject_table_name = $row['subject_table_name'];

    ?>


    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Please enter your <br />
                        <span style="color: hsl(218, 81%, 75%)">Roll no and Date of Birth</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="post" action="view-result.php">
                                <!-- name input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">Roll no.</label>
                                    <input type="text" name="roll" id="roll" class="form-control" required/>
                                </div>
                                <!-- dob input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">Date of birth</label>
                                    <input type="date" name="dob" id="dob" class="form-control" required/>
                                </div>

                                <!-- hidden data -->
                                <input type="hidden" name="school_name" value="<?php echo htmlspecialchars($school_name); ?>">
                                <input type="hidden" name="school_add" value="<?php echo htmlspecialchars($school_add); ?>">
                                <input type="hidden" name="school_pin" value="<?php echo htmlspecialchars($school_pin); ?>">
                                <input type="hidden" name="class" value="<?php echo htmlspecialchars($class); ?>">
                                <input type="hidden" name="section" value="<?php echo htmlspecialchars($section); ?>">
                                <input type="hidden" name="session" value="<?php echo htmlspecialchars($session); ?>">
                                <input type="hidden" name="exam_name" value="<?php echo htmlspecialchars($exam_name); ?>">
                                <input type="hidden" name="result_table_name" value="<?php echo htmlspecialchars($result_table_name); ?>">
                                <input type="hidden" name="subject_table_name" value="<?php echo htmlspecialchars($subject_table_name); ?>">

                                <!-- Submit button -->
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-danger btn-block mb-4">
                                    See Result
                                </button>


                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Section: Design Block -->





    <?php
}




include "footer.php";
?>