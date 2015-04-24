<?php
global $path;
?>

<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/cossmiccontrol_view.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/css/style.css">

<script type="text/javascript" src="<?php echo $path; ?>Lib/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/json.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.axislabels.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.time.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/prefixfree.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/modernizr.js"></script>

<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/jquery.simpleWeather.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/imageSelect.js"></script>

<!--
<div id="usagebar" style="width: 100%">
    <div><table style="width: 100%"><tr><td style="width: 33.3%; text-align: left">- Using</td><td style="width: 33.3%; text-align: center">0</td><td style="width: 33.3%; text-align: right">+ Sharing</td></tr></table></div>
    <div id="usagebarcontainer">
        <div id="griduse" class="usagebar" style="background-color: red"><div id="gridusePercentage"></div></div>
        <div id="cossmicuse" class="usagebar" style="background-color: blue"><div id="cossmicusePercentage"></div></div>
        <div id="selfpvuse" class="usagebar" style="background-color: forestgreen"><div id="selfpvusePercentage"></div></div>
        <div id="ownbatteryuse" class="usagebar" style="background-color: yellow"></div>
        <div id="disttocossmic" class="usagebar" style="background-color: mediumseagreen"></div>
        <div id="selltogrid" class="usagebar" style="background-color: mediumpurple"></div>
    </div>
    <div id="usagebarlegend">
        <table style="width: 100%"><tr>
            <td style="width: 16.67%">
                <div class="usagebarlegend" style="background-color: red"></div><div>Grid use</div>
            </td>
            <td style="width: 16.67%">
                <div class="usagebarlegend" style="background-color: blue"></div><div>CoSSMic use</div>
            </td>
            <td style="width: 16.67%">
                <div class="usagebarlegend" style="background-color: forestgreen"></div><div>Self-PV use</div>
            </td>
            <td style="width: 16.67%">
                <div class="usagebarlegend" style="background-color: yellow"></div><div>own Battery use</div>
            </td>
            <td style="width: 16.67%">
                <div class="usagebarlegend" style="background-color: mediumseagreen"></div><div>Distribute to CoSSMic</div>
            </td>
            <td style="width: 16.67%">
                <div class="usagebarlegend" style="background-color: mediumpurple"></div><div>Sell to grid</div>
            </td>
        </tr></table>
    </div>
</div>

<div class="largeFont">Now</div>
<div id="now">

    <div style="width: 33%">
        <table class="cossmictable" id="loadtable"></table>
    </div>

    <div style="width: 33%" id="batterystatus"></div>

</div>
-->

<div id="today">
    <div class="row">
		<div id="weatherbox" class="panel span2">
			<div id="weatherheading" class="panel-heading">Weather</div>
			<div id="weathercont" class="panel-body">
				<div id="weather" class="weatherclass"><script src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/index.js"></script></div>
				<div id="weather1" class="weathertable"></div>
				<div id="weather2" class="weathertable"></div>
				<div id="weather3" class="weathertable"></div>
				<div id="weather4" class="weathertable"></div>
				<div id="weather5" class="weathertable"></div>
			</div>
		</div>
		<!--
		<div id="cossmickwhbox"class="panel span2">
			<div class="panel-heading">Now</div>
			<div class="panel-body">
				<div id="cossmickwh">
					<div class="cossmickwhText">Total kWh exchanged within CoSSMic</div>
					<div id="cossmickwhbar">
					<div id="cossmickwhprogressbar"></div>
					</div>
					<div class="cossmickwhText">[x] kWh since 3/1/2014</div>
				</div>
			</div>
		</div>-->
      		
		<div id="treebox" class="panel span4">
			<div class="panel-heading">Tree</div>
			<div class="panel-body">
				<div class="tree-panel">
					<div><center><img id="cossmictree" src="<?php echo $path; ?>images/tree/pine-tree.png" alt="" style="height:270px; width:auto"></center></div>
				</div>
			</div>
		</div>
			
		<div id="housebox" class="panel span6">
			<div class="panel-heading">El Flow</div>
			<div class="panel-body">
                <div id="houseIconBody">
                    <table>
                        <tr>
                            <td><div><img id="housebox_panel" class="housebox_content" src="<?php echo $path; ?>images/housebox_content/house_w_panel.png"></div></td>
                            <td><div><img id="housebox_grid" class="housebox_content" src="<?php echo $path; ?>images/housebox_content/house_w_grid.png"></div></td>
                        </tr>
                        <tr>
                            <td><div><img id="housebox_battery" class="housebox_content" src="<?php echo $path; ?>images/housebox_content/house_w_battery.png"></div></td>
                            <td><div><img id ="housebox_community" class="housebox_content" src="<?php echo $path; ?>images/housebox_content/house_to_community.png"></div></td>
                        </tr>
                    </table>
                </div>
                <div id="housebody">
                    <div class="elFlowHeaders">
                        <div id="myHouseTag">My house</div>
                        <div id="myCommunityTag">My community</div>
                    </div>
                    <div id="elFlowTableAndIcons">
                        <div id="elFlowText1">
                            <table style="table-layout: fixed">
                                <tr>
                                    <td>Grid</td>
                                    <td id="gridN" class="elFlowStats">0 kWh</td></tr>
                                <tr>
                                    <td class="elFlowStats">PV</td>
                                    <td id="pvN">kWh</td> </tr>
                                <tr id="batteryLabel">
                                    <td id="batteryText">Battery</td>
                                    <td id="batteryN" class ="elFlowStats">0 kWh</td></tr>
                            </table>
                        </div>
                        <div id="elFlowText2">
                            <table>
                                <tr>
                                    <td id="houseToGridN">0 kWh</td>
                                </tr>
                                <tr>
                                    <td id="gridToHouseN">0 kWh</td>
                                </tr>
                            </table>
                        </div>
                        <div id="elTotalConsumptionHeader">Total:</div>
                        <div id="elTotalConsumption"></div>
                        <img id="house-icon" src="<?php echo $path; ?>images/housebox_content/house_el_flow.png"> 
                    </div>
                </div>
			</div>
		</div>
    </div>
