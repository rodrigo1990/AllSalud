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
				<label>Nombre</label>
				<br>
				<input type="text" name="nombre" id="nombre" class="form-control">	
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<label>Tipo establecimiento</label>
				<br>	
				<select name="tipo" id="tipo-select" class='form-control'>
					<option value="">Seleccionas tipo</option>
					@foreach($tipos as $item)
						<option value="{{$item->id}}">{{$item->descripcion}}</option>
					@endforeach
				</select>
			</div>
		</div>
	
		<div class="locacion">
			<h1>Locacion</h1>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12	">
					<label>Domicilio</label>
					<br>
					<input type="text" name="establecimientos[establecimiento1][domicilio]" id="domicilio" class="form-control">		
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6	">
					<label for="provincias">Provincia</label>
					<select name="provincias" id="provincia-select0"  onChange="buscarCiudadSegunProvincia(0)" class="form-control">
						<option value="" selected>Selecciona tu provincia</option>
						@foreach($provincias as $item)
							<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>
						@endforeach
					</select>		
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<label for="localidad">Localidad</label>
					<select name="establecimientos[establecimiento1][localidad]" id="localidad-select0" class="form-control">
						<option value="">Seleccionas localidad</option>
					</select>				
				</div>
			</div>
			<br>
			<input type="hidden" name="establecimientos[establecimiento1][latitud]" id="latitud1">
			<input type="hidden" name="establecimientos[establecimiento1][longitud]" id="longitud1">
			
			<div id="map-cont1">
				<input id="pac-input1" class="controls gm-search-input" type="text" placeholder="Establece la direccion en el mapa..">
			</div>

		</div>
	</div>
	<div class="row" id="buttons">
		
		<div class="col-lg-12 col-md-12 col-sm-12">
			<a class="full-btn add-locacion-btn" onClick="agregarLocacion()"><i class="fas fa-home"></i></a>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12">
			<a onClick="formSubmit()" class="full-btn save-locacion-btn"><i class="far fa-save"></i></a>
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
		<script src="/js/eliminarLocacion.js"></script>
		<script>
			window.estado = {{$estado}};
		</script>
	<script>
		function agregarLocacion(){
		y++;
		$("form #content").append('<div id="locacion'+y+'" class="locacion"> <h1>Locacion</h1> <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12	"> <label>Domicilio</label> <br> <input type="text" name="establecimientos[establecimiento'+y+'][domicilio]" id="domicilio" class="form-control"> </div> </div> <div class="row"> <div class="col-lg-6 col-md-6 col-sm-6	"> <label for="provincias">Provincia</label> <select name="provincias" id="provincia-select'+y+'"  onChange="buscarCiudadSegunProvincia('+y+')" class="form-control"> <option value="" selected>Selecciona tu provincia</option> @foreach($provincias as $item) <option value="{{$item->id}}">{{$item->provincia_nombre}}</option> @endforeach </select> </div> <div class="col-lg-6 col-md-6 col-sm-6"> <label for="localidad">Localidad</label> <select name="establecimientos[establecimiento'+y+'][localidad]" id="localidad-select'+y+'" class="form-control"> <option value="">Seleccionas localidad</option> </select> </div> </div> <br> <input type="hidden" name="establecimientos[establecimiento'+y+'][latitud]" id="latitud'+y+'"> <input type="hidden" name="establecimientos[establecimiento'+y+'][longitud]" id="longitud'+y+'"> <div id="map-cont'+y+'"> <input id="pac-input'+y+'" class="controls gm-search-input" type="text" placeholder="Establece la direccion en el mapa.."> </div> <a onClick="eliminarLocacion(null,'+y+')" class="full-btn remove-locacion-btn"><i class="fas fa-ban"></i></a> </div>');

 



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
	<script>
		function formSubmit(){
			$("form").submit();
		}
	</script>




@stop
