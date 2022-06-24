<?php
	// $servername = "localhost";
	// $username = "root";
	// $password = "";
	// $dbname = "warehouse";

	$servername = "db4free.net";
	$username = "nan2543";
	$password = "nan0967849235";
	$dbname = "scanproject1";
	
	// Create Connection.
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check Connection.
	if($conn->connect_error) {
		die("Connection filed: " . $conn->connect_error);
		return;
	} else {
		// echo 'File';
	}
?>