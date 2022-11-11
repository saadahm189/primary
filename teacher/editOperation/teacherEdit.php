<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Teacher Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style>
    body {
        background-color: #dee9ff;
    }

    .register {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }
</style>

<body>
    <?php include('../../partial/connection.php') ?>
    <?php
    $sn = $_GET['sn'];
    $sql = "SELECT * FROM teacher_main WHERE sn='$sn'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $sn = $row['sn'];
        $class_teacher = $row['class_teacher'];
        $pin = $row['pin'];
        $name = $row['name'];
        $designation = $row['designation'];
        $phone = $row['phone'];
        $address = $row['address'];
        $email = $row['email'];
        $gender = $row['gender'];
        $active = $row['active'];
        $dob = $row['dob'];
        $jdate = $row['jdate'];
        $pass = $row['password'];
    }
    ?>
    <!-- new edit form  -->
    <div class="container register mt-3">
        <div class="d-flex justify-content-center">
            <div class="mt-5 text-white p-5">
                <img style="height:250px;" src="../images/profile.png" alt="IMG">
                <h3>Edit personal information</h3>
            </div>
            <div class="mt-5">
                <div class="" id="myTabContent">
                    <div class="tab-pane fade show active">
                        <div class="row">
                            <form action="" method="POST">
                                <div style="display: flex;">
                                    <div style="width:350px;margin:20px" class="text-white">
                                        <div class="form-group">
                                            <label for="">Class Teacher: </label>
                                            <input type="text" class="form-control" name="class_teacher" placeholder="class_teacher" value="<?php echo $class_teacher ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">PIN Number: </label>
                                            <input type="text" class="form-control" name="pin" placeholder="pin" value="<?php echo $pin ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Name: </label>
                                            <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo $name ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Designation: </label>
                                            <input type="text" class="form-control" name="designation" placeholder="designation" value="<?php echo $designation ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone: </label>
                                            <input type="text" class="form-control" name="phone" placeholder="phone" value="<?php echo $phone ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address: </label>
                                            <input type="text" class="form-control" name="address" placeholder="address" value="<?php echo $address ?>" />
                                        </div>
                                    </div>
                                    <div style="width:250px;margin:20px" class="text-white">
                                        <div class="form-group">
                                            <label for="">Gender: </label>
                                            <input type="text" class="form-control" name="gender" placeholder="gender" value="<?php echo $gender ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Active Status: </label>
                                            <input type="text" class="form-control" name="active" placeholder="active" value="<?php echo $active ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Date of birth: </label>
                                            <input type="date" class="form-control" name="dob" placeholder="dob" value="<?php echo $dob ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Joining Date: </label>
                                            <input type="date" class="form-control" name="jdate" placeholder="jdate" value="<?php echo $jdate ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password: </label>
                                            <input type="text" class="form-control" name="pass" placeholder="password" value="<?php echo $pass ?>" />
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-danger" value="Edit" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end edit form  -->
    <?php
    if (isset($_POST['submit'])) {

        $class_teacher = $_POST['class_teacher'];
        $pin = $_POST['pin'];
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $active = $_POST['active'];
        $dob = $_POST['dob'];
        $jdate = $_POST['jdate'];
        $pass = $_POST['pass'];

        $sql = "UPDATE `teacher_main` SET `class_teacher`='$class_teacher',`pin`='$pin',`name`='$name',`designation`='$designation',`phone`='$phone',`address`='$address',`gender`='$gender',`active`='$active',`dob`=' $dob',`jdate`='$jdate',`password`='$pass' WHERE sn ='$sn'";

        $result = mysqli_query($conn, $sql);

        // Script is used instead of header:
        if ($result) {
            echo "
            <script>
            window.location.href = '../teachDash.php';
            </script>
            ";
        }
    }
    ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
