// Flexslider
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });


	var num = 110; //number of pixels before modifying styles

	$(window).bind('scroll', function () {
	    if ($(window).scrollTop() > num) {
	        $('.navbar').addClass('fixed');
	        $('.navbar').css("padding-bottom", "5px");
	        $('.navbar .navbar-brand').css("padding", "0");
	        $('.navbar .navbar-brand').css("padding-top", "5px");
	        $('.navbar-nav').css("margin-top", "0px");

	        
	    } else {
	        $('.navbar').removeClass('fixed');
	        $('.navbar .navbar-brand').css("padding", "23px 28px 24px 17px");
	        $('.navbar-nav').css("margin-top", "15px");
	        $('.navbar').css("padding-bottom", "inherit");

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
