<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CDN start-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali&display=swap" rel="stylesheet">
    <!-- Font CDN end-->
    <!-- headnav php file -->
</head>

<style>
    * {
        font-family: 'Noto Sans Bengali', sans-serif;
    }

    .navbar .navbar-nav .nav-link:hover {
        background-color: black;
        color: white;
    }

    .news-content {
        color: red;
    }
</style>

<body>
    <?php
    include 'connection.php';
    ?>

    <?php
    $sql = "SELECT * FROM school";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
    ?>
        <div class="container-fluid pt-2 pb-2 bg-dark text-white text-center">
            <div class="log" style="float: left; padding:2px">
                <img src="../img/logo.jpg" alt="logo not found" width="100" height="90">
            </div>
            <h1><?php echo $row['name']; ?></h1>
            <h4><?php echo $row['short_loc']; ?></h4>
        </div>
    <?php
    }
    ?>
    <?php
    $sql = "SELECT * FROM notice order by date DESC LIMIT 3";
    $result = $conn->query($sql);
    ?>
    <div class="container-fluid bg-body pt-1">
        <div class="news">
            <marquee class="news-content">
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <p3 style="color: black;">
                        <b>
                            <?php echo $row['date']; ?>
                        </b>
                    </p3>
                    <p3><b>
                            <a class="link-danger text-decoration-none" href="../adminDash/storeNotice/<?php echo $row['pdf_name']; ?>"><?php echo $row['pdf_name']; ?></a>
                        </b>
                    </p3>
                <?php
                }
                ?>
            </marquee>
        </div>
    </div>


    <nav class="navbar navbar-expand bg-success navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="../home/homePage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../about/about.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../teacherDetails/teacherDetails.php">Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../feedback/index.php">Contact us</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="../adminLogin/login.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../teacherLogin/login.php">Teacher Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../studentLogin/login.php">Student Login</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>
