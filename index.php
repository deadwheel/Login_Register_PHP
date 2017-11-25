<?php

session_start();
session_regenerate_id();

if(!isset($_SESSION['zalogowany']) && !isset($_SESSION['id_uzyt'])) {
	
	$_SESSION['zalogowany'] = 0;
	$_SESSION['id_uzyt'] = 0;
	
}

$err_email = "";
$err_pass = "";
$err_date = "";
$register_info = "";
$email_info = "";
$date_info = "";
$err_email_login = "";
$err_pass_login = "";
$email_info_login = "";

function chnge($data) {
 
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}
 
function validateDate($date) {
    
	$d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') == $date;

}

include_once "_mysql.php";

if(isset($_POST['login'])) {
	
	$err = 0;
	$email_info_login = $_POST['email'];
	
	if(empty($_POST['email'])) {

		$err_email_login = "To pole nie może być puste";
		$err = 1;
	
	}	
	
	if(empty($_POST['pass'])) {

		$err_pass_login = "To pole nie może być puste";
		$err = 1;
	
	}

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

		$err_email_login = "Niepoprawny format";
		$err = 1;	

	}	
	
	if($err==0) {
	
		$zap = $conn->prepare("SELECT ID,hash FROM user WHERE email=?");
		$zap->bind_param("s", chnge($_POST['email']));
		$zap->execute();
		$zap->bind_result($id_user,$hash_pwd);
		$zap->store_result();
		
		if($zap->num_rows > 0) {
			
			
			$zap->fetch();
					
			
			$hash_post_pwd = sha1($_POST['pass'], FALSE);
			
			if($hash_post_pwd == $hash_pwd) {
				
				if(isset($_SESSION['zalogowany']) && isset($_SESSION['id_uzyt'])) {
	
					$_SESSION['zalogowany'] = 1;
					$_SESSION['id_uzyt'] = $id_user;
					
				}
				
			}
			
			else {
				
				$err_pass_login = "Niepoprawne hasło";
				
			}
				
				
			
		}
		
		else {
			
			$err_email_login = "Konto z takim emailem nie istnieje!";
			
		}
	

	
		$zap->close();
	
	
	}
	
	
	
	if(isset($_SESSION['zalogowany']) && isset($_SESSION['id_uzyt']) && $_SESSION['zalogowany']==1 && $_SESSION['id_uzyt'] != 0) {
		
		
		header('Location: user_page.php');
		
		
	}
	
	
	include "form_post.php";
	
}

elseif(isset($_POST['register'])) {
	
	$err = 0;
	
	
	if(empty($_POST['email'])) {

		$err_email = "To pole nie może być puste";
		$err = 1;
	
	}	
	
	if(empty($_POST['pass'])) {

		$err_pass = "To pole nie może być puste";
		$err = 1;
	
	}		
	
	if(empty($_POST['date'])) {

		$err_date = "To pole nie może być puste";
		$err = 1;
	
	}	
	
	
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

		$err_email .= " Niepoprawny format";
		$email_info = $_POST['email'];
		$date_info = $_POST['date'];
		$err = 1;	

	}
	
	if(!validateDate($_POST['date'])) {
		
		$err_date .= " Niepoprawny format (rrrr-mm-dd)";
		$email_info = $_POST['email'];
		$date_info = $_POST['date'];
		$err = 1;			
	
	}
	
	
	if($err == 0) {
	
		$zap = $conn->prepare("SELECT email FROM user WHERE email=?");
		$zap->bind_param("s", chnge($_POST['email']));
		$zap->execute();
		$zap->store_result();
		
		if($zap->num_rows > 0) {
			
			$err_email = "Konto z takim emailem już istnieje!";
			$email_info = $_POST['email'];
			$date_info = $_POST['date'];
			$err = 1;			
			
		}
		
		$zap->close();
	
	}
	
	
	if($err == 0) {
	
		$email = chnge($_POST['email']);
		$pass = sha1($_POST['pass'], FALSE);
		$bday = $_POST['date'];
		
		
		$zap = $conn->prepare("INSERT INTO user (email, hash, date) VALUES (?, ?, ?)");
		$zap->bind_param("sss", $email, $pass, $bday);
		
		if($zap->execute()) {
			
			
			$register_info = "<div id='register_info'>Gratulacje, zostałeś pomyślnie zarejestrowany! Możesz się teraz zalogować</div>";
			
		}
		
		$zap->close();
		
		
	
	
	
	}
	
	
	include "form_post.php";
	
	
}

elseif(isset($_SESSION['zalogowany']) && isset($_SESSION['id_uzyt']) && $_SESSION['zalogowany']==1 && $_SESSION['id_uzyt'] != 0) {
	
	
	header('Location: user_page.php');
	
	
}

else {
	
	
	include "form_post.php";
	
	
}

$conn->close();


?>