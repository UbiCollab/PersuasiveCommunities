<?php

	global $session;

    $domain = "messages";
    bindtextdomain($domain, "Modules/input/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	$menu_dropdown[] = array('name'=> dgettext($domain, "Summary"), 'path'=>"cossmiccontrol/view/summary" , 'session'=>"write", 'order' => 1 );
	
