<?php
	if(isset($_COOKIE['Username'])==""){
		$User_name="";
        $url = $_SERVER['HTTP_REFERER'];
        header('Location:'.$url);
	}else if(isset($_COOKIE['Username'])!=""){
		$User_name=$_COOKIE['Username'];
    }
	if(isset($_COOKIE['Email'])==""){
		$Email="";
	}else if(isset($_COOKIE['Email'])!=""){
		$Email=$_COOKIE['Email'];
    }
   /* echo '<pre>';
	print_r($_COOKIE);
	echo '</pre>';*/

	session_start();
	if(!isset($_SESSION['loggedin'])){
		$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
	}
    include_once "dbconnect.inc.php";
    $clientsquery1 = "select * from product_list where product_id='".$_GET['imageid']."'";
	$clientrs1 = mysql_query($clientsquery1);
	$clientdata1 = mysql_fetch_array($clientrs1);
	$imagepath=$clientdata1['image_filename1'];
	$imagepath1=$clientdata1['image1'];
	$imagepath2=$clientdata1['image2'];
	$imagepath3=$clientdata1['image3'];
	$imagepath4=$clientdata1['image4'];
	$INR_one_day=intval($clientdata1[1]);
	$FC_one_day=90/100*intval($clientdata1[0]);
	$INR_twenty=intval($clientdata1[1]);
	$FC_twenty=80/100*intval($clientdata1[0]);
	$INR_test=intval($clientdata1[1]);
	$FC_test=100/100*intval($clientdata1[0]);
	$dateandtime=new DateTime();
	$dateandtime->format('Y-m-d H:i:s');
	$product_category=$clientdata1['product_cat'];

	$random_similar_products=mysql_query("select image_filename1,thumb_image, product_id,product_desc1,product_name,product_price,price_inr from product_list where product_cat='".$product_category."' order by RAND() limit 0,4") or die("error in random ".mysql_error());
