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