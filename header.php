<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result.demoikeworld.com</title>
    <link rel="stylesheet" href="assets/style.css">
    <!-- box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: radial-gradient(circle, #d6f0ff, #ffffff);
            background-attachment: fixed;
            overflow-x: hidden;
        }

        .nav-link:hover {
            background: #4499f4 !important;
            border-radius: 0 !important;
        }

        .a {
            color: white !important;
        }

        .active {
            font-weight: 800;
            border-bottom:2px solid white;
        }
    </style>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary justify-content-between pe-5 ps-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="upload/image/logo.png" style="height:50px;width:150px; background:white; padding:10px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse ms-auto end-0 justify-content-between" id="navbarNav">
            <ul class="navbar-nav pe-5">
                <li class="nav-item pe-3">
                    <a class="nav-link a <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link a <?= basename($_SERVER['PHP_SELF']) == 'about-us.php' ? 'active' : '' ?>" href="about-us.php">About</a>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link a <?= basename($_SERVER['PHP_SELF']) == 'contact-us.php' ? 'active' : '' ?>" href="contact-us.php">Contact</a>
                </li>
        
                <!-- Dynamic Links -->
                <?php
                // Fetch active pages
                $sql = "SELECT page_name FROM new_pages WHERE action='active'";
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $pageName = htmlspecialchars($row['page_name']); // Sanitize the output
                        $link ='page.php?subject='.$pageName; // Convert name to URL-friendly format
                        $isActive = basename($_SERVER['PHP_SELF']) == $link ? 'active' : ''; // Check if the page is active
                        echo "
                        <li class='nav-item pe-3'>
                            <a class='nav-link a $isActive' href='page.php?subject=$pageName'>$pageName</a>
                        </li>";
                    }
                }
                ?>
        
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link dropdown-toggle <?= (basename($_SERVER['PHP_SELF']) == 'Marks/index.php' || basename($_SERVER['PHP_SELF']) == 'Marksheet/index.php') ? 'active' : '' ?>"
                       href="Marks/index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                        Result
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="Marks/index.php">Recent result</a></li>
                        <li><a class="dropdown-item" href="Marksheet/index.php">Old result</a></li>
                    </ul>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link a <?= basename($_SERVER['PHP_SELF']) == 'School/index.php' ? 'active' : '' ?>" href="School/index.php">School</a>
                </li>
            </ul>
        </div>

    </nav>
</header>
