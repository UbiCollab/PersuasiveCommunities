<?php
global $path;
?>

<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Lib/jqueryui/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/cossmiccontrol_view.css">

<!-- Javascripts -->
<script type="text/javascript" src="<?php echo $path; ?>Lib/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/jqueryui/jquery-ui.min.js"></script>

<div id="rankings">
	<!-- First row of ranking panels -->
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
	<!-- Second row of ranking panels -->
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
	highlightPageLink();
});

//function to find what page we are on and add the currentLink id to that navbar link to highlight current page
function highlightPageLink(){
	var a = document.getElementsByTagName("a");
    for(var i=0;i<a.length;i++){
        if(a[i].href.split("#")[0] == window.location.href.split("#")[0]){
            a[i].id = "currentLink";
        }
    }
}

//Creating dummy data for the various scoreboards. If ranking is fully implemented, this obviously has to change.
function populateLists(){
	makeUL("overallList", 5);
	makeUL("SchedulingList", 2);
	makeUL("pvprodList", 8);
	makeUL("sharingList", 6);
}

//Adding the data to the various lists. If ranking is implemented, this obviously has to change.
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