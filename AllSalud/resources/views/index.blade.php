	@extends('layouts.principal')


		




	@section('content')
		@include('slider')
		<div class="row icons">
			<div class="container">
				<ul>
					<li>
						<img src="<?php echo asset("storage/img/1.png")?>"></img> 
						<h5>Confiable y seguro</h5>
					</li>
					<li>
						<img src="<?php echo asset("storage/img/2.png")?>"></img>
						<h5>Especialidad médica</h5> 
					</li>
					<li>
						<img src="<?php echo asset("storage/img/3.png")?>"></img>
						<h5>Atención sanatorial</h5> 
					</li>
				</ul>
			</div>
		</div>



		<div class="conoce-all bk-gris">
			<div class="container">
				<h1>Conocé AllSalud</h1>
				<h3>Red de servicios médicos asistenciales de Argentina</h3>
				<p><b>AllSalud</b> brinda a cada uno de sus socios la posibilidad de <b>elegir libremente la mejor atención médica.</b><br>
				 Con el objetivo de generar un vínculo ideal, <b> AllSalud cuenta con un programa de planes abiertos</b> que <br>
				 brinda acceso directo al mejor servicio de salud con sólo presentar la credencial y el DNI. <br>
				 <b>Vos decidís dónde y con quién atenderte,</b>  en el momento que lo necesites. <br> 
				 Contamos con los reconocidos Centros de Médicos, dando cobertura a todos los niveles de complejidad.
				</p>
			</div>
		</div>




		<div class="row quiero-ser-socio">
			<div class="container">
				<div class="col-sm-6">
					
				</div>
				<div class="col-sm-6">
					<h1>Quiero ser socio</h1>
					<p>Si trabajás en <b>relación de dependencia o sos monotributista, </b> <br>
					podes elegirnos y tu <b>plan estará exento de IVA</b> <i>(de acuerdo a las <br> normas impositivas y vigentes).</i></p>
					<br>
					<p>Además, pueden asociarse todas aquellas personas que, más allá <br>
					de su situación laboral (profesionales, empresarios <br>
					independientes, trabajadores autónomos, amas de casa, etc.) <br>
					que deseen tener nuestra cobertura en todo el Pais.
					</p>
					<br>
					<h4 class="esp"> ¡LLamanos! 3320-8053</h4>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="container">
				<select name="provincias" id="provincia-select" class='' onChange="buscarCiudadSegunProvincia()">
							<option value="" selected>Selecciona tu provincia</option>
							@foreach($provincias as $item)
								<option value="{{$item->id}}">{{$item->provincia_nombre}}</option>
							@endforeach
						</select>
			</div>
		</div>
		

		<div class="row bk-img">
				<div class="col-sm-12 bk-lightblue atencion-al-socio-cont">
					<div class="container atencion-al-socio">
						<h2>Atención al Socio</h2>
						<h3>Contactarte con un asesor comercional</h3>
						<div class="nro">
							<img src="<?php echo asset("storage/img/nro-icon.png")?>"></img>
							&nbsp
							<h1>3320-8053</h1>
						</div>
					</div>
				</div>
				

				<div class="col-sm-12 bk-blue contacto-cont">
					<div class="container">
						<div class="col-sm-6">
							<img src="<?php echo asset("storage/img/logo-white.png")?>"></img>
							<h4>Para conocer más sobre las <br> diferentes opciones para ser <br> socio, <b>te invitamos a contactarte  <br> con un asesor comercial.</b>   </h4>
						</div>
						<div class="col-sm-6">
							@include('formulario')
						</div>
					</div>
				</div>
		</div>


	@include('footer')
	@stop
	
