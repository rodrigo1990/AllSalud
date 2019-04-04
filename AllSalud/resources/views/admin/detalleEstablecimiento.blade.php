
@inject('ciudadService', 'App\Services\CiudadService')
@extends('admin.layouts.principal')
@section('content')

		<?php 
			$i=0;//contador de instancias de formulario de locaciones
			$latitudesJs= array();
			$longitudesJs= array();
	 	?>
	 		<!-- CONFIRM -->
		 <div class="confirm-alert-bk" id="confirm" style="display:none">
		    <div class="panel" >
		        <h2></h2>
		        <div class="row">
		        	<div class="col-lg-6 col-md-6 col-sm-6"><a id="btnYes" class="form-btn"><h2>SI</h2></a></div>
		        	<div class="col-lg-6 col-md-6 col-sm-6"><a id="btnNo" class="form-btn"><h2>NO</h2></a></div>
		        </div>
		    </div>
		</div>
		<!-- ALERT -->
		 <div class="confirm-alert-bk" id="alert" style="display:none">
		    <div class="panel" >
		        <h2></h2>
		        <div class="row">
		        	<a id="btnAccept" class="form-btn center-block"><h2>ACEPTAR</h2></a>
		        </div>
		    </div>
		</div>

	 <div class=" container animated fadeInLeft">
	 




		<form action="/admin/updateEstablecimiento" method="POST">
			@csrf
			<input type="hidden" name="id" value="{{$establecimiento->id}}">
			<div id="content">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<label for="nombre">Nombre</label>
						<br>
						<input type="text" name="nombre" class="form-control" value={{$establecimiento->nombre}}>		
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<label for="">Tipo</label>
						<select name="tipo_id" id="tipo" class="form-control">
							@foreach($tipos as $tipo)
								@if($tipo->id == $establecimiento->tipo->id )
									<option value="{{$establecimiento->tipo->id}}" selected>{{$establecimiento->tipo->descripcion}}</option>
								@else
									<option value="{{$tipo->id}}" >{{$tipo->descripcion}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
								
				@foreach($establecimiento->domicilio as $domicilio)
					<?php  $i++;?> 
				
					<div class="locacion" id="locacion{{$i}}">
					  	<input type="hidden" name="establecimientos[establecimiento{{$i}}][establecimiento_ciudad_id]" value="{{$domicilio->pivot->id}}">
						
						<h1>Locacion</h1>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12	">
								<label for="Domicilio{{$i}}">Domicilio {{$i}} </label>
								<input class="domicilio form-control" type="text" name="establecimientos[establecimiento{{$i}}][domicilio]" id="Domicilio{{$i}}" value="{{$domicilio->pivot->domicilio}}">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6	">
								<label for="">provincia</label>
								<br>
								<select class="form-control" name="" id="provincia-select{{$i}}" onchange="buscarCiudadSegunProvincia({{$i}})">
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
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<label for="">ciudad</label>
								<br>
								<select class="form-control" name="establecimientos[establecimiento{{$i}}][ciudad]" id="localidad-select{{$i}}">
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
							</div>
						</div>

							

						<!--  <label for="latitud1">Latitud</label>-->
						<input class="latitud-input" type="hidden" name="establecimientos[establecimiento{{$i}}][latitud]" id="latitud{{$i}}" value="{{$domicilio->pivot->latitud}}">
						<br>
						<!--  <label for="longitud1">Longitud</label>-->
						<input type="hidden" name="establecimientos[establecimiento{{$i}}][longitud]" id="longitud{{$i}}" value="{{$domicilio->pivot->longitud}}">
						<br>
						<div id="map-cont{{$i}}" style="width: 100%">
							 <input id="pac-input{{$i}}" class="gm-search-input controls" type="text" placeholder="Establece la direccion en el mapa..">
						</div>

						
						<?php $latitudesJs[$i]=$domicilio->pivot->latitud; ?>
						<?php $longitudesJs[$i]=$domicilio->pivot->longitud; ?>

						 <a onClick="eliminarLocacion({{$domicilio->pivot->id}},{{$i}})" class="full-btn remove-locacion-btn"><i class="fas fa-ban"></i></a>

					</div><!-- #locacion -->
				

				@endforeach
				</div>


					<div class="row" id="buttons">
						

						<div class="col-lg-12 col-md-12 col-sm-12">
							<a class="full-btn add-locacion-btn" onClick="agregarLocacion()"><i class="fas fa-home"></i></a>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<a onClick="formSubmit()" class="full-btn save-locacion-btn"><i class="far fa-save"></i></a>
						</div>	

						<div class="col-lg-12 col-md-12 col-sm-12">
							<a class="full-btn remove-establecimiento-btn" onClick="eliminarEstablecimiento({{$establecimiento->id}})"><i class="fas fa-trash-alt"></i></a>	
						</div>	

						
					</div>

			
		</form>
	</div>

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
    </script>
    <script src="/js/buscarCiudadSegunProvincia.js"></script>
    <script src="/js/mainDetalleEstablecimiento.js"></script>
	<script src="/js/eliminarEstablecimiento.js"></script>
	<script src="/js/eliminarLocacion.js"></script>
	<script>
		
			$( document ).ready(function() {
			  inicializarMapas();
			});
	</script>
	<script>
		      


		function agregarLocacion(){
		y++;
		$("form #content").append('<div id="locacion'+y+'" class="locacion"><input type="hidden" name="establecimientos[establecimiento'+y+'][establecimiento_ciudad_id]" value=""> <h1>Locacion</h1> <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12	"> <label>Domicilio</label> <br> <input type="text" name="establecimientos[establecimiento'+y+'][domicilio]" id="domicilio" class="form-control"> </div> </div> <div class="row"> <div class="col-lg-6 col-md-6 col-sm-6	"> <label for="provincias">Provincia</label> <select name="provincias" id="provincia-select'+y+'"  onChange="buscarCiudadSegunProvincia('+y+')" class="form-control"> <option value="" selected>Selecciona tu provincia</option> @foreach($provincias as $item) <option value="{{$item->id}}">{{$item->provincia_nombre}}</option> @endforeach </select> </div> <div class="col-lg-6 col-md-6 col-sm-6"> <label for="localidad">Localidad</label> <select name="establecimientos[establecimiento'+y+'][ciudad]" id="localidad-select'+y+'" class="form-control"> <option value="">Seleccionas localidad</option> </select> </div> </div> <br> <input type="hidden" name="establecimientos[establecimiento'+y+'][latitud]" id="latitud'+y+'"> <input type="hidden" name="establecimientos[establecimiento'+y+'][longitud]" id="longitud'+y+'"> <div id="map-cont'+y+'"> <input id="pac-input'+y+'" class="controls gm-search-input" type="text" placeholder="Establece la direccion en el mapa.."> </div> <a onClick="eliminarLocacion(null,'+y+')" class="full-btn remove-locacion-btn"><i class="fas fa-ban"></i></a> </div>');

 



		//coordenadas C.A.B.A
		var latitud = -34.607304; 

		var longitud = -58.427812;

		//instancio un mapa asignandolo al div de locacion
		initMap(y,latitud,longitud);


		$("html, body").animate({ scrollTop: $(document).height() }, 1000);


		console.log(y);
	}


	/*<div id="locacion'+y+'"><input type="hidden" name="establecimientos[establecimiento'+y+'][establecimiento_ciudad_id]" value="">  <h1>Locacion '+y+'</h1> <label for="Domicilio{{$i}}">Domicilio '+y+' </label> <input class="domicilio" type="text" name="establecimientos[establecimiento'+y+'][domicilio]" id="Domicilio'+y+'" value=""> <br> <label for="">provincia'+y+'</label> <select name="" id="provincia-select'+y+'" onchange="buscarCiudadSegunProvincia('+y+')"> <option value="0">Seleccione una provincia</option> @foreach($provincias as $provincia) <option value="{{$provincia->id}}">{{$provincia->provincia_nombre}}</option> @endforeach </select> <br> <label for="">ciudad'+y+'</label> <select name="establecimientos[establecimiento'+y+'][ciudad]" id="localidad-select'+y+'"> <option value="0">Seleccione una ciudad</option> </select> <br> <!--<label for="latitud1">Latitud'+y+'</label>--> <input class="latitud-input" type="hidden" name="establecimientos[establecimiento'+y+'][latitud]" id="latitud'+y+'" value=""> <br><!-- <label for="longitud1">Longitud'+y+'</label>--> <input type="hidden" name="establecimientos[establecimiento'+y+'][longitud]" id="longitud'+y+'" value=""> <br> <div id="map-cont'+y+'" style="width: 100%"> <input id="pac-input'+y+'" class="controls" type="text" placeholder="Search Box"> </div> <br><br> <a onClick="eliminarLocacion(null,'+y+')">Eliminar</a></div>*/
	</script>
		<script>
		function formSubmit(){
			$("form").submit();
		}
	</script>

	
@stop



