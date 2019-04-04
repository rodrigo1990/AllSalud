

//id_locacion lo usaremos para borrar la locacion de la base de datos
		function eliminarLocacion(id_locacion,mapa_id){
		
		if(id_locacion != null){

			var idLocacion = id_locacion;

			//alert("eliminara una locacion permanente");

			confirmar('¿Desea eliminar la locacion permanentemente?',
			    function() {
			        $.ajax({
			headers: {
   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
			data:{idLocacion:idLocacion},
			url:'/admin/deleteLocacion',
			type:'post',
			dataType:"json",
			success:function(data){

					console.log(data);


					//alert("Locacion eliminada");

					 $("#locacion"+mapa_id+"").fadeOut(function(){
					    $("#locacion"+mapa_id+"").remove();
					  });


				}

			});
			    },
			    function() {
			        // Do something else
			    }
			);

			

		}else{
		
			 $("#locacion"+mapa_id+"").fadeOut(function(){
			    $("#locacion"+mapa_id+"").remove();
			  });

		 }

	

		

		console.log(y);
	}
