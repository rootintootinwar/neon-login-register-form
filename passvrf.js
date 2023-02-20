var state = false;
var statee = false;
function show_pass(){
	if(state){
		document.getElementById("pass").setAttribute("type","password");
		state = false;
	}
	else{
		document.getElementById("pass").setAttribute("type","text");
		state = true;
	}
	
	if(statee){
		document.getElementById("rpass").setAttribute("type","password");
		statee = false;
	}
	else{
		document.getElementById("rpass").setAttribute("type","text");
		statee = true;
	}
}

function pass_strength(password){
			let i = 0;
			if(password.length > 6){
				i++;
			}
			if(password.length >= 10){
				i++;
			}
			if(/[A-Z]/.test(password)){
				i++;
			}
			if(/[0-9]/.test(password)){
				i++;
			}
			if(/[A-Za-z0-8]/.test(password)){
				i++;
			}
			return i;
}


function pfun(){
	var email = document.forms["epform"]["uname"].value;
	var epattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

	if(email==null || email=="" || email.match(epattern)){
		document.getElementById("errorbox2").innerHTML = "";
	}
	else{
		document.getElementById("errorbox2").innerHTML = "Inappropriate Email";
		return false;
	}
	return true;
}

function ofun(){
	var email = document.forms["opform"]["otp"].value;
	var epattern = /^[0-9 ]+$/;

	if(email==null || email=="" || email.match(epattern)){
		document.getElementById("errorbox2").innerHTML = "";
	}
	else{
		document.getElementById("errorbox2").innerHTML = "Inappropriate Pin";
		return false;
	}
	return true;
}

function opfun(){
	var email = document.forms["oppform"]["OTPverify"].value;
	var epattern = /^[0-9 ]+$/;

	if(email==null || email=="" || email.match(epattern)){
		document.getElementById("errorbox2").innerHTML = "";
	}
	else{
		document.getElementById("errorbox2").innerHTML = "Inappropriate Pin";
		return false;
	}
	return true;
}

