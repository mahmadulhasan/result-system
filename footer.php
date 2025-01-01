<style>
    /* Make the body take the full height of the viewport and use flexbox */




/* Footer styling to stick it at the bottom */
.footer {
    background: #f1f1f1;
    text-align: center;
    padding: 1rem 0;
    width: 100%;
    position: relative;
    bottom: 0;
}

</style>
<?php

// Fetch current values from the database
$id = 1;
$q2 = "SELECT `facebook`, `instagram`, `linkedin`, `copy_right` FROM pages WHERE id = ?";
$st = $conn->prepare($q2);
$st->bind_param("i", $id);
$st->execute();
$st->bind_result($facebook, $instagram, $linkedin, $copy_right);
$st->fetch();
$st->close();

?>
<!-- footer -->
<section class="footer container" id="fotter">
    <div class="social2">
        <a href="<?php echo htmlspecialchars($linkedin); ?>"><i class='bx bxl-linkedin'></i></a>
        <a href="<?php echo htmlspecialchars($facebook); ?>"><i class='bx bxl-facebook'></i></a>
        <a href="<?php echo htmlspecialchars($instagram); ?>"><i class='bx bxl-instagram'></i></a>

    </div>
    <div class="footer-links">
        <a href=" privecy-policy.php">Privecy Policy</a>
        <a href="terms-of-use.php">Terms of Use</a>
        <a href="disclaimer.php">Disclaimer</a>
    </div>
    <!-- copyright -->
    <p><?php echo htmlspecialchars($copy_right); ?></p>
</section>

<!--  link to js -->
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>