<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'adminPartial\adminHeaderNavbar.php' ?>
    <div class="container shadow-lg mt-3 p-2 bg-body rounded">
        <!--  -->
        <div class="conatiner shadow-lg bg-dark bg-gradient rounded" style="margin-left:400px;margin-right:400px;">
            <center>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="p-3">
                        <input type="file" class="form-control" type="file" name="excel" id="file" require placeholder="FILE" required>
                    </div>
                    <div>
                        <button type="submit" name="import" class="btn btn-primary mb-3">Upload</button>
                    </div>
                </form>
            </center>
        </div>
        <!--  -->
        <div>
            <?php
            if (isset($_POST["import"])) {

                $file_name = $_FILES["excel"]["name"];
                $file_tmp_loc = $_FILES["excel"]["tmp_name"];
                $file_store = "uploads/" . $file_name;

                move_uploaded_file($file_tmp_loc, $file_store);

                require 'excelReader/excel_reader2.php';
                require 'excelReader/SpreadsheetReader.php';

                $reader = new SpreadsheetReader($file_store);
                foreach ($reader as $key => $row) {
                    $class = $row[0];
                    $roll = $row[1];
                    $name = $row[2];
                    $birthc = $row[3];
                    $parent = $row[4];
                    $nid = $row[5];
                    $phone = $row[6];

                    if ($class != 'Class') {
                        $sql = "SELECT * FROM student_main WHERE roll='$roll' AND class='$class'";
                        $result = mysqli_query($conn, $sql);
                        //check multiple id exists
                        if ($result->num_rows > 0) {
                            mysqli_query($conn, "UPDATE `student_main` SET `class`='$class',`roll`='$roll',`name`='$name',`birthc`='$birthc',`parent`='$parent',`nid`='$nid',`phone`='$phone' WHERE roll='$roll' AND class='$class'");
                        } else {
                            mysqli_query($conn, "INSERT INTO `student_main`(`class`, `roll`, `name`, `birthc`,`parent`,`nid`, `phone`) VALUES ('$class','$roll','$name','$birthc','$parent','$nid','$phone')");
                        }
                    }
                }
                echo "<script>alert('Succesfully Imported');document.location.href = '';</script>";
            }
            ?>

            <div class="table-responsive m-5 shadow-lg bg-body rounded">
                <table id="editable_table" class="table table-bordered" >
                    <thead class="table-dark">
                        <tr>
                            <th>Class</th>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Birth Certificate</th>
                            <th>Parent Name</th>
                            <th>NID Number</th>
                            <th>Phone</th>
                            <th>Bangla</th>
                            <th>English</th>
                            <th>Math</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM student_main";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['class']; ?></td>
                                <td><?php echo $row['roll']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['birthc']; ?></td>
                                <td><?php echo $row['parent']; ?></td>
                                <td><?php echo $row['nid']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['bangla']; ?></td>
                                <td><?php echo $row['english']; ?></td>
                                <td><?php echo $row['math']; ?></td>
                                <td><?php echo $row['total']; ?></td>
                                <td style="display: flex;">
                                    <button type="button" class="btn btn-primary p-1 m-2"><a style="text-decoration:none ; color:white" href="studentOperation/update.php?roll=<?php echo $row['roll'] ?>&class=<?php echo $row['class'] ?>">Edit</a></button>
                                    <button onclick="return confirm('Are you sure to delete?')" type="button" class="btn btn-danger p-1 m-2"><a style="text-decoration:none ; color:white" href="studentOperation/delete.php?roll=<?php echo $row['roll'] ?>&class=<?php echo $row['class'] ?>">Delete</a></button></td>
                                </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</body>

</html>
