@extends('admin.layouts.principal')
@section('content')
<div class="container">
<table class="table table-hover animated bounceInLeft">
	<thead>
		<tr>
			<th>id</th>
			<th>nombre</th>
			<th>ciudad</th>
			<th>actualizar</th>
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
			<a href="/admin/detalleEstablecimiento/{{$establecimiento->id}}/" >Actulizar/eliminar</a>
		</td>



	</tr>
	
@endforeach

	</tbody>
</table>
</div>
@stop
@section('scripts')
	
<script>

</script>
@stop





<br><br><br>

