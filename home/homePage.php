<!DOCTYPE html>
<html lang="en">

<head>
    <title>ছত্রপুর সরকারি প্রাথমিক বিদ্যালয়</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .section-title {
        font-size: 30px;
        text-transform: capitalize;
        text-align: center;
        font-weight: 600;
        margin-top: 0px;
        color: #6861BC;
    }

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
    <?php include '../partial/headNav.php';
    ?>
    <div style="display: flex;justify-content: space-between;">
        <div class="shadow-lg m-3 mt-3 bg-body rounded" style="width:70%;height:40%;" class="p-2">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="display: inline-block; justify-content: space-between;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/one (1).jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/one (2).jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/one (3).jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/one (5).jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/two (1).jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/two (2).jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/two (3).jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/two (4).jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/two (5).jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/two (6).jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/two (7).jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/two (8).jpeg" alt="Second slide">
                    </div>
                </div>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            </div>
        </div>
        <div class="shadow-lg m-2 bg-body rounded" style="width:50%; height:40%;">
            <center>
                <h5 class="bg-danger text-white title mt-2 p-2">
                    নোটিশ
                </h5>
            </center>
            <div class="table table-borderless">
                <div>
                    <table>
                        <thead>
                            <th style="width:135px ;">Date</th>
                            <th>Notices</th>
                        </thead>
                        <tbody>
                            <?php
                            $selectQuery = "select * from notice";
                            $squery = mysqli_query($conn, $selectQuery);

                            while (($result = mysqli_fetch_assoc($squery))) {
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
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="shadow-lg m-2 bg-body rounded">
            <div class="column block mt-2">
                <center>
                    <h5 class="bg-danger text-white title mt-2 p-2">
                        জরুরি হটলাইন
                    </h5>
                </center>
                <p><img alt="জরুরি হটলাইন" src="../img/helpline.jpg" style="height:100%; width:220px"></p>
            </div>
        </div>
        <!-- js -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>
    <div>
        <?php include '../partial/footer.php';
        ?>
    </div>
</body>

</html>
