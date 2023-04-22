<html>
<title>Gsol Signup</title>
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



</style>

<?php
#Attempt to establish Connection, else if it fails we close the program
if(!$con){
  die("Connection Failed! Please Try Again Later!");
}
#check if post is set, else set 

if(!isset($_POST['signupUsername']) or !isset($_POST['signupEmail']) or !isset($_POST['signupPassword']) or !isset($_POST['signupPassword2'])){
header('location: login-signup.php');
die();
}



$messages = array();
#=======================Empty Check==========================
#retrieve the all values from the gsol user signup HTML post method
#if data is empty we do not want to proceed
$gUsername=mysqli_real_escape_string($con,$_POST["signupUsername"]);
if(empty(trim($gUsername))) {
  array_push($messages,"Username is not valid! Empty!");
}
elseif( !preg_match( '/^[a-zA-Z0-9]{5,}$/' ,$gUsername)) //alphanumeric, longer than 5 characters
{
  array_push($messages, "Username must be alphanumeric and/or at least 5 characters long.");
}
else{
$gUsername = trim($gUsername, " "); 
}

#++++++++++++++++++++++++++++++++++++++++++++++++++
$gEmail=mysqli_real_escape_string($con,$_POST["signupEmail"]);
if(empty(trim($gEmail))) {
  array_push($messages,"Email is empty! ");
}
elseif(!filter_var($gEmail, FILTER_VALIDATE_EMAIL)){
  array_push($messages,"Email Format is not Valid!");

}
else{
  $gEmail = trim($gEmail, " ");
}

#++++++++++++++++++++++++++++++++++++++++++++++++++++

$gPassword=mysqli_real_escape_string($con,$_POST["signupPassword"]);
$gPassword2=mysqli_real_escape_string($con,$_POST["signupPassword2"]);
if(empty(trim($gPassword)) or empty(trim($gPassword2))) {
  array_push($messages, "Password is not valid! EMPTY Pasword detected! ");
}
elseif($gPassword != $gPassword2){
  array_push($messages, "Passwords do not Match!");
}
elseif( strlen(trim($gPassword, " "))> 7 && strlen(trim($gPassword, " "))<16 && preg_match('/[a-z]/', $gPassword) && preg_match('/[A-Z]/',$gPassword)){
  $mPass =1;
  $pCT = 0;

  if( preg_match('/[0-9]/', $gPassword) ) { $pCT++; }  // contains digit
  if( preg_match('/[A-Z]/', $gPassword) ) { $pCT++; }  // contains upercase
  if( $pCT > $mPass ) {
        // valid password
      $gPassword = trim($gPassword, " ");
      $gPassword2 = trim($gPassword2, " ");
    }
  else{
      array_push($messages, "Password is missing 1 number and/or 1 uppercase letter");
  }
}
else{
  array_push($messages, "Password must include atleast 1 Uppercase letter, 1 Number, and be 8-15 characters long.");
}




#===============================POST Variables DB Check===============================================
#We want to perform  db checks on most of the data, if we find a fail then we stop the code and exit.
#Establish login chcek query and run.
$sqlEmail= "SELECT email FROM vuser_email WHERE email='$gEmail' ";
$sqlUsername= "SELECT user FROM vuser_email WHERE user='$gUsername' ";
$resultEmail = mysqli_query($con, $sqlEmail);
$resultUsername = mysqli_query($con, $sqlUsername);
if($resultEmail) {
  if(mysqli_num_rows($resultEmail) ==1){
    mysqli_free_result($resultEmail);
    array_push($messages, "The email:  ".$gEmail." is already taken!!");
   }
}
if($resultUsername) {
  if(mysqli_num_rows($resultUsername) ==1){
    mysqli_free_result($resultUsername);
    array_push($messages, "The Username:  ".$gUsername." is already taken!!");
   }
}


#=========================================================================================================
#Last Check, if the array messages contains a count of zero we can assume no errors
$varpassed = FALSE;

if(count($messages)==0 ){
  #On successful registration we must first hash our passwords

  // Generate a unique verification token
  $token = hash('sha256', uniqid()."$gEmail");
  // Simple hash of password; Here is where you will most likely call in some other function/file to do more advanced hashing
  $gPassword = hash('sha256', $gPassword);


  $varpassed = TRUE;
  #echo"<H1>Success</H1>";

  $sql2="INSERT INTO gsol_users(username,password,email,verification_token)values('$gUsername','$gPassword','$gEmail','$token')";
   $result2 = mysqli_query($con, $sql2);
  if(!$result2){
    #If the query failed kill the process
    die("Something went Wrong! Return to <a href='index.php'>Homepage</a>");
  //echo"New Customer: ".$clogin." Added <br>";
  //   echo"<a href='CPS5740_p2.html' target=_self>Return to Project Phase 2 Page</a>";#return to Project 2 Phase1
  // 
  }
  else{
    #$verify_link = "https://localhost/GameSolaris/verify.php?token=".$token."";
    $command = "python Secure/email-verify.py ".$gEmail." ".$token."";
    $pyresult = shell_exec($command);



  }
}
else{
#On fail do nothing, allow messages arrive to error report screen/card
#echo"<h1> Fail</h1>";

}






