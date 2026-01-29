<?php
session_start();
include 'databaseconnector.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Error is set!";
        $_SESSION['error_message'] = "Check for missing inputs!";
        header("Location: index.php");
        exit();
    }

    $selectUserSQL = "  SELECT * FROM user WHERE `username` = '$username'";
    $result = mysqli_query($conn, $selectUserSQL);

    if(mysqli_num_rows($result) === 0) {
        $_SESSION['error'] = "Error is set!";
        $_SESSION['error_message'] = "Username Not Found!";
        header("Location: index.php");
        exit();
    }

    $returnedUser = mysqli_fetch_assoc($result);
    if(!password_verify($password, $returnedUser['password'])) {
        $_SESSION['error'] = "Error is set!";
        $_SESSION['error_message'] = "Password is incorrect!";
        header("Location: index.php");
        exit();
    }



    if ($returnedUser['role'] === 'admin') {
        $_SESSION['currentLoggedRole'] = "admin";
        header("Location: adminpage.php");
    } else {
        $_SESSION['currentLoggedRole'] = "user";
        $_SESSION['loggedUsername'] = $returnedUser['username'];
        $_SESSION['firstLetterOfUsername'] = substr($returnedUser['username'], 0, 1);
        $_SESSION['emailOfLoggedUser'] = $returnedUser['email'];
        $_SESSION['memberSince'] = $returnedUser['date_registered'];
        $_SESSION['fullnameOfLoggedUser'] = $returnedUser['fullname'];
        header("Location: userpage.php");
    }
} else {
    header("Location: index.php");
}