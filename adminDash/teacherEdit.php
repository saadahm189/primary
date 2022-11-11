<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include "adminPartial/adminHeaderNavbar.php" ?>
    <div>
        <center>
            <button type="button" class="btn btn-success flex-grow-2 m-2"><a style="text-decoration:none ; color:#f4f5f7" href="operation/insert.php">Add teacher</a></button>
        </center>
    </div>
    <div>
        <?php
        $sql = "SELECT * FROM teacher_main";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="mx-5 my-2 d-flex shadow rounded" style="background-color: #f4f5f7;">
                <div class="shadow rounded bg-white text-white p-3 justify-content-center" style="width:200px;margin-right:15px">
                    <div>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="rounded img-fluid m-3 shadow rounded" style="width: 130px;" />
                    </div>
                    <button type="button" class="btn btn-primary p-1"><a style="text-decoration:none ; color:white" href="operation/update.php?sn=<?php echo $row['sn'] ?>">Edit</a></button>
                    <button onclick="return confirm('Are you sure to delete?')" type="button" class="btn btn-danger p-1"><a style="text-decoration:none ; color:white" href="operation/delete.php?sn=<?php echo $row['sn'] ?>">Delete</a></button>
                    <button type="button" class="btn btn-secondary p-1"><a style="text-decoration:none ; color:white" href="emailAction.php?email=<?php echo $row['email'] ?>">Email</a></button>
                </div>
                <div class="my-3 mx-1" style="width:20%;">
                    <table>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">Class:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['class_teacher']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">Full Name:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['name']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mx-1" style="font-weight: 500;">Designation:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['designation']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mx-1" style="font-weight: 500;">Gender:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['gender']; ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="my-3 mx-1" style="width:450px ;">
                    <table>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">PIN Number:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['pin']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">Phone Number:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['phone']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">Status:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['active']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">Address:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['address']; ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="my-3 mx-1">
                    <table>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">Email Address:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['email']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">Password:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['password']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">Date of Birth:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['dob']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mx-2" style="font-weight: 500;">Joining Date:</p>
                            </td>
                            <td>
                                <p class=""><?php echo $row['jdate']; ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>
