<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];


    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = "us-cdbr-east-06.cleardb.net";
    $cleardb_username = "b3260df89e9024";
    $cleardb_password = "657e1282";
    $cleardb_db = "heroku_17566dd1cdff3d3";
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $connection = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    $sql = "DELETE FROM `projects` WHERE id=$id";
    $connection->query($sql);
}

header("location: index.php");
exit;
?>