</div>

<div class="row" style="margin-top: 30px">
	<div class="panel span12">
		<div class="panel-heading">Neighborhood - today</div>
		<div class="panel-neighborhoodGraph">
			<div id="neighbGraphPlaceholder"></div>
		</div>
	</div>
</div>

<div  id="scheduleDiv" style="width: 34%,visibility: hidden">
	<div>Schedule</div>
	<table class="cossmictable">
		<tr>
			<th>Task</th>
			<th>Earliest start</th>
			<th>Latest end</th>
			<th>Estimated consumption</th>
		</tr>
		<tr>
			<td>[Device 1]</td>
			<td>[xx:xx]</td>
			<td>[xx:xx]</td>
			<td>[x] kWh</td>
		</tr>
		<tr>
			<td>[Device 2]</td>
			<td>[xx:xx]</td>
			<td>[xx:xx]</td>
			<td>[x] kWh</td>
		</tr>
	</table>
</div>

<?php
global $mysqli, $session;
$kwhlist = [];
$pv2householdId = [];
$consumptionkwhId = [];
$grid2storageId = [];
$pv2storage = [];
$pv2gridId = [];
$storage2gridId = [];
$storage2householdId = [];
$kwhdlist = [];
$userid = $session['userid'];

// TODO: uncomment when integrating Katharinas code
// get the ids of the user's grid use, CoSSMic use, Self-PV use, and own Battery use kWh/day feeds
// code here...

// get the ids of the user's kwh/day device feeds
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP '_kwhd$' AND userid = '$userid'");
$i = 0;
while ($row = (array)$result->fetch_object()) {
    $kwhdlist[$i] = $row['id'];
    $i++;
}

