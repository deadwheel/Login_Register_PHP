<html>
<head>
	<title>Login / Register PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/login_form.js"></script>
</head>
<body>

<?php 

	$display_err_email = "";
	$display_err_pass = "";
	$display_err_date = "";
	$display_err_email_login = "";
	$display_err_pwd_login = "";


	if(!empty($err_email)) {
	
		$display_err_email = "style='display: block;'";
	
	}
	
	if(!empty($err_pass)) {
	
		$display_err_pass = "style='display: block;'";
	
	}
	
	if(!empty($err_date)) {
	
		$display_err_date = "style='display: block;'";
	
	}
	
	if(!empty($err_email_login)) {
	
		$display_err_email_login = "style='display: block;'";
	
	}
	
	if(!empty($err_pass_login)) {
	
		$display_err_pwd_login = "style='display: block;'";
	
	}

?>


<?php echo $register_info ?>

<div id="cont">

	<div id="left_login">

		<h2>Login</h2>
	
		<form method="POST" action="index.php" onsubmit="return check_login()" name="login_form">

			<input type="email" name="email" placeholder="Email" value="<?php echo $email_info_login; ?>" required>
			<div id="login_em_err" <?php echo $display_err_email_login; ?> ><?php echo $err_email_login; ?></div>
			<input type="password" name="pass" placeholder="Password" required>
			<div id="login_pwd_err" <?php echo $display_err_pwd_login; ?> ><?php echo $err_pass_login; ?></div>
			<input type="submit" name="login" id="zal" value="ZALOGUJ">
		
		</form>
	
	
	</div>
	
	
	
	
	<div id="right_register">
	
		<h2>Register</h2>

		<form method="POST" action="index.php" onsubmit="return check_reg()" name="reg_form">
		
			<input type="email" name="email" placeholder="Email" value="<?php echo $email_info ?>" required>
			<div id="reg_em_err" <?php echo $display_err_email; ?> ><?php echo $err_email; ?></div>
			<input type="password" name="pass" placeholder="Password" onkeyup="check_strong_pass(this)" required>
			<div id="cont_bar">
			
				<div id="bar_strong"></div>
			
			</div>
			<div id="reg_pass_err" <?php echo $display_err_pass; ?>><?php echo $err_pass; ?></div>
			<input type="text" name="date" placeholder="Date (rrrr-mm-dd)" value="<?php echo $date_info ?>" required>
			<div id="reg_date_err" <?php echo $display_err_date; ?>><?php echo $err_date; ?></div>
			<input type="submit" name="register" id="zar" value="ZAREJESTRUJ SIĘ">
		
		</form>

	
	</div>
	
	<div style="clear: both;"></div>

</div>


</body>
</html>