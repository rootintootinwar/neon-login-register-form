<?php
    include_once("connection.php");

    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer\src\Exception.php';
	require 'PHPMailer\src\PHPMailer.php';
	require 'PHPMailer\src\SMTP.php';

// Connection Created Successfully

    session_start();

    // Store All Errors
    $errors = [];

    // When Sign Up Button Clicked
    if (isset($_POST['register'])) {
    

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['uname']);
        $pwd = md5($_POST['pwd']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $nation = mysqli_real_escape_string($conn, $_POST['nation']);

        // generate a random Code
        $code = rand(999999, 111111);
        // set Status
        $status = "Not Verified";


        // echo 'first name = ' .$fname . "<br> last name = " .$lname . "<br> email = " .$email . "<br> password = " .$password . "<br> gender = " .$gender . "<br>";

        // check email validation and save information
        $sql = "SELECT * FROM register WHERE email = '$email'";
        $res = mysqli_query($conn, $sql) or die('query failed');
        if (mysqli_num_rows($res) > 0) {
            $errors['email'] = 'Email is Already Taken';
        }
        // count erros
        if (count($errors) === 0) {
            $insertQuery = "INSERT INTO register (name,email,pwd,gender,nation,code,status)
            VALUES ('$name','$email','$pwd','$gender','$nation',$code,'$status')";
            $insertInfo = mysqli_query($conn, $insertQuery);

            // Send Varification Code In Gmail
            if ($insertInfo) {

				$mail = new PHPMailer(true);
				$mail->SMTPDebug=3;
				try {
				    
				    $mail->isSMTP();
				    $mail->Host       = 'smtp.gmail.com';                     
				    $mail->SMTPAuth   = true;                                   
				    $mail->Username   = 'rootintootinwar@gmail.com';                     
				    $mail->Password   = 'cwelkittaaoplyqk';                               
				    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
				    $mail->Port       = 465;

				    $mail->setFrom('from@example.com', 'Mailer');
				    $mail->addAddress($email);     
				    
				    $mail->isHTML(true);                                 
				    $mail->Subject = 'Verify E-Mail';
				    $mail->Body    = 'Hi! ' . $name . ' , your verification pin is \' ' . $code . ' \'';
				    
				    $mail->send();
                    header('location: otp.php');
				} catch (Exception $e) {
				     echo "Failed while sending code!: {$mail->ErrorInfo}"; 
				}

            } else {
                $errors['db_errors'] = "Failed while inserting data into database!";
            }
        }
    }


    // if Verify Button Clicked
    if (isset($_POST['verify'])) {
        $_SESSION['message'] = "";
        $otp = mysqli_real_escape_string($conn, $_POST['otp']);
        $otp_query = "SELECT * FROM register WHERE code = $otp";
        $otp_result = mysqli_query($conn, $otp_query);

        if (mysqli_num_rows($otp_result) > 0) {
            $fetch_data = mysqli_fetch_assoc($otp_result);
            $fetch_code = $fetch_data['code'];

            $update_status = "Verified";
            $update_code = 0;

            $update_query = "UPDATE register SET status = '$update_status' , code = $update_code WHERE code = $fetch_code";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                header('location: loginpage.php');
            } else {
                $errors['db_error'] = "Failed To Insering Data In Database!";
            }
        } else {
            $errors['otp_error'] = "You enter invalid verification code!";
        }
    }
    //login button clicked
	if (isset($_POST['login'])) {

	        $email = mysqli_real_escape_string($conn, $_POST['email']);
	        $pwd = md5($_POST['pwd']);

	        $emailQuery = "SELECT * FROM register WHERE email = '$email'";
	        $email_check = mysqli_query($conn, $emailQuery);

	        if (mysqli_num_rows($email_check) > 0) {
	            $passwordQuery = "SELECT * FROM register WHERE email = '$email' AND pwd = '$pwd'";
	            $password_check = mysqli_query($conn, $passwordQuery);
	            if (mysqli_num_rows($password_check) > 0) {
	                $fetchInfo = mysqli_fetch_assoc($password_check);
	                $status = $fetchInfo['status'];
	       
	                $_SESSION['email'] = $fetchInfo['email'];
	                $_SESSION['pwd'] = $fetchInfo['pwd'];
	                if ($status === 'Verified') {
	                    header('location: index.html');
	                } else {
	                    header('location: otp.php');
	                }
	            } else {
	                $errors['email'] = 'Password did not matched';
	            }
	        } else {
	            $errors['email'] = 'Invalid Email Address';
	        }
	    }

        // if forgot button will clicked
    if (isset($_POST['forgot_password'])) {

        $email = $_POST['uname'];
        $_SESSION['uname'] = $email;

        $emailCheckQuery = "SELECT * FROM register WHERE email = '$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        // if query run
        if ($emailCheckResult) {
            // if email matched
            if (mysqli_num_rows($emailCheckResult) > 0) {
                $code = rand(999999, 111111);
                $updateQuery = "UPDATE register SET code = $code WHERE email = '$email'";
                $updateResult = mysqli_query($conn, $updateQuery);
                if ($updateResult) {

	                $mail = new PHPMailer(true);
					$mail->SMTPDebug=3;
					try {
					    
					    $mail->isSMTP();
					    $mail->Host       = 'smtp.gmail.com';                     
					    $mail->SMTPAuth   = true;                                   
					    $mail->Username   = 'rootintootinwar@gmail.com';                     
					    $mail->Password   = 'cwelkittaaoplyqk';                               
					    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
					    $mail->Port       = 465;

					    $mail->setFrom('from@example.com', 'Mailer');
					    $mail->addAddress($email);     
					    
					    $mail->isHTML(true);                                 
					    $mail->Subject = 'Forgot Password';
					    $mail->Body    = 'Hi! , your verification pin is \' ' . $code . ' \'';
					    
					    $mail->send();
	                    header('location: verifyemail.php');
					} catch (Exception $e) {
					     echo "Failed while sending code!: {$mail->ErrorInfo}"; 
					}

                } else {
                    $errors['db_errors'] = "Failed while inserting data into database!";
                }
            }else{
                $errors['invalidEmail'] = "Invalid Email Address";
            }
        }else {
            $errors['db_error'] = "Failed while checking email from database!";
        }
    }

    if(isset($_POST['verifyemail'])){
        $_SESSION['message'] = "";
        $OTPverify = mysqli_real_escape_string($conn, $_POST['OTPverify']);
        $verifyQuery = "SELECT * FROM register WHERE code = $OTPverify";
        $runVerifyQuery = mysqli_query($conn, $verifyQuery);
        if($runVerifyQuery){
            if(mysqli_num_rows($runVerifyQuery) > 0){
                $newQuery = "UPDATE register SET code = 0";
                $run = mysqli_query($conn,$newQuery);
                header("location: newpassword.php");
            }else{
                $errors['verification_error'] = "Invalid Verification Code";
            }
        }else{
            $errors['db_error'] = "Failed while checking Verification Code from database!";
        }
    }

    // change Password
    if(isset($_POST['changepassword'])){
        $pwd = md5($_POST['pwd']);
       
            $email = $_SESSION['uname'];
            $updatePassword = "UPDATE register SET pwd = '$pwd' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
            session_destroy();
            header('location: loginpage.php');
            
    }