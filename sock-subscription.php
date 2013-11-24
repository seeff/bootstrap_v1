<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";
$page = "Buy-a-Sock-Subscription";
function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->

		<div class="container">
			<div class="page-header">
	        <h1>Customize Your Sock Subscription <small>Everyone is different</small></h1>
		    </div>

<!-- 		<div class="row text-center">
			<div class="col-xs-6 col-sm-3">
				<h6>Step 1</h6>
				<p>Gender</p>
			</div>
			<div class="col-xs-6 col-sm-3">
				<h6>Step 2</h6>
				<p>Gift Options</p>
			</div> 
			<div class="col-xs-6 col-sm-3">
				<h6>Step 3</h6>
				<p>Duration</p>
			</div>
			<div class="col-xs-6 col-sm-3">
				<h6>Step 4</h6>
				<p>Style</p>
			</div>
		</div> -->


	<form class="text-center form-container col-md-12">

		  <div class="row">
		  	<div class="row">
		  		<h2>Select a Subscription Duration</h2>
		  		<span class="fui-check-inverted check-duration"></span>
		  	</div>
		  	<div class="radios row">
				<input type="radio" name="name" value="Month%20to%20Month%20Subscription&price=12.00&sub_frequency=1m&code=m2m&cart=checkout" id="month-to-month"/>
					 <label class="radio radio-duration col-sm-12 col-md-4" for="month-to-month">
					 		<div class="information">
					 			<h3>Month to Month</h3>
						 		<div class="price-block">
							 		$<strong>12</strong>/month
							 	</div>
							 		<p>Cancel anytime</p>
							 		<p>Great for the Uncomitted</p>
							 	</div>
							 	<div class="btn btn-block btn-inverse selected">Select<span class="fui-arrow-right"></span></div>
			 		</label>

				<input type="radio" name="name" id="6months" value=""/>
				    <label class="radio radio-duration col-sm-12 col-md-4" for="6months">
				    	<div class="information">
				    	<h3>Six Months</h3>
				 		<div class="price-block">
					 		$<strong>72</strong>/up-front
					 	</div>
					 		<p>Cancel anytime</p>
					 		<p>Great for the Uncomitted</p>
					 	</div>
					 		<div class="btn btn-block btn-inverse duration-button">Select<span class="fui-arrow-right"></span></div>

				    </label>

				<input type="radio" name="name" id="12months" value=""/>
				    <label class="radio radio-duration col-sm-12 col-md-4" for="12months">
				    	<div class="information">
					 	<h3>Twelve Months</h3>
				 		<div class="price-block">
					 		$<strong>144</strong>/up-front
					 	</div>
					 		<p>Cancel anytime</p>
					 		<p>Great for the Uncomitted</p>
					 	</div>
					 		<div class="btn btn-block btn-inverse gender-scroll duration-button">Select<span class="fui-arrow-right"></span></div>
				    </label>
			 </div>
		</div>

      <hr class="featurette-divider">

		<div class="row">
		  <div class="row">
		  	<h6>Select your gender</h6>
		  	<span class="fui-check-inverted check-gender"></span>
		  </div>
		  <div class="radios row">
				<input type="radio" name="2:Gender" value="Dudes" id="Dudes"/>
					
						 <label class="radio radio-gender dudes col-sm-12 col-md-6" for="Dudes">
					 		<div class="information">
					 			<h3>Dudes</h3>
						 		<lead>Shoe size 8-12 US</lead>
						 	</div>
							 	<div class="btn btn-block btn-inverse gender-button">Select<span class="fui-arrow-right"></span></div>


				 		</label>

				<input type="radio" name="2:Gender" value="Female" id="chicks" />

						 <label class="radio radio-gender chicks col-sm-12 col-md-6" for="chicks">
					 		<div class="information">
					 			<h3>Chicks</h3>
						 		<lead>Shoe size 5-10 US</lead>
						 	</div>
							 	<div class="btn btn-block btn-inverse style-scroll gender-button">Select<span class="fui-arrow-right"></span></div>
				 		</label>

					</div>
		</div>

      <hr class="featurette-divider">

		<div class="row">
		  <div class="row">
		  	<h2>What type of socks do you prefer?</h2>
		  	<span class="fui-check-inverted check-style"></span>
		  </div>
		  <div class="radios row">
				<input type="radio" name="2:Style" value="Shapes" id="Shapes"/>
						<label class="radio radio-style shapes col-sm-12 col-md-6" for="Shapes">

					 			<div class="information">
					 				<h3>Shapes</h3>
							 		<lead>Blah blah blah</lead>
							 		<p>Example Socks</p>
							 		<p>Stripes</p>
							 		<p>Checks</p>
							 		<p>blah blah</p>
							 	</div>
							 	<div class="btn btn-block btn-inverse style-button">Select<span class="fui-arrow-right"></span></div>

				 		</label>

				<input type="radio" name="2:Style" value="Pictures" id="Pictures" />
					<label class="radio radio-style pictures col-sm-12 col-md-6" for="Pictures">

						 		<div class="information">
						 			<h3>Pictures</h3>
							 		<lead>Blah blah blah</lead>
							 		<p>Example Socks</p>
							 		<p>Sushi</p>
							 		<p>Dogs</p>
							 		<p>Flying Toast</p>
							 	</div>
							 	<div class="btn btn-block btn-inverse style-button">Select<span class="fui-arrow-right"></span></div>

			 		</label>

		  </div>
		</div>
		<a id="submit" href="https://sockscribemetest.foxycart.com/cart?&"> <div class="btn btn-primary btn-lg btn-spacing submit-scroll">Checkout <span class="glyphicon glyphicon-chevron-right"></span></div></a>
		  
	</form>
	

</div>



<!-- end page content -->

<?php
include_once('footer.php');
?>