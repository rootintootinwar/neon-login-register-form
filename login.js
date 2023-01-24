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

function lfun(){
	var email = document.forms["logform"]["uname"].value;
	var epattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
	var pwd = document.forms["logform"]["pwd"].value;

	if(email==null || email=="" || email.match(epattern)){
		document.getElementById("errorbox2").innerHTML = "";
	}
	else{
		document.getElementById("errorbox2").innerHTML = "Inappropriate Email";
		return false;
	}
	return true;
}