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
			<form role="form" action="get-intouch-form.php" method="POST">
			<div class="form-group">
			    <label for="name" >Your Name*</label>
			    <input type="text" class="form-control" name="name" required>
			</div>
			<div class="form-group">
			    <label for="email_from">Your Email*</label>
			    <input type="email" class="form-control" name="email" required>
			</div>
			<div class="form-group">
			    <label for="order_number">Order Number</label>
			    <input type="number" class="form-control" name="order_number">
			</div>  
			<div class="form-group">
			    <label for="message">Your Message*</label>
				<textarea class="form-control" rows="5" name="message" required></textarea>
			</div>
			<div class="checkbox">
			  <label>
			    <input type="checkbox" value="yes" name="newsletter">
			    Sign Up for our Sock Newsletter
			  </label>
			</div>	

			  <button type="submit" class="btn btn-primary btn-lg">Send</button>
			</form>
		</div>

		<div class="col-md-4 col-md-offset-1">
			<div class="row">
				<h4>Don't hesitate to contact us</h4>
				<p>Help us help you, help us. By that we mean, tell us what’s on your mind. Let us know what you like, or what you think we could be doing better. We pride ourselves on reading customer feedback, making dreams come true and scotch drinking. Bottom line, if you have a question, a fun fact, an unrelated comment, or a photo of a platypus wearing socks, send it our way. 
				</p>
			</div>

			<div class="row">
				<h4>If all else fails</h4>
				<p>You can call us on <a href="tel:1.650.762.5121">+1.650.762.5121</a> or send us an email at <a href="mailto:hello@sockscribe.me">hello@sockscribe.me</a> </p>
			</div>

		</div>
</div>
</div>




<!-- end page content -->

<?php
include_once('footer.php');
?>