 var Location_info = {
    latitude:1.351609,
    longitude:103.899516
	};
	var distance_id = {id:""};
	
	$(function(){
		$(".badge").click(function(){
			console.log($("#"+this.id).attr("lati"));
			distance_id.id = this.id;
			Location_info.latitude = $("#"+this.id).attr("lati");
			Location_info.longitude = $("#"+this.id).attr("long");
			initMap(Location_info);
		})
	});
	  console.log(Location_info.latitude)
	  function initMap(Location_info) {
	  console.log(Location_info);
	    var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('maps'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
		
        var infoWindow = new google.maps.InfoWindow({map: map});
		directionsDisplay.setMap(map);
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
			console.log(pos.lat+" "+pos.lng);
			
			    calculateAndDisplayRoute(directionsService, directionsDisplay,pos,Location_info);
				document.getElementById('mode').addEventListener('change', function() {
				calculateAndDisplayRoute(directionsService, directionsDisplay ,pos,Location_info);
				});
		
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
	  
	   function calculateAndDisplayRoute(directionsService, directionsDisplay,pos,Location_info) {
	  
        var selectedMode = document.getElementById('mode').value;

		var end = new google.maps.LatLng(Location_info.latitude, Location_info.longitude);
	
		 console.log(Location_info);
        directionsService.route({
          origin: {lat: pos.lat, lng: pos.lng},  // Haight.
          destination: end,  // Ocean Beach.
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode[selectedMode]
		  //var p1 = new google.maps.LatLng(pos.lat, pos.lng);
		  //var p2 = new google.maps.LatLng(1.351609, 103.899516);
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
			//window.alert(calcDistance(new google.maps.LatLng(pos.lat, pos.lng), new google.maps.LatLng(Location_info.latitude, Location_info.longitude))+distance_id.id+"km");
			$("#distance_"+distance_id.id).text(calcDistance(new google.maps.LatLng(pos.lat, pos.lng), new google.maps.LatLng(Location_info.latitude, Location_info.longitude)) +"km");
			$("#distance_"+distance_id.id).show();
			
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
	  
	  function calcDistance(p1, p2) {
	  
		return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
	}