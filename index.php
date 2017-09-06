<?php
	//main page session
	include_once "dbconnect.inc.php";
	
	if(isset($_COOKIE['Username'])==""){
		$User_name="";
        //header('Location:index.php');
	}else if(isset($_COOKIE['Username'])!=""){
		$User_name=$_COOKIE['Username'];
        
	}
	if(isset($_COOKIE['Email'])==""){
		$Email="";
         //header('Location:index.php');
	}else if(isset($_COOKIE['Email'])!=""){
		$Email=$_COOKIE['Email'];
        
	}
	
	session_start();
	if(!isset($_SESSION['loggedin'])){
		$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
	}
    
    $fuel_capacity = mysql_fetch_array(mysql_query("SELECT litres FROM scores WHERE name='".$User_name."'"));
   	$fuel_capacity = $fuel_capacity[0] ? $fuel_capacity[0] : 0;
	
	
	include_once "dbconnect.inc.php";
	$query = "select * from product_list where product_cat = 'mobile' or product_cat = 'mobile-accessories' or product_cat = 'tablets' or product_cat = 'computer-peripherals' or product_cat = 'computer-accessories' or product_cat = 'gaming' order by RAND() limit 0,8";
	$all_products = mysql_query($query) or die("error in mysql query".mysql_error());
	
	
	
	$new_products = "select * from product_list where product_cat = 'mobile' or product_cat = 'mobile-accessories' or product_cat = 'tablets' or product_cat = 'computer-peripherals' or product_cat = 'computer-accessories' or product_cat = 'gaming' order by product_id desc limit 0,4";
	$fetch_new_products = mysql_query($new_products) or die("error in mysql query".mysql_error());
	
	
