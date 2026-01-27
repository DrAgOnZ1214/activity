<?php
session_start();
//include 'databaseconnector.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $password = $_POST["password"];

    if (empty($name) || empty($password)) {
        $_SESSION['error'] = "Error is set!";
        $_SESSION['error_message'] = "Check for missing inputs!";
        header("Location: index.php");
        exit();
    }

    //header("Location: index.php");
} else {
    header("Location: index.php");
}