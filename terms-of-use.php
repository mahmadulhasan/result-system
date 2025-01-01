<?php
include "config.php";
include "header.php";
?>

<section id="terms-conditions" style="padding: 40px; " class="py-5">
    <div class="container py-5">
        <h2 style="font-weight:600; font-size:2.3rem;">Terms and Conditions</h2>
        <p>
            Welcome to Ikeworld Pvt. Ltd. By accessing and using our website, you agree to the following terms and conditions.
            Please read them carefully before using our services.
        </p>
        
        <?php
            $sql = "SELECT `heading`, `body` FROM `terms_and_condition` WHERE 1";
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