<?php
global $path;
$decomposedPath = explode("/", "$path");
$vdPath = "";
foreach($decomposedPath as &$value) {
    if((strcmp($value, "http:") == 0) || (strcmp($value, "https:") == 0)){
        $vdPath .= $value . "//";
    }else{
        if((empty($value) == false)  && (strcmp($value, "emoncms") !== 0)){
            $vdPath .= $value . "/";
        }
    }
}
?>

<!-- Main stylesheet for the site -->
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/cossmiccontrol_view.css">
<!-- Font stylesheet -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<!-- Stylesheet for the weather widget -->
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/css/style.css">
<!-- Stylesheet for the bar charts -->
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/BarChartJS/barstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Lib/jquerypowertip/css/jquery.powertip.css">
<!-- Stylesheet used for the scheduled tasks list 
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Lib/pure-0.5.0/pure-min.css">-->

<!-- The D3 library used for the bar charts -->
<script type="text/javascript" src="<?php echo $path; ?>Lib/d3.v3.min.js"></script>
<!-- Jquery libraries -->
<script type="text/javascript" src="<?php echo $path; ?>Lib/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/jquerypowertip/jquery.powertip.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.axislabels.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.time.min.js"></script>
<!-- The json parsing javascript -->
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/json.js"></script>
<!-- Libraries used for the weather widget -->
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/prefixfree.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/jquery.simpleWeather.min.js"></script>
<!-- Javascript for setting the CoSSMic tree -->
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/imageSelect.js"></script>
<!-- Javasctipt to create the Bar Charts -->
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/BarChartJS/chart.js"></script>
<!-- Javascript for setting the score of the tooltips in treebox -->
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/BarChartJS/scoretexts.js"></script>

