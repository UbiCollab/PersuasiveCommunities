<?php

	global $session;

    $domain = "messages";
    bindtextdomain($domain, "Modules/input/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	$menu_left[] = array('name'=> dgettext($domain, "Scheduler"), 'path'=>"cossmiccontrol/view/settings" , 'session'=>"write", 'order' => 10 );
	