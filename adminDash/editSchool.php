<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include "adminPartial/adminHeaderNavbar.php" ?>
    <div>
        <center>
            <button type="button" class="btn btn-success flex-grow-2 m-2"><a style="text-decoration:none ; color:#f4f5f7" href="editSchool/update.php">EDIT</a></button>
        </center>
    </div>
    <!------------------------------------------------>
    <?php
    $sql = "SELECT COUNT(*) FROM teacher_main";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $teacher_total = $row[0];
    //echo $teacher_total;
    ?>
    <!------------------------------------------------>
    <?php
    $sql = "SELECT COUNT(*) FROM student_main";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $student_total = $row[0];
    //echo $student_total;
    ?>
    <!------------------------------------------------>
    <div class="container mt-5">
        <?php
        $sql = "SELECT * FROM school";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="d-flex p-3 shadow-lg rounded overflow-hidden" style="border-radius:20px;background: rgb(12,7,103);background: linear-gradient(90deg, rgba(12,7,103,1) 0%, rgba(13,13,166,1) 50%, rgba(0,154,185,1) 100%);">
                <div class="p-4 m-1 shadow-lg text-center text-white" style="width:50%;">
                    <h4 class="my-3"><?php echo $row['name']; ?></h4>
                    <p class=""> <i class="fas fa-map-marker-alt mr-2"></i><?php echo $row['short_loc']; ?></p>
                    <ul class="list-inline">
                        <li class="list-inline-item mt-5">
                            <h5 class="font-weight-bold d-block"><?php echo $student_total ?></h5>
                            <p class="text">Total Student</p>
                        </li>
                        <li class="list-inline-item mt-5">
                            <h5 class="font-weight-bold d-block"><?php echo $teacher_total ?></h5>
                            <p class="text"> Total Teachers</p>
                        </li>
                    </ul>
                </div>
                <div class="p-4 m-1 shadow-lg bg-white rounded text-center" style="width:50%;">
                    <p class="font-italic m-0">School Code: <?php echo $row['school_code']; ?></p>
                    <p class="font-italic m-0">EMIS Code: <?php echo $row['emis']; ?></p>
                    <p class="font-italic m-0">Division: <?php echo $row['division']; ?></p>
                    <p class="font-italic m-0">Zilla: <?php echo $row['zilla']; ?></p>
                    <p class="font-italic m-0">Thana: <?php echo $row['thana']; ?></p>
                    <p class="font-italic mb-0">Grade: <?php echo $row['grade']; ?></p>
                    <p class="font-italic mb-0">Post: <?php echo $row['post']; ?></p>
                    <p class="font-italic mb-0">Cluster: <?php echo $row['cluster']; ?></p>
                    <p class="font-italic mb-0">Union: <?php echo $row['union']; ?></p>
                    <p class="font-italic mb-0">Type: <?php echo $row['type']; ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>
