  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();

    if(scroll==0){
    	$("header").removeClass("animated slideInDown");
        /*$("header").removeClass("addBkground");

        $(".xs-row").removeClass("addBkground");

        $("header").addClass("removeBkground");

        $(".xs-row").addClass("removeBkground");
    
        $("header .logo").attr('src','img/logo-white.png');*/
        

    }else{

        

        //$(".xs-row").removeClass("removeBkground");

        $("header").addClass("animated slideInDown");

        //$(".xs-row").addClass("addBkground");

        //$("header .logo").attr('src','img/logo.png');
        
        
    }
    // Do something
});