<?php
require_once 'classes/Database.php';
$database = new Database();
$database->query("delete from node_data");
$database->execute();