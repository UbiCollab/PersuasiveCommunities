<?php 
  global $path;
  $curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "http://localhost:8008/"
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		$resp=strtr ($resp, array ("'" => '"'));
	
   
?>

<script type="text/javascript" src="<?php echo $path; ?>Modules/mas/Views/mas.js"></script>
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
<div id="apihelphead"><div style="float:right;"><a href="api"><?php echo _('MAS API Help'); ?></a></div></div>

<div class="container">
   
 <div id="localheading"><h2><?php echo _('MASInterface'); ?></h2><a href="settings">Settings</a></div>

    <div id="notasks" class="alert alert-block hide">
        <h4 class="alert-heading"><?php echo _('Check the MAS is started'); ?></h4>
        <p><?php echo _('MASInterface is the main entry point for interfacing with the task schediling service of Cossmic. Configure your device to post values here, you may want to follow the <a href="api"> MAS helper</a> as a guide for generating your request.'); ?></p>
    </div>
    <table hspace=50>
		<tr><td colspan=2><input id=radio1 type=radio name=alg value="centralized">Centralized Scheduler</td><td colspan=2><input id=radio2 type=radio name=alg value="random" checked=true>Random Scheduler</td></tr>
		
		<?php
		if(!$resp){
			?>
		<tr></td><td width=100></td></div><td><img id=imgbutton src="/emoncms/images/start.png" onclick=startMAS()></td><td><img id=statusimg width=50 src="/emoncms/images/stopped.png"><td id=statustext ><b>MAS is OFF</b></td></tr>
		<?php
		    }
		    else{
				?>
		<tr><td width=100></td></div><td><img id=imgbutton src="/emoncms/images/stop.png" onclick=stopMAS()></td><td><img id=statusimg width=50 src="/emoncms/images/started.png"></td><td id=statustext ><b>MAS is ON</b></td></tr>
		<?php } ?>
		
		
		
		
    </table>
    <?php
		if(!$resp){
			?>
    <div style="display: none;" id=masweb>Open the Web Interface Here <a  href="http://localhost:8008/" target=_blank>WEBUI</a></div>
		<?php
		    }
		    else{
				?>
	<div  id=masweb>Open the Web Interface Here <a  href="http://localhost:8008/" target=_blank>WEBUI</a></div>
		<?php } ?>
</div>
<a href="http://cloud.cossmic.eu/cossmic/neighborhood/neighbourproduction.html"> Neighborhood production</a>  |  <a href="http://cloud.cossmic.eu/cossmic/neighborhood/neighbourconsumption.html"> Neighborhood Consumption</a>
    <div id="table"></div>
  
  
<script>
	
	
	
function startMAS()
	{
		settings = mas.settings();
		if(settings.length<2)
			alert("Please check MAS Settings");
		
		else 
		    {
				var alg;
				
				if(document.getElementsByName("alg")[0].checked) alg="centralized";
				else alg="random";
				msg=mas.start(alg)
				if(msg["result"]==0 || msg["result"]==1){    
					$("#statusimg").attr("src","/emoncms/images/started.png");
					$("#statustext").html("<b>MAS is ON</b>");
					$("#imgbutton").attr("src","/emoncms/images/stop.png");
					$("#imgbutton").attr("onclick","stopMAS()");
					document.getElementsByName("alg")[0].setAttribute("disabled","true");
					document.getElementsByName("alg")[1].setAttribute("disabled","true");
					$("#masweb").show();
			  }
			  	else alert("Starting MAS Error  "+msg["error"]);
			}
		
	
		}
function stopMAS()
	{
		settings = mas.settings();
		if(settings.length<2)
			alert("Please check MAS Settings");
		
		else 
		    {
				var alg;
				
				if(document.getElementsByName("alg")[0].checked) alg="centralized";
				else alg="random";
				
				msg=mas.stop(alg)
				if(msg["result"]==0||msg["result"]==3){  
				    
				$("#statusimg").attr("src","/emoncms/images/stopped.png");
				$("#statustext").html("<b>MAS is OFF</b>");
				$("#imgbutton").attr("src","/emoncms/images/start.png");
				$("#imgbutton").attr("onclick","startMAS()");
				document.getElementsByName("alg")[0].removeAttribute("disabled");
				document.getElementsByName("alg")[1].removeAttribute("disabled");			
				$("#masweb").hide();
				}
			
				if(msg["result"]==3) alert("Stopping  MAS: Error "+msg["error"]);
			}
		}

function checkMAS()
	{
		 msg=mas.check();
		 if(msg["result"]==0)
		 {
			 $("#statusimg").attr("src","/emoncms/images/stopped.png");
				$("#statustext").html("<b>MAS is OFF</b>");
				$("#imgbutton").attr("src","/emoncms/images/start.png");
				$("#imgbutton").attr("onclick","startMAS()");
				document.getElementsByName("alg")[0].removeAttribute("disabled");
				document.getElementsByName("alg")[1].removeAttribute("disabled");					
				$("#masweb").hide();
			 }
		else if(msg["result"]==1){    
					$("#statusimg").attr("src","/emoncms/images/started.png");
					$("#statustext").html("<b>MAS is ON</b>");
					$("#imgbutton").attr("src","/emoncms/images/stop.png");
					$("#imgbutton").attr("onclick","stopMAS()");
					document.getElementsByName("alg")[0].setAttribute("disabled","true");
					document.getElementsByName("alg")[1].setAttribute("disabled","true");				
					$("#masweb").show();
			  }
			 
			 
	}

  var path = "<?php echo $path; ?>";

  // Extend table library field types
  for (z in customtablefields) table.fieldtypes[z] = customtablefields[z];

  table.element = "#table";

  table.fields = {
    //'id':{'type':"fixed"},
    'id':{'title':'<?php echo _("TaskId:"); ?>','type':"fixed"},
    'EST':{'title':'<?php echo _("EST"); ?>','type':"fixed"},
    'LST':{'title':'<?php echo _('LST'); ?>','type':"fixed"},
	'status':{'title':'<?php echo _("Status:"); ?>','type':"text"},
	'AST':{'title':'<?php echo _("AST:"); ?>','type':"text"},
	
	//Actions
	'edit-action':{'title':'', 'type':"edit"},
	'delete-action':{'title':'', 'type':"delete"}
  }
  
  $("#table").bind("onDelete", function(e,id){
    mas.remove(id); 
    update();
  });
  
   $("#table").bind("onSave", function(e,id,fields_to_update){
        mas.set(id,fields_to_update);
        updater = setInterval(update, 10000);
    });
  //table.groupprefix = "Driver ";
  //table.groupby = 'id';

  update();

  function update()
  {
    table.data = mas.list();
    table.draw();
    if (table.data.length != 0) {
      $("#notasks").hide();
      $("#apihelphead").show();      
      $("#localheading").show();
    } else {
      $("#notasks").show();
      $("#localheading").hide();
      $("#apihelphead").hide(); 
    }
      checkMAS();
  }



</script>
