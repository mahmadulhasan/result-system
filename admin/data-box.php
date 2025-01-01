
<style>
    .section-wrapper{
        display:flex;
        
    }
     .bx {
        font-size: 3rem;
    }
    .box {
        background: #f57b42;
        padding: 1rem;
        margin: 0.5rem;
        text-align: center;
        border-radius: 25px;
        width: 200px;
        height: 150px;
    }
    .box:hover{
        background:#fc585e;
    }
    .box span {
        color: white;
        font-weight: bold !important; /* Ensures the rule is applied */
        font-size: 1.1rem;
    }
    .box-p{
        margin-top:0;
        font-size:4rem;
        color:white;
    }
    .section-wrapper {
        margin-top:3rem;
        display: flex;
        flex-wrap:wrap;
        justify-content: center; /* Center items horizontally */
        align-items: center; /* Center items vertically */
        gap: 1rem; /* Adds spacing between the boxes */
    }
</style>
<!-- Main Section -->
<section class="section-wrapper">
    <div class="box" id="">
        <span>Total Schools</span>
        <hr>
        <?php 
        // SQL query to count total schools
        $sql = "SELECT COUNT(*) AS total_schools FROM school_details";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Fetch the result
            $row = $result->fetch_assoc();
            echo '<p class="box-p">' . $row['total_schools'].'<p>';
        } else {
            echo '<p class="box-p">0<p>';
        }
        ?>
    </div>
    <div class="box" id="">
        <span>Active notice</span><hr>
        <?php 
        // SQL query to count total schools
        $sql = "SELECT COUNT(*) AS total_notice FROM notice WHERE `status` = 'active'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Fetch the result
            $row = $result->fetch_assoc();
            echo '<p class="box-p">' . $row['total_notice'].'<p>';
        } else {
            echo '<p class="box-p">0<p>';
        }
        ?>
    </div>
    <div class="box" id="">
        <span>Total Admin Users</span><hr>
        <?php 
        // SQL query to count total schools
        $sql = "SELECT COUNT(*) AS total_user FROM admin WHERE 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Fetch the result
            $row = $result->fetch_assoc();
            echo '<p class="box-p">' . $row['total_user'].'<p>';
        } else {
            echo '<p class="box-p">0<p>';
        }
        ?>
    </div>

</section>

  