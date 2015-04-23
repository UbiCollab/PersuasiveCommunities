<?php

    global $session, $user;
  
    if ($session['write']) $apikey = "?apikey=".$user->get_apikey_write($session['userid']); else $apikey = "";
  
	if($user->get_admin($session['userid']) == 1){
		//$menu_left[] = array('name'=>"My Electric", 'path'=>"myelectric".$apikey , 'session'=>"write", 'order' => 1 );
	}
    else{
		$menu_left[] = array('name'=>"My Electric", 'path'=>"myelectric".$apikey , 'session'=>"admin", 'order' => 1 );
	}