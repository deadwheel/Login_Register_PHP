<?php

session_start();
session_regenerate_id();

if(isset($_SESSION['zalogowany']) && isset($_SESSION['id_uzyt']) && $_SESSION['zalogowany']==1 && $_SESSION['id_uzyt'] != 0) {
	
	
	$_SESSION = array();
	
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}


	session_destroy();
	
	
}	
	
	header('Location: index.php');
	

?>