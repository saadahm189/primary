<?php

require "../partial/connection.php";

session_start();
if (isset($_POST['login'])) {
    $class = $_POST['class'];
    $roll = $_POST['roll'];

    $query = "SELECT * FROM `student_main`  WHERE class='$class' AND roll='$roll'";
    $result = mysqli_query($conn, $query);

    if (mysqli_fetch_assoc($result)) {
        $_SESSION['roll'] = $_POST['roll'];
        $_SESSION['class'] = $_POST['class'];
        echo "Success!";
        header("location: ../student/studentDash.php");
    } else {
        echo "NOT!";
        header("location:login.php?Invalid= Please Enter Correct User Name and Password");
    }
} else {
    echo 'Not Working Now Guys';
}
