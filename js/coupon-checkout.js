FC.checkout.InitCoupon = function() {
 
    jQuery('#apply_coupon').unbind('click').click(function(){
        var coupon = jQuery('#coupon_code').val();
        if (coupon != '') {
            FC.checkout.ApplyCoupon(coupon);
        } else {
            alert('Please enter a coupon code.');
        }
    });
}
 
FC.checkout.AddCoupon = function() {
    jQuery("#coupon_code, #apply_coupon").toggle();
    if (jQuery("#coupon_code").is(":visible")) {
        jQuery("#coupon_code")[0].focus();
    }
}
 
FC.checkout.ApplyCoupon = function(coupon) {
    jQuery('#apply_coupon').html('Loading...');
    jQuery.getJSON('https://' + window.location.hostname + '/cart?output=json&' + FC.checkout.config.session + '&coupon=' + coupon + '&callback=?',
        function(data) {
            if (data.messages.errors.length > 0) {
                alert("We're sorry. An error occurred: " + data.messages.errors[0]);
            } else {
                FC.checkout.BuildCouponTR(data.coupons);
            }
            jQuery('#apply_coupon').html('Apply!');
        }
    );
}
 
FC.checkout.BuildCouponTR = function(coupons) {
    var colspan = jQuery("#fc_cart_foot_total .col-xs-8").attr("colspan");
    fc_cart_foot_discounts = '';
    FC.checkout.config.orderDiscount = 0;
    for (var coupon in coupons) {
        fc_cart_foot_discounts += '<tr class="fc_cart_foot_discount"><td class="fc_col1" colspan="' + colspan + '">' + coupons[coupon].name + ':</td><td class="fc_col2"><span class="fc_discount">' + FC.formatter.currency(coupons[coupon].discount, true) + '</span></td></tr>';
        FC.checkout.config.orderDiscount += coupons[coupon].discount;
    }
    jQuery(fc_cart_foot_discounts).insertAfter('#fc_cart_foot_subtotal');
    // Set the subtotal amounts
    jQuery('#discount, label[for=discount]').remove();
    if (FC.checkout.config.orderDiscount != 0) {
        discount_total = '<li class="fc_row fc_discount"><label for="discount" class="fc_pre">Discount</label><input type="text" name="discount" id="discount" class="fc_text fc_text_short fc_text_readonly" readonly="readonly" onfocus="this.blur()" value="' + FC.formatter.currency(FC.checkout.config.orderDiscount) + '" /></li>';
        jQuery(discount_total).insertAfter('li.fc_shipping_cost');
    }
    FC.checkout.updatePriceDisplay();
 
    // Comment the following line out if you want to remove the coupon line once a coupon has been added
    jQuery('#add_coupon').remove();
}
 
 
jQuery(document).ready(function(){
    var coupon_length = 0;
    for (var c in fc_json.coupons) {
        if (fc_json.coupons[c].hasOwnProperty('id')) coupon_length++;
    }
    if (coupon_length == 0) FC.checkout.InitCoupon();
 
    // If you'd like to display the "apply coupon" regardless of whether
    // or not a coupon has already been added, comment out the above lines and uncomment the following
    // FC.checkout.InitCoupon();
});