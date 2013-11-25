<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";
$page = "Buy-Sock-Subscription-Gift";
function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->

		<div class="container">
			<div class="page-header">
	        <h1>Everyone Loves Gifts<small>Everyone loves socks</small></h1>
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



<?php 

include_once('gift-block.php');
?>




		  <div class="row">
		  	<div class="row">
		  		<h2>Select a Subscription Duration</h2>
		  		<span class="fui-check-inverted check-duration"></span>
		  	</div>
		  	<div class="row">

				<input type="radio" name="name" id="3months" value=""/>
		  		<div class="col-md-4">
				    <label class="tile" for="3months">
				    	<div class="information">
				    	<h3>Three Months</h3>
				 		<div class="price-block">
					 		$<strong>72</strong>/up-front
					 	</div>
					 		<p>1 pair of socks every month for 3 months</p>
						 	<p>Free shipping</p>
					 	</div>
					 		<div class="btn btn-block btn-inverse duration-button">Select<span class="fui-arrow-right"></span></div>

				    </label>
				</div>


				<input type="radio" name="name" id="6months" value=""/>
		  		<div class="col-md-4">
				    <label class="tile" for="6months">
				    	<div class="information">
				    	<h3>Six Months</h3>
				 		<div class="price-block">
					 		$<strong>72</strong>/up-front
					 	</div>
					 		<p>1 pair of socks every month for 6 months</p>
						 	<p>Free shipping</p>
					 	</div>
					 		<div class="btn btn-block btn-inverse duration-button">Select<span class="fui-arrow-right"></span></div>

				    </label>
				</div>

		  		<div class="col-md-4">
				<input type="radio" name="name" id="12months" value="">
					 <label class="tile" for="12months">
					 		<div class="information">
					 			<h3>Twelve Months</h3>
						 		<div class="price-block">
							 		$<strong>144</strong>/up-front
							 	</div>
								 	<p>1 pair of socks every month for 12 months</p>
							 		<p>Free shipping</p>

							 	</div>
							 	<div class="btn btn-block btn-inverse selected">Select<span class="fui-arrow-right"></span></div>
			 		</label>
			 	</div>				
			 </div>
		</div>

		<hr class="featurette-divider">

			<?php
			include_once('gender-box.php');
			?>


		<hr class="featurette-divider">

			<?php
			include_once('sock-style-box.php');
			?>

		<a id="submit" href="https://sockscribemetest.foxycart.com/cart?&"> <div class="btn btn-primary btn-lg btn-spacing submit-scroll">Continue to Checkout <span class="glyphicon glyphicon-chevron-right"></span></div></a>
		  
	</form>
	

</div>



<!-- end page content -->

<?php
include_once('footer.php');
?>