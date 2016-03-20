function init(){
    draw();
}

function draw()
{
	var graphs = document.querySelectorAll("svg");
	console.log(graphs.length);
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
}

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


function drawGraphTemperatureMin(){
    var tmin = document.getElementsByClassName("tmin");
    var height = parseInt(window.getComputedStyle(document.getElementById("graphtmin")).height, 10)-10;
    for(var d = 0; d < tmin.length ; d++)
    {
		var t = parseFloat(tmin[d].textContent.trim())*3;
		createRect("graphtmin", d*12, (height/2), 11, -(parseFloat(tmin[d].textContent.trim())*3), "", "rectMin", "");
	}
}

function drawGraphTemperatureMax(){
    var tmin = document.getElementsByClassName("tmax");
    var height = parseInt(window.getComputedStyle(document.getElementById("graphtmax")).height, 10)-10;
    
    for(var d = 0; d < tmin.length ; d++)
    {
		var t = parseFloat(tmin[d].textContent.trim())*3;
		createRect("graphtmax", d*12, (height/2) - Math.abs(t) , 11, Math.abs(t), "", "rectMax", "");
	}
}


window.addEventListener("load", init);
