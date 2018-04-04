//map
let map, infoWindow;
let currentPosition;
import $ from 'jquery';


export default class Map {
  constructor(){
      this.currentPosition = 0;
      this.initMap();
  }

  initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 21
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            currentPosition = pos;

            $("#campLat").val(pos.lat);
            $("#campLong").val(pos.lng);

            console.log(currentPosition);

            infoWindow.setPosition(pos);
            infoWindow.setContent('Latitude:'+pos.lat+'\n'+'Longitude:'+pos.lng);
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
  }

  handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
                            'Error: The Geolocation service failed.' :
                            'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
  }

}
