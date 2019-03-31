	<?php 
		$i=0;
		$dom1="";
		$dom2="";
		$dom3="";
		$dom4="";

		$idPivot1=0;
		$idPivot2=0;
		$idPivot3=0;
		$idPivot4=0;


		$prov1=0;
		$prov2=0;
		$prov3=0;
		$prov4=0;

		$ciudad1=0;
		$ciudad2=0;
		$ciudad3=0;
		$ciudad4=0;

		$latitud1=0;
		$latitud2=0;
		$latitud3=0;
		$latitud4=0;

		$longitud1=0;
		$longitud2=0;
		$longitud3=0;
		$longitud4=0;

		foreach($establecimiento->domicilio as $domicilio){
			 $i++; 
			if($i==1)
			{
				  $dom1 = $domicilio->pivot->domicilio;
				  $idPivot1 = $domicilio->pivot->id;
				  $prov1= $domicilio->provincia_id;
				  $ciudad1=$domicilio->pivot->ciudad_id;
				  $latitud1 = $domicilio->pivot->latitud;
				  $longitud1 = $domicilio->pivot->longitud;
			}
			else if($i==2)
			{
				  $dom2 = $domicilio->pivot->domicilio;
				  $idPivot2 = $domicilio->pivot->id;
				  $prov2= $domicilio->provincia_id;
				  $ciudad2=$domicilio->pivot->ciudad_id;
				  $latitud2 = $domicilio->pivot->latitud;
				  $longitud2 = $domicilio->pivot->longitud;
			}
			else if ($i==3)
			{
				  $dom3 = $domicilio->pivot->domicilio;
				  $idPivot3 = $domicilio->pivot->id;
				  $prov3= $domicilio->provincia_id;
				  $ciudad3=$domicilio->pivot->ciudad_id;
				  $latitud3 = $domicilio->pivot->latitud;
				  $longitud3 = $domicilio->pivot->longitud;
		  	} 
			else if ($i==4)
			{
				 $dom4 = $domicilio->pivot->domicilio;
				 $idPivot4 = $domicilio->pivot->id;
				 $ciudad4=$domicilio->pivot->ciudad_id;
				 $latitud4 = $domicilio->pivot->latitud;
				  $longitud4 = $domicilio->pivot->longitud;
			}
		}



	


	 ?>