<!-- Enclosing div for the top main page content -->
<div id="today">
    <div class="row">
		<!-- Div containing the weather widget -->
		<div id="weatherbox" class="panel span2">
			<div id="weatherhead" class="panel-heading"><div id="weatherheading">Weather </div><img class="expand" id="weatherexpand" src="<?php echo $path; ?>images/pluss-icon.png" /></div>
			<div id="weathercont" class="panel-body">
				<!-- The content for the small widget view -->
				<div id="weather" class="weatherclass"><script src="<?php echo $path; ?>Modules/cossmiccontrol/Views/simpleweather-geolocation-js/js/index.js"></script></div>
				<!-- The five content boxes for the extended forecast -->
				<div id="weather1" class="weathertable"></div>
				<div id="weather2" class="weathertable"></div>
				<div id="weather3" class="weathertable"></div>
				<div id="weather4" class="weathertable"></div>
				<div id="weather5" class="weathertable"></div>
			</div>
		</div>
		
		<!-- Div containing the CoSSMic tree / forest -->
		<div id="treebox" class="panel span4">
			<div class="panel-heading">CoSSMic Score 
                <img class = "helpIcon" id = "treeHelp" src = "<?php echo $path; ?>images/help-icon.png"/>
                <img class="expand" id="treeexpand" src="<?php echo $path; ?>images/pluss-icon.png" /></div>
			<div class="panel-body">
				<div id="tree-panel">
					<div id="cossmictreeContainer">
						<!-- The CoSSMic tree itself -->
                        <div id="treeImgContainer"><img id="cossmictree" src="<?php echo $path; ?>images/tree/pine-tree.png" alt="" style="height:270px; width:auto"></div>
						<!-- The bar chart linked to the tree for the extended view -->
                        <div id="cossmictreebarchart" class="tree-barchart">
                            <svg class="outerChart" id="outerTreeChart"></svg>
                        </div>
                    </div>
                    <div id="cossmicforestContainer">
						<!-- The CoSSMic forest -->
                        <img id="cossmicforest" src="<?php echo $path; ?>images/tree/forest-test2.png" alt="" style="height:270px; width:auto">
						<!-- The bar chart linked to the forest for the extended view -->
                        <div id="cossmicforestbarchart" class="tree-barchart">
							<svg class="outerChart" id="outerForestChart"></svg>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		
		<!-- Div containing the graphical representation of the household -->
		<div id="housebox" class="panel houseboxsmall">
			<div class="panel-heading">My household <img class="expand" id="houseexpand" src="<?php echo $path; ?>images/pluss-icon.png" /></div>
			<div class="panel-body">
                <div id="houseIconBody">
                    <table id="houseboxTable">
                        <tr id="firstRowHousebox">
                            <td><div><img id="housebox_panel" class="housebox_content" src="<?php echo $path; ?>images/housebox_content/house_w_panel.png"></div></td>
                            <td><div><img id="housebox_grid" class="housebox_content" src="<?php echo $path; ?>images/housebox_content/house_w_grid.png"></div></td>
                        </tr>
                        <tr id="firstRowHouseboxText">
                            <td id="houseboxPanelTd"><div id="houseboxPanelText" class="houseboxIconText">Panel</div></td>
                            <td id="houseboxGridTd"><div id="houseboxGridText" class="houseboxIconText">Grid</div></td>
                        </tr>
                        <tr id="secondRowHousebox">
                            <td><div><img id="housebox_battery" class="housebox_content" src="<?php echo $path; ?>images/housebox_content/house_w_battery.png"></div></td>
                            <td><div><img id ="housebox_community" class="housebox_content" src="<?php echo $path; ?>images/housebox_content/house_to_community.png"></div></td>
                        </tr>
                        <tr id="secondRowHouseboxText">
                            <td id="houseboxBatteryTd"><div id="houseboxBatteryText" class="houseboxIconText"></div></td>
                            <td id="houseboxCommunityTd"><div id="houseboxCommunityText" class="houseboxIconText">Community</div></td>
                        </tr>
                    </table>
                </div>
                <div id="housebody">
                    <div class="elFlowHeaders">
                        <div id="myHouseTag">My house</div>
                        <div id="myCommunityTag">Community</div>
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
    <div class="row">
        <div id="summarySchedule" class="panel span12 bcolor">
            <div class="panel-heading">Your scheduled tasks<a href="<?php echo $path; ?>cossmiccontrol/view/scheduler"><img class="expand" id="scheduleredirect" src="<?php echo $path; ?>images/pluss-icon.png" /></a></div>
            <table class="table table-condensed" id="taskTable">
                <thead>
                    <tr>
                        <th>Appliance Name</th>
                        <th>Status</th>
                        <th>Program</th>
                        <th>Earliest Start Time</th>
                        <th>Latest Start Time</th>
                        <th>Actual Start Time</th>
                        <th>Actual Finishing Time</th>
                        <th></th>
                    </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Div containing the full width graph for the neighborhood / community -->
<div class="row" style="margin-top: 30px">
	<div class="panel span12">
		<div class="panel-heading">Community - today</div>
		<div class="panel-neighborhoodGraph">
			<div id="neighbGraphPlaceholder"></div>
		</div>
	</div>
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
$userlocation;

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

//get the users registered location
$result = $mysqli->query("SELECT location FROM users WHERE id = '$userid'");
$row = (array)$result->fetch_object();
$userlocation = $row['location'];

?>

