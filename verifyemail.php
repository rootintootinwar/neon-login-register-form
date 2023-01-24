<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pin Verification</title>
	<link rel="stylesheet" type="text/css" href="passvrf.css">
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
		<form action="verifyemail.php" method="POST" autocomplete="off">
			<h2>Verify-Pin</h2>   
			<div class="inputbox">
				<input type="password" name="OTPverify" required="required" id="pass" placeholder="Verification code" >
				<span>Enter the Pin</span>
				<span id="show" onclick="return show_pass()">(o</span>
				<i></i>
			</div>
			<div class="down">
			<input type="submit" name="verifyemail" value="verify">
			</div>
		</form>
	</div>
</body>
</html>