?>


<!-- game carousel -->
<div id='myGameCarousel' class='carousel slide carousel-fade'  >
  <!-- Indicators -->
  <div class='carousel-indicators'>
    <button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='0' <?php if(!$varpassed){echo"class='active' aria-current='true' ";} ?>  aria-label='Slide 1' hidden></button>
    <button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='1' aria-label='Slide 2' hidden></button>
    <button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='2' <?php if($varpassed){echo"class='active' aria-current='true' ";} ?> aria-label='Slide 3' hidden></button>
  </div>


<!-- Carousel content -->
  <div class='carousel-inner'>
  	<!---------------- Error Display -------------->
    <!-- Card start -->
    <div class='carousel-item <?php if(!$varpassed){echo"active";} ?>' >
    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/ar4hb.jpg);'></div>
    	<div class ='container'>
    		<div class='card text-bg-dark mb-3 w-75 ' style=''>
    		  	


   <div class="container-fluid h-custom d-flex justify-content-center align-items-center">
    <div class="row d-flex justify-content-center align-items-center " style="width:100%;">
      <div class="col-md-12" >

        <h1>Registration Failed!</h1>
        <ul>
          <?php foreach($messages as $value){echo "<li>".$value."</li>";} ?>
        </ul>

        <p><a data-bs-target='#myGameCarousel' data-bs-slide='next'
                class="link-danger">Try Again</a></p>
        




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
    	<div class ='container'>
    		<div class='card text-bg-dark mb-3 w-75' style=''>
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
            <input  type = "email" name="signupEmail" id="signupEmail" value = "<?php echo($gEmail); ?>" class="form-control form-control-lg"
              placeholder="example@email.com" maxlength="50" required>
            <label class="form-label" for="signupEmail">Enter a Valid Email Address</label>
          </div>


           <!-- Username input -->

          <div class="form-outline mb-4 " >
            <input type = "text" name="signupUsername" id="signupUsername" value = "<?php echo($gUsername); ?>" class="form-control form-control-lg"
              placeholder="Username" maxlength="30" required>
            <label class="form-label" for="signupUsername">Enter a valid Username(No offensive words)</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="signupPassword" type="password" id="signupPassword" class="form-control form-control-lg"
              placeholder="Enter password" maxlength="15" required>
            <label class="form-label" for="signupPassword">Enter a valid Password(8-15 charcters, alphanumeric, Case Senstive, Include atleast 1 number and 1 uppercase letter.)</label>
          </div>
          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="signupPassword2" type="password" id="signupPassword2" class="form-control form-control-lg"
              placeholder="Retype password" maxlength="15" required>
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
            <p class="h5 fw-bold mt-2 pt-1 mb-1 mt-1">Have an account already? <a href="login-signup.php"
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

        <!-- Card start -->
    <div class='carousel-item <?php if($varpassed){echo"active";} ?>' >
      <div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/ar4hb.jpg);'></div>
      <div class ='container'>
        <div class='card text-bg-dark mb-3 w-75 ' style=''>
            


   <div class="container-fluid h-custom d-flex justify-content-center align-items-center">
    <div class="row d-flex justify-content-center align-items-center " style="width:100%;">
      <div class="col-md-12" >
        <div class = "row">
        <h1>Registration Successful!</h1>
        </div>
        <div class = "row">
        <h3>A verification email has been sent to your email with the verification link.</h3>
        </div>
        <div class = "row">
        <h5>Didn't receive a link?</h5>
        </div>
        <div class = "row bp-5">

          <div class ="col-4 bp-5">
            <form id="verify" name="verify" method = "post" action = "verify.php">
               <input type="hidden" id="email" name="email" value="<?php echo($gEmail);?>" />
          <button type="submit" class="btn btn-primary btn-sm"
                style="padding-left: 2.5rem; padding-right: 2.5rem;" id ="verifygo">Send Again</button>
          <h1></h1>
          </form>
          </div>

        </div>

        




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

-->

</body>

</html>