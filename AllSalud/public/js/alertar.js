function alertar(message,si) {
    $('#alert .panel>h2').html(message);
    $('#alert ').fadeIn();
//    $('#main-content').css("filter","blur(1px)")

    $('#btnAccept').click(function() {
        $('#alert').fadeOut();
  //       $('#main-content').css("filter","");
        si();
        
    });
}