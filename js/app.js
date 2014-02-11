$(window).load(function() {


	$('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
	});

	$('input:radio[name="name"]').change(function(){
	    if($(this).val() == 'Month to Month'){
	       $( "#checkout-button" ).before( "<input type=\"hidden\" name=\"price\" value=\"12.00\"<\/input>\r\n<input type=\"hidden\" name=\"sub_frequency\" value=\"1m\"><\/input>\r\n<input type=\"hidden\" name=\"category\" value=\"MonthToMonth\">\r\n<input type=\"hidden\" name=\"code\" value=\"month_to_month\"><\/input>\r\n<input type=\"hidden\" name=\"2:code\" value=\"month_to_month\"><\/input>"); 
	    }if($(this).val() == 'Month to Month - Hello Giggles'){
	       $( "#checkout-button" ).before( "<input type=\"hidden\" name=\"price\" value=\"12.00\"<\/input>\r\n<input type=\"hidden\" name=\"sub_frequency\" value=\"1m\"><\/input>\r\n<input type=\"hidden\" name=\"category\" value=\"MonthToMonthHelloGiggles\">"); 
	    } if ($(this).val() == 'Six Months Subscription'){
	       $( "#checkout-button" ).before( "<input type=\"hidden\" name=\"sub_enddate\" value=\""+sixMonthsDate+"\"><\/input>\r\n <input type=\"hidden\" name=\"price\" value=\"0.00\"><\/input>\r\n<input type=\"hidden\" name=\"sub_frequency\" value=\"1m\"><\/input>\r\n<input type=\"hidden\" name=\"code\" value=\"free\"><\/input>\r\n<input type=\"hidden\" name=\"2:name\" value=\"Six Months Subscription Paid\"><\/input>\r\n<input type=\"hidden\" name=\"2:price\" value=\"72.00\"><\/input>\r\n<input type=\"hidden\" name=\"2:code\" value=\"6m\"><\/input>\r\n<input type=\"hidden\" name=\"2:category\" value=\"SixMonths\"><\/input>\r\n");
	    } if ($(this).val() == 'Twelve Months Subscription'){
	       $( "#checkout-button" ).before( "<input type=\"hidden\" name=\"sub_enddate\" value=\""+twelveMonthsDate+"\"><\/input>\r\n"+"<input type=\"hidden\" name=\"price\" value=\"0.00\"><\/input>\r\n<input type=\"hidden\" name=\"sub_frequency\" value=\"1m\"><\/input>\r\n<input type=\"hidden\" name=\"code\" value=\"free\"><\/input>\r\n<input type=\"hidden\" name=\"2:name\" value=\"Twelve Months Subscription Paid\"><\/input>\r\n<input type=\"hidden\" name=\"2:price\" value=\"144.00\"><\/input>\r\n<input type=\"hidden\" name=\"2:code\" value=\"12m\"><\/input>\r\n<input type=\"hidden\" name=\"2:category\" value=\"TwelveMonths\"><\/input>");

	    }
	});

    



    $(".imgLiquidFill").imgLiquid({fill:true, horizontalAlign:'center', verticalAlign:'center'});

	



	$(".radio-duration").click(function() {
		// $(".check-duration").css("color", "#1abc9c");
		// $(".check-duration").css("display", "inline-block");
		$(".duration-button").html("Select\<span class\=\"fui\-arrow\-right\"\>\<\/span\>");
		$(this).children(".duration-button").text("Selected");
		$('.radio-duration').not(this).stop().animate({
	        opacity: 0.4
	    }, 150);
	    // Make this opaque
	    $(this).stop().animate({
	        opacity: 1.0
	    }, 150);
		// var divID = '.gender-scroll' + this.id;
		// $('html, body').animate({
		// 	scrollTop: $(divID).offset().top
		// }, 1000);
		
		// $( this.children(".selected")).addClass("hidden");
	});

	// $('.radio-duration').hover(function() {
	//     // Make all images (except this) transparent
	//     $('.radio-duration').not(this).stop().animate({
	//         opacity: 0.4
	//     }, 150);
	//     // Make this opaque
	//     $(this).stop().animate({
	//         opacity: 1.0
	//     }, 150);
	// });

	$(".radio-gender").click(function() {
		// $(".check-gender").css("color", "#1abc9c");
		// $(".check-gender").css("display", "inline-block");
		$(".gender-button").html("Select\<span class\=\"fui\-arrow\-right\"\>\<\/span\>");
		$(this).children(".gender-button").text("Selected");
		$('.radio-gender').not(this).stop().animate({
	        opacity: 0.4
	    }, 150);
	    // Make this opaque
	    $(this).stop().animate({
	        opacity: 1.0
	    }, 150);
		// var divID = '.style-scroll' + this.id;
		// $('html, body').animate({
		// 	scrollTop: $(divID).offset().top
		// }, 1000);
	});
	// $('.radio-gender').hover(function() {
	//     // Make all images (except this) transparent
	//     $('.radio-gender').not(this).stop().animate({
	//         opacity: 0.4
	//     }, 150);
	//     // Make this opaque
	//     $(this).stop().animate({
	//         opacity: 1.0
	//     }, 150);
	// });

	$(".radio-style").click(function() {
		$(".check-style").css("color", "#1abc9c");
		$(".check-style").css("display", "inline-block");
		$(".style-button").html("Select\<span class\=\"fui\-arrow\-right\"\>\<\/span\>");
		$(this).children(".style-button").text("Selected");
		$('.radio-style').not(this).stop().animate({
	        opacity: 0.4
	    }, 150);
	    // Make this opaque
	    $(this).stop().animate({
	        opacity: 1.0
	    }, 150);		// var divID = '.submit-scroll' + this.id;
		// $('html, body').animate({
		// 	scrollTop: $(divID).offset().top
		// }, 1000);
		
	});






    $(".duration-container :radio").hide().click(function(e){
	    e.stopPropagation();
	});
	$(".duration-container div").click(function(e){
	    $(this).closest(".duration-container").find("div").removeClass("selected-div");
	    $(this).addClass("selected-div").find(":radio").click();
	});$(".duration-container :radio").hide().click(function(e){
	    e.stopPropagation();
	});
	$(".duration-container div").click(function(e){
	    $(this).closest(".duration-container").find("div").removeClass("selected-div");
	    $(this).addClass("selected-div").find(":radio").click();
	});



    $(".gender-container :radio").hide().click(function(e){
	    e.stopPropagation();
	});
	$(".gender-container div").click(function(e){
	    $(this).closest(".gender-container").find("div").removeClass("selected-div");
	    $(this).addClass("selected-div").find(":radio").click();
	});$(".gender-container :radio").hide().click(function(e){
	    e.stopPropagation();
	});
	$(".gender-container div").click(function(e){
	    $(this).closest(".gender-container").find("div").removeClass("selected-div");
	    $(this).addClass("selected-div").find(":radio").click();
	});


	    $(".style-container :radio").hide().click(function(e){
	    e.stopPropagation();
	});
	$(".style-container div").click(function(e){
	    $(this).closest(".style-container").find("div").removeClass("selected-div");
	    $(this).addClass("selected-div").find(":radio").click();
	});$(".style-container :radio").hide().click(function(e){
	    e.stopPropagation();
	});
	$(".style-container div").click(function(e){
	    $(this).closest(".style-container").find("div").removeClass("selected-div");
	    $(this).addClass("selected-div").find(":radio").click();
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

// Customization stuff
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var num_fieldset = 1;

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	current_fs = $('fieldset:nth-of-type(' + num_fieldset + ')');
	num_fieldset += 1;
	next_fs = $('fieldset:nth-of-type(' + num_fieldset + ')');

	
	// current_fs = $(this).parent().parent().parent();
	// next_fs = current_fs.next(); 
 // 	console.log(current_fs);
	// console.log(next_fs);
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
	
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $('fieldset:nth-of-type(' + num_fieldset + ')');
	num_fieldset -= 1;
	previous_fs = $('fieldset:nth-of-type(' + num_fieldset + ')');
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})


// Mailchimp stuff
var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == 'complete') mce_preload_check();
        }    
    }
}

