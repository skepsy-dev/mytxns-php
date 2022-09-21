<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf(
        "SELECT * FROM `users`
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();


    if (password_verify($_POST["password"], $user["password_hash"])) {

        session_start();

        session_regenerate_id();

        $_SESSION["user_id"] = $user["id"];

        header("Location: index.php");
        exit;
    }


    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MT | LOGIN</title>
    <link rel="icon" type="image/icon type" href="images/logos/mt-logo-blk.png">
    <link rel="stylesheet" type="text/css" href="style.css" crossorigin="anonymous">
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
                <li><a href="about.html" target="">About</a></li>
                <li><a href="https://nanacalc.com/" target="_blank">Nana Calc</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </div>
    </nav>

    <br><br>

    <h2>Login</h2>

    <?php if ($is_invalid) : ?>
        <p>Invalid login</p>
    <?php endif; ?>

    <fieldset class="loginForm">
        <form method="post">
            <div>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" placeholder="Enter Email">
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Enter Password">
            </div>
            <br>
            <button class="" type="submit">Login</button>
        </form>
    </fieldset>
</body>

</html>