<?php

	global $session;

    $domain = "messages";
    bindtextdomain($domain, "Modules/input/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	$menu_left[] = array('name'=> dgettext($domain, "Home control"), 'path'=>"cossmiccontrol/view/homecontrol" , 'session'=>"write", 'order' => 11 );
	