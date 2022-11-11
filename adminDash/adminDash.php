<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title>Admin Dashboard</title>
</head>

<body style="background-color: #f5f7fa;">
    <?php include "adminPartial/adminHeaderNavbar.php" ?>
    <div style="display: flex;justify-content: space-between;">
        <!------------------------------------------------------->
        <div class="shadow-lg m-3 bg-warning bg-gradient rounded" style="width:30%;height:40%;">
            <!-- Collect data from admin table and show as profile -->
            <?php
            $id = $_SESSION['username'];
            $sql = "SELECT * FROM admin_main WHERE username='$id'";
            $result = mysqli_query($conn, $sql);
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $sn = $row['sn'];
            }
            ?>
            <center>
                <div class="mt-2">
                    <h5 class="text-uppercase">My Profile</h5>
                </div>
            </center>
            <div class="card bg-body shadow-lg m-3 rounded">
                <div class="card-body text-center text-black">
                    <?php
                    $result = $conn->query("SELECT image FROM admin_main WHERE sn='$sn'");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <div class="mt-4 mb-4">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="rounded-circle img-fluid" style="width: 250px;" />
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <h4 class="mb-5"><?php echo $name; ?></h4>
                    <div style="display:flex;">
                        <div>
                            <a href="../adminDash/adminOperation/adminUpdate.php?sn=<?php echo $sn ?>">
                                <button type="button" class="btn btn-primary btn-rounded btn-lg flex-grow-1">
                                    Edit Profile
                                </button>
                            </a>
                        </div>
                        <div>
                            <a href="../adminDash/imageAdmin/imageUpload.php?sn=<?php echo $sn ?>">
                                <button type="button" style="margin-left:15px;" class="btn btn-secondary btn-rounded btn-lg flex-grow-1">
                                    Upload Photo
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------>
        <?php
        $sql = "SELECT COUNT(*) FROM admin_main";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $admin_total = $row[0]; ?>
        <!------------------------------------------------>
        <?php
        $sql = "SELECT COUNT(*) FROM teacher_main";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $teacher_total = $row[0]; ?>
        <!------------------------------------------------>
        <?php
        $sql = "SELECT COUNT(*) FROM student_main";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $student_total = $row[0]; ?>
        <!------------------------------------------------>
        <?php
        $sql = "SELECT COUNT(*) FROM notice";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $notice_total = $row[0]; ?>
        <!------------------------------------------------>
        <?php
        $sql = "SELECT COUNT(*) FROM feedback";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $feedback_total = $row[0]; ?>
        <!------------------------------------------------>
        <?php
        $user_total = $teacher_total + $admin_total ?>
        <!------------------------------------------------>
        <div class="shadow-lg m-3 bg-primary bg-gradient rounded" style="width:70%;height:40%;">
            <center>
                <div class="m-3">
                    <h5 class="text-uppercase">Statistic Card</h5>
                </div>
            </center>
            <div class="container-fluid shadow-lg m-3 p-3 bg-body rounded" style="width:97%;height:40%;">
                <section>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-4">
                            <div class="card shadow-lg m-3 rounded">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-danger"><?php echo $student_total ?></h3>
                                            <p class="mb-0">Total Student</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-rocket text-danger fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-4">
                            <div class="card shadow-lg m-3 rounded">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-success"><?php echo $teacher_total ?></h3>
                                            <p class="mb-0">Total Teachers</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="far fa-user text-success fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-4">
                            <div class="card shadow-lg m-3 rounded">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-warning"><?php echo $admin_total ?></h3>
                                            <p class="mb-0">Total Admin</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-chart-pie text-warning fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-4">
                            <div class="card shadow-lg m-3 rounded">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-info"><?php echo $notice_total ?></h3>
                                            <p class="mb-0">Total Notice</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="far fa-life-ring text-info fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-4">
                            <div class="card shadow-lg m-3 rounded">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-info">5</h3>
                                            <p class="mb-0">Total Class</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-book-open text-info fa-3x"></i>
                                        </div>
                                    </div>
                                    <div class="px-md-1">
                                        <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-4">
                            <div class="card shadow-lg m-3 rounded">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-warning"><?php echo $feedback_total ?></h3>
                                            <p class="mb-0">Feedback</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="far fa-comments text-warning fa-3x"></i>
                                        </div>
                                    </div>
                                    <div class="px-md-1">
                                        <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-4">
                            <div class="card shadow-lg m-3 rounded">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-success"><?php echo $user_total ?></h3>
                                            <p class="mb-0">User</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-mug-hot text-success fa-3x"></i>
                                        </div>
                                    </div>
                                    <div class="px-md-1">
                                        <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-4">
                            <div class="card shadow-lg m-3 rounded">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between px-md-1">
                                        <div>
                                            <h3 class="text-danger">0</h3>
                                            <p class="mb-0">Total Visits</p>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="fas fa-map-signs text-danger fa-3x"></i>
                                        </div>
                                    </div>
                                    <div class="px-md-1">
                                        <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!--------------------------------->
    </div>


</body>

</html>
