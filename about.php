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
?>

	<?php require_once "header.php";?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">About us</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--about-->
	<div class="about">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title" style="font-family:Orbitron,sans-serif;">KrisMen <span> Rennsport</span></h3>
				<p style="text-align:center;">Real Steal:Free 3D Car Racing....!</p>
			</div>
			<div class="about-info">
				<p><a href="http://www.men-on.com/">www.men-on.com</a> <b>is an online website, fully owned and operated by KrisMen Rennsport Pvt. Ltd.</b> facilitating Cash Tournament and Real world products <b>for skillful players and gaming</b> enthusiasts.</p>
				<p><a href="http://www.men-on.com/">www.men-on.com</a> is your portal to the Real world of money games, where you can test your skills against live opponents to win CASH and PRIZES. Whether you’re a rank beginner or a seasoned veteran, and no matter what your taste, you’ll find our games addictive. Our games also offer practice versions, and also give you free credits (Real Money) to get you started, risk-free, commitment-free and Login Free! You’re sure to find something fun, exciting, and perhaps – if you have the SKILLS – profitable! </p>
				<p>This site offers a unique resource for people looking to play online cash racing game. </p>
				
				<h4 style="color:#353F49; font-size:40px;">Adserve Gaming (ADG)</h4>
				<h4>Coming Soon!!!!</h4>
				<p>See why more Brands and Media buyers are Turing to Adserve Gaming (ADG). Our technology allows us to integrate advertisements in Real – Time, into many of the hottest mobile gaming platforms. The Ads can be integrated into the game either through a display in the background, such as an in-game billboard or highly integrated within the game so that the advertised product is necessary to complete part of the game or is featured prominently. One of the advantages of ADG over traditional advertisements is that consumers are less likely to multitask with other media while playing a game.</p>
			</div>
		</div>
	</div>
	<?php require_once "footer.php"?>