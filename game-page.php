<html>
<title>Gsol Game Page</title>
<?php
include "dependencies.php";
session_start();
echo"<head>";
headingdependencies();
echo"</head>";
include "dbconfig.php";
$con = mysqli_connect($host,$username, $password, $dbname);
mysqli_set_charset($con, "utf8");
$_SESSION['current_page']= "game-page.php";

?>




<body>
<?php 
bodydependencies();

include "header.php";

include "gsolbuilder.php";

?>


<style>

	.carousel-item{
		height:32rem;
		background: #000;
		color:white;
		background-position: center;
		background-size: cover;
	}

	.container {
		padding-top: 50px;
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
		position: center;
		bottom: 0;
		left: 0;
		right: 0;
		top:0;
	}
	.scrollable{
		overflow-y: auto;
		max-height:10em;
	}
	.card-text {
	    overflow-y: auto;
	    text-overflow: ellipsis;
	    white-space: wrap;
	    max-height:  15em;
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
buildGameCarousel($con, 5);
?>


<?php buildGameSearchBar(); ?>
<!-- Top Games -->
<?php

echo" <!----------------Critically Acclaimed Games -------------------->";
#SQL query that will retrieve the data from DB
$sql1 = " SELECT game_id, name, cover_id, aggregated_rating FROM games ORDER BY aggregated_rating DESC LIMIT 10";
$result1 = mysqli_query($con, $sql1);
$count = 1;
if($result1) {
  echo "
  <div class='categories container-fluid ' >
      <div class = 'row text-center' style='padding-bottom:20px;' >
      <h2 class='title'>Critically Acclaimed Games </h2>
      </div>
      <div class='row '  style='padding-bottom:20px;'>
        ";
  #$count = 1;
  while($row = mysqli_fetch_array($result1)){
    $name = $row['name'];
    $id = $row['game_id'];
    $cover_id = $row['cover_id'];
    $rating = $row['aggregated_rating'];

#echo"<img src='data:image/jpeg;base64,".base64_encode($img)."'/>";
    
    if($id <>"") {
      echo" <div class='card text-white bg-black col-2 mx-auto' style='left:0;width:15em;'>
          <a href='game-details.php?gameid=".$id."'>
            <img src='https://images.igdb.com/igdb/image/upload/t_cover_big/".$cover_id.".jpg' class='card-img-top' alt='Game ".$count."'/></a>
           <h4 class='card-title'>".$name."</h4> "; 
      echo"</div>";
    }
    $count = $count +1;
    if($count == 6){
    	echo"</div> <div class='row' style='padding-bottom:20px;'>";
    }
}
  echo " </div>
        </div>
    ";
}



?>
<!-- top games end -->







<!--
https://images.igdb.com/igdb/image/upload/t_screenshot_big/ar4hb.jpg
https://images.igdb.com/igdb/image/upload/t_screenshot_big/aru0a.jpg
https://images.igdb.com/igdb/image/upload/t_screenshot_big/ar4t1.jpg
-->

<?php include"footer.php"; ?>
</body>
</html>