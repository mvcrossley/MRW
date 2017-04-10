<?php
	$user = "root"; //This is set up for a PC. 
	$pass = ""; //Please change pass to use on a MAC
	$url = "localhost";
	$db = "db_mrw";
	
	$link = mysqli_connect($url, $user, $pass, $db);
		
	if(mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>