function drawBackground(width, height)
{
    var deltaX = (width - 100)/30;
    var deltaY = (height -100)/40;
    var graph = document.getElementById("graph");
    graph.innerHTML = "<line class ='axe' id='axeX' x1='0' y1='0' x2='"+ width +"' y2='0' style='fill:rgba(74, 41, 11, 1);fill-opacity:0.6;stroke:#3BD200;stroke-width:1;'/>";
    graph.innerHTML = "<line class='axe' id='axey' x1='0' y1='0' x2='0' y2='-"+ height +"' style='fill:rgba(74, 41, 11, 1);fill-opacity:0.6;stroke:#3BD200;stroke-width:1;'/>";
    var xCursor = deltaX/2;
    var yCursor = deltaY/2;
    for( var i = 0; i<=30 ; i++){
        graph.innerHTML = "<g transform='translate("+ xCursor +",25)'> /" +
            "<line class='marque' x1='0' y1='0' x2='0' y2='-3' style='stroke-width:1;'/>: /" +
            "<text x='0' y='-4' fill='black' style='font-size: "+ deltaX +" cm'>"+i+"</text> </g>";
            xCursor = xCursor + deltaX;
    }
    for (var i=0; i <= 40 ; i++){
        graph.innerHTML = "<g transform='translate(-35,"+ (yCursor - 5) +")'>/" +
        "<line class='marque' x1='35' y1='-5' x2='32' y2='-5' style='fill:rgba(74, 41, 11, 1);fill-opacity:0.6;stroke:#7d635b;stroke-width:1;'/>: /" +
        "<text x='0' y='0' fill='blue' style='font-size: "+ deltaY +" cm'>"+ i +"</text> </g>"
    }
}


function drawGraphTemperature(width, height){
    var deltaX = (width - 100)/30;
    var deltaY = (height -100)/40;
    var xCursor = 0;
    var yCursor = 0;

}

