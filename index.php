<?php
	//ini_set('display_errors',1);
    //error_reporting(E_ALL);
	
	require_once('admin/phpscripts/init.php');

	$tbl = "tbl_movie";
	$getAll = getAll($tbl);
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Cillian Murphy Fan Site - Home</title>
<link href="css/foundation.css" rel="stylesheet" type="text/css">
<link href="css/app.css" rel="stylesheet" type="text/css">
<script src="https://use.fontawesome.com/bffe9fd51f.js"></script>
</head>

<body>
<?php
    include("includes/header.html");
?>

<?php
	if(!is_string($getAll)){
		while($row = mysqli_fetch_array($getAll)){
			echo "<img src=\"images/{$row['movie_thumb']}\" alt=\"{$row['movie_title']}\">
				 <h2>{$row['movie_title']}</h2><br>
				 <a href=\"details.php?id={$row['movie_id']}\">Read Reviews</a><br><br>";
		}
	}else{
		echo "<p>{$getAll}</p>";
	}
?>


<?php
    include("includes/footer.html");
?>

<script src="js/app.js"></script>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
</body>
</html>
