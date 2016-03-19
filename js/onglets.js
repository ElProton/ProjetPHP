function init()
{
    var rel = document.getElementById("releves_onglet");
    var gra = document.getElementById("graph_onglet");
    
    rel.addEventListener("mousedown", relf);
    gra.addEventListener("mousedown", graf);
}

function relf()
{
    var divrel = document.querySelector("div#releve");
    var divgra = document.getElementsByClassName("graph");
    
    divrel.className = "showed";
    
    for(var i = 0 ; i < divgra.length ; i++)
		divgra[i].className = "graph hidden";
}

function graf()
{
	console.log("graf");
    var divrel = document.querySelector("div#releve");
    var divgra = document.getElementsByClassName("graph");
    console.log(divgra.length);
    
    divrel.className = "hidden";
    
    for(var i = 0 ; i < divgra.length ; i++)
    {
		divgra[i].className = "showed";
		console.log(i);
	}
}

window.addEventListener("load", init);
