<?php
	include('connect.php');

	date_default_timezone_set('America/New_York');

	$username = trim($_POST['username']);
	$time = date('F j Y h:i:s A');
	$text = trim($_POST['text']);
	$rating = $_POST['rating'];
	$id = $_POST['id'];

	$query = "INSERT INTO tbl_comments VALUES(NULL,'{$username}','{$time}','{$text}','{$rating}','{$id}')"; //Insert Query
	$run = mysqli_query($link, $query);
	
	if($run){
		$message = "Your review has been posted.";
	}
	else{
		$message = "The review could not be posted.";
	}
	echo "Comments has been posted.";
	
	mysqli_close($link); // Connection Closed
?>