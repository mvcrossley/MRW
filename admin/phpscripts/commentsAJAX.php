<?php
	include('connect.php');

	$username = trim($_POST['username']);
	$time = trim($_POST['time']);
	$text = trim($_POST['text']);
	$rating = $_POST['rating'];
	$id = $_POST['id'];

	// $link = mysql_connect("localhost", "root", "");
	// $db = mysql_select_db("db_comments", $link);

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