<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MT | PROJECTS</title>
    <link rel="icon" type="image/icon type" href="images/logos/mt-logo-blk.png">
    <link rel="stylesheet" type="text/css" href="style.css" crossorigin="anonymous">
</head>

<body>

    <nav class="navBar">
        <div><img class="navLogo" src="images/logos/mt-logo-white.png" alt="MyTxns Logo"></div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="index.php">MyTxns</a></li>
                <li><a href="https://nanacalc.com/" target="_blank">Nana Calc</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <br><br>

    <?php if (!isset($user)) :
        header("location: login.php");
        exit;
    ?>

    <?php endif; ?>

    <h2><?php echo $user["user_name"] ?>'s Projects</h2>
    <a href='create_proj.php'><img class='newIcon' src='images/icons/new_icon.png' alt='New Icon'></a>
    <br>
    <table class="project_table">
        <thead>
            <tr class="table_header">
                <th>DATE</th>
                <th>NAME</th>
                <th>STATUS</th>
                <th>HYPE</th>
                <th>CHAIN</th>
                <th>PRICE</th>
                <th>WEBSITE</th>
                <th>TWITTER</th>
                <th>NOTES</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "mytxns";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // read all row from database table
            $sql = "SELECT * FROM projects WHERE user_id = $_SESSION[user_id]";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            // read data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                                <td>$row[date]</td>
                                <td>$row[project_name]</td>
                                <td>$row[status]</td>
                                <td>$row[hype]</td>
                                <td>$row[chain]</td>
                                <td>$row[price]</td>
                                <td><a href='$row[website]' target='_blank'><img class='webIcon' src='images/icons/weblink-icon.png' alt='Project Website Link'></a></td>
                                <td><a href='$row[twitter]' target='_blank'><img class='twitIcon' src='images/logos/twitter-logo.png' alt='Project Twitter Link'></></a></td>
                                <td><textarea rows='1' cols='20'>$row[note]</textarea></td>
                                <td>
                                    <a href='edit_proj.php?id=$row[id]'><img class='editIcon' src='images/icons/edit-icon.png' alt='Edit Icon'></a>
                                    <a href='delete_proj.php?id=$row[id]'><img class='editIcon' src='images/icons/delete_icon.png' alt='Delete Icon'></a>
                                </td>
                            </tr>";
            }

            $connection->close();
            ?>
        </tbody>
    </table>
</body>

</html>