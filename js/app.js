// Flexslider
$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide"
	});


	$(".radio-duration").click(function() {
		$(".check-duration").css("color", "#1abc9c");
		$(".check-duration").css("display", "inline-block");
		$(".duration-button").html("Select\<span class\=\"fui\-arrow\-right\"\>\<\/span\>");
		$(this).children(".duration-button").text("Selected");
		var divID = '.gender-scroll' + this.id;
		$('html, body').animate({
			scrollTop: $(divID).offset().top
		}, 1000);
		$('.radio-duration').not(this).stop().animate({
	        opacity: 0.4
	    }, 150);
	    // Make this opaque
	    $(this).stop().animate({
	        opacity: 1.0
	    }, 150);
		// $( this.children(".selected")).addClass("hidden");
	});

	$('.radio-duration').hover(function() {
	    // Make all images (except this) transparent
	    $('.radio-duration').not(this).stop().animate({
	        opacity: 0.4
	    }, 150);
	    // Make this opaque
	    $(this).stop().animate({
	        opacity: 1.0
	    }, 150);
	});

	$(".radio-gender").click(function() {
		$(".check-gender").css("color", "#1abc9c");
		$(".check-gender").css("display", "inline-block");
		$(".gender-button").html("Select\<span class\=\"fui\-arrow\-right\"\>\<\/span\>");
		$(this).children(".gender-button").text("Selected");
		var divID = '.style-scroll' + this.id;
		$('html, body').animate({
			scrollTop: $(divID).offset().top
		}, 1000);
		$('.radio-gender').not(this).stop().animate({
	        opacity: 0.4
	    }, 150);
	    // Make this opaque
	    $(this).stop().animate({
	        opacity: 1.0
	    }, 150);
	});
	$('.radio-gender').hover(function() {
	    // Make all images (except this) transparent
	    $('.radio-gender').not(this).stop().animate({
	        opacity: 0.4
	    }, 150);
	    // Make this opaque
	    $(this).stop().animate({
	        opacity: 1.0
	    }, 150);
	});

	$(".radio-style").click(function() {
		$(".check-style").css("color", "#1abc9c");
		$(".check-style").css("display", "inline-block");
		$(".style-button").html("Select\<span class\=\"fui\-arrow\-right\"\>\<\/span\>");
		$(this).children(".style-button").text("Selected");
		var divID = '.submit-scroll' + this.id;
		$('html, body').animate({
			scrollTop: $(divID).offset().top
		}, 1000);
		$('.radio-style').not(this).stop().animate({
	        opacity: 0.4
	    }, 150);
	    // Make this opaque
	    $(this).stop().animate({
	        opacity: 1.0
	    }, 150);
	});

	$('.radio-style').hover(function() {
	    // Make all images (except this) transparent
	    $('.radio-style').not(this).stop().animate({
	        opacity: 0.4
	    }, 150);
	    // Make this opaque
	    $(this).stop().animate({
	        opacity: 1.0
	    }, 150);
	});
});
var num = 10; //number of pixels before modifying styles
if ($(window).width() > 767) {
	$(window).bind('scroll', function() {
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
}
//USE SCROLL WHEEL FOR THIS FIDDLE DEMO

function fade($ele) {
	$ele.fadeIn(1000).delay(2000).fadeOut(1000, function() {
		var $next = $(this).next('.a-testimonial');
		fade($next.length > 0 ? $next : $(this).parent().children().first());
	});
}
fade($('#testimonials > .a-testimonial').first());