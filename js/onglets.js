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
    var divgra = document.querySelector("div#graph");
    
    divrel.className = "showed";
    divgra.className = "hidden";
}

function graf()
{
    var divrel = document.querySelector("div#releve");
    var divgra = document.querySelector("div#graph");
    
    divgra.className = "showed";
    divrel.className = "hidden";
}

window.addEventListener("load", init);
