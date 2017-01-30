<?php
require_once 'classes/Database.php';
$s[] = array('11','12','13');

$feildApi = "11";
$userApi = "11";
$node = "11";
$sum = "11";
$time = "11";
$date = "11";
$database = new Database();
                $database->query("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values(:feildapi,:apikey,:nodeid,:value,:time,:date)");
                foreach ($data as $s)
                {
                $database->bind(":feildapi", $feildApi);
                $database->bind(":apikey", $userApi);
                $database->bind(":nodeid", $s[0]);
                $database->bind(":value", $sum);
                $database->bind(":time", $time);
                $database->bind(":date", $date);
                }
                
                $database->execute();
                echo "200";
  