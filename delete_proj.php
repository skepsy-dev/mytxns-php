<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];


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

    $sql = "DELETE FROM `projects` WHERE id=$id";
    $connection->query($sql);
}

header("location: index.php");
exit;
?>