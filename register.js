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



function rfun(){
	var name = document.forms["regform"]["name"].value;
	var npattern = /^[A-Za-z ]+$/;
	var email = document.forms["regform"]["uname"].value;
	var epattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
	var pwd = document.forms["regform"]["pwd"].value;
	var rpwd = document.forms["regform"]["rpwd"].value;
	var valid = false;
	var x = document.forms["regform"]["gender"];
	var nation = document.getElementById("gc").innerHTML;
	/*name check*/
	if(name==null || name=="" || name.match(npattern)){
		document.getElementById("errorbox1").innerHTML = "";
	}
	else{
		document.getElementById("errorbox1").innerHTML = "Inappropriate Name";
		return false;
	}
	/*mail check*/
	if(email==null || email=="" || email.match(epattern)){
		document.getElementById("errorbox2").innerHTML = "";
	}
	else{
		document.getElementById("errorbox2").innerHTML = "Inappropriate Email";
		return false;
	}
	/*password check*/
	if(pwd.length<5){
		document.getElementById("errorbox4").innerHTML = "Minimum 5 Characters";
		return false;
	}
	else if(pwd!=rpwd){
		document.getElementById("errorbox4").innerHTML = "Password didn't Match";
		return false;
	}
	else if(rpwd.length>10){
		document.getElementById("errorbox4").innerHTML = "Maximum 10 Characters";
		return false;
	}
	else{
		document.getElementById("errorbox4").innerHTML = "";
	}
	/*gender and nationality check*/
	for(var i=0;i<x.length;i++){
		if(x[i].checked){
			valid=true;
		}
	}
	/*gender check*/
	if(valid!=true){
		document.getElementById("errorbox5").innerHTML = "Select Your Gender";
		return false;
	}
	/*nationality check*/
	else if(nation.match("Nationality")){
		document.getElementById("errorbox5").innerHTML = "Select Your Nationality";
		return false;
	}
	else{
		document.getElementById("errorbox5").innerHTML = "";
	}

	return true;
}


