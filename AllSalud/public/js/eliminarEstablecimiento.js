
		function eliminarEstablecimiento(id){
		var id = id;
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


					alert("Establecimineto eliminado");


					// similar behavior as an HTTP redirect
					window.location.replace("/admin/getEstablecimientos");
				}

		});
	}

