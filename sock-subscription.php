<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";
$page = "";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->

<div class="container">
	<div class="row text-center">
		<h1>Customize Your Order <p class="lead"> Everyone is special</p><h1>
	</div>

	<div class="col-md-10 col-md-offset-1">

		<form action="https://sockscribeme.foxycart.com/cart" method="post">

			<div class="col-md-12">
				<h3>Step 1: Select a Subscription Duration</h3>
			</div>

			<div class="row duration-container">
				<label class="col-xs-4">

						<div class="tile radio-duration">
					 		<div class="information">
								<input type="radio" name="name" value="Month to Month" required>
								<h3>Month to Month</h3>
						 		<div class="price-block">
							 		$<strong>12</strong>/month + shipping
							 	</div>
							 		<p>Great for the Uncomitted</p>
								 	<p>1 pair of socks every month</p>
							 		<p>Cancel anytime</p>

						 	</div>

						 	<div class="btn btn-inverse duration-button">Select<span class="fui-arrow-right"></span></div>
				 		</div>
				</label>

				<label class="col-xs-4">
						<div class="tile radio-duration">
					 		<div class="information">
								<input type="radio" name="name" value="Six Months Subscription" required>
								<h3>Six Months</h3>

									

						 		<div class="price-block">
							 		$<strong>72</strong>/up-front
							 	</div>
							 		<p>Best way to get started</p>
								 	<p>Free shipping</p>
							 		<p>Monthly delivery for 6 months</p>

						 	</div>
						 	
						 	<div class="btn btn-inverse duration-button">Select<span class="fui-arrow-right"></span></div>
						 </div>
				</label>

				<label class="col-xs-4">
						<div class="tile radio-duration">
					 		<div class="information">
								<input type="radio" name="name" value="Twelve Months Subscription" required>
								<h3>Twelve Months</h3>


						 		<div class="price-block">
							 		$<strong>144</strong>/up-front
							 	</div>
							 		<p>Sweet sock drawer</p>
								 	<p>Free shipping</p>
							 		<p>Monthly delivery for 12 months</p>

						 	</div>
						 	
						 	<div class="btn btn-inverse duration-button">Select<span class="fui-arrow-right"></span></div>
						 </div>				
				</label>
			</div>

			<div class="row gender-container">
			<div class="col-md-12">
				<h3>Step 2: Select a Gender</h3>
			</div>
				<div class="row">
					<label class="col-xs-6">
						<div class="tile radio-gender">
					 			<div class="information">
									<input type="radio" name="gender" value="Dudes" required><h3>Dudes</h3></input >
							 		<lead>Shoe size 8-12 US</lead>
						 		</div>
								 	<div class="btn btn-inverse gender-button">Select<span class="fui-arrow-right"></span></div>
						</div>
					</label>

					<label class="col-xs-6">
						<div class="tile radio-gender">
					 			<div class="information">
									<input type="radio" name="gender" value="Chicks" required><h3>Chicks</h3></input>
							 		<lead>Shoe size 5-10 US</lead>

							 	</div>

							 	<div class="btn btn-inverse gender-button">Select<span class="fui-arrow-right"></span></div>

				 		</div>
					</label>
				</div>
			</div>

			<div class="row style-container">
			<div class="col-md-12">
				<h3>Step 3: Select a Style of Socks</h3>
			</div>

				<div class="row">
					<label class="col-xs-6">
						<div class="tile radio-style shapes">
					 			<div class="information">
									<input type="radio" name="style" value="Patterns" required><h3>Patterns</h3></input>
						 			<p><strong>Examples of Socks</strong></p>
							 		<p><small>Stripes</small></p>
							 		<p><small>Checks</small></p>
							 		<p><small>Polka-dots</small></p>
							 	</div>
							 	<div class="btn btn-inverse style-button">Select<span class="fui-arrow-right"></span></div>

				 		</div>
					</label>

					<label class="col-xs-6">
						<div class="tile radio-style shapes">
					 			<div class="information">
									<input type="radio" name="style" value="Graphics" required><h3>Graphics</h3></input>
						 			<p><strong>Examples of Socks</strong></p>
							 		<p><small>Sushi</small></p>
							 		<p><small>Dogs</small></p>
							 		<p><small>Flying Toast</small></p>
							 	</div>
							 	<div class="btn btn-inverse style-button">Select<span class="fui-arrow-right"></span></div>

				 		</div>
					</label>
				</div>
			</div>

  		  <div class="row">
				<div class="col-md-12 continue-button text-center">
				<input type="hidden" name="empty" value="true" />		
				<input type="hidden" name="cart" value="checkout" />		
				<button type="submit" id="checkout-button" class="btn continue-checkout-btn" >Checkout <span class="glyphicon glyphicon-chevron-right"></span></button>
			 	</div>
		  </div>
		</form>


<div class="dates hidden">
<input type="hidden" name="twelveMonthsDate" id="twelveMonthsDate" value="<?php
	echo date('Ymd', strtotime("+12 month +1 day"));
	?>" />		

<input type="hidden" name="sixMonthsDate" id="sixMonthsDate"value="<?php
	echo date('Ymd', strtotime("+6 month +1 day"));
	?>" />		
</div>

	</div>
</div>




<!-- end page content -->

<?php
include_once('footer.php');
?>
 <script type="text/javascript" charset="utf-8">
        fcc.events.cart.preprocess.add(function(e, arr) {
            if (arr['cart'] == 'checkout' || arr['cart'] == 'updateinfo' || arr['output'] == 'json') {
                return true;
            }
            if (arr['cart'] == 'checkout_paypal_express') {
                _gaq.push(['_trackPageview', '/paypal_checkout']);
                return true;
            }
            _gaq.push(['_trackPageview', '/cart']);
            return true;
        });
        fcc.events.cart.process.add_pre(function(e, arr) {
            var pageTracker = _gat._getTrackerByName();
            jQuery.getJSON('https://' + storedomain + '/cart?' + fcc.session_get() + '&h:ga=' + escape(pageTracker._getLinkerUrl('', true)) + '&output=json&callback=?', function(data){});
            return true;
        });
    </script>

<script>
	var twelveMonthsDate;
	var sixMonthsDate;

	var twelveMonthsDate = $("#twelveMonthsDate").val();
	var sixMonthsDate = $("#sixMonthsDate").val();
</script>