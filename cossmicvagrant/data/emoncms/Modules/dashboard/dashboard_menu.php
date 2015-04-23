<?php

	global $session, $user;

    $domain = "messages";
    bindtextdomain($domain, "Modules/dashboard/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	if($user->get_admin($session['userid']) == 1){
		
	}
    else{
		$menu_left[] = array('name'=> dgettext($domain, "Dashboard"), 'path'=>"dashboard/view" , 'session'=>"admin", 'order' => 5 );
	}
