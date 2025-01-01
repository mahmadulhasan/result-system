<?php
include "config.php";
include "header.php";

?>

<section id="privacy-policy" style="padding: 40px; " class="py-5 ">
    <div class="container py-5">
        <h2 style="font-weight:600; font-size:2.3rem;">Privacy Policy</h2>
        <p>
            At Result Demoikeworld, we take your privacy seriously. This policy outlines how we collect, use, and protect
            your information when you use our services.
        </p>

        <?php
            $sql = "SELECT `heading`, `body` FROM `privacy_policy` WHERE 1";
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