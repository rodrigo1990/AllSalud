@extends('admin.layouts.principal')
@section('content')
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
<form action="/admin/createEstablecimiento" method="POST">
	@csrf
	<div id="content" class="">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<h1>Nombre y tipo</h1>
				<label>Nombre</label>
				<br>
				<input type="text" name="nombre" id="nombre" class="datos-generales form-control">
				<div class="error" id="error-nombre">Ingrese un nombre valido</div>	
			</div>
		</div>
	
		
		<div id="especialidades">
			<div class="row">
				
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h1>Especialidades</h1>
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
	
		<div class="locacion">
			<h1>Locacion</h1>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12	">
					

					<label>Domicilio</label>
					<br>
					<input type="text" name="establecimientos[establecimiento1][domicilio]" id="1" class="domicilio-domicilio form-control">	
					<div class="error" id="error-domicilio-1">Ingrese un domicilio</div>
					

					<label>Telefono</label>
					<br>
					<input type="text" name="establecimientos[establecimiento1][telefono]" id="1" class="domicilio-telefono form-control">	
					<div class="error" id="error-telefono-1">Ingrese un telefono</div>
				

				</div>
			</div>
			
			
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6	">

					<label for="provincias">Provincia</label>

					<select name="provincias" id="1"  onChange="buscarCiudadSegunProvincia(1)" class="provincia-select1 domicilio-provincia form-control">

						<option value="" selected>Selecciona tu provincia</option>
						@foreach($provincias as $item)
							<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>
						@endforeach


					</select>
					<div class="error" id="error-provincia-1">Ingrese una provincia</div>

				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">

					<label for="localidad">Localidad</label>

					<select name="establecimientos[establecimiento1][localidad]" id="1" class="localidad-select1 domicilio-localidad form-control">
						<option value="">Seleccionas localidad</option>
					</select>

					<div class="error" id="error-localidad-1">Ingrese una localidad</div>

				</div>
			</div>
			<br>
			<input type="hidden" name="establecimientos[establecimiento1][latitud]" id="latitud1">
			<input type="hidden" name="establecimientos[establecimiento1][longitud]" id="longitud1">
			
			<div id="map-cont1">
				<input id="pac-input1" class="controls gm-search-input" type="text" placeholder="Establece la direccion en el mapa..">
			</div>
			
			<h1>Servicios</h1>
			<div class="row margin-top-50">
				
				<ul class="flex" id="especialidades-list">
				<li>
					<select name="establecimientos[establecimiento1][tipos][0]" id="tipo-select" class='datos-generales form-control'>

						<option value="null">Seleccionas tipo</option>
						@foreach($tipos as $item)
							<option value="{{$item->id}}">{{$item->descripcion}}</option>
						@endforeach
					</select>
					<div class="error" id="error-tipo">Ingrese un tipo</div>
				</li>
				<li>
					<select name="establecimientos[establecimiento1][tipos][1]" id="tipo-select" class='datos-generales form-control'>

						<option value="null">Seleccionas tipo</option>
						@foreach($tipos as $item)
							<option value="{{$item->id}}">{{$item->descripcion}}</option>
						@endforeach
					</select>
					<div class="error" id="error-tipo">Ingrese un tipo</div>
				</li>

				<li>
					<select name="establecimientos[establecimiento1][tipos][2]" id="tipo-select" class='datos-generales form-control'>

						<option value="null">Seleccionas tipo</option>
						@foreach($tipos as $item)
							<option value="{{$item->id}}">{{$item->descripcion}}</option>
						@endforeach
					</select>
					<div class="error" id="error-tipo">Ingrese un tipo</div>
				</li>

				<li>
					<select name="establecimientos[establecimiento1][tipos][3]" id="tipo-select" class='datos-generales form-control'>

						<option value="null">Seleccionas tipo</option>
						@foreach($tipos as $item)
							<option value="{{$item->id}}">{{$item->descripcion}}</option>
						@endforeach
					</select>
					<div class="error" id="error-tipo">Ingrese un tipo</div>
				</li>

				<li>
					<select name="establecimientos[establecimiento1][tipos][4]" id="tipo-select" class='datos-generales form-control'>

						<option value="null">Seleccionas tipo</option>
						@foreach($tipos as $item)
							<option value="{{$item->id}}">{{$item->descripcion}}</option>
						@endforeach
					</select>
					<div class="error" id="error-tipo">Ingrese un tipo</div>
				</li>

				<li>
					<select name="establecimientos[establecimiento1][tipos][5]" id="tipo-select" class='datos-generales form-control'>

						<option value="null">Seleccionas tipo</option>
						@foreach($tipos as $item)
							<option value="{{$item->id}}">{{$item->descripcion}}</option>
						@endforeach
					</select>
					<div class="error" id="error-tipo">Ingrese un tipo</div>
				</li>

				<li>
					<select name="establecimientos[establecimiento1][tipos][6]" id="tipo-select" class='datos-generales form-control'>

						<option value="null">Seleccionas tipo</option>
						@foreach($tipos as $item)
							<option value="{{$item->id}}">{{$item->descripcion}}</option>
						@endforeach
					</select>
					<div class="error" id="error-tipo">Ingrese un tipo</div>
				</li>

				<li>
					<select name="establecimientos[establecimiento1][tipos][7]" id="tipo-select" class='datos-generales form-control'>

						<option value="null">Seleccionas tipo</option>
						@foreach($tipos as $item)
							<option value="{{$item->id}}">{{$item->descripcion}}</option>
						@endforeach
					</select>
					<div class="error" id="error-tipo">Ingrese un tipo</div>
				</li>

				<li>
					<select name="establecimientos[establecimiento1][tipos][8]" id="tipo-select" class='datos-generales form-control'>

						<option value="null">Seleccionas tipo</option>
						@foreach($tipos as $item)
							<option value="{{$item->id}}">{{$item->descripcion}}</option>
						@endforeach
					</select>
					<div class="error" id="error-tipo">Ingrese un tipo</div>
				</li>
			
				</ul>
			</div>

		</div>
	</div>
	<div class="row" id="buttons">
		
		<div class="col-lg-12 col-md-12 col-sm-12">
			<a class="full-btn add-locacion-btn" onClick="agregarLocacion()"><i class="fas fa-home"></i></a>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12">
			<a onClick="validarEnviar()" class="full-btn save-locacion-btn"><i class="far fa-save"></i></a>
		</div>
		
		
		
	</div>
	



