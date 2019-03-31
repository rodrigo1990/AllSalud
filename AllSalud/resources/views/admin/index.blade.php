
@extends('admin.layouts.principal')
@section('content')
<form>
	<input class="form-control" type="text" name="username" id="username" placeholder="Ingrese su usuario">
	<input class="form-control" type="password" name="password" id="password" placeholder="Ingrese password">

	<a onClick="login()">INGRESAR</a>
</form>



<script>
		
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
					
					if(response==true)
						window.location.replace("/admin/home");
					else
						alert(response);


				



				}
				});

		}
	</script>
@stop