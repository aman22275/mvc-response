<?php
require_once 'classes/Database.php';
$db = new Database(); 

  $sum =0;
              
$db->query("select * from node_data where feildapi=:feildapi");
                $db->bind(":feildapi", "power2");
                // $db->bind(":node", "slight");
                $d =  $db->resultSet();
                foreach ($d as $result)
                {
                
                    $sum = $sum + $result["value"];
                    //echo $result['sum(value)'];
                    
                }
                echo $sum;
                
                
                ?>