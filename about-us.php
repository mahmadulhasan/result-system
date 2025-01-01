<?php
include "config.php";
include "header.php";

function updatePageCount($conn, $pageColumn) {
    $currentDate = date('Y-m-d');

    // Check if an entry exists for today
    $query = "SELECT id FROM visitor_counts WHERE date = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $currentDate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the count for the specific page
        $updateQuery = "UPDATE visitor_counts SET $pageColumn = $pageColumn + 1 WHERE date = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("s", $currentDate);
        $updateStmt->execute();
    } else {
        // Insert a new record with the initial count
        $insertQuery = "INSERT INTO visitor_counts (date, $pageColumn) VALUES (?, 1)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("s", $currentDate);
        $insertStmt->execute();
    }
}
$page = basename($_SERVER['PHP_SELF']); // Get the current page name

if ($page == 'index.php') {
    updatePageCount($conn, 'homepage_count');
} elseif ($page == 'about-us.php') {
    updatePageCount($conn, 'aboutpage_count');
} elseif ($page == 'contact-us.php') {
    updatePageCount($conn, 'contactpage_count');
}




// Fetch current values from the database
$id = 1;
$sql2 = "SELECT about_img_1, about_img_2, about_img_3, about_c1_heading, about_c1_body, about_c2_heading, about_c2_body, about_c3_heading, about_c3_body FROM pages WHERE id = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $id);
$stmt2->execute();
$stmt2->bind_result($about_img_1, $about_img_2, $about_img_3, $about_c1_heading, $about_c1_body, $about_c2_heading, $about_c2_body, $about_c3_heading, $about_c3_body);
$stmt2->fetch();
$stmt2->close();


?>

<style>
    body{
        background:none !important;
        overflow-x: hidden;
    }
    .p {
        text-align: justify !important;
        word-wrap: break-word; /* Ensures long words break */
        white-space: normal;   /* Prevents text from staying on one line */
        font-weight: 200;
    }

</style>

<section class="about-1  row overflow-hidden">
    <div class="col-md-6 px-5 container d-flex justify-content-center">
        <img src="<?php echo htmlspecialchars($about_img_1); ?>">
    </div>
    
    <!-- Who We Are Section -->
    <div class="col-md-6 container " style="padding:100px 50px;">
        <div>
            <h3><?php echo htmlspecialchars($about_c1_heading); ?></h3>
            <p class="mx-auto"><?php echo htmlspecialchars($about_c1_body); ?>
            </p>
        </div>
    </div>
</section>



<section class="about-1 py-5 about-2" style="width:100% !important;">
  <div class="container row">
      
      <!-- What We Do Section -->
      <div class="col-md-6 container" style="padding:100px 50px;">
        <h3 style=" text-align: none !important;"><?php echo htmlspecialchars($about_c2_heading); ?></h3>
        <p><?php echo htmlspecialchars($about_c2_body); ?></p>
      </div>
      <div class="col-md-6 container d-flex justify-content-center">
        <img src="<?php echo htmlspecialchars($about_img_2); ?>">
    </div>
      
      
  </div>
</section>
<section class="about-1 py-5 row" style="background:none !important; color:#001f4c;">
    <div class="col-md-6 container d-flex justify-content-center">
        <img src="<?php echo htmlspecialchars($about_img_3); ?>">
    </div>
  <div class="col-md-6 container" style="padding:100px 50px;">
      <!-- Our Mission and Vision Section -->
      <div class="">
        <h3><?php echo htmlspecialchars($about_c3_heading); ?></h3>
        <p><?php echo htmlspecialchars($about_c3_body); ?></p>
      </div>
      
  </div>
</section>







<?php
include "footer.php";
?>