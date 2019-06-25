


<div id="cartilla-modal" class="modal fade" role="dialog">
 <div class="container" id="cartilla-panel">
 	<div class="row close-row margin-top-10">
 		 <button type="button" class="close" data-dismiss="modal">&times;</button>
 	</div>
				<h1 class="text-center margin-bottom-15 margin-top-30">Cartilla AllSalud</h1>
				<h2 class="text-center margin-bottom-30">Encontrá lo que necesitás de manera rápida y simple.</h2>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<ul class="text-center tipos">
						<li class="title text-left"><h3>BUSCÁ EN CARTILLA</h3></li>
						
						<li class="text-center filter">
							<a onClick="ordenarCampos('especialidades');setTipo(0);">
								<h4>Especialidades</h4>
							</a>
						</li>
						<li class="text-center filter">
							<a  onClick="ordenarCampos('zonas');setTipo(0);">
								<h4>Zonas</h4>
							</a>
						</li>
						@foreach($tipos as $tipo)
							<li class="text-left">
								<div class="active"></div>
								<a class="tipo-link" onClick="setTipo({{$tipo->id}});">
									<h4>{{$tipo->descripcion}}</h4>
								</a>
							</li>	
						@endforeach

					</ul>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form">
					
					<div class="row campos_especialidades-zonas">
						<!--  <select name="provincias" id="provincia-select1" class=' provincia-select1 form-control' onChange="buscarCiudadSegunProvincia(1);setProvincia();">
							<option value="" selected>Provincia</option>
							@foreach($provincias as $item)
								<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>
							@endforeach
						</select>

						<select name="localidad" id="localidad-select1" class='localidad-select1 form-control' onChange="setCiudad()">
							<option value="">Seleccion localidad</option>
						</select>

						<select name="especialidad" id="especialidad-select" class='form-control' onChange="setEspecialidad()">
							<option value="">Seleccione una Especialidad</option>
							@foreach($especialidades as $especialidad)
								<option value="{{$especialidad->id}}">{{$especialidad->descripcion}}</option>
							@endforeach
						</select>

						<a class="buscar-btn" onClick="buscar()"><i class="fas fa-search"></i></a>-->
					</div>
					<div class="row">
						<div class="col-sm-6 padding-left-0 padding-right-0">
							<ul class="establecimientos padding-left-0 ">
								
							</ul>
						</div>
						<div class="col-sm-6  padding-right-0" id="map-cont">

						</div>
					</div>

				</div>
			</div>
</div>