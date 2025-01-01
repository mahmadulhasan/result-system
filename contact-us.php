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



?>



<div style="width:100%; overflow-x: hidden;">


    <section>
        <div class="contact-intro">
            <h1>Contact Us <br> </h1>
            <h6>Fell free to contact us <br></h6>
            <h3><br>Call: (+91) 033 4180 7777</h3>
        </div>
    </section>


    <section style="background: #afcffc1c;">
        <div class="container" style="padding: 0 0 10% 0;">
            <div class="row justify-content-lg-center">
                <div class="col-12 col-lg-9">
                    <div class="bg-white border rounded shadow-sm overflow-hidden form" style="border: none !important;">
                        <form id="contact-form" action="send_mail.php" method="post">
                            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label">Your Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">Email <i class='bx bx-envelope'></i></label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter your message here" required style="height: 200px;"></textarea>
                                </div>
                                <input type="hidden" name="page" value="contact">
                                <div class="col-2">
                                    <div class="">
                                        <button type="submit">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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





</div>






<?php
include "footer.php";
?>