<script>
//This script section contains the code to gracefully expand and retract the three main information boxes on the summary page
    $(function(){
		//The expand / retract of the weatherbox
		$("#weatherexpand").on('click', function(){
			if($("#weatherbox").hasClass("panel span2")){
				$("#weatherexpand").attr("src","<?php echo $path; ?>/images/minus-icon.png");
				$("#housebox").toggle(400);
				$("#treebox").toggle(400);  
				$("#weatherbox").switchClass("span2", "span12", 500, "easeInOutQuad");
				$("#weatherheading").html("5-Day Forecast");
				$("#weather").toggle();
				$("#weather1").switchClass("weathertable", "weatherclass2");
				$("#weather2").switchClass("weathertable", "weatherclass2");
				$("#weather3").switchClass("weathertable", "weatherclass2");
				$("#weather4").switchClass("weathertable", "weatherclass2");
				$("#weather5").switchClass("weathertable", "weatherclass2");
            }
            else{
				$("#weatherexpand").attr("src","<?php echo $path; ?>/images/pluss-icon.png");
				$("#weatherbox").switchClass("span12", "span2", 500, "easeInOutQuad");
                $("#weatherheading").html("Weather");
				$("#weather1").switchClass("weatherclass2","weathertable");
				$("#weather2").switchClass("weatherclass2","weathertable");
				$("#weather3").switchClass("weatherclass2","weathertable");
				$("#weather4").switchClass("weatherclass2","weathertable");
				$("#weather5").switchClass("weatherclass2","weathertable");
                $("#weather").toggle();
				
                setTimeout(function(){
                  $("#housebox").toggle(400);
                  $("#treebox").toggle(400); 
                }, 200);   
            }
		});
	
		//The expand / retract of the cossmic score box
        $("#treeexpand").on('click', function(){
            if($("#treebox").hasClass("panel span4")){
				$("#treeexpand").attr("src","<?php echo $path; ?>/images/minus-icon.png");
				$("#weatherbox").toggle(400);
				$("#housebox").toggle(400);  
				$("#treebox").switchClass("span4", "span12", 500, "easeInOutQuad");
				$("#cossmictreeContainer").css({"width":"50%"});

                setTimeout(function(){
                    $("#cossmicforestContainer").toggle();
                    $("#treeHelp").toggle();
                    $("#cossmictreeContainer").css({"border-right":"1px solid","border-right-color":"#fff"});
                    $("#cossmictreebarchart").toggle();
                }, 500);
				
				$("#cossmictree").animate({"margin-left":"10px"});
                $("#cossmictree").animate({"float":"left"}); 
            }
            else{
				$("#treeexpand").attr("src","<?php echo $path; ?>/images/pluss-icon.png");
                $("#cossmictreebarchart").toggle();
				$("#cossmicforestContainer").toggle();
                $("#treebox").switchClass("span12", "span4", 500, "easeInOutQuad");
				$("#cossmictreeContainer").css({"width":"100%"});
				$("#cossmictree").animate({"margin-left":"100px"});
                $("#treeHelp").toggle();
                
                setTimeout(function(){
					$("#weatherbox").toggle(500);
					$("#housebox").toggle(500); 
                }, 200);   
            }
        });
        
		//The expand / retract of the  my household box
        $("#houseexpand").on('click', function(){
            var margin = 630;
            
            if($("#housebox").hasClass("panel houseboxsmall")){
				$("#houseexpand").attr("src","<?php echo $path; ?>/images/minus-icon.png");
				$("#weatherbox").toggle(400);
				$("#treebox").toggle(400);  
				$("#housebox").switchClass("houseboxsmall", "houseboxbig", 500, "easeInOutQuad");

                setTimeout(function(){
                    $("#houseIconBody").toggle();
                }, 500);  
            }
            else{
				$("#houseexpand").attr("src","<?php echo $path; ?>/images/pluss-icon.png");
                $("#houseIconBody").toggle();
                $("#housebox").switchClass("houseboxbig", "houseboxsmall", 500,"easeInOutQuad");
                
                setTimeout(function(){
                  $("#weatherbox").toggle(500);
                  $("#treebox").toggle(500); 
                }, 200);   
            }
        });
    });

</script>

