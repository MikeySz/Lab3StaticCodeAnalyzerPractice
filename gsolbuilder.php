<?php

#================================================
function buildGameJumbotron($con, $num=3){

echo" <!----------------Game Carousel------------------->";
#SQL query that will retrieve the data from DB
$sqlGC = " SELECT game_id, name, summary,artwork_id, cover_id, screenshot_id from vtop_game_artworks_screenshots group by game_id order by rand() limit ".$num." ";
$resultGC = mysqli_query($con, $sqlGC);
$countGC = 1;
$indicatorsGC=0;
if($resultGC) {
  echo "
<!-- game carousel -->
	<div id='myGameCarousel' class='carousel slide carousel-fade' data-bs-ride='carousel' >
  	<!-- Indicators -->
  	<div class='carousel-indicators'>";
  	while($indicatorsGC < $num){
  		if ($indicatorsGC == 0){
  			echo"<button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='".($indicatorsGC)."' class='active' aria-current='true' aria-label='Slide ".($indicatorsGC)."' hidden></button>";
  		}
  		else{
  			echo"<button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='".($indicatorsGC)."' aria-current='true' aria-label='Slide ".($indicatorsGC)."' hidden></button>";
  		}
  		$indicatorsGC = $indicatorsGC + 1;		
  	}
  echo"</div>";
  echo"<!-- Carousel content -->
  <div class='carousel-inner'>";

  while($rowGC = mysqli_fetch_array($resultGC)){
    $gameID = $rowGC['game_id'];
    $gcName = $rowGC['name'];
    $gcSummary = $rowGC['summary'];
    $gcArtwork = $rowGC['artwork_id'];
    $gcCover = $rowGC['cover_id'];
    $gcScreenshot = $rowGC['screenshot_id'];

    if(empty($gcArtwork)){
    	$gcBackground = $gcScreenshot;
    }
    else{
    	$gcBackground = $gcArtwork;
    }


    if($gameID <>"") {
    	if($countGC == 1){
			    echo"<!-- Card start -->
			    <div class='carousel-item active ' data-interval='5000' >
			    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/".$gcBackground.".jpg);'></div>
			    	<div class ='container'>
			    
			    		      <div class='carousel-caption '>
        						<h1 class='display-1'><strong>Welcome to Game Solaris!</strong></h1>
        						<p>Discuss, Review, and List your favorite games!</p>
     							 </div>
    								


			  		</div>
			    </div>
			   	<!-- Card end -->"; 
			   	$countGC= $countGC +1;
    	}
    	else{
    		echo"<!-- Card start -->
			    <div class='carousel-item ' data-interval='5000' >
			    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/".$gcBackground.".jpg);'></div>
			    	<div class ='container'>
			    		

			    		<div class='carousel-caption'>
        						<h1 class='display-1'><strong>Welcome to Game Solaris!</strong></h1>
        						<p>Discuss, Review, and List your favorite games!</p>
     							 </div>
    								

			  		</div>
			    </div>
			   	<!-- Card end -->"; 
    		
    	}


    }

    }

  echo "
    </div>
  <!-- Buttons-->
  <button class='carousel-control-prev' type='button' data-bs-target='#myGameCarousel' data-bs-slide='prev' hidden>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-bs-target='#myGameCarousel' data-bs-slide='next' hidden>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>
</div>
<!-- game carousel end-->
";
}
else{
	#buildGameCarouselDefault();
}







}





#===============================================================================

