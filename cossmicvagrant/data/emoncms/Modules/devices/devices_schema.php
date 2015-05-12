<?php

$schema['devices'] = array(
  'deviceid' => array('type' => 'int(11)', 'Null'=>'NO', 'Key'=>'PRI', 'Extra'=>'auto_increment'),
  'name' => array('type' => 'varchar(45)', 'Null'=>'NO', 'default'=>''),
  'templateid' => array('type' => 'int(11)', 'Null'=>'NO')
);

$schema['devices_nodes'] = array(
  'userid' => array('type' => 'int(11)', 'Null'=>'NO'),
  'deviceid' => array('type' => 'int(11)', 'Null'=>'NO'),
  'nodeid' => array('type' => 'int(11)', 'Null'=>'NO')
);

$schema['node_parameters'] = array(
  'nodeid' => array('type' => 'int(11)', 'Null'=>'NO', 'Key'=>'PRI', 'Extra'=>'auto_increment'),
  'type' => array('type' => 'text', 'default'=>''),
  'driverid' => array('type' => 'varchar(45)', 'Null'=>'NO', 'default'=>''),
  'address' => array('type' => 'varchar(45)', 'Null'=>'NO', 'default'=>''),
  'userid' => array('type' => 'int(11)', 'Null'=>'NO')
);

$schema['templates'] = array(
  'templateid' => array('type' => 'int(11)', 'Null'=>'NO', 'Key'=>'PRI', 'Extra'=>'auto_increment'),
  'productName' => array('type' => 'text', 'default'=>''),
  'productType' => array('type' => 'text', 'default'=>''),
  'operatingType' => array('type' => 'text', 'default'=>''),
  'requiredNodeTypes' => array('type' => 'text', 'default'=>''),
  'userid' => array('type' => 'int(11)', 'Null'=>'NO')
);

$schema['templates_modes'] = array(
  'modeid' => array('type' => 'int(11)', 'Null'=>'NO', 'Key'=>'PRI', 'Extra'=>'auto_increment'),
  'templateid' => array('type' => 'int(11)', 'Null'=>'NO'),
  'modeName' => array('type' => 'text', 'default'=>'')
);

?>
