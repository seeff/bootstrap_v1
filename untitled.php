<!-- multistep form -->
<form id="msform" class="col-md-8">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Account Setup</li>
		<li>Social Profiles</li>
		<li>Personal Details</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Select a Subscription Duration</h2>
		<div class="radios row">
				<input type="radio" name="name" value="Month%20to%20Month%20Subscription&price=12.00&sub_frequency=1m&code=m2m&cart=checkout" id="month-to-month"/>
					 <label class="radio radio-duration col-sm-12 col-md-4" for="month-to-month">
					 		<div class="information">
					 			<h3>Month to Month</h3>
						 		<div class="price-block">
							 		$<strong>12</strong>/month + shipping
							 	</div>
							 		<p>Great for the Uncomitted</p>
								 	<p>1 pair of socks every month</p>
							 		<p>Cancel anytime</p>

							 	</div>
							 	<div class="btn btn-block btn-inverse selected">Select<span class="fui-arrow-right"></span></div>
			 		</label>

				<input type="radio" name="name" id="6months" value=""/>
				    <label class="radio radio-duration col-sm-12 col-md-4 " for="6months">
				    	<div class="information">
				    	<h3>Six Months</h3>
				 		<div class="price-block">
					 		$<strong>72</strong>/up-front
					 	</div>
					 		<p>Best way to get started</p>
						 	<p>Free shipping</p>
					 		<p>Monthly delivery for 6 months</p>
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
					 		<p>Sweet sock drawer</p>
						 	<p>Free shipping</p>
					 		<p>Monthly delivery for 12 months</p>
					 	</div>
					 		<div class="btn btn-block btn-inverse gender-scroll duration-button">Select<span class="fui-arrow-right"></span></div>
				    </label>
			 </div>
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Select your gender</h2>
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
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Personal Details</h2>
		<h3 class="fs-subtitle">We will never sell it</h3>
  		  <div class="radios row">
				<input type="radio" name="2:Style" value="Shapes" id="Shapes"/>
						<label class="radio radio-style shapes col-sm-12 col-md-6" for="Shapes">

					 			<div class="information">
					 				<h3>Patterns</h3>
						 			<p><strong>Like</strong></p>
							 		<p><small>Stripes</small></p>
							 		<p><small>Checks</small></p>
							 		<p><small>Polka-dots</small></p>
							 	</div>
							 	<div class="btn btn-block btn-inverse style-button">Select<span class="fui-arrow-right"></span></div>

				 		</label>

				<input type="radio" name="2:Style" value="Pictures" id="Pictures" />
					<label class="radio radio-style pictures col-sm-12 col-md-6" for="Pictures">

						 		<div class="information">
						 			<h3>Graphics</h3>
						 			<p><strong>Like</strong></p>
							 		<p><small>Sushi</small></p>
							 		<p><small>Dogs</small></p>
							 		<p><small>Flying Toast</small></p>
							 	</div>
							 	<div class="btn btn-block btn-inverse style-button">Select<span class="fui-arrow-right"></span></div>

			 		</label>

		  </div>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="submit action-button" value="Submit" />
	</fieldset>
</form>
