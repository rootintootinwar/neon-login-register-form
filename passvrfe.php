<?php include_once("controller.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>
	<link rel="stylesheet" type="text/css" href="passvrf.css">
	<script type="text/javascript" src="passvrf.js"></script>
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
		<form autocomplete="off" action="passvrfe.php" name="epform" onsubmit="return pfun()" method="POST">
			<h2>Verify-Email</h2>

			<div class="inputbox">
				<div class="errorbox" id="errorbox2"></div>
				<input type="text" name="uname" required="required" placeholder="Enter the Registered E-mail">
				<span>E-mail</span>
				<i></i>
			</div>

			<div class="links">
				<a href="register.php">Sign-Up</a>
				<a href="loginpage.php">Sign-In</a>
			</div>

			<input type="submit" name="forgot_password" value="Continue">
		</form>
	</div>
</body>
</html>
<style type="text/css">
	input[type="submit"]{
		position: relative;
		top: 1.5em;
		left: 6.5em;
	}
</style>