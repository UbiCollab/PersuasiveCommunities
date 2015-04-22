<?php

	global $session, $user;

    $domain = "messages";
    bindtextdomain($domain, "Modules/vis/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	if($user->get_admin($session['userid']) == 1){
		$menu_left[] = array('name'=> dgettext($domain, "Vis"), 'path'=>"vis/list" , 'session'=>"write", 'order' => 7 );
	}
    else{
		$menu_left[] = array('name'=> dgettext($domain, "Vis"), 'path'=>"vis/list" , 'session'=>"admin", 'order' => 7 );
	}