function buildGameCarousel($con, $num=3){

echo" <!----------------Game Carousel------------------->";
#SQL query that will retrieve the data from DB
$sqlGC = " SELECT game_id, name, summary,artwork_id, cover_id, screenshot_id from vtop_game_artworks_screenshots group by game_id order by rand() limit ".$num." ";
$resultGC = mysqli_query($con, $sqlGC);
$countGC = 1;
$indicatorsGC=0;
if($resultGC) {
  echo "
<!-- game carousel -->
	<div id='myGameCarousel' class='carousel slide ' data-bs-ride='carousel' >
  	<!-- Indicators -->
  	<div class='carousel-indicators'>";
  	while($indicatorsGC < $num){
  		if ($indicatorsGC == 0){
  			echo"<button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='".($indicatorsGC)."' class='active' aria-current='true' aria-label='Slide ".($indicatorsGC)."'></button>";
  		}
  		else{
  			echo"<button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='".($indicatorsGC)."' aria-current='true' aria-label='Slide ".($indicatorsGC)."'></button>";
  		}
  		$indicatorsGC = $indicatorsGC + 1;		
  	}
  echo"</div>";
  echo"<!-- Carousel content -->
  <div class='carousel-inner'>";

  while($rowGC = mysqli_fetch_array($resultGC)){
    $gameID = $rowGC['game_id'];
    $gcName = $rowGC['name'];
    $gcSummary = $rowGC['summary'];
    $gcArtwork = $rowGC['artwork_id'];
    $gcCover = $rowGC['cover_id'];
    $gcScreenshot = $rowGC['screenshot_id'];

    if(empty($gcArtwork)){
    	$gcBackground = $gcScreenshot;
    }
    else{
    	$gcBackground = $gcArtwork;
    }


    if($gameID <>"") {
    	if($countGC == 1){
			    echo"<!-- Card start -->
			    <div class='carousel-item active' data-interval='8000' >
			    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/".$gcBackground.".jpg);'></div>
			    	<div class ='container'>
			    
			    		<div class='card text-bg-dark mb-3'>
			    		  	<div class='row g-0'>
			    		  		<div class='col-md-6 col-lg-3 d-none d-md-block'>	
								  <img src='https://images.igdb.com/igdb/image/upload/t_cover_big/".$gcCover.".jpg' class='card-img-left' alt='...'>
								 </div>

								<div class = 'col-md-6 col-lg-8'>
								  <div class='card-body' >
								    <h3 class='card-title'>".$gcName."</h3>
								    <p class='card-text'>".$gcSummary."</p>
								    <a href='game-details.php?gameid=".$gameID."' class='btn btn-primary'>More details</a>
								  </div>
								 </div>
							</div>
						</div>	

			  		</div>
			    </div>
			   	<!-- Card end -->"; 
			   	$countGC= $countGC +1;
    	}
    	else{
    		echo"<!-- Card start -->
			    <div class='carousel-item' data-interval='8000' >
			    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/".$gcBackground.".jpg);'></div>
			    	<div class ='container'>
			    		<div class='card text-bg-dark mb-3'>
			    		  	<div class='row g-0'>
			    		  		<div class='col-md-6 col-lg-3 d-none d-md-block'>	
								  <img src='https://images.igdb.com/igdb/image/upload/t_cover_big/".$gcCover.".jpg' class='card-img-left' alt='...'>
								 </div>

								<div class = 'col-md-6 col-lg-8'>
								  <div class='card-body' >
								    <h3 class='card-title'>".$gcName."</h3>
								    <p class='card-text'>".$gcSummary."</p>
								    <a href='game-details.php?gameid=".$gameID."' class='btn btn-primary'>More details</a>
								  </div>
								 </div>
							</div>
						</div>	
			  		</div>
			    </div>
			   	<!-- Card end -->"; 
    		
    	}


    }

    }

  echo "
    </div>
  <!-- Buttons-->
  <button class='carousel-control-prev' type='button' data-bs-target='#myGameCarousel' data-bs-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-bs-target='#myGameCarousel' data-bs-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>
</div>
<!-- game carousel end-->
";
}
else{
	buildGameCarouselDefault();
}







}

