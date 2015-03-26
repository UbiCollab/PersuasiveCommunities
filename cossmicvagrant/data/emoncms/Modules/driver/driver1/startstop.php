<?php
	
	
		 $params=$parameters;
		 $deviceid=$params['device'];
	         $poll=$params['polling'];
		 $base=$params['url'];
		 $virtual_user=$params['user'];
		 $node=$params['node'];
		 $url=$base."/device.php?json={'cmd': 'read', 'user': '".$virtual_user."', 'device': ".$deviceid;
		 $minutes=(int)$poll;
		 
		
		  if ($minutes==0)
		    $minutes="";
		  else 
		    $minutes="/".$minutes;
		    
		 $cronjob = ('*'.$minutes.' * * * * /var/www/emoncms/Modules/driver/bin/driver1.sh  "'.$url.'" '.$node.' '.$apikey);
	     
	     
		 if($status == 0)
		 {
		 
		   $req=$base."/device.php?json=".urlencode("{'cmd': 'info', 'user': '".$virtual_user."', 'device': ".$deviceid."}");
		   error_log($req);
		   $curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt($curl, CURLOPT_USERPWD, "cossmichg:microgrid");
			curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $req
				));
			// Send the request & save response to $resp
			$resp = curl_exec($curl);
			$fields = json_decode(stripslashes($resp));
			error_log($resp);
			// Close request to clear up some resources
			curl_close($curl); 
		 
		    if(isset($fields->behaviour)){
		    if($fields->behaviour==0) 
		      $type="consumer";
		    elseif($fields->behaviour==1)
		      $type="producer";
		    elseif($fields->behaviour==2) 
		      $type="prosumer";
		     if(isset($type))
	            $this->setupFeeds( $driverid, $userid, $node, $type);
		    }
	    
	       $input = shell_exec('crontab -l');
	       file_put_contents('/tmp/crontab.txt',$input);
		   file_put_contents('/tmp/crontab.txt', $cronjob.PHP_EOL,FILE_APPEND);
		   //if all stopped start the hosuehold
		
		   $stopall=0;
			$dlist = $this->getlist($userid);
			 foreach ($dlist as $dr)
			 {
				 if($dr['status'] ==1)
				  $stopall=1;
				 }
	       if($stopall==0)
	       {
			   $housef='*/1 * * * * wget -qO- "http://localhost/emoncms/input/post.json?node=0&json={consumption:0,pv:0,grid2household:0,pv2grid:0,pv2household:-1}&apikey='.$apikey.'"';			
			   file_put_contents('/tmp/crontab.txt', $housef.PHP_EOL,FILE_APPEND); 
			   }
		
		   exec('crontab /tmp/crontab.txt');
		 	
		   
		   $this->set_fields($driverid,'{"status" : "1"}');
	       $result="{'status': '1'}";
	     }
	     else {
			
			
			$this->set_fields($driverid,'{"status" : "0"}');
			 
			$stopall=0;
			$dlist = $this->getlist($userid);
			 foreach ($dlist as $dr)
			 {
				 if($dr['status'] ==1)
				  $stopall=1;
				 }
			 
			
			 //stop the driver 
			 $output = shell_exec('crontab -l');
			 /*if (!strstr($output, $cronjob)) 
			    return "{'status': '-1'}";
			   */
			//Copy cron tab and remove string
			
			$newcron = str_replace($cronjob,"",$output);
			 if($stopall==0)
			 {
				 $housef='*/1 * * * * wget -qO- "http://localhost/emoncms/input/post.json?node=0&json={consumption:0,pv:0,grid2household:0,pv2grid:0,pv2household:-1}&apikey='.$apikey.'"';			
			     $temp = str_replace($housef,"",$newcron);
			     $newcron= $temp;
				 }
			file_put_contents('/tmp/crontab.txt', $newcron.PHP_EOL);
			exec('crontab /tmp/crontab.txt'); 	
			
			 
			 
			 
			 $result="{'status': '0'}";
			
		 }
?>
