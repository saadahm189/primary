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
    <?php include "../partial/connection.php";
    ?>
    <div class="container-fluid pt-2 pb-2 bg-dark text-white text-center">
        <h1>Student Dashboard</h1>
    </div>
    <div>
        <nav class="navbar navbar-expand bg-success navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="../student/studentDash.php">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../student/index.php">Academic Calender</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="../studentLogin/logout.php?logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>
