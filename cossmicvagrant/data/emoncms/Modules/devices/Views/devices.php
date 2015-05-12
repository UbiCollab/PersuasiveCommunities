<?php 
  global $path; 
?>

<script type="text/javascript" src="<?php echo $path; ?>Modules/devices/Views/devices.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/tablejs/table.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/tablejs/custom-table-fields.js"></script>
<style>
input[type="text"] {
     width: 88%; 
}

#table td:nth-of-type(1) { width:5%;}
#table td:nth-of-type(2) { width:10%;}
#table td:nth-of-type(3) { width:25%;}

#table td:nth-of-type(7) { width:30px; text-align: center; }
#table td:nth-of-type(8) { width:30px; text-align: center; }
#table td:nth-of-type(9) { width:30px; text-align: center; }
</style>

<br>
<div id="apihelphead"><div style="float:right;"><a href="api"><?php echo _('Devices API Help'); ?></a></div></div>

<div class="container">
    <div id="localheading"><h2><?php echo _('Devices'); ?></h2></div>
    <div id="table"></div>

    <div id="nodevices" class="alert alert-block hide">
        <h4 class="alert-heading"><?php echo _('No devices created'); ?></h4>
        <p><?php echo _('Devices is the main entry point for configuring devices. You may want to follow the <a href="api"> Devices helper</a> as a guide for generating your request.'); ?></p>
    </div>

</div>

<script>

  var path = "<?php echo $path; ?>";

  // Extend table library field types
  for (z in customtablefields) table.fieldtypes[z] = customtablefields[z];

  table.element = "#table";

  table.fields = {
    //'id':{'type':"fixed"},
    'deviceid':{'title':'<?php echo _("DeviceId:"); ?>','type':"fixed"},
    'name':{'title':'<?php echo _("name"); ?>','type':"text"},
    //'description':{'title':'<?php echo _('Description'); ?>','type':"text"},
	'status':{'title':'<?php echo _("Status:"); ?>','type':"fixed"},
    // Actions
    'run-action':{'title':'', 'type':"button", 'link':path+"driver/startstop.html?driverid="},
    'delete-action':{'title':'', 'type':"delete"},
    'conf-action':{'title':'', 'type':"iconlink", 'link':path+"driver/configure.html?driverid=", 'icon':'icon-wrench'}

  
  }

  //table.groupprefix = "Devices ";
  //table.groupby = 'deviceid';

  update();

  function update()
  {
    table.data = devices.list();
    table.draw();
    if (table.data.length != 0) {
      $("#nodevices").hide();
      $("#apihelphead").show();      
      $("#localheading").show();
    } else {
      $("#nodevices").show();
      $("#localheading").hide();
      $("#apihelphead").hide(); 
    }
  }

//  var updater = setInterval(update, 10000);
/*
  $("#table").bind("onEdit", function(e){
    clearInterval(updater);
  });

  $("#table").bind("onSave", function(e,id,fields_to_update){
    input.set(id,fields_to_update); 
    updater = setInterval(update, 10000);
  });
*/
  $("#table").bind("onDelete", function(e,id){
    devices.remove(id); 
    update();
  });
 
</script>
