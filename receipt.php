<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";
$page = "Receipt";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->

<div class="container">

        {% block messaging %}
            {% if is_updateinfo %}
	    		<h1>Thanks for the Update<h1>
	            <p>We have successfully processed your change!</p>
            {% endif %}

            {% if is_subscription_cancel %}
	    		<h1>Subscription Cancellation<h1>
				<h4 class="text-muted">Till next time</h4>
	            <p>You have canceled your sock subscription. We are really sorry to see you go.  Thank you for giving us a try and we really do appreciate your business. Please let us know if there is anything we can do in the future to improve our service.</p>
            

			<form role="form" action="subscription-cancelation-email.php" method="POST">

				    <input type="hidden" class="form-control" name="order_id" value="{{ order_id }}">
				    <input type="hidden" class="form-control" name="first_name" value="{{ first_name }}">
				    <input type="hidden" class="form-control" name="email" value="{{ email }}">

				<div class="form-group">
				    <label for="message">What could we do to improve our service?</label>
					<textarea class="form-control" rows="5" name="message"></textarea>
				</div>
				  <button type="submit" class="btn btn-primary btn-lg">Send</button>
			</form>


            {% endif %}

            {% if payment_is_pending %}
            <p id="fc_payment_pending">{{ lang.checkout_payment_pending|raw }}</p>
            {% endif %}

        {% endblock messaging %}



  {% block order_information %}

<h1>You have Subscribed!<h1>
<h4 class="text-muted">Get ready for awesomeness!</h4>

<p>Thank you for subscribing to Sockscribe Me. Your order number is <strong>{{ order_id }}</strong>.  We have charged card ({{ cc_number_masked }}) {{ receipt_subtotal }}.                     
	{% if has_future_products %}
	Your card will be charged today every month until you cancel your sock subscription.
	{% endif %}




We ship our socks on the <strong>first Monday of every month</strong>. If you don't get your socks by the second week of the month, please let us know.</p>
        {% endblock order_information %}

            <div class="row">
              <a href="./sock-subscription-options.html">
                <div class="col-md-4 recipt-social">
                  <a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://sockscribe.me/&p[images][0]=http://sockscribe.me/logo.png&p[title]=Sockscribe%20Me&p[summary]=I%20just%20signed%20up%20for%20Sockscribe%20Me%20-%20You%20should%20too!"  target="_blank">
                    <div class="recipt-social-img facebook_recipt"></div>
                    <h2>Share on Facebook</h2>
                  </a>
                </div> 
              </a>
              <a href="./sock-subscription-options.html">
                <div class="col-md-4 recipt-social">
                  <a href="http://twitter.com/home?status=I%20just%20signed%20up%20for%20Sockscribe%20Me%20-%20You%20should%20too!%20@sockscribeme%20#awesomesocks" target="_blank">
                    <div class="recipt-social-img twitter_recipt" ></div>
                    <h2>Share on Twitter</h2>
                  </a>
                </div> 
              </a>
              <a href="./sock-subscription-options.html">
                <div class="col-md-4 recipt-social">
                  <a href="https://plus.google.com/share?url=https://plus.google.com/107766834964318710901/posts"  target="_blank">
                    <div class="recipt-social-img google_plus_recipt"></div>
                    <h2>Share on Google+</h2>
                  </a>
                  
                </div> 
              </a>
            </div>








</div>
<!-- end page content -->

<?php
include_once('footer.php');
?>