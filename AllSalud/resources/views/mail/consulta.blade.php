<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>ALL SALUD CONSULTAS</title>
</head>
<body>
	    <h1>All salud - Consultas.</h1>	
	<table>
		<tr>
			<td><b>Nombre:</b> {{$consulta->nombre}}</td>
		</tr>
		<tr>
			<td><b>Apellido:</b> {{$consulta->apellido}}</td>
		</tr>
		<tr>
			<td><b>Documento:</b> {{$consulta->documento}} / {{$consulta->tipo_doc}}</td>
		</tr>
		<tr>
			<td><b>Tel:</b> {{$consulta->telefono}}</td>
		</tr>
		<tr>
			<td><b>Mail:</b> {{$consulta->email}}</td>
		</tr>
		<tr>
			<td><b>Domicilio :</b> {{$consulta->domicilio}}</td>
		</tr>
		<tr>
			<td><b>Numero:</b> {{$consulta->numero}}</td>
		</tr>
		<tr>
			<td><b>Provincia:</b> {{$consulta->provincia}}</td>
		</tr>
		<tr>
			<td><b>Localidad:</b> {{$consulta->localidad}}</td>
		</tr>
		<tr>
			<td><b>Cod. Postal:</b> {{$consulta->cod_postal}}</td>
		</tr>
		<tr>
			<td><b>Consulta:</b> {{$consulta->consulta}}</td>

		</tr>
		
	</table>


    
    
</body>
</html>