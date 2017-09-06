<!DOCTYPE html>
<?php
	require "db.php";
	if(isset($_POST['submit'])){
		
		$email = mysqli_real_escape_string($connection,$_POST['email']);
        
            $query = "SELECT id FROM registration where email='".$email."'";
            $result = mysqli_query($connection,$query);
            $Results = mysqli_fetch_array($result);
            
            if(count($Results)>=1){
                $encrypt = md5(90*13+$Results['id']);
                $message_success = "Your password reset link send to your e-mail address.";
                $to = $email;
                $subject = "Forget Password";
                $from = 'support@men-on.com';
                $body='Hi, <br/> <br/>Your Login ID is '.$Results['id'].' <br><br>Click here to reset your password http://men-on.com/account/reset-password.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>men-on.com<br>Solve your problems.';
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                
                mail($to,$subject,$body,$headers);
                
            }else{
                
				$message_fail = "Account not found please signup now!!";
            }
        
	}


?>

<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Welcome to men-on.com</title>
		<!-- CORE CSS-->
	  
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

		<style type="text/css">
			html,
			body {
				height: 100%;
			}
			html {
				display: table;
				margin: auto;
			}
			body {
				display: table-cell;
				vertical-align: middle;
			}
			.margin {
			  margin: 0 !important;
			}
		</style>
	  
	</head>
	<body class="yellow">
		<div id="login-page" class="row">
			<div class="col s12 z-depth-6 card-panel">
				<form class="login-form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col s12 center">
							<a href="javascript:history.back(1)" title="Go back"><img src="../images/logo.png" alt="" class="responsive-img valign profile-image-login"></a>
							<p class="center login-form-text">Please Enter Your Registered Email ID</p>
						</div>
					</div>
					<div class="row margin">
						<?php if(isset($message_success)) { ?>
							<div class="message" style="color:green;"><?php echo $message_success; ?></div>
						<?php } ?>
						<?php if(isset($message_fail)) { ?>
							<div class="message" style="color:red;"><?php echo $message_fail; ?></div>
						<?php } ?>
						<div class="input-field col s12">
							<i class="mdi-social-person-outline prefix"></i>
							<input class="validate" id="email" type="email" name="email">
							<label for="email" data-error="wrong" data-success="right" class="center-align">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<button class="btn waves-effect waves-light col s12" type="submit" name="submit">Recover my Password</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- jQuery Library -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!--materialize js-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
		<script src="//load.sumome.com/" data-sumo-site-id="" async="async"></script>
	</body>
</html>