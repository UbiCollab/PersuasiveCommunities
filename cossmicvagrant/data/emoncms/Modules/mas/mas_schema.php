<?php

$schema['task_parameters'] = array(
  'id' => array('type' => 'int(11)', 'Null'=>'NO', 'Key'=>'PRI', 'Extra'=>'auto_increment'),
  'name' => array('type' => 'varchar(45)','Null'=>'NO','default'=>''),
  'value' => array('type' => 'text','Null'=>'NO','default'=>''),
  'description' => array('type' => 'text','default'=>'')
);

$schema['user_tasks'] = array(
  'id' => array('type' => 'int(11)', 'Null'=>'NO', 'Key'=>'PRI', 'Extra'=>'auto_increment'),
  'type' => array('type' => 'int(11)', 'Null'=>'NO'),
  'status' => array('type' => 'int(11)', 'Null'=>'NO', 'default'=>'0'),
  'userid' => array('type' => 'int(11)', 'Null'=>'NO', 'default'=>'0'),
);

$schema['user_task_par'] = array(
  'id' => array('type' => 'int(11)', 'Null'=>'NO', 'Key'=>'PRI', 'Extra'=>'auto_increment'),
  'taskid' => array('type' => 'int(11)', 'Null'=>'NO'),
  'name' => array('type' => 'varchar(45)','Null'=>'NO','default'=>''),
  'value' => array('type' => 'text','Null'=>'NO','default'=>'')
);

$schema['mas_par'] = array(
  'id' => array('type' => 'int(11)', 'Null'=>'NO', 'Key'=>'PRI'),
  'name' => array('type' => 'varchar(45)','Null'=>'NO','default'=>''),
  'value' => array('type' => 'text','Null'=>'NO','default'=>'')
);


?>
