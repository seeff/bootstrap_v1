// Flexslider
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});


function fade($ele) {
    $ele.fadeIn(1000).delay(3000).fadeOut(1000, function() {
        var $next = $(this).next('.a-testimonial');
        fade($next.length > 0 ? $next : $(this).parent().children().first());
   });
};  

fade($('#testimonials > .a-testimonial').first());
