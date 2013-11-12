$(document).ready(function(){
	$('input[type="radio"]').change(function () {
	    var queryString = $('input[type="radio"]:checked').map(function () {
	        $('#' + this.name).text(this.name + ': ' + this.value);
	        return this.name + '=' + this.value;
	    }).get().join('&');
	    $('#submit').attr('href', function () {
	        return 'https://sockscribemetest.foxycart.com/cart?&' + queryString;
	    });
	});

	
}) 