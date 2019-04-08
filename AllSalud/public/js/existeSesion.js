function existeSesion(){
	$.ajax({
			headers: {
   					 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  					},
				data:{algo:null},
				url:'/admin/existeSesion',
				type:'post',
				dataType:"json",
				success:function(response){




					
					if(response=="true"){
						 $("#login").fadeOut(function(){
					    	$(".main").fadeIn();
					 	 });
						
						
					}else{
						$("#login").fadeIn();
					}


				



				}//success
				});//ajax

}