<?php 

// connecting database ...
// host, username, password, db-name
$dbCon = mysqli_connect('localhost', 'greenhouse','123@gh', 'system2');

// check connection 
	if(!$dbCon){
		echo "Connection Error: " . mysqli_connect_error();
	}	
?>