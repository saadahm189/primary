<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <title>Notice</title>
</head>
<style>
    body {
        margin-top: 20px;
        background-color: #f7f7ff;
    }

    .radius-10 {
        border-radius: 10px !important;
    }

    .border-info {
        border-left: 5px solid #0dcaf0 !important;
    }

    .border-danger {
        border-left: 5px solid #fd3550 !important;
    }

    .border-success {
        border-left: 5px solid #15ca20 !important;
    }

    .border-warning {
        border-left: 5px solid #ffc107 !important;
    }
</style>

<body>
    <?php include "adminPartial\adminHeaderNavbar.php" ?>
    <div style="display: flex;justify-content: space-between;">
        <div class="shadow-lg m-3 bg-body bg-gradient rounded" style="width:70%;height:40%;">
            <center>
                <h5 class="bg-secondary text-white title mt-2 p-1">
                    Upload Notice Here
                </h5>
            </center>
            <div class="mx-auto my-5 shadow-lg m-3 p-5 bg-body bg-gradient rounded" style="width: 500px;">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!--Form,Input, Button, enctype -->
                    <div class="form-group mb-3 mt-3">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="upload_date" required>
                    </div>
                    <input class="form-control" type="file" name="pdf" accept=".pdf" required>
                    <center><button type="submit" name="submit" class="btn btn-primary my-3">Upload File</button></center>
                </form>
            </div>
            <?php
            if (isset($_POST["submit"])) {
                $upload_date = $_POST["upload_date"];
                $file_name = $_FILES["pdf"]["name"];
                //two dimentional array, first imput tag name, 2nd name or type or size or tmp_name (2nd one is default keyword)
                $file_tmp_loc = $_FILES["pdf"]["tmp_name"];
                $file_store = "storeNotice/" . $file_name;

                move_uploaded_file($file_tmp_loc, $file_store);

                $insertquery =
                    "INSERT INTO notice(date,pdf_name) VALUES('$upload_date','$file_name')";
                $iquery = mysqli_query($conn, $insertquery);
            }
            ?>
        </div>
        <!-- Notice Board -->
        <div class="shadow-lg p-2 m-2 bg-body rounded" style="width:50%; height:40%; padding:0px 20px;">
            <center>
                <h5 class="bg-danger text-white title mt-2 p-1">
                    Notice
                </h5>
            </center>
            <div class="table table-borderless">
                <div>
                    <table>
                        <thead>
                            <th>Date</th>
                            <th>Notices</th>
                            <th>Action </th>
                        </thead>
                        <tbody style="margin:50px ;">
                            <?php
                            $selectQuery = "select * from notice";
                            $squery = mysqli_query($conn, $selectQuery);
                            while (($result = mysqli_fetch_assoc($squery))) {
                                $sn = $result['sn'];
                            ?>
                                <tr>
                                    <td>
                                        <div class="card radius-10 border-start border-0 border-5 border-success m-1 p-2">
                                            <div>
                                                <?php echo $result['date']; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card radius-10 border-start border-0 border-5 border-warning m-1">
                                            <a class="list-group-item list-group-item-action" href="/primary/adminDash/storeNotice/<?php echo $result['pdf_name']; ?>"><?php echo $result['pdf_name']; ?></a>
                                        </div>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-danger me-1 flex-grow-1"><a style="text-decoration:none ; color:#f4f5f7" href="deleteNotice/delete.php?sn=<?php echo $sn?>">Delete</a></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Notice Board END -->
    </div>
</body>

</html>