function buildGameCarouselDefault(){
echo"
<!-- game carousel -->
<div id='myGameCarousel' class='carousel slide ' data-bs-ride='carousel' >
  <!-- Indicators -->
  <div class='carousel-indicators'>
    <button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
    <button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='1' aria-label='Slide 2'></button>
    <button type='button' data-bs-target='#myGameCarousel' data-bs-slide-to='2' aria-label='Slide 3'></button>
  </div>

<!-- Carousel content -->
  <div class='carousel-inner'>
    <!-- Card start -->
    <div class='carousel-item active' data-interval='8000' >
    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/ar4hb.jpg);'></div>
    	<div class ='container'>
    		<div class='card text-bg-dark mb-3' style='width: 50em;'>
    		  	<div class='row g-0'>
    		  		<div class='col-md-4'>	
					  <img src='https://images.igdb.com/igdb/image/upload/t_cover_big/co1u60.jpg' class='card-img-left' alt='...'>
					 </div>

					<div class = 'col-md-8'>
					  <div class='card-body' >
					    <h3 class='card-title'>Fallout: New Vegas</h3>
					    <p class='card-text'>In this first-person Western RPG, the player takes on the role of Courier 6, barely surviving after being robbed of their cargo, shot and put into a shallow grave by a New Vegas mob boss. The Courier sets out to track down their robbers and retrieve their cargo, and winds up getting tangled in the complex ideological and socioeconomic web of the many factions and settlements of post-nuclear Nevada.</p>
					    <a href='game-details.php?gameid=16' class='btn btn-primary'>More details</a>
					  </div>
					 </div>
				</div>
			</div>	
  		</div>
    </div>
   	<!-- Card end -->
    <!-- Card start-->
    <div class='carousel-item' data-interval='8000'>
    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/aru0a.jpg);'></div>
    	<div class ='container'>
    		<div class='card text-bg-dark mb-3' style='width: 50em;'>
    		  	<div class='row g-0'>
    		  		<div class='col-md-4'>	
					  <img src='https://images.igdb.com/igdb/image/upload/t_cover_big/co2mlj.jpg' class='card-img-left' alt='...'>
					 </div>

					<div class = 'col-md-8'>
					  <div class='card-body' >
					    <h3 class='card-title'>Bioshock 2</h3>
					    <p class='card-text'>BioShock 2 is the second game of the BioShock series and the sequel to BioShock. It continues the grand storyline of the underwater metropolis Rapture. BioShock 2 capitalizes and improves upon the high-quality effects, unique gameplay elements, and immersive atmosphere that defined the first game. It explores more brutal gameplay than its predecessor, with new enemies, weapons, Plasmids, and Gene Tonics.</p>
					    <a href='game-details.php?gameid=21' class='btn btn-primary'>More details</a>
					  </div>
					 </div>
				</div>
			</div>
  		</div>
    </div>
    <!-- Card end -->
    <!-- Card  Start-->
    <div class='carousel-item' data-interval='8000'>
    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/ar4t1.jpg);'></div>
    	<div class ='container'>
    		<!--<h1>Headline 3</h1>-->
    		<div class='card text-bg-dark mb-3' style='width: 50em;'>
    		  	<div class='row g-0'>
    		  		<div class='col-md-4'>	
					  <img src='https://images.igdb.com/igdb/image/upload/t_cover_big/co3p2d.jpg' class='card-img-left' alt='...'>
					 </div>

					<div class = 'col-md-8'>
					  <div class='card-body' >
					    <h3 class='card-title'>The Legend of Zelda: Breath of the Wild</h3>
					    <p class='card-text'>The Legend of Zelda: Breath of the Wild is the first 3D open-world game in the Zelda series. Link can travel anywhere and be equipped with weapons and armor found throughout the world to grant him various bonuses. Unlike many games in the series, Breath of the Wild does not impose a specific order in which quests or dungeons must be completed. While the game still has environmental obstacles such as weather effects, inhospitable lands, or powerful enemies, many of them can be overcome using the right method. A lot of critics ranked Breath of the Wild as one of the best video games of all time.</p>
					    <a href='game-details.php?gameid=7346' class='btn btn-primary'>More details</a>
					  </div>
					 </div>
				</div>
			</div>
  		</div>
    </div>
    <!-- card end -->
  </div>



  <!-- Buttons-->
  <button class='carousel-control-prev' type='button' data-bs-target='#myGameCarousel' data-bs-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-bs-target='#myGameCarousel' data-bs-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>
