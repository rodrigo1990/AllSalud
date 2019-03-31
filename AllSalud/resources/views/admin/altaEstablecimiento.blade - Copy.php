@extends('admin.layouts.principal')
@section('content')
<form action="/admin/createEstablecimiento" method="POST">
	@csrf
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
	<input type="text" name="domicilio1" id="domicilio">
	<br>

	<label for="provincias">Provincia</label>
	<select name="provincias1" id="provincia-select1" class='' onChange="buscarCiudadSegunProvincia(1)">
		<option value="" selected>Selecciona tu provincia</option>
		@foreach($provincias as $item)
			<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>
		@endforeach
	</select>

	<br>

	<label for="localidad">Localidad</label>
	<select name="localidad1" id="localidad-select1" class=''>
		<option value="">Seleccionas localidad</option>
	</select>
	<br>



	<label for="latitud">latitud</label>
	<br>
	<input type="text" name="latitud1" id="latitud">
	<br>


	<label for="longitud">longitud</label>
	<br>
	<input type="text" name="longitud1" id="longitud">
	<br>


	<h1>Locacion 2</h1>


	<label for="domicilio">Domicilio</label>
	<br>
	<input type="text" name="domicilio2" id="domicilio">
	<br>

	<label for="provincias">Provincia</label>
	<select name="provincias2" id="provincia-select2" class='' onChange="buscarCiudadSegunProvincia(2)">
		<option value="" selected>Selecciona tu provincia</option>
		@foreach($provincias as $item)
			<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>
		@endforeach
	</select>

	<br>

	<label for="localidad">Localidad</label>
	<select name="localidad2" id="localidad-select2" class=''>
		<option value="">Seleccionas localidad</option>
	</select>
	<br>



	<label for="latitud">latitud</label>
	<br>
	<input type="text" name="latitud2" id="latitud">
	<br>


	<label for="longitud">longitud</label>
	<br>
	<input type="text" name="longitud2" id="longitud">
	<br>


	<h1>Locacion 3</h1>


	<label for="domicilio">Domicilio</label>
	<br>
	<input type="text" name="domicilio3" id="domicilio">
	<br>

	<label for="provincias">Provincia</label>
	<select name="provincias3" id="provincia-select3" class='' onChange="buscarCiudadSegunProvincia(3)">
		<option value="" selected>Selecciona tu provincia</option>
		@foreach($provincias as $item)
			<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>
		@endforeach
	</select>

	<br>

	<label for="localidad">Localidad</label>
	<select name="localidad3" id="localidad-select3" class=''>
		<option value="">Seleccionas localidad</option>
	</select>
	<br>



	<label for="latitud">latitud</label>
	<br>
	<input type="text" name="latitud3" id="latitud">
	<br>


	<label for="longitud">longitud</label>
	<br>
	<input type="text" name="longitud3" id="longitud">
	<br>

	<h1>Locacion 4</h1>


	<label for="domicilio">Domicilio</label>
	<br>
	<input type="text" name="domicilio4" id="domicilio">
	<br>

	<label for="provincias">Provincia</label>
	<select name="provincias4" id="provincia-select4" class='' onChange="buscarCiudadSegunProvincia(4)">
		<option value="" selected>Selecciona tu provincia</option>
		@foreach($provincias as $item)
			<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>
		@endforeach
	</select>

	<br>

	<label for="localidad">Localidad</label>
	<select name="localidad4" id="localidad-select4" class=''>
		<option value="">Seleccionas localidad</option>
	</select>
	<br>



	<label for="latitud">latitud</label>
	<br>
	<input type="text" name="latitud4" id="latitud">
	<br>


	<label for="longitud">longitud</label>
	<br>
	<input type="text" name="longitud4" id="longitud">
	<br>






	<button>Crear</button>




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

						 console.log(id);
						 console.log(ciudad);





				}
				});

		}
	</script>
	@stop
