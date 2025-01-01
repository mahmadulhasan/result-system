<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result.demoikeworld.com</title>
    <link rel="stylesheet" href="../assets/style.css">
    <!-- box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- bootstrap -->
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
        .dropdown{
            border-radius:0 !important;
        }
        .dropdown-menu{
            background-color: #f2f2f2 !important;
            color:black !important;
            padding:20px !important;
            border-radius:0 !important;
        }
    </style>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary justify-content-between pe-5 ps-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../upload/image/logo.png" style="height:50px;width:150px; background:white; padding:10px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse ms-auto end-0 justify-content-between" id="navbarNav">
            <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
            <ul class="navbar-nav pe-5">
                <li class="nav-item pe-3">
                    <a class="nav-link a <?php echo ($currentPage == 'dashboard.php') ? 'active' : ''; ?>" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link a <?php echo ($currentPage == 'school.php') ? 'active' : ''; ?>" href="school.php">Schools</a>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link a <?php echo ($currentPage == 'notice.php') ? 'active' : ''; ?>" href="notice.php">Notice</a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link dropdown-toggle <?php echo in_array($currentPage, ['message.php', 'all-message.php']) ? 'active' : ''; ?> href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                        Message
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="message.php">Unread message</a></li>
                        <li><a class="dropdown-item" href="all-message.php">All message</a></li>
                    </ul>
                    
                </li>
                <?php 
                if($_SESSION['position'] == 'super_admin'){
                    echo '
                    <li class="nav-item pe-3">
                        <a class="nav-link a ' . ($currentPage == 'user.php' ? 'active' : '') . '" href="user.php">Users</a>
                    </li>
                    
                    <li class="nav-item pe-3 dropdown">
                        <a class="nav-link dropdown-toggle ' . (in_array($currentPage, ['settings.php', 'pages.php', 'images.php', 'new-pages.php', 'policy.php', 'profile.php']) ? 'active' : '') . '" 
                           href="settings.php" 
                           role="button" 
                           data-bs-toggle="dropdown" 
                           aria-expanded="false" 
                           style="color:white;">
                            Settings
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link  ' . ($currentPage == 'pages.php' ? 'active' : '') . '" href="pages.php" style="color:black !important">Home/About Pages</a></li>
                            <li><a class="nav-link  ' . ($currentPage == 'images.php' ? 'active' : '') . '" href="images.php" style="color:black !important">Page Images</a></li>
                            <li><a class="nav-link  ' . ($currentPage == 'new-pages.php' ? 'active' : '') . '" href="new-pages.php" style="color:black !important">Create&nbsp;new&nbsp;pages</a></li>
                            <li><a class="nav-link  ' . ($currentPage == 'policy.php' ? 'active' : '') . '" href="policy.php" style="color:black !important">Terms & Policy</a></li>
                            <li><a class="nav-link  ' . ($currentPage == 'settings.php' ? 'active' : '') . '" href="settings.php" style="color:black !important">General Settings</a></li>
                            <li><a class="nav-link  ' . ($currentPage == 'profile.php' ? 'active' : '') . '" href="profile.php" style="color:black !important">Profile</a></li>
                        </ul>
                    </li>
                    ';
                }
                ?>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link dropdown-toggle <?php echo ($currentPage == '') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                        <?php echo $_SESSION['name']; ?>
                    </a>
                    <ul class="dropdown-menu">
                        
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
