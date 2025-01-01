<?php
ob_start();
include "header.php";
include "../config.php";

$s_id = $_SESSION['sid'];
$school_name = $_POST['school'];
$pin = $_POST['pin'];
$address = $_POST['address'];
$class = $_POST['class'];
$session = $_POST['session'];
$section = $_POST['section'];
$exam = $_POST['exam'];
$dob = $_POST['dob'];
$dob = (new DateTime($dob))->format('Y-m-d');
$roll = $_POST['roll'];

$result_table_name = "";
$subject_table_name = "";



// SQL query to select result_table_name and subject_table_name based on the input
$sql = "SELECT `result_table_name`, `subject_table_name` 
        FROM `published_result` 
        WHERE `school_id` = '$s_id' 
        AND `class` = '$class' 
        AND `session` = '$session' 
        AND `section` = '$section' 
        AND `exam_name` = '$exam'";

// Execute the query
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    
    // Store result_table_name and subject_table_name
    $result_table_name = $row['result_table_name'];
    $subject_table_name = $row['subject_table_name'];

}

$name = $gurdian_name = "";


// Query to get student_id based on Roll_no
$query1 = "SELECT `student_id` FROM `$result_table_name` WHERE `Roll_no` = '$roll'";
$result1 = mysqli_query($conn, $query1);

if ($result1 && mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_assoc($result1);
    $student_id = $row1['student_id'];

    // Query to get date_of_birth based on student_id
    $query2 = "SELECT * FROM `student_details` WHERE result_id = '$student_id'";
    $result2 = mysqli_query($conn, $query2);

    if ($result2 && mysqli_num_rows($result2) > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        $date_of_birth = $row2['date_of_birth'];
        
        if($date_of_birth = $dob){
            $name = $row2['name'];
            $gurdian_name = $row2['gurdian_name'];
        }

    } else {
        echo "No date of birth found for the given student_id.";
    }
} else {
    // No results found
    echo "<script>alert('Roll no or D-O-B may be wrong');</script>";
    echo "<script>window.location.href = '../index.php';</script>";
    exit; 
}


?>

<div style="height: 50px;"></div>

