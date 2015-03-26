<?php

    $domain = "messages";
    bindtextdomain($domain, "Modules/input/locale");
    bind_textdomain_codeset($domain, 'UTF-8');

    $menu_left[] = array('name'=> dgettext($domain, "CoSSMic control"), 'path'=>"cossmiccontrol/view/summary" , 'session'=>"write", 'order' => 5 );
