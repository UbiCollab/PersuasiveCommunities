<?php
global $path;
?>

<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Lib/jqueryui/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/cossmiccontrol_view.css">

<script type="text/javascript" src="<?php echo $path; ?>Lib/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/jqueryui/jquery-ui.min.js"></script>

<div id="rankings">
	<div class="row">
		<div class="panel span6" id="overall">
			<div class="panel-heading">Overall score</div>
			<ul class="ulClass" id="overallList"></ul>
		</div>
		<div class="panel span6" id="scheduling">
			<div class="panel-heading">Scheduling points</div>
			<ul class="ulClass" id="SchedulingList"></ul>
		</div>
	</div>  
	<br />
	<div class="row">
		<div class="panel span6" id="pvproduction">
			<div class="panel-heading">PV production</div>
			<ul class="ulClass" id="pvprodList"></ul>
		</div>
		<div class="panel span6" id="sharing">
			<div class="panel-heading">Electricity shared</div>
			<ul class="ulClass" id="sharingList"></ul>
		</div>
	</div>
</div>

<script type="text/javascript">

//When document is ready, populate the lists
$(document).ready( function() {
	populateLists();
});

//Creating dummy data for the various scoreboards
function populateLists(){
	makeUL("overallList", 5);
	makeUL("SchedulingList", 2);
	makeUL("pvprodList", 8);
	makeUL("sharingList", 6);
}

//Adding the data to the various ul id's
function makeUL(target, rank){
	var count = 1;
	var item;
	while(count < 11){
		if(count == rank){
			item = $('<li><h3>'+count+'. Your household</h3></li>');
			count++;
			$("#"+target).append(item);
		}
		else{
			item = $('<li><b>'+count+'.</b> CommunityMember'+count+'</li>');
			count++;
			$("#"+target).append(item);
		}
	}
}

</script>