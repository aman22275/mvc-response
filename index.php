<?php
	if(isset($_GET['url']))
	{
            
            //echo $userApi."<->".$feildApi."<->".$nodeId."<->".$nodeValue;
            require_once 'classes/Database.php';
                $url = $_GET['url'];
		$url = rtrim($url,'/');
		$url = explode('/',$url);
		
                //xyz.com/insert/API(user)/Fieldid(channel)/nodeId/value
                //xyz.com/0     /1        /2               /3     /4
                if(function_exists($url['0']) && $url['0']=="insert")
		{
                    //this line means USER API key is entered
			if(isset($url['1']))
                        {
                            //ChannelId(feild id)
                            if(isset($url['2']))
                                //if(!isset ($url['3']))
                                  //  $url['3'] = "null";
                                       if(!isset($url['3']))
                                           $url['3']="null";
                                       //insert(API(USER),FeildId(Channelid),nodeId,value)
                                       $url['0']($url['1'],$url['2'],$url['3']);
                        }
                                else
                            echo "NO PARAMETERS FOUND";
		} else
              
                    if(function_exists($url['0']) && $url['0']=="int")
                    {
                  //this line means USER API key is entered
			if(isset($url['1']))
                        {
                            //ChannelId(feild id)
                            if(isset($url['2']))
                                //if(!isset ($url['3']))
                                  //  $url['3'] = "null";
                                       if(!isset($url['3']))
                                           $url['3']="null";
                                       //insert(API(USER),FeildId(Channelid),nodeId,value)
                                       $url['0']($url['1'],$url['2'],$url['3']);
                        }
                                else
                            echo "NO PARAMETERS FOUND";
                   } else
                    
                    if(function_exists($url['0']) && $url['0']=="light")
                    {
                
                //this line means USER API key is entered
			if(isset($url['1']))
                        {
                            //ChannelId(feild id)
                            if(isset($url['2']))
                                //if(!isset ($url['3']))
                                  //  $url['3'] = "null";
                                       if(!isset($url['3']))
                                           $url['3']="null";
                                       //insert(API(USER),FeildId(Channelid),nodeId,value)
                                       $url['0']($url['1'],$url['2'],$url['3']);
                        }
                                else
                            echo "NO PARAMETERS FOUND";
                  }
                    
                    
                else
                    if(function_exists($url['0']) && $url['0']=="insert2")
                    {
                
                    //this line means USER API key is entered
			if(isset($url['1']))
                        {
                            //ChannelId(feild id)
                            if(isset($url['2']))
                                if(!isset ($url['3']))
                                    $url['3'] = "null";
                                       if(!isset($url['4']))
                                           $url['4']="null";
                                       //insert(API(USER),FeildId(Channelid),nodeId,value)
                                       $url['0']($url['1'],$url['2'],$url['3'],$url['4']);
                        }
                                else
                            echo "NO PARAMETERS FOUND";
                    }
                    
                    
	} else if(function_exists($url['0'])&& $url['0']=="result")
        {
            if(isset($url['1']))
                        {
                            //ChannelId(feild id)
                            if(isset($url['2']))
                                //if(!isset ($url['3']))
                                  //  $url['3'] = "null";
                                       if(!isset($url['3']))
                                           $url['3']="null";
                                       //insert(API(USER),FeildId(Channelid),nodeId,value)
                                       $url['0']($url['1'],$url['2'],$url['3']);
                        }
                                else
                            echo "NO PARAMETERS FOUND";
        }
        else
			echo "No Function";
    
        //TO GET THE VALUES OF PIR AND SMOKE SENSOR
        // NODEID PIR - pir
        // NODEID SMOKE SENSOR - smoke
        //URL - http://localhost/mvc-response/int/sensenuts/iot/0or1

        function int($userApi,$feildApi,$nodeValue)                
        {
            
            
            require_once 'classes/Database.php';
            $db = new Database();
           
            
            
            if($nodeValue=="0")
            {
                //PIR SENSOR
                 date_default_timezone_set('Asia/Kolkata');
                     $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");
                   $db->query("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','pir','0','$time','$date')");
                   $db->execute();
     
            }
            else
            if($nodeValue=="1")
            {
                //SMOKE SENSOR
                 date_default_timezone_set('Asia/Kolkata');
                     $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");
                   $db->query("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','smoke','1','$time','$date')");
                   $db->execute();
     
                }
                
        }

        //TO HANDLE LIGHT VALUE AND STREET LIGHT VALUES 
        //NODEID FOR STREET LIGHT - sl - CODE VALUE - y
        //NODEID FOR COLOUR LIGHT - cl - CODE VALUE - z
        //NODEID FOR DIM LIGHT    - dl - code value - x
        function light($userApi,$feildApi,$nodeValue)                
        {
           $node="";
            $sum="";
            $s[] = array();
            $s=$nodeValue;
            
            if($s[0] =="y")
              {
                $node="sl";
             }else
                if ($s[0]=="z") 
             {
                $node="cl";
             }else
                 if($s[0]=="x")
             {
                $node="dl";
             }
             
            echo $node; 
            for($i=1;$i<strlen($s);$i++)
            {
                 $sum=$sum.$s[$i];
             }
                
             echo "sum->".$sum;
           
            
            require_once 'classes/Database.php';
            $db = new Database();
            
            
                //PIR SENSOR
                 date_default_timezone_set('Asia/Kolkata');
                     $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");
                     if($node=="cl")
                     {
                   $db->query("INSERT into node_data(feildapi,apikey,nodeid,colourlight,time,date) values('iot','sensenuts','$node','$sum','$time','$date')");
                     }
                     else 
                     if($node=="sl")
                     {
                   $db->query("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','$node',$sum,'$time','$date')");
                             
                     }
                     else
                     {
                   $db->query("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','$node',$sum,'$time','$date')");
                     }
                   $db->execute();
                   echo "insert";
     
            
                
        }


        //TO RETURN A STRING THAT PRINT LAST INSERTED VALUES OF STREET & COLOUR LIGHT
        //09(Street light value)AGTSVD(Colour value)
        function result($userApi,$feildApi,$nodeValue)
        {
            echo "hii";
            if($nodeValue=="get"){
            require_once 'classes/Database.php';
            $db = new Database();
        $sum ="";
              
$db->query("select value from node_data where nodeid=:nodeid order by id desc limit 1 ");
$db->bind(":nodeid", "sl");
            $c =  $db->resultSet();
            foreach ($c as $r)
            {
                $rrr = $r["value"];
              //  var_dump($rrr);
            }
                    //echo $c;
                    
$db->query("select colourlight from node_data where nodeid=:nodeid order by id desc limit 1 ");
$db->bind(":nodeid", "cl");
            $cc =  $db->resultSet();            
           foreach ($cc as $rr)
            {
               $ccc = $rr["colourlight"];
            //   var_dump($ccc);
               
            }
        $sum = $rrr.$ccc;
         echo $sum;
         var_dump($sum);
            }
        }

        function insert($userApi,$feildApi,$nodeValue)
	{
            
            $node="";
            $sum="";
            $s[] = array();
            $s=$nodeValue;
            var_dump($s);
            $myArray = explode(',', $s);
         
            $light = $myArray[0];
            $temp = $myArray[1];
            $humid = $myArray[2];
            $co = $myArray[3];
            $co2 = $myArray[4];
            $psl= $myArray[5];
            $pcl = $myArray[6];
            $pcl2= $myArray[7];
            
            var_dump($myArray);
                    
            
           // echo "ph".$ph;
           // echo "light".$light;

            
           /* if($s[0]=="0")
            {
                $node="ph";
            }else
                if ($s[0]=="1") 
             {
                $node="ec";
             }else
                if ($s[0]=="2") 
             {
                $node="temp";
             }else
                if ($s[0]=="3") 
             {
                $node="moist";
             }else
                if ($s[0]=="4") 
             {
                $node="tds";
             }else
                if ($s[0]=="5") 
             {
                $node="at";
             }else
                if ($s[0]=="6") 
             {
                $node="ah";
             }else
                if ($s[0]=="7") 
             {
                $node="al";
             }else
                if ($s[0]=="8") 
             {
                $node="hph";
             }else
                if ($s[0]=="9") 
             {
                $node="hec";
             }else
                if ($s[0]=="a") 
             {
                $node="htm";
             }else
                if ($s[0]=="b") 
             {
                $node="hatah";
             }else
                if ($s[0]=="c") 
             {
                $node="hal";
             }*/
          //  echo $node; 
           /* for($i=1;$i<strlen($s);$i++)
            {
                 $sum=$sum.$s[$i];
             }
                
             echo $sum;
            
            */
            
            
            $database = new Database;
            $database->query("select apikey from usersignup where apikey=:apikey");
            $database->bind(":apikey", $userApi);
            $b = $database->resultSet();
         
            //if key matches then only data will inserted
             if($b)
           {       
                 
                    
            $database->query("select feildapi from channel_data where feildapi=:feildapi");
            $database->bind(":feildapi", $feildApi);
             $d = $database->resultSet();
            if($d){
                 function rand_string( $length ) {
	$chars = "0123456789";	
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
	$str = substr( str_shuffle( $chars ), 0, $length );
          
        }
	return $str;
}

                   $apikey = "SENSE".rand_string( 3 );

        
                /*$database->query("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values(:feildapi,:apikey,:nodeid,:value,:time,:date)");
                $database->bind(":feildapi", $feildApi);
                $database->bind(":apikey", $userApi);
                $database->bind(":nodeid", $node);
                $database->bind(":value", $sum);
                $database->bind(":time", $time);
                $database->bind(":date", $date);
                            
                $database->execute();
                echo "200";
                 
                 */
                   
                   try {
    $conn = new PDO("mysql:host=localhost;dbname=dashboard", "root", "");
    // set the PDO error mode to exception
     date_default_timezone_set('Asia/Kolkata');
                     $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','0',$light,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','1',$temp,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','2',$humid,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','3',$co,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','4',$co2,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','5',$psl,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','6',$pcl,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','7',$pcl2,'$time','$date')");
    // commit the transactionzz
    $conn->commit();
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
            }else
            {
                echo "feildApi is not correct";
            }
            
           }else
           {
               echo "your APIKEY is not correct";
           }
           
       }
       
       function insert2($userApi,$feildApi,$nodeValue)
	{
            
            $node="";
            $sum="";
            $s[] = array();
            $s=$nodeValue;
            var_dump($s);
            $myArray = explode(',', $s);
         
            $cum = $myArray[0];
            $vol = $myArray[1];
            $pf = $myArray[2];
            $pow = $myArray[3];
            
            var_dump($myArray);
                                
            $database = new Database;
            $database->query("select apikey from usersignup where apikey=:apikey");
            $database->bind(":apikey", $userApi);
            $b = $database->resultSet();
         
            //if key matches then only data will inserted
             if($b)
           {       
                 
                    
            $database->query("select feildapi from channel_data where feildapi=:feildapi");
            $database->bind(":feildapi", $feildApi);
             $d = $database->resultSet();
            if($d){
                 function rand_string( $length ) {
	$chars = "0123456789";	
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
	$str = substr( str_shuffle( $chars ), 0, $length );
          
        }
	return $str;
}

                   $apikey = "SENSE".rand_string( 3 );
           try {
    $conn = new PDO("mysql:host=localhost;dbname=dashboard", "root", "");
    // set the PDO error mode to exception
     date_default_timezone_set('Asia/Kolkata');
                     $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','8',$cum,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','9',$vol,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','a',$pf,'$time','$date')");
    $conn->exec("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values('iot','sensenuts','b',$pow,'$time','$date')");
    // commit the transactionzz
    $conn->commit();
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
            }else
            {
                echo "feildApi is not correct";
            }
            
           }else
           {
               echo "your APIKEY is not correct";
           }
           
       }
       
       function power($userApi,$feildApi,$nodeId,$nodeValue)
               
       {
            $db = new Database;
            $db->query("select apikey from usersignup where apikey=:apikey");
            $db->bind(":apikey", $userApi);
            $b = $db->resultSet();
          //  echo "hello";
       
            //if key matches then only data will inserted
             if($b)
           {       
                 
date_default_timezone_set('Asia/Kolkata');
                     $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");

            $db->query("select feildapi from channel_data where feildapi=:feildapi");
            $db->bind(":feildapi", $feildApi);
             $d = $db->resultSet();
            if($d){
                 function rand_string( $length ) {
	$chars = "0123456789";	
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
	$str = substr( str_shuffle( $chars ), 0, $length );
          
        }
	return $str;
}

                   $apikey = "SENSE".rand_string( 3 );

        
                $db->query("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values(:feildapi,:apikey,:nodeid,:value,:time,:date)");
                $db->bind(":feildapi", $feildApi);
                $db->bind(":apikey", $userApi);
                $db->bind(":nodeid", $nodeId);
                $db->bind(":value", $nodeValue);
                $db->bind(":time", $time);
                $db->bind(":date", $date);
             
                
              $ss =   $db->execute();
             if($ss==NULL)
             {
                 $db->query("select sum(value) from node_data where nodeid=:nodeid");
                 $db->bind(":nodeid", $nodeId);
                $d =  $db->resultSet();
                foreach ($d as $result)
                {
                
                    echo $result['sum(value)'];
                    
                }
                if($d)
                {
                $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");
                    $db->query("insert into node_data (nodeid,feildapi,apikey,value,time,date) values(:nodeid,:feildapi,:apikey,:value,:time,:date)");
                $db->bind(":nodeid", "powerRoomThree");
                $db->bind(":feildapi", "power3");
                $db->bind("apikey", "sensenuts123");
                $db->bind(":value", $result['sum(value)']);
                $db->bind(":time", $time);
                $db->bind(":date", $date);
                $db->execute();
                echo "-adsad";
                }
                }
                
                echo "200";
            }else
            {
                echo "feildApi is not correct";
            }
            
           }else
           {
               echo "your APIKEY is not correct";
           }
                  }
                  
                  
       function power1($userApi,$feildApi,$nodeId,$nodeValue)
               
       {
            $db = new Database;
            $db->query("select apikey from usersignup where apikey=:apikey");
            $db->bind(":apikey", $userApi);
            $b = $db->resultSet();
          //  echo "hello";
       
            //if key matches then only data will inserted
             if($b)
           {       
                 
date_default_timezone_set('Asia/Kolkata');
                     $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");

            $db->query("select feildapi from channel_data where feildapi=:feildapi");
            $db->bind(":feildapi", $feildApi);
             $d = $db->resultSet();
            if($d){
                 function rand_string( $length ) {
	$chars = "0123456789";	
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
	$str = substr( str_shuffle( $chars ), 0, $length );
          
        }
	return $str;
}

                   $apikey = "SENSE".rand_string( 3 );

        
                $db->query("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values(:feildapi,:apikey,:nodeid,:value,:time,:date)");
                $db->bind(":feildapi", $feildApi);
                $db->bind(":apikey", $userApi);
                $db->bind(":nodeid", $nodeId);
                $db->bind(":value", $nodeValue);
                $db->bind(":time", $time);
                $db->bind(":date", $date);
             
                
              $ss =   $db->execute();
             if($ss==NULL)
             {
                 $s=0;
                 $db->query("select * from node_data where feildapi=:feildapi");
                 $db->bind(":feildapi", $feildApi);
                $d =  $db->resultSet();
                foreach ($d as $result)
                {
                
                    $s = $s + $result['value'];
                    
                }
                echo "Room1Total-".$s;
               if($d)
                {
                      $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");
                $db->query("insert into node_data (nodeid,feildapi,apikey,value,time,date) values(:nodeid,:feildapi,:apikey,:value,:time,:date)");
                $db->bind(":nodeid", "powerRoomOne");
                $db->bind(":feildapi", "powerOne");
                $db->bind("apikey", "sensenuts123");
                $db->bind(":value",$s);
                $db->bind(":time",$time);
                $db->bind(":date",$date);
               
                $db->execute();
                echo "-adsad";
                }
                }
                
                echo "200";
            }else
            {
                echo "feildApi is not correct";
            }
            
           }else
           {
               echo "your APIKEY is not correct";
           }
                  }
                  
                  
                   
       function power2($userApi,$feildApi,$nodeId,$nodeValue)
               
       {
            $db = new Database;
            $db->query("select apikey from usersignup where apikey=:apikey");
            $db->bind(":apikey", $userApi);
            $b = $db->resultSet();
          //  echo "hello";
       
            //if key matches then only data will inserted
             if($b)
           {       
                 
date_default_timezone_set('Asia/Kolkata');
                     $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");

            $db->query("select feildapi from channel_data where feildapi=:feildapi");
            $db->bind(":feildapi", $feildApi);
             $d = $db->resultSet();
            if($d){
                 function rand_string( $length ) {
	$chars = "0123456789";	
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
	$str = substr( str_shuffle( $chars ), 0, $length );
          
        }
	return $str;
}

                   $apikey = "SENSE".rand_string( 3 );

        
                $db->query("INSERT into node_data(feildapi,apikey,nodeid,value,time,date) values(:feildapi,:apikey,:nodeid,:value,:time,:date)");
                $db->bind(":feildapi", $feildApi);
                $db->bind(":apikey", $userApi);
                $db->bind(":nodeid", $nodeId);
                $db->bind(":value", $nodeValue);
                $db->bind(":time", $time);
                $db->bind(":date", $date);
             
                
              $ss =   $db->execute();
             if($ss==NULL)
             {
                 $s=0;
                 $db->query("select * from node_data where feildapi=:feildapi");
                 $db->bind(":feildapi", $feildApi);
                $d =  $db->resultSet();
                foreach ($d as $result)
                {
                
                    $s = $s + $result['value'];
                    
                }
                echo "vvv-".$s;
               if($d)
                {
                    $date =  date("Y-m-d");                   
                     $time =  date("h:i:s");
                $db->query("insert into node_data (nodeid,feildapi,apikey,value,time,date) values(:nodeid,:feildapi,:apikey,:value,:time,:date)");
                $db->bind(":nodeid", "powerRoomTwo");
                $db->bind(":feildapi", "powerTwo");
                $db->bind("apikey", "sensenuts123");
                $db->bind(":value",$s);
                $db->bind(":time", $time);
                $db->bind(":date", $date);
                $db->execute();
                echo "-adsad";
                }
                }
                
                echo "200";
            }else
            {
                echo "feildApi is not correct";
            }
            
           }else
           {
               echo "your APIKEY is not correct";
           }
                  }
    
    
	/*function update($api, $name)
	{
            $database = new Database;
            $database->query("UPDATE channel_users set name=:name where api=:api");
            $database->bind(":name", $name);
            $database->bind(":api", $api);
            $database->execute();
	
        }
        
        function delete($api)
        {
            $database = new Database;
            $database->query("DELETE from channel_users where api=:api");
            $database->bind(":api", $api);
           $d = $database->execute();
           if($d==TRUE)
           {
           }else
           {
                $database->query("DELETE from channel_data where api=:api");
                $database->bind(":api", $api);
                        $database->execute();
           }
        }*/
        
?>