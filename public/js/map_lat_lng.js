      function initMap() {

        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder);
        });
      }
      function geocodeAddress(geocoder) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
		      console.log(results[0].geometry.location.lat());
			  console.log(results[0].geometry.location.lng());
        $("#latitude").val(results[0].geometry.location.lat());
        $("#longitude").val(results[0].geometry.location.lng());
            //resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              //map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }