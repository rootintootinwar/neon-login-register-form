<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="loginpage.css">
	<script type="text/javascript" src="login.js"></script>
	
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
		<form autocomplete="off" name="logform" action="loginpage.php" onsubmit="return lfun()" method="POST">
			<h2>Sign-In</h2>
			<div class="inputbox">
				<div class="errorbox" id="errorbox2"></div>
				<input type="text" name="email" required="required" placeholder="xxx@yyy.zzz">
				<span>E-mail</span>
				<i></i>
			</div>
			
			<div class="inputbox">
				<input type="password" name="pwd" required="required" id="pass" placeholder="Enter the Registered Password">
				<span>Password</span>
				<span id="show" onclick="return show_pass()">(o</span>
				<i></i>
			</div>
			
			<div class="links">
				<a href="passvrfe.php">Forgot Password</a>
				<a href="register.php">Sign-Up</a>
			</div>
			
			<input type="submit" name="login" value="Login">
		</form>
	</div>
</body>
</html>