<?php
include '../../partial/connection.php';

$sn = $_GET['sn'];
$sql = "DELETE FROM `feedback` WHERE `sn`='$sn'";
mysqli_query($conn, $sql);

header("Location: ../adminFeedback.php");
