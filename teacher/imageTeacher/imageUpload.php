<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Image Upload</title>
</head>
<style>
    .login-clean {
        background: #f1f7fc;
        padding: 80px 0;
    }

    .login-clean form {
        max-width: 320px;
        width: 90%;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 4px;
        color: #505e6c;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
    }

    .login-clean form .form-control {
        background: #f7f9fc;
        border: none;
        border-bottom: 1px solid #dfe7f1;
        border-radius: 0;
        box-shadow: none;
        outline: none;
        color: inherit;
        text-indent: 8px;
        height: 42px;
    }

    .login-clean form .btn-success {
        border: none;
        border-radius: 4px;
        padding: 11px;
        box-shadow: none;
        margin-top: 26px;
        text-shadow: none;
        outline: none !important;
    }

    .login-clean form .btn-success:active {
        transform: translateY(2px);
    }
</style>

<body>
    <!-- For logout session -->
    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        echo ' Welcome!' . $_SESSION['email'] . '<br/>';
    } else {
        header("location:../adminLogin/login.php");
    }
    ?>
    <?php $sn = $_GET['sn'];
    ?>
    <div class="login-clean">
        <form action="" method="post" enctype="multipart/form-data">
            <h2 class="sr-only">Select Image File:</h2>
            <p>
            <h4 style="color:#eb3b60">Conditions:</h4> <br>
            1. Size must be <b>1 MB</b> (1024 KB)* <br>
            2. Shape msut <b>Rectangular</b>* <br>
            </p>
            <div class="form-group">
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit" name="submit">Upload</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>

<?php
// Include the database configuration file
require_once '../../partial/connection.php';

// If file upload form is submitted
$status = $statusMsg = '';
if (isset($_POST["submit"])) {
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database
            echo "help";
            $insert = $conn->query("UPDATE `teacher_main` SET `image`='$imgContent' WHERE `sn`='$sn'");

            if ($insert) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
                header("Location: ../teachDash.php");
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
}

// Display status message
echo $statusMsg;
?>
