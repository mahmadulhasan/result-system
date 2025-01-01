<?php
include "../config.php";
include "header.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower($_POST['email']); // Convert to lowercase to handle case sensitivity
    $password = $_POST['password'];

    // Query to select the user based on email
    $query = "SELECT * FROM `admin` WHERE LOWER(`email`) = ?";
    $stmt = $conn->prepare($query);

    // Check if the statement was prepared correctly
    if (!$stmt) {
        echo "<script>alert('Error preparing statement: " . $conn->error . "');</script>";
        exit();
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Debug: Check if query returned any rows
    if ($result->num_rows >= 1) {
        $user = $result->fetch_assoc();
        

        // Verify the provided password with the hashed password from the database
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin-login'] = true;
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['position'] = $user['position'];

            // Redirect to dashboard
            echo "<script>window.location.href = 'dashboard.php';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No account found with this email.');</script>";
    }
}
?>

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden" style="min-height: 100vh;">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5" >
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Please enter your<br />
          <span style="color: hsl(218, 81%, 75%)">Login Credential</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          .
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="" method="post">
              

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control"  required/>
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="password" name= "password" class="form-control" required/>
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              

              <!-- Submit button -->
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                Log In
              </button>

              <!-- Register buttons -->
                        <div class="text-center">
                            <p><a href="Forget_password">Forget Password</a></p>
                        </div>
              </div>
            </form>
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