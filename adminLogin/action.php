<?php

require "../partial/connection.php";

session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    // echo $email;
    // echo $pass;
    $query = "SELECT * FROM `admin_main` WHERE username='$username' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $_POST['username'];
        // echo "Success!";
        header("location: ../adminDash/adminDash.php");
    } else {
        // echo "NOT!";
        header("location:login.php?Invalid= Please Enter Correct User Name and Password");
    }
} else {
    echo 'Not Working Now Guys';
}
