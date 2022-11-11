<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title>student Dashboard</title>
</head>

<body style="background-color: #f4f5f7;">
    <?php include "../student/studentHeadNavbar.php" ?>
    <!-- For logout session -->
    <?php
    session_start();
    if (isset($_SESSION['roll'])) {
        //echo ' Welcome!Roll: ' . $_SESSION['roll'] . '<br/>';
        //echo ' Welcome!class: ' . $_SESSION['class'] . '<br/>';
    } else {
        header("location:../studentLogin/login.php");
    }
    ?>
    <div style="display: flex;justify-content: space-between;">
        <div style="width:70%;height:40%;" class="shadow-lg m-3 bg-body rounded">
            <!-- Collect student data and show profile -->
            <?php
            $roll = $_SESSION['roll'];
            $class = $_SESSION['class'];

            $query = "SELECT * FROM `student_main`  WHERE  class='$class' AND roll='$roll'";
            $result = mysqli_query($conn, $query);
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $calss = $row['class'];
                $parent = $row['parent'];
                $phone = $row['phone'];
                $nid = $row['nid'];
                $birthc = $row['birthc'];
            }
            ?>
            <div class="card m-5 shadow-lg bg-body rounded" style="border-radius: .5rem;width:85%;height:40%;">
                <div class="row g-0">
                    <div class="col-md-4 gradient-custom text-center text-black" style="margin-top:60px;border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Avatar" class="img-fluid m-3" style="width: 180px; border-radius:10px" />
                        <h4><?php echo $name; ?></h4>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h6>Personal Information</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Parent Name</h6>
                                    <p class="text-muted"><?php echo $parent; ?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Phone</h6>
                                    <p class="text-muted"><?php echo $phone; ?></p>
                                </div>
                            </div>
                            <h6>More</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Parent NID</h6>
                                    <p class="text-muted"><?php echo $nid; ?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Birth Certificate No</h6>
                                    <p class="text-muted"><?php echo $birthc; ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow-lg p-3 m-3 bg-body rounded" style="width:40%; height:426px; padding:0px 20px;">
            <!-- COURSES -->
            <?php
            $roll = $_SESSION['roll'];
            $class = $_SESSION['class'];
            ?>
            <center>
                <h5 class="bg-success text-white title mt-2 p-2">
                    Subjects
                </h5>
            </center>
            <div class="vh-100">
                <?php
                if ($class == '1' || $class == '2' || $class == '3') { ?>
                    <div class="shadow-lg p-3 mb-2 mt-2 bg-body rounded"><?php echo "Bangla"; ?></div>
                    <div class="shadow-lg p-3 mb-2 bg-body rounded"><?php echo "English"; ?></div>
                    <div class="shadow-lg p-3 mb-2 bg-body rounded"><?php echo "Math"; ?></div>
                <?php }
                ?>
                <?php
                if ($class == '4' || $class == '5') { ?>
                    <div class="shadow-lg p-3 mb-2 mt-2 bg-body rounded"><?php echo "Bangla"; ?></div>
                    <div class="shadow-lg p-3 mb-2 bg-body rounded"><?php echo "English"; ?></div>
                    <div class="shadow-lg p-3 mb-2 bg-body rounded"><?php echo "Math"; ?></div>
                    <div class="shadow-lg p-3 mb-2 bg-body rounded"><?php echo "Science"; ?></div>
                    <div class="shadow-lg p-3 mb-2 bg-body rounded"><?php echo "Social Science"; ?></div>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------- -->
    <?php
    $query = "SELECT * FROM `student_main`  WHERE  class='$class' AND roll='$roll'";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        $class = $row['class'];
        $roll = $row['roll'];
        $bangla = $row['bangla'];
        $english = $row['english'];
        $math = $row['math'];
        $total = $row['total'];
    }
    ?>
    <div style="display: flex;justify-content: space-between;">
        <div style="width:60%;height:40%;" class="shadow-lg m-3 bg-body rounded">
            <div class="col-md-10 p-3 mt-3">
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-cherry">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-book"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Bangla</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <?php echo $bangla ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-blue-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-bookmark"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">English</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <?php echo $english ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-green-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-envelope"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Math</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <?php echo $math ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-orange-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-graduation-cap"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Total</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <?php echo $total ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
