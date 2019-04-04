function logout(){
				var id=0;
				$.ajax({
					headers: {
	   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  					},
					url:'/logout',
					type:'get',
					dataType:"json",
					success:function(response){

						window.location.href = "/admin";


					



					}//success
				});//ajax
}