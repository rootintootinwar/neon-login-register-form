<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="register.css">
	<script type="text/javascript" src="register.js"></script>
</head>
<body>
			<?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert"><?php echo $displayErrors; ?></div>
                <?php
                }
            }
            ?> 
	<div class="box">
		<form autocomplete="off" name="regform" class="inbox" action="register.php" onsubmit="return rfun()" method="POST">
            <h2>Sign-Up</h2>
			<div class="inputbox">
				<div class="errorbox" id="errorbox1"></div>
				<input type="text" name="name" placeholder="Enter Your Name" required="">
				<span>Name</span>
				<i></i>
			</div>
			<div class="inputbox">
				<div class="errorbox" id="errorbox2"></div>
				<input type="text" name="uname" placeholder="xxx@yyy.zzz" required="" >
				<span>E-mail</span>
				<i></i>
			</div>
			<div class="errorbox3" id="errorbox3"></div>
			<div class="inputbox" id="pwd">
				<input type="password" name="pwd" id="pass" placeholder="Atleast Seven Characters" required="">
				<span>Password</span>
				<span id="show" onclick="return show_pass()">(o</span>
				<i></i>
				<div class="strengthmeter"></div>
			</div>

			<div class="inputbox">
				<div class="errorbox" id="errorbox4"></div>
				<input type="password" name="rpwd" id="rpass" placeholder="Re-Enter the Password" required="" >
				<span>Retype-Password</span>
				<span id="show" onclick="return show_pass()">(o</span>
				<i></i>
			</div>
			
			<div class="rbutton">
				<div class="errorbox5" id="errorbox5"></div>
				<p>Gender :</p> 
				<label>
					<input type="radio" value="male" name="gender">
					<span>Male</span> 
				</label>
				<label>
					<input type="radio" value="female" name="gender">
					<span>Female</span>
				</label>
				<label>
					<input type="radio" value="others" name="gender">
					<span>Others</span>
				</label>
			</div>
			
			<div class="select-box">
		        <div class="options-container">
		          <div class="option">
		            <input
		              type="radio" value="India" style="width: 23em;" class="radio" id="India" name="nation"/>
		            <label for="India">India</label>
		          </div>

		          <div class="option">
		            <input type="radio" value="China" class="radio" id="China" name="nation" />
		            <label for="China">China</label>
		          </div>

		          <div class="option">
		            <input type="radio" value="Nepal" class="radio" id="Nepal" name="nation" />
		            <label for="Nepal">Nepal</label>
		          </div>

		          <div class="option">
		            <input type="radio" value="Bangladesh" class="radio" id="Bangladesh" name="nation" />
		            <label for="Bangladesh">Bangladesh</label>
		          </div>

		          <div class="option">
		            <input type="radio" value="Burma" class="radio" id="Burma" name="nation" />
		            <label for="Burma">Burma</label>
		          </div>

		          <div class="option">
		            <input type="radio" value="Pakistan" class="radio" id="Pakistan" name="nation" />
		            <label for="Pakistan">Pakistan</label>
		          </div>

		          <div class="option">
		            <input type="radio" value="Afghanistan" class="radio" id="Afghanistan" name="nation" />
		            <label for="Afghanistan">Afghanistan</label>
		          </div>

		          <div class="option">
		            <input type="radio" value="Srilanka" class="radio" id="Srilanka" name="nation" />
		            <label for="Srilanka">Srilanka</label>
		          </div>

		          <div class="option">
		            <input type="radio" value="Malaiysia" class="radio" id="Malaiysia" name="nation" />
		            <label for="Malaiysia">Malaiysia</label>
		          </div>
		        </div>

		        <div name="gc" id="gc" class="selected">
		          Nationality
		        </div>
		    </div>

			<div class="down">
			<input type="submit" name="register" value="Register">
				<a href="loginpage.php">Existing user?, Login!</a>
			</div>
		</form>
	</div>
	<script>
		let inbox = document.querySelector('.inbox');
		document.addEventListener("keyup",function(e){
			let password = document.querySelector('#pass').value;
			let strength = pass_strength(password);
			if(strength===0){
				inbox.classList.remove('weak');
				inbox.classList.remove('medium');
				inbox.classList.remove('strong');
			}
			else if(strength <= 2){
				inbox.classList.add('weak');
				inbox.classList.remove('medium');
				inbox.classList.remove('strong');
			}
			else if(strength >= 2 && strength <= 4){
				inbox.classList.remove('weak');
				inbox.classList.add('medium');
				inbox.classList.remove('strong');
			}
			else{
				inbox.classList.remove('weak');
				inbox.classList.remove('medium');
				inbox.classList.add('strong');
			}
		});
		
		const selected = document.querySelector(".selected");
		const optionsContainer = document.querySelector(".options-container");

		const optionsList = document.querySelectorAll(".option");

		selected.addEventListener("click", () => {
		  optionsContainer.classList.toggle("active");
		});

		optionsList.forEach(o => {
		  o.addEventListener("click", () => {
		    selected.innerHTML = o.querySelector("label").innerHTML;
		    optionsContainer.classList.remove("active");
		  });
		});
	</script>
</body>
</html>