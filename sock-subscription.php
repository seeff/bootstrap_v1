<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->

<!-- This is the script for the slider - http://jqueryui.com/slider/#steps -->
<script>
  $(function() {
    $( "#slider" ).slider({
      value:100,
      min: 0,
      max: 500,
      step: 50,
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.value );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) );
  });
 </script>

<div class="container">

	<div class="page-header">
		<h1>Customize Your Sock Subscription <small>Everyone is different</small></h1>
	</div>

	<form class="text-center">
		<div class="row">
			<div class="col-md-3">
				<h6>Step 1</h6>
				<p>Gender</p>
			</div>
			<div class="col-md-3">
				<h6>Step 2</h6>
				<p>Gift Options</p>
			</div>
			<div class="col-md-3">
				<h6>Step 3</h6>
				<p>Duration</p>
			</div>
			<div class="col-md-3">
				<h6>Step 4</h6>
				<p>Style</p>
			</div>
		</div>


		<div class="panel panel-default">
		  <div class="panel-heading">Gender</div>
		  <div class="panel-body radios">
				<input type="radio" name="Gender" value="1" id="male"/>
					
						 <label class="radio male" for="male">
						 	
						 		<div class="row">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="51.119px" height="19.364px" viewBox="0 0 51.119 19.364" enable-background="new 0 0 51.119 19.364" xml:space="preserve">
									<path fill-rule="evenodd" clip-rule="evenodd" fill="#3498db" d="M14.4,16.445c0,0.752-0.038,1.248,0.008,1.735
										c0.076,0.819-0.181,1.211-1.083,1.182c-3.668-0.12-7.337-0.192-11.006-0.29c-0.931-0.025-1.445-0.327-1.378-1.457
										c0.112-1.905-0.029-3.767-0.625-5.662C-0.459,9.481,0.323,6.997,1.21,4.634c0.085-0.226,0.761-0.426,1.076-0.336
										C3.952,4.77,5.56,5.473,7.242,5.85c5.445,1.22,9.526,0.304,13.075-5.85c0.56,0.218,1.137,0.37,1.64,0.654
										c0.88,0.498,1.738,1.043,2.562,1.63c1.012,0.72,2.193,1.337,2.928,2.287c2.648,3.421,6.626,4.419,10.345,5.823
										c1.58,0.598,3.403,0.523,5.101,0.84c2.189,0.408,4.367,0.885,6.541,1.373c0.731,0.164,1.266,0.588,1.195,1.459
										c-0.007,0.076-0.029,0.181,0.01,0.228c1.238,1.504-0.209,1.713-1.051,1.897c-4.307,0.949-8.605,2.034-12.969,2.596
										c-3.207,0.413-6.527,0.321-9.76,0.03c-2.697-0.242-5.333-1.13-8.008-1.675C17.461,16.859,16.046,16.698,14.4,16.445z"/>
									</svg>

								</div>

							
								<div class="row">
							 		<span>Dudes</span>
							 	</div>
						 	

						 </label>
						
				<input type="radio" name="Gender" value="2" id="female" />
					
					    <label class="radio female" for="female">


						    <div class="row">
						    	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="51.119px" height="34.383px" viewBox="0 0 51.119 34.383" enable-background="new 0 0 51.119 34.383" xml:space="preserve">
								<path fill-rule="evenodd" clip-rule="evenodd" fill="#F4898B" d="M43.31,34.271c-0.585,0-1,0-1.707,0c0-2.913,0.002-5.76,0-8.609
									c-0.002-1.841,0.021-3.684-0.025-5.524c-0.05-1.887-0.792-2.349-2.343-1.354c-4.059,2.608-7.775,5.602-10.502,9.669
									c-0.781,1.163-1.609,2.301-2.498,3.381c-1.118,1.359-2.573,2.144-4.363,2.268c-6.177,0.435-12.335,0.541-18.407-0.97
									c-0.79-0.197-1.581-0.47-2.3-0.843C0.687,32.041-0.013,31.539,0,31.172c0.024-0.723,0.274-1.839,0.777-2.086
									c5.5-2.681,11.047-5.273,16.641-7.757c0.787-0.348,1.902-0.039,2.852,0.077c1.486,0.178,2.86-0.042,3.824-1.236
									c3.75-4.644,8.457-8.226,13.021-11.977c2.277-1.872,4.442-3.88,6.637-5.852c0.352-0.317,0.622-0.741,0.871-1.152
									c0.821-1.36,1.315-1.532,2.688-0.623c2.25,1.49,3.038,3.803,3.264,6.341c0.26,2.875-0.351,5.658-2.43,7.648
									c-3.558,3.414-4.122,7.676-4.265,12.208C43.805,29.223,43.515,31.678,43.31,34.271z"/>
								</svg>
							</div>

							<div class="row">
						    	<span>Chicks</span>
						    </div>

					    </label>
					
		  </div>
		</div>

		<div class="panel panel-default">
		  <div class="panel-heading">Gift Options</div>
		  <div class="panel-body radios">
				<input type="radio" name="Gift" value="1" id="for-me" checked="checked" class="col-md-4"/>
					 <label class="radio for-me" for="for-me"><p>This is For Me</p></label>
				<input type="radio" name="Gift" value="2" id="gift"  class="col-md-4 gift" />
				    <label class="radio gift" for="gift"><p>This is a Gift</p></label>
		  </div>
		</div>

		<div class="panel panel-default">
		  <div class="panel-heading">Subscription Duration</div>
		  <div class="panel-body">
				<div class="col-md-3 col-md-offset-1">
					<p>Month to Month</p>
				</div>
				<div class="col-md-3">
					<p>6 Months</p>
				</div>
				<div class="col-md-3">
					<p>12 Months</p>
				</div>
		  </div>
		</div>



		<div class="panel panel-default">
		  <div class="panel-heading">Sock Style</div>
		  <div class="panel-body radios">
				<input type="radio" name="Style" value="1" id="stylish" checked="checked" class="col-md-4"/>
					<label class="radio fadein stylish" for="stylish">
						<p>Stylish</p>
						<img img id="s1" src="./images/types-of-socks/stylish-yellow-stripes.png" />
						<img img id="s2" src="./images/types-of-socks/stylish-red-blue-stripes.png" />
						<img img id="s3" src="./images/types-of-socks/stylish-red-arrows.png" />
					</label>
				<input type="radio" name="Style" value="2" id="crazy"  class="col-md-4 gift" />
				    <label class="radio fadein crazy" for="crazy"><p>This is a Gift</p>
				    	<img id="c1" src="./images/types-of-socks/crazy-toaster.png" />
						<img id="c2" src="./images/types-of-socks/crazy-sushi.png" />
						<img id="c3" src="./images/types-of-socks/crazy-beer.png" />
				    </label>
		  </div>
		</div>	
	</form>
	

</div>



<!-- end page content -->

<?php
include_once('footer.php');
?>