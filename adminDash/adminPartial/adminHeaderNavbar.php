<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
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
    if (isset($_SESSION['username'])) {
        //echo ' Welcome! ' . $_SESSION['username'] . '<br/>';
    } else {
        header("location:../adminLogin/login.php");
    }
    ?>
    <!-- For collecting user info -->
    <?php
    $id = $_SESSION['username'];
    $sql = "SELECT * FROM admin_main WHERE username='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $sn = $row['sn'];
    }
    ?>
    <!-- End info -->
    <div class="container-fluid pt-2 pb-2 bg-dark bg-gradient text-white text-center">
        <h1><i class="fa-solid fa-user-secret"></i> Admin Panel</h1>
    </div>
    <div>
        <nav class="navbar navbar-expand bg-success navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="./adminDash.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./adminNotice.php">Manage Notice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./manageStudent.php">Manage Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./teacherEdit.php">Edit Teacher Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./editSchool.php">Edit School Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./adminFeedback.php">Feedback</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                        $result = $conn->query("SELECT image FROM admin_main WHERE sn='$sn'");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div>
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="rounded-circle img-fluid" style="width: 40px;" />
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../adminLogin/logout.php?logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>