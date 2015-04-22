<?php

	global $session, $user;

    $domain = "messages";
    bindtextdomain($domain, "Modules/feed/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	if($user->get_admin($session['userid']) == 1){
		$menu_left[] = array('name'=> dgettext($domain, "Feeds"), 'path'=>"feed/list" , 'session'=>"write", 'order' => 6 );
	}
    else{
		$menu_left[] = array('name'=> dgettext($domain, "Feeds"), 'path'=>"feed/list" , 'session'=>"admin", 'order' => 6 );
	}