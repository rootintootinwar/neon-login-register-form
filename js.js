var state = false;
function show_pass(){
	if(state){
		document.getElementById("pass").setAttribute("type","password");
		state = false;
	}
	else{
		document.getElementById("pass").setAttribute("type","text");
		state = true;
	}
}
var statee = false;
function show_rpass(){
	if(statee){
		document.getElementById("rpass").setAttribute("type","password");
		statee = false;
	}
	else{
		document.getElementById("rpass").setAttribute("type","text");
		statee = true;
	}
}