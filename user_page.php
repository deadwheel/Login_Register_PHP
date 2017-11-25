<?php

session_start();
session_regenerate_id();

if(isset($_SESSION['zalogowany']) && isset($_SESSION['id_uzyt']) && $_SESSION['zalogowany']==1 && $_SESSION['id_uzyt'] != 0) {
	
	include_once "_mysql.php";
	include_once('top_body.html');
	
	$zap = $conn->prepare("SELECT date FROM user WHERE ID=?");
	$zap->bind_param("i", $_SESSION['id_uzyt']);
	$zap->execute();
	$zap->bind_result($data_z_bazy);
	$zap->store_result();
	$zap->fetch();
	$zap->close();
	$conn->close();
	
	$akt_miesiac = date("n");
	$akt_rok = date("Y");
	$akt_dzien = date("d");
	
	$date1_array = explode('-',$data_z_bazy);
	
	if($akt_miesiac > $date1_array[1]) {
		
		$nast_rok = $akt_rok + 1;
		$date_now = new DateTime("".$akt_rok."-".$akt_miesiac."-".$akt_dzien."");
		$date2 = new DateTime("".$nast_rok."-".$date1_array[1]."-".$date1_array[2]."");		
		
	}
	
	else {

		$date_now = new DateTime("".$akt_rok."-".$akt_miesiac."-".$akt_dzien."");
		$date2 = new DateTime("".$akt_rok."-".$date1_array[1]."-".$date1_array[2]."");
		
	}
	
	
	$interval = $date_now->diff($date2);

	
	
	echo "<div id='user_panel'>
	
		<div id='cont_user_panel'>
		
		
			<h3>Zostałeś pomyślnie zalogowany. <a href='logout.php'>Wyloguj się</a></h3>
			<span>Do twoich urodzin zostało: ".$interval->format('%a')." dni</span>
			
		
		</div>
		
		<div style='clear: both;'></div>
	
	</div>";
	
	
	echo '</body></html>';
	
}

else {
	
	header('Location: index.php');
	
}


?>