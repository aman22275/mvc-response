<?php
$key = $_GET["key"];
$f1=$_GET["f1"];
require_once 'classes/Database.php';
$database = new Database;
$database->query("UPDATE channel_data set f1=:f1 where api=:api");
$database->bind(":f1", $f1);
$database->bind(":api", $key);
$database->execute();
echo "updated";