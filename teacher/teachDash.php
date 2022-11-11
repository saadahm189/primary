<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teacher Dashboard</title>
</head>
<style>
    img {
        width: 100%;
        height: 100%;
    }

    .bg-black {
        background: #000;
    }

    .skill-block {
        width: 30%;
    }

    @media (min-width: 991px) and (max-width:1200px) {
        .skill-block {
            padding: 32px !important;
        }
    }

    @media (min-width: 1200px) {
        .skill-block {
            padding: 56px !important;
        }
    }

    body {
        background-color: #eeeeee;
    }
</style>

<body>
    <?php include "teacherPartial/teacHeaderNavbar.php" ?>
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
    <!------------------------------------------------>
    <?php
    $sql = "SELECT COUNT(*) FROM student_main WHERE class='$class_teacher'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $student_total = $row[0];    ?>
    <!------------------------------------------------>

    <div class="container mt-3 shadow-lg p-5 bg-body rounded">
        <div class="row no-gutters rounded">
            <div class="col-md-4 col-lg-4 m-1" style="height:250px ; width:250px">
                <?php
                $result = $conn->query("SELECT image FROM teacher_main WHERE sn='$sn'");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <div class="mt-4 mb-4">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="rounded" />
                        </div> <?php }
                        } ?>
                <center>
                    <div>
                        <div class="m-1">
                            <a href="../teacher/editOperation/teacherEdit.php?sn=<?php echo $sn ?>">
                                <button type="button" style="margin-left:15px;" class="btn btn-primary btn-rounded btn-lg flex-grow-1">
                                    Edit Profile
                                </button>
                            </a>
                        </div>
                        <div class="m-1">
                            <a href="../teacher/imageTeacher/imageUpload.php?sn=<?php echo $sn ?>">
                                <button type="button" style="margin-left:15px;" class="btn btn-secondary btn-rounded btn-lg flex-grow-1">
                                    Upload Photo
                                </button>
                            </a>
                        </div>
                    </div>
                </center>
            </div>
            <div class="col-md-8 col-lg-8 shadow-lg p-4 bg-body rounded">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
                        <h3 class="display-5">Name: <?php echo $name; ?></h3>
                    </div>
                    <div class="p-3 bg-black bg-gradient text-white">
                        <h6>Designation: <?php echo $des; ?></h6>
                    </div>
                    <div class="d-flex flex-row text-white">
                        <div class="p-4 bg-primary text-center skill-block">
                            <h4>Phone:</h4>
                            <h6><?php echo $phone; ?></h6>
                        </div>
                        <div class="p-3 bg-success text-center skill-block">
                            <h4>Address:</h4>
                            <h6><?php echo $add; ?></h6>
                        </div>
                        <div class="p-3 bg-warning text-center skill-block">
                            <h4>Class Teacher:</h4>
                            <h6>Class: <?php echo $class_teacher; ?></h6>
                        </div>
                        <div class="p-3 bg-danger text-center skill-block">
                            <h6>Total Student:</h6>
                            <h4><?php echo $student_total ?></h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>