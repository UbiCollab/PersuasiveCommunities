<?php

	global $session;

    $domain = "messages";
    bindtextdomain($domain, "Modules/input/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	$menu_dropdown[] = array('name'=> dgettext($domain, "History"), 'path'=>"cossmiccontrol/view/history" , 'session'=>"write", 'order' => 4 );
	