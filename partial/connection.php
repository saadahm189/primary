<?php
$servername = "localhost";
$username = "ahmed";
$password = "ahmed";
$dbname = "pschool";

// Create connection in masrafi siam
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connection Successsful!!";
