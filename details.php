<?php
	require_once('admin/phpscripts/init.php');
	
	if(isset($_GET['id'])) {
		$tbl = "tbl_movie";
		$col = "movie_id";
		$id = $_GET['id'];
		$getOne = getOne($tbl, $col, $id);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php{$row['movie_title']}?></title>
</head>
<body>
<?php

	if(!is_string($getOne)){
		$row = mysqli_fetch_array($getOne);
			echo "{$row['movie_trailer']}
				 <h2>{$row['movie_title']}</h2>
				 <p>{$row['movie_year']}</p><br>
				 <p>{$row['movie_genre']}</p><br>
				 <p>{$row['movie_role']}</p><br>
				 <p>{$row['movie_desc']}</p><br>
				 <a href=\"index.php\">Back...</a><br><br>";
		
	}else{
		echo "<p>{$getOne}</p>";	
	}

?>
</body>
</html>