?>
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<!--header-->
	<?php require_once "header.php";?>
	<!--//header-->
	<!--banner-->
	<!------Deal of the day script------------>
	<?php 
		
		// listing product information 
		date_default_timezone_set("Asia/Kolkata");
		$query = "select * from special_product_condition where 1";
		$result = mysql_query($query);
		$condition = mysql_fetch_array($result);
		$duration = $condition['duration'];
		$end_time = $condition['end_time'];
		
		$query = "select * from product_list where product_cat ='deal products' order by product_id desc";
		$deal_products = mysql_query($query) or die("error in mysql query".mysql_error());
	?>
	<div class="banner">
		<div class="container">
			<div class="banner-text">			
				<div class="col-sm-5 banner-left wow fadeInLeft animated" data-wow-delay=".5s">			
					<h2>Deals of the <?php echo $duration?></h2>
					<h3>View All</h3>
					<h4>Hurry up......</h4>
					<div class="count main-row">
						<ul id="example">
							<li><span class="days">00</span><p class="days_text">Day</p></li>
							<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
							<li><span class="minutes">00</span><p class="minutes_text">Min</p></li>
							<li><span class="seconds">00</span><p class="seconds_text">Sec</p></li>
						</ul>
						<div class="clearfix"></div>
						<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
						<script type="text/javascript">
							$('#example').countdown({
								
								date: '<?php echo $end_time ?>',
								offset: 5.50,
							}, function () {
								//alert('Done!');
							});
						</script>
					</div>

				</div>
				<div class="col-sm-7 banner-right wow fadeInRight animated" data-wow-delay=".5s">			
					<section class="slider grid">
						<div class="flexslider">
							<ul class="slides product-list">
							<?php while($fetch_all_products=mysql_fetch_array($deal_products)){
										$fetch_all_products['product_name'] = substr($fetch_all_products['product_name'],0,20).'...';
									?>
								<li>
									<a href="single.php?imageid=<?php echo $fetch_all_products['product_id']?>">
										<h4><?php echo $fetch_all_products['product_name']?></h4>
										<div class="vasim">
											<div class="ofr" style="text-align:center;">
												<p class="pric1">MRP: <del>&#8377 <?php echo $fetch_all_products['product_price']?></del></p></br>
												<p><span class="item_price">&#8377 <?php echo $fetch_all_products['price_inr']?> <!-- + RB <?php echo $fetch_all_products['price_fc']?>--></span></p>
											</div>
										</div>
										<img src="<?php echo $fetch_all_products['image_filename1']?>" alt="">
									</a>
								</li>
							<?php  } ?> 
								
							</ul>
						</div>
					</section>
					<!--FlexSlider-->
					<script defer src="js/jquery.flexslider.js"></script>
					<script type="text/javascript">
						$(window).load(function(){
						  $('.flexslider').flexslider({
							animation: "pagination",
							start: function(slider){
							  $('body').removeClass('loading');
							}
						  });
						});
					</script>
					<!--End-slider-script-->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>			
	<!--//banner-->
	<!--new-->
	<div class="new">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title" style="font-family:Orbitron,sans-serif;">New <span>Arrivals</span></h3>
				<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>-->
			</div>
			<div class="new-info product-list">
				<?php while($fetch_all_products=mysql_fetch_array($fetch_new_products)){
						$fetch_all_products['product_name'] = substr($fetch_all_products['product_name'],0,21).'...';
					?>
				<div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
					<div class="new-top">
						<a href="single.php"><img src="<?php echo $fetch_all_products['image_filename1']?>" class="img-responsive" alt=""/></a>
						<div class="new-text">
							<ul>
								<li><a class="item_add" href="add_to_cart.php?imageid=<?php echo $fetch_all_products['product_id']?>"> Add to cart</a></li>
								
								<li><a href="single.php?imageid=<?php echo $fetch_all_products['product_id']?>">Show Details </a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.php"><?php echo $fetch_all_products['product_name']?></a></h5>
						<!--<div class="rating">
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span>☆</span>
						</div>-->	
						<div class="ofr" style="text-align:center;">
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
	<div class="new">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title" style="font-family:Orbitron,sans-serif;">Popular <span>Products</span></h3>
				<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>-->
			</div>
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
	<!--//new-->
	
	<!-------js for blocking user To continue register or login------------------>
		<?php if(empty($User_name)){ ?>
		<script type="text/javascript">
			$(document).ready(function(){
			   $('.product-list').mouseover(function(){
				
				$('.product-list a:hover').css("cursor","not-allowed");
				$('.product-list a:hover').attr("title","Register or Login to continue");
				
			   }); 
			});
			
		<?php } ?>
		</script>
			
	<!--END-->
	<!--//gallery-->
	<!--trend-->
	<div class="trend wow zoomIn animated" data-wow-delay=".5s">
		<div class="container">
			<div class="trend-info">
				<section class="slider grid">
					<div class="flexslider trend-slider">
						<ul class="slides">
							<li>
								<div class="col-md-5 trend-left">
									<img src="images/NEW/storage/400x400-imadeujge5ynkax5.png" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TOP TRENDS <span>FOR YOU</span></h4>
									<h5> 60% OFF</h5>
									<p>Enjoy High Definition gaming and movie playback </br>Motion-sensitive DUALSHOCK 3 wireless controllers and an intuitive control system</br> 500GB built-in storage space</br> Wireless online connectivity</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="col-md-5 trend-left">
									<img src="images/NEW/storage/41YGWcdfFRLAA300.png" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TOP TRENDS <span>FOR YOU</span></h4>
									<h5> 60% OFF</h5>
									<p>Over the Head </br>Circum-aural Headphones</br> 32 ohm Headphone Impedance</br> 1000 mW of Max Power Input</br> 30 mm Headphone Driver Units </p>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="col-md-5 trend-left">
									<img src="images/NEW/storage/41aEM1tfBL_AA300.png" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TOP TRENDS <span>FOR YOU</span></h4>
									<h5> 60% OFF</h5>
									<p>These good looking Sony headphones comes in a stylish design and is available in trendy colors.</br> Ideal for active people, these Sony headphones comes with a water resistant housing that prevents the entry of water and sweat.</br> Hear pure detail with the 13.5mm driver, 104dB/mW sensitivity, and a frequency range of 17-22,000Hz.</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="col-md-5 trend-left">
									<img src="images/NEW/storage/amb1.png" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TOP TRENDS <span>FOR YOU</span></h4>
									<h5> 60% OFF</h5>
									<p>Rechargeable Portable</br> Lightweight and Compact Power Charger</br> 2600 mAh Capacity Samsung Cells</br> Charging Lights Indicator</br> Included USB Charging Cable </p>
								</div>
								<div class="clearfix"></div>
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
	<?php require_once "footer.php"?>