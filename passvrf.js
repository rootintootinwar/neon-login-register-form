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

