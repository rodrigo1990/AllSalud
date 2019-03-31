@extends('admin.layouts.principal')
@section('content')
<table>
	<thead>
		<tr>
			<th>id</th>
			<th>nombre</th>
			<th>ciudad</th>
			<th>actualizar/eliminar</th>
		</tr>
	</thead>
	<tbody>


@foreach($establecimientos as $establecimiento)
	<tr>
		<td>{{$establecimiento->id}}</td>
		<td>{{$establecimiento->nombre}}</td>
		<td>
			@foreach($establecimiento->Domicilio as $domicilio)
				{{$domicilio->ciudad_nombre}}
			@endforeach
		</td>
		<td>
			<a href="/admin/detalleEstablecimiento/{{$establecimiento->id}}/" target="_blank">Actulizar/eliminar</a>
		</td>
		


	</tr>
	
@endforeach

	</tbody>
</table>
@stop






<br><br><br>

