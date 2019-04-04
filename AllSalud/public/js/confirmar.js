function confirmar(message, si, no) {
    $('#confirm .panel>h2').html(message);
    $('#confirm ').fadeIn();
    $('html').css("overflow","hidden");

    $('#confirm #btnYes').click(function() {
        $('#confirm').fadeOut();
        $('html').css("overflow","auto");
        si();
    });
    $('#confirm #btnNo').click(function() {
        $('#confirm').fadeOut();
        $('html').css("overflow","auto");
        no();
    });
}