<script>
    var m = 0;
    hidden= 0;
    var count = 0;
    totalconsumption = 0;
    pv2household = 0;
    grid2household = 0;
    pv2grid = 0;
    storage2grid = 0;
    storage2household = 0;
    ids = [1,10,13];
    values = [];
    var path = "<?php echo $path; ?>";

    var consumptionkwhId = <?php echo json_encode($consumptionkwhId); ?>; 
    var pv2householdId = <?php echo json_encode($pv2householdId); ?>;
    var grid2householdId = <?php echo json_encode($grid2householdId); ?>;
    var grid2storageId = <?php echo json_encode($grid2storageId); ?>;
    var pv2storageId = <?php echo json_encode($grid2storageId); ?>;
    var pv2gridId = <?php echo json_encode($pv2gridId); ?>;
    var storage2gridId = <?php echo json_encode($storage2gridId); ?>;
    var storage2householdId = <?php echo json_encode($storage2householdId); ?>;
    
	//Function to gather the data and create the CoSSMic tree bar chart as well as select the CoSSMic tree image to display
    function createBarChart(type){
		var data=[];
        //if battery and the household is using battery power
        if(storage2householdId != 0){
            data.push(["Battery usage", storage2household]);
        }
        //if battery and sharing to grid
        if(storage2gridId != 0){
            data.push(["Sharing", Math.round(storage2grid*10)]);
        }

        //Calculate share score based on pv-grid and storage-grid
        var coefs = 1.50;
        var sharingValue = (pv2grid+storage2grid);
        //if(sharingValue > 10 )
        data.push(["Sharing score", sharingValue, getSharingScoreText(sharingValue)]);
        
		//Calculate score based on how much of the pv is used for example
        var pv2householdValue = (Math.round(((pv2household/totalconsumption)+(pv2household/grid2household))*100));
        //console.log((pv2household/totalconsumption)+(pv2household/grid2household));
        data.push(["PV score", pv2householdValue, getPvUsageScoreText(pv2householdValue)]);

        //Calculate score based on a treshhold value over a whole day for example. High score = low actual usage
        var gridUsageValue = 100-(Math.round((grid2household/totalconsumption)*100));
        data.push(["Grid score",  gridUsageValue, getGridUsageScoreText(gridUsageValue)]);
		
        //Calculate score based on the scheduling (actual schedules/number of schedulable devices for example)
        var schedulingValue= (6/12)*100;
        data.push(["Scheduling", schedulingValue, getSchedulingScoreText(schedulingValue)]);

        //Calculates a very simple score based on the percentage of PV power used compared to the total power used
        //then passes this score (from 1 to 100) to the selectTree javascript that sets the tree image
        
        var array1 = [["Sharing score",10, getSharingScoreText(10)],["PV score",20,getPvUsageScoreText(20)],["Grid score",45, getGridUsageScoreText(45)],["Scheduling",78, getSchedulingScoreText(78)]];
        var array2 = [["Sharing score",20, getSharingScoreText(20)],["PV score",36, getPvUsageScoreText(36)],["Grid score",87, getGridUsageScoreText(87)],["Scheduling",21, getSchedulingScoreText(21)]];
        var arrays = [array1,data,array2];
            
        var res = Math.floor(Math.random()*3);
        console.log(type+" "+res);

        if(type == "tree"){

            if(res == 0){
                selectTree(Math.round((10+20+45+78)/4));
                    return arrays[res];
            }
            if(res == 1){
                selectTree(Math.round((sharingValue+pv2householdValue+gridUsageValue+schedulingValue)/4));
                    return arrays[res];
            }
            if(res == 2){
                selectTree(Math.round((20+36+87+21)/4));
                return arrays[res];
            }
        }
        if(type=="forest"){
            var forestArray = [["Sharing score",57, getSharingScoreText(57)],["PV score",61, getPvUsageScoreText(61)],["Grid score",87, getGridUsageScoreText(87)],["Scheduling",49, getSchedulingScoreText(49)]];
            return forestArray;    
        }
        
    }

    function getData(){
        end = new Date().getTime();
        start = end - 10;    
        
            //get data from totalConsumption
            $.ajax({
                type: 'get',
                url: path+'/feed/data.json?id='+consumptionkwhId+'&start='+start+'&end='+end+'&dp=1',
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
                url: 'http://127.0.0.1:4567/emoncms/feed/data.json?id='+pv2householdId+'&start='+start+'&end='+end+'&dp=1',
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
			$.ajax({
				type: 'get',
				url: 'http://127.0.0.1:4567/emoncms/feed/data.json?id='+grid2storageId+'&start='+start+'&end='+end+'&dp=1 ',
				success: function(data){
					if(grid2storageId == 0){
					   
					   $("#batteryLabel").hide();
					   $("#housebox_battery").hide();
					   $("#house-icon").attr("src","<?php echo $path; ?>/images/housebox_content/house_el_flow_without_battery.png");
					   $("#elFlowText1").css({"margin-top":"65px"})
						
						if(hidden == 0){
						   $("#secondRowHousebox").hide();
						   $("#firstRowHousebox").append('<td><div><img id ="housebox_community" class="housebox_content" src="<?php echo $path; ?>images/housebox_content/house_to_community.png"></div></td>');
						   $("#secondRowHouseboxText").hide();
						   $("#firstRowHouseboxText").append('<td><span class="whiteText">You are sharing </span><span id="houseboxCommunityText" class ="houseboxIconText"></span><span class="whiteText"> of the power within the CoSSMic project!</span></td>');
							hidden = 1;
						}
					}
					else{
						$("#houseboxTable").css({"margin-top":"0px"});
						$(".housebox_content").css({"margin-top":"10px"});
						$("#houseboxBatteryTd").html('<span class="whiteText">Your battery is providing  </span> <span class="houseboxIconText">'+storage2household+"%"+'</span><span class="whiteText"> of the total consumption!</span>');
						$("#houseboxCommunityTd").html('<span class="whiteText">You are sharing </span> <span id="houseboxCommunityText" class="houseboxIconText"></span><span class="whiteText"> of the power within CoSSMic project!</span>');

						var json = data[0];
						//console.log(data);
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
        }

    function setTotalconsumptionValue(value){
        $(function(){
               $("#elTotalConsumption").html(value.toFixed(2)+" kWh");  
        });
       totalconsumption = value;
        //console.log("total: "+totalconsumption);
    }

    function setPv2householdValue(value){
        $(function(){
               $("#pvN").html(value.toFixed(2)+" kWh");
                
        });
        pv2household = value;
        //console.log("pv2house: "+pv2household);
    }

    function setGrid2householdValue(value){
        $(function(){
               $("#gridN").html(value.toFixed(2)+" kWh");  
        });
        grid2household = value;
        //console.log("grid2house: "+grid2household);
    }

    function setGrid2storageValue(value){
        grid2storage = value;
        //console.log("grid2storage: "+grid2storage);
    }    

    function setPv2storageValue(value){
        pv2storage = value;
        //console.log(pv2storage);
    }

    function setPv2gridValue(value){
        pv2grid = value;
        //console.log(pv2grid);
    }

    function setStorage2gridValue(value){
        storage2grid = value;
        //console.log(storage2grid);
    }
        
    function setStorage2householdValue(value){
        storage2household = value;
        //console.log(storage2household);
    }
	
    //display the percentages of the different power supplies. E.g x% grid
    function setHouseboxIconText(){
        
        //set text for total consumption on house icon
        $("#houseboxPanelText").html((pv2household/totalconsumption).toFixed(2)*100+"%");
        //set text for the pvPanel icon
        var houseBoxPanelValue = (pv2household/totalconsumption).toFixed(2)*100;
        $("#houseboxPanelText").html((pv2household/totalconsumption).toFixed(2)*100+"%");
        $("#houseboxPanelTd").html('<span class="whiteText">The PV is producing </span> <span class="houseboxIconText">'+houseBoxPanelValue+"%"+'</span><span class="whiteText"> of the total consumption!</span>');
        //set text for the grid icon
        var houseBoxGridValue = (grid2household/totalconsumption).toFixed(2)*100;
        $("#houseboxGridText").html((grid2household/totalconsumption).toFixed(2)*100+"%");
        $("#houseboxGridTd").html('<span class="whiteText">The grid is supplying </span> <span class="houseboxIconText">'+houseBoxGridValue+"%"+'</span><span class="whiteText"> of the total consumption!</span>');
        //set % of shared el to the grid. 
        $("#houseboxCommunityText").html(pv2grid+storage2grid+"%");
    }

    function addDataValues(){
		setTimeout(function(){
            var pv2householdValue = totalconsumption/pv2household;
            var grid2householdValue = totalconsumption/grid2household;
            var height = $("#usagebarcontainer").height()/2;
            var width = $("#usagebarcontainer").width()/2;
            
            $("#griduse").css({'width': width/grid2householdValue});
            $("#gridusePercentage").html(Math.round((grid2household/totalconsumption)*100)+"%");
            $("#selfpvuse").css({'width': width/pv2householdValue});
            $("#selfpvusePercentage").html(Math.round((pv2household/totalconsumption)*100)+"%");
            $("#griduse").css({'float': "left"});
            $("#selfpvuse").css({'float': "left"}); 
            setHouseboxIconText();
            //Call the javascript to populate the tree bar chart with the gathered data
            
            barChart("#outerTreeChart", "tree", createBarChart("tree"));
			barChart("#outerForestChart", "forest", createBarChart("forest"));
			addTooltips("tree");
			addTooltips("forest");
        }, 1000);
        getData();
	
		setInterval(function(){
			setTimeout(function(){
				var pv2householdValue = totalconsumption/pv2household;
				var grid2householdValue = totalconsumption/grid2household;
				var height = $("#usagebarcontainer").height()/2;
				var width = $("#usagebarcontainer").width()/2;
				
				$("#griduse").css({'width': width/grid2householdValue});
                $("#gridusePercentage").html(Math.round((grid2household/totalconsumption)*100)+"%");
                $("#selfpvuse").css({'width': width/pv2householdValue});
                $("#selfpvusePercentage").html(Math.round((pv2household/totalconsumption)*100)+"%");
                $("#griduse").css({'float': "left"});
                $("#selfpvuse").css({'float': "left"}); 
				setHouseboxIconText();
               
                updateBarChart("#outerTreeChart", "tree", createBarChart("tree"));
				updateBarChart("#outerForestChart", "forest", createBarChart("forest"));
			}, 1000)
			getData();
        }, 60000);
    };

    //tooltips for the different elements in Summary.php
    function setTooltips(){

        $("#treeHelp").data("powertip", function(){

                var tooltip =   "The <b>Tree</b> on the left represents your household's envorinmental profile and score. While the <b>Forest</b> represents how your community's environmental profile."+
                                "<br> Your score influce directly how the community is doing. The main goal is to get both the <b>tree</b> and the <b>forest</b> to 100%."+
                                "<br> If you succeed in doing so, it means that you are using the electricity in your household in an efficient matter."+
                                "<br> This ultimately benefits the CoSSMic project and of course the environment."+
                                "<br>"+
                                "<br>The score is based on these parameters:"+
                                "<br><b>Sharing score:</b> This score is based on how much you are able to share/sell to the community/grid."+
                                "<br>It is calculated by total kWh shared divided by an avarage daily kWh throughout you community."+
                                "<br>"+
                                "<br><b>PV score</b> score is based on the PV production divided by the total consumption, and if the scheduled tasks are run when the PV is producing."+
                                "<br>So if the tasks are run when the PV is producing a lot, you will get high score."+
                                "<br>"+
                                "<br><b>Grid score</b> is based on how much electricity you are using from the grid divided by the total consumption."+
                                "<br>Smaller amounts of kWh used from the grid results in a high score."+
                                "<br>"+
                                "<br><b>Scheduling score</b> is based on how frequently you are scheduling your devices in the household."+
                                "<br>"+
                                "<br>The different scores for the <b>Forest</b> is based on the avarage household's score in the respective parameters."+
                                "<br>"+
                                "<br><b>Hover over the different bars to see how you can improve the score!</b>";

                    return tooltip;
                });


        $("#treeHelp").powerTip({
                placement: "se",
                mouseOnToPopup:true
            });
    }

    //Functions for loading the scheduled tasks table
    function scheduledTaskLoad(){
        var listTaskJson = '?json={"status":10,"info":true}';
        
        $.when(
            $.ajax({
                url: '<?php echo $path; ?>mas/list.json' + listTaskJson,
                type: 'get',
                dataType: 'json'
            })
           ,
            $.ajax({
                url: '<?php echo $vdPath; ?>virtualDevices/device.php',
                type: 'get',
                dataType: "json",
                data: {'json':'{"cmd":"list","user":"1"}'}
            })
        )
        .then(function( resultListTask,resultListDevices) {
            //console.log(JSON.stringify(resultListTask[0]));
            //console.log(JSON.stringify(resultListDevices[0]));
            var deviceHash = new Object();
            $.each(resultListDevices[0].devicelist, function(idx, item){
                $("#summarySchedule").show();
                deviceHash[item.id] = item.name;
            });
            $.each(resultListTask[0].tasks, function(idx, item){
                var id = item.id;
                var devId = item.deviceID;
                var status;
                switch(item.status) {
                    case "0":
                        status = "Not yet scheduled"
                        break;
                    case "1":
                        status = "Scheduled"
                        break;
                    case "4":
                        status = "Running"
                        break;
                    case "5":
                        status = "Completed"
                        break;
                    default:
                        status = "Undetermined"
                }
               
                var mode = item.mode;
                var est = item.EST;
                var lst = item.LST;
                var aet = item.AET;
                var ast = item.AST;
                var name = '';
                if (deviceHash.hasOwnProperty(devId)) {
                    name = deviceHash[devId];
                }
				var htmlRow= '<tr task-id="' +id+ '" device-id="' + devId + '"><td>' + name + ' </td><td> ' + status + ' </td><td> ' + mode +  ' </td><td> ' + est + ' </td><td> ' + lst +
                ' </td><td> ' + ast + ' </td><td>' + aet + '</td><td></td></tr>';
                /*
				if users are supposed to be able to delete tasks from dashboard, replace the var htmlRow with the one below
				
				var htmlRow= '<tr task-id="' +id+ '" device-id="' + devId + '"><td>' + name + ' </td><td> ' + status + ' </td><td> ' + mode +  ' </td><td> ' + est + ' </td><td> ' + lst +
                ' </td><td> ' + ast + ' </td><td>' + aet + '</td><td><a href="#" onclick="deleteTask('+id+',\''+aet+'\')"><i class="icon-trash"></i></a></td></tr>';
				*/
                $("#taskTable > tbody").prepend(htmlRow);        
            });
        });
    }

	/*
	function to remove a task. uncomment if it is desirable to be able to delete tasks from the dashboard
	
    function deleteTask(id,aet){
        if (aet != "UNDEFINED"){
            window.alert("It is not possible to delete scheduled tasks ");
            return;
        }
        
        $.ajax({
            url: '<?php echo $path; ?>mas/delete.json?id=' + id,
            type: 'get',
            dataType: 'json',
            success: function(output) {
                console.log(output);
                if(null != output) {
                    if (output.result != "success"){
                        if(!output.result){ // task deleted
                            window.alert("It was not possible to delete the task, it probably has already been scheduled");
                        }
                        location.reload();
                    }
                }
                 location.reload();
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log('Details: ' + desc + '\nError:' + err);
                window.alert("error when trying to delete the task");
            }
        }); // end ajax call
    }*/
    //End of functions for the scheduled task table
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

//Waiting till the DOM is fully loaded before running this code
$(document).ready( function () {
	//Check first with geolocation to find users position. If that fails, second function is called to handle errors.
	//If geolocation fails, use the location field in users profile on emoncms.
    navigator.geolocation.getCurrentPosition(function(position) {
	console.log("Found users position with geolocation. Fetching weather data");
    loadWeather(position.coords.latitude+','+position.coords.longitude); //load weather using your lat/lng coordinates
}, function(position){
	console.log("Geolocation failed, attempting to use location from the user data in emoncms");
	errorWeather("<?php echo $userlocation; ?>");
}, {timeout: 10000});

	summarySetup();
	addDataValues();
    setTooltips();
    scheduledTaskLoad();
});

function  summarySetup(){

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