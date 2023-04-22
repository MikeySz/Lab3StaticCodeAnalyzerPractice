<html>
<title>Gsol Login/Signup Page</title>
<?php
include "dependencies.php";
session_start();
echo"<head>";
headingdependencies();
echo"</head>";
include "dbconfig.php";
$con = mysqli_connect($host,$username, $password, $dbname);

if(isset($_SESSION['current_page'])){
$prev_page = $_SESSION['current_page'];
	if($_SESSION['current_page'] == 'index.php'){
		$pagename = "Homepage";
	}
	else{
		$pagename= ucwords(str_replace("-", " ",strstr($prev_page, '.', true)));
	}

}
else{
$prev_page = "index.php";
$pagename = "Homepage";
}

?>


<body>
<?php 
bodydependencies();

include "gsolbuilder.php";

?>


<style>

	.carousel-item{
		height:100%;
		background: #000;
		color:white;
		background-position: center;
		background-size: cover;
	}

	.container {
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		max-height: 60em;
		padding-bottom: 50px;
	}

	.overlay-image{
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		top:0;
		background-position: center;
		background-size: cover;
		opacity:  0.5;
	}

	.card{
		left:10%;
		
		height: 100%;
		
	}

	.footer{
		background: #111;
		color:white;
		background-position: center;
		background-size: cover;
	}

	.form-group{
		background-color: #111;
		color:white;
		background-position: center;
		background-size: cover;
		margin-bottom: 0;
	}
	.categories{
		background: #111;
		color:white;
		background-position: center;
		background-size: cover;
	}
  .scrollable{
    overflow-y: auto;
    max-height:50em;
  }



</style>



<!-- game carousel -->
<div id='myGameCarousel' class='carousel slide carousel-fade'  >
  <!-- Indicators -->
  <div class='carousel-indicators'>
    <button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1' hidden></button>
    <button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='1' aria-label='Slide 2' hidden></button>
  </div>


<!-- Carousel content -->
  <div class='carousel-inner'>
  	<!---------------- Login -------------->
    <!-- Card start -->
    <div class='carousel-item active' >
    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/ar4hb.jpg);'></div>
    	<div class ='container'>
    		<div class='card text-bg-dark mb-3 w-75' style=''>
    		  	


   <div class="container-fluid h-custom d-flex justify-content-center align-items-center">
    <div class="row d-flex justify-content-center align-items-center " style="width:100%;">
      <div class="col-md-12" >
        <form  id="LoginForm" name="LoginForm" method = "post" action = "login.php">
          <div class="divider d-flex align-items-center my-4">
          	<small><a class = "text-left mx-x mb-0 fw-bold" href="<?php echo"$prev_page";?>" style="">Go Back to <?php echo"$pagename"; ?> </a></small>
            <h2 class="text-center fw-bold mx-3 mb-1 mt-5 " >Login</h2>
          </div>

          <!-- Email input -->

          <div class="form-outline mb-4 " >
            <input type = "email" name="loginemail" id="loginemail" class="form-control form-control-lg"
              placeholder="Email eg. example@email.com" maxlength="50" required>
            <label class="form-label" for="loginemail">Email Address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="loginpassword" type="password" id="loginpassword" class="form-control form-control-lg"
              placeholder="Password" minlength="8" maxlength="15" required>
            <label class="form-label" for="loginpassword">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox remember me-->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="rmeme" name = "rmeme">
              <label class="form-check-label" for="rmeme">
                Remember me for 30 days
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="h5 fw-bold mt-2 pt-1 mb-1 mt-1">Don't have an account? <a href="" data-bs-target='#myGameCarousel' data-bs-slide='next'
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Game Solaris Copyright © 2023. All rights reserved.
    </div>
    <!-- Copyright -->
  </div>





			</div>	
  		</div>
    </div>
   	<!-- Card end -->




<!---------------- Sign Up -------------->
    <!-- Card start-->
    <div class='carousel-item' >
    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/ar4hb.jpg);'></div>
    	<div class ='container' style='overflow:hidden;'>
    		<div class='card text-bg-dark mb-3 w-75 scrollable' style=''>





   <div class="container-fluid h-custom d-flex justify-content-center align-items-center">
    <div class="row d-flex justify-content-center align-items-center " style="width:100%;">
      <div class="col-md-12" >
        <form id="SignupForm" name="SignupForm" method = "post" action = "signup.php">
          <div class="divider d-flex align-items-center my-4">
          	<small><a class = "text-left mx-x mb-0 fw-bold " href="<?php echo"$prev_page";?>" style="">Go Back to <?php echo"$pagename"; ?> </a></small>
            <h2 class="text-center fw-bold mx-3 mb-1 mt-5" >Signup</h2>
          </div>

          <div id ="error"></div>

          <!-- Email input -->

          <div class="form-outline mb-4 " >
            <input type = "email" name="signupEmail" id="signupEmail" class="form-control form-control-lg"
              placeholder="example@email.com" maxlength="50" required>
            <label class="form-label" for="signupEmail">Enter a Valid Email Address</label>
          </div>


           <!-- Username input -->

          <div class="form-outline mb-4 " >
            <input type = "text" name="signupUsername" id="signupUsername" class="form-control form-control-lg"
              placeholder="Username" minlength ="5"maxlength="30" required>
            <label class="form-label" for="signupUsername">Enter a valid Username(Alphanumeric and at least 5 character long )</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="signupPassword" type="password" id="signupPassword" class="form-control form-control-lg"
              placeholder="Enter password" minlength="8" maxlength="15" required>
            <label class="form-label" for="signupPassword">Enter a valid Password(8-15 charcters, alphanumeric, Case Senstive, Include atleast 1 number and 1 uppercase letter.)</label>
          </div>
          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="signupPassword2" type="password" id="signupPassword2" class="form-control form-control-lg"
              placeholder="Retype password" minlength='8' maxlength="15" required>
            <label class="form-label" for="signupPassword2">Retype Password</label>
          </div>


          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox remember me-->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="signupTerms" name = "signupTerms" required>
              <label class="form-check-label" for="signupTerms">
                Agree to our <a href="terms-of-use.php" target="_blank">Terms of Use</a>.
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Signup</button>
            <p class="h5 fw-bold mt-2 pt-1 mb-1 mt-1">Have an account already? <a href="" data-bs-target='#myGameCarousel' data-bs-slide='prev'
                class="link-danger">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Game Solaris Copyright © 2023. All rights reserved.
    </div>
    <!-- Copyright -->
  </div>






			</div>
  		</div>
    </div>
    <!-- Card end -->
    
  </div>




</div>
<!-- game carousel end-->




<!--

	  <- Buttons ->
  <button class='carousel-control-prev' type='button' data-bs-target='#myGameCarousel' data-bs-slide='prev' aria-hidden='true'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-bs-target='#myGameCarousel' data-bs-slide='next' aria-hidden='true'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>

https://images.igdb.com/igdb/image/upload/t_screenshot_big/ar4hb.jpg
https://images.igdb.com/igdb/image/upload/t_screenshot_big/aru0a.jpg
https://images.igdb.com/igdb/image/upload/t_screenshot_big/ar4t1.jpg
-->

</body>

</html>