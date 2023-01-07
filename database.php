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
$mysqli = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;


// <?php
// //Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
