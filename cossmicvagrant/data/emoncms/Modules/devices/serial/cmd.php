<?
 $fh = fopen('/var/www/command.fifo', 'w');
 
 if ($fh) {
  fwrite($fh, $cmd['address']." set ".$cmd['status']."\r\n");
 
  fclose($fh);
  
  $result = "ok";
 }
 else {
  $result = "can't open FIFO file";
 }
?>
