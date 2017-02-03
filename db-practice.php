<?php
require_once 'classes/Database.php';
$db = new Database(); 

  $sum ="";
              
$db->query("select value from node_data where nodeid=:nodeid order by id desc limit 1 ");
$db->bind(":nodeid", "sl");
            $c =  $db->resultSet();
            foreach ($c as $r)
            {
                $rrr = $r["value"];
           //     var_dump($rrr);
            }
            
$db->query("select value from node_data where nodeid=:nodeid order by id desc limit 1 ");
$db->bind(":nodeid", "dl");
            $c1 =  $db->resultSet();
            foreach ($c1 as $r1)
            {
                $rrr1 = $r1["value"];
             //   var_dump($rrr1);
            }
                    //echo $c;
                    
$db->query("select colourlight from node_data where nodeid=:nodeid order by id desc limit 1 ");
$db->bind(":nodeid", "cl");
            $cc =  $db->resultSet();            
           foreach ($cc as $rr)
            {
               $ccc = $rr["colourlight"];
               //var_dump($ccc);
               
            }
        $sum = $rrr.$rrr1.$ccc;
         echo $sum;
                ?>
  