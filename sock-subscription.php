<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->


 <script type="text/javascript" charset="utf-8">
	function padWithZero(value) {
		if (value < 10) {
			return '0'+value;
		}	
		return value;
	}
	jQuery(document).ready(function(){
		var end_date_6mths = new Date();
		end_date_6mths.setMonth(end_date.getMonth()+6);
		sub_enddate_6mths = end_date_6mths.getFullYear()+padWithZero(end_date_6mths.getMonth()+1)+padWithZero(end_date.getDate());
		jQuery("input[name=sub_enddate]").val(sub_enddate);
	});
</script>

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


	<form class="text-center">
		  <div class="row">
		  	<div class="row">
		  		<h6>Subscription Duration</h6>
		  	</div>
		  	<div class="radios row">
				<input type="radio" name="name" checked="checked" value="name=Month%20to%20Month%20Subscription&price=12.00&sub_frequency=1m&sub_startdate=01&code=m2m" id="month-to-month" class="col-md-4"/>
					 <label class="radio" for="month-to-month">
					 		<p>Month to Month</p>
					 		<p><small>$12 p/m</small></p>
					 		</label>
				<input type="radio" name="name" value="name=Six%20Months%20Subscription&price=72.00&sub_frequency=6m&code=6m&2:name=free&2:price=0.00&2:sub_frequency=1m&2:sub_startdate=01&2:code=free" id="six-months" class="col-md-4" />
				    <label class="radio" for="six-months">
				    	<p>Six Months</p>
				 		<p><small>$72 once off</small></p>
				 		<p><small>1 Free Pair</small></p>
				    </label>
				<input type="radio" name="name" value="name=Twelve%20Months%20Subscription&price=144.00&sub_frequency=12m&code=12m&2:name=free&2:price=0.00&2:sub_frequency=1m&2:sub_startdate=01&2:code=free" id="twelve-months" class="col-md-4" />
				    <label class="radio" for="twelve-months">
				    	<p>Twelve Months</p>
				 		<p><small>$144 once off</small></p>
				 		<p><small>2 Free Pairs</small></p>
				    </label>
			 </div>
		</div>

		 <div class="row">
		  	<div class="row"><h6>Gift Options</h6></div>
		  	<div class="radios row">
				<input type="radio" name="Gift" value="" checked="checked" id="for-me" class="col-md-4"/>
					 <label class="radio for-me" for="for-me" ><p>This is For Me</p></label>
				<input type="radio" name="Gift" value="This%20is%20a%20gift" id="gift"  class="col-md-4" />
				    <label class="radio gift" for="gift">

				    	<div class="row">
							<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"><path fill="#E74C3C" d="M100 94c0 3.313-2.687 6-6 6h-88c-3.313 0-6-2.687-6-6v-88c0-3.313 2.687-6 6-6h88c3.313 0 6 2.687 6 6v88z"/><path fill-rule="evenodd" clip-rule="evenodd" fill="#C0392B" d="M68.494 10.847l-18.287-10.847h24.383l-6.096 10.847zm-34.662-10.847c-.212.913-.548 1.81-1.027 2.662l-11.746 20.908-20.616-12.228-.443-.294v-5.048c0-3.313 2.687-6 6-6h27.832zm-31.174 49.794l1.955-3.479c2.704-4.813 8.742-6.433 13.488-3.617 4.742 2.814 6.399 8.996 3.696 13.808l-11.746 20.908-10.051-5.961v-23.235l2.658 1.576zm19.509 42.704c2.703-4.812 8.741-6.432 13.487-3.617l3.432 2.033 1.956-3.479c2.703-4.812 8.741-6.434 13.487-3.617 4.742 2.816 6.4 8.996 3.697 13.809l-1.331 2.373h-35.706c-.618-2.459-.346-5.145.978-7.502zm35.321-27.807l-20.616-12.228c-4.746-2.815-6.398-8.997-3.697-13.809 2.704-4.812 8.742-6.432 13.487-3.617l3.432 2.034 1.956-3.479c2.705-4.812 8.742-6.433 13.488-3.618 4.742 2.817 6.4 8.998 3.697 13.811l-11.747 20.906zm26.821-24.95c-4.746-2.815-6.398-8.997-3.697-13.81 2.703-4.813 8.742-6.433 13.486-3.617l3.432 2.034 1.957-3.479c.158-.283.332-.554.514-.815v28.995l-15.692-9.308zm-11.008 53.843c-4.746-2.814-6.398-8.996-3.697-13.809 2.703-4.812 8.742-6.434 13.488-3.617l3.432 2.035 1.955-3.48c2.342-4.168 7.184-5.936 11.521-4.506v23.791c0 .412-.043.814-.121 1.201l-1.771 3.154c-1.077 1.014-2.514 1.647-4.108 1.647h-9.885l-10.814-6.416zm-66.208 2.957c1.474.875 2.648 2.076 3.487 3.459h-4.58c-2.843 0-5.211-1.982-5.83-4.637 2.281-.463 4.738-.117 6.923 1.178z"/><path opacity=".15" fill-rule="evenodd" clip-rule="evenodd" d="M70.116 47.232c1.354-.733 2.475-1.552 3.399-2.485 5.881-5.944 5.956-15.538.168-21.385-2.774-2.803-6.479-4.345-10.43-4.345-4.043 0-7.855 1.603-10.74 4.516-.946.957-1.772 2.124-2.511 3.539-.74-1.42-1.568-2.594-2.518-3.553-2.882-2.912-6.696-4.529-10.738-4.529-3.952 0-7.655 1.514-10.43 4.315-5.789 5.849-5.714 15.385.169 21.33.957.968 2.131 1.791 3.55 2.52-1.311.684-2.494 1.477-3.438 2.401-2.935 2.88-4.551 6.709-4.551 10.782.001 3.983 1.558 7.705 4.384 10.477 2.761 2.709 6.432 4.201 10.336 4.201 3.996 0 7.776-1.551 10.646-4.366 1.004-.985 1.857-2.229 2.586-3.606.728 1.377 1.581 2.621 2.585 3.605 2.871 2.816 6.652 4.367 10.647 4.367 3.903 0 7.575-1.492 10.337-4.201 2.825-2.771 4.382-6.492 4.383-10.477 0-4.072-1.615-7.9-4.551-10.783-.904-.891-2.033-1.658-3.283-2.323zm-38.152-18.281c2.689-2.644 7.127-2.566 9.912.171 2.926 2.875 4.149 13.854 4.128 13.877-.022.022-10.941-1.43-13.866-4.305-2.786-2.738-2.863-7.1-.174-9.743zm9.833 35.071c-2.76 2.59-7.155 2.661-9.819.161-2.663-2.5-2.587-6.627.172-9.217 2.897-2.719 13.839-3.975 13.861-3.954.021.021-1.316 10.291-4.214 13.01zm26.253.162c-2.669 2.5-7.073 2.429-9.838-.161-2.904-2.72-4.244-12.989-4.222-13.01.021-.021 10.984 1.235 13.889 3.954 2.764 2.59 2.84 6.717.171 9.217zm-.17-25.398c-2.903 2.898-13.861 4.236-13.883 4.213-.022-.022 1.317-10.963 4.22-13.861 2.764-2.759 7.167-2.835 9.835-.171 2.668 2.663 2.591 7.059-.172 9.819z"/><path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M100 39h-25.019c4.361-6 3.955-14.332-1.298-19.639-2.774-2.803-6.479-4.345-10.43-4.345-3.386 0-6.602 1.137-9.254 3.213v-18.229h-8v18.214c-2.651-2.079-5.869-3.226-9.253-3.226-3.952 0-7.655 1.514-10.43 4.314-5.285 5.343-5.665 13.698-1.214 19.698h-25.102v8h25.316c-2.111 2.662-3.268 5.908-3.268 9.336.001 3.983 1.558 7.705 4.384 10.477 2.761 2.709 6.432 4.201 10.336 4.201 3.373 0 6.584-1.116 9.232-3.153v32.139h8v-32.14c2.648 2.037 5.861 3.153 9.232 3.153 3.903 0 7.575-1.492 10.337-4.201 2.825-2.771 4.382-6.492 4.383-10.477 0-3.427-1.156-6.673-3.268-9.336h25.316v-7.999zm-41.783-13.862c2.764-2.759 7.167-2.835 9.835-.171 2.668 2.664 2.591 7.06-.172 9.819-2.896 2.89-13.799 4.228-13.88 4.213v-.043c.069-.728 1.415-11.02 4.217-13.818zm-26.253-.187c2.689-2.644 7.127-2.566 9.912.171 2.812 2.763 4.05 13.003 4.124 13.82v.057c-.102.011-10.948-1.44-13.862-4.305-2.786-2.738-2.863-7.1-.174-9.743zm9.833 35.071c-2.76 2.59-7.155 2.661-9.819.161-2.663-2.5-2.587-6.627.172-9.217 2.868-2.691 13.614-3.948 13.851-3.954v.108c-.132 1.096-1.476 10.342-4.204 12.902zm26.253.162c-2.669 2.5-7.073 2.429-9.838-.161-2.741-2.568-4.088-11.856-4.212-12.909v-.101c.217.003 11.001 1.26 13.879 3.954 2.764 2.59 2.84 6.717.171 9.217z"/><path opacity=".2" fill-rule="evenodd" clip-rule="evenodd" d="M94 100h-88c-3.313 0-6-2.687-6-6.001v-13.999c0 3.313 2.687 6 6 6h88c3.313 0 6-2.687 6-6v13.999c0 3.314-2.687 6.001-6 6.001z"/></svg>
				    	</div>

				    	<div class="row">
				    		<p>This is a Gift</p>
				    	</div>


				    </label>
		  	</div>
		</div>



		<div class="row">
		  <div class="row"><h6>Gender</h6></div>
		  <div class="radios row">
				<input type="radio" name="Gender" value="Male" id="male" checked="checked" />
					
						 <label class="radio male" for="male">
						 	
						 		<div class="row">
									<svg class="male-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="51.119px" height="19.364px" viewBox="0 0 51.119 19.364" enable-background="new 0 0 51.119 19.364" xml:space="preserve">
									<path fill-rule="evenodd" clip-rule="evenodd"  d="M14.4,16.445c0,0.752-0.038,1.248,0.008,1.735
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
						
				<input type="radio" name="Gender" value="Female" id="female" />
					
					    <label class="radio female" for="female">


						    <div class="row">
						    	<svg class="female-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="51.119px" height="34.383px" viewBox="0 0 51.119 34.383" enable-background="new 0 0 51.119 34.383" xml:space="preserve">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M43.31,34.271c-0.585,0-1,0-1.707,0c0-2.913,0.002-5.76,0-8.609
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


		<div class="row">
		  <div class="row"><h6>Sock Style</h6></div>
		  <div class="radios row">
				<input type="radio" name="Style" value="Stylish" id="stylish" checked="checked"  class="col-md-4"/>
					<label class="radio fadein stylish" for="stylish">
						<div class="row fading-images">
							<img img id="s1" src="./images/types-of-socks/stylish-yellow-stripes.png" />
							<img img id="s2" src="./images/types-of-socks/stylish-red-blue-stripes.png" />
							<img img id="s3" src="./images/types-of-socks/stylish-red-arrows.png" />
						</div>

						<div class="row">
							<span>Stylish</span>
						</div>

					</label>
				<input type="radio" name="Style" value="Crazy" id="crazy"  class="col-md-4" />
				    <label class="radio fadein crazy" for="crazy">
				    	<div class="row fading-images">
					    	<img id="c1" src="./images/types-of-socks/crazy-toaster.png" />
							<img id="c2" src="./images/types-of-socks/crazy-sushi.png" />
							<img id="c3" src="./images/types-of-socks/crazy-beer.png" />
						</div>

						<div class="row">
							<span>Crazy</span>
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