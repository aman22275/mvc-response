<?php
	if(isset($_GET['url']))
	{
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
                                if(!isset ($url['3']))
                                    $url['3'] = "null";
                                       if(!isset($url['4']))
                                           $url['4']="null";
                                       //insert(API(USER),FeildId(Channelid),nodeId,value)
                                       $url['0']($url['1'],$url['2'],$url['3'],$url['4']);
                        }
                                else
                            echo "NO PARAMETERS FOUND";
		} else
              
                    if(function_exists($url['0']) && $url['0']=="update")
                    {
                        if(isset($url['0']))
                        {
                            if(isset($url['1']))
                                $url['0']($url['1'],$url['2']);
                        }
                    } else
                    
                    if(function_exists($url['0']) && $url['0']=="delete")
                    {
                        if(isset($url['1']))
                        {
                            $url['0']($url['1']);
                        }
                    }
                    
                    
                else
			echo "No Function";
	}
    
        

        function insert($userApi,$feildApi,$nodeId,$nodeValue)
	{
            $database = new Database;
            $database->query("select apiKey from users where apiKey=:apiKey");
            $database->bind(":apiKey", $userApi);
          
            $b = $database->resultSet();
            
            //this will tell number of feilds require
            /*foreach ($b as $row)
            {
                $totalField = $row['total'];
                echo $totalField;
                
            }*/
           
            //if key matches then only data will inserted
             if($b)
           {         
            $database->query("select feildKey from channel_data where feildKey=:feildKey");
            $database->bind(":feildKey", $feildApi);
             $d = $database->resultSet();
            if($d){
                $database->query("INSERT into node_data(feildKey,nodeId,value) values(:feildKey, :nodeId, :value)");
                $database->bind(":feildKey", $feildApi);
                $database->bind(":nodeId", $nodeId);
                $database->bind(":value", $nodeValue);
                $database->execute();
                echo "200";
            }else
            {
                echo "Your FeildApi is not correct";
            }
            
           }else
           {
               echo "Your Api Is Not Correct";
           }
           
       }
    
	function update($api, $name)
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
        }
        
?>