<section id="print-section" class="p-5 container">

    <div class="border border-dark">
        <style>
            .h2 {
                font-weight: 700;
                color: #1b1c2e;
            }
        </style>
        <!-------school name section------->
        <div class=" text-center border border-dark py-2">
            <h2 class="h2">
                <?php echo $school_name ?>
            </h2>
            <h6>
                <?php echo $address.' - '.$pin ?>
            </h6>
            <h4>
                <?php echo $session.'  |  '.$exam_name ?>
            </h4>
        </div>
        <!----------Name section---------------->
        <div class="p-3 border border-dark">

            <?php
                $result_query2 = "SELECT * FROM `$result_table_name` WHERE `Roll_no`='$roll'";
                $result_data2 = $conn->query($result_query2);
                $row2 = $result_data2->fetch_assoc();
                ?>
            <table class="table" style="border: none !important; ">
                <table style="width: 100%; border-collapse: collapse;">
                    <tbody>

                        <tr class=" ">
                            <td style="border: none; text-align: left; vertical-align: top;">
                                <table style="width: 100%; border-collapse: collapse;" class="p-3 table">
                                    <tr class="pb-3">
                                        <td style="border: none;  text-align: left;">Name:
                                            <?php echo $name; ?>
                                        </td>
                                        <td style="border: none; text-align: left;"></td>
                                    </tr>
                                    <tr class="pb-3">
                                        <td style="border: none;  text-align: left;">Father/Guardian Name:
                                            <?php echo $gurdian_name ?>
                                        </td>
                                        <td style="border: none; text-align: left;"></td>
                                    </tr>
                                    <tr class="pb-3">
                                        <td style="border: none;  text-align: left;">D.O.B:
                                            <?php echo $dob ?>
                                        </td>
                                        <td style="border: none; text-align: left;"></td>
                                    </tr>
                                </table>
                            </td>
                            <td style="border: none; text-align: left; vertical-align: top;">
                                <table style="width: 100%; border-collapse: collapse;" class="p-3 table">
                                    <tr class="pb-3">
                                        <td style="border: none;  text-align: left;">Class:
                                            <?php echo htmlspecialchars($class); ?>
                                        </td>
                                        <td style="border: none; text-align: left;"></td>
                                    </tr>
                                    <tr class="pb-3">
                                        <td style="border: none;  text-align: left;">Section:
                                            <?php echo htmlspecialchars($section); ?>
                                        </td>
                                        <td style="border: none; text-align: left;"></td>
                                    </tr>
                                    <tr class="pb-3">
                                        <td style="border: none;  text-align: left;">Roll no.:
                                            <?php echo htmlspecialchars($row2['Roll_no']); ?>
                                        </td>
                                        <td style="border: none; text-align: left;"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </tbody>
                </table>
        </div>


        <!--------result section----------->
        <div class=" p-3 border border-dark" style="width: 100%;">
            <table class="table table-bordered border-dark table-striped">
                <thead class="">
                    <tr style="">
                        <th class="text-center" style="width:40%; background-color:#a0a3a3 !important; color:white;">
                            Subjects</th>
                        <th class="text-center" style="width:20%; background-color:#a0a3a3 !important; color:white;">
                            Full Marks</th>
                        <th class="text-center" style="width:20%; background-color:#a0a3a3 !important; color:white;">
                            Pass Marks</th>
                        <th class="text-center" style="width:20%; background-color:#a0a3a3 !important; color:white;">
                            Marks Obtain</th>
                    </tr>


                    <?php
                    // Query to get all subject names
                    $subject_query = "SELECT `id`, `subject_name` FROM `$subject_table_name` WHERE 1";
                    $subject_result = $conn->query($subject_query);
    
                    // Query to get the result data for the specified student
                    $result_query = "SELECT * FROM `$result_table_name` WHERE  `Roll_no` = '$roll'";
                    $result_data = $conn->query($result_query)->fetch_assoc(); // Assuming only one result row per student
                    $count = 0;
                    $s_num = 0; // number of subject
                    if ($subject_result->num_rows > 0) {
    
    
                        // Loop through each subject
                        while ($subject_row = $subject_result->fetch_assoc()) {
                            $subject_name = $subject_row['subject_name'];
    
                            echo '<tr>';
                            echo '<th class="text-center">' . $subject_name . '</th>';
                            echo '<td class="text-center">' . $result_data['full_mark'] . '</td>';
                            echo '<td class="text-center">' . $result_data['pass_mark'] . '</td>';
    
                            // Print the corresponding data for the subject_name field from the result table
                            echo '<th class="text-center">' . $result_data[$subject_name] . '</th>';
                            if (is_numeric($result_data[$subject_name])) {
                                $count += $result_data[$subject_name];
                            }
                            $s_num +=1;
                            echo '</tr>';
                        }
    
    
                    } else {
                        echo 'No subjects found.';
                    }
                    ?>


                </thead>
            </table>
            <table class="table table-bordered border-dark">
                <thead>
                    <tr class="border border-dark">

                        <th class="text-center"
                            style="width:34%; background-color:#d1fcfc !important; border:none !important;"> Grand
                            total:
                            <?php echo $count; ?>
                        </th>
                        <th class="text-center border-right border-dark"
                            style="width:33%; background-color:#d1fcfc !important; ">Percentage: <?php $percentage = ($count / ($result_data['full_mark'] * $s_num)) * 100; 
                                                                                                                        echo number_format($percentage, 2); // This will print the  ?> %</th>
                        <th class="text-center border-right border-dark"
                            style="width:33%; background-color:#d1fcfc !important; ">Remark: <?php echo $result_data['remark'] ?> </th>


                    </tr>
                </thead>
            </table>

            <!--------signeture ----- -->
            <div class="d-flex justify-content-between text-center mt-5 border-dark">
                <div class="card border-0 px-2" style="width: 18rem;">
                    <div style="height:50px;"></div>
                    <hr>
                    <div class="card-body" style="padding:none !important">
                        <p class="card-text">Class Teacher's signeture</p>
                    </div>
                </div>
                <div class="card border-0 px-2" style="width: 18rem;">
                    <div style="height:50px;"></div>
                    <hr>
                    <div class="card-body" style="padding:none !important">
                        <p class="card-text">Office Seal</p>
                    </div>
                </div>
                <div class="card border-0 px-2" style="width: 18rem;">
                    <div style="height:50px;"></div>
                    <hr>
                    <div class="card-body" style="padding:none !important">

                        <p class="card-text">Principal's signeture</p>
                    </div>
                </div>
            </div>
        </div>

        <!--------disclemer----->
        <div class="p-3 border border-dark">
            <p style="color:red;">Disclaimer:</p>
            <p style="font-size:.8rem;">The result displayed on this website is an internet-generated copy for
                informational
                purposes only and is
                not the official document. The original result, signed and sealed by the authorized personnel of the
                institute, will be provided directly by the institution.&nbsp;&nbsp; This version may not include any
                updates or corrections. For any official use, please obtain the
                certified copy from the institute, which will carry the proper signatures and seal. The institute is not
                responsible for any discrepancies or misuse of this online copy. Always refer to the original for
                official purposes.</p>
        </div>
    </div>


</section>



<div class="text-center mt-3">
    <button onclick="printSection()" class="btn btn-primary">Print</button>
</div>







<?php


// Get current date
$current_date = date('Y-m-d');

// Check if there's an existing entry for today's date
$check_query = "SELECT `id` FROM `login_count` WHERE `date` = ?";
$stmt = $conn->prepare($check_query);
$stmt->bind_param("s", $current_date);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // If entry exists, update the school_login count
    $update_query = "UPDATE `login_count` SET `result_page` = `result_page` + 1 WHERE `date` = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("s", $current_date);
    $update_stmt->execute();
} else {
    // If no entry exists, insert a new row for today's date
    $insert_query = "INSERT INTO `login_count` (`date`, `result_page`) VALUES (?, 1)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("s", $current_date);
    $insert_stmt->execute();
}




include "footer.php";
?>

<!-- print function -->

<script>
    function printSection() {
        var printContents = document.getElementById('print-section').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>