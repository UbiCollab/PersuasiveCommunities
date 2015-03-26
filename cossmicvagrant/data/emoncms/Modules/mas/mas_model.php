<?php global $path, $session, $user; ?>

<?php
/*
 All Emoncms code is released under the GNU Affero General Public License.
 See COPYRIGHT.txt and LICENSE.txt.

 ---------------------------------------------------------------------
 Emoncms - open source energy visualisation
 Part of the OpenEnergyMonitor project:
 http://openenergymonitor.org
 */

// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');



class MASInterface
{
    private $mysqli;
    private $redis;
    private $log;
    private $loadsdir="/home/www-data/Dropbox/cossmicprototype/neighbour";
    
    public function __construct($mysqli,$redis)
    {
        $this->mysqli = $mysqli;
        $this->redis = $redis;
        $this->log = new EmonLogger(__FILE__);
    }
/*
    // USES: redis input & user
    public function create_driver($userid, $nodeid, $name)
    {
        $userid = (int) $userid;
        $nodeid = (int) $nodeid;

        if ($nodeid<32)
        {

          $name = preg_replace('/[^\w\s-.]/','',$name);
          $this->mysqli->query("INSERT INTO input (userid,name,nodeid) VALUES ('$userid','$name','$nodeid')");
          
          $id = $this->mysqli->insert_id;
          
          $this->redis->sAdd("user:inputs:$userid", $id);
	        $this->redis->hMSet("input:$id",array('id'=>$id,'nodeid'=>$nodeid,'name'=>$name,'description'=>"", 'processList'=>"")); 
	        
	      }
	      
	      return $id;     
    }
    */
    
    public function exists($id)
    {
      $id = (int) $id;
      $result = $this->mysqli->query("SELECT id FROM tasks WHERE `id` = '$id'");
      if ($result->num_rows > 0) return true; else return false;
    }
    
    
/*
    // USES: redis input
    public function set_timevalue($id, $time, $value)
    {
        $id = (int) $id;
        $time = (int) $time;
        $value = (float) $value;

        // $time = date("Y-n-j H:i:s", $time);
        // $this->mysqli->query("UPDATE input SET time='$time', value = '$value' WHERE id = '$id'");
        
        $this->redis->hMset("input:lastvalue:$id", array('value' => $value, 'time' => $time));
    }

*/
    // used in conjunction with controller before calling another method
    public function belongs_to_user($userid, $taskid)
    {
        $userid = (int) $userid;
        $taskid = (int) $taskid;

        $result = $this->mysqli->query("SELECT id FROM tasks WHERE userid = '$userid' AND id = '$taskid'");
        if ($result->fetch_array()) return true; else return false;
    }
/*
    // USES: redis input
    private function set_processlist($id, $processlist)
    {
      // CHECK REDIS
      $this->redis->hset("input:$id",'processList',$processlist);
      $this->mysqli->query("UPDATE input SET processList = '$processlist' WHERE id='$id'");
      
    }


    // USES: redis input
  */
  
  
   public function set_fields($id,$jsonstring)
    {
		
        $id = intval($id);
       
        $json=strtr ($jsonstring, array ("'" => '"'));
        $fields = json_decode(stripslashes($json),true);
        $success=false;
             
         foreach ( $fields as $key => $value ) {
			 
			    if($key=='AST')  $this->fakeschedule($id, $value);
			 
			 
				 if($key=='status')
				    $this->mysqli->query("UPDATE  user_tasks set status='$value' where  id=$id");
				 
			 
				 $this->mysqli->query("UPDATE user_task_par set value='$value' where taskid=$id and name='$key'");
				 
				 if($this->mysqli->affected_rows==0){
				     $this->mysqli->query("INSERT INTO user_task_par VALUES(NULL, $id, '$key', '$value')");
					 if($this->mysqli->affected_rows==0)  
						$success=true;
					}
				 else 
				   $success=true;
				}	
				$success==true? $success='success':  $success='error';
		 
          return "{'response': 'updateTask', 'result': '$success', 'taskID': '$id'}";
	}
  
  
    public function update($id,$jsonstring)
    {
        $id = intval($id);
       
        $json=strtr ($jsonstring, array ("'" => '"'));
        $fields = json_decode(stripslashes($json),true);
        $success=false;
             
         foreach ( $fields as $key => $value ) {
			 
			   
				 if($key=='status')
				    $this->mysqli->query("UPDATE  user_tasks set status='$value' where  id=$id");
				 
			 
				 $this->mysqli->query("UPDATE user_task_par set value='$value' where taskid=$id and name='$key'");
				 
				 if($this->mysqli->affected_rows==0){
				     $this->mysqli->query("INSERT INTO user_task_par VALUES(NULL, $id, '$key', '$value')");
					 if($this->mysqli->affected_rows==0)  
						$success=true;
					}
				 else 
				   $success=true;
				}	
				$success==true? $success='success':  $success='error';
		 
          return "{'response': 'updateTask', 'result': '$success', 'taskID': '$id'}";
        
        
/*
        // Repeat this line changing the field name to add fields that can be updated:
        if (isset($fields->description)) $array[] = "`description` = '".preg_replace('/[^\w\s-]/','',$fields->description)."'";
        if (isset($fields->name)) $array[] = "`name` = '".preg_replace('/[^\w\s-.]/','',$fields->name)."'";
        if (isset($fields->status)) $array[] = "`status` = '".$fields->status."'";
        // Convert to a comma seperated string for the mysql query
        
        
        
        $fieldstr = implode(",",$array);
        * 
        $this->mysqli->query("UPDATE user_drivers SET ".$fieldstr." WHERE `id` = '$id'");
        
        // CHECK REDIS?
        // UPDATE REDIS
        if (isset($fields->name)) $this->redis->hset("driver:$id",'name',$fields->name);
        if (isset($fields->description)) $this->redis->hset("driver:$id",'description',$fields->description);        
        if (isset($fields->status)) $this->redis->hset("driver:$id",'status',$fields->status);        
        */
        
        
       
    }
    
