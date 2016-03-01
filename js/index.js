
window.addEventListener("load", dessinerCarte);

function dessinerCarte() {
    var map = L.map('map-leaflet').setView([47, 3], 5);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '©️ <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
   
    
    // Check for the various File API support.
    if (window.File && window.FileReader && window.FileList && window.Blob) {
      //do your stuff!
    } else {
      alert('The File APIs are not fully supported by your browser.');
    }    
    
    var marker = addMarker([50.609614, 3.136635], map);
    
    
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
    var marker = L.marker([50.609614, 3.136635]).addTo(m);
    return marker;    
}
