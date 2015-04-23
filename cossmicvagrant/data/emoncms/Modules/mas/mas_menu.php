<?php

	global $session, $user;

	$domain = "messages";
	bindtextdomain($domain, "Modules/input/locale");
	bind_textdomain_codeset($domain, 'UTF-8');

	if($user->get_admin($session['userid']) == 1){
		//$menu_left[] = array('name'=> dgettext($domain, "MAS"), 'path'=>"mas/node" , 'session'=>"write", 'order' => 8 );
	}
    else{
		$menu_left[] = array('name'=> dgettext($domain, "MAS"), 'path'=>"mas/node" , 'session'=>"admin", 'order' => 8 );
	}
?>
