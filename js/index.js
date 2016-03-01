
window.addEventListener("load", dessinerCarte);

function dessinerCarte() {
    var map = L.map('map-leaflet').setView([47, 3], 5);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '©️ <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    var l = document.querySelectorAll("#stations option");
    console.log("Ok");
    for(var i=0 ; i < l.length ; i++)
    {
        console.log("Ok");
        var nom = l[i].textContent;
        var insee = l[i].dataset.insee;
        
        addMarker([l[i].dataset.lon, l[i].dataset.lat], map);
    }
    
    
}

/**
  * Add a marker to the map m at the position (positionArray[0], positionArray[1]) 
  * 
  * @param positionArray An array with two elements: x position and y position
  * @param m The Leaflet map
  * @return A marker
  */
function addMarker(positionArray, m)
{
    var marker = L.marker(positionArray).addTo(m);
    return marker;    
}
