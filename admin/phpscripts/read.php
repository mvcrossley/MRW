<?php
	function getAll($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		
		if($runAll){
			return $runAll;	
		}else{
			$message = "Couldn't retrieve collection. Try again later, or contact your admin.";
			return $message;
		}

		mysqli_close($link);
	}

	function getOne($tbl, $col, $id) {
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col}={$id}";
		$runSingle = mysqli_query($link, $querySingle);
		
		if($runSingle){
			return $runSingle;	
		}else{
			$message =  "Couldn't retrieve movie information. Try again later, or contact your admin.";
			return $message;

			mysqli_close($link);
		}
	}

	function getComments($tbl2, $id) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl2} WHERE comment_movie = {$id}";
		$runAll = mysqli_query($link, $queryAll);
		
		if($runAll){
			return $runAll;	
		}else{
			$message = "Couldn't retrieve comments. Try again later, or contact your admin.";
			return $message;
		}

		mysqli_close($link);
	}

	function postReview($username, $time, $text, $rating, $id){
		include("connect.php");

		$poststring = "INSERT INTO tbl_comments VALUES(NULL,'{$username}','{$time}','{$text}','{$rating}','{$id}')";
		$postquery = mysqli_query($link, $poststring);
		
		if($postquery)
		{
			$message = "Your review has been posted.";
		}
		else
		{
			$message = "The review could not be posted.";
		}

		mysqli_close($link);
	}
?>