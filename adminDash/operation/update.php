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
    <?php $sn = $_GET['sn'];
    $sql = "SELECT * FROM teacher_main WHERE sn='$sn'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $class = $row['class_teacher'];
        $pin = $row['pin'];
        $name = $row['name'];
        $des = $row['designation'];
        $phn = $row['phone'];
        $add = $row['address'];
        $email = $row['email'];
        $gender = $row['gender'];
        $active = $row['active'];
        $dob = $row["dob"];
        $jdate = $row["jdate"];
        $pass = $row['password'];
    ?>
        <div class="limiter">
            <div class="container-login100">
                <form action="" method="POST">
                    <div style="display: flex;justify-content:space-between;">
                        <div class="login100-pic m-5">
                            <img src="images/teachInsert.png" alt="IMG">
                            <h3 class="text-white text-center mt-5">Edit Information</h3>
                        </div>
                        <div style="width:auto;margin:20px">
                            <div class="form-group">
                                <label class="text-white">Class Teacher:</label>
                                <input type="text" class="form-control item" name="class" value="<?php echo $class ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">PIN Number:</label>
                                <input type="text" class="form-control item" name="pin" value="<?php echo $pin ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Name:</label>
                                <input type="text" class="form-control item" name="name" value="<?php echo $name ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Designation:</label>
                                <input type="text" class="form-control item" name="des" value="<?php echo $des ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Phone Number:</label>
                                <input type="text" class="form-control item" name="phn" value="<?php echo $phn ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Address:</label>
                                <input type="text" class="form-control item" name="add" value="<?php echo $add ?>" required>
                            </div>
                        </div>
                        <div style="width:auto;margin:20px">
                            <div class="form-group">
                                <label class="text-white">Email:</label>
                                <input type="text" class="form-control item" name="email" value="<?php echo $email ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Gender:</label>
                                <input type="text" class="form-control item" name="gender" value="<?php echo $gender ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Status:</label>
                                <input type="text" class="form-control item" name="active" value="<?php echo $active ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Date of Birth:</label>
                                <input type="date" class="form-control item" name="dob" value="<?php echo $dob ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Joining Date:</label>
                                <input type="date" class="form-control item" name="jdate" value="<?php echo $jdate ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-white">Passowrd:</label>
                                <input type="text" class="form-control item" name="pass" value="<?php echo $pass ?>" required>
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
        echo "Hello";
        $class = $_REQUEST['class'];
        $pin = $_REQUEST['pin'];
        $name = $_REQUEST['name'];
        $des = $_REQUEST['des'];
        $phn = $_REQUEST['phn'];
        $add = $_REQUEST['add'];
        $email = $_REQUEST['email'];
        $gender = $_REQUEST['gender'];
        $active = $_REQUEST['active'];
        $dob = $_REQUEST["dob"];
        $jdate = $_REQUEST["jdate"];
        $pass = $_REQUEST['pass'];

        $sql = "UPDATE `teacher_main` SET `class_teacher`='$class',`pin`='$pin',`name`='$name',`designation`='$des',`phone`='$phn',`address`='$add',`email`='$email',`gender`='$gender',`active`='$active',`dob`='$dob',`jdate`='$jdate',`password`='$pass' WHERE `sn`='$sn'";
        mysqli_query($conn, $sql);
        echo ("<script>location.href = '../teacherEdit.php?msg=$msg';</script>");
    }
    ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
