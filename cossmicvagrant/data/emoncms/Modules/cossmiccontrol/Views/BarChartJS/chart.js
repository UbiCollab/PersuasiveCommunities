var chart;
var y;
var x;
var height;
var bartextArray;
function treechart(data){
	//console.log(data)
	var bartext0 = data[0];
	//console.log("bartext0: "+bartext0[2]);
	var bartext1 = data[1];
	//console.log("bartext1: "+bartext1[2]);
	var bartext2 = data[2];
	//console.log("bartext2: "+bartext2[2]);
	var bartext3 = data[3];
	//console.log("bartext3: "+bartext3[2]);
	
	bartextArray = [bartext0[2],bartext1[2],bartext2[2],bartext3[2]];
	var values = data;
	var margin = {top: 20, right: 2, bottom: 30, left: 20},
		width = 350 - margin.left - margin.right;
		height = 270 - margin.top - margin.bottom;

	x = d3.scale.ordinal()
		.rangeRoundBands([0, width], .1);
		
	y = d3.scale.linear()
		.range([height, 0]);
		
	var xAxis = d3.svg.axis()
		.scale(x)
		.ticks(0)
		.orient("bottom");
		
	var yAxis = d3.svg.axis()
		.scale(y)
		.orient("left")
		.ticks(10, "kWh");
		
	chart = d3.select(".outerChart")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
		.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
		
	//d3.tsv("/emoncms/values.tsv", type, function(error, values){

	x.domain(data.map(function(d) {return d[0]; }));
	y.domain([0, 100]);
	
	var tooltip = d3.select('body').append('div')
		.attr("id","tooltip")
		.style('position','absolute') //To allow d3 to follow the position absolute to the relationship to the page
		.style('padding','0 10px') //To do padding on the toop tip. 0 on the top and bottom and 10px on each side
		.style('background','white')
		.style('opacity',0) // 0 as we don't want to show when the graphic first loads up

	//adding text from values that has been passed to xAxis
	chart.append("g")
		.attr("class", "x axis")
		.attr("transform", "translate(0," + height + ")", "rotate(-90)")
		.attr("fill","#fff")
		.call(xAxis);
	var counter = 0;	
	
	var bar = chart.selectAll(".bar")
		.data(data)
			.enter().append("rect")
		.attr("class", "bar")
		.attr("id", function(d, i){ 
			return "bar"+i})
		.attr("x", function(d) { return x(d[0]); })
		.attr("width", x.rangeBand())
		.attr("title", function(d,i){
			return bartextArray[i]})
		.attr("y", function(d) {return y(d[1]); })
		.attr("height", function(d) {return height - y(d[1]); })
		.on({
			"click": function(d, i){

				doLol(i)}
		})
		.on({
			"mouseover": function(d,i){
			doLol();
			
			/*tooltip.transition()
				.style('opacity',.9)
 	
			tooltip.html(d)
				.style('left',(d3.event.pageX - 25)+ 'px') //position of the tooltip
				.style('top',(d3.event.pageY + 20) + 'px')*/
			//show tooltip on mouseover
			
			
			d3.select(this)
				.style("fill","#045B85")
			}
		})
		.on({
			"mouseout": function(d){
				//hide tooltip when mouseout
				//tooltip.transition()
				//.style('opacity',0)
				
				d3.select("#cossmicforestbarchart").style("background", "#1192d3")
				//reset color
				d3.select(this)
				.style("fill","#fff")
			}			
		});

	bartext = chart.selectAll("bar")
		.data(data)
		.enter().append("text")
		.attr("class", "bartext")
		.attr("x", function(d) {return x(d[0])+x.rangeBand()/2;})
     	.attr("y", function(d) {
     		if(d[1] == 0){
     			chart.attr("fill","#fff");
				return y(d[1])-15;
			}
     		return y(d[1])+5;})
      	.attr("dy", ".75em")
      	.attr("text-anchor","middle")
      	.attr("fill",function(d){
      		return d[1] ==0?"#fff":"#1192d3";})
      	.text(function(d) { return d[1]; });

      	
}

function updateTreeChart(data){

	console.log(data)
	var bartext0 = data[0];
	console.log("bartext0: "+bartext0[2]);
	var bartext1 = data[1];
	console.log("bartext1: "+bartext1[2]);
	var bartext2 = data[2];
	console.log("bartext2: "+bartext2[2]);
	var bartext3 = data[3];
	console.log("bartext3: "+bartext3[2]);
	
	var bartextArray = [bartext0[2],bartext1[2],bartext2[2],bartext3[2]];

	//transition on the bars
	chart.selectAll(".bar")
		.data(data)
		.transition()
			.duration(1000)
			.attr("y", function(d) {return y(d[1]); })
			.attr("height", function(d) {return height - y(d[1]); });

	
	//transition on the barlabels
	chart.selectAll("text.bartext")
		.data(data)
		.transition()
			.duration(1000)
			.attr("x", function(d) {return x(d[0])+x.rangeBand()/2;})
     		.attr("y", function(d) {
     			if(d[1] == 0){
     				chart.attr("fill","#fff");
					return y(d[1])-15;}
     			return y(d[1])+5;})
     		.attr("title", function(d,i){
				
				$("#bar"+i).data("powertip", function(){
					return bartextArray[i];
				});

				return bartextArray[i]})
	      	.attr("dy", ".75em")
	      	.attr("text-anchor","middle")
	      	.attr("fill",function(d){
	      		return d[1] ==0?"#fff":"#1192d3";})
	      	.text(function(d) { return d[1]; });	

	chart.selectAll("text.bartext")
		.data(data)
			.attr("title", function(d,i){
				return bartextArray[i]});		
}

function type(d){
	d[1] = +d[1];
	return d;
}

function addTooltips(){


	$("#bar0").powerTip({
                placement: "s",
                mouseOnToPopup:true
            });
	$("#bar1").powerTip({
           	    placement: "s",
                mouseOnToPopup:true
            });
	$("#bar2").powerTip({
                placement: "s",
                mouseOnToPopup:true
            });
	$("#bar3").powerTip({
                placement: "s",
                mouseOnToPopup:true
            });
	$("#bar4").powerTip({
                placement: "s",
                mouseOnToPopup:true
            });
}

//OnClick and hover events for the different bars
function doLol(){

	

	//var className = $("#bar"+i).attr("class");
	//console.log(className);
	
	/*$("rect#bar"+i).data('powertipjq', $(["LOL"].join('\n')));

	$("#bar"+i).powerTip({
		placement: "e",
		mouseOnToPopup:true
	});*/
	
}
