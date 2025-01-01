<?php
include "../config.php";
include "header.php";


// Check if the user is not logged in
if ($_SESSION['login'] == true) {
    echo "<script>window.location.href = 'home/index.php';</script>";
    exit;
}



if (isset($_POST['mail'])) {
    $email = $_POST['mail'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $sql2 = "SELECT * FROM `school_details` WHERE `email` = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $email);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($result2->num_rows <= 0) {
        echo "<script>
                alert('Email is wrong');
                window.history.back();
              </script>";
        exit;
    }

    $row = $result2->fetch_object();

    // Check if the school is active
    if ($row->status != "active") {
        echo "<script>
                alert('Your school is deactivated. Please contact admin for further information.');
                window.history.back();
              </script>";
        exit();
    }

    $hashed_password = $row->password;

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        // Store necessary session data after successful login
        $_SESSION['id'] = $row->id;
        $_SESSION['login'] = true;
        $_SESSION['sname'] = $row->school_name;

        
        echo "<script>
                 alert('Login successful');
                 window.location.href = 'home/login-check.php';
              </script>";
        exit;
    } else {
        // Password is incorrect
        echo "<script>
                 alert('Password is incorrect');
                 window.history.back();
               </script>";
        exit;
    }
}
?>


<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Log In to your <br />
                    <span style="color: hsl(218, 81%, 75%)">School</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">

                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form method="post" action="">

                            
                            <!-- email -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Email id</label><span
                                    class="span">*</span>
                                <input type="email" name="mail" id="mail" class="form-control" required />

                            </div>


                            <!-- password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required/>
                            </div>



                            <!-- Submit button -->
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-block mb-4">
                                Sign in
                            </button>


                        </form>
                        <!-- Register buttons -->
                        <div class="text-center">
                            <p><a href="Forget_password">Forget Password</a></p>
                            <p>Register your School <a href="registerSchool.php">HERE</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->





<?php
include "footer.php";
?>