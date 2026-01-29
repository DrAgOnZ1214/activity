<?php
session_start();
include 'databaseconnector.php';

if($_SESSION['currentLoggedRole'] !== "admin") {
        $_SESSION['error'] = "Error is set!";
        $_SESSION['error_message'] = "Illegal access to admin page!";
        header("Location: index.php");
        exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Page</title>
        <link rel = "stylesheet" href = "adminpage.css">
    </head>
    <body>
        <a href = "logout.php" class = "logoutButton">Logout</a>
        <table class = "cardContainer">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Date</th>
            </tr>
            <?php
            $getUsersSQL = "SELECT * FROM user";
            $result = mysqli_query($conn, $getUsersSQL);

            while($row = mysqli_fetch_assoc($result)) {
                if ($row['user_id'] == 1) {continue;} //DO NOT INCLUDE THE ADMIN USER IN THE TABLE
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "<td>" . $row['date_registered'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>