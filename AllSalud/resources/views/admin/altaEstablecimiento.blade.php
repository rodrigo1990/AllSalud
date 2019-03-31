@extends('admin.layouts.principal')
@section('content')
<form action="/admin/createEstablecimiento" method="POST">
	@csrf
	<div id="content">
		<label for="nombre">Nombre</label>
		<br>
		<input type="text" name="nombre" id="nombre">
		<br>



		<label for="tipo">Tipo establecimiento</label>
		<br>
		<select name="tipo" id="tipo-select" class=''>
			<option value="">Seleccionas tipo</option>
			@foreach($tipos as $item)
				<option value="{{$item->id}}">{{$item->descripcion}}</option>
			@endforeach
		</select>
		<br>

		<h1>Locacion 1</h1>


		<label for="domicilio">Domicilio</label>
		<br>
		<input type="text" name="establecimientos[establecimiento][domicilio]" id="domicilio">
		<br>

		<label for="provincias">Provincia</label>
		<select name="provincias" id="provincia-select0" class='' onChange="buscarCiudadSegunProvincia(0)">
			<option value="" selected>Selecciona tu provincia</option>
			@foreach($provincias as $item)
				<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>
			@endforeach
		</select>

		<br>

		<label for="localidad">Localidad</label>
		<select name="establecimientos[establecimiento][localidad]" id="localidad-select0" class=''>
			<option value="">Seleccionas localidad</option>
		</select>
		<br>



		<label for="latitud">latitud</label>
		<br>
		<input type="text" name="establecimientos[establecimiento][latitud]" id="latitud">
		<br>


		<label for="longitud">longitud</label>
		<br>
		<input type="text" name="establecimientos[establecimiento][longitud]" id="longitud">
		<br>
	</div>
	<div id="buttons">
		<button>Crear</button>
		<a onClick="agregarLocacion()">Agregar</a>
		<a onClick="eliminarLocacion()">Eliminar</a>
	</div>
	




</form>
@stop
@section('scripts')


	<script>
		
		function buscarCiudadSegunProvincia(id){

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
					$("#localidad-select").empty();
						for(var i in data) {	

								$("#localidad-select"+id+"").append("<option value="+data[i].id+"> "+
									data[i].ciudad_nombre+"</option>");				
							}

			





				}
				});

		}
	</script>

	<script>
		
	var i=1;

	function agregarLocacion(){
		i++;
		$("form #content").append('<div id="locacion'+i+'"><h1>Locacion '+i+'</h1><label for="domicilio">Domicilio</label><br><input type="text" name="establecimientos[establecimiento'+i+'][domicilio]" id="domicilio'+i+'"><br><label for="provincias">Provincia</label><select name="provincias" id="provincia-select'+i+'"  onChange="buscarCiudadSegunProvincia('+i+')"><option value="" selected>Selecciona tu provincia</option>@foreach($provincias as $item)<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>@endforeach</select><br><label for="localidad">Localidad</label><select name="establecimientos[establecimiento'+i+'][localidad]" id="localidad-select'+i+'" class=><option value="">Seleccionas localidad</option></select><br><label for="latitud">latitud</label><br><input type="text" name="establecimientos[establecimiento'+i+'][latitud]" id="latitud"><br><label for="longitud">longitud</label><br><input type="text" name="establecimientos[establecimiento'+i+'][longitud]" id="longitud"><br></div>');

		console.log("agregar"+i+"");
	}


	function eliminarLocacion(){
		$("#locacion"+i+"").empty();

		if(i>1)
			i--;

		console.log("eliminar"+i+"");
	}

	</script>
	@stop
