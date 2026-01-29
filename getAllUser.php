<?php
session_start();
include 'databaseconnector.php';

$getUsersSQL = "SELECT * FROM user";
$result = mysqli_query($conn, $getUsersSQL);

while($result )
?>