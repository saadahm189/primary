<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's Class</title>
</head>

<body>
    <?php include "teacherPartial/teacHeaderNavbar.php" ?>
    <!-- For specifi class collect data from teacher main -->
    <?php
    $id = $_SESSION['email'];
    $sql = "SELECT * FROM teacher_main WHERE email='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $class_teacher = $row['class_teacher'];
        echo $class_teacher;
    }
    ?>
    <div class="container shadow-lg p-3 bg-body rounded" style="display: flex;justify-content: space-between;">
        <!-- Shows which class -->
        <div class="shadow-lg m-3 mt-3 p-4 bg-dark bg-gradient rounded" style="width:30%;height:40%;">
            <div>
                <h2 class="text-white text-center">CLASS <?php echo $class_teacher; ?></h2>
            </div>
        </div>
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
                $bangla = $row[3];
                $english = $row[4];
                $math = $row[5];
                $total = $row[6];

                if ($class != 'Class') {

                    mysqli_query($conn, "UPDATE `student_main` SET `bangla`='$bangla',`english`='$english',`math`='$math',`total`='$total' WHERE roll='$roll' AND class='$class'");
                }
            }
            echo "<script>alert('Succesfully Imported');document.location.href = '';</script>";
        }
        ?>
        <div class="shadow-lg m-1 p-3 bg-dark bg-gradient rounded" style="width:60%;height:40%;" class="p-2">
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
    </div>
    <!-- Shows result -->
    <div class="container shadow-lg mt-3 p-2 bg-body rounded">
        <div class="table-responsive m-5 shadow-lg rounded">
            <table id="editable_table" class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Bangla</th>
                        <th>English</th>
                        <th>Math</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `student_main` WHERE `class`='$class_teacher'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['roll']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['bangla']; ?></td>
                            <td><?php echo $row['english']; ?></td>
                            <td><?php echo $row['math']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
