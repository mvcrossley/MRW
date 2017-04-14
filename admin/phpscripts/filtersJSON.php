<?php
	include('connect.php');

	$genre = $_GET['movie_genre'];
	$queryAll = "SELECT * FROM tbl_movie WHERE movie_genre = '$genre'"; //Select all comments that have the corresponding movie id#
	$runAll = mysqli_query($link, $queryAll);

	if(empty($runAll) || $runAll == 'null'){ //If the query returns zero results...
    	$result = "No comments found.";
    	echo $result;
    } else if(!empty($runAll)){ //If the query returns information...
        while ($row = mysqli_fetch_array($runAll)){
            $data[] = $row; //...loops through rows and collects the information into an array
    	}
    echo json_encode($data); //Echo the JSON-generated object
	}
?>