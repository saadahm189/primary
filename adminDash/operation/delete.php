<?php
include '../../partial/connection.php';

$sn = $_GET['sn'];
$sql = "DELETE FROM `teacher_main` WHERE `sn`='$sn'";
mysqli_query($conn, $sql);

header("Location: ../teacherEdit.php");
