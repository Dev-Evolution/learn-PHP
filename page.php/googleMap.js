function initMap(){
    if(!navigator.geolocation){
        alert("votre navigateur ne gère pas la géolocalisation")
        return false;
    }
    var mapOptions = {
        zoom: 11,
        center: {lat: 48.416858, lng: -4.526928},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var maCarte = new google.maps.Map(document.getElementById("map"), mapOptions);
}