// get the ids of the user's kwh device feeds
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP '_kwh$' AND userid = '$userid'");
$i = 0;
while ($row = (array)$result->fetch_object()) {
    $kwhlist[$i] = $row['id'];
    $i++;
}
// get the id of the user's PV 2 household power feed 
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP 'pv2household_kwh$' AND userid = '$userid'");
$i = 0;
while($row = (array)$result->fetch_object()) {
	$pv2householdId[$i] = $row['id'];
	$i++;
}
// get the id of the user's grid2household power feed 
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP 'grid2household_kwh$' AND userid = '$userid'");
$i = 0;
while($row = (array)$result->fetch_object()) {
    $grid2householdId[$i] = $row['id'];
    $i++;
}
//get the id for the user's total kwh consumption
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP 'consumption_kwh$' AND userid = '$userid'");
$i = 0;
while($row = (array)$result->fetch_object()) {
    $consumptionkwhId[$i] = $row['id'];
    $i++;
}
//get the id for the grid2storage feed
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP 'grid2storage_kwh$' AND userid = '$userid'");
$i = 0;
while($row = (array)$result->fetch_object()) {
    $grid2storageId[$i] = $row['id'];
    $i++;
}
//get the id for the pv2storage feed
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP 'pv2storage_kwh$' AND userid = '$userid'");
$i = 0;
while($row = (array)$result->fetch_object()) {
    $pv2storageId[$i] = $row['id'];
    $i++;
}
//get the id for the pv2grid feed
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP 'pv2grid_kwh$' AND userid = '$userid'");
$i = 0;
while($row = (array)$result->fetch_object()) {
    $pv2gridId[$i] = $row['id'];
    $i++;
}
//get the id for the storage2grid feed
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP 'storage2grid_kwh$' AND userid = '$userid'");
$i = 0;
while($row = (array)$result->fetch_object()) {
    $storage2gridId[$i] = $row['id'];
    $i++;
}
//get the id for the storage2house feed
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP 'storage2household_kwh$' AND userid = '$userid'");
$i = 0;
while($row = (array)$result->fetch_object()) {
    $storage2householdId[$i] = $row['id'];
    $i++;
}

// get the id of the user's battery kwh feed
// code here...

?>

<script>
    
    $(function(){
        $("#treebox").on('click', function(){
            var currentClass = $(this).attr("class");

            $("#weatherbox").toggle(500);
            $("#cossmickwhbox").toggle(500);
            $("#housebox").toggle(500);
            if(currentClass == "panel span4"){
                console.log(currentClass)
                $(this).switchClass("span4", "span12", 500, "easeInOutQuad");
                $("#cossmictree").animate({float:"left"});    
            }
            else{
                $(this).switchClass("span12", "span4", 500, "easeInOutQuad");
                $("#cossmictree").animate({float:"center"});
            }
            
        });
        
        $("#housebox").on('click', function(){
            var currentClass = $(this).attr("class");

            if(currentClass == "panel span6"){
                $("#weatherbox").toggle(400);
                $("#treebox").toggle(400);  
                console.log(currentClass)
                $(this).switchClass("span6", "span12", 500, "easeInOutQuad");
                setTimeout(function(){
                    $("#houseIconBody").toggle();
                }, 500);
                
                    
            }
            else{
                $("#houseIconBody").toggle();
                
                $(this).switchClass("span12", "span6", 500,"easeInOutQuad");
                $("#weatherbox").toggle(500);
                $("#treebox").toggle(500);    
                
                
            }

        });

		$("#weatherbox").on('click', function(){
			var currentClass = $(this).attr("class");
			
			$("#treebox").toggle(500);
			$("#housebox").toggle(500);
			if(currentClass == "panel span2"){
				console.log(currentClass)
				$(this).switchClass("span2", "span12", 500, "easeInOutQuad");
				$("#weatherheading").html("5-Day Forecast");
                $("#weather").toggle();
				$("#weather").switchClass("weatherclass", "weathertable");
				$("#weather1").switchClass("weathertable", "weatherclass2");
				$("#weather2").switchClass("weathertable", "weatherclass2");
				$("#weather3").switchClass("weathertable", "weatherclass2");
				$("#weather4").switchClass("weathertable", "weatherclass2");
				$("#weather5").switchClass("weathertable", "weatherclass2");
			}
			else{
				$(this).switchClass("span12", "span2", 500, "easeInOutQuad");
				$("#weatherheading").html("Weather");
				$("#weather1").switchClass("weatherclass2","weathertable");
				$("#weather2").switchClass("weatherclass2","weathertable");
				$("#weather3").switchClass("weatherclass2","weathertable");
				$("#weather4").switchClass("weatherclass2","weathertable");
				$("#weather5").switchClass("weatherclass2","weathertable");
                $("#weather").toggle();
				$("#weather").switchClass("weathertable", "weatherclass");
			}
		});
    });

    function setVisibles(){

        $(function(){
            $("#houseIconBody").hide();
            $("#batteryLabel").hide();
            $("#housebox_battery").hide();
        });

    }
</script>