    public function add($userid, $jsonstring)
    {
		   $json=strtr ($jsonstring, array ("'" => '"'));
		   $task = json_decode(stripslashes($json), true);
		
		   $valid=true;
		   if($task['execution_type']=="single_run")
		      $type=1;
			else 
               {
				$message="'execution type not supported yet'";
				$valid=false;
				  }
			if($valid){
				$result = $this->mysqli->query("SHOW TABLE STATUS LIKE 'user_tasks'");
				$row = $result->fetch_array(1);
				$nextId = $row['Auto_increment'];   	  
				$inserts=$this->mysqli->query("INSERT INTO user_tasks (id, type, status, userid) VALUES ($nextId, $type, 0, $userid)");
				if(!$inserts)
				{
					$valid=false;
					$message = 'INVALId query:' .mysql_error()."\n";		
				}
				else 
					{
					  foreach ($task as $key => $value)  
						$this->mysqli->query("INSERT INTO user_task_par VALUES(NULL, $nextId, '$key', '$value')");
					  
					  $this->mysqli->query("INSERT INTO user_task_par VALUES(NULL, $nextId, 'AST', 'UNDEFINED')");
					  $this->mysqli->query("INSERT INTO user_task_par VALUES(NULL, $nextId, 'AET', 'UNDEFINED')");
					}
           if($valid)  
			 {
			   
			   // Get user name and create directory if does not exist
			   $result = $this->mysqli->query("SELECT username FROM users WHERE id=$userid");
			   $data = $result->fetch_object();
			   $username= $data->username;
			   //$loadsdir="dropbox/".$username."/loads";
			   $loadsdir=$this->loadsdir;
			   if (!file_exists($loadsdir."/loads"))
					mkdir($loadsdir."/loads", 0775,true);
			   if (!file_exists($loadsdir."/profiles"))
					mkdir($loadsdir."/profiles", 0775,true); 
			 if (!file_exists($loadsdir."/schedule"))
					mkdir($loadsdir."/schedule", 0775,true); 	
				//get the template id for the executionmode 
			
				$profileid=$this->saveLoadData($loadsdir."/profiles/".$username."-".$nextId.".dataload",$task['deviceID'],$task['mode']);	 
			   
				 
				//Send th task to the agents 
			   //$jsonstring=base64_encode($jsonstring); 
			   //$this->masinvoke("http://localhost:8808/add.json?taskid=$nextId&json=$jsonstring");
			   
			   /** this should be replaced from the previouse commented code*/
			   
			   
			
			   $loadfile = fopen($loadsdir."/loads/".$username."-".$nextId.".metaload", "w");
			   fwrite($loadfile, "taskID ".$nextId."\n");
			   foreach ($task as $key => $value) 
			    { 
					if(($key=="EST")or ($key=="LST"))
					{
						$elements = explode(':',$value);
                        $secs = 3600*$elements[0]+60*$elements[1];
                        $value=$secs;
					}
					fwrite($loadfile, $key." ".$value."\n");
					
				}
				
					fwrite($loadfile, "profile ".$username."-".$nextId.".dataload\n");
			    fclose($loadfile);
			    
			    
			  
			    $response=array();
			    $response["response"]="addTask";
			    $response["result"]="success";
			    $response["taskID"]="$nextId";
			   //writeLoad
			    /**prototype code */ 
               return $response;
				}
			}
			
			$response=array();
			$response["response"]="addTask";
			$response["result"]="error";
			$response["message"]="$message";
			return $response;
		}


