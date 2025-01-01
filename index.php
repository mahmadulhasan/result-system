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
$sql2 = "SELECT slider1, slider2, slider3, home_img, home_heading, home_body FROM pages WHERE id = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $id);
$stmt2->execute();
$stmt2->bind_result($slider1, $slider2, $slider3, $home_img, $home_heading, $home_body);
$stmt2->fetch();
$stmt2->close();

?>


<section class="py-5" style="max-height:500px; width:100% !important; overflow:hidden;">
    <div id="carouselExample" class="carousel slide " data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo htmlspecialchars($slider1); ?>" class="d-block w-100" alt="...">
          <div class="carousel-caption text-start">
            <h1>You Lived For So Long, Now Once Put Your Life On The Line;</h1>
            <h1>The Same Hands You Use For Only Prayers, With Weapons Let Once Those Shine</h1>
            <h3>- Kazi Nazrul Islam</h3>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo htmlspecialchars($slider2); ?>" class="d-block w-100" alt="...">
          <div class="carousel-caption text-start">
            <h1>To succeed in your mission, you must have single</h1>
            <h1>– minded devotion to your goal.</h1>
            <h3>- APJ Abdul Kalam </h3>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo htmlspecialchars($slider3); ?>" class="d-block w-100" alt="...">
          <div class="carousel-caption text-start">
            <h1>The highest education is that which does not merely give us Information but makes our life in harmony with all existence.</h1>
            <h3>— Rabindranath Tagore</h3>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</section>

<style>

</style>

<section class="home-1 home-2 row   p-5">
    <div class="col-md-6 text-center p-5">
        <h3><?php echo htmlspecialchars($home_heading); ?></h3>
        <p><?php echo htmlspecialchars($home_body); ?></p>
    </div>
    <div class="col-md-6 p-5 overflow-hidden">
        <img src="<?php echo htmlspecialchars($home_img); ?>">
    </div>
    
</section>

<section class="container my-5 text-center">
    <h1 class="heading display-5 fw-bold" style="color: hsl(218, 51%, 55%)">Notice</h1>
    <div class="row d-flex justify-content-center flex-wrap">
        <?php
        // Fetch notices with active status for the home page
        $sql = "SELECT `id`, `heading`, `body`, `status`, `page`, `date` FROM `notice` WHERE `page` = 'home' AND `status` = 'active' ORDER BY `id` DESC LIMIT 5";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="col-md-3 d-flex align-items-stretch mb-4">
                    <div class="card w-100 h-100">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-start"><p class="card-text"><small class="text-muted">' . htmlspecialchars($row['date']) . '</small></p></li>
                                <li class="list-group-item">
                                    <h5 class="card-title">' . htmlspecialchars($row['heading']) . '</h5>
                                    <p class="card-text">' . htmlspecialchars($row['body']) . '</p>
                                </li>
                             </ul>
                        </div>
                    </div>
                </div>';
            }
        } else {
            // Display a card if no notices are found
            echo '
            <div class="col-md-3 d-flex align-items-stretch mb-4">
                <div class="card w-100 h-100">
                    <div class="card-body">
                        <p class="card-text">No active notices available.</p>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</section>



<!--<section class="contact container" action="send_mail.php" id="contact">-->
<!--    <h1 class="heading display-5 fw-bold" style="color: hsl(218, 51%, 55%)">Contact Us</h1>-->
<!--    <form action="send_mail.php" method="POST" class="contact-form" id="contact-form">-->
<!--        <input type="text" id="name" name="name" placeholder="Your Name" required>-->
<!--        <input type="email" id="email" name="email" placeholder="Email Address" class="email" required>-->
<!--        <textarea id="message" name="message" cols="30" rows="10" placeholder="Write message here..." class="message" style="background:white !important;" required></textarea>-->
<!--        <input type="hidden" name="page" value="index">-->
<!--        <input type="submit" value="Send" class="send-btn">-->
<!--    </form>-->
<!--</section>-->


<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!--<script>-->
<!--    $('#contact-form').on('submit', function(e) {-->
<!--        e.preventDefault();-->
        
<!--        $.ajax({-->
            <!--url: 'send_mail.php', // PHP file to handle sending the mail-->
<!--            type: 'POST',-->
<!--            data: {-->
<!--                name: $('#name').val(),-->
<!--                email: $('#email').val(),-->
<!--                message: $('#message').val()-->
<!--            },-->
<!--            success: function(response) {-->
<!--                alert(response);-->
                <!--$('#contact-form')[0].reset(); // Clear the form fields after submission-->
<!--            },-->
<!--            error: function() {-->
<!--                alert("There was an error sending your message.");-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->


<?php
include "footer.php";
?>