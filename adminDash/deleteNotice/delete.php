<?php
include '../../partial/connection.php';

$sn = $_GET['sn'];
$sql = "DELETE FROM `notice` WHERE `sn`='$sn'";
mysqli_query($conn, $sql);

header("Location: ../adminNotice.php");
