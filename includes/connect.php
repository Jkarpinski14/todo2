<?php
	//Why is this important? Why does localhost have to be first?
	$mysqli = new mysqli('localhost', 'root', 'root', 'todo');
	//tasks is the name of our database
	
	if($mysqli->connect_error){
		die('Connect Error (' . mysqli_>connect_errno .')'
			. $mysqli->connect_error);
	}
	else{
		//echo "Connection made";
	}
	$mysqli->close();
?>