</form>
</div>
@stop
@section('scripts')
	 <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkne1gpPfJ0B3KrE4OQURwPi492LDjg8g&libraries=places">
    </script>
    <script src="/js/buscarCiudadSegunProvincia.js"></script>
	<script src=/js/mainAltaEstablecimiento.js></script>
	<script src="/js/validarYEnviarEstablecimientos.js"></script>
		<script src="/js/eliminarLocacion.js"></script>
		<script>
			window.estado = {{$estado}};
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



		//Uso esta funcion y no en main, de otra manera no reconoce los comandos blade "foreach.."
		function agregarLocacion(){
		y++;
		$("form #content").append('<div class="locacion" id="locacion'+y+'"><h1>Locacion</h1> <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12	"> <label>Domicilio</label> <br> <input type="text" name="establecimientos[establecimiento'+y+'][domicilio]" id="'+y+'" class="domicilio-domicilio form-control"> <div class="error" id="error-domicilio-'+y+'">Ingrese un domicilio</div> <label>Telefono</label> <br> <input type="text" name="establecimientos[establecimiento'+y+'][telefono]" id="'+y+'" class="domicilio-telefono form-control"> <div class="error" id="error-telefono-'+y+'">Ingrese un telefono</div> </div> </div> <div class="row"> <div class="col-lg-6 col-md-6 col-sm-6	"> <label for="provincias">Provincia</label> <select name="provincias" id="'+y+'"  onChange="buscarCiudadSegunProvincia('+y+')" class="provincia-select'+y+' domicilio-provincia form-control"> <option value="" selected>Selecciona tu provincia</option> @foreach($provincias as $item) <option value="{{$item->id}}">{{$item->provincia_nombre}}</option> @endforeach </select> <div class="error" id="error-provincia-'+y+'">Ingrese una provincia</div> </div> <div class="col-lg-6 col-md-6 col-sm-6"> <label for="localidad">Localidad</label> <select name="establecimientos[establecimiento'+y+'][localidad]" id="'+y+'" class="localidad-select'+y+' domicilio-localidad form-control"> <option value="">Seleccionas localidad</option> </select> <div class="error" id="error-localidad-'+y+'">Ingrese una localidad</div> </div> </div> <br> <input type="hidden" name="establecimientos[establecimiento'+y+'][latitud]" id="latitud'+y+'"> <input type="hidden" name="establecimientos[establecimiento'+y+'][longitud]" id="longitud'+y+'"> <div id="map-cont'+y+'"> <input id="pac-input'+y+'" class="controls gm-search-input" type="text" placeholder="Establece la direccion en el mapa.."></div> <h1>Servicios</h1> <div class="row margin-top-50"> <ul class="flex" id="especialidades-list"> <li> <select name="establecimientos[establecimiento'+y+'][tipos][0]" id="tipo-select" class="datos-generales form-control"> <option value="null">Seleccionas tipo</option> @foreach($tipos as $item) <option value="{{$item->id}}">{{$item->descripcion}}</option> @endforeach </select> <div class="error" id="error-tipo">Ingrese un tipo</div> </li> <li> <select name="establecimientos[establecimiento'+y+'][tipos][1]" id="tipo-select" class="datos-generales form-control"> <option value="null">Seleccionas tipo</option> @foreach($tipos as $item) <option value="{{$item->id}}">{{$item->descripcion}}</option> @endforeach </select> <div class="error" id="error-tipo">Ingrese un tipo</div> </li> <li> <select name="establecimientos[establecimiento'+y+'][tipos][2]" id="tipo-select" class="datos-generales form-control"> <option value="null">Seleccionas tipo</option> @foreach($tipos as $item) <option value="{{$item->id}}">{{$item->descripcion}}</option> @endforeach </select> <div class="error" id="error-tipo">Ingrese un tipo</div> </li> <li> <select name="establecimientos[establecimiento'+y+'][tipos][3]" id="tipo-select" class="datos-generales form-control"> <option value="null">Seleccionas tipo</option> @foreach($tipos as $item) <option value="{{$item->id}}">{{$item->descripcion}}</option> @endforeach </select> <div class="error" id="error-tipo">Ingrese un tipo</div> </li> <li> <select name="establecimientos[establecimiento'+y+'][tipos][4]" id="tipo-select" class="datos-generales form-control"> <option value="null">Seleccionas tipo</option> @foreach($tipos as $item) <option value="{{$item->id}}">{{$item->descripcion}}</option> @endforeach </select> <div class="error" id="error-tipo">Ingrese un tipo</div> </li> <li> <select name="establecimientos[establecimiento'+y+'][tipos][5]" id="tipo-select" class="datos-generales form-control"> <option value="null">Seleccionas tipo</option> @foreach($tipos as $item) <option value="{{$item->id}}">{{$item->descripcion}}</option> @endforeach </select> <div class="error" id="error-tipo">Ingrese un tipo</div> </li> <li> <select name="establecimientos[establecimiento'+y+'][tipos][6]" id="tipo-select" class="datos-generales form-control"> <option value="null">Seleccionas tipo</option> @foreach($tipos as $item) <option value="{{$item->id}}">{{$item->descripcion}}</option> @endforeach </select> <div class="error" id="error-tipo">Ingrese un tipo</div> </li> <li> <select name="establecimientos[establecimiento'+y+'][tipos][7]" id="tipo-select" class="datos-generales form-control"> <option value="null">Seleccionas tipo</option> @foreach($tipos as $item) <option value="{{$item->id}}">{{$item->descripcion}}</option> @endforeach </select> <div class="error" id="error-tipo">Ingrese un tipo</div> </li> <li> <select name="establecimientos[establecimiento'+y+'][tipos][8]" id="tipo-select" class="datos-generales form-control"> <option value="null">Seleccionas tipo</option> @foreach($tipos as $item) <option value="{{$item->id}}">{{$item->descripcion}}</option> @endforeach </select> <div class="error" id="error-tipo">Ingrese un tipo</div> </li> </ul> </div> <a onClick="eliminarLocacion(null,'+y+')" class="full-btn remove-locacion-btn"><i class="fas fa-ban"></i></a </div></div>');
 



		//coordenadas C.A.B.A
		var latitud = -34.607304; 

		var longitud = -58.427812;

		//instancio un mapa asignandolo al div de locacion
		initMap(y,latitud,longitud);


		 $("html, body").animate({ scrollTop: $(document).height() }, 1000);



		console.log(y);
	}

	</script>
	<script>
	
		$( document ).ready(function() {
			
			//coordenadas C.A.B.A				
			var latitud = -34.607304; 

			var longitud = -58.427812;
		  	
		  	initMap(1,latitud,longitud);

		  	if(estado==true){
		  		alertar("Ingresado con exito")
		  	}




		  	
		});
	</script>





@stop

