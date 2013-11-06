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
				<input type="radio" name="Gender" value="1" id="male" checked="checked" class="col-md-4"/>
					 <label class="radio male" for="male"></label>
				<input type="radio" name="Gender" value="2" id="female"  class="col-md-4" />
				    <label class="radio female" for="female"></label>
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