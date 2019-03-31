
@inject('ciudadService', 'App\Services\CiudadService')
@extends('admin.layouts.principal')
@section('content')

		<?php 
			$i=0;
	 	?>

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
		<label for="Domicilio{{$i}}">Domicilio {{$i}} </label>
		<input class="domicilio" type="text" name="Domicilio{{$i}}" value="{{$domicilio->pivot->domicilio}}">
			<a onClick="eliminarDomicilio({{$domicilio->pivot->id}})">Eliminar</a>
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
		<input type="text" name="longitud{{$i}}" id="longitud{{$i}}" value="{{$domicilio->pivot->latitud}}">
		<br>
		<div id="map-cont{{$i}}" style="width: 100%"></div>
		<br><br>




	@endforeach

	


	<br><br>
	
	{{$establecimiento}}

	

@stop
@section('scripts')

	   <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkne1gpPfJ0B3KrE4OQURwPi492LDjg8g&libraries=places">
    </script>
	<script>

		window.i="{{$i}}";//id que tendran los input de locacion y sus mapas
		window.markers = [];//array que tendra todos los marker de todos los mapas

		


		function inicializarMapas(){
			for (var mapa_id = 1; mapa_id <= i; mapa_id++) {
				//inicializo mapas usando el id dinamico window.i="{{$i}}" 
			   initMap(mapa_id);
			}
		}


		function initMap(mapa_id) {

			$("#map-cont"+mapa_id+"").append("<div id='map"+mapa_id+"' style='height:350px'></div>")
		  	// The location of Uluru
		  	var uluru = {lat: -25.344, lng: 131.036};
		  	// The map, centered at Uluru
		  	var map = new google.maps.Map(
			      document.getElementById('map'+mapa_id+''), {zoom: 4, center: uluru});
		  	// The marker, positioned at Uluru
		  	var marker = new google.maps.Marker({position: uluru, map: map});

		  	//seteo un id a cada mapa usando el id dinamico window.i="{{$i}}" 
			map.set("id", mapa_id);


  			//evento para elegir lugares
	 		google.maps.event.addListener(map, 'click', function(event) {
	    		placeMarker(map,event.latLng);
		  	});
			
			}//function init maps 


			//tomo las coordenadas de cada posicion de cada mapa
			function getCoordinates(map){
				alert(map.getCenter().lat());
	      	  	alert(map.getCenter().lng());
			}

			//funcion para fijar marcadores
		  	function placeMarker(map,location) {
		  		 
		  		 
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
				getCoordinates(map);

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



	</script>
	<script>
		
			$( document ).ready(function() {
			  inicializarMapas();
			});
	</script>


@stop