<script>

    totalconsumption = 0;
    pv2household = 0;
    grid2household = 0;
    ids = [1,10,13];
    values = [];
    var path = "<?php echo $path; ?>";
    
    function getData(){
        end = new Date().getTime();
        start = end - 10;    
            
            var consumptionkwhId = <?php echo json_encode($consumptionkwhId); ?>; 
            var pv2householdId = <?php echo json_encode($pv2householdId); ?>;
            var grid2householdId = <?php echo json_encode($grid2householdId); ?>;
            var grid2storageId = <?php echo json_encode($grid2storageId); ?>;
            var pv2storageId = <?php echo json_encode($grid2storageId); ?>;
            var pv2gridId = <?php echo json_encode($pv2gridId); ?>;
            var storage2gridId = <?php echo json_encode($storage2gridId); ?>;
            var storage2householdId = <?php echo json_encode($storage2householdId); ?>;

            //get data fro totalConsumption
            $.ajax({
                type: 'get',
                url: path+'/feed/data.json?id='+consumptionkwhId+'&start='+start+'&end='+end+'&dp=1 ',
                success: function(data){
                    var json = data[0];
                    
                    if(json[0] <= start){
                        setTotalconsumptionValue(json[1]);    
                    }
                    else{
                        setTotalconsumptionValue(0);
                    }
                }
             }),
            //get and set the data from pv2householdValue
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:4567/emoncms/feed/data.json?id='+pv2householdId+'&start='+start+'&end='+end+'&dp=1 ',
                success: function(data){
                    var json = data[0];
                    
                    if(json[0] <= start){
                        setPv2householdValue(json[1]);    
                    }
                    else{
                        setPv2householdValue(0);
                    }
                }
            }),
            //get and set data from grid2household
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:4567/emoncms/feed/data.json?id='+grid2householdId+'&start='+start+'&end='+end+'&dp=1 ',
                success: function(data){

                    var json = data[0];
                    
                    if(json[0] <= start){
                        setGrid2householdValue(json[1]);
                    }
                    else{
                        setGrid2householdValue(0);   
                    }
                }
            }),
            //get and set grid2storage if it exists a feed
            // if(grid2storageId.length < 0)
            // {
                $.ajax({
                    type: 'get',
                    url: 'http://127.0.0.1:4567/emoncms/feed/data.json?id='+grid2storageId+'&start='+start+'&end='+end+'&dp=1 ',
                    success: function(data){
                        if(grid2storageId == 0){
                            $("#batteryLabel").hide();
                            $("#housebox_battery").hide();
                            $("#house-icon").attr("src","<?php echo $path; ?>/images/housebox_content/house_el_flow_without_battery.png");
                            $("#elFlowText1").css({"margin-top":"65px"})                           
                        }
                        else{
                            var json = data[0];
                            console.log(data);
                            if(json[0] <= start){
                                setGrid2storageValue(json[1]);
                            }
                            else{
                                setGrid2storageValue(0);   
                            }
                        }
                    },
                    error: function(data, message){
                        console.log(message);
                    }
                })
            // }
        }

    function setTotalconsumptionValue(value){
        $(function(){
               $("#elTotalConsumption").html(value.toFixed(2)+" kWh");  
        });
       totalconsumption = value;
        console.log(totalconsumption);
    }

    function setPv2householdValue(value){
        $(function(){
               $("#pvN").html(value.toFixed(2)+" kWh");  
        });
        pv2household = value;
        console.log(pv2household);
    }

    function setGrid2householdValue(value){
        $(function(){
               $("#gridN").html(value.toFixed(2)+" kWh");  
        });
        grid2household = value;
        console.log(grid2household);
    }

    function setGrid2storageValue(value){
        grid2storage = value;
        console.log(grid2storage);
    }    

    function setPv2storageValue(value){
        pv2storage = value;
        console.log(pv2storage);
    }

    function setPv2gridValue(value){
        pv2grid = value;
        console.log(pv2grid);
    }

    function setStorage2gridValue(value){
        storage2grid = value;
        console.log(storage2grid);
    }
        
    function setStorage2householdValue(value){
        storage2household = value;
        console.log(storage2household);
    }
    

    function addDataValues(){

		setTimeout(function(){
            var pv2householdValue = totalconsumption/pv2household;
            var grid2householdValue = totalconsumption/grid2household;
			
			//Calculates a very simple score based on the percentage of PV power used compared to the total power used
			//then passes this score (from 1 to 100) to the selectTree javascript that sets the tree image
			var multiplier = 100/totalconsumption;
			var score = Math.round(pv2household*multiplier);
			selectTree(score);
			//End of the simple score calculation

            var height = $("#usagebarcontainer").height()/2;
            var width = $("#usagebarcontainer").width()/2;
            
            $("#griduse").css({'width': width/grid2householdValue});
            $("#gridusePercentage").html(Math.round((grid2household/totalconsumption)*100)+"%");
            $("#selfpvuse").css({'width': width/pv2householdValue});
            $("#selfpvusePercentage").html(Math.round((pv2household/totalconsumption)*100)+"%");
            $("#griduse").css({'float': "left"});
            $("#selfpvuse").css({'float': "left"}); 
            
        }, 1000);
        getData();
	
		setInterval(function(){
			setTimeout(function(){
				var pv2householdValue = totalconsumption/pv2household;
				var grid2householdValue = totalconsumption/grid2household;
				
				//Calculates a very simple score based on the percentage of PV power used compared to the total power used
				//then passes this score (from 1 to 100) to the selectTree javascript that sets the tree image
				var multiplier = 100/totalconsumption;
				var score = Math.round(pv2household*multiplier);
				selectTree(score);
				//End of the simple score calculation

				var height = $("#usagebarcontainer").height()/2;
				var width = $("#usagebarcontainer").width()/2;
				
				$("#griduse").css({'width': width/grid2householdValue});
                $("#gridusePercentage").html(Math.round((grid2household/totalconsumption)*100)+"%");
                $("#selfpvuse").css({'width': width/pv2householdValue});
                $("#selfpvusePercentage").html(Math.round((pv2household/totalconsumption)*100)+"%");
                $("#griduse").css({'float': "left"});
                $("#selfpvuse").css({'float': "left"}); 
				
			}, 1000)
			getData();
        }, 60000);
    };
