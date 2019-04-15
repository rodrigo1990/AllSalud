<div class="row form">
		

		
		<form action="enviarMail" method="POST">
		@csrf
	  	<h1 class="text-left">Dejanos tu consulta</h1>		
	  			<div class="row">
	  				<div class="col-sm-6">
	  					<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
	  					<div class="error" id="nombre-error">Ingrese un nombre</div>
	  				</div>
	  				<div class="col-sm-6">
	  					<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
	  					<div class="error" id="apellido-error">Ingrese un apellido</div>
	  				</div>
	  			</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="col-lg-3 col-sm-6 no-padding">
							<select name="tipo_doc" id="tipo_doc" class="form-control form-small">
				  				<option value="DNI">DNI</option>
				  				<option value="DOC_EXT">DOC_EXT</option>
				  				<option value="LC">LC</option>
				  				<option value="CI">CI</option>
				  				<option value="LE">LE</option>
		  					</select>		
		  					<div class="error" id="tipo-error">Ingrese un tipo de evento</div>
						</div>
						<div class="col-lg-9 col-sm-6 padding-right-0">
							<input type="text" class="form-control" name="documento" id="documento" placeholder="N° de doc">
		  					<div class="error" id="documento-error">Ingrese un documento</div>	
						</div>
	  				</div>
	  				<div class="col-sm-6">
	  					<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Tel de contacto">
	  					<div class="error" id="telefono-error">Ingrese un telefono</div>		
	  				</div>
	  			</div>



	  			<div class="row">
	  				<div class="col-sm-12">
	  					<input type="text" class="form-control" name="email" id="email"placeholder="Mail">
	  					<div class="error" id="email-error">Ingrese un email valido</div>
	  				</div>
	  			</div>

	  			<div class="row">
	  				<div class="col-sm-12">
	  					<input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio particular">
	  					<div class="error" id="domicilio-error">Ingrese un domicilio valido</div>
	  				</div>
	  			</div>


	  			<div class="row">
	  				<div class="col-sm-12">
	  					<div class="col-sm-6 no-padding">
	  						<input type="text" class="form-control" name="altura" id="numero-piso-depto" placeholder="Nro Dpto">
	  						
	  					</div>
	  					<div class="col-sm-6 padding-right-0">
	  						<select  class="form-control provincia-selectcont" name="provincia" id="provincia" onChange="buscarCiudadSegunProvincia('cont')">
	  							<option value="null">Seleccione una provincia</option>
	  							@foreach($provincias as $provincia)
	  								<option value="{{$provincia->id}}">{{$provincia->provincia_nombre}}</option>
	  							@endforeach
	  						</select>
	  						<div class="error" id="provincia-error">Ingrese una provincia valida</div>
	  					</div>
	  					
	  				</div>
	  			</div>
				
				<div class="row">
	  				<div class="col-sm-12">
	  					<div class="col-sm-6 no-padding">
	  						<select  class="form-control localidad-selectcont" name="localidad" id="localidad" >
	  							<option value="null">Seleccione una localidad</option>
	  						</select>
	  						<div class="error" id="localidad-error">Ingrese una localidad valida</div>
	  					</div>
	  					<div class="col-sm-6 padding-right-0">
	  						<input type="text" class="form-control" name="cod_postal" id="cod_postal" placeholder="Cod. Postal">
	  						<div class="error" id="cod-postal-error">Ingrese un codigo postal valido</div>
	  					</div>
	  					
	  				</div>
	  			</div>
	  			
	  			<div class="row">
	  				<div class="col-sm-12">
	  					<label for="comentarios">Consulta:</label>
	  					<textarea name="consulta" id="consulta" cols="30" rows="5" id="comentarios" class="form-control"></textarea>		
	  				</div>
	  			</div>

	  			<div class="row">
	  				<div class="col-sm-12">
	  					
	  					<a class="btn" onClick="validarYEnviarMails()">Enviar</a>
	  					 <!-- <button>Enviar</button> -->		
	  				</div>
	  			</div>
	  		</form>
	</div>