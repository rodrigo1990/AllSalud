	@extends('layouts.principal')


		




	@section('content')
		@include('slider')
		<div class="row icons">
			<div class="container">
				<ul>
					<li>
						<img src="<?php echo asset("storage/img/1.png")?>"></img> 
						<h5 class="margin-top-20">Confiable y seguro</h5>
					</li>
					<li>
						<img src="<?php echo asset("storage/img/2.png")?>"></img>
						<h5 class="margin-top-20">Especialidad médica</h5> 
					</li>
					<li>
						<img src="<?php echo asset("storage/img/3.png")?>"></img>
						<h5 class="margin-top-20">Atención sanatorial</h5> 
					</li>
				</ul>
			</div>
		</div>



		<div id="conoce-all" class="conoce-all bk-gris padding-60 margin-top-60">
			<div class="container">
				<h1 class="margin-bottom-15">Conocé AllSalud</h1>
				<h3 class="margin-top-10 margin-bottom-15">Red de servicios médicos asistenciales de Argentina</h3>
				<p><b>AllSalud</b> brinda a cada uno de sus socios la posibilidad de <b>elegir libremente la mejor atención médica.</b><br>
				 Con el objetivo de generar un vínculo ideal, <b> AllSalud cuenta con un programa de planes abiertos</b> que <br>
				 brinda acceso directo al mejor servicio de salud con sólo presentar la credencial y el DNI. <br>
				 <b>Vos decidís dónde y con quién atenderte,</b>  en el momento que lo necesites. <br> 
				 Contamos con los reconocidos Centros de Médicos, dando cobertura a todos los niveles de complejidad.
				</p>
			</div>
			<div class="row" id="arrow-row">
				<img src="<?php echo asset("storage/img/arrows-05.png")?>" style="width: 24px" alt="" class="center-block">
			</div>
		</div>

		




		<div id="quiero-ser-socio" class="row quiero-ser-socio margin-top-60">
			<div class="container">
				<div class="col-lg-6 col-sm-12 col-xs-12">
					<img src="<?php echo asset("storage/img/quienes_somos.jpg")?>"" alt="">
				</div>
				<div class="col-lg-6 col-sm-12 col-xs-12">
					<h1 class="margin-bottom-15">Quiero ser socio</h1>
					<p class="margin-bottom-0">Si trabajás en <b>relación de dependencia o sos monotributista, </b> <br>
					podes elegirnos y tu <b>plan estará exento de IVA</b> <i>(de acuerdo a las <br> normas impositivas y vigentes).</i></p>
					<br>
					<p>Además, pueden asociarse todas aquellas personas que, más allá <br>
					de su situación laboral (profesionales, empresarios <br>
					independientes, trabajadores autónomos, amas de casa, etc.) <br>
					que deseen tener nuestra cobertura en todo el Pais.
					</p>
					<br>
					<h3 class="esp"> ¡LLamanos! 3320-8053</h3>
				</div>
			</div>
		</div>
		
		<div id="cartilla" class="row cartilla margin-top-60">
			@include('cartilla')
		</div>
		

		<div id="atencion-al-socio" class="row bk-img margin-top-60">
				<div class="col-sm-12 bk-lightblue atencion-al-socio-cont">
					<div class="container atencion-al-socio">
						<h1 class="margin-bottom-15">Atención al Socio</h1>
						<h3 class="margin-bottom-15">Contactarte con un asesor comercional</h3>
						<div class="nro">
							<h1><img src="<?php echo asset("storage/img/nro-icon.png")?>"></img> 3320-8053</h1>
						</div>
					</div>
				</div>
				

				<div id="contacto" class="col-sm-12 bk-blue contacto-cont">
					<div class="container">
						<div class="col-sm-6">
							<img class="margin-top-50 padding-bottom-30" src="<?php echo asset("storage/img/logo-white-bg.png")?>"></img>
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
	@section('scripts')
	
	<script>
		window.map=0;
		window.interaccionMapa=0;
		window.markers=[];
		window.interaccionPuntoEnMapa=0;
		window.centerGlobal = {lat: -33.989067, lng: -62.826216};

		window.tipoEstablecimientoGlobal = 0;
		window.provinciaGlobal = 0;
		window.ciudadGlobal = 0;
		window.especialidadGlobal = 0;

		
		function buscar(){

			if(tipoEstablecimientoGlobal!=0&&provinciaGlobal!=0&&ciudadGlobal!=0&&especialidadGlobal!=0)
			{

				$.ajax({
				headers: {
   						 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  						},
				data:{tipo_id:tipoEstablecimientoGlobal,ciudad_id:ciudadGlobal,especialidad_id:especialidadGlobal},
				url:'/buscarEstablecimientoPorTipoProvinciaCiudadEspecialidad',
				type:'post',
				dataType:"json",
				success:function(data){

					var k=0;

					var locations=[];

					$(".cartilla .establecimientos").empty();

					

					if(data.length!=0){
						interaccionMapa++;
						for(var i in data) {	
							
							k++;					

							$(".cartilla .establecimientos").append("<li class='animated fadeIn'><div class='col-sm-2 col-xs-2 nro'><span>"+k+"</span></div><div class='col-sm-10 col-xs-10'><p><b>"+
								data[i].nombre+ "</b></p><p>"+data[i].domicilio+" "+data[i].ciudad_nombre+" </p><p>"+data[i].telefono+"</p><a class='float-left detalle-btn' onClick='zoomOnLocation("+data[i].latitud+","+data[i].longitud+")'>Ver mapa</a></div></li>");

							 locations.push([''+data[i].nombre+'<br>'+data[i].domicilio+' '+data[i].ciudad_nombre+'',data[i].latitud,data[i].longitud]);

						}//for


						if(interaccionMapa==1)
							initMap(locations);
						else
							deleteMarkers();
							agregarLocaciones(locations);
							updateZoom(5);

					}else{
						alertar("no hay resultados para esta busqueda =(");
						interaccionMapa=0;
						$("#map-cont").fadeOut(function(){
									$("#map-cont").empty();
									$("#map-cont").fadeIn();

								});

					}

						


					}//success
				});//
			}//if
			else{
				alertar("Seleccione los campos marcados en rojo");
				validarCampos();
			}
		}
		
	
	function validarCampos(){

		if(tipoEstablecimientoGlobal==0){
			$("ul.tipos").css("border","1px solid #fb5151");
		}else{
			$("ul.tipos").css("border","none");
		}

	 	if(provinciaGlobal==0){
			$("#provincia-select1").css("border","1px solid #fb5151");
		}else{
			$("#provincia-select1").css("border","1px solid #00BCD5");	
		}

		 if(ciudadGlobal==0){
			$("#localidad-select1").css("border","1px solid #fb5151");
		}else{
			$("#localidad-select1").css("border","1px solid #00BCD5");
		}

		 if(especialidadGlobal==0){
			$("#especialidad-select").css("border","1px solid #fb5151");
		}else{
			$("#especialidad-select").css("border","1px solid #00BCD5");
		}
	}

	function initMap(locations) {

		/****************CREAR MAPA**********************/
		  var center = centerGlobal;
		  var locations = locations;

		$("#map-cont").append("<div id='map' class='animated bounceInRight'></div>")
		ajustarHeightmap();
		
		map = new google.maps.Map(document.getElementById('map'), {
		    zoom: 5,
		    center: center
		  });


		
		agregarLocaciones(locations);

	
		}



		function agregarLocaciones(locations){
			var infowindow =  new google.maps.InfoWindow({});
			var marker,count;

			map.setZoom(5);
			map.setCenter(centerGlobal);


			for (count = 0; count < locations.length; count++) {
			    marker = new google.maps.Marker({
			      position: new google.maps.LatLng(locations[count][1], locations[count][2]),
			      map: map,
			      title: locations[count][0]
			    });
			google.maps.event.addListener(marker, 'click', (function (marker, count) {
			      return function () {
			        infowindow.setContent(locations[count][0]);
			        infowindow.open(map, marker);
			      }
			    })(marker, count));

				markers.push(marker);
			  	
			  }

		}


		 function setMapOnAll(dataMap) {
	        for (var i = 0; i < markers.length; i++) {
	          markers[i].setMap(dataMap);
	        }
    	  }

	      // Removes the markers from the map, but keeps them in the array.
	      function clearMarkers() {
	        setMapOnAll(null);
	      }

	      // Shows any markers currently in the array.
	      function showMarkers() {
	        setMapOnAll(map);
	      }

	      // Deletes all markers in the array by removing references to them.
	      function deleteMarkers() {
	        clearMarkers();
	        markers = [];
	      }


	      function updateZoom(zoom){
	      	map.setZoom(zoom);
	      }


	      function zoomOnLocation(latitud,longitud){
	      	var center = {lat: latitud, lng: longitud};

	      	map.setCenter(center);
	      	map.setZoom(15);

	
	      }

	      function placeMarker(location) {
	      	deleteMarkers();
			  var marker = new google.maps.Marker({
			      position: location, 
			      map: map
			  });

			markers.push(marker);

			  map.setCenter(location);

			  getCoordinates();

			  


			}


			function getCoordinates(){
				alert(map.getCenter().lat());
	      	  alert(map.getCenter().lng());
			}

		function setTipo(id){
			tipoEstablecimientoGlobal=id;
			$("ul.tipos").css("border","none");
		}
		function setProvincia(){
			var id = $("#provincia-select1").val();
			provinciaGlobal=id;
			ciudadGlobal=0;
			$("#provincia-select1").css("border","1px solid #a9a9a9");

		}

		function setCiudad(){
			var id = $("#localidad-select1").val();
			ciudadGlobal = id;
			$("#localidad-select1").css("border","1px solid #a9a9a9");

		}

		function setEspecialidad(id){
			var id = $("#especialidad-select").val();
			especialidadGlobal=id;
			$("#especialidad-select").css("border","1px solid #a9a9a9");

		}


		function ajustarHeightmap(){
			//$("#map").height($(".cartilla .tipos").height());
		}

			$('ul.tipos li').click(function() {
			    $("ul.tipos li .active").fadeOut();
				$(this).children('.active').fadeIn();
				$(this).css("background","white");
			    
			});
    </script>
    <script>
    	function validarYEnviarMails(){
    		var nombre = $("#nombre").val();
    		var apellido = $("#apellido").val();
    		var tipo_doc = $("#tipo_doc").val();
    		var documento = $("#documento").val();
    		var telefono = $("#telefono").val();
    		var email = $("#email").val();
    		var domicilio = $("#domicilio").val();
    		var numero = $("#numero-piso-depto").val();
    		var provincia = $("#provincia").val();
    		var localidad =$("#localidad").val();
    		var cod_postal = $("#cod_postal").val();
    		var consulta  =$("#consulta").val();

    		var nombreEstaValidado=false;
    		var apellidoEstaValidado=false;
    		var tipoEstaValidado = false;
    		var documentoEstaValidado = false;
    		var telefonoEstaValidado = false;
    		var emailEstaValidado = false;
    		var domicilioEstaValidado = false;
    		//var numeroEstaValidado=false;
    		var provinciaEstaValidado=false;
    		var localidadEstaValidado=false;
    		var codPostalEstaValidado = false;
    		var consultaEstaValidado = false;

    		if(nombre.length==0){
    			$("#nombre-error").fadeIn();
    			nombreEstaValidado=false;
    		}else{
    			$("#nombre-error").fadeOut();
    			nombreEstaValidado=false;
    		}

    		if(apellido.length==0){
    			$("#apellido-error").fadeIn();
    			apellidoEstaValidado=false;
    		}else{
    			$("#apellido-error").fadeOut();
    			apellidoEstaValidado=true;
    		}

    		if(documento.length==8){
    			$("#documento-error").fadeIn();
    			documentoEstaValidado=false;
    		}else{
    			$("#documento-error").fadeOut();
    			documentoEstaValidado=true;
    		}


    		$.ajax({
			headers: {
   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
			data:{nombre:nombre,apellido:apellido,tipo_doc:tipo_doc,documento:documento,telefono:telefono,email:email,domicilio:domicilio,numero:numero,provincia:provincia,localidad:localidad,cod_postal:cod_postal,consulta:consulta},
			url:'/enviarMail',
			type:'post',
			dataType:"json",
			success:function(response){
					//alert(response);
					alertar("Email enviado");


				}

			});
    	}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkne1gpPfJ0B3KrE4OQURwPi492LDjg8g&libraries=places">
    </script>
    @stop
	
	
