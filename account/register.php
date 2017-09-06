<?php 
	require_once "header.php";
    if(isset($_POST['register'])){
        require "dbconn.php";
		include_once 'class.verifyEmail.php';
		
		$email = $_POST['email'];

		$vmail = new verifyEmail();
		$vmail->setStreamTimeoutWait(20);
		$vmail->Debug= TRUE;
		$vmail->Debugoutput= 'html';

		$vmail->setEmailFrom('support@men-on.com');

		if($vmail->check($email)){
			//echo 'email &lt;' . $email . '&gt; exist!';
			
			if(isset($_POST['username']) && isset($_POST['password'])){
				
				$username = strip_tags($_POST['username']);
				$password = md5(strip_tags($_POST['password']));
				$repass = md5(strip_tags($_POST['pass2']));
				$email = strip_tags($_POST['email']);
				
				$query = "select * from registration where email='$email' or username='$username'";
				$result = mysql_query($query);
				$row = mysql_fetch_assoc($result);
				
				if (mysql_num_rows($result) == 0) {
					/*This insert command for username, password and email.*/
					$current_id = mysql_query("INSERT INTO registration(username,password,email) VALUES ('$username','$password','$email')") or  die("".mysql_error());
					// sending confirmation mail
					if(!empty($current_id)) {
						$Email = $_POST["email"];
						$Username = $_POST["username"];
						$subject = 'Welcome to Men-on.com';
						$filename ="../account/email_format.html";
						if($mailtemplate = fopen($filename, "r")){
							$contents = fread($mailtemplate, filesize($filename));
							$contents = str_replace('@Username@',$Username,$contents);
							//$Link = "http://www.men-on.com" . "/account/activate.php?email=". $Email ."&id=".$current_id."";
							$contents = str_replace('@link@',$Link,$contents);
							fclose($mailtemplate);
						}	
						$message = $contents;
						$headers = "From: Support@Men-on <support@men-on.com>\r\n";
						$headers .= "Reply-To: support@men-on.com\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
						$headers .= "X-Mailer: PHP/". phpversion();
						if(mail($Email, $subject, $message, $headers)){
							 
							// inserting 50 Race bucks 
							$Select_Query=mysql_query("SELECT id,username,email FROM registration WHERE email ='".$email."'");
							if(mysql_num_rows($Select_Query)==1){
								$row=mysql_fetch_array($Select_Query);
								$username=$row['username'];
								$Id=$row['id'];
									
								$query_update_scores=mysql_query("INSERT INTO scores(name,litres,scores_id) VALUES('$username','50','$Id')");
							}
							
							$msg_success = "You have registered successfully and 50RB have been added to your account! Please check your mail for more details. Thank you !";	
						}
						//$msg_success = " Your account has been credited successfully with 50RB. Thank you !";
						unset($_POST);
					}else{
							
						$msg_fail = "Problem in registration. Try Again!";	
					}
				}elseif($row['username']==$_POST["username"]){
					
					$msg_fail = 'This User Name is already registered! please try another one';
				 
				}elseif($row['email']==$_POST["email"]){
					
					$msg_fail = 'This email is already registered! please try another one';
				}
				
			}
			
		} elseif (verifyEmail::validate($email)) {
			
			$msg_fail = 'This Email <b>' . $email . '</b> could not be verified. For the best results try a Gmail account !';
		} else {
			$msg_fail = 'This Email <b>' . $email . '</b> could not be verified. For the best results try a Gmail account!';
		}
			
	}
?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="font-family:Orbitron,sans-serif;">Register<span> Form</span></h3>
			<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>-->
		</div>
		<div class="widget-shadow">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Already have an Account ?<a href="../login.php">  Log In »</a> </h4>
				<?php if(isset($msg_fail)) { ?>
					<div class='alert alert-error'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<p style="font-size:15px;"><strong><?php echo $msg_fail; ?></strong></p>
					</div>
				<?php } ?>
				<?php if(isset($msg_success)) { ?>
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<p style="font-size:15px;"><strong><?php echo $msg_success; ?></strong></p>
					</div>
				<?php } ?>
			</div>
			<div class="login-body">
				<form class="wow fadeInUp animated" data-wow-delay=".7s" action="" enctype="multipart/form-data" method="post" onsubmit="return validateForm();">
				
					<input type="text" name="username" id="username"  value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" placeholder ="User Name">
					
					<input type="email" name="email" id="email"  value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email ID">
					
					<input type="password"  name="password" id="password"  value="" placeholder="Password">
					
					<input type="password" name="pass2" id="pass2"  value="" placeholder="Confirm Password">
					
					<input type="submit" name="register" value="Register">
				</form>
			</div>
		</div>
	</div>
	<!--//login-->
	<script type="text/javascript">
		function validateForm() {

		var your_name = $.trim($("#username").val());
		var your_email = $.trim($("#email").val());
		var password = $.trim($("#password").val());
		var pass2 = $.trim($("#pass2").val());


		// validate name
		if (your_name == "") {
		  alert("Please enter your name.");
		  $("#username").focus();
		  return false;
		} else if (your_name.length < 4) {
		  alert("Name must be atleast 4 characters.");
		  $("#username").focus();
		  return false;
		}

		// validate email
		if (!isValidEmail(your_email)) {
		  alert("Enter valid email.");
		  $("#email").focus();
		  return false;
		}

		// validate subject
		if (password == "") {
		  alert("Enter password");
		  $("#password").focus();
		  return false;
		} else if (password.length < 6) {
		  alert("Password must be atleast 6 characters.");
		  $("#password").focus();
		  return false;
		}

		if (password != pass2) {
		  alert("Password does not match.");
		  $("#pass2").focus();
		  return false;
		}

		return true;
	  }

	  function isValidEmail(email) {
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	  }


	</script>
	<?php require_once "footer.php"?>