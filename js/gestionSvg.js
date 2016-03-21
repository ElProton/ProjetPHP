function init(){
    draw();
}

/**
 * Draw all the elements for the three graphs
 */
function draw()
{
	var graphs = document.querySelectorAll("svg");
	for(var i = 0 ; i < graphs.length ; i++)
	{
		var graph = graphs[i];
		
		var width = parseInt(window.getComputedStyle(graph).width, 10)-10;
		var height = parseInt(window.getComputedStyle(graph).height, 10)-10;
		
		createLine(graphs[i].id, 10, height/2, width, height/2, "axe", "axeX");
		
		for(var j = 1 ; j < 32 ; j++)
		{
			createLine(graphs[i].id, (j+1)*12, (height/2)-5, (j+1)*12, (height/2)+5, "axe", ""+j+graphs[i].id);
		}
		
	}
	drawGraphTemperatureMin();
	drawGraphTemperatureMax();
	drawGraphCumul();
}

/**
 * Create a line
 * @param svgID the id of the svg block
 * @param x1 the first x's coordinates
 * @param y1 the first y's coordinates
 * @param x2 the second x's coordinates
 * @param y2 the second y's coordinates
 * @param className the class name of the line
 * @param ID a id for the line
 */
function createLine(svgID, x1, y1, x2, y2, className, ID)
{
	var svg = document.getElementById(svgID)
	
	var line = document.createElementNS("http://www.w3.org/2000/svg", "line");
	line.setAttribute("x1", x1.toString());
	line.setAttribute("y1", y1.toString());
	line.setAttribute("x2", x2.toString());
	line.setAttribute("y2", y2.toString());
	line.setAttribute("class", className);
	line.setAttribute("id", ID);
	
	svg.appendChild(line);
	
}

/**
 * Create a square
 * @param svgID the id of the svg block
 * @param x the x coordinate
 * @param y the y coordinate
 * @param width the width
 * @param height the height
 * @param transform a transform attribute
 * @param className the class for the square
 * @param ID the ID for the square
 */
function createRect(svgID, x, y, width, height, transform, className, ID)
{
	var svg = document.getElementById(svgID)
	
	var line = document.createElementNS("http://www.w3.org/2000/svg", "rect");
	line.setAttribute("x", x.toString());
	line.setAttribute("y", y.toString());
	line.setAttribute("width", width);
	line.setAttribute("height", height.toString());
	line.setAttribute("transform", transform);
	line.setAttribute("class", className);
	line.setAttribute("id", ID);
	
	svg.appendChild(line);	
}

/**
 * Draw the graph to the max temperature
 */
function drawGraphTemperatureMin(){
    var tmin = document.getElementsByClassName("tmin");
    var height = parseInt(window.getComputedStyle(document.getElementById("graphtmin")).height, 10)-10;
    for(var d = 0; d < tmin.length ; d++)
    {
		var t = parseFloat(tmin[d].textContent.trim())*3;
		if (t< 0) {
			createRect("graphtmin", d * 12, (height / 2), 11, Math.abs(t), "", "rectMin", "");
		}
		else{
			createRect("graphtmin", d * 12, (height / 2) - Math.abs(t), 11, Math.abs(t), "", "rectMin", "");
		}
	}
}

/**
 * Draw the graph to the min temperature
 */
function drawGraphTemperatureMax(){
    var tmin = document.getElementsByClassName("tmax");
    var height = parseInt(window.getComputedStyle(document.getElementById("graphtmax")).height, 10)-10;
    
    for(var d = 0; d < tmin.length ; d++)
    {
		var t = parseFloat(tmin[d].textContent.trim())*3;
		if (t< 0) {
			createRect("graphtmax", d * 12, (height / 2), 11, Math.abs(t), "", "rectMax", "");
		}
		else{
			createRect("graphtmax", d * 12, (height / 2) - Math.abs(t), 11, Math.abs(t), "", "rectMax", "");
		}
	}
}

/**
 * Draw the graph to the precipitation
 */
function drawGraphCumul(){
	var cumul = document.getElementsByClassName("cumul");
	var height = parseInt(window.getComputedStyle(document.getElementById("graphcumul")).height, 10)-10;
	for(var d = 0; d < cumul.length ; d++)
	{
		var t = parseFloat(cumul[d].textContent.trim())*3;
		createRect("graphcumul", d * 12, ((height / 2) - Math.abs(t))*10, 11, Math.abs(t), "", "rectcumul", "");

	}
}

window.addEventListener("load", init);
