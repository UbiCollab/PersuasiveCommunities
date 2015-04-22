<?php

	global $session, $user;

	$domain = "messages";
	bindtextdomain($domain, "Modules/input/locale");
	bind_textdomain_codeset($domain, 'UTF-8');

	if($user->get_admin($session['userid']) == 1){
		$menu_left[] = array('name'=> dgettext($domain, "Driver"), 'path'=>"driver/node" , 'session'=>"write", 'order' => 3 );
	}
    else{
		$menu_left[] = array('name'=> dgettext($domain, "Driver"), 'path'=>"driver/node" , 'session'=>"admin", 'order' => 3 );
	}
?>
