	<?php 
		require_once "header.php";
		require_once "../dbconnect.inc.php";
		
		//fetching category names from product_category
		$query = "select * from product_category where 1";
		$result_cat = mysql_query($query);
		
		//fetching data using request parameters
		$product_id = mysql_real_escape_string($_REQUEST['product_id']);
		//echo $category_id;
		$query = "select * from product_list where product_id = '$product_id' ";
		$result = mysql_query($query);
		$product = mysql_fetch_array($result);
		$product['image_filename1'];
		//edit category ame using update query
		
		if(isset($_POST['update'])){
			$product_name = mysql_real_escape_string($_POST['product_name']);
			$product_price = mysql_real_escape_string($_POST['product_price']);
			$price_inr = mysql_real_escape_string($_POST['price_inr']);
			$price_rb = mysql_real_escape_string($_POST['price_rb']);
			$product_category = mysql_real_escape_string($_POST['product_category']);
			$product_description = mysql_real_escape_string($_POST['product_description']);
			$product_image_path = $product['image_filename1'];//Added if image is not chose from the form post
			$product_image_path1 = $product['image1'];//Added if image is not chose from the form post
			$product_image_path2 = $product['image2'];//Added if image is not chose from the form post
			$product_image_path3 = $product['image3'];//Added if image is not chose from the form post
			$product_image_path4 = $product['image4'];//Added if image is not chose from the form post
			
			if ($_FILES['product_image']['tmp_name']) {
					$product_image = $_FILES['product_image']['tmp_name'];
					move_uploaded_file($_FILES["product_image"]["tmp_name"],"../images/NEW/" . $_FILES["product_image"]["name"]);
					$product_image_path ="../images/NEW/" . $_FILES["product_image"]["name"];
				}
			if ($_FILES['product_image1']['tmp_name']) {
					$product_image = $_FILES['product_image1']['tmp_name'];
					move_uploaded_file($_FILES["product_image1"]["tmp_name"],"../images/NEW/" . $_FILES["product_image1"]["name"]);
					$product_image_path1 ="../images/NEW/" . $_FILES["product_image1"]["name"];
				}
			if ($_FILES['product_image2']['tmp_name']) {
					$product_image = $_FILES['product_image2']['tmp_name'];
					move_uploaded_file($_FILES["product_image2"]["tmp_name"],"../images/NEW/" . $_FILES["product_image2"]["name"]);
					$product_image_path2 ="../images/NEW/" . $_FILES["product_image2"]["name"];
				}
			if ($_FILES['product_image3']['tmp_name']) {
					$product_image = $_FILES['product_image3']['tmp_name'];
					move_uploaded_file($_FILES["product_image3"]["tmp_name"],"../images/NEW/" . $_FILES["product_image3"]["name"]);
					$product_image_path3 ="../images/NEW/" . $_FILES["product_image3"]["name"];
				}
			if ($_FILES['product_image4']['tmp_name']) {
					$product_image = $_FILES['product_image4']['tmp_name'];
					move_uploaded_file($_FILES["product_image4"]["tmp_name"],"../images/NEW/" . $_FILES["product_image4"]["name"]);
					$product_image_path4 ="../images/NEW/" . $_FILES["product_image4"]["name"];
				}
				
			$query = "update product_list set product_name = '$product_name', product_price = '$product_price', price_inr = '$price_inr', price_fc = '$price_rb',product_desc1 = '$product_description', image_filename1 = '$product_image_path', image1 = '$product_image_path1', image2 = '$product_image_path2', image3 = '$product_image_path3', image4 = '$product_image_path4' where product_id = '$product_id' ";
			$result = mysql_query($query);
			if($result){
				
				?><script> window.location = '../stats/list_product.php'; </script> <?php
			}else{
				die("error in mysql query" . mysql_error());
			}
		}
		?>   

			<div class="mobile-menu-icon">
				<i class="fa fa-bars"></i>
			</div>
			<nav class="templatemo-left-nav">
				<ul>
					<li><a href="stats.php"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
					<li><a href="transactions.php"><i class="fa fa-bar-chart fa-fw"></i>Payment Transactions</a></li>
					<li><a href="manage-users.php"><i class="fa fa-users fa-fw"></i>User Details</a></li>
					<li><a href="list_product.php"  class="active"><i class="fa fa-database fa-fw"></i>add products</a></li>
					<!--<li><a href="preferences.php"><i class="fa fa-sliders fa-fw"></i>Preferences</a></li>
					<li><a href="login.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>-->
				</ul>
			</nav>
		</div>
		<!-- Main content -->
		<div class="templatemo-content col-1 light-gray-bg">
			<div class="templatemo-top-nav-container">
				<div class="row">
					<nav class="templatemo-top-nav col-lg-12 col-md-12">
						<ul class="text-uppercase">
							<li><a href="list_product.php">list of products</a></li>
							<li><a href="add_products.php" class="active">add products</a></li>
							<li><a href="add_product_category.php">add product categories</a></li>
							<li><a href="product_condition.php">Deal product condition</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="templatemo-content-container">
				<div class="form-group text-left">
					<button class="templatemo-blue-button" onclick="window.location.href='list_product.php'" style="margin-left:10px;"> back</button>
				</div> 
				<div class="templatemo-content-widget white-bg">
					<h2 class="margin-bottom-10">Add Product</h2>
					<p>Add all informations about Products</p>
					
					<!---------form for products adding---------------->
					<form class="templatemo-login-form" method="post" action="" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="col-lg-6 col-md-6 form-group">                  
								<label for="product_name">Product Name</label>
								<input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product['product_name']?>" placeholder="">
							</div>
							<div class="col-lg-6 col-md-6 form-group">                  
								<label for="product_price">Product Price</label>
								<input type="text" class="form-control" name="product_price" id="Product_price" value="<?php echo $product['product_price']?>" placeholder=""  onblur="Calculate();">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6 col-md-6 form-group">                  
								<label for="price_inr">Price INR</label>
								<input type="text" class="form-control" name="price_inr" id="price_inr" value="<?php echo $product['price_inr']?>" placeholder="">
								<p>Note: Please check values manually</p>
							</div>
							<div class="col-lg-6 col-md-6 form-group">                  
								<label for="price_rb">Price RB</label>
								<input type="text" class="form-control" name="price_rb" id="price_rb" value="<?php echo $product['price_fc']?>" placeholder="">
								<p>Note: Please check values manually</p>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6 col-md-6 form-group">
								<label class="control-label templatemo-block">Mian Image</label> 
								<!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
								<input type="file" name="product_image" id="product_image" value="" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" multiple>
								<p>Note: Image size should be 270X327 px.</p>                  
							</div>
							<div class="col-lg-6 col-md-6 form-group"> 
								<p>Mian Image</p><img src="<?php echo $product['image_filename1']?>" alt="Smiley face" width="100">
								<?php if($product['image1'] == !""){ ?>
									Img 1. <img src="<?php echo $product['image1']?>" alt="Smiley face" width="100"> 
								<?php } ?>
								<?php if($product['image2'] == !""){ ?>
									Img 2. <img src="<?php echo $product['image2']?>" alt="Smiley face" width="100"> 	
								<?php } ?>
								<?php if($product['image3'] == !""){ ?>
									Img 3. <img src="<?php echo $product['image3']?>" alt="Smiley face" width="100"> 
								<?php } ?>
								<?php if($product['image4'] == !""){ ?>
									Img 4. <img src="<?php echo $product['image4']?>" alt="Smiley face" width="100"> 
								<?php } ?>
							</div>	
						</div>
						<div class="row form-group">
							<div class="col-lg-6 col-md-6 form-group">
								<label class="control-label templatemo-block">Image1</label> 
								<!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
								<input type="file" name="product_image1" id="product_image1" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" multiple>
								<p>Note: Image size should be 270X327 px.</p>                  
							</div>	
							<div class="col-lg-6 col-md-6 form-group">
								<label class="control-label templatemo-block">Image2</label> 
								<!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
								<input type="file" name="product_image2" id="product_image2" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" multiple>
								<p>Note: Image size should be 270X327 px.</p>                  
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6 col-md-6 form-group">
								<label class="control-label templatemo-block">Image3</label> 
								<!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
								<input type="file" name="product_image3" id="product_image3" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" multiple>
								<p>Note: Image size should be 270X327 px.</p>                  
							</div>	
							<div class="col-lg-6 col-md-6 form-group">
								<label class="control-label templatemo-block">Image4</label> 
								<!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
								<input type="file" name="product_image4" id="product_image4" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" multiple>
								<p>Note: Image size should be 270X327 px.</p>                  
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-12 form-group" style="width:100%;">                   
								<label class="control-label" for="product_description">Product Description</label>
								<textarea type="text" class="form-control" name="product_description" rows="10"><?php echo $product['product_desc1']?></textarea>
								<p>Note: For next line use /br enclosed by < > at the end</p>
							</div>
						</div>
						<div class="form-group text-right">
							<input type="submit" name="update" value="Update"class="templatemo-blue-button">
							<button type="reset" class="templatemo-white-button">Reset</button>
						</div>                           
					</form>
					<!-- END Form -->
				</div>
				<footer class="text-right">
					<p>Copyright &copy; All Rights Krismen Rennsport Pvt.Ltd.
					<!--| Designed by <a href="http://www.templatemo.com" target="_parent">templatemo</a></p>-->
				</footer>
			</div>
		</div>
		</div>

		<!-- JS -->
		<!---------js calculation for product price-------------->
		<script>
		
			function Calculate(){
			var product_price = document.getElementById('Product_price').value;

			document.getElementById('price_inr').value = parseFloat(product_price) * 0.4;
			document.getElementById('price_rb').value = parseFloat(product_price) * 0.3;
			}
		</script>
		<!---------------------------END------------------>
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>        <!-- jQuery -->
		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
		<script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->
	</body>
</html>
