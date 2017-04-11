<?php
	require_once('admin/phpscripts/init.php');
	
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
	<h2 class="hide">Go Back to Home Page</h2>
	<div>
		<a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Go Back to Movie List...</a>
	</div>
</section>

<section class="row">
<h2 class="hide">Movie Details</h2>
	<?php
		if(!is_string($getOne)){
			$row = mysqli_fetch_array($getOne);
				echo "
					<div class=\"small-12 large-6 column\">{$row['movie_trailer']}</div>
					<div class=\"small-12 large-6 column\">
					 <h2>{$row['movie_title']}</h2>
					 <p>{$row['movie_year']}</p><br>
					 <p>{$row['movie_genre']}</p><br>
					 <p>{$row['movie_role']}</p><br>
					 <p>{$row['movie_desc']}</p><br>
					</div>";
		}else{
			echo "<p>{$getOne}</p>";
		}
	?>
</section>

<section class="row">
<h2 class="hide">Movie Reviews</h2>
	<h3><i class="fa fa-comments" aria-hidden="true"></i> Read the Reviews</h3>

	<?php
		if(!is_string($getComments)){
			while($row = mysqli_fetch_array($getComments)){
				echo "<h3>{$row['comment_user']}</h3>
					<p>{$row['comment_time']}</p>
					<p>{$row['comment_rating']}</p>
					<p>{$row['comment_text']}</p>";
			}
		}else{
			echo "<p>{$getComments}</p>";
		}
	?>
</section>

<section class="row">

	<h2>Write a Review:</h2>
	<?php if(!empty($message)){echo $message;} ?>
		<form action="details.php?id=<?php echo "$id";?>" method="post">
			<div class="small-12 medium-8 large-6 column">
				<label>Nickname:</label><br>
				<input type="text" name="username" value="" size="32">
			</div>
			<div class="small-12 medium-4 column">
				<label>Select Rating:</label><br>
				<select name="rating" >
					<option value="">Please Select One...</option>
					<option value="&#9733;&#9734;&#9734;&#9734;&#9734;">&#9733;&#9734;&#9734;&#9734;&#9734;</option>
					<option value="&#9733;&#9733;&#9734;&#9734;&#9734;">&#9733;&#9733;&#9734;&#9734;&#9734;</option>
					<option value="&#9733;&#9733;&#9733;&#9734;&#9734;">&#9733;&#9733;&#9733;&#9734;&#9734;</option>
					<option value="&#9733;&#9733;&#9733;&#9733;&#9734;">&#9733;&#9733;&#9733;&#9733;&#9734;</option>
					<option value="&#9733;&#9733;&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
				</select><br><br><br><br>
			</div>
			<div class="small-12 column">
				<label>Comment/Review:</label><br>
				<textarea name="text"></textarea>
			</div>
			
			<div class="small-12 column">
				<input type="submit" name="submit" value="Add">
			</div>
		</form>

</section>

<?php include("includes/footer.html"); ?>