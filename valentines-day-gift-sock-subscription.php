<?php

$PageTitle="Valentines Day Sock Subscription - Sockscribe Me";
$page = "";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->


<div class="small-carousel">
	<div class="container">
		<div class="row">
			<h1>Valentines Day Gift</h1>
		  <p class="lead">Get your chick or dude to love you, year round!</p>
		</div>
	</div>
</div>

<div class="container">
		<div class="row featurette">
		<div class="col-md-5">
		  <img class="featurette-image img-responsive" src="./images/socks-in-envelopes.jpg" alt="Sock Delivery in Envelopes">
		</div>
		<div class="col-md-7">
		  <h2 class="featurette-heading">This is explaining the product <span class="text-muted">Subtitle</span></h2>
		  <p class="lead">Yup, valentines day is almost here. The big day. Don’t disappoint your lover with another cliche bouquet of flowers or another box of fancy chocolate that is re-gifted to your house guests. This year we invite you to be creative and unique by spoiling your loved one with a sock subscription for valentines day. This is the perfect last minute valentines day gift and you won’t regret it.  </p>
		</div>
	</div>
 </div><!-- end container -->

       <hr class="featurette-divider">

<div class="container">
		<div class="row featurette">
		<div class="col-md-7">
		  <h2 class="featurette-heading">This is why you should buy it <span class="text-muted">Subtitle</span></h2>
		  <p class="lead">If you sign up for the valentines day sock subscription special we will specially package the first months subscription to impress your lover and we will include a custom card with your personalized message. So what are you waiting for, get started by choosing your subscription duration below!</p>
		</div>
		<div class="col-md-5">
		  <img class="featurette-image img-responsive" src="./images/socks-in-envelopes.jpg" alt="Sock Delivery in Envelopes">
		</div>
 </div><!-- end container -->

       <hr class="featurette-divider">


	<div class="col-md-10 col-md-offset-1">

		<form action="https://sockscribeme.foxycart.com/cart" method="post">

			<div class="col-md-12">
				<h3>Step 1: Select a Subscription Duration</h3>
			</div>

			<div class="row duration-container">

				<label class="col-xs-6">
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

				<label class="col-xs-6">
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
				<input type="hidden" name="occasion" value="Valentines-Day-Gift" />		
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
</div>

<!-- end page content -->
<?php
include_once('footer.php');
?>

<script>
	var twelveMonthsDate;
	var sixMonthsDate;

	var twelveMonthsDate = $("#twelveMonthsDate").val();
	var sixMonthsDate = $("#sixMonthsDate").val();
</script>