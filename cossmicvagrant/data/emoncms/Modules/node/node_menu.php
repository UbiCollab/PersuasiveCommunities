<?php

	global $session, $user;
	
	$domain = "messages";
	bindtextdomain($domain, "Modules/node/locale");
	bind_textdomain_codeset($domain, 'UTF-8');

	if($user->get_admin($session['userid']) == 1){
		$menu_left[] = array('name'=> dgettext($domain, "Node"), 'path'=>"node/list" , 'session'=>"write", 'order' => 2 );
	}
    else{
		$menu_left[] = array('name'=> dgettext($domain, "Node"), 'path'=>"node/list" , 'session'=>"admin", 'order' => 2 );
	}