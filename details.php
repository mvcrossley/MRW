<?php
	require_once('admin/phpscripts/init.php');
	
	if(isset($_GET['id'])) {
		$tbl = "tbl_movie";
		$col = "movie_id";
		$id = $_GET['id'];
		//echo $id;
		$getOne = getOne($tbl, $col, $id);
		$getTitle = getOne($tbl, $col, $id);

		$tbl2 = "tbl_comments";
		$getComments = getComments($tbl2, $id);

//		if(isset($_POST['submit']))
//		{
//			date_default_timezone_set('America/New_York');
//
//			$username = trim($_POST['username']);
//			$time = date('F j Y h:i:s A');
//			$text = trim($_POST['text']);
//			$rating = $_POST['rating'];
//
//			if (empty($rating))
//			{
//				$message = "Please rate the movie.";
//			}
//			else
//			{
//				$result = postReview($username, $time, $text, $rating, $id);
//			}
//		}
	}
?>

<?php include("includes/header.html"); ?>
<section class="expanded row">
	<h2 class="hide">Go Back to Home Page</h2>
	<div id="goBack" class="row">
		<a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Go Back to Movie List...</a>
	</div>
</section>

<section class="row" id="movieInfo">
<h2 class="hide">Movie Details</h2>
	<?php
		if(!is_string($getOne)){
			$row = mysqli_fetch_array($getOne);
				echo "
					<div id=\"trailer\" class=\"small-12 large-6 column\">
						{$row['movie_trailer']}
					</div>
					<div id=\"movieDesc\" class=\"small-12 large-6 column\">
						<h3>{$row['movie_title']}</h3>
						<p>Year: <span>{$row['movie_year']}</span></p>
						<p>Genre: <span>{$row['movie_genre']}</span></p>
						<p>Role: <span>{$row['movie_role']}</span></p>
						<p>Description: <span>{$row['movie_desc']}</span></p>
					</div>";
		}else{
			echo "<p>{$getOne}</p>";
		}
	?>
</section>

<section class="row" id="reviews">
	<h2><i class="fa fa-comments" aria-hidden="true"></i> Read the Reviews</h2>

	<?php
		//if(!is_string($getComments)){
		//	while($row = mysqli_fetch_array($getComments)){
		//		echo "<div id=\"reviewInd\" class=\"comment small-12 column\">
		//				<h4 id="username">{$row['comment_user']} </h4>
		//				<h4 id="rating">{$row['comment_rating']}</h4>
		//				<p id="time"><span>{$row['comment_time']}</span></p>
		//				<p id="text">{$row['comment_text']}</p>
		//			</div>";
		//	}
		//}else{
		//	echo "<p>{$getComments}</p>";
		//}
	?>
</section>

<section class="row" id="comments">

	<h2>Write a Review:</h2>
	<?php if(!empty($message)){echo $message;} ?>
		<form id="postComment" name="commentForm">
			<div id="nickname" class="small-12 medium-8 large-6 column">
				<label>Nickname:</label>
				<input type="text" name="username" value="" size="32">
			</div>
			<div id="rating" class="small-12 medium-4 column">
				<label>Select Rating:</label>
				<select name="rating" >
					<option value="">Please Select One...</option>
					<option value="&#9733;&#9734;&#9734;&#9734;&#9734;">&#9733;&#9734;&#9734;&#9734;&#9734;</option>
					<option value="&#9733;&#9733;&#9734;&#9734;&#9734;">&#9733;&#9733;&#9734;&#9734;&#9734;</option>
					<option value="&#9733;&#9733;&#9733;&#9734;&#9734;">&#9733;&#9733;&#9733;&#9734;&#9734;</option>
					<option value="&#9733;&#9733;&#9733;&#9733;&#9734;">&#9733;&#9733;&#9733;&#9733;&#9734;</option>
					<option value="&#9733;&#9733;&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
				</select><br>
			</div>
			<div id="review" class="small-12 column">
				<label>Comment/Review:</label>
				<textarea name="text"></textarea>
			</div>
			
			<div id="submit" class="small-12 column">
				<input type="submit" onclick="myFunction()" name="submit" value="Submit">
			</div>
		</form>

</section>
<?php include("includes/footer.html"); ?>