<?php
	global $session, $user;

    $domain = "messages";
    bindtextdomain($domain, "Modules/feed/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	//Using the get_admin function in the user model to check if the user is an admin. 
	//If the user is an admin he will not get the feed menu (considering all end-systems are supposed to have only one account and this is an admin account from what we have heard)
	
	if($user->get_admin($session['userid']) == 1){
		
	}
    else{
		$menu_left[] = array('name'=> dgettext($domain, "Feeds"), 'path'=>"feed/list" , 'session'=>"admin", 'order' => 6 );
	}
?>