

// Add smooth scrolling on all links inside the navbar
$(".scroll-spy").on('click', function(event) {

  $('header a').removeClass('active');
  $(this).addClass('active');

  // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    var top = (($(hash).offset().top)-120);

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: top
    }, 700, function(){


    // Add hash (#) to URL when done scrolling (default click behavior)
     // window.location.hash = hash;
    });

  } // End if

});

