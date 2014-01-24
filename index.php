<?php

$PageTitle="Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>
<!-- begin page content -->

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active imgLiquidFill imgLiquid">
          <img src="./images/photos/socks-sitting-on-a-wall.png" alt="Feet on wall with fun socks" >
          <div class="container">
            <div class="carousel-caption">
              <h1>An awesome sock monthly subscription</h1>
              <p class="lead">Each month we will send you a fun pair of socks.</p>
              <p><a class="btn btn-lg btn-primary" href="./sock-subscription.php" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item imgLiquidFill imgLiquid">
          <img src="./images/photos/sock-are-a-perfect-gift.png" alt="Sock subscription gifts">
          <div class="container">
            <div class="carousel-caption">              
              <h1>A great gift</h1>
              <p>Don't be selfish, let your friends or loved ones join in on the fun.</p>
              <p class="lead"><a class="btn btn-lg btn-primary" href="./sock-subscription.php" role="button">Gift Socks Now</a></p>
            </div>
          </div>
        </div>
        <div class="item imgLiquidFill imgLiquid">
          <img src="./images/photos/tightrope-walker-with-fun-socks.png" alt="Tightrope walker wearing fun socks" >
          <div class="container">
            <div class="carousel-caption">
              <h1>Live life on the edge</h1>
              <p>Fun socks make you feel good, when you feel good you look good.</p>
              <p class="lead"><a class="btn btn-lg btn-primary" href="./sock-subscription.php" role="button">Subscribe Today</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->






    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row center">
        <div class="col-sm-4">
          <img class="sun-flower-background" src="./images/icons/calendar.svg" alt="Calendar">
          <h2>Step 1</h2>
          <p>Tell us if the socks are for you or if they’re a gift</p>
          <!-- <p>Simply pick a plan and tell us the place. We'll select
                    boastfully bright and dynamically patterned socks to ship
                    to your door monthly.</p> -->
          <p><a class="btn btn-info" href="./sock-subscription.php">Get Started &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <img class="sun-flower-background" src="./images/icons/clipboard.svg" alt="Clipboard">
          <h2>Step 2</h2>
          <p>Customize your socks (duration, sex, style)</p>
          <!-- <p>Take off your flip-flops and white tube socks; change
                    the conversation. Our socks are for freethinkers who know
                    what they deserve</p -->
          <p><a class="btn btn-info" href="./sock-subscription.php">Get Started &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <img class="sun-flower-background" src="./images/icons/paper-bag.svg" alt="Paper Bag">
          <h2>Step 3</h2>
          <p>Let us know where to ship and who to charge</p>
          <!-- p>It’s your right to stand out. Go ahead; Sockscribe, and
                    marvel yourself, your lover, your friends, even your
                    favorite pair of clogs.</p -->
          <p><a class="btn btn-info" href="./sock-subscription.php">Get Started &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <hr class="featurette-divider">


      <!-- START THE FEATURETTES -->


       </div><!-- end container -->


      <div class="container">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="./images/socks-in-envelopes.jpg" alt="Sock Delivery in Envelopes">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">The surprise <span class="text-muted">It’s freaking exciting!</span></h2>
          <p class="lead">Unlike boysenberry picking season, sock picking season is an activity we partake in year round. While we allow you the option to choose from two categories of sock styles--patterns and graphics--we wouldn’t be able to call your socks a surprise if you knew exactly what you were getting ahead of time. So relax, we’ve got your feet covered.</p>
          <a class="btn btn-lg btn-primary" href="./sock-subscription.php">Get Started</a>
        </div>
      </div>

     </div><!-- end container -->
     

      <hr class="featurette-divider">
      
      <div class="container">
        <div class="row featurette">
          <div class="col-md-12">
            <h2 class="featurette-heading center">Our Customers Love Us <span class="text-muted">So will you.</span></h2>
            
            <div id="testimonials">
              <div class="a-testimonial" id="testimonial-1">
                <div class="col-md-4">
                  <img class="featurette-image img-responsive" src="./images/testimonial-lauren.jpg" alt="Testimonial photo from Lauren">
                </div>
                <blockquote class="col-md-8 "> 
                  <p class="lead">"I got my boyfriend a Sockscription and he's hooked - I've never seen him more excited"</p>
                  <small><cite title="Source Title">Lauren J, San Francisco</cite></small>
                </blockquote>
              </div>

              <div class="a-testimonial" id="testimonial-2">
                <div class="col-md-4">
                  <img class="featurette-image img-responsive" src="./images/testimonial-bryant.jpg" alt="Pile of our socks">
                </div>
                <blockquote class="col-md-8">
                  <p class="lead">"Sockscribe Me brings back the feeling the night before Christmas, monthly"</p>
                  <small><cite title="Source Title">Bryant D, Boston</cite></small>
                </blockquote>
              </div>

              <div class="a-testimonial" id="testimonial-3">
                <div class="col-md-4">
                  <img class="featurette-image img-responsive" src="./images/testimonial-danny.jpg" alt="Pile of our socks">
                </div>
                <blockquote class="col-md-8">
                  <p class="lead">"Awesome style and super comfortable socks, looks great with suits"</p>
                  <small><cite title="Source Title">Danny H, New York</cite></small>
                </blockquote>
              </div>

              <div class="a-testimonial" id="testimonial-4">
                <div class="col-md-4">
                  <img class="featurette-image img-responsive" src="./images/testimonial-stephanie.jpg" alt="Pile of our socks">
                </div>
                <blockquote class="col-md-8">
                  <p class="lead">"Awesome style and super comfortable socks, looks great with suits"</p>
                  <small><cite title="Source Title">Stephanie D, Pennsylvania</cite></small>
                </blockquote>
              </div>

            </div>

          </div>
        </div>

      <hr class="featurette-divider">

        <div class="row featurette">

        <div class="col-md-5">  
        <a class="youtube" href="//www.youtube.com/embed/nGTxZukeAQM">
          <div class="play-video">
                      Play Video
          
          </div>
        </a>
      </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Watch Our Video. <span class="text-muted">Now.</span></h2>
          <p class="lead">So you’re excited about your impending transformation to greatness, but you apprehensive about coming off like some type of superhero. Well, don’t worry! You’re not  going to possess magical abilities to fly or spin webs any time soon; after all, we’re sending you socks. </p>
          <p class="lead">Either way, if you want a more realistic idea of what these socks will do for you watch this video, it may give you a glimpse into your future. </p>
          <a class="btn btn-lg btn-primary" href="./sock-subscription.php">Get Started</a>
        </div>

              <hr class="featurette-divider">


      </div>
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">The Best Socks. <span class="text-muted">Trust us.</span></h2>
          <p class="lead">With great power comes great responsibility, which is why we’ll never send you a pair of Aunt Sheryl’s DIY holiday socks. Every month our sock stylists select high quality socks from some of the most well known brands in the industry.</p>
          <p class="lead">While you may never see our stylists, appreciate that they share 117% of their DNA with both unicorns and musical, green-haired chocolate factory workers; they’re good at what they do. </p>
          <a class="btn btn-lg btn-primary" href="./sock-subscription.php">Get Started</a>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="./images/socks-on-ropes.jpg" alt="Sock Brands - Happy Socks, Richer and Poorer, The Sock Guys and Sock it to Me">
        </div>
      </div>

      





      <!-- /END THE FEATURETTES -->

      </div><!-- end container -->
<!-- end page content -->



<?php
include_once('footer.php');
?>