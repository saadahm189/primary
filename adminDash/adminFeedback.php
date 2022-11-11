<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

</style>

<body>
    <?php include "adminPartial/adminHeaderNavbar.php" ?>
    <?php
    $queary = "SELECT * FROM `feedback`";
    $result = mysqli_query($conn, $queary) ?>
    <section class="intro mt-5">
        <div class="bg-image h-100">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <thead class="bg-secondary text-white">
                                                <tr>
                                                    <td scope="col">Name</td>
                                                    <td scope="col">Feedback</td>
                                                    <td scope="col">Delete</td>
                                                </tr>
                                            </thead>
                                            <?php
                                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $data['name'] ?></td>
                                                        <td><?php echo $data['problem'] ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger me-1 flex-grow-1"><a style="text-decoration:none ; color:#f4f5f7" href="feedbackOperation/delete.php?sn=<?php echo $data['sn'] ?>">Delete</a></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
