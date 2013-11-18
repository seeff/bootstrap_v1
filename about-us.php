<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";
$page = "About-Sockscribe-Me";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->

<div class="container">
	<div class="row">
		<h1>About Us<h1>
		<h4 class="text-muted">Meet the Feet Behind the Socks</h4>
	</div>

	<div class="content">
		<div class="row">
			<article class="col-md-8">
				<h2>Who we are</h2>
				<div class="post-content">

					<span class="col-md-4">
						<img src="./images/socks-on-ropes.jpg" class="img-responsive" alt="Who we are picture"></img>
					</span>
					<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
				</div>
			</article>

			<div class="col-md-4 about-us-progress">
				<h2>Our Skills</h2>

				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
				    <h5>Sock Selection 95%</h5>
				  </div>
				</div>

				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
				    <h5>Sock Wearing 92%</h5>
				  </div>
				</div>

				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
				    <h5>Wearing White Socks</h5>
				  </div>
				</div>

				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;">
				    <h5>Being good people 72%</h5>
				  </div>
				</div>

			</div>

		</div>

		<div class="row">
			<article>
				<h2>About Sockscribe Me</h2>
				<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
			</article>

		</div>
	</div>
</div>



<!-- end page content -->

<?php
include_once('footer.php');
?>