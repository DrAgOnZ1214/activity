<?php
session_start();
include 'databaseconnector.php';

/*////////////////////////////////////////////////////////////////////
IN THIS PAGE, THIS WILL HANDLE MISSING INPUTS AND INVALID CREDENTIALS.
*/////////////////////////////////////////////////////////////////////
if (isset($_SESSION['error'])) {
    $errormessage = $_SESSION['error_message'];
    echo "<script type = 'text/javascript'>alert('$errormessage')</script>";
    unset($_SESSION['error']);
}
/*//////////////////////////////////////////////////
*///////////////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Astor Activity Login Page</title>
        <link rel = "stylesheet" href = "index.css">
    </head>
    <body>
        <form action = "loginHandler.php" method = "POST">
            <label class = "enterUsernameLabel">Enter Username:</label>
            <input class = "enterUsernameField" type = "text" name = "username" placeholder = "Enter Username">
            <br>
            <label class = "enterPasswordLabel">Enter Password:</label>
            <input class = "enterPasswordField" type = "password" name = "password" placeholder = "Enter Password">
            <br>
            <input class = "submitButton" type = "submit">
            <p>Don't have an account? <a href = "register.php">Register Here!</a></p>
        </form>
    </body>
</html>