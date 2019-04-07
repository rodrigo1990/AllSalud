
		console.log(y);

		


		function inicializarMapas(){
			for (var mapa_id = 1; mapa_id <= i; mapa_id++) {
				//inicializo mapas usando el id dinamico window.i="{{$i}}" 
				//y las longitudes y latitudes dinamicas" 
			   initMap(mapa_id,parseFloat(latitudes[mapa_id]),parseFloat(longitudes[mapa_id]));
			}
		}


		function initMap(mapa_id,latitud,longitud) {

			$("#map-cont"+mapa_id+"").append("<div id='map"+mapa_id+"' style='height:350px'></div>")
		  	// La locacion iniciliada
		  	var locacion = {lat: latitud, lng: longitud};
		  	// El mapa centrado en las coordenadas de inicializacion
		  	var map = new google.maps.Map(
			      document.getElementById('map'+mapa_id+''), {

			      	zoom: 10,
		      	 	center: locacion,
		      	 	streetViewControl:false,
		      	 	mapTypeControl:false


			      });
		  	// The marker, positioned at Uluru
		  	var marker = new google.maps.Marker({position: locacion, map: map});

		  	//seteo un id a cada mapa usando el id dinamico window.i="{{$i}}" 
			map.set("id", mapa_id);


			//establezco un id al marker, este sera el id del mapa pasado como parametro
	  		marker.set("id", map.get("id"));


			//agrego un nuevo marquer a su mapa correspondiente con su id
			markers.push(marker);



  			//evento para elegir lugares
	 		google.maps.event.addListener(map, 'click', function(event) {
	    		placeMarker(map,event.latLng,mapa_id);
		  	});

		  	/******************CREACION DE INPUT PARA BUSCAR LUGARES***************************/
		 // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input'+mapa_id+'');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });



		


		 // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
         deleteMarkers(mapa_id);

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
             placeMarker(map,place.geometry.location,mapa_id)

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }

            getCoordinates(map,mapa_id);

          });
          map.fitBounds(bounds);
        });
			getCoordinates(map,mapa_id);
			}//function init maps 


			//tomo las coordenadas de cada posicion de cada mapa
			function getCoordinates(map,mapa_id){
				$("#latitud"+mapa_id+"").val(map.getCenter().lat());
				$("#longitud"+mapa_id+"").val(map.getCenter().lng());
				/*alert();
	      	  	alert();*/
			}

			//funcion para fijar marcadores
		  	function placeMarker(map,location,mapa_id) {
		  		 
		  		 
		  		//creo un nuevo marker 	
				var marker = new google.maps.Marker({
				  position: location, //posicion del marker pasado como parametro 
				  map: map // ese marker tendra el mapa pasado como parametro
				});


				//establezco un id al marker, este sera el id del mapa pasado como parametro
		  		marker.set("id", map.get("id"));
				
		  		//centrar el mapa en la posicion
				map.setCenter(location);

				//tomo las coordenadas del mapa
				getCoordinates(map,mapa_id);

				//borro todos los marker con x id (que seran los marker del mapa x)
				deleteMarkers(marker.get("id"));

				//agrego un nuevo marquer a su mapa correspondiente con su id
				markers.push(marker);

				  

			}




	      // Deletes all markers in the array by removing references to them.
	      function deleteMarkers(id) {

	      	//recorro el array markers el cual tendra todos los markers de todos los mapas
	        for (var i = 0; i <markers.length; i++) {

	        	//busco los marker a eliminar
				if(markers[i]['id']==id){
					markers[i].setMap(null);
				}

				console.log(markers);

	        }//for
	        
	      }//function delete marker



	