?>
	<!--header-->
	<?php require_once "header.php";?>
	<!--//header-->
	<!--flex slider-->
	<script defer src="js/jquery.flexslider.js"></script>
	<link rel="stylesheet" href="css/flexslider1.css" type="text/css" media="screen" />
	<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
	</script>
	<!--flex slider-->
	<script src="js/imagezoom.js"></script>
	<!--cart-->
	<script src="js/simpleCart.min.js"></script>

	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Product details</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--single-page-->
	<div class="single">
		<div class="container">
			<div class="single-info">		
				<div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">	
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="<?php echo $imagepath; ?>">
								<div class="thumb-image"> <img src="<?php echo $imagepath; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<?php if($imagepath1 == !""){?>
							<li data-thumb="<?php echo $imagepath1; ?>">
								 <div class="thumb-image"> <img src="<?php echo $imagepath1; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<?php }?>
							<?php if($imagepath2 == !""){?>
							<li data-thumb="<?php echo $imagepath2; ?>">
							   <div class="thumb-image"> <img src="<?php echo $imagepath2; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li> 
							<?php }?>
						</ul>
					</div>
				</div>
				<div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" data-wow-delay=".5s">
					<h3><?php echo $clientdata1['product_name'];?></h3>
					<div class="single-rating">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5" checked>
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
						<p>5.00 out of 5</p>
						<a href="#">Add Your Review</a>
					</div>
					<div class="price_single">
						<span class="reducedfrom">&#8377 <?php echo $clientdata1['product_price'];?></span>
						<span class="actual">You Pay: &#8377 <?php echo $clientdata1['price_inr']?> + RB <?php echo $clientdata1['price_fc']?></span>
						<!--<a href="#">click for offer</a>-->
					</div>
					<p><?php echo $clientdata1['product_desc1']?></p>
					<div class="clearfix"> </div>
					<div class="btn_form">
						<form method="post" action="" enctype="multipart/form-data">
							<?php 
								$query = mysql_query("SELECT litres FROM scores WHERE name = '".$User_name."'");
								if(mysql_num_rows($query)==1)
								$rows_of_fuel = mysql_fetch_array($query);
								if($_POST['get_it']){
										
									if(intval($rows_of_fuel['litres'])>($clientdata1['price_fc'])){
										$check_username = mysql_query("select username from product_bookings where username='".$User_name."' and status=0");

										if(mysql_num_rows($check_username)==1)
										{
											?>
											<script type="text/javascript">
												alert("A product is already booked!.");
												window.location.href="../profile/productinformation.php";
											</script>
											<?php
										}
										
									else{
										$delete_changed_request = mysql_query("delete from product_bookings where status in (5,2,4,1) and username='".$User_name."'");
										$insert_qurey = mysql_query("insert into product_bookings(username,product_id,scheme,time_booked,required_fc,required_inr,races_left) values('".$User_name."','".$_GET['imageid']."','T20','".$dateandtime->format("Y-m-d H:i:s")."','".$clientdata1['price_fc']."','".$clientdata1['price_inr']."',20)")or die('error in inserting to product_bookings'.mysql_error()); 
										//$url="www.men-on.com";
										//header("Location:".$url);
										// sending mail once product booked
										if(isset($_POST['button_email'])){
											if(isset($_COOKIE['Email'])==""){
												$Email="";
												}else if(isset($_COOKIE['Email'])!=""){
													$Email=$_COOKIE['Email'];
													}
											$get_email_id=mysql_query("select email,mobile from registration where username='".$User_name."'");
											$represent_this=mysql_fetch_array($get_email_id);
											$email_id=$represent_this['email'];

											$user_subject="Thank you for placing your order on men-on.com.";
											$user_to=$Email;

											$user_message="<p>Here are the<br/><strong>Product details</strong><br/>Product name:".$clientdata1['product_name']."<br/>Cost in INR:".$clientdata1['price_inr']."<br/>Cost in RB::".$clientdata1['price_fc']."</p>";

											$user_header="From:<support@men-on.com>\r\n";
											$user_header.="Reply-To:<support@men-on.com>\r\n";
											$user_header .= "MIME-Version:1.0\r\n";
											$user_header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
											// To men-on owner
											$our_subject = 'Request by user to send the product through the contact details'; 

											$to = "support@men-on.com";

											$our_message = "<p>Contact details:<br/> Character Name:'".$User_name."'<br/> Mobile number:'".$represent_this['mobile']."<br/>Product name:".$clientdata1['product_name']."<br/>Cost in INR:".$clientdata1['price_inr']."<br/>Cost in RB::".$clientdata1['price_fc']."'</p>";



											//$our_headers .= "BCC:support@mangium.com\r\n";
											$our_headers='From: <support@men-on.com>' . "\r\n" .
											'Reply-To: <'.$Email.'>' . "\r\n" .
											'MIME-Version: 1.0' . "\r\n" .
											'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
											'X-Mailer: PHP/' . phpversion();

											$user_response=mail($user_to,$user_subject,$user_message,$user_header);

											if($user_response){

												$response=mail($to, $our_subject, $our_message, $our_headers,"-r support@men-on.com");

											}
										}
										?>
										<script type="text/javascript">
										window.location.replace("../profile/productinformation.php");
										</script>
										<?php
									}
								}
								else{
									?>
									<script type="text/javascript">
									alert(" You need to earn more RB before you can get this product!");
									window.location.href="<?php $_SERVER['HTTP_REFERER'];?>";
									</script>
									<?php
								}
							}                                                                                                   
							?>
							<input type="submit" name="get_it" class="add-cart item_add" value="GET IT">
							<input type="hidden" name="button_email" value="1">
						</form>
					</div>
				</div>
			   <div class="clearfix"> </div>
			</div>
			
			<!--related-products-->
			<div class="related-products">
				<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
					<h3 class="title" style="font-family:Orbitron,sans-serif;">Related<span> Products</span></h3>
					<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>-->
				</div>
				<div class="related-products-info">
				<?php while($randomrows=mysql_fetch_array($random_similar_products)){
													$randomrows['product_name'] = substr($randomrows['product_name'],0,18).'...';
											?>
					<div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
						<div class="new-top">
							<img src="<?php echo $randomrows['image_filename1'];?>" class="img-responsive" alt=""/>
							<div class="new-text">
								<ul>
									
									<li><a href="single.php?imageid=<?php echo $randomrows['product_id']; ?>">Quick View </a></li>
									<li><a href="single.php?imageid=<?php echo $randomrows['product_id']; ?>">Show Details </a></li>
								</ul>
							</div>
						</div>
						<div class="new-bottom">
							<h5><a class="name" href="single.php"><?php echo $randomrows['product_name'];?></a></h5>
							<div class="rating">
								<span class="on">☆</span>
								<span class="on">☆</span>
								<span class="on">☆</span>
								<span class="on">☆</span>
								<span>☆</span>
							</div>	
							<div class="ofr">
								<p class="pric1"><del>&#8377 <?php echo $clientdata1['product_price'];?></del></p>
								<p><span class="item_price">&#8377 <?php echo $clientdata1['price_inr']?> + RB <?php echo $clientdata1['price_fc']?></span></p>
							</div>
						</div>
					</div>
					<?php } ?>  
					<div class="clearfix"> </div>
				</div>
			</div>
			<!--//related-products-->
		</div>
	</div>
	<!--//single-page-->
	<?php require_once "footer.php"?>