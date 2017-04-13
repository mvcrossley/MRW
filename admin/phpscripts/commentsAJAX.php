<?php
	$username = trim($_POST['username']);
	$time = trim($_POST['time']);
	$text = trim($_POST['text']);
	$rating = $_POST['rating'];
	$id = $_GET['id'];

	$link = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("db_comments", $link);

	if (isset($_POST['username'])) {
		$query = mysql_query("INSERT INTO tbl_comments VALUES(NULL,'{$username}','{$time}','{$text}','{$rating}','{$id}')"); //Insert Query
		echo "Comments has been posted.";
	}
	mysql_close($link); // Connection Closed
?>