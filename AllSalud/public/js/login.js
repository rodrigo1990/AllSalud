		
		function login(){

			var username = $("#username").val();
			var password = $("#password").val();

		
				$.ajax({
					headers: {
   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  					},
				data:{username:username,password:password},
				url:'/login',
				type:'post',
				dataType:"json",
				success:function(response){




					
					if(response==true){
						 $("#login").fadeOut(function(){
					    $(".main").fadeIn();
					  });
						
						
					}else{
						alert(response);
					}


				



				}//success
				});//ajax

		}