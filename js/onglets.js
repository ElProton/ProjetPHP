/*
 * Initialize the vent listeners
 */
function init()
{
    var rel = document.getElementById("releves_onglet");
    var gra = document.getElementById("graph_onglet");
    
    rel.addEventListener("mousedown", relf);
    gra.addEventListener("mousedown", graf);
}

/*
 * Show the array with datas and hide graphs
 */
function relf()
{
    var divrel = document.querySelector("div#releve");
    var divgra = document.getElementById("graphs");
    
    divrel.className = "showed";
    divgra.className = "hidden";
}

/*
 * Show the graphs and hide array of datas
 */
function graf()
{
    var divrel = document.querySelector("div#releve");
    var divgra = document.getElementById("graphs");
    
    divrel.className = "hidden";
    divgra.className = "showed";
}

window.addEventListener("load", init);
