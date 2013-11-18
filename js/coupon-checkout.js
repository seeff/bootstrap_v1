FC.checkout.InitCoupon = function() {
fc_cart_foot_discount_new = '<tr id="fc_cart_foot_discount_new"><td class="fc_col1" colspan="2"><a href="#" onclick="FC.checkout.AddCoupon(); this.blur(); return false;">Add a coupon</a></td><td class="fc_col2"><input type="text" name="coupon" id="fc_coupon" class="fc_text fc_text_short" value="" style="display:none;" /><a id="fc_coupon_apply" href="javascript:;" style="display:none;">Apply!</a></td></tr>';

if (jQuery('#fc_cart_foot_discount_new').length == 0) {
jQuery(fc_cart_foot_discount_new).insertBefore('#fc_cart_foot_shipping');
}

jQuery('#fc_coupon_apply').unbind('click').click(function(){
var coupon = jQuery('#fc_coupon').val();
if (coupon != '') {
FC.checkout.ApplyCoupon(coupon);
} else {
alert('Please enter a coupon code.');
}
});
}

FC.checkout.AddCoupon = function() {
jQuery("#fc_coupon, #fc_coupon_apply").toggle();
if (jQuery("#fc_coupon").is(":visible")) {
jQuery("#fc_coupon")[0].focus();
}
}

FC.checkout.ApplyCoupon = function(coupon) {
jQuery('#fc_coupon_apply').html('Loading...');
jQuery.getJSON('https://' + window.location.hostname + '/cart?output=json&' + FC.checkout.config.session + '&coupon=' + coupon + '&callback=?',
function(data) {
if (data.messages.errors.length > 0) {
alert("We're sorry. An error occurred: " + data.messages.errors[0]);
} else {
FC.checkout.BuildCouponTR(data.coupons);
}
jQuery('#fc_coupon_apply').html('Apply!');
}
);
}

FC.checkout.BuildCouponTR = function(coupons) {
fc_cart_foot_discounts = '';
FC.checkout.config.orderDiscount = 0;
for (var coupon in coupons) {
fc_cart_foot_discounts += '<tr class="fc_cart_foot_discount"><td class="fc_col1" colspan="2">' + coupons[coupon].name + ':</td><td class="fc_col2"><span class="fc_discount">' + FC.formatter.currency(coupons[coupon].discount, true) + '</span></td></tr>';
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
jQuery('#fc_cart_foot_discount_new').remove();
}


jQuery(document).ready(function(){
var coupon_length = 0;
for (var c in fc_json.coupons) {
if (c.hasOwnProperty('id')) coupon_length++;
}
if (coupon_length == 0) FC.checkout.InitCoupon();

// If you'd like to display the "apply coupon" regardless of whether
// or not a coupon has already been added, comment out the above lines and uncomment the following
FC.checkout.InitCoupon();
});