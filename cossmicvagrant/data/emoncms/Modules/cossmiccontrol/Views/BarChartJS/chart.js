var margin = {top: 20, right: 2, bottom: 30, left: 20},
	width = 350 - margin.left - margin.right,
	height = 270 - margin.top - margin.bottom;
	
var	barHeight = 20;

var x = d3.scale.ordinal()
	.rangeRoundBands([0, width], .1);
	
var y = d3.scale.linear()
	.range([height, 0]);
	
var xAxis = d3.svg.axis()
	.scale(x)
	.orient("bottom");
	
var yAxis = d3.svg.axis()
	.scale(y)
	.orient("left")
	.ticks(10, "kWh");
	
var chart = d3.select(".outerChart")
	.attr("width", width + margin.left + margin.right)
	.attr("height", height + margin.top + margin.bottom)
	.append("g")
	.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
	
d3.tsv("/emoncms/values.tsv", type, function(error, values){

	x.domain(values.map(function(d) {return d.name; }));
	y.domain([0, d3.max(values, function(d) {return d.value; })]);
	
	chart.append("g")
		.attr("class", "x axis")
		.attr("transform", "translate(0," + height + ")", "rotate(-90)")
		.call(xAxis);
		
	var bar = chart.selectAll(".bar")
		.data(values)
			.enter().append("rect")
		.attr("class", "bar")
		.attr("x", function(d) {
			console.log(x(d.name));
			return x(d.name); })
		.attr("width", x.rangeBand())
		.attr("y", function(d) {return y(d.value); })
		.attr("height", function(d) {return height - y(d.value); });

	chart.selectAll("bar")
		.data(values)
		.enter().append("text")
		.attr("x", function(d) {return x(d.name)+x.rangeBand()/2;})
     	.attr("y", function(d) {return y(d.value)+5;})
      	.attr("dy", ".75em")
      	.attr("text-anchor","middle")
      	.attr("fill","#1192d3")
      	.text(function(d) { return d.value; });
	
});
	
function type(d){
	d.value = +d.value;
	return d;
}