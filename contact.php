	<?php
		include_once "dbconnect.inc.php";
		if(isset($_COOKIE['Username'])==""){
			$User_name="";
		}else if(isset($_COOKIE['Username'])!==""){
			$User_name=$_COOKIE['Username'];
		}
		
		if(isset($_COOKIE['Email'])==""){
			$Email="";
		}else if(isset($_COOKIE['Email'])!==""){
			$Email=$_COOKIE['Email'];
		}
		
		session_start();
		if(!isset($_SESSION['loggedin'])){
			$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
		}
		
			if(isset($_POST['submit'])):
			if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
				//your site secret key
				$secret = '6Ldc8R4TAAAAACwN4C5Y7WOFtAip0A-UZ7i_4N4-';
				//get verify response data
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
				$responseData = json_decode($verifyResponse);
				
				$name = !empty($_POST['name'])?$_POST['name']:'';
				$email = !empty($_POST['email'])?$_POST['email']:'';
				$phone = !empty($_POST['phone'])?$_POST['phone']:'';
				$message = !empty($_POST['message'])?$_POST['message']:'';
				if($responseData->success):
					//contact form submission code
					$to = 'support@men-on.com';
					$subject = 'New contact form have been submitted';
					$htmlContent = "
						<h1>Contact request details</h1>
						<p><b>Name: </b>".$name."</p>
						<p><b>Email: </b>".$email."</p>
						<p><b>Phone: </b>".$phone."</p>
						<p><b>Message: </b>".$message."</p>
					";
					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					// More headers
					$headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
					//send email
					@mail($to,$subject,$htmlContent,$headers);
					?>
				<script type="text/javascript">
					alert("Mail Sent. Thank you <?php echo $name  ?>, we will contact you shortly.");
					window.location.href="http://localhost/men-on/index.php";
				</script>
			<?php		
			

					$succMsg = 'Your contact request have submitted successfully.';
					$name = '';
					$email = '';
					$message = '';
				else:
					?>
				<script type="text/javascript">
					alert("<?php echo $name  ?>, Robot verification failed, please try again..");
					window.location.href="http://localhost/men-on/index.php#contact";
				</script>
			<?php		
					$errMsg = 'Robot verification failed, please try again.';
				endif;
			else:
				?>
				<script type="text/javascript">
					alert("<?php echo $name  ?>, Please click on the reCAPTCHA box.");
					window.location.href="http://localhost/men-on/index.php#contact";
				</script>
			<?php		
				$errMsg = 'Please click on the reCAPTCHA box.';
			endif;
		else:
			$errMsg = '';
			$succMsg = '';
			$name = '';
			$email = '';
			$message = '';
		endif;

	?>

	<!--header-->
	<?php require_once "header.php";?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Contact Us</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--contact-->
	<div class="contact">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title" style="font-family:Orbitron,sans-serif;">How To <span> Find Us</span></h3>
				<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>-->
			</div>
			<!--<iframe class="wow zoomIn animated animated" data-wow-delay=".5s" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57537.641430789925!2d-74.03215321337959!3d40.719122105634035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1456152197129" allowfullscreen=""></iframe>-->
		</div>	
	</div>
	<div class="address"><!--address-->
		<div class="container">
			<div class="address-row">
				<div class="col-md-6 address-left wow fadeInLeft animated" data-wow-delay=".5s">
					<div class="address-grid">
						<h4 class="wow fadeIndown animated" data-wow-delay=".5s">DROP US A LINE </h4>
						<script src="https://www.google.com/recaptcha/api.js" async defer></script>
						<form method="post" action="">
						
							<input class="wow fadeIndown animated" data-wow-delay=".6s" type="text" name="name" value="<?php echo !empty($name)?$name:''; ?>" placeholder="Your full name" minlength="4" required="required">
							
							<input class="wow fadeIndown animated" data-wow-delay=".7s" type="email" name="email" value="<?php echo !empty($email)?$email:''; ?>" placeholder="Email address" minlength="4" required="required">
							
							<input class="wow fadeIndown animated" data-wow-delay=".8s" type="text" name="phone" value="<?php echo !empty($phone)?$phone:''; ?>" placeholder="Enter your mobile number">
							
							<textarea class="wow fadeIndown animated" data-wow-delay=".8s" name="message" value="" placeholder="Message..." required="required"><?php echo !empty($message)?$message:''; ?></textarea>
							<style>
								div.g-recaptcha {
								  margin-top: 20px;
								  width: 304px;
								}
							</style>
							<div class="g-recaptcha" data-sitekey="6Ldc8R4TAAAAAGcdtkp3_qQ3x-A9DaXBeYwByrx7"></div>
							
							<input class="wow fadeIndown animated" data-wow-delay=".9s" type="submit" name="submit" value="SUBMIT">
						</form>
					</div>
				</div>
				<div class="col-md-6 address-right">
					<div class="address-info wow fadeInRight animated" data-wow-delay=".5s">
						<h4>ADDRESS</h4>
						<p>KrisMen Rennsport Private Limited, No.704, 3rd A Cross, 1st Block, Kalyan Nagar, BANGALORE-560043,  Karnataka, INDIA</p>
					</div>
					<div class="address-info address-mdl wow fadeInRight animated" data-wow-delay=".7s">
						<h4>PHONE </h4>
						<p>+222 111 333 4444</p>
						<p>+222 111 333 5555</p>
					</div>
					<div class="address-info wow fadeInRight animated" data-wow-delay=".6s">
						<h4>MAIL</h4>
						<p>In case of any concerns or queries please e-mail us at:</p>
						<p><a href="mailto:support@men-on.com">support@men-on.com</a></p>
					</div>
				</div>
			</div>	
		</div>	
	</div>
	<!--//contact-->	
	<?php require_once "footer.php"?>