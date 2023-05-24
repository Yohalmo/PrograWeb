
var map = L.map('map').setView([13.722278, -89.720081], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

function onMapClick(e) {
    $('#coordenadas').val(`${e.latlng.lat}, ${e.latlng.lng}`);
}

map.on('click', onMapClick);