</div>
<!-- game carousel end-->
";
}
#=======================================================================================
#====================================Game Details Page==================================
function buildGameDetailsPage($con, $gid=0){
#$gid = mysqli_real_escape_string($con,$gid);
if(is_int($gid) and $gid !=0){
	
# Queries
	#Game details, artworks, screenshots
$sqlGAS = " SELECT game_id, name, summary, storyline, DATE_FORMAT(initial_release_date, '%M %d %Y')as release_date, cover_id, cover_url, aggregated_rating, aggregated_rating_count, rating, rating_count, artworks, screenshots FROM vgame_artworks_screenshots where game_id = ".$gid." ";
	#game platforms
$sqlGP="SELECT platform_id, name, logo_id FROM vgame_platforms WHERE game_id = ".$gid." ";
	#game themes
$sqlGT="SELECT theme_id, name FROM vgame_themes WHERE game_id = ".$gid." ";
	#game genres
$sqlGGe="SELECT genre_id, name FROM vgame_genres WHERE game_id = ".$gid." ";
	#game gamemodes
$sqlGM="SELECT gm_id, name FROM vgame_gamemodes WHERE game_id = ".$gid." ";
	#game videos
$sqlGV="SELECT search_id, video_name from game_video where game_id = ".$gid." ";

#Run Queries
$resultGAS = mysqli_query($con, $sqlGAS);
$resultGP = mysqli_query($con, $sqlGP);
$resultGT = mysqli_query($con, $sqlGT);
$resultGGe = mysqli_query($con, $sqlGGe);
$resultGM = mysqli_query($con, $sqlGM);
$resultGV = mysqli_query($con, $sqlGV);

buildGameDetailsHeading($con, $resultGAS, $resultGP);
$resultGAS = mysqli_query($con, $sqlGAS);
buildGameExtraDetails($con, $resultGAS, $resultGT,$resultGGe,$resultGM,$resultGV);
$resultGAS = mysqli_query($con, $sqlGAS);
buildGameScreenshotsCarousel($con, $resultGAS);


}
else{
	echo"<div style ='background-color: #111;' >
		<div class = 'text-center row h-75' style='color:white;'>
		<H1>Game not found.</H1>
		<H4>Return to <a href='game-page.php'>Game Page</a></h4>
		</div>
		</div>";

}


}
#====================================Game Details Heading=====================================
function buildGameDetailsHeading($con, $rGAS, $rGP ){
echo"

<!--============================Game Detail Heading Start========================================== -->
";
if($rGAS){
#game_id, name, summary, storyline, initial_release_date, cover_id, cover_url, aggregated_rating, aggregated_rating_count, rating, rating_count, artworks, screenshots	
 	$rowGAS = mysqli_fetch_array($rGAS);


 	$gid= $rowGAS['game_id'];
    $ghName = $rowGAS['name'];
    $ghSummary = $rowGAS['summary'];
    $ghArtworks = $rowGAS['artworks'];
    $ghScreenshots = $rowGAS['screenshots'];
    $ghCover = $rowGAS['cover_id'];

    if(count(explode("|", $ghArtworks)) < 1 or is_null($ghArtworks)){
    	$ghScrArray = explode("|", $ghScreenshots);

    	$ghBackground = $ghScrArray[array_rand($ghScrArray, 1)];
    }
    else{
    	$ghArtArray = explode("|", $ghArtworks);
    	$ghBackground = $ghArtArray[array_rand($ghArtArray, 1)];
    }


echo"
<!-- game carousel -->
<div id='myGameHeading' class='carousel slide' >

<!-- Carousel content -->
  <div class='carousel-inner'>
    <!-- Card start -->
    <div class='carousel-item active' data-interval='8000' >
    	<div class = 'overlay-image' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_1080p/".$ghBackground.".jpg);'></div>
    	<div class ='container'>
    		<div class='card text-bg-dark mb-3' style='width: auto;'>
    		  	
    		  	<div class='row  scrollable-2 '> 
    		  		<div class='col-md-5 d-none d-md-block'>	
					  <img src='https://images.igdb.com/igdb/image/upload/t_cover_big/".$ghCover.".jpg' class='card-img-left' alt='...'>
					 </div>
					 <div class='col-md-3  d-md-none '>	
					  <img src='https://images.igdb.com/igdb/image/upload/t_cover_big/".$ghCover.".jpg' class='img' alt='...'>
					 </div>

					<div class = 'col-md-4 '>
					  <div class='card-body' >
					    <h3 class='card-title'>".$ghName."</h3>
					    <p class='card-text'>".$ghSummary."</p>";
					    if(isset($_COOKIE['logged_in'])){
					    	echo"
					    		<form id='add-game' name='add-game' method = 'post' action = 'add-game.php'>
             			 <input type='hidden' id='gameID' name='gameID' value='$gid' />
         					 <button type='submit' class='btn btn-primary btn-sm'
               		 style='padding-left: 2.5rem; padding-right: 2.5rem;' id ='add-game' disabled>Add Game</button>
          				<h1></h1>
         					 </form>

					    	";
					    }

					    #<a href='#' class='btn btn-primary'>Add to List</a>

					 echo" </div>
					</div>
					  <div class = 'col-md-3' >
					  	<small > Platforms";
					  	
					  	if($rGP){
					  		echo"<ul>";
					  			#platform_id, name, logo_id
					  		while($rowGP = mysqli_fetch_array($rGP)){
					  			$pid = $rowGP["platform_id"];
					  			$pname = $rowGP["name"];
					  			$plogo=$rowGP["logo_id"];

					  			if($pid <>"") {
					  			echo"<li>".$pname."  <img src='https://images.igdb.com/igdb/image/upload/t_logo_med/".$plogo.".png' style='max-height: 15%; max-width:15% ;'></li>";	
					  		}
					  	}


					  		echo"</ul>";
					  	}
					  	echo"</small>";
					 echo" </div>

					 </div>
				</div>
			</div>	
  		</div>
    </div>
   	<!-- Card end -->
    
  </div>


<!-- game carousel end-->
	
";

}
echo"<!--============================Game Detail Heading End========================================== -->
	";

}


