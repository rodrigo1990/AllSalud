
@inject('ciudadService', 'App\Services\CiudadService')
@extends('admin.layouts.principal')
@section('content')

		<?php 
			$i=0;//contador de instancias
			$latitudesJs= array();
			$longitudesJs= array();
	 	?>
	<form action="">
		<div id="content">
			<input type="hidden" value="{{$establecimiento->id}}">
			<br>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" value={{$establecimiento->nombre}}>
			<br>
			<label for="">Tipo</label>
			<input type="text" name="tipo" value={{$establecimiento->tipo->descripcion}}>
			<br><br>
			
			@foreach($establecimiento->domicilio as $domicilio)
				<?php  $i++;?> 
				<div id="locacion{{$i}}">
					<h1>Locacion {{$i}}</h1>
					<label for="Domicilio{{$i}}">Domicilio {{$i}} </label>
					<input class="domicilio" type="text" name="Domicilio{{$i}}" value="{{$domicilio->pivot->domicilio}}">
						
					<br>

					<label for="">provincia</label>
					<select name="" id="provincia-select{{$i}}" onchange="buscarCiudadSegunProvincia({{$i}},{{$domicilio->pivot->ciudad_id}})">
						<option value="0">Seleccione una provincia</option>
						@foreach($provincias as $provincia)
							@if($domicilio->provincia_id == $provincia->id)
								<option value="{{$provincia->id}}" selected>{{$provincia->provincia_nombre}}</option>
								<!-- CREO VARIABLE AUXILIAR DE PROVINCA PARA TOMAR LA PROVINCIA DEL ESTABLECIMIENTO -->
								<?php $provinciaId = $provincia->id ?>
							@endif
							
							<option value="{{$provincia->id}}">{{$provincia->provincia_nombre}}</option>
						@endforeach
					</select>
					<br>

					<label for="">ciudad</label>
					<select name="" id="localidad-select{{$i}}">
						<option value="0">Seleccione una ciudad</option>
						
						<!-- BUSCO LAS CIUDADES POR LA PROVINCIA DEL ESTABLECIMIENTO -->
						 <?php $ciudades = $ciudadService->getCiudadesPorProvincia($provinciaId) ?>

						@foreach($ciudades as $ciudad)
							@if($ciudad->id == $domicilio->id)
								<option value="{{$domicilio->id}}" selected>{{$domicilio->ciudad_nombre}}</option>
							@else
								<option value="{{$ciudad->id}}">{{$ciudad->ciudad_nombre}}</option>
							@endif

						@endforeach
					</select>
					<br>


					<label for="latitud1">Latitud</label>
					<input class="latitud-input" type="text" name="latitud{{$i}}" id="latitud{{$i}}" value="{{$domicilio->pivot->latitud}}">
					<br>
					<label for="longitud1">Longitud</label>
					<input type="text" name="longitud{{$i}}" id="longitud{{$i}}" value="{{$domicilio->pivot->longitud}}">
					<br>
					<div id="map-cont{{$i}}" style="width: 100%">
						 <input id="pac-input{{$i}}" class="controls" type="text" placeholder="Search Box">
					</div>
					<br><br>

					
					<?php $latitudesJs[$i]=$domicilio->pivot->latitud; ?>
					<?php $longitudesJs[$i]=$domicilio->pivot->longitud; ?>

					<a onClick="eliminarLocacion({{$domicilio->pivot->id}},{{$i}})">Eliminar</a>

				</div><!-- #locacion -->
			

			@endforeach
			<br>
			<a onClick="agregarLocacion()">Agregar</a>

		</div>
	</form>

	<br><br>
	


		

@stop
@section('scripts')

	   <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkne1gpPfJ0B3KrE4OQURwPi492LDjg8g&libraries=places">
    </script>
	<script>
		
		window.y = "{{$i}}";//instancia la cantidad de formularios de locaciones creados y controlara su creacion y eliminacion
		window.i="{{$i}}";//id que tendran los input de locacion y sus mapas
		window.markers = [];//array que tendra todos los marker de todos los mapas
		window.latitudes = <?php echo json_encode($latitudesJs) ?>;
		window.longitudes = <?php echo json_encode($longitudesJs) ?>;
		console.log(y);

		


		function inicializarMapas(){
			for (var mapa_id = 1; mapa_id <= i; mapa_id++) {
				//inicializo mapas usando el id dinamico window.i="{{$i}}" 
				//y las longitudes y latitudes dinamicas" 
			   initMap(mapa_id,parseInt(latitudes[mapa_id]),parseInt(longitudes[mapa_id]));
			}
		}


		function initMap(mapa_id,latitud,longitud) {

			$("#map-cont"+mapa_id+"").append("<div id='map"+mapa_id+"' style='height:350px'></div>")
		  	// La locacion iniciliada
		  	var locacion = {lat: latitud, lng: longitud};
		  	// El mapa centrado en las coordenadas de inicializacion
		  	var map = new google.maps.Map(
			      document.getElementById('map'+mapa_id+''), {zoom: 10, center: locacion});
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



	      function buscarCiudadSegunProvincia(id,ciudad){

			var provinciaId = $("#provincia-select"+id+"").val();

				$.ajax({
					headers: {
   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  					},
				data:{provinciaId},
				url:'/buscarCiudadSegunProvincia',
				type:'post',
				dataType:"json",
				success:function(data){
					$("#localidad-select"+id+"").empty();
						for(var i in data) {	

								$("#localidad-select"+id+"").append("<option value="+data[i].id+"> "+
									data[i].ciudad_nombre+"</option>");				
							}


						 $("#localidad-select"+id+" option[value='"+ciudad+"']").attr("selected", true);
						//$(' option[value="'+ciudad+'"]')
						 console.log(id);
						 console.log(ciudad);





				}
				});

		}


		function agregarLocacion(){
		y++;
		$("form #content").append('<div id="locacion'+y+'"><h1>Locacion '+y+'</h1><label for="Domicilio'+y+'">Domicilio '+y+' </label><input class="domicilio" type="text" name="Domicilio'+y+'" value=""><br><label for="">provincia</label><select name="" id="provincia-select'+y+'"onchange="buscarCiudadSegunProvincia('+y+')"><option value="0">Seleccione una provincia</option>@foreach($provincias as $provincia)<option value="{{$provincia->id}}">{{$provincia->provincia_nombre}}</option>@endforeach</select><br><label for="">ciudad</label><select name="" id="localidad-select'+y+'"><option value="0">Seleccione una ciudad</option></select><br><label for="">Latitud</label><input class="latitud-input" type="text" name="latitud'+y+'" id="latitud'+y+'" value=""><br><labelfor="longitud1">Longitud</label><input type="text" name="longitud'+y+'"id="longitud'+y+'" value=""><br><div id="map-cont'+y+'" style="width: 100%"><input id="pac-input'+y+'" class="controls" type="text" placeholder="Search Box"></div><br><br><a onClick="eliminarLocacion(null,'+y+')">Eliminar</a></div><!-- #locacion -->');


		//coordenadas C.A.B.A
		var latitud = -34.607304; 

		var longitud = -58.427812;

		//instancio un mapa asignandolo al div de locacion
		initMap(y,latitud,longitud);





		console.log(y);
	}

		//id_locacion lo usaremos para borrar la locacion de la base de datos
		function eliminarLocacion(id_locacion,mapa_id){
		$("#locacion"+mapa_id+"").remove();

		

		console.log(y);
	}




	</script>
	<script>
		
			$( document ).ready(function() {
			  inicializarMapas();
			});
	</script>


@stop





