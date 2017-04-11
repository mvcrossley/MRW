<?php
	//ini_set('display_errors',1);
    //error_reporting(E_ALL);
	
	require_once('admin/phpscripts/init.php');

	$tbl = "tbl_movie";
	$getAll = getAll($tbl);
?>

<?php include("includes/header.html"); ?>

	<section class="row">
	<h2>Our Favourite Movies!</h2>
		<?php
			if(!is_string($getAll)){
				while($row = mysqli_fetch_array($getAll)){
					echo 	"<div class=\"small-6 medium-3 large-2 column end movieThumb\">
								<img src=\"images/{$row['movie_thumb']}\" alt=\"{$row['movie_title']}\">
								<h3>{$row['movie_title']}</h3>
								<a href=\"details.php?id={$row['movie_id']}\">Read Reviews</a>
							</div>";
				}
			}else{
				echo "<p>{$getAll}</p>";
			}
		?>
	</section>

<?php include("includes/footer.html");?>