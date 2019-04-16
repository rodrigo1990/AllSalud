function validarYEnviarMails(){
    		var nombre = $("#nombre").val();
    		var apellido = $("#apellido").val();
    		var tipo_doc = $("#tipo_doc").val();
    		var documento = $("#documento").val();
    		var telefono = $("#telefono").val();
    		var email = $("#email").val();
    		var domicilio = $("#domicilio").val();
    		var numero = $("#numero-piso-depto").val();
    		var provincia = $("#provincia option:selected").val();
    		var localidad =$("#localidad option:selected").val();
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

    		var emailValido=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  			var soloNumeros=/^[0-9]*$/;

    		if(nombre.length==0){
    			$("#nombre-error").fadeIn();
    			nombreEstaValidado=false;
    		}else{
    			$("#nombre-error").fadeOut();
    			nombreEstaValidado=true;
    		}

    		if(apellido.length==0){
    			$("#apellido-error").fadeIn();
    			apellidoEstaValidado=false;
    		}else{
    			$("#apellido-error").fadeOut();
    			apellidoEstaValidado=true;
    		}

    		if(documento.length!=8){
    			$("#documento-error").fadeIn();
    			documentoEstaValidado=false;
    		}else{
    			$("#documento-error").fadeOut();
    			documentoEstaValidado=true;
    		}

    		if(telefono.length==0 || telefono.search(soloNumeros)){
    			$("#telefono-error").fadeIn();
    			telefonoEstaValidado=false;
    		}else{
    			$("#telefono-error").fadeOut();
    			telefonoEstaValidado=true;
    		}

    		if(email.length==0||email.search(emailValido)){
    			$("#email-error").fadeIn();
    			emailEstaValidado=false;
    		}else{
    			$("#email-error").fadeOut();
    			emailEstaValidado=true;
    		}


    		if(domicilio.length==0){
    			$("#domicilio-error").fadeIn();
    			domicilioEstaValidado=false;
    		}else{
    			$("#domicilio-error").fadeOut();
    			domicilioEstaValidado=true;
    		}


    		if(provincia==null || provincia=="null"){
    			$("#provincia-error").fadeIn();
    			provinciaEstaValidado=false;
    		}else{
    			$("#provincia-error").fadeOut();
    			provinciaEstaValidado=true;
    		}


    		if(localidad == null || localidad=="null" || localidad==0){
    			$("#localidad-error").fadeIn();
    			localidadEstaValidado=false;
    		}else{
    			$("#localidad-error").fadeOut();
    			localidadEstaValidado=true;
    		}


    		if(cod_postal.length==0 || cod_postal==null || cod_postal=="null"){
    			$("#cod-postal-error").fadeIn();
    			codPostalEstaValidado=false;
    		}else{
    			$("#cod-postal-error").fadeOut();
    			codPostalEstaValidado=true;
    		}


    		if(nombreEstaValidado==true&&apellidoEstaValidado==true&&documentoEstaValidado==true&&telefonoEstaValidado==true&&emailEstaValidado==true&&domicilioEstaValidado==true&&provinciaEstaValidado==true&&localidadEstaValidado==true&&codPostalEstaValidado==true){

			$( "body" ).prepend( '<div id="preloader"> <div class="preloader"> <span></span> <span></span> <span></span> <span></span> </div> </div>' );

		    		$.ajax({
					headers: {
		   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
					data:{nombre:nombre,apellido:apellido,tipo_doc:tipo_doc,documento:documento,telefono:telefono,email:email,domicilio:domicilio,numero:numero,provincia:provincia,localidad:localidad,cod_postal:cod_postal,consulta:consulta},
					url:'enviarMail',
					type:'post',
					dataType:"json",
					success:function(response){
						$('#preloader .preloader').fadeOut(); // will first fade out the loading animation 
						$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
						$('body').delay(350).css({'overflow':'visible'});
							//alert(response);
							alertar("Email enviado");





						}

					});
			}
    	}