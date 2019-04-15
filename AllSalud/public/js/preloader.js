function preloader(){
		$( "body" ).prepend( '<div id="preloader"> <div class="preloader"> <span></span> <span></span> <span></span> <span></span> </div> </div>' );

		$(window).on('load', function() { // makes sure the whole site is loaded 
			
			$('#preloader .preloader').fadeOut(); // will first fade out the loading animation 
			$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
			$('body').delay(350).css({'overflow':'visible'});

		});
	}

