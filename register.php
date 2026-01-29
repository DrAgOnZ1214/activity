<?php
session_start();
include 'databaseconnector.php';

/*////////////////////////////////////////////////////////////////////////////////////////////////////////
IN THIS PAGE, THIS WILL HANLDE PASSWORD AND CONFIRMATION PASSWORD BEING DIFFERENT ON TOP OF MISSING INPUTS
*/////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_SESSION['error'])) {
    $errormessage = $_SESSION['error_message'];
    echo "<script type = 'text/javascript'>alert('$errormessage')</script>";
    unset($_SESSION['error']);
}
/*///////////////////////////////////////////////////////////////////////////////////////////////////////
*////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Page</title>
        <link rel = "stylesheet" href = "registerpage.css">
    </head>
    <body>
        <form action = "registerHandler.php" method = "POST">
            <label class = "usernameLabel">Enter Username:</label>
            <input class = "usernameField" type = "text" name = "username" placeholder = "Enter Username">
            <label class = "enterPasswordLabel">Enter Password:</label>
            <input class = "passwordField" type = "password" name = "password" placeholder = "Enter Your Password">
            <label class = "confirmPassLabel">Confirm Password:</label>
            <input class = "confirmPassField" type = "password" name = "confirmPassword" placeholder = "Enter Your Password Again">
            <label class = "enterFullNameLabel">Enter Full Name:</label>
            <input class = "enterFullNameField" type = "text" name = "fullname" placeholder = "Enter Fullname">
            <label class = "enterAgeLabel">Enter Age</label>
            <input class = "enterAgeField" type = "number" name = "age" placeholder = "Enter Age">
            <label>Input Gender:</label>
            <select name = "gender">
                <option class = "genderOptions" value = "M">Male</option>
                <option class = "genderOptions" value = "F">Female</option>
            </select>
            <label>Enter Phone Number:</label>
            <input type = "number" name = "mobileNumber" value = "63">
            <label>Enter Email:</label>
            <input type = "email" name = "email" placeholder = "Enter Email"> <br>
            <input type = "submit">
        </form>
    </body>
</html>