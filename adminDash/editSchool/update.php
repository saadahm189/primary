<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>School Details Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    include '../../partial/connection.php'
    ?>
    <?php
    $sql = "SELECT * FROM school";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $loc = $row['short_loc'];
        $code = $row['school_code'];
        $emis = $row['emis'];
        $div = $row['division'];
        $zilla = $row['zilla'];
        $thana = $row['thana'];
        $cluster = $row['cluster'];
        $union = $row['union'];
        $type = $row['type'];
        $grade = $row['grade'];
        $post = $row["post"];
    ?>
        <div class="limiter">
            <div class="container-login100">
                <form action="" method="POST">
                    <div style="display: flex;justify-content:space-between;">
                        <div style="width:auto;margin:20px">
                            <img src="images/img-01.png" alt="IMG">
                            <h3 class="text-white text-center mt-5">School Information</h3>
                        </div>
                        <div style="width:auto;margin:20px">
                            <div class="form-group">
                                <label class="text-white">School Name:</label>
                                <input type="text" class="form-control item" name="name" value="<?php echo $name ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Short Location:</label>
                                <input type="text" class="form-control item" name="loc" value="<?php echo $loc ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">School Code:</label>
                                <input type="text" class="form-control item" name="code" value="<?php echo $code ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">EMIS Number:</label>
                                <input type="text" class="form-control item" name="emis" value="<?php echo $emis ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Division:</label>
                                <input type="text" class="form-control item" name="division" value="<?php echo $div ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Zilla:</label>
                                <input type="text" class="form-control item" name="zilla" value="<?php echo $zilla ?>" required>
                            </div>
                        </div>
                        <div style="width:auto;margin:20px">
                            <div class="form-group">
                                <label class="text-white">Thana:</label>
                                <input type="text" class="form-control item" name="thana" value="<?php echo $thana ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Cluster:</label>
                                <input type="text" class="form-control item" name="cluster" value="<?php echo $cluster ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Union:</label>
                                <input type="text" class="form-control item" name="union" value="<?php echo $union ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Type:</label>
                                <input type="text" class="form-control item" name="type" value="<?php echo $type ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Grade:</label>
                                <input type="text" class="form-control item" name="grade" value="<?php echo $grade ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Post:</label>
                                <input type="text" class="form-control item" name="post" value="<?php echo $post ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-block create-account text-white" style="background-color:black;" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_REQUEST['name'];
        $loc = $_REQUEST['loc'];
        $code = $_REQUEST['code'];
        $emis = $_REQUEST['emis'];
        $div = $_REQUEST['division'];
        $zilla = $_REQUEST['zilla'];
        $thana = $_REQUEST['thana'];
        $cluster = $_REQUEST['cluster'];
        $union = $_REQUEST['union'];
        $type = $_REQUEST['type'];
        $grade = $_REQUEST['grade'];
        $post = $_REQUEST["post"];

        $sql = "UPDATE `school` SET `name`='$name',`short_loc`='$loc',`school_code`='$code',`emis`='$emis',`division`='$div',`zilla`='$zilla',`thana`='$thana',`cluster`='$cluster',`union`='$union',`type`='$type',`grade`='$grade',`post`='$post' WHERE 1";
        mysqli_query($conn, $sql);
        echo ("<script>location.href = '../editSchool.php?';</script>");
    }
    ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
