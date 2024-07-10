<?php
$hostname = "database-2.chqccmyeyinm.us-east-1.rds.amazonaws.com:3306";
$username = "admin";
$pwd = "password";
$db = "project";
$conn = mysqli_connect($hostname, $username, $pwd, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>