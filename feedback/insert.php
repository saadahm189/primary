<?php
include '../partial/connection.php';
$name = $_POST['name'];
$problem = $_POST['problem'];

// echo "$name";
// echo "$problem";

$sql = "INSERT INTO `feedback`(`name`, `problem`) VALUES ('$name','$problem')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Succesfully Imported!');document.location.href = '../feedback/index.php';</script>";
} else {
    echo 'not inserted';
}
