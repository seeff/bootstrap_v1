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




function padWithZero(value) {
    if (value < 10) {
        return '0' + value;
    }
    return value;
}


    var end_date_6months = new Date();
    end_date_6months.setMonth(end_date_6months.getMonth() + 6);
    sub_enddate_6months = end_date_6months.getFullYear() + padWithZero(end_date_6months.getMonth() + 1) + padWithZero(end_date_6months.getDate() + 1);
    jQuery("input[id=6months]").val("Six%20Months%20Subscription&price=72.00&code=6m&cart=checkout&2:name=Six%20Months%20Subscription%20Free&2:price=0.00&2:sub_frequency=1m&2:code=free&2:sub_enddate=" + sub_enddate_6months);



    var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
    var day = currentDate.getDate()
    var month = currentDate.getMonth() + 1
    var year = currentDate.getFullYear() + 1
    jQuery("input[id=12months]").val("Twelve%20Months%20Subscription&price=144.00&code=12m&cart=checkout&2:name=Twelve%20Months%20Subscription%20Free&2:price=0.00&2:sub_frequency=1m&2:code=free&2:sub_enddate=" + year + month + day);
})