  public function getTask($userid, $taskid)
    {     
        $userid = (int) $userid;
       
        $qresult = $this->mysqli->query("select id, type, status  from user_tasks where id=$taskid ;");
      
       
          
         if($row = $qresult->fetch_object()) 
         {
			$response="{'response': 'getTask', 'result':'success', 'task': {'id': $row->id, 'status': $row->status, 'type': $row->type, ";
        
			$qresult = $this->mysqli->query("select name, value  from user_task_par where taskid=$taskid;");
       
         while($row = $qresult->fetch_object())
		{
			
			$response=$response.", '".$row->name."': '".$row->value."'";
			}
			
         $response=$response."}}";
	 }
	 else
	   $response = "{'response': 'getTask', 'result': 'error', 'message': 'taskid $taskid not found'}";
        
       
        return $response;
    }

    public function getlist($userid,$jsonstring)
    {   
		if($jsonstring!=null)
		{
		   $json=strtr ($jsonstring, array ("'" => '"'));
		   $loptions = json_decode($json, true);
	
		   
		}
		
        $userid = (int) $userid;
        $query="select id,type, status from user_tasks where userid= '$userid'";
        if(isset($loptions) and array_key_exists("status", $loptions))
             if($loptions['status'] == 10)
			    $query=$query." and status < 4";  		     
               else             
				$query=$query." and status=".$loptions['status'];  
        
       
        $qresult = $this->mysqli->query($query);
        $userid = (int) $userid;
        /*if (!$this->redis->exists("user:drivers:$userid"))*/ 
        $this->load_to_redis($userid);
        
        /*$tasks = array();
        $driverids = $this->redis->sMembers("user:drivers:$userid");
        */
        $ra =  array("response"=>"listTasks", "result"=>"success");
        $tasks=array();
        
         while($row = $qresult->fetch_object())
		{
				
			$task=array();
			$task["id"]=$row->id; $task["type"]=$row->type; 
			$task["status"]=$row->status; 
			
			if(isset($loptions))
			 if($loptions['info']==true)
			     {
					 
					 $presults = $this->mysqli->query("select name, value  from user_task_par where taskid=$row->id;");
					  while($par = $presults->fetch_object())
								$task[$par->name]=$par->value;
							
				}    
     		$tasks[]=$task;
			
			
			
		}
		   $ra["tasks"]=$tasks;
        
        /*
        foreach ($taksid as $id)
        {
          $row = $this->redis->hGetAll("driver:$id");
          
          $lastvalue = $this->redis->hmget("input:lastvalue:$id",array('time','value'));
          $row['time'] = $lastvalue['time'];
          $row['value'] = $lastvalue['value'];
          $drivers[] = $row;
        }*/
      
        
        return $ra;
        
    }
    
   
    
    
    
/*
    // USES: redis input
    public function get_name($id)
    {
        // LOAD REDIS
        $id = (int) $id;
        if (!$this->redis->exists("input:$id")) $this->load_input_to_redis($id);
        return $this->redis->hget("input:$id",'name');
    }

    // USES: redis input
    public function get_processlist($id)
    {
        // LOAD REDIS
        $id = (int) $id;
        if (!$this->redis->exists("input:$id")) $this->load_input_to_redis($id);
        return $this->redis->hget("input:$id",'processList');
    }
    
    public function get_last_value($id)
    {
      $id = (int) $id;
      return $this->redis->hget("input:lastvalue:$id",'value');
    }
    

    //-----------------------------------------------------------------------------------------------
    // Gets the inputs process list and converts id's into descriptive text
    //-----------------------------------------------------------------------------------------------
    // USES: redis input
    public function get_processlist_desc($process_class,$id)
    {
        $id = (int) $id;
        $process_list = $this->get_processlist($id);
        // Get the input's process list

        $list = array();
        if ($process_list)
        {
            $array = explode(",", $process_list);
            // input process list is comma seperated
            foreach ($array as $row)// For all input processes
            {
                $row = explode(":", $row);
                // Divide into process id and arg
                $processid = $row[0];
                $arg = $row[1];
                // Named variables
                $process = $process_class->get_process($processid);
                // gets process details of id given

                $processDescription = $process[0];
                // gets process description
                if ($process[1] == ProcessArg::INPUTID)
                  $arg = $this->get_name($arg);
                // if input: get input name
                elseif ($process[1] == ProcessArg::FEEDID)
                  $arg = $this->feed->get_field($arg,'name');
                // if feed: get feed name

                $list[] = array(
                  $processDescription,
                  $arg
                );
                // Populate list array
            }
        }
        return $list;
    }

    // USES: redis input & user*/
    public function delete($userid, $taskid)
    {
		  
			$response= array();
		   $valid=true;
		   if(isset($taskid))
		   {
			 $this->mysqli->query("delete from user_task_par where  taskid=$taskid");  
		     $qresult=$this->mysqli->query("delete from user_tasks where userid=$userid and id=$taskid");
		   
		   $result = $this->mysqli->query("SELECT username FROM users WHERE id=$userid");
		   $data = $result->fetch_object();
		   $username= $data->username;
		   $loadsdir=$this->loadsdir;
		   
           if( $this->mysqli->affected_rows>0)  
           {
                /** this should be replaced from the previouse commented code*/
			   
			   
			   if (file_exists($loadsdir."/loads/".$username."-".$taskid.".metaload"))
					 unlink($loadsdir."/loads/".$username."-".$taskid.".metaload");
					
			   if (file_exists($loadsdir."/profiles/".$username."-".$taskid.".dataload"))
					 unlink($loadsdir."/profiles/".$username."-".$taskid.".dataload");
			    
			    $response["result"]="success";
				$response["response"]="removeTask";
				$response["taskId"]="$taskid";
               return $response;
           }
           else
				 $message="taskid $taskid not found";
			}
			
				$response["result"]="error";
				$response["response"]="removeTask";
				$response["taskId"]="$message";
               return $response;
    }
    
