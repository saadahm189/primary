<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Teacher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    include '../../partial/connection.php'
    ?>
    <?php
    $roll = $_GET['roll'];
    $class = $_GET['class'];
    $sql = "SELECT * FROM student_main WHERE roll='$roll' AND class = '$class'";

    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        // $class = $row['class'];
        // $roll = $row['roll'];
        $name = $row['name'];
        $birthc = $row['birthc'];
        $parent = $row['parent'];
        $nid = $row['nid'];
        $phone = $row['phone'];
        $bangla = $row['bangla'];
        $english = $row['english'];
        $math = $row["math"];
        $total = $row["total"];
    ?>
        <!--Div for Background-->
        <div class="text-center">
            <!--Div for Centered Text & Input-->
            <div class="centered">
                <p class="firstLine"> I &nbsp; N&nbsp; F &nbsp; O &nbsp; R &nbsp; M &nbsp; A &nbsp; T &nbsp; I &nbsp; O &nbsp; N </p>
                <p class="text-white">Edit Your Personal Information</p>
                <div class="limiter">
                    <div class="container-login100">
                        <form action="" method="POST">
                            <div style="display: flex;justify-content:space-between;">
                                <div style="width:250px;margin-top:20px">
                                    <div class="form-group">
                                        <label class="text-white">Name:</label>
                                        <input type="text" class="form-control item" name="name" value="<?php echo $name ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white">Birth Cirtificate:</label>
                                        <input type="text" class="form-control item" name="birthc" value="<?php echo $birthc ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white">Parent:</label>
                                        <input type="text" class="form-control item" name="parent" value="<?php echo $parent ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white">NID Number:</label>
                                        <input type="text" class="form-control item" name="nid" value="<?php echo $nid ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white">Phone:</label>
                                        <input type="text" class="form-control item" name="phone" value="<?php echo $phone ?>" required>
                                    </div>
                                </div>
                                <div style="width:250px;margin:20px">
                                    <div class="form-group">
                                        <label class="text-white">Bangla:</label>
                                        <input type="text" class="form-control item" name="bangla" value="<?php echo $bangla ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white">English:</label>
                                        <input type="text" class="form-control item" name="english" value="<?php echo $english ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-white">Math:</label>
                                        <input type="text" class="form-control item" name="math" value="<?php echo $math ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-block create-account text-white" style="background-color:black;" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php
        if (isset($_POST['submit'])) {
            echo "Hello";
            $name = $_POST['name'];
            $birthc = $_POST['birthc'];
            $parent = $_POST['parent'];
            $nid = $_POST['nid'];
            $phone = $_POST['phone'];
            $bangla = $_POST['bangla'];
            $english = $_POST['english'];
            $math = $_POST["math"];
            $total = $bangla + $english + $math;
            $sql = "UPDATE `student_main` SET `name`='$name',`birthc`='$birthc',`parent`='$parent',`nid`='$nid',`phone`=' $phone',`bangla`=' $bangla',`english`='$english',`math`='$math',`total`='$total'
         WHERE roll='$roll' AND class = '$class'";
            mysqli_query($conn, $sql);
            echo ("<script>location.href = '../manageStudent.php';</script>");
        }
        ?>
</body>

</html>
