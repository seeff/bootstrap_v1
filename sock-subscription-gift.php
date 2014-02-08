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
<!-- multistep form -->
<form id="msform">
	<!-- progressbar -->
	<div class="row">
		<div class="shaded-form col-md-6 col-md-offset-3">
			<ul id="progressbar">
				<li class="active">Gift Details</li>
				<li>Subscription Duration</li>
				<li>Gender</li>
				<li>Style</li>
			</ul>
		</div>
	</div>
	<!-- fieldsets -->



<fieldset>
	<div class="row">
		<div class="col-md-12">
			<h3 class="fs-title">Tell Us About The Recipient</h3>
		</div>
	</div>
	<div class="row">
      <div class="col-xs-4">
        <input type="text" class="col-md-2 form-control" name="Recipients Name" id="recipients_name" placeholder="Recipients Name">
      </div>
      <div class="col-xs-4">
      <input type="text" class="col-md-2 form-control" name="Recipients Email" id="recipients_email" placeholder="Recipients Email">
    </div>      

    <div class="col-xs-4">
      <input type="text" class="col-md-2 form-control" name="Occasion" id="Occasion" placeholder="Occasion">
    </div>
	</div>

	<div class="row">
  <div class="col-md-12">
      <textarea rows="3" placeholder="Message for Recipient" name="Gift Message" id="gift_message" class="form-control"></textarea>
  </div>
</div>
<div class="row">

  <div class="col-md-4">
      <input type="text" class="form-control" name="Your Name" id="your_name" placeholder="Your Name">
  </div>
</div>


<div class="btn btn-inverse duration-button next" id="gift-fields">Next<span class="fui-arrow-right"></span></div>

</fieldset>







	<fieldset>
			<div class="col-md-12">
				<h3 class="fs-title">Select a Subscription Duration</h3>
			</div>
		
		
		<div class="row">
			<div class="col-md-4">
				<input type="radio" name="name" value="Month%20to%20Month%20Subscription&price=12.00&sub_frequency=1m&code=m2m&cart=checkout" id="month-to-month"/>
					 <label class="tile radio-duration next" for="month-to-month">
					 		<div class="information">
					 			<h3>Month to Month</h3>
						 		<div class="price-block">
							 		$<strong>12</strong>/month + shipping
							 	</div>
							 		<p>Great for the Uncomitted</p>
								 	<p>1 pair of socks every month</p>
							 		<p>Cancel anytime</p>

							 	</div>
							 	<div class="btn btn-inverse duration-button">Select<span class="fui-arrow-right"></span></div>
			 		</label>
			</div>

			<div class="col-md-4">
				<input type="radio" name="name" id="6months" value=""/>
				    <label class="tile radio-duration next" for="6months">
				    	<div class="information">
				    	<h3>Six Months</h3>
				 		<div class="price-block">
					 		$<strong>72</strong>/up-front
					 	</div>
					 		<p>Best way to get started</p>
						 	<p>Free shipping</p>
					 		<p>Monthly delivery for 6 months</p>
					 	</div>
					 		<div class="btn btn-inverse duration-button">Select<span class="fui-arrow-right"></span></div>

				    </label>
			</div>

			<div class="col-md-4">

				<input type="radio" name="name" id="12months" value=""/>
				    <label class="tile radio-duration next" for="12months">
				    	<div class="information">
					 	<h3>Twelve Months</h3>
				 		<div class="price-block">
					 		$<strong>144</strong>/up-front
					 	</div>
					 		<p>Sweet sock drawer</p>
						 	<p>Free shipping</p>
					 		<p>Monthly delivery for 12 months</p>
					 	</div>
					 		<div class="btn btn-inverse gender-scroll duration-button">Select<span class="fui-arrow-right"></span></div>
				    </label>
		    </div>
			 </div>
<!-- 				<input type="button" name="next" class="next action-button btn style-button col-sm-1 col-md-offset-11" value="Next" />
 -->


	</fieldset>


<fieldset>
			<div class="col-md-12">
				<h3 class="fs-title">Select your Gender</h3>
			</div>

			<div class="row">
				<div class="col-md-6">
									<input type="radio" name="2:Gender" value="Dudes" id="Dudes"/>

						 <label class="tile radio-gender dudes next" for="Dudes">
					 		<div class="information">
					 			<h3>Dudes</h3>
						 		<lead>Shoe size 8-12 US</lead>
						 	</div>
							 	<div class="btn btn-inverse gender-button">Select<span class="fui-arrow-right"></span></div>


							</label>
				</div>

				<div class="col-md-6">
									<input type="radio" name="2:Gender" value="Female" id="chicks" />

						 <label class="tile radio-gender chicks next" for="chicks">

					 		<div class="information">
					 			<h3>Chicks</h3>
						 		<lead>Shoe size 5-10 US</lead>
						 	</div>
							 	<div class="btn btn-inverse style-scroll gender-button">Select<span class="fui-arrow-right"></span></div>
							</label>
				</div>
			</div>
		
		<input type="button" name="previous" class="previous action-button btn style-button col-sm-1" value="Back" />
<!-- 		<input type="button" name="next" class="next action-button btn btn-primary style-button col-sm-1 col-md-offset-10" value="Next" />
 -->
</fieldset>

	<fieldset>
		<h3 class="fs-title">Stelect Your Style</h3>
  		  <div class="row">
  		  	<div class="col-md-6">
				<input type="radio" name="2:Style" value="Shapes" id="Shapes"/>
						<label class="tile radio-style shapes" for="Shapes">

					 			<div class="information">
					 				<h3>Patterns</h3>
						 			<p><strong>Like</strong></p>
							 		<p><small>Stripes</small></p>
							 		<p><small>Checks</small></p>
							 		<p><small>Polka-dots</small></p>
							 	</div>
							 	<div class="btn btn-inverse style-button">Select<span class="fui-arrow-right"></span></div>

				 		</label>
				 	</div>

			<div class="col-md-6">
				<input type="radio" name="2:Style" value="Pictures" id="Pictures" />
					<label class="tile radio-style pictures" for="Pictures">

						 		<div class="information">
						 			<h3>Graphics</h3>
						 			<p><strong>Like</strong></p>
							 		<p><small>Sushi</small></p>
							 		<p><small>Dogs</small></p>
							 		<p><small>Flying Toast</small></p>
							 	</div>
							 	<div class="btn btn-inverse style-button">Select<span class="fui-arrow-right"></span>
							 		
							 	</div>

			 		</label>
			 	</div>

		  </div>
		
		<input type="button" name="previous" class="previous action-button btn style-button col-sm-1" value="Back" />


		<a id="submit" href="https://sockscribemetest.foxycart.com/cart?&" class="btn continue-checkout-btn col-sm-2 col-md-offset-4"> 
		Continue to Checkout <span class="glyphicon glyphicon-chevron-right"></span>
		</a>


	</fieldset>
</form>

</div>
</div>

<!-- end page content -->

<?php
include_once('footer.php');
?>