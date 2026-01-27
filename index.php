<?php
session_start();
if (isset($_SESSION['error'])) {
    $errormessage = $_SESSION['error_message'];
    echo "<script type = 'text/javascript'>alert('$errormessage')</script>";
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel = "stylesheet" href = "/css/index.css">
    </head>
    <body>
        <form action = "loginHandler.php" method = "POST">
            <label>Enter Username:</label>
            <input type = "text" name = "username" placeholder = "Enter Username">
            <br>
            <label>Enter Password:</label>
            <input type = "password" name = "password" placeholder = "Enter Password">
            <br>
            <input type = "submit">
            <p>Don't have an account? <a href = "register.php">Register Here!</a></p>
        </form>
    </body>
</html>