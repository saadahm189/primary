<?php

require "../partial/connection.php";

session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    // echo $email;
    // echo $pass;
    $query = "SELECT * FROM `teacher_main` WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_fetch_assoc($result)) {
        $_SESSION['email'] = $_POST['email'];
        // echo "Success!";
        header("location: ../teacher/teachDash.php");
    } else {
        // echo "NOT!";
        header("location:login.php?Invalid= Please Enter Correct User Name and Password");
    }
} else {
    echo 'Not Working Now Guys';
}
