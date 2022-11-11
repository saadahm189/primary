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
    <?php include "../partial/connection.php" ?>
    <!-- For logout session -->
    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        //echo ' Welcome!' . $_SESSION['email'] . '<br/>';
    } else {
        header("location:../teacherLogin/login.php");
    }
    ?>
    <!-- Collect data from teacher table and show as profile -->
    <?php
    $id = $_SESSION['email'];
    $sql = "SELECT * FROM teacher_main WHERE email='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $sn = $row['sn'];
        $name = $row['name'];
        $des = $row['designation'];
        $add = $row['address'];
        $phone = $row['phone'];
        $class_teacher = $row['class_teacher'];
    }
    ?>
    <div class="container-fluid pt-2 pb-2 bg-dark text-white text-center">
        <h1>Teacher Dashboard</h1>
    </div>
    <div>
        <nav class="navbar navbar-expand bg-success navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="./teachDash.php">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./teachClass.php">My Class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./exportStudent.php">Export Class Data</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                        $result = $conn->query("SELECT image FROM teacher_main WHERE sn='$sn'");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div>
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="rounded-circle img-fluid" style="width:40px"/>
                                </div> <?php }
                                } ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../teacherLogin/logout.php?logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>