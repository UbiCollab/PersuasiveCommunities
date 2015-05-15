<?php
	global $session;

    $domain = "messages";
    bindtextdomain($domain, "Modules/input/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	//All users should have quick menu access to the Appliances page.
	
	$menu_left[] = array('name'=> dgettext($domain, "Appliances"), 'path'=>"cossmiccontrol/view/appliances" , 'session'=>"write", 'order' => 11 );
?>