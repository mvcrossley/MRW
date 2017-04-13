<?php
	//ini_set('display_errors',1);
    //error_reporting(E_ALL);
	
	require_once('admin/phpscripts/init.php');

	$tbl = "tbl_movie";
	$getAll = getAll($tbl);

	if(isset($_GET['id'])) {
		$tbl = "tbl_movie";
		$col = "movie_id";
		$id = $_GET['id'];
		$getOne = getOne($tbl, $col, $id);
		$getTitle = getOne($tbl, $col, $id);

		$tbl2 = "tbl_comments";
		$getComments = getComments($tbl2, $id);

		if(isset($_POST['submit']))
		{
			date_default_timezone_set('America/New_York');

			$username = trim($_POST['username']);
			$time = date('F j Y h:i:s A');
			$text = trim($_POST['text']);
			$rating = $_POST['rating'];

			if (empty($rating))
			{
				$message = "Please rate the movie.";
			}
			else
			{
				$result = postReview($username, $time, $text, $rating, $id);
			}
		}
	}
?>

<?php include("includes/header.html"); ?>
	<section class="row">
		<div id="home">
		<h2>Our Favourite Movies!</h2>
			<?php
				if(!is_string($getAll)){
					while($row = mysqli_fetch_array($getAll)){
						echo 	"<div class=\"small-6 medium-3 large-2 column end movieThumb\">
									<div class=\"movieCon\">
									<a class=\"pickmovie\" id=\"{$row['movie_id']}\" href=\"details.php?id={$row['movie_id']}\">
										<img src=\"images/{$row['movie_thumb']}\" alt=\"{$row['movie_title']}\">
										<h4>{$row['movie_title']}</h4>
									</a>
									</div>
								</div>";
					}
				}else{
					echo "<p>{$getAll}</p>";
				}
			?>
		</div>
	</section>

<?php include("includes/footer.html");?>