<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- boxicons CDN link -->
    <link href='https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/dashboard.css">
    <link rel="stylesheet" href="CSS/dataTables.bootstrap4.min.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <title>Dashboard</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">Texephyr</div>
            </div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav_list">
            <li class = "li" style="list-style-type: none;">
                <a href = "#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <!-- <span class="toolkit">Dashboard</span> -->
            </li>

            <li class = "li" style="list-style-type: none;">
                <a href = "events.php">
                    <i class='bx bx-arch'></i>
                    <span class="links_name">Events</span>
                </a>
                <!-- <span class="toolkit">Events</span> -->
            </li>

            <li class = "li" style="list-style-type: none;">
                <a href = "#">
                    <i class='bx bxs-user-circle'></i>
                    <span class="links_name">User</span>
                </a>
                <!-- <span class="toolkit">User</span> -->
            </li>

            <li class = "li" style="list-style-type: none;">
                <a href = "rounds.php">
                    <i class='bx bx-bolt-circle'></i>
                    <span class="links_name">Rounds</span>
                </a>
                <!-- <span class="toolkit">Rounds</span> -->
            </li>

            <li class = "li" style="list-style-type: none;">
                <a href = "workshops.php">
                    <i class='bx bx-store-alt'></i>
                    <span class="links_name">Workshops</span>
                </a>
                <!-- <span class="toolkit">Workshops</span> -->
            </li>
            
        </ul>

        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <img src="assets/Logo.png" alt="Profile">
                    <div class="_name">
                        <div class="name">Texephyr</div>
                    </div>
                </div>
                <!-- <a href="index.html" style = "color: white;" id = "reload_page"> -->

                    <i class='bx bx-log-out logout' id="log_out"></i>
                <!-- </a> -->
                
            </div>
        </div>
    </div>