@extends('admin.layouts.principal')
@section('content')
	<input type="hidden" value="{{$establecimiento->id}}">
	<br>
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" value={{$establecimiento->nombre}}>
	<br>
	<label for="">Tipo</label>
	<input type="text" name="tipo" value={{$establecimiento->tipo->descripcion}}>
	<br><br>




	<label for="Domicilio1">Domicilio 1 </label>
	<input type="text" name="Domicilio1" value="{{$dom1}}">
	@if($idPivot1!=0)
		<a onClick="eliminarDomicilio({{$idPivot1}})">Eliminar</a>
	@endif
	<br>

	<label for="">provincia</label>
	<select name="" id="provincia-select1" onchange="buscarCiudadSegunProvincia(1,{{$ciudad1}})">
		<option value="0">Seleccione una provincia</option>
		@foreach($provincias as $provincia)
			@if($prov1 == $provincia->id)
				<option value="{{$provincia->id}}" selected>{{$provincia->provincia_nombre}}</option>
			@endif

			<option value="{{$provincia->id}}">{{$provincia->provincia_nombre}}</option>
		@endforeach
	</select>
	<br>

	<label for="">ciudad</label>
	<select name="" id="localidad-select1">
		<option value="0">Seleccione una ciudad</option>
	</select>
	<br>
	<label for="latitud1">Latitud</label>
	<input type="text" name="latitud1" id="latitud1" value="{{$latitud1}}">
	<br>
	<label for="longitud1">Longitud</label>
	<input type="text" name="longitud1" id="longitud1" value="{{$longitud1}}">
	




	<br><br>
	<label for="Domicilio1">Domicilio 2 </label>
	<input type="text" name="Domicilio2" value="{{$dom2}}">
	@if($idPivot2!=0)
		<a onClick="eliminarDomicilio({{$idPivot2}})">Eliminar</a>
	@endif
	<br>
	<label for="">provincia</label>
	<select name="" id="provincia-select2" onchange="buscarCiudadSegunProvincia(2,{{$ciudad2}})">
		<option value="0">Seleccione una provincia</option>
		@foreach($provincias as $provincia)
			@if($prov2 == $provincia->id)
				<option value="{{$provincia->id}}" selected>{{$provincia->provincia_nombre}}</option>
			@endif
			<option value="{{$provincia->id}}">{{$provincia->provincia_nombre}}</option>
		@endforeach
	</select>
	<br>

	<label for="">ciudad</label>
	<select name="" id="localidad-select2">
		<option value="0">Seleccione una ciudad</option>
	</select>
	<br>
	<label for="latitud2">Latitud</label>
	<input type="text" name="latitud2" id="latitud2" value="{{$latitud2}}">
	<br>
	<label for="longitud2">Longitud</label>
	<input type="text" name="longitud2" id="longitud2" value="{{$longitud2}}">

	<br><br>







	<label for="Domicilio1">Domicilio 3 </label>
	<input type="text" name="Domicilio3" value="{{$dom3}}">
	@if($idPivot3!=0)
		<a onClick="eliminarDomicilio({{$idPivot3}})">Eliminar</a>
	@endif
	<br>
	<label for="">provincia</label>
	<select name="" id="provincia-select3" onchange="buscarCiudadSegunProvincia(3,{{$ciudad3}})">
		<option value="0">Seleccione una provincia</option>
		@foreach($provincias as $provincia)
			@if($prov3 == $provincia->id)
				<option value="{{$provincia->id}}" selected>{{$provincia->provincia_nombre}}</option>
			@endif
			<option value="{{$provincia->id}}">{{$provincia->provincia_nombre}}</option>
		@endforeach
	</select>
	<br>

	<label for="">ciudad</label>
	<select name="" id="localidad-select3">
		<option value="0">Seleccione una ciudad</option>
	</select>
	<br>
	<label for="latitud3">Latitud</label>
	<input type="text" name="latitud3" id="latitud3" value="{{$latitud3}}">
	<br>
	<label for="longitud3">Longitud</label>
	<input type="text" name="longitud3" id="longitud3" value="{{$longitud3}}">

	<br><br>











	<label for="Domicilio1">Domicilio 4 </label>
	<input type="text" name="Domicilio4" value="{{$dom4}}">
	@if($idPivot4!=0)
		<a onClick="eliminarDomicilio({{$idPivot4}})">Eliminar</a>
	@endif
	

	<br>
	<label for="">provincia</label>
	<select name="" id="provincia-select4" onchange="buscarCiudadSegunProvincia(4,{{$ciudad4}})">
		<option value="0">Seleccione una provincia</option>
		@foreach($provincias as $provincia)
			@if($prov4 == $provincia->id)
				<option value="{{$provincia->id}}" selected>{{$provincia->provincia_nombre}}</option>
			@endif
			<option value="{{$provincia->id}}">{{$provincia->provincia_nombre}}</option>
		@endforeach
	</select>
	<br>

	<label for="">ciudad</label>
	<select name="" id="localidad-select4">
		<option value="0">Seleccione una ciudad</option>
	</select>
	<br>
	<label for="latitud4">Latitud</label>
	<input type="text" name="latitud4" id="latitud4" value="{{$latitud4}}">
	<br>
	<label for="longitud4">Longitud</label>
	<input type="text" name="longitud4" id="longitud4" value="{{$longitud4}}">




	<br><br>
	
	{{$establecimiento}}

	

@stop
@section('scripts')
	<script>
	
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
					$("#localidad-select").empty();
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

@stop



