<?php
session_start();
include 'databaseconnector.php';

if(!isset($_SESSION['currentLoggedRole'])) {
        $_SESSION['error'] = "Error is set!";
        $_SESSION['error_message'] = "Illegal access to user page!";
        header("Location: index.php");
        exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Page</title>
        <link rel = "stylesheet" href = "userpage.css">
    </head>
    <body>
        <section class = "cardContainer">
            <a href = "logout.php" class = "logoutButton">Logout</a>
            <h1>User Profile</h1>
            <div class = "profilePicture">
                <?php echo strtoupper($_SESSION['firstLetterOfUsername']); ?>
            </div>
            <h2><?php echo $_SESSION['fullnameOfLoggedUser']?></h2>
            <h3 class = "roleLabel">User</h3>
            <div class = "subsection">
                <p class = "emailAddressLabel">Email Address</p>
                <p class = "emailAddressValue"><?php echo $_SESSION['emailOfLoggedUser']?></p>
                <p class = "memberSinceLabel">Member Since</p>
                <p class = "emailAddressValue"><?php echo $_SESSION['memberSince']?></p>
            </div>
        </section>
    </body>
</html>