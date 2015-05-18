<?php
global $path, $mysqli, $session;
$decomposedPath = explode("/", "$path");
$vdPath = "";
foreach ($decomposedPath as &$value) {
    if ( (strcmp($value, "http:") == 0) || (strcmp($value, "https:") == 0)) {
		$vdPath .= $value . "//";
    }else{
		if ( (empty($value) == false)  && (strcmp($value, "emoncms") !== 0)) {
        $vdPath .= $value . "/";
		}
    }
}
// debugging echo implode("-",$decomposedPath); echo sizeof($decomposedPath); echo $vdPath;
?>

<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Lib/jqueryui/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/cossmiccontrol_view.css">

<script type="text/javascript" src="<?php echo $path; ?>Lib/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/json.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.min.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.time.min.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.stack.min.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.axislabels.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.orderBars.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/history.js"></script>

<script>
var path = "<?php echo $path; ?>";
var first_year = 2010;
var today = new Date();
var current_year = today.getFullYear();
var current_month = today.getMonth();
</script>

<div id="appliances">
	<div class="row">
		<div id="deviceListPanel" class="panel span2 bcolor">
			<div class="panel-heading">Appliances</div>
			<ul id="deviceList"></ul>
		</div>
		
		<div id="deviceGraph" class="panel span10 bcolor">
			<div class="panel-heading">Appliance power consumption</div>
			<!-- graph goes here -->
			<table width="100%">
				<tr>
					<td>
						<div id="tabs_d" class="tabs">
							<ul>
								<li id="tab1_d"><a href="#tabs-1-d">Day</a>
								</li>
								<li id="tab2_d"><a href="#tabs-2-d">Month</a>
								</li>
								<li id="tab3_d"><a href="#tabs-3-d">Year</a>
								</li>
								<li id="tab4_d"><a href="#tabs-4-d">Total</a>
								</li>
							</ul>
						<div id="tabs-1-d">
							<div class="content">
								<table>
									<tr>
										<td>
											<div class="demo-container">
											   <div id="placeholder_day" class="demo-placeholder"></div>
											</div>
										</td>
						<td align="center" style="padding-left: 20px">
							<div id = "choices_day_d"></div>
						</td>
									</tr>
									<tr>
										<td>
											<table style="width:100%">
												<tr>
													<td align="center">
														<span>
															<input id="prevbtn_day_d" type="image" style="height:16px; width:20px" src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/prevbtn.gif"></input>
															<input id="date_from_calendar_d" type="text" readonly="readonly" style="cursor:text; text-align:center"></input>
															<script type="text/javascript">
																var today = new Date();
																document.getElementById('date_from_calendar_d').value = ds_format_date(today.getDate(),today.getMonth()+1,today.getFullYear());
															</script>
															<input id="nextbtn_day_d" type="image" style="height:16px; width:20px"; src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/nextbtn.gif"></input>
														</span>

													</td>
												</tr>
											</table>
										</td>
						<td></td>
									</tr>
								</table>
							</div>
					</div>

							<div id="tabs-2-d">
								<div class="content">
									<table>
										<tr>
											<td>
												<div class="demo-container">
													<div id="placeholder_month" class="demo-placeholder"></div>
												</div>
											</td>
							<td align="center" style="padding-left: 20px">
												<div id = "choices_month_d"></div>
											</td>
										</tr>
										<tr>
											<td>
												<table style="width:100%">
													<tr>
														<td align="center">
															<span>
																<input id="prevbtn_month_d" type="image" style="height:16px; width:20px" src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/prevbtn.gif"></input>
																<select id="select_month_month_d">
										<option value="0">January</option>
										<option value="1">February</option>
										<option value="2">March</option>
										<option value="3">April</option>
										<option value="4">May</option>
										<option value="5">June</option>
										<option value="6">July</option>
										<option value="7">August</option>
										<option value="8">September</option>
										<option value="9">October</option>
										<option value="10">November</option>
										<option value="11">December</option>
										</select>
										<select id="select_month_year_d">
										</select>
																<script type="text/javascript">
										create_year_dropdown("#select_month_year_d", first_year, current_year);
																	// preselect current month
										(document.getElementById('select_month_month_d')).value = current_month;
										// preselect current year
										(document.getElementById('select_month_year_d')).value = current_year;
																</script>
																<input id="nextbtn_month_d" type="image" style="height:16px; width:20px"; src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/nextbtn.gif"></input>
															</span>

														</td>
													</tr>
												</table>
											</td>
										<td></td>
										</tr>
									</table>
								</div>
							</div>
							<div id="tabs-3-d">
								<div class="content">
									<table>
										<tr>
											<td>
												<div class="demo-container">
													<div id="placeholder_year" class="demo-placeholder"></div>
												</div>
											</td>
							<td align="center" style="padding-left: 20px">
												<div id = "choices_year_d"></div>
											</td>
										</tr>
										<tr>
											<td>
												<table style="width:100%">
													<tr>
														<td align="center">
															<span>
																<input id="prevbtn_year_d" type="image" style="height:16px; width:20px" src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/prevbtn.gif"></input>
																<select id="select_year_year_d"></select>
																<script type="text/javascript">
																	create_year_dropdown("#select_year_year_d", first_year, current_year);
																	// preselect current year
										(document.getElementById('select_year_year_d')).value = current_year;
																</script>
																<input id="nextbtn_year_d" type="image" style="height:16px; width:20px"; src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/nextbtn.gif"></input>
															</span>

														</td>
													</tr>
												</table>
											</td>
							<td></td>
										</tr>
									</table>
								</div>
							</div>
							<div id="tabs-4-d">
								<div class="content">
									<table>
										<tr>
											<td>
												<div class="demo-container">
													<div id="placeholder_total" class="demo-placeholder"></div>
												</div>
											</td>
							<td align="center" style="padding-left: 20px">
												<div id = "choices_total_d"></div>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>


<script type="text/javascript">

$(document).ready( function () {
	initList();
	highlightPageLink();
});

//function to find and add style to the link for the current page
function highlightPageLink(){
	var a = document.getElementsByTagName("a");
    for(var i=0;i<a.length;i++){
        if(a[i].href.split("#")[0] == window.location.href.split("#")[0]){
            a[i].id = "currentLink";
        }
    }
}

function initList(){

	//Ajax call to get all the devices and stuff them in the deviceList. Only need the name since no computing is to be done on them
	$.ajax({
        url: '<?php echo $vdPath; ?>virtualDevices/device.php',
        type: 'get',
        dataType: "json",
        data: {'json':'{"cmd":"list","user":"1"}'},
        success: function(output) {
			$.each(output.devicelist, function(idx, item){
				var listItem = $('<li>' + item.name +'</li>');
				$("#deviceList").append(listItem);
		   });
        },
        error: function(xhr, desc, err) {
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
        }
	}); // end ajax call
}
</script>

<?php
require "Modules/cossmiccontrol/Views/history_d.php";
?>