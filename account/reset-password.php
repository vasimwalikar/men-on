<!DOCTYPE html>
<?php
require "db.php";
if(isset($_GET['action'])){          
    if($_GET['action']=="reset"){
        $encrypt = mysqli_real_escape_string($connection,$_GET['encrypt']);
        $query = "SELECT id,username FROM registration where md5(90*13+id)='".$encrypt."'";
        $result = mysqli_query($connection,$query);
        $Results = mysqli_fetch_array($result);
        //echo $Results['id'];
       // echo $Results['username'];
        if(count($Results)>=1)
        {

        }
        else
        {
            $message_fail = 'Invalid key please try again. <a href="http://men-on.com/registration/forgot-password.php">Forget Password?</a>';
        }
    }
}
if(isset($_POST['action'])){
    
    $encrypt      = mysqli_real_escape_string($connection,$_POST['action']);
    $password     = mysqli_real_escape_string($connection,$_POST['password']);
    $query = "SELECT id FROM registration where md5(90*13+id)='".$encrypt."'";
   // echo $query;
    
    $result = mysqli_query($connection,$query);
    $Results = mysqli_fetch_array($result);
  //  echo $Results['id'];
    //    echo $Results['username'];
    if(count($Results)>=1)
    {
        $query = "update registration set password='".md5($password)."' where id ='".$Results['id']."'";
        mysqli_query($connection,$query);
     //   echo $query;
        $message_success = "Your password changed sucessfully <a href=\"http://men-on.com/login.php\">click here to login</a>.";
    }
    else
    {
        $message_fail = 'Invalid key please try again. <a href="http://men-on.com/account/forgot-password.php">Forget Password?</a>';
    }
}




?>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Welcome to men-on.com</title>
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
	<body class="blue">
		<div id="login-page" class="row">
			<div class="col s12 z-depth-6 card-panel">
				<form class="login-form" id="reset" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col s12 center">
							<img src="../images/logo.png" alt="" class="responsive-img valign profile-image-login">
							<p class="center login-form-text">Welcome <b><?php echo $Results['username'];?></b>, Please Reset Your Password</p>
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
							<i class="mdi-action-lock-outline prefix"></i>
							<input id="password" name="password" type="password" class="validate">
							<label for="password">Enter New Password</label>
						</div>
					</div>
					<div class="row margin">
						<div class="input-field col s12">
							<i class="mdi-action-lock-outline prefix"></i>
							<input id="password-again" name="password-again" type="password">
							<label for="password-again">Re-type New Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">	
							
							<button class="btn waves-effect waves-light col s12" type="submit" name="action" value="<?php echo $encrypt;?>" onclick="mypasswordmatch();">Reset my Password</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<script>
		  
			function mypasswordmatch(){
				var pass1 = $("#password").val();
				var pass2 = $("#password-again").val();
				if (pass1 != pass2)
				{
					alert("Passwords do not match");
					return false;
				}
				else
				{
					$( "#reset" ).submit();
				}
			}
		</script>
		<!-- jQuery Library -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!--materialize js-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
		<script src="//load.sumome.com/" data-sumo-site-id="" async="async"></script>
	</body>
</html>