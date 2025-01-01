<?php
include "config.php";
include "header.php";
$page_name = $_GET['subject'];

// Prepare and execute the SQL query
$sql2 = "SELECT heading1, body1, image1, heading2, body2, image2 FROM new_pages WHERE `page_name` = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("s", $page_name); // Bind $page_name as a string parameter
$stmt2->execute();
$stmt2->store_result();

// Check if data exists
if ($stmt2->num_rows > 0) {
    $stmt2->bind_result($heading1, $body1, $image1, $heading2, $body2, $image2);
    $stmt2->fetch();
} else {
    die("No content found for the specified page.");
}


?>
<style>
    /* Ensure no horizontal overflow */
    html, body {
        margin: 0;
        padding: 0;
        width: 100%; /* Enforce full width */
    }

    
    .body {
        background: radial-gradient(circle at center, rgba(58, 155, 247, 0.95) 0%, rgba(160, 206, 250, 0.95) 100%) !important;
        width: 100%;
    }

    .about-1 {
        background: none !important;
        min-height: 100vh;
        width: 100%;
        margin: 0;
        padding: 0;
    }


    /* Container alignment fixes */
    .container {
        max-width: 100%;
        padding-left: 15px; /* Default Bootstrap padding */
        padding-right: 15px;
    }
</style>

<div class="body">
    <section class="about-1 row ">
        <div class="col-md-6  p-5 container d-flex justify-content-center">
            <img src="<?php echo htmlspecialchars($image1); ?>" alt="Image 1">
        </div>
        <div class="col-md-6 container" style="padding: 100px 50px;">
            <div>
                <h3 style="color:blue;"><?php echo htmlspecialchars($heading1); ?></h3>
                <p class="mx-auto" style="color:black;"><?php echo htmlspecialchars($body1); ?></p>
            </div>
        </div>
    </section>

    <section class="about-1 py-5">
        <div class="container row">
            <div class="col-md-6 container" style="padding: 100px 50px;">
                <h3><?php echo htmlspecialchars($heading2); ?></h3>
                <p><?php echo htmlspecialchars($body2); ?></p>
            </div>
            <div class="col-md-6 container d-flex justify-content-center">
                <img src="<?php echo htmlspecialchars($image2); ?>" alt="Image 2">
            </div>
        </div>
    </section>
</div>


<?php
include "footer.php";
?>