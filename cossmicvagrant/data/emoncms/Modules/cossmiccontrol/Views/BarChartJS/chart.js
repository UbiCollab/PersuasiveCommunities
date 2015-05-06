function treechart(data){
	
	console.log(data);


	var values = data;
	var margin = {top: 20, right: 2, bottom: 30, left: 20},
		width = 350 - margin.left - margin.right,
		height = 270 - margin.top - margin.bottom;

	var x = d3.scale.ordinal()
		.rangeRoundBands([0, width], .1);
		
	var y = d3.scale.linear()
		.range([height, 0]);
		
	var xAxis = d3.svg.axis()
		.scale(x)
		.ticks(0)
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
		
	//d3.tsv("/emoncms/values.tsv", type, function(error, values){

	x.domain(data.map(function(d) {return d[0]; }));
	y.domain([0, 100]);

	//x.domain(values.map(function(d) {return d.name; }));
	//y.domain([0, d3.max(values, function(d) {return d.value; })]);
	
	//adding text from values that has been passed to xAxis
	chart.append("g")
		.attr("class", "x axis")
		.attr("transform", "translate(0," + height + ")", "rotate(-90)")
		.attr("fill","#fff")
		.call(xAxis);
		
	var bar = chart.selectAll(".bar")
		.data(data)
			.enter().append("rect")
		.attr("class", "bar")
		.attr("x", function(d) {
			console.log(x(d[0]));
			return x(d[0]); })
		.attr("width", x.rangeBand())
		.attr("y", function(d) {return y(d[1]); })
		.attr("height", function(d) {return height - y(d[1]); });

	chart.selectAll("bar")
		.data(data)
		.enter().append("text")
		.attr("x", function(d) {return x(d[0])+x.rangeBand()/2;})
     	.attr("y", function(d) {return y(d[1])+5;})
      	.attr("dy", ".75em")
      	.attr("text-anchor","middle")
      	.attr("fill","#1192d3")
      	.text(function(d) { return d[1]; });

}	
function type(d){
	d[1] = +d[1];
	return d;
}