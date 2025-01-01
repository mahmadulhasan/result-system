<?php
include "config.php";
include "header.php";

?>

<section id="disclaimer" style="padding: 40px; " class="py-5">
    <div class="container py-5">
        <h2 style="font-weight:600; font-size:2.3rem;">Disclaimer</h2>
        <p>
            The information provided on Ikeworld Pvt. Ltd. is for general information purposes only. While we strive to ensure
            the accuracy and reliability of the data presented, Result Demoikeworld makes no guarantees or warranties of any kind,
            express or implied, about the completeness, accuracy, reliability, or suitability of the information.
        </p>

<?php
            $sql = "SELECT `heading`, `body` FROM `disclaimer` WHERE 1";
            $result = $conn->query($sql);
            if($result)
            {
                while($row = $result->fetch_assoc()){
                    echo "<h3>".$row['heading']."</h3>";
                    echo "<p>".$row['body']."</p>";
                }
            }
        ?>
    </div>
</section>


<?php
include "footer.php";
?>