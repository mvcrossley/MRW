<?php
	require_once('admin/phpscripts/init.php');
	
	if(isset($_GET['id'])) {
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		$getOne = getOne($tbl, $col, $id);

		$tbl2 = "tbl_comments";
		$getComments = getComments($tbl2, $id);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Movie Reviews</title>
<link href="css/foundation.css" rel="stylesheet" type="text/css">
<link href="css/app.css" rel="stylesheet" type="text/css">
<script src="https://use.fontawesome.com/bffe9fd51f.js"></script>
</head>
<body>
<?php
    include("includes/header.html");
?>

<a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Go Back to Movie List...</a><br>

<h2><i class="fa fa-comments" aria-hidden="true"></i>  Read the Reviews</h2>

<?php
	if(!is_string($getOne)){
		$row = mysqli_fetch_array($getOne);
			echo "{$row['movie_trailer']}
				 <h2>{$row['movie_title']}</h2>
				 <p>{$row['movie_year']}</p><br>
				 <p>{$row['movie_genre']}</p><br>
				 <p>{$row['movie_role']}</p><br>
				 <p>{$row['movie_desc']}</p><br>";	
	}else{
		echo "<p>{$getOne}</p>";
	}

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


<h2>Post a Review:</h2>
<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_details.php?id={$row['movie_id']}" method="post" enctype="multipart/form-data"><!--By default, forms are set to handle text. Set to multipart form data to handle other types of files-->
		<label>Nickname:</label><br>
		<input type="text" name="comment_user" value="" size="32"><br><br>
		<label>Comment:</label><br>
		<input type="text" name="comment_text" value="" size="32" ><br><br>
		<label>Select Rating:</label><br>
		<select name="comment_rating" >
			<option value="">Please Select One...</option>
			<option value="">&#9733;&#9734;&#9734;&#9734;&#9734;</option>
			<option value="">&#9733;&#9733;&#9734;&#9734;&#9734;</option>
			<option value="">&#9733;&#9733;&#9733;&#9734;&#9734;</option>
			<option value="">&#9733;&#9733;&#9733;&#9733;&#9734;</option>
			<option value="">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
	</select><br><br><br><br>
	<input type="submit" name="submit" value="Add" >
</form>

<?php
    include("includes/footer.html");
?>

<script src="js/app.js"></script>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
</body>
</html>