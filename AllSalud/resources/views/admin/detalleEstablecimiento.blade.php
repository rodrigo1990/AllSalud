
@inject('ciudadService', 'App\Services\CiudadService')
@inject('domicilioService', 'App\Services\DomicilioService')
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

						<h1>Nombre y tipo</h1>
						<label>Nombre</label>
						<br>
						<input type="text" name="nombre" id="nombre" class="datos-generales form-control" value="{{$establecimiento->nombre}}">
						<div class="error" id="error-nombre">Ingrese un nombre valido</div>		
							</div>
						</div>


				
			<div id="especialidadesExistentes">
			<div class="row">
				
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h1>Especialidades que pertenecen a {{$establecimiento->nombre}}</h1>
					<ul class="flex" id="especialidades-existentes-list">

						<?php $espExist=0 //especialidades existentes ?>

						@foreach($establecimiento->especialidad as $especialidad)
						
						<?php $espExist++; ?>

							<li id="esp-li-{{$espExist}}">
								<input type="hidden" name="especialidadesExistentes[especialidad{{$espExist}}][registro_id]" value="{{$especialidad->pivot->id}}">
								<select name="especialidadesExistentes[especialidad{{$espExist}}][especialidad]" class="form-control" id="">
									<option value="eliminar">Eliminar especialidad</option>
									<option value="{{$especialidad->id}}" selected>{{$especialidad->descripcion}}</option>
								</select>
							</li>
						@endforeach
					</ul>
				</div>
				<!--  <div class="col-lg-6 col-md-6 col-sm-6">
					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
						
					<a style="display:none" id="remove-esp-btn" onClick="eliminarEspecialidades()" class="small-btn red float-right" ><i class="fas fa-minus"></i></a>


					<a onClick="agregarEspecialidades()" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
					
				</div>-->
			</div>
		</div>


		<div id="especialidades">
			<div class="row">
				
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h1>Añadir especialidades</h1>
					<ul class="flex" id="especialidades-list">
						<li id="esp-li-1">
							<select name="especialidades[]"  class="form-control">
								<option value="null">Seleccione una especialidad</option>
								@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
							</select>
						</li>
						<li id="esp-li-2"><select name="especialidades[]"  class="form-control" id="">
							<option value="null">Seleccione una especialidad</option>
							@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
						</select></li>
						<li id="esp-li-3"><select name="especialidades[]"  class="form-control" id="">
							<option value="null">Seleccione una especialidad</option>
							@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
						</select></li>
						<li id="esp-li-4"><select name="especialidades[]"  class="form-control" id="">
							<option value="null">Seleccione una especialidad</option>
							@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
						</select></li>
						<li id="esp-li-5"><select name="especialidades[]"  class="form-control" id="">
							<option value="null">Seleccione una especialidad</option>
							@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
						</select></li>
						<li id="esp-li-6"><select name="especialidades[]"  class="form-control" id="">
							<option value="null">Seleccione una especialidad</option>
							@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
						</select></li>

						<!-- ROW -->

						<li id="esp-li-7">
							<select name="especialidades[]" id="" class="form-control">
								<option value="null">Seleccione una especialidad</option>
								@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
							</select>
						</li>
						<li id="esp-li-8"><select name="especialidades[]"  class="form-control" id="">
							<option value="null">Seleccione una especialidad</option>
							@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
						</select></li>
						<li id="esp-li-9"><select name="especialidades[]"  class="form-control" id="">
							<option value="null">Seleccione una especialidad</option>
							@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
						</select></li>
						<li id="esp-li-10"><select name="especialidades[]"  class="form-control" id="">
							<option value="null">Seleccione una especialidad</option>
							@foreach($especialidades as $especialidad)
									<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
								@endforeach
						</select></li>
						

					


					</ul>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
						
					<a style="display:none" id="remove-esp-btn" onClick="eliminarEspecialidades()" class="small-btn red float-right" ><i class="fas fa-minus"></i></a>


					<a onClick="agregarEspecialidades()" class="small-btn blue float-right margin-right-15"><i class="fas fa-plus"></i></a>
					
				</div>
			</div>
		</div>



								
				@foreach($establecimiento->domicilio as $domicilio)
					<?php  $i++;?> 
				
					<div class="locacion" id="locacion{{$i}}">
					  	<input type="hidden" name="establecimientos[establecimiento{{$i}}][establecimiento_ciudad_id]" value="{{$domicilio->id}}">
						
						<h1>Locacion</h1>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12	">
								<label>Domicilio</label>
								<br>
								<input type="text"  name="establecimientos[establecimiento{{$i}}][domicilio]" id="{{$i}}"class="domicilio-domicilio form-control"  value="{{$domicilio->domicilio}}">	
								<div class="error" id="error-domicilio-{{$i}}">Ingrese un domicilio</div>

								<label>Telefono</label>
								<br>
								<input type="text" name="establecimientos[establecimiento{{$i}}][telefono]" id="{{$i}}"  class="domicilio-telefono form-control" value="{{$domicilio->telefono}}">	
								<div class="error" id="error-telefono-{{$i}}">Ingrese un telefono</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6	">								
								<label for="provincias">Provincia</label>

									<select name="provincias" id="{{$i}}"   onchange="buscarCiudadSegunProvincia({{$i}})" class="provincia-select{{$i}} domicilio-provincia form-control">

										<option value="0">Seleccione una provincia</option>
											@foreach($provincias as $provincia)

												<?php $provinciaIdDomicilio = $ciudadService->getCiudadPorId($domicilio->ciudad_id)  ?>



												@if($provinciaIdDomicilio->provincia_id == $provincia->id)


													<option value="{{$provincia->id}}" selected>{{$provincia->provincia_nombre}}</option>
													<!-- CREO VARIABLE AUXILIAR DE PROVINCA PARA TOMAR LA PROVINCIA DEL ESTABLECIMIENTO -->
													<?php $provinciaId = $provincia->id ?>
												


												@endif
												
												<option value="{{$provincia->id}}">{{$provincia->provincia_nombre}}</option>


											@endforeach
									</select>
									<div class="error" id="error-provincia-1">Ingrese una provincia</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">

								<label for="localidad">Localidad</label>

								<select name="establecimientos[establecimiento{{$i}}][ciudad]" id="{{$i}}" class="localidad-select{{$i}} domicilio-localidad form-control">
									<option value="0">Seleccione una ciudad</option>
									
									<!-- BUSCO LAS CIUDADES POR LA PROVINCIA DEL ESTABLECIMIENTO -->
									 <?php $ciudades = $ciudadService->getCiudadesPorProvincia($provinciaId) ?>

									@foreach($ciudades as $ciudad)
										@if($ciudad->id == $domicilio->ciudad_id)
											<option value="{{$domicilio->ciudad_id}}" selected>{{$ciudad->ciudad_nombre}}</option>
										@else
											<option value="{{$ciudad->id}}">{{$ciudad->ciudad_nombre}}</option>
										@endif

									@endforeach
								</select>

								<div class="error" id="error-localidad-{{$i}}">Ingrese una localidad</div>

							</div>
						</div>

							

						<!--  <label for="latitud1">Latitud</label>-->
						<input class="latitud-input" type="hidden" name="establecimientos[establecimiento{{$i}}][latitud]" id="latitud{{$i}}" value="{{$domicilio->latitud}}">
						<br>
						<!--  <label for="longitud1">Longitud</label>-->
						<input type="hidden" name="establecimientos[establecimiento{{$i}}][longitud]" id="longitud{{$i}}" value="{{$domicilio->longitud}}">
						<br>
						<div id="map-cont{{$i}}" style="width: 100%">
							 <input id="pac-input{{$i}}" class="gm-search-input controls" type="text" placeholder="Establece la direccion en el mapa..">
						</div>

						
						<?php $latitudesJs[$i]=$domicilio->latitud; ?>
						<?php $longitudesJs[$i]=$domicilio->longitud; ?>

						
					
					<?php $tiposExistentes = $domicilioService->getTipoPorDomicilio($domicilio->id)  ?>
					


			<h1 class="margin-top-50">Servicios Existentes</h1>
			<div class="row margin-bottom-25">
				
				<ul class="flex" id=""> 
				<?php $tipoExist=0; ?>
				<?php $k=0; ?>
				
				@foreach($tiposExistentes as $tipo)
				 		<?php $k++; ?>
						<?php $tipoExist++; ?>
						<li id="tipo-li-{{$tipoExist}}">
								<input type="hidden" name="tiposExistentes[tipo{{$tipoExist}}][registro_id][{{$k}}]" value="{{$tipo->id}}">
								<select name="tiposExistentes[tipo{{$tipoExist}}][tipo][{{$k}}]" class="form-control" id="">
									<option value="eliminar">Eliminar servicio</option>
									<option value="{{$tipo->tipo_id}}" selected>{{$tipo->descripcion}}</option>
								</select>
							</li>
					

					@endforeach
					
				</ul>
			</div>

			<h1 class="margin-top-25">Añadir Servicios</h1>
			<div class="row margin-bottom-50">
				
				
				<ul class="flex" id="">
				<?php $k=0;  ?>
				@foreach($tipos as $tipo)
				<?php $k++; ?>
						<li id="tipo-li">
								<select name="establecimientos[establecimiento{{$i}}][tipos][{{$k}}]" class="form-control" id="">
									<option value="null">Seleccionas tipo</option>
									@foreach($tipos as $tipo)
									<option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
									@endforeach
								</select>
							</li>
					

					@endforeach
					
				</ul>
			</div>


			 <a onClick="eliminarLocacion({{$domicilio->id}},{{$i}})" class="full-btn remove-locacion-btn"><i class="fas fa-ban"></i></a>


					


					</div><!-- #locacion -->


				

				@endforeach
				</div>


					<div class="row" id="buttons">
						

						<div class="col-lg-12 col-md-12 col-sm-12">
							<a class="full-btn add-locacion-btn" onClick="agregarLocacion()"><i class="fas fa-home"></i></a>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<a onClick="validarEnviar()" class="full-btn save-locacion-btn"><i class="far fa-save"></i></a>
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
		window.esp=10;//contador que manejara los campos de especialidades creados
		window.latitudes = <?php echo json_encode($latitudesJs) ?>;
		window.longitudes = <?php echo json_encode($longitudesJs) ?>;
    </script>
    <script src="/js/buscarCiudadSegunProvincia.js"></script>
    <script src="/js/mainDetalleEstablecimiento.js"></script>
	<script src="/js/eliminarEstablecimiento.js"></script>
	<script src="/js/eliminarLocacion.js"></script>
	<script src="/js/validarYEnviarEstablecimientos.js"></script>
	<script>
		
			$( document ).ready(function() {
			  inicializarMapas();
			});
	</script>
	<script>

		function eliminarEspecialidades(){
			
			
			$('#esp-li-'+esp+'').fadeOut(function(){
				$('#esp-li-'+esp+'').remove();

				esp--;

				if(esp==10){
					$("#remove-esp-btn").fadeOut();
				}
			});

			
		}

		function agregarEspecialidades(){
			esp++;
			if(esp>10){
				$("#remove-esp-btn").fadeIn();
			}
			$("#especialidades-list").append('<li id="esp-li-'+esp+'"> <select name="especialidades[]" id="" class="form-control"> <option value="null">Seleccione una especialidad</option> @foreach($especialidades as $especialidad) <option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option> @endforeach </select> </li>'); 



		}
		      



		function agregarLocacion(){
		y++;
		$("form #content").append('<div class="locacion" id="locacion'+y+'"><input type="hidden" name="establecimientos[establecimiento'+y+'][establecimiento_ciudad_id]" value=""><h1>Locacion</h1> <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12	"> <label>Domicilio</label> <br> <input type="text" name="establecimientos[establecimiento'+y+'][domicilio]" id="'+y+'" class="domicilio-domicilio form-control"> <div class="error" id="error-domicilio-'+y+'">Ingrese un domicilio</div> <label>Telefono</label> <br> <input type="text" name="establecimientos[establecimiento'+y+'][telefono]" id="'+y+'" class="domicilio-telefono form-control"> <div class="error" id="error-telefono-'+y+'">Ingrese un telefono</div> </div> </div> <div class="row"> <div class="col-lg-6 col-md-6 col-sm-6	"> <label for="provincias">Provincia</label> <select name="provincias" id="'+y+'"  onChange="buscarCiudadSegunProvincia('+y+')" class="provincia-select'+y+' domicilio-provincia form-control"> <option value="" selected>Selecciona tu provincia</option> @foreach($provincias as $item) <option value="{{$item->id}}">{{$item->provincia_nombre}}</option> @endforeach </select> <div class="error" id="error-provincia-'+y+'">Ingrese una provincia</div> </div> <div class="col-lg-6 col-md-6 col-sm-6"> <label for="localidad">Localidad</label> <select name="establecimientos[establecimiento'+y+'][ciudad]" id="'+y+'" class="localidad-select'+y+' domicilio-localidad form-control"> <option value="">Seleccionas localidad</option> </select> <div class="error" id="error-localidad-'+y+'">Ingrese una localidad</div> </div> </div> <br> <input type="hidden" name="establecimientos[establecimiento'+y+'][latitud]" id="latitud'+y+'"> <input type="hidden" name="establecimientos[establecimiento'+y+'][longitud]" id="longitud'+y+'"> <div id="map-cont'+y+'"> <input id="pac-input'+y+'" class="controls gm-search-input" type="text" placeholder="Establece la direccion en el mapa.."></div> <h1 class="margin-top-50">Añadir Servicios</h1> <div class="row margin-bottom-50"> <ul class="flex" id=""> <?php $k=0;  ?> @foreach($tipos as $tipo) <?php $k++; ?> <li id="tipo-li"> <select name="establecimientos[establecimiento'+y+'][tipos][{{$k}}]" class="form-control" id=""> <option value="null">Seleccionas tipo</option> @foreach($tipos as $tipo) <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option> @endforeach </select> </li> @endforeach </ul> </div> <a onClick="eliminarLocacion(null,'+y+')" class="full-btn remove-locacion-btn"><i class="fas fa-ban"></i></a </div></div>');


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


	
@stop