function buildGameExtraDetails($con, $rGAS, $rGT,$rGGe,$rGM,$rGV ){
$rGASTrue = false;
if($rGAS){
	$rowGAS = mysqli_fetch_array($rGAS);
	$release_date = $rowGAS["release_date"];
	$gARating= $rowGAS["aggregated_rating"];
	$gARCount=$rowGAS["aggregated_rating_count"];
	$gRating=$rowGAS["rating"];
	$gRCount=$rowGAS["rating_count"];

	$rGASTrue = true;
					 }

echo"
<div class = 'container-fluid bg-dark '>
<!--============================Game Detail Extra Details start ===================================-->
<div class='row g-0 justify-content-center' style = ''>
	<div class='col-xs-12 col-lg-5 '>
    		<div class='card text-bg-dark h-100' style='width: auto;'>	
					  
    			<div class = 'card-body'>";

if($rGV and mysqli_num_rows($rGV)>0){
$countGV = 1;
$indicatorsGV=0;

$numGV = mysqli_num_rows($rGV);

  echo"<!-- game carousel -->
<div id='myGameVideosCarousel' class='carousel slide'  >
  <!-- Indicators -->
  <div class='carousel-indicators '>";

    	while($indicatorsGV < $numGV){
  		if ($indicatorsGV == 0){
  			echo"<button type='button' data-bs-target='#myGameVideosCarousel' data-bs-slide-to='".($indicatorsGV)."' class='active' aria-current='true' aria-label='Slide ".($indicatorsGV)."'></button>";
  		}
  		else{
  			echo"<button type='button' data-bs-target='#myGameVideosCarousel' data-bs-slide-to='".($indicatorsGV)."' aria-current='true' aria-label='Slide ".($indicatorsGV)."'></button>";
  		}
  		$indicatorsGV = $indicatorsGV + 1;		
  	}
echo"</div>";

echo"
<!-- Carousel content -->
  <div class='carousel-inner'>";
#search_id, video_name
 while($rowGV = mysqli_fetch_array($rGV)){
    $sid = $rowGV['search_id'];
    $gvName = $rowGV['video_name'];


    if($sid <>"") {
    	if($countGV == 1){
			    echo" <!-- Card start -->
    					<div class='carousel-item active' style='height: 100%;' data-interval='8000' >
    						<div class ='container-fluid bg-dark'>
  			  					<div class='card text-bg-dark mb-0' style=''>
					 				 <div class='ratio ratio-16x9'>
 						 				<iframe src='https://www.youtube.com/embed/".$sid."?rel=0' title='".$gvName."' allowfullscreen></iframe>
										</div>	
								</div>	
  							</div>
    					</div>
   	<!-- Card end -->"; 
			   	$countGV= $countGV +1;
    	}
    	else{
    		 echo" <!-- Card start -->
    					<div class='carousel-item' style='height: 100%; ' data-interval='8000' >
    						<div class ='container-fluid bg-dark'>
  			  					<div class='card text-bg-dark mb-0' style=''>
					 				 <div class='ratio ratio-16x9'>
 						 				<iframe src='https://www.youtube.com/embed/".$sid."?rel=0' title='".$gvName."' allowfullscreen></iframe>
										</div>	
								</div>	
  							</div>
    					</div>
   			<!-- Card end -->"; 
    		
    	}


    }

    }


  echo"    
  </div>
  
</div>
<!-- game carousel end-->
";
}
else{
	echo"<H2>No Videos Available</H2>";
}


echo"
</div>
</div>
</div>";


#$rGAS, $rGT,$rGGe,$rGM,


echo"<div class = 'col-md-4 '>
		<div class='card text-bg-dark h-100' style='width: auto;'>	
			 <div class='card-body' >
					    <h2 class='card-title'>Themes</h2>";
					    if($rGT){
					    	while($rowGT = mysqli_fetch_array($rGT)){
    							$tid = $rowGT['theme_id'];
    							$tName = $rowGT['name'];

    							if($tid <>""){
    								echo"<span class='badge text-bg-primary'>".$tName."</span>";
    							}

    						}

					    }
					    else{
					    	echo"<span class='badge text-bg-primary'>No Themes Found</span>";
					    }
					  
					    echo"<h2 class='card-title'>Genres</h2>";
					    if($rGGe){
					    	while($rowGGe = mysqli_fetch_array($rGGe)){
    							$geid = $rowGGe['genre_id'];
    							$geName = $rowGGe['name'];

    							if($geid <>""){
    								echo"<span class='badge text-bg-info'>".$geName."</span>";
    							}

    						}

					    }
					    else{
					    	echo"<span class='badge text-bg-info'>No Genres Found</span>";
					    }

					    echo"<h2 class='card-title'>Gamemode(s)</h2>";
					     if($rGM){
					    	while($rowGM = mysqli_fetch_array($rGM)){
    							$gmid = $rowGM['gm_id'];
    							$gmName = $rowGM['name'];

    							if($geid <>""){
    								echo"<span class='badge text-bg-warning'>".$gmName."</span>";
    							}

    						}

					    }
					    else{
					    	echo"<span class='badge text-bg-warning'>No Gamemode Info Available</span>";
					    }


					    echo"<h2 class='card-title'>Initial Release Date</h2>";
					    	if($rGASTrue){
					    	if($release_date<>""){
					    	echo" <span class='badge text-bg-light'>".$release_date."</span>";
					    	}
					    	else{
					    	echo" <span class='badge text-bg-light'> Date Unavailable</span>";	
					    	}
					    }
					    else{
					    	echo" <span class='badge text-bg-light'> Date Unavailable</span>";
					    }

			echo"
					</div>
				</div>
			</div>";


			echo"<div class = 'col-md-3' >
				<div class='card text-bg-dark h-100' style='width: auto;'>	
					  	
						<h2 class='card-title'>Ratings</h2>";

						if($rGASTrue){
							
							echo"
						<div class='container-fluidbg-dark'>

						
						 <h4 >Critic Reviews</h4>		
						 		<div class='progress w-75'>
 									 <div class='progress-bar progress-bar-striped bg-warning' role='progressbar' style='width: ".$gARating."%' aria-valuenow='".$gARating."' aria-valuemin='0' aria-valuemax='100'>".$gARating."</div>
								</div>
								<small>".round($gARating,1)."% from ".$gARCount." Critics</small>
						
					    <h4>IGDB User Reviews</h4> 
					    <div class='progress w-75'>
 									 <div class='progress-bar progress-bar-striped bg-danger' role='progressbar' style='width: ".$gRating."%' aria-valuenow='".$gRating."' aria-valuemin='0' aria-valuemax='100'>".$gRating."</div>
								</div>
								<small>".round($gRating,1)."% from ".$gRCount." IGDB users</small>";
							
					  // echo"  <h4>GSol Reviews</h4>
					  //   <div class='progress w-75'>
 					// 				 <div class='progress-bar progress-bar-striped bg-info' role='progressbar' style='width: 0%' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>0</div>
					// 			</div>
						
					// 			<small>Currently Unavailable</small>
	
								
					// 		</div>";
							#<small>0% from 0 GSol users</small>
						}
						




echo"</div>
</div>
</div>
</div>
<!--============================Game Detail Extra Details END ===================================-->
</div>
";
}

