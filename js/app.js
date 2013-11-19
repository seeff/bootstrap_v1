// Flexslider
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });


	var num = 10; //number of pixels before modifying styles

	$(window).bind('scroll', function () {
	    if ($(window).scrollTop() > num) {
	        $('.navbar').addClass('navbar-condensed');
	        $('.navbar .navbar-brand').addClass('navbar-brand-condensed');
	        $('.navbar-nav').addClass('navbar-nav-condensed');
	    } else {
			$('.navbar').removeClass('navbar-condensed');
	        $('.navbar .navbar-brand').removeClass('navbar-brand-condensed');
	        $('.navbar-nav').removeClass('navbar-nav-condensed');

	    }
	});

	//USE SCROLL WHEEL FOR THIS FIDDLE DEMO



});


function fade($ele) {
    $ele.fadeIn(1000).delay(2000).fadeOut(1000, function() {
        var $next = $(this).next('.a-testimonial');
        fade($next.length > 0 ? $next : $(this).parent().children().first());
   });
};  

fade($('#testimonials > .a-testimonial').first());
