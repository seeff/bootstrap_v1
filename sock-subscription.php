<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";

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
					 		

					 		<div class="more-information">
					 			<h4>Month to Month</h4>
						 		<p>$12 p/m</p>
						 		<p>More about month to month</p>
						 		<div class="btn btn-default">Choose</div>
					 		</div>
					 		</label>
				<input type="radio" name="name" id="6months" value="" />
				    <label class="radio col-sm-4 col-md-4" for="6months">
				    	<div class="six-month-sprite customize-images"></div>
				    	<div class="more-information">
					    	<h4>Six Months</h4>
					 		<p>$72 once off</p>
					 		<p>1 Free Pair</p>
					 		<div class="btn btn-default">Choose</div>
					 	</div>
				    </label>
				<input type="radio" name="name" id="12months" value=""/>
				    <label class="radio col-sm-4 col-md-4" for="12months">
				    	<div class="twelve-month-sprite customize-images"></div>
				    	<div class="more-information">
					    	<h4>Twelve Months</h4>
					 		<p>$144 once off</p>
					 		<p>2 Free Pairs</p>
					 		<div class="btn btn-default">Choose</div>
					 	</div>
				    </label>
			 </div>
		</div>

		 <div class="row">
		  	<div class="row"><h6>Gift Options</h6></div>
		  	<div class="radios row">
				<input type="radio" name="2:Gift" value=""id="for-me"/>
					 <label class="radio for-me col-sm-6 col-md-6" for="for-me" >
					 	<h4>This is For Me</h4>
					 </label>

				<input type="radio" name="2:Gift" value="This%20is%20a%20gift" id="gift"/>
				    <label class="radio gift col-sm-6 col-md-6" for="gift">
				    	<div class="row">
				    		<h4>This is a Gift</h4>
				    	</div>
				    </label>
		  	</div>
		</div>



		<div class="row">
		  <div class="row"><h6>Select your gender</h6></div>
		  <div class="radios row">
				<input type="radio" name="2:Gender" value="Male" id="male"/>
					
						 <label class="radio male col-sm-6 col-md-6" for="male">
						 	

							
								<div class="row">
							 		<h4>Dudes</h4>
							 	</div>
						 	

						 </label>
						
				<input type="radio" name="2:Gender" value="Female" id="female" />
					
					    <label class="radio female col-sm-6 col-md-6" for="female">


							<div class="row">
						    	<h4>Chicks</h4>
						    </div>

					    </label>
					</div>
		</div>


		<div class="row">
		  <div class="row"><h6>What type of socks do you prefer?</h6></div>
		  <div class="radios row">
				<input type="radio" name="2:Style" value="Shapes" id="Shapes"/>
					<label class="radio fadein stylish col-sm-6 col-md-6" for="Shapes">
						<div class="row fading-images">
							<img img id="s1" src="./images/types-of-socks/stylish-yellow-stripes.png" />
							<img img id="s2" src="./images/types-of-socks/stylish-red-blue-stripes.png" />
							<img img id="s3" src="./images/types-of-socks/stylish-red-arrows.png" />
						</div>

						<div class="row">
							<h4>Shapes</h4>
						</div>

					</label>
				<input type="radio" name="2:Style" value="Pictures" id="Pictures" />
				    <label class="radio fadein crazy col-sm-6 col-md-6" for="Pictures">
				    	<div class="row fading-images">
					    	<img id="c1" src="./images/types-of-socks/crazy-toaster.png" />
							<img id="c2" src="./images/types-of-socks/crazy-sushi.png" />
							<img id="c3" src="./images/types-of-socks/crazy-beer.png" />
						</div>

						<div class="row">
							<h4>Pictures</h4>
						</div>
				    </label>
		  </div>
		</div>
		<a id="submit" href="https://sockscribemetest.foxycart.com/cart?&"> <div class="btn btn-primary btn-lg" >Checkout <span class="glyphicon glyphicon-chevron-right"></span></div></a>
		  
	</form>
	

</div>



<!-- end page content -->

<?php
include_once('footer.php');
?>