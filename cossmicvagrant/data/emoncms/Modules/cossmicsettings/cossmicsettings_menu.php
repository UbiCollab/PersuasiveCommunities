<?php

	global $session;

    $domain = "messages";
    bindtextdomain($domain, "Modules/input/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	$menu_dropdown[] = array('name'=> dgettext($domain, "Settings"), 'path'=>"cossmiccontrol/view/settings" , 'session'=>"write", 'order' => 2 );
	