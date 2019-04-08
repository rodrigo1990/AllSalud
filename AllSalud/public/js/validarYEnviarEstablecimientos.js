
		function validarEnviar(){
			
			var nombre  = $("#nombre").val();
			var tipo = $("#tipo-select").children("option:selected").val();
			var nombreEstaValidado=false;
			var tipoEstaValidado=false;
			//contendra todos los inputs de locacion
			var inputs=[];

	



			if(nombre==0 || nombre==null){
				$("#error-nombre").fadeIn();
				nombreEstaValidado=false;
				}
			else{
				$("#error-nombre").fadeOut();
				nombreEstaValidado=true;
				}


			if(tipo==0 || tipo=="null"){
				$("#error-tipo").fadeIn();
				tipoEstaValidado=false;
			}
			else{
				$("#error-tipo").fadeOut();
				tipoEstaValidado=true;
			}


			$(".domicilio-domicilio").each(function(i){
				var input =  {
	  					id:null,
	  					tipo: null,
	  					estado:null
	  					};

	  			var val = $(this).val();   
	  			var id = $(this).attr('id');
	  			input.id=id;
	  			input.tipo="domicilio";
	  			
	  			
	  			
	  			if(val==0 || null){
	  				$("#error-domicilio-"+id+"").fadeIn();
	  				input.estado = false;
	  				}
	  			else{
	  				$("#error-domicilio-"+id+"").fadeOut();
	  				input.estado = true;
	  				}

  				inputs.push(input);


  			});//each

			$(".domicilio-telefono").each(function(i){
				var input =  {
	  					id:null,
	  					tipo: null,
	  					estado:null
	  					};

	  			var val = $(this).val();   
	  			var id = $(this).attr('id');
	  			input.id=id;
	  			input.tipo="telefono";

	  			if(val==0 || null){
	  				$("#error-telefono-"+id+"").fadeIn();
	  				input.estado = false;

	  				}
	  			else{
	  				$("#error-telefono-"+id+"").fadeOut();
	  				input.estado = true;
	  				}
	  				inputs.push(input);

  			});//each

  			$(".domicilio-provincia").each(function(i){
  				var input =  {
	  					id:null,
	  					tipo: null,
	  					estado:null
	  					};

	  			var val = $(this).val();   
	  			var id = $(this).attr('id');
	  			input.id=id;
	  			input.tipo="provincia";

	  			if(val==0 || null){
	  				$("#error-provincia-"+id+"").fadeIn();
	  				input.estado = false;

	  				}
	  			else{
	  				$("#error-provincia-"+id+"").fadeOut();
	  				input.estado = true;
	  				}
	  				inputs.push(input);

  			});//each

  			$(".domicilio-localidad").each(function(i){
  				var input =  {
	  					id:null,
	  					tipo: null,
	  					estado:null
	  					};

	  			var val = $(this).val();   
	  			var id = $(this).attr('id');
	  			input.id=id;
	  			input.tipo="localidad";

	  			if(val==0 || null){
	  				$("#error-localidad-"+id+"").fadeIn();
	  				input.estado = false;

	  				}
	  			else{
	  				$("#error-localidad-"+id+"").fadeOut();
	  				input.estado = true;
	  				}
	  				inputs.push(input);

  			});//each



			if(inputs.every(sonTodosVerdaderos)==true && nombreEstaValidado==true &&tipoEstaValidado==true){
				$("form").submit();
			}else{

			alertar("Tiene campos invalidos <br> ¡revise!");
			}	
  			
			
		}//f

			function sonTodosVerdaderos(currentValue) {
			  return currentValue.estado == true;
			}