
function check_date(date) {


    var regex_date = /^\d{4}\-\d{2}\-\d{2}$/;

    if(!regex_date.test(date))
    {
        return false;
    }

    // Parse the date parts to integers
    var parts   = date.split("-");
    var day     = parseInt(parts[2], 10);
    var month   = parseInt(parts[1], 10);
    var year    = parseInt(parts[0], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
    {
        return false;
    }

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
    {
        monthLength[1] = 29;
    }

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];


};

function validateEmail(email) {
  
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);

};

function check_strong_pass(pwd) {


	var score = 0;
	var warunki = 0;
	var bigLET = 0;
	var digit = 0;
	var special = 0;
	var Bigpatt = /^[A-Z]+$/;
	var letterNumber = /^[0-9a-zA-Z]+$/;
	var txt_pwd = pwd.value;
	var width_bar = 0;
	var color_bar = "red";
	
	if(txt_pwd.length >= 6) {

		score = score + Math.floor(txt_pwd.length/2);
		warunki++;
	}
	
	
	for(i=0;i<txt_pwd.length;i++) {
	
		if (txt_pwd[i].match(Bigpatt)) {
		
			bigLET++;

		}
		
		if(!isNaN(txt_pwd[i]) && txt_pwd[i] !== " ") {
		
		
			digit++;
		
		}
		
		if(!txt_pwd[i].match(letterNumber)) {
		
			special++;
		
		}
	
	}
	
	
	if(bigLET > 1) {
	
		score = score + 6;
		warunki++;
	
	}
	
	
	if(digit > 1) {
	
		score = score + 8;
		warunki++;
	
	}
	
	
	if(special > 1) {
	
		score = score + 13;
		warunki++;
	
	}
	
	
	if(warunki > 0) {
	
		score = score + (warunki*4);
	
	}
	

	
	if(score >= 50) {
	
		width_bar=100;
	
	}
	
	else {
	
	
		width_bar = Math.round((score*100)/50);
	
	
	}
	
	
	if(width_bar>75) {
	
		color_bar = "green";
	
	}
	
	else if(width_bar>50) {
	
		color_bar = "#129b22";
	
	}
	
	else if(width_bar>25) {
	
		color_bar = "orange";
	
	}
	
	else {
	
		color_bar = "red";
	
	}
	
	
	
	document.getElementById("bar_strong").style.width = width_bar+"%";
	document.getElementById("bar_strong").style.height = "20px";
	document.getElementById("cont_bar").style.height = "20px";
	document.getElementById("cont_bar").style.padding = "2px";
	document.getElementById("cont_bar").style.margin = "0px 0px 10px 0px";
	document.getElementById("bar_strong").style.background = color_bar;
	
	

};


function check_reg() {

	var email = document.forms["reg_form"]["email"].value;
	var password = document.forms["reg_form"]["pass"].value;
	var date = document.forms["reg_form"]["date"].value;
	var err = 0;

	if(email == "") {
	
		document.getElementById("reg_em_err").innerHTML = "To pole nie może być puste";
		document.getElementById("reg_em_err").style.display = "block";
		err = 1;
		
	
	}
	
	else {
	
		document.getElementById("reg_em_err").style.display = "none";
	}
	
	if(password == "") {
	
		document.getElementById("reg_pass_err").innerHTML = "To pole nie może być puste";
		document.getElementById("reg_pass_err").style.display = "block";
		err = 1;
		
	
	}
	
	else {
	
		document.getElementById("reg_pass_err").style.display = "none";
	
	}
	
	if(date == "") {
	
		document.getElementById("reg_date_err").innerHTML = "To pole nie może być puste";
		document.getElementById("reg_date_err").style.display = "block";
		err = 1;
		
	
	}
	
	else {
	
		document.getElementById("reg_date_err").style.display = "none";
	
	}
	
	
	if(!check_date(date)) {
	
		document.getElementById("reg_date_err").innerHTML = "Niepoprawny format (rrrr-mm-dd)";
		document.getElementById("reg_date_err").style.display = "block";
		err = 1;
	
	}
	
	else {
	
		document.getElementById("reg_date_err").style.display = "none";
	
	}
	
	if(!validateEmail(email)) {
	
		document.getElementById("reg_em_err").innerHTML = "Niepoprawny format";
		document.getElementById("reg_em_err").style.display = "block";
		err = 1;
	
	}
	
	
	else {
	
		document.getElementById("reg_em_err").style.display = "none";
	
	}
	
	
	
	if(err===1) {
	
		return false;
	
	}

	
	return (true);

};


function check_login() {
	
	var $err_dw = 0;
	
	var email = document.forms["login_form"]["email"].value;
	
	if(!validateEmail(email)) {
	
		document.getElementById("login_em_err").innerHTML = "Niepoprawny format";
		document.getElementById("login_em_err").style.display = "block";
		err_dw = 1;
	
	}
	
	else {
		
		document.getElementById("login_em_err").style.display = "none";
		err_dw = 0; 
		
	}
	
	if(err_dw===1) {
	
		return false;
	
	}

	
	return true;
	
};