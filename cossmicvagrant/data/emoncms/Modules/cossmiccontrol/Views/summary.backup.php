<?php
global $path;
?>

<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/cossmiccontrol_view.css">

<script type="text/javascript" src="<?php echo $path; ?>Lib/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/json.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.time.min.js"></script>

<a href="<?php echo $path; ?>cossmiccontrol/view/summary">Summary</a> | <a href="<?php echo $path; ?>cossmiccontrol/view/homecontrol">Home control</a> | <a href="<?php echo $path; ?>cossmiccontrol/view/settings">Settings</a> | <a href="<?php echo $path; ?>cossmiccontrol/view/history">History</a>

<div style="width: 1500px">

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

<div style="font-size: large; width: 100%; margin-top: 30px">Now</div>
<div id="now">

    <div style="width: 33%">
        <table class="cossmictable" id="loadtable"></table>
    </div>

    <div style="width: 33%" id="batterystatus"></div>
    
    <div style="width: 33%" id="cossmickwh">
        <div>Total kWh exchanged within CoSSMic</div>
        <div id="cossmickwhbar">
            <div id="cossmickwhprogressbar"></div>
        </div>
        <div id="cossmickwhlegend" style="clear: left">[x] kWh since 3/1/2014</div>
    </div>

</div>

<div style="font-size: large; width: 100%; margin-top: 30px">Today</div>
<div id="today">

    <div style="width: 15%">
        <div>Weather</div>
        <div><script src="http://www.yr.no/place/Norway/Sør-Trøndelag/Trondheim/Trondheim/external_box_small.js"></script></div>
    </div>
    
    <div style="width: 50%">
        <div>Neighborhood</div>
        <div id="neighbGraphPlaceholder" style="width:100%;height:400px"></div>
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
    </div>

</div>

</div>

<?php
global $mysqli, $session;
$kwhlist = [];
$kwhdlist = [];
$userid = $session['userid'];


/* TODO: uncomment when integrating Katharinas code
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
// get the id of the user's PV power feed 
// code here...

// get the id of the user's battery kwh feed
// code here...

*/
?>

<script>

/* TODO: uncomment when integrating Katharinas code

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
    summarySetup();
} );

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
									timeformat: "%H:%M"
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