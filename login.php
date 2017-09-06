	<?php
		session_start();
		include_once "dbconnect.inc.php";
		
		if(isset($_POST['login'])){
			
			$username = mysql_real_escape_string($_POST['username']);
			$Password = md5($_POST['Password']);
			$link = $_GET['link'];
			$Select_Query	= mysql_query("select id, username,email, password from registration where username = '".$username."' and activation IS NULL");

			if(mysql_num_rows($Select_Query) == 1) {
				
				$Fetch_data	= mysql_fetch_array($Select_Query);
				
				if($Fetch_data['password'] == $Password ){
				
					$Valid_user	= $Fetch_data['username'];
					$Valid_id	= $Fetch_data['id'];
					$Valid_emailid = $Fetch_data['email'];
					//$_SESSION['Username']	= $Valid_user;
					setcookie("Id",$Valid_id,time()+86400);
					setcookie("Username",$Valid_user,time()+86400);
					setcookie("Email",$Valid_emailid,time()+86400);
					
					$_SESSION['loggedin'] = TRUE;
					header('Location: ' . $_SESSION['redirectURL']);
				
				}else{
					header("Location: login.php?error");
						exit;
				}
			}else{
				
				header("Location: login.php?noexist");
				exit;
			}
		}
	?>

	<!--header-->
	<?php require_once "header.php";?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow fadeInUp" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Log In</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="font-family:Orbitron,sans-serif;">Log<span> In</span></h3>
		</div>
		<div class="widget-shadow">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Welcome back to Pitt Shop ! <br> Not a Member? <a href="account/register.php">  Register Now »</a> </h4>
				<?php
				if(isset($_GET['error']))
				{
					?>
					<div class='alert alert-error'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<p style="font-size:15px;"><strong>Sorry!</strong> You Entered Wrong Password!</p>
					</div>
					<?php
				}
				?>
				<?php
				if(isset($_GET['noexist']))
				{
					?>
					<div class='alert alert-error'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<p style="font-size:15px;"><strong>Sorry!</strong> You are not registered with us. Please register to create your account.</p>
					</div>
					<?php
				}
				?>
			</div>
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
				<form method="post">
					<input type="text" class="user" name="username" minlength="4" required="required" placeholder="User Name">
					
					<input type="password" class="lock" name="Password" minlength="4" required="required" placeholder="Password" placeholder="Password">
					
					<input type="submit" name="login" value="Login">
					
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="account/forgot-password.php">Forgot Password?</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
		</div>
		<!--<div class="login-page-bottom">
			<h5> - OR -</h5>
			<div class="social-btn"><a href="#"><i>Sign In with Facebook</i></a></div>
			<div class="social-btn sb-two"><a href="#"><i>Sign In with Twitter</i></a></div>
		</div>-->
	</div>
	<!--//login-->
	<?php require_once "footer.php"?>