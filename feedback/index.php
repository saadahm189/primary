<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawsome/css/font-awesome.min.css">
    <title>Contact US</title>
</head>
<style>
    .carda {
        width: 450px;
        border-radius: 15px;
    }

    .abc img {
        margin-right: 10px;
        width: 35px;
        height: 35px;
        cursor: pointer;
    }

    .profile-header-container {
        margin: 0 auto;
        text-align: center;
    }

    .profile-header-img>img.img-circle {
        width: 120px;
        border: 3px solid #51D2B7;
    }

    .rank-label-container {
        margin-top: -19px;
        text-align: center;
    }

    .label.label-default.rank-label {
        background-color: rgb(71, 160, 140);
        padding: 5px 10px 5px 10px;
        border-radius: 25px;
    }
</style>

<body>
    <?php include '../partial/headNav.php';
    ?>
    <div class="container vh-50 shadow-lg mt-3">
        <div class="d-flex">
            <div class="carda m-3 p-2">
                <h2 class="heading text-center" style="font-weight:600">Tell us about your Experience!</h2>
                <p><img src="img/email.jpg" alt="Image" class="img-fluid"></p>
            </div>
            <div class="carda m-3 p-2 mt-5">
                <div class="text-center">
                    <div class="abc d-flex flex-row justify-content-center m-3">
                        <img src="https://img.icons8.com/emoji/48/000000/angry-face-emoji--v2.png" />
                        <img src="https://img.icons8.com/fluent/48/000000/sad.png" />
                        <img src="https://img.icons8.com/color/48/000000/happy.png" />
                        <img src="https://img.icons8.com/emoji/48/000000/smiling-face.png" />
                        <img src="https://img.icons8.com/color/48/000000/lol.png" />
                    </div>
                    <form action="insert.php" method="POST">
                        <div class="form-group mt-5">
                            <input class="form-control mb-3" type="text" name="name" placeholder="Name" required style="background-color:#f3f3f3 ;">
                            <textarea class="form-control" type="text" name="problem" placeholder="Message" required style="background-color:#f3f3f3 ;"></textarea>
                        </div>
                        <div class="mt-2">
                            <button type="input" class="btn btn-primary btn-block mt-3">Send feedback</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="carda mt-3">
                <div class="container">
                    <h5 class="text-center">Team Alpha!</h5>
                    <div class="row">
                        <div class="profile-header-container">
                            <?php
                            $result = $conn->query("SELECT * FROM admin_main");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="profile-header-img mt-3">
                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" class="img-circle rounded-circle" />
                                        <div class="rank-label-container">
                                            <span class="label label-default rank-label text-white"><?php echo $row['name'] ?></span>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container shadow-lg mt-3">
        Contact us: <br>
        <i class="fa fa-phone"></i> +8801724407189 <i class="fa fa-envelope"></i> baust.cse.200201008@gmail.com <i class="fa fa-fax"></i> 000-555 <i class="fa fa-home"></i> CSE, BAUST <i class="fa fa-facebook"></i> teamalpha <i class="fa fa-twitter"></i> teamalpha <i class="fa fa-linkedin"></i> teamalpha
    </div>
    <div>
        <?php include '../partial/footer.php';
        ?>
    </div>
</body>

</html>