function buildGameScreenshotsCarousel($con, $rGAS){
echo"
<!--============================Game Detail Screenshots start ===================================-->";
#echo"1";
if($rGAS){
#echo"2";
$rowGAS = mysqli_fetch_array($rGAS);
$gScreenshots = $rowGAS["screenshots"];
$gScrArray = explode("|", $gScreenshots);
if(count($gScrArray) > 0){
echo"<div class = 'container-fluid bg-dark'><div class = 'row text-bg-dark'><h2 class = 'text-center text-light fw-bold ' >Screenshots</h2></div></div>";

echo"<!-- game carousel -->

<div id='myGameScreenshotsCarousel' class='carousel slide carousel-fade' data-bs-ride='carousel' >";

$indicatorsGS=0;
$gsNum = count($gScrArray);


echo"
  <!-- Indicators -->
  <div class='carousel-indicators'>";

    	while($indicatorsGS < $gsNum){
  		if ($indicatorsGS == 0){
  			echo"<button type='button' data-bs-target='#myGameScreenshotsCarousel' data-bs-slide-to='".($indicatorsGS)."' class='active' aria-current='true' aria-label='Slide ".($indicatorsGS)."'></button>";
  		}
  		else{
  			echo"<button type='button' data-bs-target='#myGameScreenshotsCarousel' data-bs-slide-to='".($indicatorsGS)."' aria-current='true' aria-label='Slide ".($indicatorsGS)."'></button>";
  		}
  		$indicatorsGS = $indicatorsGS + 1;		
  	}
  echo"</div>";

echo"<!-- Carousel content -->
  <div class='carousel-inner'>";


$gsCT = 0;
while ($gsCT < $gsNum){
	if($gsCT == 0){
		echo"
    <!-- Card start -->
    <div class='carousel-item active' data-interval='8000' >
    	<div class = 'overlay-image-2' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_screenshot_big/".$gScrArray[$gsCT].".jpg);'></div>
    	<div class ='container'>
    		<div class='card text-bg-dark mb-0 d-none d-lg-block' style='left: 250; width: 50em;'>
    		  	<div class='row g-0 '>
    		  		
					  <img src='https://images.igdb.com/igdb/image/upload/t_screenshot_huge/".$gScrArray[$gsCT].".jpg' class='card-img-left' alt='...'>

				</div>
			</div>	
 
 			<div class='card text-bg-dark  d-lg-none position-relative' style=''>
    		  	<div class='row g-0 '>
    		  		
					  <img src='https://images.igdb.com/igdb/image/upload/t_screenshot_med/".$gScrArray[$gsCT].".jpg' class='card-img-left' alt='...'>

				</div>
			</div>	



  		</div>
    </div>
   	<!-- Card end -->";
	}
	else{
		echo"    
	<!-- Card start-->
    <div class='carousel-item' data-interval='8000'>
    	<div class = 'overlay-image-2' style='background-image:url(https://images.igdb.com/igdb/image/upload/t_screenshot_big/".$gScrArray[$gsCT].".jpg);'></div>
    	<div class ='container'>
    		<div class='card text-bg-dark mb-0 d-none d-lg-block' style='left: 250;width: 50em;'>
    		  	<div class='row g-0'>
    		  	
					  <img src='https://images.igdb.com/igdb/image/upload/t_screenshot_huge/".$gScrArray[$gsCT].".jpg' class='card-img-left' alt='...'>

				
			</div>
  		</div>
  		<div class='card text-bg-dark  d-lg-none position-relative' style=''>
    		  	<div class='row g-0 '>
    		  		
					  <img src='https://images.igdb.com/igdb/image/upload/t_screenshot_med/".$gScrArray[$gsCT].".jpg' class='card-img-left' alt='...'>

				</div>
			</div>	




    </div>
  </div>
    <!-- Card end -->";
	}
	$gsCT = $gsCT+1;

}
echo" </div>";
echo"
  <!-- Buttons-->
  <button class='carousel-control-prev' type='button' data-bs-target='#myGameScreenshotsCarousel' data-bs-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-bs-target='#myGameScreenshotsCarousel' data-bs-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>
</div>
<!-- game carousel end-->

";


}
else{
	echo"<div class = 'container-fluidbg-dark'><div class = 'row text-bg-dark'><h2 class = 'text-center text-light fw-bold ' >No Screenshots Available</h2></div></div>";
}

}
echo"
<!--==========================Game Detail Screenshots end ==========================================-->
	";

}

