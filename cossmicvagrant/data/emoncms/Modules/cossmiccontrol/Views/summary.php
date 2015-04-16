<?php
global $path;
?>

<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/cossmiccontrol_view.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/css/style.css">

<script type="text/javascript" src="<?php echo $path; ?>Lib/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/json.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.axislabels.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.time.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/prefixfree.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/modernizr.js"></script>

<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.0.2/jquery.simpleWeather.min.js'></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/imageSelect.js"></script>

<a href="<?php echo $path; ?>cossmiccontrol/view/summary">Summary</a> | <a href="<?php echo $path; ?>Modules/cossmiccontrol/view/homecontrol">Home control</a> | <a href="<?php echo $path; ?>cossmiccontrol/view/settings">Settings</a> | <a href="<?php echo $path; ?>cossmiccontrol/view/history">History</a>

<div id="usagebar" style="width: 100%">
    <div><table style="width: 100%"><tr><td style="width: 33.3%; text-align: left">- Using</td><td style="width: 33.3%; text-align: center">0</td><td style="width: 33.3%; text-align: right">+ Sharing</td></tr></table></div>
    <div id="usagebarcontainer">
        <div id="griduse" class="usagebar" style="background-color: red">
        </div><div id="cossmicuse" class="usagebar" style="background-color: blue">
        </div><div id="selfpvuse" class="usagebar" style="background-color: forestgreen">
        </div><div id="ownbatteryuse" class="usagebar" style="background-color: yellow">
        </div><div id="disttocossmic" class="usagebar" style="background-color: mediumseagreen">
        </div><div id="selltogrid" class="usagebar" style="background-color: mediumpurple"></div>
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

<!--<div class="largeFont">Now</div>
<div id="now">

    <div style="width: 33%">
        <table class="cossmictable" id="loadtable"></table>
    </div>

    <div style="width: 33%" id="batterystatus"></div>

</div>
-->

<div id="today">
    <div class="row">
		<div class="panel span2">
			<div class="panel-heading">Weather</div>
			<div class="panel-body">
				<div id="weather"><script src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/index.js"></script></div>
			</div>
		</div>
		
		<div class="panel span2">
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
		</div>
      		
		<div class="panel span4">
			<div class="panel-heading">Widget2</div>
			<div class="panel-body">
				<div class="tree-panel">
					<div><center><img id="cossmictree" src="<?php echo $path; ?>images/tree/pine-tree.png" alt="" style="height:270px; width:auto"></center></div>
				</div>
			</div>
		</div>
			
		<div class="panel span4">
			<div class="panel-heading">Widget3</div>
			<div class="panel-body">
				<div></div>
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
$pv2householdlist = [];
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
$result = $mysqli->query("SELECT id FROM feeds WHERE name REGEXP 'pv2household_power$' AND userid = '$userid'");
$i = 0;
while($row = (array)$result->fetch_object()) {
	$pv2householdlist[$i] = $row['id'];
	$i++;
}

// get the id of the user's battery kwh feed
// code here...

?>

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
        
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:4567/emoncms/feed/data.json?id=1&start='+start+'&end='+end+'&dp=1 ',
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
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:4567/emoncms/feed/data.json?id=10&start='+start+'&end='+end+'&dp=1 ',
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
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:4567/emoncms/feed/data.json?id=13&start='+start+'&end='+end+'&dp=1 ',
                success: function(data){
                    var json = data[0];
                    
                    if(json[0] <= start){
                        setGrid2householdValue(json[1]);
                    }
                    else{
                        setGrid2householdValue(0);   
                    }
                }
            })
            
        }

    function setTotalconsumptionValue(value){
        totalconsumption = value;
        console.log(totalconsumption);
    }

    function setPv2householdValue(value){
        pv2household = value;
        console.log(pv2household);
    }

    function setGrid2householdValue(value){
        grid2household = value;
        console.log(grid2household);
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
            $("#selfpvuse").css({'width': width/pv2householdValue});
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
				$("#selfpvuse").css({'width': width/pv2householdValue});
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
var grid_use = parseFloat(get_feedvalue(5));
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