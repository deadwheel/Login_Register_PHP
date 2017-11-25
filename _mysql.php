<?php

	$host = "127.0.0.1";
	$user = "root";
	$pwd = "";
	$db = "test";

	$conn = new mysqli($host, $user, $pwd, $db);
	 
	 
	if ($conn->connect_error) {
	
		die("Connection failed: " . $conn->connect_error);

	}

	 
	 
?>