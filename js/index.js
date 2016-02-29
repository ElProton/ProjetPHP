
window.addEventListener("load", dessinerCarte);

function dessinerCarte() {
    var map = L.map('map-leaflet').setView([50.6, 3.13], 16);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '©️ <a href="http://osm.org/copyright">OpenStreetMap>/a> contributors'
    }).addTo(map);
    var marker = L.marker([50.609614, 3.136635]).addTo(map)
        .bindPopup('Le bâtiment M5 <p>Formations en Informatique</p> ...');
}
