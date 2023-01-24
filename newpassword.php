<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="passvrf.css">
	<script type="text/javascript" src="register.js"></script>
</head>
<body>
			<?php
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
            ?>
	<div class="box">
		<form class="inbox" action="newpassword.php" name="regform" autocomplete="off" onsubmit="return rfun()" method="POST">
			<h2>Reset Password</h2>
			<div class="erorbox3" id="errorbox3"></div>
			<div class="inputbox">
				<input type="password" name="pwd" required="" id="pass" placeholder="Atleast Seven Characters">
				<span>Password</span>
				<span id="show" onclick="return show_pass()">(o</span>
				<i></i>
				<div class="strengthmeter"></div>
			</div>
			<div class="errorbox" id="errorbox4"></div>
			<div class="inputbox">
				<input type="password" name="rpwd" required="" id="rpass" placeholder="Re-Enter the Password" >
				<span>Retype-Password</span>
				<span id="show" onclick="return show_pass()">(o</span>
				<i></i>
			</div>
			<div class="links">
				<a href="register.html">Sign-Up</a>
				<a href="loginpage.html">Sign-In</a>
			</div>
			
			<input type="submit" name="changepassword" value="Save">
		</form>
	</div>
	<style>
		.box{
			height: 420px;
		}
		.box::before{
			height: 420px;
		}
		.box::after{
			height: 420px;
		}
	</style>
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
		})
	</script>
</body>
</html>

<style type="text/css">
	input[type="submit"]{
		position: relative;
		top: 1.5em;
		left: 6.5em;
	}
</style>