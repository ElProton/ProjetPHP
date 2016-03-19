function init(){
    var graph = document.getElementById("graph");


    drawBackground(200,200);
    drawGraphTemperature(200,200);
}

function drawBackground(width, height)
{
    var deltaX = (width - 100)/30;
    var deltaY = (height -100)/40;
    var graph = document.getElementById("graph");
    graph.innerHTML = "<svg viewbox='-300,-300,640,640' xmlns='http://www.w3.org/2000/svg'>";
    graph.innerHTML = graph.innerHTML + "<line class ='axe' id='axeX' x1='0' y1='0' x2='"+ width +"' y2='0' style='fill:grey;stroke:#3BD200;stroke-width:1;'/>";
    graph.innerHTML = graph.innerHTML + "<line class='axe' id='axey' x1='0' y1='0' x2='0' y2='-200' style='fill:grey;stroke:#3BD200;stroke-width:1;'/>";
    var xCursor = deltaX/2;
    var yCursor = deltaY/2;
    for( var i = 0; i<=30 ; i++){
        graph.innerHTML = graph.innerHTML + "<g transform='translate("+ xCursor +",25)'>" +
            "<line class='marque' x1='0' y1='0' x2='0' y2='-3' style='fill:rgba(74, 41, 11, 0,6);stroke:#7d635b;stroke-width:1;'/>" +
            "<text x='0' y='-4' fill='black' style='font-size: "+ deltaX +" cm'>"+i+"</text> </g>";
        xCursor = xCursor + deltaX;
    }
    for (var i =0; i <= 8 ; i++){
        graph.innerHTML = graph.innerHTML + "<g transform='translate(-35,"+ -((yCursor - 5)*5) +")'>" +
            "<line class='marque' x1='35' y1='-5' x2='32' y2='-5' style='fill:rgba(74, 41, 11, 0,6);stroke:#7d635b;stroke-width:1;'/> " +
            "<text x='0' y='0' fill='blue' style='font-size: "+ deltaY +" cm'>"+ i +"</text> </g>";
        yCursor = yCursor + deltaY;
    }
}


function drawGraphTemperature(width, height){
    var deltaX = (width - 100)/30;
    var deltaY = (height -100)/40;
    var xCursor = 0;
    var graph = document.getElementById("graph");
    var tempMin = document.getElementsByClassName("tmin");
    var tempMax = document.getElementsByClassName("tmax");
    var cumul = document.getElementsByClassName("cumul");
    var len = tempMax.length;
    for(var i=0; i < len ; i++){
        graph.innerHTML = graph.innerHTML + "<g transform='translate(0,"+ xCursor +")'> " +
            " <rect class='valeurMax' width='10' height='"+ (parseInt(tempMax[i])*deltaY) +"' style='fill: rgba(0,0,0, 0); stroke:rgb(203, 26, 31); stroke-width:1;' />" +
                "<rect height='"+ (parseInt(tempMin[i])*deltaY) +"' width='10' style='fill: rgba(0,0,0,0); stroke : rgb(54, 28, 160); stroke-width: 1;' />" +
                "<rect height='"+(parseInt(cumul[i])*deltaY)+"' width='10' style='fill: rgb(10, 117, 177); stroke-opacity: 0;' /> </g>";
        xCursor = xCursor + deltaX;
    }
    graph.innerHTML = graph.innerHTML + "</svg>";
}

window.addEventListener("load", init);