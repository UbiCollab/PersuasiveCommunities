<?php

    $domain = "messages";
    bindtextdomain($domain, "Modules/admin/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

	//Uncomment the below line in order to add the admin link to the right menu again
	
    //$menu_right[] = array('name'=> dgettext($domain, "Admin"), 'path'=>"admin/view" , 'session'=>"admin");