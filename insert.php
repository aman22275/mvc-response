<?php
require_once 'classes/Database.php';
$api = $_GET["key"];

$value1 = $_GET["f1"];
$value2 = $_GET["f2"];
$value3 = $_GET["f3"];

$database = new Database;
$database->query("INSERT into channel_data (f1, f2, f3) values(:f1, :f2, :f3) where api=:api");
$database->bind(":f1", $value1);
$database->bind(":f2", $value2);
$database->bind(":f3", $value3);
$database->bind(":api", $api);

$database->execute();