     public function execute($userid, $taskid)
    {
		   $response= array();
		   $this->set_fields($taskid,'{"status":4}');
		   
		   if(isset($taskid))
		   {
			
		   $result = $this->mysqli->query("SELECT value FROM user_task_par WHERE taskid=$taskid and name='deviceID'");
		  
		  if( $data = $result->fetch_object())  
           {
			    
				$deviceid=$data->value;
				$AST=shell_exec("date ");
			    $AST=rtrim($AST,"\n");
                $baseurl='http://localhost/virtualDevices/device.php?json=';
                $url=$baseurl.urlencode('{"cmd": "set", "device": '.$deviceid.',"parameters": [{"name": "startedon", "value": "'.$AST.'"}]}');
				error_log("seturl".$url);
				$curl = curl_init();
				// Set some options - we are passing in a useragent too here
				curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $url
						));
				// Send the request & save response to $resp
				$resp = curl_exec($curl);
				// Close request to clear up some resources
				curl_close($curl); 
			    
			    
			    
				$response["result"]="success";
				$response["response"]="executeTask";
				$response["taskId"]="$taskid";
               return $response;
           }
           else
				 $message="taskid $taskid not found";
			}
		
			$response["result"]="error";
			$response["response"]="executeTask";
			$response["message"]="$message";
			
		  
			return $response;
    }
    
    // Redis cache loaders

    private function load_input_to_redis($inputid)
    {
      $result = $this->mysqli->query("SELECT id,nodeid,name,description,processList FROM input WHERE `id` = '$inputid'");
      $row = $result->fetch_object();
      
      $this->redis->sAdd("user:inputs:$userid", $row->id);
      $this->redis->hMSet("input:$row->id",array(
        'id'=>$row->id,
        'nodeid'=>$row->nodeid,
        'name'=>$row->name,
        'description'=>$row->description,
        'processList'=>$row->processList
      ));
      
    }
   
   
 

	private function masinvoke($url)
	  {
		  
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		$resp=strtr ($resp, array ("'" => '"'));
		if($resp == "") return 0;
		
		$obj = json_decode(stripslashes($resp));
		if($obj->result == "success")
			return 1;
		else 
			return 0;
		}



    private function load_to_redis($userid)
    {
		/*
        $result = $this->mysqli->query("select user_drivers.id, type, name, status, description from user_drivers, driver where userid= $userid and user_drivers.type=driver.id;");
      
              
        while($row = $result->fetch_object()){
      
        $this->redis->sAdd("user:drivers:$userid", $row->id);    
	    $this->redis->hMSet("driver:$row->id",array(
	        'id'=>$row->id,
	        'type'=>$row->type,
	        'name'=>$row->name,
	        'description'=>$row->description,
	        'status'=>$row->status,
	        'userid'=>$userid
	        
	      ));
      }*/
    }
  /*******/
  private function saveLoadData($filename, $deviceid, $mode)
  {
	  
	   // Get cURL resource
	    
		//$url="http://cloud.cossmic.eu/cossmic/virtualdevices/device.php?json=".urlencode("{'cmd': 'getprofile', 'deviceid': $deviceid, 'mode': $mode, 'unit': 'e'}");
		$baseurl="http://localhost/virtualDevices/device.php?json=";
		$url=$baseurl.urlencode("{'cmd': 'getprofile', 'deviceid': $deviceid, 'mode': '".$mode."'}");
		
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt($curl, CURLOPT_USERPWD, "cossmichg:microgrid");
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $url
				));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl); 
		$loadfile = fopen($filename, "w");
	   	fwrite($loadfile, $resp);
		fclose($loadfile);
	  }
  
  /*******/
  public function fakeschedule($taskid,$AST)
  {
	  $result = $this->mysqli->query("SELECT username FROM user_tasks, users WHERE user_tasks.id = $taskid and users.id=user_tasks.userid");
      $row = $result->fetch_object();
      $username = $row->username;
	  $filename = $this->loadsdir."/loads/".$username."-".$taskid.".metaload";
	  copy($filename,"/tmp/".$username."-".$taskid.".metaload");
	  $temp=explode(":", $AST);
	  $AST=$temp[0]*3600+$temp[1]*60;
	  
	  file_put_contents("/tmp/".$username."-".$taskid.".metaload", "AST ".$AST, FILE_APPEND | LOCK_EX);
	  
	  copy("/tmp/".$username."-".$taskid.".metaload", $filename = $this->loadsdir."/schedule/".$username."-".$taskid.".metaload");
	  
	  }

   

   public function settings()
   {
	   $result = $this->mysqli->query("SELECT * FROM mas_par");
       $pars= array();
        while($row = $result->fetch_object())
        {
			$pars[] = $row;
			}
		return $pars;
       
	   }
	   
	   public function save_settings($id, $jsonstring)
    {
		
        
        $json=strtr ($jsonstring, array ("'" => '"'));
        $fields = json_decode(stripslashes($json),true);
        $success=false;
             
         	 
			     
				 $this->mysqli->query("UPDATE mas_par set value='".$fields['value']."'  where  id=$id");
				 
				 if($this->mysqli->affected_rows==0){
					
				     $this->mysqli->query("INSERT INTO mas_par VALUES($id, '".$fields['name']."', '".$fields['value']."')");
					 if($this->mysqli->affected_rows!=0)  
						$success=true;
					}
				 else 
				   $success=true;
					
				$success==true? $success='success':  $success='error';
		 
		   
          return array("response"=> "savesettings", "result"=> "$success", "parameter"=>"INSERT INTO mas_par VALUES($id, '".$fields['name']."', '".$fields['value']."')");
	}
	   
	   
	   private function  getDropboxdir()
    {/*
		 $this->mysqli->query("SELECT value from mas_par   where  id=0");
		 $row = $result->fetch_object();
		 while($row = $result->fetch_object())
          {
			  if("rows[0]"!= "Not Set")
			   
			   return 
			}
		*/		 
	}
	
	public function start($userid, $alg)
	{
		/*
		 * 0 started
		 * 1 already running
		 * 2 error: not started
		 * */
		$result = array();
		if($alg=="random")
		{
			
			if(file_exists("/tmp/randomsched.pid"))
			{
				$file =fopen("/tmp/randomsched.pid",'r');	
				$pid = fgets($file);
				$pid =(int) $pid;
				fclose($file);
				if($pid>0)
				{
					$result ["result"] ="1";
					$result ["error"] ="MAS already running Random Sched";
					return $result;
				}
			
			}
		}
		
		
		
		
		$records = $this->mysqli->query("SELECT username, apikey_write FROM users WHERE id=".$userid);
		$row=$records->fetch_object();
		$apikey=$row->apikey_write;
		$username=$row->username;
		
		if(file_exists("/tmp/$username.pid"))
			{
				
				$file =fopen("/tmp/$username.pid",'r');	
				$pid = fgets($file);
				$pid =(int) $pid;
				fclose($file);
				if($pid>0)
				{
					$result ["result"] ="1";
					$result ["error"] ="MAS already running";
					return $result;
				}
			
			}
		
		
		if($alg=="random")
			shell_exec("/var/www/emoncms/Modules/mas/bin/randomsched.sh start");
		
		shell_exec("/var/www/emoncms/Modules/mas/bin/schedulerd.sh start $username $apikey");
		
		
		if(file_exists("/tmp/$username.pid"))
		{
			$file =fopen("/tmp/$username.pid",'r');
			if($file) 
			{
				$pid = fgets($file);
				$pid =(int) $pid;
				fclose($file);
				if($pid)
				{
					$result ["result"] ="0";
					return $result;
				}
			}
		}
		
		 $result ["result"] ="2";
		 $result ["error"] ="MAS not started";
		 return $result;
		
		}
		
	public function stop($userid, $alg)
	{
		
		$records = $this->mysqli->query("SELECT username, apikey_write FROM users WHERE id=".$userid);
		$row=$records->fetch_object();
		$username=$row->username;
		$apikey=$row->apikey_write;
		$result = array();
		$result ["error"]="";
		$result ["result"] ="0";
		if($alg=="random")
		{
			if(!file_exists("/tmp/randomsched.pid"))
			{
				$result ["result"] ="3";
				$result ["error"] =$result ["error"]." random scheduler not running";
				
			}
		else	
			{
				shell_exec("/var/www/emoncms/Modules/mas/bin/randomsched.sh stop");	 
				
			}
		}
		if(!file_exists("/tmp/".$username.".pid"))
		{
			$result ["result"] ="3";
			$result ["error"] =$result ["error"]." updater not running";
			
			}
		else
		  {
			shell_exec("/var/www/emoncms/Modules/mas/bin/schedulerd.sh stop $username $apikey");
			$result ["error"]+=" MAS stopped";
			return $result;
		  }
		  
		return $result;
		
		}	
		
	public function check($userid)
	{
		$result =array();
		if(!file_exists("/tmp/randomsched.pid"))
		{
			$result ["result"] ="0";
			$result ["error"] ="MAS not running";
			
			}
		else
		{
			$result ["result"] ="1";
			$result ["error"] ="MAS  running";
			
			}
			
		return $result;
		
	}
		
	   
}