</script>
<script>

    

/*
// TODO: uncomment when integrating Katharinas code

var path = "<?php echo $path; ?>";

var today = new Date();
var yesterday = today.setHours(0,0,0,0) - 1;

// get the current kWh/day values for grid use, CoSSMic use, Self-PV use, and own Battery use
// code here...
// Test with feed ids hard-coded:
var grid_use = parseFloat(  (5));
var cossmic_use = parseFloat(get_feedvalue(6));
var pv_use = 0;
var battery_use = 0;

// usage bar
var usingwidth = 750;
var total_use = grid_use + cossmic_use + pv_use + battery_use;
var gridwidth = Math.round(grid_use/total_use*usingwidth);
var cossmicwidth = Math.round(cossmic_use/total_use*usingwidth);
var pvwidth = Math.round(pv_use/total_use*usingwidth);
var batterywidth = Math.round(battery_use/total_use*usingwidth);

if (gridwidth>0) $("#griduse").css({width: gridwidth, visibility: "visible"});
if (cossmicwidth>0) $("#cossmicuse").css({width: cossmicwidth, visibility: "visible"});
if (pvwidth>0) $("#selfpvuse").css({width: pvwidth, visibility: "visible"});
if (batterywidth>0) $("#ownbatteryuse").css({width: batterywidth, visibility: "visible"});

var kwhlist = <?php echo json_encode($kwhlist); ?>;
// get the current kWh value for all devices
// sum up current kWh values = overall accumulated consumption
var overall_consumption = 0;
for (var i = 0; i < kwhlist.length; i++) {
    overall_consumption += parseFloat(get_feedvalue(kwhlist[i]));
}

// get the previous day's last kWh value for all devices
// sum up previous day's last kWh values = overall accumulated consumption for previous day
var overall_consumption_yesterday = 0;
for (var i = 0; i < kwhlist.length; i++) {
    var data = get_feed_data(kwhlist[i], 0, yesterday, 800);
    if(data.length>1)
      overall_consumption_yesterday += parseFloat(data[data.length-1][1]);
}

// overall load = overall accumulated consumption for today - overall accumulated consumption for previous day
var overall_load = overall_consumption - overall_consumption_yesterday;

var kwhdlist = <?php echo json_encode($kwhdlist); ?>;
// get the current kWh/day value for all devices
var overall_load_kwhd = 0;
for (var i = 0; i < kwhdlist.length; i++) {
    overall_load_kwhd += parseFloat(get_feedvalue(kwhdlist[i]));
}

// get the current power value for PV
// pv_power = get_feedvalue(pv_power_feed_id);

// get the current kWh value for the battery
// battery_kwh = get_feedvalue(battery_kwh_feed_id);

$('#loadtable').ready(

function () {
    theTable = "<tr><th>Overall load</th><th>"+Number(overall_load).toFixed(1)+" kWh/"+Number(overall_load_kwhd).toFixed(1)+"kWh</th></tr>";
    theTable += "<tr><td>Overall consumption</td><td>"+Math.round(overall_consumption)+" kWh</td></tr>";
    theTable += "<tr><td>PV performance</td><td></td></tr>";
    theTable += "<tr><td>Battery status</td><td></td></tr>";
    $('#loadtable').append(theTable);
});
*/

  $(document).ready( function () {
    navigator.geolocation.getCurrentPosition(function(position) {
    loadWeather(position.coords.latitude+','+position.coords.longitude); //load weather using your lat/lng coordinates
  });

  setVisibles();  
  summarySetup();
  addDataValues();
});

