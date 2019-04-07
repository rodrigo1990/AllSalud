
		function eliminarEstablecimiento(id){
		var id = id;


		confirmar('¿Desea eliminar el establecimiento permanentemente?',
			    function() {
			       $.ajax({
						headers: {
			   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								},
						data:{id:id},
						url:'/admin/deleteEstablecimiento',
						type:'post',
						dataType:"json",
						success:function(data){

								console.log(data);


								alertar("Establecimiento eliminado",function(){
									// similar behavior as an HTTP redirect
									window.location.replace("/admin/getEstablecimientos");

								});


								
							}

					});
			    },
			    function() {
			        // Do something else
			    }
			);









		
	}

