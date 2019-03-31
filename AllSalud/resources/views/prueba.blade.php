@extends('layouts.principal')
@section('content')
<br><br><br><br><br><br><br><br>
<style>
	input{
		color:black !important;
	}
</style>
<form action="/prueba/datos" method="POST">
	@csrf
	<div id="inputs">
		<label for="">Datos</label>
		<input type="text" name="personas[persona][nombre]" value="nombre1">
		<br>
		<label for="">tipos</label>
		<select name="personas[persona][tipo]" id="">
			<option value="tipo_1">tipo 1</option>
			<option value="tipo_2">tipo 2</option>
			<option value="tipo_3">tipo 3 </option>
		</select>
		<br>
		<label for="">Locaciones</label>
		<input type="text" name="personas[persona][locaciones]" value="locacion1">
		<br>
		
	</div>
	<div id="enviar">
		<a onClick="agregarCampos()">Agregar mas campos nieri</a>
		<button>ENVIAR</button>
	</div>
</form>
@stop
@section('scripts')
<script>
	var i = 1;
	function agregarCampos(){
		i++;
		$("form #inputs").append('<label for="">Datos</label><input type="text" name="personas[persona'+i+'][nombre]" value="nombre'+i+'"><br><label for="">tipos</label><select name="personas[persona'+i+'][tipo]" id=""><option value="tipo_1">tipo 1</option><option value="tipo_2">tipo 2</option><option value="tipo_3">tipo 3 </option></select><br><label for="">Locaciones</label><input type="text" name="personas[persona'+i+'][locaciones]" value="locacion'+i+'"><br>');
	}
</script>
@stop