function  summarySetup(){

      $("#scheduleDiv").hide();

    $.when(

      $.ajax({
          url: "http://cloud.cossmic.eu/cossmic/neighborhood/totalproduction.json",
          type: "GET",
          dataType: "json"
      }),
      $.ajax({
          url: "http://cloud.cossmic.eu/cossmic/neighborhood/totalconsumption.json",
          type: "GET",
          dataType: "json"
      })
    ) 
    .then(function( resultProduction,resultConsumption) {
		var prodSerie = { label: "Total Production", data: resultProduction[0][0],lines:{show:true}};
		var consumSerie = { label: "Total Consumption", data: resultConsumption[0][0],lines:{show:true}};
		plotNeighbGraph([prodSerie,consumSerie]);
    });      

}
	function plotNeighbGraph(d) {
		var options = {
			xaxis: {
				transform: function (v) { return 1000*v; },
				inversetransform: function (v) { return v/1000; },
				mode: "time",
				timeformat: "%H:%M",
				font:{
					color:"#fff"
				}
			},

			yaxis: {
				/*axisLabel:"kWh",
				axisLabelUseCanvas: "true",
				axisLabelFontSizePixels: "20",
				axisLabelPadding: 5,*/
				
				font:{
					color:"#fff",
					size: 11,
				}
			},
			
			grid: {
				color:"#fff",
				backgroundColor: "#1192d3",
				tickColor:"#fff"
			},

            legend:{position:"nw"}
		}

		$.plot("#neighbGraphPlaceholder", d, options);
	}

	function createDummyGraph(){
		var s1 = [[0, 0], [0, 0], [0, 0], [0, 77], [0, 3636], [0, 3575], [0, 2736], [0, 1086], [0, 676], [0, 1205], [0, 906], [0, 710], [0, 639], [0, 540], 
		[0, 435], [0, 301], [0, 575], [0, 481], [0, 591], [0, 608], [0, 459],  
		[0, 279], [0, 449], [0, 468], [0, 392], [0, 282], [0, 208], [0, 229], 
		[0, 177], [0, 374], [0, 436], [0, 404], [0, 253], [0, 218], [0, 476], 
		[0, 462], [0, 448], [0, 442], [0, 403], [0, 204], [0, 194], [0, 327]];
		
		var s2 = [
		[0, 1086], [0, 676], [0, 1205], [0, 906], [0, 710], [0, 639], [0, 540], 
		 
		[0, 462], [0, 448], [0, 442], [0, 403], [0, 204], [0, 194], [0, 327],
		[0, 279], [0, 449], [0, 468], [0, 392], [0, 282], [0, 208], [0, 229], 
		[0, 435], [0, 301], [0, 575], [0, 481], [0, 591], [0, 608], [0, 459],
		[0, 177], [0, 374], [0, 436], [0, 404], [0, 253], [0, 218], [0, 476], 

		[0, 0],   [0, 0],   [0, 0],   [0, 77],  [0, 3636], [0, 3575], [0, 2736],
		];
	
		var midnight = new Date();
		midnight.setHours(0,0,0,0);
		var initial =  Date.parse(midnight);
	
		var now = new Date();
		var finalDate =  Date.parse(now);
		
		var increment = Math.round( (finalDate - initial)/(s1.length) );    
		
		for (var i = 0; i < s1.length; ++i) {
			initial = initial + increment;
			s1[i][0] = initial;
			s2[i][0] = initial;
		}
		
		var serie1 = { label: "Serie 1", data: s1,lines:{show:true}};
		var serie2 = { label: "Serie 2", data: s2, lines:{show:true}};
		
		plotNeighbGraph([serie1,serie2]);
    }
</script>