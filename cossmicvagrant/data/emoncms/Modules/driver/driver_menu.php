<?php

  $domain = "messages";
  bindtextdomain($domain, "Modules/input/locale");
  bind_textdomain_codeset($domain, 'UTF-8');

  $menu_left[] = array('name'=> dgettext($domain, "Driver"), 'path'=>"driver/node" , 'session'=>"write", 'order' => 2 );

?>
