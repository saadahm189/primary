<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Teacher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <?php include '../../partial/connection.php'; ?>

    <div class="limiter">
        <div class="container-login100">
            <form action="" method="POST">
                <div style="display: flex;justify-content:space-between;">
                    <div class="login100-pic m-5">
                        <img src="images/teachInsert.png" alt="IMG">
                        <h3 class="text-white text-center mt-5">Add Teacher</h3>
                    </div>
                    <div style="width:auto;margin:20px">
                        <div class="form-group">
                            <label class="text-white">Class Teacher:</label>
                            <input type="text" class="form-control item" name="class" placeholder="Class Teacher" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white">PIN Number:</label>
                            <input type="text" class="form-control item" name="pin" placeholder="PIN Number" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Name:</label>
                            <input type="text" class="form-control item" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Designation:</label>
                            <input type="text" class="form-control item" name="des" placeholder="Designation" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Phone Number:</label>
                            <input type="text" class="form-control item" name="phn" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Address:</label>
                            <input type="text" class="form-control item" name="add" placeholder="Address" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Email:</label>
                            <input type="text" class="form-control item" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div style="width:auto;margin:20px">
                        <div class="form-group">
                            <label class="text-white">Gender:</label>
                            <input type="text" class="form-control item" name="gender" placeholder="Gender" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Status:</label>
                            <input type="text" class="form-control item" name="active" placeholder="Active Status" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Date of Birth:</label>
                            <input type="date" class="form-control item" name="dob" required>
                        </div>
                        <div class="form-group">
                            <label for="jdate" class="text-white">Joining Date:</label>
                            <input type="date" class="form-control" id="jdate" name="jdate" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Passowrd:</label>
                            <input type="text" class="form-control item" name="pass" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-block btn-success create-account" value="Submit">
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $class = $_REQUEST['class'];
        $pin = $_REQUEST['pin'];
        $name = $_REQUEST['name'];
        $des = $_REQUEST['des'];
        $phn = $_REQUEST['phn'];
        $add = $_REQUEST['add'];
        $email = $_REQUEST['email'];
        $gender = $_REQUEST['gender'];
        $active = $_REQUEST['active'];
        $dob = $_POST["dob"];
        $jdate = $_POST["jdate"];
        $pass = $_REQUEST['pass'];

        // check whether data already exists:
        $sql = "SELECT * FROM teacher_main WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            echo "Already Exits ID!";
        } else {
            $query1 = "INSERT INTO `teacher_main`(`class_teacher`,`pin`, `name`, `designation`, `phone`, `address`, `email`, `gender`, `active`, `dob`, `jdate`, `password`) VALUES ('$class','$pin','$name','$des','$phn','$add','$email','$gender','$active','$dob','$jdate','$pass')";
            mysqli_query($conn, $query1);
            echo ("<script>location.href = '../teacherEdit.php?msg=$msg';</script>");
        }
        mysqli_close($conn);
    }
    ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
