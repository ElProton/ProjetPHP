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
    var divgra = document.getElementById("graphs");
    
    divrel.className = "showed";
    divgra.className = "hidden";
}

function graf()
{
	console.log("graf");
    var divrel = document.querySelector("div#releve");
    var divgra = document.getElementById("graphs");
    
    divrel.className = "hidden";
    divgra.className = "showed";
}

window.addEventListener("load", init);
