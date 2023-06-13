
var map = L.map('map').setView([13.722278, -89.720081], 13);
let marker = null;

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

function onMapClick(e) {
    $('#coordenadas').val(`${e.latlng.lat}, ${e.latlng.lng}`);
    if(marker != null){
        map.removeLayer(marker);
    }
    marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map)
}

map.on('click', onMapClick);


function TipoEntrega(tipo){

    $('#entrega input').prop('required', true);
    $('#recoger input').prop('required', true);

    if(tipo == 1){
        $('#btn1').addClass('main-color');
        $('#btn1').removeClass('border-black');

        $('#btn2').removeClass('main-color');
        $('#btn2').addClass('border-black');

        $('.recoger-item').removeClass('d-none');
        $('.envio-item').addClass('d-none');
        $('#entrega input').prop('required', false);

    }else{
        $('#btn2').addClass('main-color');
        $('#btn2').removeClass('border-black');

        $('#btn1').removeClass('main-color');
        $('#btn1').addClass('border-black');

        $('.envio-item').removeClass('d-none');
        $('.recoger-item').addClass('d-none');
        $('#recoger input').prop('required', false);
    }
}
