<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Teaching Body</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../fontawsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
</head>
<style>
    .gradient-custom {
        background: #f6d365;
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
    }

    body {
        background-color: #f9f9fa
    }

    .padding {
        padding: 3rem !important
    }

    .user-card-full {
        overflow: hidden;
    }

    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px;
    }

    .m-r-0 {
        margin-right: 0px;
    }

    .m-l-0 {
        margin-left: 0px;
    }

    .user-card-full .user-profile {
        border-radius: 5px 0 0 5px;
    }

    .bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
        background: linear-gradient(to right, #ee5a6f, #f29263);
    }

    .user-profile {
        padding: 20px 0;
    }

    .card-block {
        padding: 1.25rem;
    }

    .m-b-25 {
        margin-bottom: 25px;
    }

    .img-radius {
        border-radius: 5px;
    }



    h6 {
        font-size: 14px;
    }

    .card .card-block p {
        line-height: 25px;
    }

    @media only screen and (min-width: 1400px) {
        p {
            font-size: 14px;
        }
    }

    .card-block {
        padding: 1.25rem;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .card .card-block p {
        line-height: 25px;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .text-muted {
        color: #919aa3 !important;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .f-w-600 {
        font-weight: 600;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .m-t-40 {
        margin-top: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .m-t-40 {
        margin-top: 20px;
    }
</style>

<body>
    <div>
        <?php include '../partial/headNav.php';
        include '../partial/connection.php';
        ?>
    </div>
    <div class="container mt-5 d-flex justify-content-center">
        <?php
        $sql = "SELECT * FROM teacher_main WHERE `designation`='Head' OR `designation`='প্রধান শিক্ষক'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="mx-5 my-2 bg-body d-flex shadow-lg rounded" style="background-color: #f4f5f7;height:330px;width:800px">
                <div class="shadow rounded gradient-custom p-5 py-3" style="width:400px;">
                    <center>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="rounded-circle img-fluid shadow-lg rounded" style="width:150px" />
                    </center>
                    <div class="my-3 text-center">
                        <h5 class="f-w-600"><?php echo $row['name']; ?></h5>
                        <p><?php echo $row['designation']; ?></p>
                    </div>
                    <div class="my-3 text-center">
                        <i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i>
                        <i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i>
                        <i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card-block">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Contact</h6>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Email</p>
                                <h6 class="text-muted f-w-400"><?php echo $row['email']; ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Phone</p>
                                <h6 class="text-muted f-w-400"><?php echo $row['phone']; ?></h6>
                            </div>
                        </div>
                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Information</h6>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Address</p>
                                <h6 class="text-muted f-w-400"><?php echo $row['address']; ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="m-b-10 f-w-600">Status</p>
                                <h6 class="text-muted f-w-400"><?php echo $row['active']; ?></h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <center>
        <div class="container mt-5">
            <?php
            $sql = "SELECT * FROM teacher_main";
            $result = mysqli_query($conn, $sql);
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="card p-3 mt-3 shadow-lg rounded" style="width: 500px;">
                    <div class="d-flex align-items-left">
                        <div class="image">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="rounded img-fluid shadow-lg rounded" style="width:120px" />
                        </div>
                        <div class="ml-4 w-100 text-start">
                            <h4 class="mb-0 mt-0"><?php echo $row['name']; ?></h4>
                            <p class="mb-0 mt-0"><?php echo $row['designation']; ?></p>
                            <p class="mb-0 mt-0">Class: <?php echo $row['class_teacher']; ?></p>
                            <p class="mb-0 mt-0">Email: <?php echo $row['email']; ?></p>
                            <p class="mb-0 mt-0">Status: <?php echo $row['active']; ?></p>
                            <p class="mb-0 mt-0">Address: <?php echo $row['address']; ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </center>
    <div>
        <?php include '../partial/footer.php';
        ?>
    </div>
</body>

</html>
