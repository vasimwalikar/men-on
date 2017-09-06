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
	<!--header-->
	<?php require_once "header.php";?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">My Shopping Cart</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--cart-items-->
	<div class="cart-items">
		<div class="container">
			<h3 class="wow fadeInUp animated" data-wow-delay=".5s">My Shopping Cart(1)</h3>
			<div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
				<div class="alert-close"> </div>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a href="single.php"><img src="images/g1.jpg" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a href="single.php"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
						<ul class="qty">
							<li><p>Min. order value :</p></li>
							<li><p>FREE delivery</p></li>
						</ul>
						<div class="delivery">
							<!--<p>Service Charges : $10.00</p>
							<span>Delivered in 1-1:30 hours</span>
							<div class="clearfix"></div>-->
						</div>
						<a href="#"><span class="label label-warning">Warning</span></a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--//cart-items-->	
	<?php require_once "footer.php"?>