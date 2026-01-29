<?php
session_start();
include 'databaseconnector.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $fullname = $_POST["fullname"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $mobileNumber = $_POST["mobileNumber"];
    $email = $_POST["email"];

    /*/////////////////////////////////
    FIRST, CHECK FOR ANY MISSING INPUTS
    *//////////////////////////////////
    if (empty($username) || empty($password) || empty($confirmPassword) || empty($fullname) || empty($age) || empty($gender) || empty($mobileNumber) || empty($email)) {
        $_SESSION['error'] = "Error is set!";
        $_SESSION['error_message'] = "Check for missing inputs!";
        header("Location: register.php");
        exit();
    }
    /*/////////////////////////////////
    *//////////////////////////////////

    /*///////////////////////////////////////////////////////////////////////////
    THEN CHECK IF PASSWORD AND THE CONFIRM PASSWORD IS THE SAME BEFORE PROCEEDING
    *////////////////////////////////////////////////////////////////////////////
    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Error is set!";
        $_SESSION['error_message'] = "Your password does not match, please try again!";
        header("Location: register.php");
        exit();
    }
    /*////////////////////////////////////////////////////////////////////////////
    */////////////////////////////////////////////////////////////////////////////

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insertUserSQL = "  INSERT INTO user (`date_registered`, `username`, `password`, `gender`, `role`, `email`, `age`, `fullname`)
                        VALUES (NOW(), '$username', '$hashedPassword', '$gender', 'user', '$email', '$age', '$fullname');
                    ";
    mysqli_query($conn, $insertUserSQL);

    header("Location: index.php");
} else {
    header("Location: index.php");
}