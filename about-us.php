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
						<img src="./images/photos/two-feet-linked.png" class="img-responsive" alt="Two fun socks linked together"></img>
					</span>
					<p>
						Many moons ago, two best friends began a tradition (that did not consist of breaking open a piñata) to celebrate their friendship. Before the first Saturday of every month these friends would scour through department stores, specialty shops, and even pet boutiques to find a pair of socks worthy of gifting to the other. On Saturday morning, each friend would excitedly open their sock drawer only to discover a vibrant new pair of surprise socks awaiting their debut. Obligated to spread their tradition of bringing joy to others through socks, these friends birthed the idea for Sockscribe Me. 
					</p>
					<p>
						Eager to turn the Sockscribe Me brainchild into a functioning website, these friends enrolled in a <a href="https://generalassemb.ly/" tagret="_blank">General Assembly</a> class where they learned front-end end web design. A mere 16 classes later, after expending lots of blood, sweat, and hair (which could eventually lead to early-onset baldness) these friends created the very website you are viewing now, which allows people to share in the tradition of spreading joy to their friends, with socks. 
					</p>
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
				  <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%;">
				    <h5>Sock Wearing 92%</h5>
				  </div>
				</div>

				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
				    <h5>Being Fun 86%</h5>
				  </div>
				</div>

			</div>

		</div>

		<div class="row">
			<article>
				<h2>About Sockscribe Me</h2>
				<p>Each month we will send you a pair of incredible socks that will add some color to your life. You won’t know what design you’ll get, but that’s part of the SockScribe thrill. Remember the feeling of getting surprised with a cool gift when you were a kid? We’ll make that happen, monthly.</p>
				<p>You have our word that you will always get awesome socks you will want to wear everyday. They’re perfect for casual and formal attire. What you do with all the new attention, ‘the SockScribe effect,’ is the only risk you’re taking.</p>
				<p class="lead">The next chapter in your life starts here. Welcome to the family!</p>
			</article>

		</div>
	</div>
</div>



<!-- end page content -->

<?php
include_once('footer.php');
?>