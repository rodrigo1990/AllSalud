function alertar(message) {
    $('#alert .panel>h2').html(message);
    $('#alert ').fadeIn();

    $('#btnAccept').click(function() {
        $('#alert').fadeOut();
        si();
    });
}