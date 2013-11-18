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


	<form class="text-center form-container col-md-8 col-md-offset-2">

		  <div class="row">
		  	<div class="row">
		  		<h6>Select a Subscription Duration</h6>
		  	</div>
		  	<div class="radios row">
				<input type="radio" name="name"value="Month%20to%20Month%20Subscription&price=12.00&sub_frequency=1m&code=m2m" id="month-to-month"/>
					 <label class="radio col-sm-4 col-md-4" for="month-to-month">
					 		<div class="month-to-month-sprite customize-images"></div>
					 		

					 		<div class="more-information gradient">
					 			<h4>Month to Month</h4>
						 		<p>$12 p/m</p>
						 		<p>More about month to month</p>
					 		</div>
					 		</label>
				<input type="radio" name="name" id="6months" value="" />
				    <label class="radio col-sm-4 col-md-4" for="6months">
				    	<div class="six-month-sprite customize-images"></div>
				    	<div class="more-information gradient">
					    	<h4>Six Months</h4>
					 		<p>$72 once off</p>
					 		<p>1 Free Pair</p>
					 	</div>
				    </label>
				<input type="radio" name="name" id="12months" value=""/>
				    <label class="radio col-sm-4 col-md-4" for="12months">
				    	<div class="twelve-month-sprite customize-images"></div>
				    	<div class="more-information gradient">
					    	<h4>Twelve Months</h4>
					 		<p>$144 once off</p>
					 		<p>2 Free Pairs</p>
					 	</div>
				    </label>
			 </div>
		</div>



		<div class="row">
		  <div class="row"><h6>Select your gender</h6></div>
		  <div class="radios row">
				<input type="radio" name="2:Gender" value="Dudes" id="Dudes"/>
					
						 <label class="radio dudes col-sm-6 col-md-6" for="Dudes">
					 		<div class="dudes-sprite customize-images"></div>
					 		<div class="more-information gradient">
					 			<h4>Dudes</h4>
						 		<p>Shoe size 8-12 US</p>
					 		</div>
				 		</label>

				<input type="radio" name="2:Gender" value="Female" id="chicks" />
					


						 <label class="radio chicks col-sm-6 col-md-6" for="chicks">
					 		<div class="chicks-sprite customize-images"></div>
					 		<div class="more-information gradient">
					 			<h4>Chicks</h4>
						 		<p>Shoe size 5-10 US</p>
					 		</div>
				 		</label>

					</div>
		</div>


		<div class="row">
		  <div class="row"><h6>What type of socks do you prefer?</h6></div>
		  <div class="radios row">
				<input type="radio" name="2:Style" value="Shapes" id="Shapes"/>
						<label class="radio shapes col-sm-6 col-md-6" for="Shapes">
					 		<div class="shapes-sprite customize-images"></div>
					 		<div class="more-information gradient">
					 			<h4>Shapes</h4>
					 			<p>Example Socks</p>
						 		<p>Stripes</p>
						 		<p>Checks</p>
						 		<p>blah blah</p>
					 		</div>
				 		</label>

				<input type="radio" name="2:Style" value="Pictures" id="Pictures" />
					<label class="radio pictures col-sm-6 col-md-6" for="Pictures">
				 		<div class="pictures-sprite customize-images"></div>
				 		<div class="more-information gradient">
				 			<h4>Pictures</h4>
				 			<p>Example Socks</p>
					 		<p>Sushi</p>
					 		<p>Dogs</p>
					 		<p>Flying Toast</p>
				 		</div>
			 		</label>

		  </div>
		</div>
		<a id="submit" href="https://sockscribemetest.foxycart.com/cart?&"> <div class="btn btn-primary btn-lg btn-spacing">Checkout <span class="glyphicon glyphicon-chevron-right"></span></div></a>
		  
	</form>
	

</div>



<!-- end page content -->

<?php
include_once('footer.php');
?>