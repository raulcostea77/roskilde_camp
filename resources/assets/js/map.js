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
    console.log('save:'+savedCampLat);
    console.log('save:'+savedCampLong);
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 55.616770, lng: 12.076731},
          zoom: 21
        });
        infoWindow = new google.maps.InfoWindow;

        var marker = new google.maps.Marker({
          map: map,
          // Define the place with a location, and a query string.
          place: {
            location: {lat: parseFloat(savedCampLat), lng: parseFloat(savedCampLong)},
            query: 'Camp LD, Roskilde, Denmark'

          },
          // Attributions help users find your site again.
          attribution: {
            source: 'Google Maps JavaScript API',
            webUrl: 'https://developers.google.com/maps/'
          }
        });

        // Construct a new InfoWindow.
        var infoWindow = new google.maps.InfoWindow({
          content: 'Camp LD, Roskilde'
        });

        var myposition = new google.maps.InfoWindow;

        // Opens the InfoWindow when marker is clicked.
        marker.addListener('click', function() {
          infoWindow.open(map, marker);
        });

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

            myposition.setPosition(pos);
            myposition.setContent('Here');
            myposition.open(map);
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
