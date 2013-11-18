<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";
$page = "Contact-Sockscribe-Me";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->


<div class="container">
	<div class="row">
		<h1>Contact Us<h1>
		<h4 class="text-muted">We love chatting, so let us know whats on your mind</h4>
	</div>

	<div class="row">
		<div class="col-md-7">
			<form role="form">
			<div class="form-group">
			    <label for="name">Your Name</label>
			    <input type="text" class="form-control" id="name">
			</div>
			<div class="form-group">
			    <label for="email">Your Email</label>
			    <input type="email" class="form-control" id="email">
			</div>
			<div class="form-group">
			    <label for="order-number">Order Number</label>
			    <input type="text" class="form-control" id="order-number">
			</div>  
			<div class="form-group">
			    <label for="order-number">Order Number</label>
			    <input type="text" class="form-control" id="order-number">
			</div>  
			<div class="form-group">
			    <label for="message">Your Message</label>
				<textarea class="form-control" rows="5" id="message"></textarea>
			</div>
			<div class="checkbox">
			  <label>
			    <input type="checkbox" value="">
			    Sign Up for our Sock Newsletter
			  </label>
			</div>	

			  <button type="submit" class="btn btn-primary">Send</button>
			</form>
		</div>

		<div class="col-md-4 col-md-offset-1">
			<div class="row">
				<h4>Don't hesitate to contact us</h4>
				<p>This can be about how much we love hearing from customers.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate 
				</p>
			</div>

			<div class="row">
				<h4>If all else fails</h4>
				<p>You can call us on <a href="tel:555.555.5555">+1.555.555.5555</a> or send us an email at <a href="mailto:hello@sockscribe.me">hello@sockscribe.me</a> </p>
			</div>

		</div>
</div>
</div>




<!-- end page content -->

<?php
include_once('footer.php');
?>