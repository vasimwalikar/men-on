<?php 
	
	if(empty($User_name)){
	
		$guest= 'current_guest';
		
		if($_GET[play_as_guest]){
			$query = "INSERT INTO guest(date,guest) VALUES(NOW(),'".$_GET[play_as_guest]."')";
			$result = mysql_query($query);
			header("Location: play/game/Men-on.php");
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Men-ontown | Pitt Shop</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Real Prize winning games, Prize winning games online free, Free online 3d Racing, Win prizes by playing games, play online and win cash India, play online and win cash, play and win prize, play game and win prizes, play games and redeem for prizes." />
	<meta name="keywords" content="play online and win cash India, play online and win cash, play and win prize, play game and win prizes, play games and redeem for prizes, play online and win cash, play and win prize, play game and win prizes, play games and redeem for prizes." />
	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
	<!--//for-mobile-apps -->
	<!--Custom Theme files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
	<!--//Custom Theme files -->
	<!--js-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<!--//js-->
	<!--web-fonts-->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
	<!--web-fonts-->
	<!--animation-effect-->
	<link href="css/animate.min.css" rel="stylesheet"> 
	<script src="js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
	<!--//animation-effect-->
	<!--start-smooth-scrolling-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!--//end-smooth-scrolling-->
</head>
<body>
	<?php include "balloons.php";?>
	<div class="header">
		<div class="top-header navbar navbar-default"><!--header-one-->
			<div class="container">
				<div class="nav navbar-nav wow fadeInLeft animated" id="symbol" data-wow-delay=".5s">
					<p><span>&#9742;</span> +91 80 40906110&nbsp; <span>&#9993;</span><a href="mailto:support@example.com">support@men-on.com</a></p>
				</div>
				<div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated" data-wow-delay=".5s">
					<ul>
						<li><a href="https://www.facebook.com/pages/Men-on/499838393377444?ref=ts&fref=ts"> </a></li>
						<li><a href="https://twitter.com/menonnv" class="pin"> </a></li>
						<li><a href="http://www.youtube.com/watch?v=WNX4FruM1xE&feature=youtu.be" class="you"> </a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="header-two navbar navbar-default"><!--header-two-->
			<div class="container">
				<div class="nav navbar-nav header-two-left">
					<ul>
						<?php 
							if(empty($User_name)){
							
							
						?>
						<li><p><a href="account/register.php">Register </a> Or <a href="login.php?link=http://localhost<?php echo $_SERVER['REQUEST_URI'];?>">LogIn</a></p></li>
						
						<a href="index.php?play_as_guest=<?php echo $guest;?>" title="Click here to play the game as guest"><span class="label label-danger">Play As Guest</span></a>
						
						<?php }else{ ?>
				
							<li class="dropdown" title="Click here to view profile">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi <b style="color:#00A6D6;"><?php echo $User_name;?>...!</b><b class="caret"></b></a>
								<ul class="dropdown-menu multi-column multi-column1">
									<div class="row">
										<div class="col-sm-4 menu-grids menulist1" style="padding: 0px;">
											
											<ul class="multi-column-dropdown ">
												<li><a class="list" href="#">My Account</a></li>
												<li><a class="list" href="#">Address Book</a></li>
												<li><a class="list" href="my_cart.php">My Cart</a></li>
												<li><a class="list" href="buy_race_bucks.php">Buy Race Bucks</a></li>
												<li><a class="list" href="logout.php">Log Out</a></li>
											</ul>
										</div>																		
										<div class="clearfix"> </div>
									</div>
								</ul>
							</li>			
							<a href="play/game/Men-on.php" title="Click here to play the game"><span class="label label-danger">Play Now</span></a>
						<?php } ?>	
						
					</ul>
				</div>
				<div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
					<!--<img src="images/logo.png" alt="logo">-->
					<?php if(empty($User_name)){?>
	
						<h1 style="font-family:Orbitron,sans-serif;"><a href="index.php">Pitt <b>Shop</b><span class="tag"></span> </a></h1>
						
					<?php }else{ ?>
				
						<h1 style="font-family:Orbitron,sans-serif;"><a href="index.php">Pitt <b>Shop</b><span class="tag"></span> </a></h1>
							
					<?php } ?>
					
				</div>
				<div class="nav navbar-nav navbar-right header-two-right">
					<script>
						window.setInterval(function() {
						$('#blinkText').toggle();
						}, 300);
					</script>
					<div class="header-right my-account">
						<?php if(empty($User_name)){?>
	
							<a href=""><span class="" aria-hidden="true" title="Login To Check Your RB"><img src="images/Image000011.png"></span><b id="blinkText" style="color:#FF590F; font-size:20px;">?</b>	</a>
						
							<?php }else{ 
								//fetching RB for perticular user
								
								$query=mysql_query("SELECT scores_id,points,litres FROM scores WHERE name='".$User_name."'");
								if(mysql_num_rows($query)==1)
								$RB=mysql_fetch_array($query);
							
							?>
							
							<a href=""><span class="" aria-hidden="true" title="Login To Check Your RB"><img src="images/Image000011.png"></span><b style="color:#FF590F; font-size:20px;"><?php echo $RB['litres'];?></b>	</a>
						
						<?php } ?>
										
					</div>
					<div class="header-right cart">
						
						<h4>
							<?php if(empty($User_name)){?>
								
									<a href="#" title="Login To Check Your Cart">
										<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
										<span></span> (<span> 0 </span>)
									</a>		
								
							
							<?php  }else{ ?>
								
								
								
									<?php	
											$check_user_product = mysql_query("SELECT pb.product_id FROM product_list pl INNER JOIN product_bookings pb ON pl.product_id = pb.product_id where pb.username='".$User_name."' and pb.status=0");

											if(mysql_num_rows($check_user_product)==1){
												$product_details = mysql_fetch_array($check_user_product); 
												?>
												<a href="my_cart.php" title="Click here to view cart">
													<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
													<span>[ 1 ]</span>
												</a>	
												
												<?php 
											}else{ ?>
											
												<a href="my_cart.php" title="Click here to view cart">
													<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
													<span></span> (<span> 0 </span>)
												</a>	
												
									<?php 	} ?>
							
						<?php	} ?>
							
						</h4>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="top-nav navbar navbar-default"><!--header-three-->
			<div class="container">
				<nav class="navbar" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!--navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav top-nav-info">
							<li><a href="index.php">Home</a></li>
							<li><a href="gaming.php">Gaming</a></li>
							<li><a href="mobile.php">Mobiles</a></li>
							<li><a href="tablets.php">Tablets</a></li>
							<li><a href="computer_peripherals.php">Computer Peripherals</a></li>
							<li><a href="accessories.php">Accessories</a></li>
							<li><a href="#">Special Offers</a></li>
						</ul> 
						<div class="clearfix"> </div>
						<!--//navbar-collapse-->
						<!--<header class="cd-main-header">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul> <!-- cd-header-buttons 
						</header>-->
					</div>
					<!--//navbar-header-->
				</nav>
				<!--<div id="cd-search" class="cd-search">
					<form>
						<input type="search" placeholder="Search...">
					</form>
				</div>-->
			</div>
		</div>
	</div>