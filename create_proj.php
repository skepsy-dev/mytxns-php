<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mytxns";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST["user_id"];
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
        $sql = "INSERT INTO projects(user_id, date, project_name, status, hype, chain, price, website, twitter, note)" .
            "VALUES ('$user_id','$date','$project_name','$status','$hype','$chain','$price','$website','$twitter',' $note')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Please Enter Info: " . $connection->error;
            break;
        }

        $date = "";
        $project_name = "";
        $status = "";
        $hype = "";
        $chain = "";
        $price = "";
        $website = "";
        $twitter = "";
        $note = "";

        $successMessage = "Project Added";

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
    <title>MT | ADD PROJECT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h3>NEW PROJECT</h3>

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

    <fieldset class="cpFieldset">
        <form class="cpForm" method="POST">

            <input class="" id="user_id" name="user_id" type="hidden" value="<?php echo $_SESSION["user_id"]; ?>">
            <input class="" id="date" name="date" type="date" value="<?php echo $date; ?>" placeholder="Date...">
            <input class="" id="project_name" name="project_name" type="text" value="<?php echo $project_name; ?>" placeholder="Project Name...">
            <br>
            <select class="" id="status" name="status" value="<?php echo $status; ?>">
                <option value="" selected hidden>Status...</option>
                <option value="Whitelist">WL Secured</option>
                <option value="wl Pending">WL Pending</option>
                <option value="wl Needed">Need WL</option>
            </select>
            <select class="" id="hype" name="hype" value="<?php echo $hype; ?>">
                <option value="" selected hidden>Hype...</option>
                <option value="Hyped">Hyped</option>
                <option value="Something">Something</option>
                <option value="Meh">Meh</option>
            </select>
            <br>
            <select class="" id="chain" name="chain" value="<?php echo $chain; ?>">
                <option value="" selected hidden>Chain</option>
                <option value="Eth">Eth</option>
                <option value="Poly">Poly</option>
                <option value="Sol">Sol</option>
                <option value="Near">Near</option>
            </select>
            <input class="" type="float" id="price" name="price" value="<?php echo $price; ?>" placeholder="Price">
            <br>
            <input class="" type="url" d="website" name="website" value="<?php echo $website; ?>" placeholder="Website url...">
            <br>
            <input class="" type="url" id="twitter" name="twitter" value="<?php echo $twitter; ?>" placeholder="Twitter url...">
            <br>
            <textarea class="" id="note" name="note" value="<?php echo $note; ?>" rows="5" cols="30" placeholder="Notes | copy and pasta info..."></textarea>
            <br>
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
            <button class="" type="submit">Add</button>
            <a class="" href="index.php" role="button">Cancel</a>
        </form>
    </fieldset>
</body>

</html>