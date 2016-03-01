
window.addEventListener("load", dessinerCarte);

function dessinerCarte() {
    var map = L.map('map-leaflet').setView([47, 3], 5);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '©️ <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    var l = document.querySelectorAll("#stations option");
    for(var i=0 ; i < l.length ; i++)
    {
        var nom = l[i].textContent;
        var insee = l[i].dataset.insee;
        var txt = nom + "<br/><button class='mapButton' value=\""+insee+"\">Choisir</button>";
        var marker = addMarker([l[i].dataset.lat, l[i].dataset.lon], map, txt);
        map.on("popupopen",iChooseYou);
        
    }
    
    
}

/**
  * Add a marker to the map m at the position (positionArray[0], positionArray[1]) 
  * 
  * @param positionArray An array with two elements: x position and y position
  * @param m The Leaflet map
  * @param txt A text to bind to the popup that appear when you click on a marker
  * @return A marker
  */
function addMarker(positionArray, m, txt)
{
    var marker = L.marker(positionArray).addTo(m)
    .bindPopup(txt);
    return marker;    
}

/**
 * Add an event listener of the popup button of the map.
 * 
 * @return None
 * 
 */
function iChooseYou(event)
{
    var noeudPopup = event.popup._contentNode;
    var bouton = noeudPopup.querySelector("button");
    bouton.addEventListener("click", modifieSelect);
}

/**
 * Change the selected station, this function is executed when the user click on the "Choose" button
 * of a map popup
 * 
 * @return None
 * 
 */
function modifieSelect(event)
{
    var query = "#stations option[data-insee='"+this.value+"']";
    var selectOptions = document.querySelectorAll(query);
    alert(query);
    selectOptions.selected = true;
}
