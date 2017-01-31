<?php
require_once 'classes/Database.php';
$db = new Database(); 

  $sum =0;
              
$db->query("select value from node_data where nodeid=:nodeid order by id desc limit 1 ");
$db->bind(":nodeid", "cl");
            $c =  $db->resultSet();
            var_dump($c);
                
                
                ?>