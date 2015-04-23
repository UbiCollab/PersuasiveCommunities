<?php

	global $session;

    $domain = "messages";
    bindtextdomain($domain, "Modules/input/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	$menu_left[] = array('name'=> dgettext($domain, "CoSSMic"), 'path'=>"cossmiccontrol/view/summary" , 'session'=>"write", 'order' => 9 );
	
