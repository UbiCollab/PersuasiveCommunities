<?php 
  global $path; 
?>

<script type="text/javascript" src="<?php echo $path; ?>Modules/driver/Views/driver.js"></script>
<style>
input[type="text"] {
     width: 88%;  
}




</style>

<br>
<div id="apihelphead"><div style="float:right;"><a href="api"><?php echo _('Driver API Help'); ?></a></div></div>

<div class="container">
    <div id="localheading"><h2><?php echo _('Start/Stop Driver'); ?></h2></div>
    
    <div id="loading"><img src="/emoncms/images/loader.gif"/></div>
    <div id="message">
        
    
    </div>

    <div id="nodrivers" class="alert alert-block hide">
        <h4 class="alert-heading"><?php echo _('Error'); ?></h4>
        <p><?php echo _('Drivers cannot start/stop'); ?></p>
    </div>

</div>

<script>

  var path = "<?php echo $path; ?>";

  // Extend table library field types
  $("#localheading").show();
  startstop();
 
  function startstop()
  {
	var perc=driver.startstop(<?php echo $driverid?>);  
    var msg="";
	//$("#loading").hide();  
	if(perc == 1)
	      msg='<b>Driver started</b> <a href="/emoncms/driver/node">back</a>';  
	else if(perc == 0)
	  msg='<b>Driver stopped</b> <a href="/emoncms/driver/node">back</a>';  
	else msg='<b>Driver Error</b> <a href="/emoncms/driver/node">back</a>';    
	 $("#message").html(msg);
	 
  }


//  var updater = setInterval(startstop, 2000);
/*
  $("#table").bind("onEdit", function(e){
    clearInterval(updater);
  });

  $("#table").bind("onSave", function(e,id,fields_to_update){
    input.set(id,fields_to_update); 
    updater = setInterval(update, 10000);
  });

  $("#table").bind("onDelete", function(e,id){
    driver.remove(id); 
    update();
  });
*/
</script>