var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
}
var head= document.getElementsByTagName('head')[0];
var style= document.createElement('style');
style.type= 'text/css';
if (style.styleSheet) {
  style.styleSheet.cssText = err_style;
} else {
  style.appendChild(document.createTextNode(err_style));
}
head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
    head.appendChild(script);
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    jQuery(document).ready( function($) {
      var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: 'http://sockscribe.us5.list-manage.com/subscribe/post-json?u=2cba5c3a551b962f52453c787&id=af6ab3ce00&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $('#mce_tmp_error_msg').remove();
                        $('.datefield','#mc_embed_signup').each(
                            function(){
                                var txt = 'filled';
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        var bday = false;
                                        if (fields.length == 2){
                                            bday = true;
                                            fields[2] = {'value':1970};//trick birthdays into having years
                                        }
                                    	if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                    		this.value = '';
									    } else if ( fields[0].value=='' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                    		this.value = '';
									    } else {
									        if (/\[day\]/.test(fields[0].name)){
    	                                        this.value = fields[1].value+'/'+fields[0].value+'/'+fields[2].value;									        
									        } else {
    	                                        this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
	                                        }
	                                    }
                                    });
                            });
                        $('.phonefield-us','#mc_embed_signup').each(
                            function(){
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        if ( fields[0].value.length != 3 || fields[1].value.length!=3 || fields[2].value.length!=4 ){
                                    		this.value = '';
									    } else {
									        this.value = 'filled';
	                                    }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $('#mc-embedded-subscribe-form').ajaxForm(options);
      
      
    });
}
function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
    	});
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';
                
                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
}





// Google analytics
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-37881563-1']);
    _gaq.push(['_setDomainName', 'sockscribe.me']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();



// Adroll stuff
  adroll_adv_id = "YY264IYFJRDEHFPKSUQ44L";
  adroll_pix_id = "3JYLNKRA2JC4JATUGXLC2L";
  (function () {
  var oldonload = window.onload;
  window.onload = function(){
     __adroll_loaded=true;
     var scr = document.createElement("script");
     var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
     scr.setAttribute('async', 'true');
     scr.type = "text/javascript";
     scr.src = host + "/j/roundtrip.js";
     ((document.getElementsByTagName('head') || [null])[0] ||
      document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
     if(oldonload){oldonload()}};
  }());


