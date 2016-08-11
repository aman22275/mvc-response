<?php

if(isset($_GET))
{
    
  //  $delete_id = $_GET["key"];
    $value = $_GET["v"];
    $name = $_GET["name"];
    $id = $_GET["id"];
    
    //$k= "fidsuio";
include 'classes/Database.php';
$database = new Database;


    
    //$database->query("DELETE FROM ins where id=:id");
    $database->query("insert into ins(value,channel_id,name) values(:value,:channel_id,:name)");
  // $database->bind(":key", $delete_id);
   //$database->bind(":value", $value);
   $database->bind(":value", $value);
   $database->bind(":channel_id", $id);
   $database->bind(":name", $name); 
    //$database->bind(":key", $delete_id);
    //$database->bind(":value", $value);
    $database->execute();

}
?>