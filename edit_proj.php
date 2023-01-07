<?php

//Get Heroku ClearDB connection information
$cleardb_url = "mysql://b3260df89e9024:657e1282@us-cdbr-east-06.cleardb.net/heroku_17566dd1cdff3d3?reconnect=true";
$cleardb_server = "us-cdbr-east-06.cleardb.net";
$cleardb_username = "bdf0c388e3a321";
$cleardb_password = "54873b63";
$cleardb_db = "heroku_50be3e0a2a05780";
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$connection = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

$id = "";
$date = "";
$project_name = "";
$status = "";
$hype = "";
$chain = "";
$price = "";
$website = "";
$twitter = "";
$note = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET['id'])) {
        header(("location: index.php"));
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM projects WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header(("location: index.php"));
        exit;
    }

    $date = $row["date"];
    $project_name = $row["project_name"];
    $status = $row["status"];
    $hype = $row["hype"];
    $chain = $row["chain"];
    $price = $row["price"];
    $website = $row["website"];
    $twitter = $row["twitter"];
    $note = $row["note"];
} else {
    $id = $_POST["id"];
    $date = $_POST["date"];
    $project_name = $_POST["project_name"];
    $status = $_POST["status"];
    $hype = $_POST["hype"];
    $chain = $_POST["chain"];
    $price = $_POST["price"];
    $website = $_POST["website"];
    $twitter = $_POST["twitter"];
    $note = $_POST["note"];

    do {
        $sql = "UPDATE `projects`" .
            "SET  date = '$date', project_name = '$project_name', status = '$status', hype = '$hype', chain = '$chain', price = '$price', website = '$website', twitter = '$twitter', note = '$note'" .
            "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invaild query: " . $connection->error;
            break;
        }

        $successMessage = "Project Updated";

        header("location: index.php");
        exit;
    } while (false);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MT | EDIT PROJECT</title>
    <link rel="icon" type="image/icon type" href="images/logos/mt-logo-blk.png">
    <link rel="stylesheet" type="text/css" href="style.css" crossorigin="anonymous">
    <script src="js/navbar.js" defer></script>
</head>

<body>

    <nav class="navBar">
        <a href="index.php"><img class="navLogo" src="images/logos/mt-logo-white.png" alt="MyTxns Logo"></a>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="index.php" target="">Projects</a></li>
                <li><a href="https://nanacalc.com/" target="_blank">Nana Calc</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <br><br>

    <h2 align="center">EDIT PROJECT</h2>

    <?php
    if (!empty($errorMessage)) {
        echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert success alert dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                            </div>
                        </div>
                    </div>
                ";
    }
    ?>

    <fieldset class="loginForm">
        <form class="loginForm" method="POST">
            <div>
                <input id="id" name="id" type="hidden" value="<?php echo $id; ?>">
                <input class="" id="date" name="date" type="date" value="<?php echo $date; ?>" placeholder="Date...">
                <input class="" id="project_name" name="project_name" type="text" value="<?php echo $project_name; ?>" placeholder="Project Name...">
            </div>
            <br>
            <div>
                <select class="" id="status" name="status" value="<?php echo $status; ?>">
                    <option value="Whitelist">Whitelisted</option>
                    <option value="WL Pending">WL Pending</option>
                    <option value="Need WL">Need WL</option>
                </select>
                <select class="" id="hype" name="hype" value="<?php echo $hype; ?>">
                    <option value="Hyped">Hyped</option>
                    <option value="Something">Something</option>
                    <option value="Meh">Meh</option>
                </select>
            </div>
            <div>
                <select class="" id="chain" name="chain" value="<?php echo $chain; ?>">
                    <option value="Eth">Eth</option>
                    <option value="Poly">Poly</option>
                    <option value="Sol">Sol</option>
                    <option value="Near">Near</option>
                </select>
                <input class="createPrice" type="float" id="price" name="price" value="<?php echo $price; ?>" placeholder="Price">
            </div>
            <br>
            <div>
                <input class="" type="url" id="website" name="website" value="<?php echo $website; ?>" placeholder="Website url...">
            </div>
            <div>
                <input class="" type="url" id="twitter" name="twitter" value="<?php echo $twitter; ?>" placeholder="Twitter url...">
            </div>
            <br>
            <div>
                <textarea class="" type="text" id="note" name="note" value="<?php echo $note; ?>" rows="5" cols="30" placeholder="Notes | copy and pasta info..."><?php echo $note; ?></textarea>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert success alert dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                            </div>
                        </div>
                    </div>
                ";
            }
            ?>
            <button class="" type="submit">Update</button>
            <a class="" href="index.php" role="button">Cancel</a>
        </form>
    </fieldset>
</body>

</html>