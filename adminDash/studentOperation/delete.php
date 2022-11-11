<?php
include '../../partial/connection.php';

$roll = $_GET['roll'];
$class = $_GET['class'];

$sql = "DELETE FROM `student_main` WHERE roll='$roll' AND class = '$class'";

mysqli_query($conn, $sql);

header("Location: ../manageStudent.php");
