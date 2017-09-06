<!DOCTYPE html>
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
	
	include_once "../dbconnect.inc.php";
	$query = "select * from product_list where product_cat ='mobile-accessories' or product_cat ='computer-accessories' order by product_id desc";
	$all_products = mysql_query($query) or die("error in mysql query".mysql_error());
?>
	<!--header-->
	<?php require_once "header.php";?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Accessories</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--products-->
	<div class="gallery">
		<div class="container">
			<div class="new-info1 product-list">
				<?php while($fetch_all_products=mysql_fetch_array($all_products)){
						$fetch_all_products['product_name'] = substr($fetch_all_products['product_name'],0,21).'...';
					?>
				<div class="col-md-3 new-grid1 simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
					<div class="new-top">
						<a href="single.php"><img src="<?php echo $fetch_all_products['image_filename1']?>" class="img-responsive" alt=""/></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href="add_to_cart.php?imageid=<?php echo $fetch_all_products['product_id']?>"> Add to cart</a></li>
								
								<li><a href="single.php?imageid=<?php echo $fetch_all_products['product_id']?>">Show Details </a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom" style="text-align: center;">
						<h5><a class="name" href="single.php"><?php echo $fetch_all_products['product_name']?></a></h5>
						<!--<div class="rating">
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span>☆</span>
						</div>-->	
						<div class="ofr" style="margin-top: 5px;">
							<p class="pric1"><del>MRP: &#8377 <?php echo $fetch_all_products['product_price']?></del></p></br>
							<p><span class="item_price">&#8377 <?php echo $fetch_all_products['price_inr']?><!-- + RB <?php echo $fetch_all_products['price_fc']?>--></span></p>
						</div>
					</div>
				</div>
				<?php  } ?> 
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<!--//products-->
	<?php require_once "footer.php"?>