function buildGameSearchBar(){
	echo"
	<!--  Search Bar -->
<div class='container-fluid'>
<form action='game-search.php' method='get' style='margin-bottom:0;' autocomplete='off'  >
<div class = 'form-group row justify-content-center' style='padding-top:30px;'  action='gamesearch.php' method='get'>
	<div class ='col-3'>
	</div>
	<div class= 'col-5 '>
		<label for='gameSearch' class='visually-hidden'>game search</label>
    	<input type='text' class='form-control' id='keyword' name='keyword' required='required' autocomplete='off' >
    	 <input type='hidden' id='page' name='page' value='1'>
	</div>
	<div class ='form-group col-4'>
		<button type='submit' class ='btn btn-primary mb-3'>Search</button>
	</div>
</div>
</form>
</div>

<!-- Search Bar end-->
	";
}

function GameSearchTotal($con, $keyword){
	$keyword = mysqli_escape_string($con, $keyword);
	if(in_array(strtolower($keyword), array('*','all','all games'))){
		$sqlTotal = "SELECT game_id from games";
	}
	else{
	$sqlTotal = " SELECT g.game_id, gas.artworks, gas.screenshots,
		MATCH(g.name, g.summary) AGAINST('".$keyword."' IN natural language mode) as relevance,
		MATCH(g.name) AGAINST('".$keyword."' IN natural language mode) as name_relevance  FROM games g join vgame_artworks_screenshots gas
		ON g.game_id = gas.game_id 
		WHERE MATCH(g.name, g.summary) AGAINST('".$keyword."' IN natural language mode) 
		having name_relevance > 0 and relevance > 5
		order by name_relevance desc, relevance desc";
}
		$resultTotal = mysqli_query($con, $sqlTotal);
		if($resultTotal){
			$rowT = mysqli_num_rows($resultTotal);
			if( $rowT> 0){
				$_SESSION['searchTotal'] = $rowT;
			}
			else{
				$_SESSION['searchTotal'] = 0;
			}
		}
		else{
			$_SESSION['searchTotal'] = 0;
		}
}



#=====================Chloe Functions=============================================
function isUserAuthorized($username){


        if(isset($_SESSION['username'])){
    

            if ($_SESSION['username'] == $username){

                return true;
            }
    
    
        }
    
    
       return false;
    
    }











?>