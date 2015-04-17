<?php
global $path;
?>

<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Lib/jqueryui/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>Modules/cossmiccontrol/Views/cossmiccontrol_view.css">

<script type="application/javascript" src="<?php echo $path; ?>Lib/jquery-1.9.0.min.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.min.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.time.min.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.stack.min.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.axislabels.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/flot/jquery.flot.orderBars.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Lib/jqueryui/jquery-ui.min.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/history.js"></script>
<script type="application/javascript" src="<?php echo $path; ?>Modules/cossmiccontrol/Views/json.js"></script>

<script>
var path = "<?php echo $path; ?>";
var first_year = 2010;
var today = new Date();
var current_year = today.getFullYear();
var current_month = today.getMonth();
</script>

<a href="<?php echo $path; ?>cossmiccontrol/view/summary">Summary</a> | <a href="<?php echo $path; ?>cossmiccontrol/view/homecontrol">Home control</a> | <a href="<?php echo $path; ?>cossmiccontrol/view/settings">Settings</a> | <a href="<?php echo $path; ?>cossmiccontrol/view/history">History</a>

<div style="height: 1000px; width: 1850px">

<!-- consumption/generation div -->
<div style="height: 900px; width: 800px; float: left">

<table width="750px">
    <tr>
        <td>
            <div id="tabs_cg">
                <ul>
                    <li id="tab1_cg"><a href="#tabs-1-cg">Day</a>

                    </li>
                    <li id="tab2_cg"><a href="#tabs-2-cg">Month</a>

                    </li>
                    <li id="tab3_cg"><a href="#tabs-3-cg">Year</a>

                    </li>
                    <li id="tab4_cg"><a href="#tabs-4-cg">Total</a>

                    </li>
                </ul>
                <div id="tabs-1-cg">
                    <div class="content">
                        <table>
                            <tr>
                                <td>
                                    <div class="demo-container" style="height: 770px; width: 750px">
					<div style="height:700px; width:100%">
        				    <div class="y-axis-label">Power [W]</div>
        				    <div class="placeholders">
            					<div id="placeholder1_day" class="demo-placeholder" style="height: 50%"></div>
            					<div id="placeholder2_day" class="demo-placeholder" style="height: 50%"></div>
        				    </div>
    					</div>
					<div id = "choices_day_cg">
					    <table class="legend">
						<tr>
						    <td id="consumption_day" style="cursor:pointer">
						        <div style="float:left"><img src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/consumption.png" style="width:12px; height:12px"></div>
						        <div class="legend-text">Daily consumption</div>
						    </td>
						    <td id="extenergysupply_day" style="cursor:pointer">
						        <div style="float:left; width:12px; height:12px; background-color:#FF0000; border:1px solid #000000;"></div>
						        <div class="legend-text">External energy supply</div>
						    </td>
						    <td id="intpowersupply_day" style="cursor:pointer">
						        <div style="float:left; width:12px; height:12px; background-color:#088A08; border:1px solid #000000;"></div>
						        <div class="legend-text">Internal power supply</div>
						    </td>
						    <td id="generation_day" style="cursor:pointer">
						        <div style="float:left"><img src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/generation.png" style="width:12px; height:12px"></div>
						        <div class="legend-text">Daily yield</div>
						    </td>
						    <td id="selfconsumption_day" style="cursor:pointer">
						        <div style="float:left; width:12px; height:12px; background-color:#80FF00; border:1px solid #000000;"></div>
						        <div class="legend-text">Self-consumption</div>
						    </td>
						    <td id="gridfeedin_day" style="cursor:pointer">
						        <div style="float:left; width:12px; height:12px; background-color:#FFFF00; border:1px solid #000000;"></div>
						        <div class="legend-text">Grid feed-in</div>
						    </td>
						</tr>
					    </table>
					</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="width:100%">
                                        <tr>
                                            <td align="center">
                                                <span>
                                                    <input id="prevbtn_day_cg" type="image" style="height:16px; width:20px" src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/prevbtn.gif"></input>
                                                    <input id="date_from_calendar_cg" type="text" readonly="readonly" style="cursor:text; text-align:center"></input>
                                                    <script type="text/javascript">
                                                        var today = new Date();
                                                        document.getElementById('date_from_calendar_cg').value = ds_format_date(today.getDate(),today.getMonth()+1,today.getFullYear());
                                                    </script>
                                                    <input id="nextbtn_day_cg" type="image" style="height:16px; width:20px"; src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/nextbtn.gif"></input>
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

                <div id="tabs-2-cg">
                    <div class="content">
                        <table>
                            <tr>
                                <td>
                                    <div class="demo-container" style="height: 770px; width: 750px">
                                        <div style="height:700px; width:100%">
        				    <div class="y-axis-label">Energy [kWh]</div>
        				    <div class="placeholders">
            					<div id="placeholder1_month" class="demo-placeholder" style="height: 50%"></div>
            					<div id="placeholder2_month" class="demo-placeholder" style="height: 50%"></div>
        				    </div>
    					</div>
					<div id="choices_month_cg">
					    <table class="legend">
						<tr>
						    <td id="consumption_month" style="cursor:pointer">
							<div style="float:left"><img src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/consumption.png" style="width:12px; height:12px"></div>
							<div class="legend-text">Monthly consumption</div>
						    </td>
						    <td id="extenergysupply_month" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#FF0000; border:1px solid #000000;"></div>
							<div class="legend-text">External energy supply</div>
						    </td>
						    <td id="intpowersupply_month" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#088A08; border:1px solid #000000;"></div>
							<div class="legend-text">Internal power supply</div>
						    </td>
						    <td id="generation_month" style="cursor:pointer">
							<div style="float:left"><img src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/generation.png" style="width:12px; height:12px"></div>
							<div class="legend-text">Monthly yield</div>
						    </td>
						    <td id="selfconsumption_month" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#80FF00; border:1px solid #000000;"></div>
							<div class="legend-text">Self-consumption</div>
						    </td>
						    <td id="gridfeedin_month" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#FFFF00; border:1px solid #000000;"></div>
							<div class="legend-text">Grid feed-in</div>
						    </td>
						</tr>
					    </table>
					</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="width:100%">
                                        <tr>
                                            <td align="center">
                                                <span>
                                                    <input id="prevbtn_month_cg" type="image" style="height:16px; width:20px" src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/prevbtn.gif"></input>
                                                    <select id="select_month_month_cg">
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
						    <select id="select_month_year_cg">
						    </select>
                                                    <script type="text/javascript">
							create_year_dropdown("#select_month_year_cg", first_year, current_year);
                                                        // preselect current month
							(document.getElementById('select_month_month_cg')).value = current_month;
							// preselect current year
							(document.getElementById('select_month_year_cg')).value = current_year;
                                                    </script>
                                                    <input id="nextbtn_month_cg" type="image" style="height:16px; width:20px"; src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/nextbtn.gif"></input>
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
                <div id="tabs-3-cg">
                    <div class="content">
                        <table>
                            <tr>
                                <td>
                                    <div class="demo-container" style="height: 770px; width: 750px">
                                        <div style="height:700px; width:100%">
        				    <div class="y-axis-label">Energy [kWh]</div>
        				    <div class="placeholders">
            					<div id="placeholder1_year" class="demo-placeholder" style="height: 50%"></div>
            					<div id="placeholder2_year" class="demo-placeholder" style="height: 50%"></div>
        				    </div>
    					</div>
					<div id="choices_year_cg">
					    <table class="legend">
						<tr>
						    <td id="consumption_year" style="cursor:pointer">
							<div style="float:left"><img src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/consumption.png" style="width:12px; height:12px"></div>
							<div class="legend-text">Yearly consumption</div>
						    </td>
						    <td id="extenergysupply_year" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#FF0000; border:1px solid #000000;"></div>
							<div class="legend-text">External energy supply</div>
						    </td>
						    <td id="intpowersupply_year" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#088A08; border:1px solid #000000;"></div>
							<div class="legend-text">Internal power supply</div>
						    </td>
						    <td id="generation_year" style="cursor:pointer">
							<div style="float:left"><img src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/generation.png" style="width:12px; height:12px"></div>
							<div class="legend-text">Yearly yield</div>
						    </td>
						    <td id="selfconsumption_year" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#80FF00; border:1px solid #000000;"></div>
							<div class="legend-text">Self-consumption</div>
						    </td>
						    <td id="gridfeedin_year" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#FFFF00; border:1px solid #000000;"></div>
							<div class="legend-text">Grid feed-in</div>
						    </td>
						</tr>
					    </table>
					</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="width:100%">
                                        <tr>
                                            <td align="center">
                                                <span>
                                                    <input id="prevbtn_year_cg" type="image" style="height:16px; width:20px" src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/prevbtn.gif"></input>
                                                    <select id="select_year_year_cg">
						    </select>
                                                    <script type="text/javascript">
                                                        create_year_dropdown("#select_year_year_cg", first_year, current_year);
                                                        // preselect current year
							(document.getElementById('select_year_year_cg')).value = current_year;
                                                    </script>
                                                    <input id="nextbtn_year_cg" type="image" style="height:16px; width:20px"; src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/nextbtn.gif"></input>
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
                <div id="tabs-4-cg">
                    <div class="content">
                        <table>
                            <tr>
                                <td>
                                    <div class="demo-container" style="height: 770px; width: 750px">
                                        <div style="height:700px; width:100%">
        				    <div class="y-axis-label">Energy [kWh]</div>
        				    <div class="placeholders">
            					<div id="placeholder1_total" class="demo-placeholder" style="height: 50%"></div>
            					<div id="placeholder2_total" class="demo-placeholder" style="height: 50%"></div>
        				    </div>
    					</div>
					<div id="choices_total_cg">
					    <table class="legend">
						<tr>
						    <td id="consumption_total" style="cursor:pointer">
							<div style="float:left"><img src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/consumption.png" style="width:12px; height:12px"></div>
							<div class="legend-text">Total consumption</div>
						    </td>
						    <td id="extenergysupply_total" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#FF0000; border:1px solid #000000;"></div>
							<div class="legend-text">External energy supply</div>
						    </td>
						    <td id="intpowersupply_total" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#088A08; border:1px solid #000000;"></div>
							<div class="legend-text">Internal power supply</div>
						    </td>
						    <td id="generation_total" style="cursor:pointer">
							<div style="float:left"><img src="<?php echo $path; ?>/Modules/cossmiccontrol/Views/generation.png" style="width:12px; height:12px"></div>
							<div class="legend-text">Total yield</div>
						    </td>
						    <td id="selfconsumption_total" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#80FF00; border:1px solid #000000;"></div>
							<div class="legend-text">Self-consumption</div>
						    </td>
						    <td id="gridfeedin_total" style="cursor:pointer">
							<div style="float:left; width:12px; height:12px; background-color:#FFFF00; border:1px solid #000000;"></div>
							<div class="legend-text">Grid feed-in</div>
						    </td>
						</tr>
					    </table>
					</div>
                                    </div>
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

<!-- devices div -->
<div style="height: 1000px; width: 1000px; float: right">

<table width="975px">
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
                                                    <select id="select_year_year_d">
						    </select>
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

<?php
require "Modules/cossmiccontrol/Views/history_cg.php";
require "Modules/cossmiccontrol/Views/history_d.php";
?>