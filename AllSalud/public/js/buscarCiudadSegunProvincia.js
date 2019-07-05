function buscarCiudadSegunProvincia(id){

			var provinciaId = $(".provincia-select"+id+"").val();
			

				$.ajax({
					headers: {
   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  					},
				data:{provinciaId},
				url:'/buscarCiudadSegunProvincia',
				type:'post',
				dataType:"json",
				success:function(data){
					$(".localidad-select"+id+"").empty();
					$(".localidad-select"+id+"").append('<option value="0">Localidad</option>');
						for(var i in data) {	
								
								$(".localidad-select"+id+"").append("<option value="+data[i].id+"> "+
									data[i].ciudad_nombre+"</option>");				
							}

			



				}
				});

		}


function buscarCiudadesAsignadasEstablecimientoSegunProvincia(id){

			var provinciaId = $(".provincia-select"+id+"").val();
			

				$.ajax({
					headers: {
   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  					},
				data:{provinciaId},
				url:'/buscarCiudadesAsignadasEstablecimientoSegunProvincia',
				type:'post',
				dataType:"json",
				success:function(data){
					$(".localidad-select"+id+"").empty();
					$(".localidad-select"+id+"").append('<option value="0">Localidad</option>');
						for(var i in data) {	
								
								$(".localidad-select"+id+"").append("<option value="+data[i].id+"> "+
									data[i].ciudad_nombre+"</option>");				
							}

			



				}
				});

		}