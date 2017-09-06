	<?php 
		require_once "header.php";
		require_once "../dbconnect.inc.php";
		//fetching category names from product_category
		$query = "select * from product_category where 1";
		$result = mysql_query($query);
		//adding product details
		$product_name = mysql_real_escape_string($_POST['product_name']);
		$product_price = mysql_real_escape_string($_POST['product_price']);
		$price_inr = mysql_real_escape_string($_POST['price_inr']);
		$price_rb = mysql_real_escape_string($_POST['price_rb']);
		$product_category = mysql_real_escape_string($_POST['product_category']);
		$product_description = mysql_real_escape_string($_POST['product_description']);
		$product_image = mysql_real_escape_string($_POST['product_image']);
		$product_image1 = mysql_real_escape_string($_POST['product_image1']);
		$product_image2 = mysql_real_escape_string($_POST['product_image2']);
		$product_image3 = mysql_real_escape_string($_POST['product_image3']);
		$product_image4 = mysql_real_escape_string($_POST['product_image4']);
		
		if(isset($_POST['add_products'])){
			
			$product_image = ($_FILES['product_image']['name']);
			$product_image1 = ($_FILES['product_image1']['name']);
			$product_image2 = ($_FILES['product_image2']['name']);
			$product_image3 = ($_FILES['product_image3']['name']);
			$product_image4 = ($_FILES['product_image4']['name']);
			
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
			
			$query = "insert into product_list(product_name,product_cat,product_price,price_inr,price_fc,product_desc1,image_filename1,image1,image2,image3,image4)values('$product_name','$product_category','$product_price','$price_inr','$price_rb','$product_description','$product_image_path','$product_image_path1','$product_image_path2','$product_image_path3','$product_image_path4')";
			
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
								<input type="text" class="form-control" name="product_name" id="product_name" placeholder="">
							</div>
							<div class="col-lg-6 col-md-6 form-group">                  
								<label for="product_price">Product Price</label>
								<input type="text" class="form-control" name="product_price" id="Product_price" placeholder=""  onblur="Calculate();">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6 col-md-6 form-group">                  
								<label for="price_inr">Price INR</label>
								<input type="text" class="form-control" name="price_inr" id="price_inr" placeholder=""> 
								<p>Note: Please check values manually</p>
							</div>
							<div class="col-lg-6 col-md-6 form-group">                  
								<label for="price_rb">Price RB</label>
								<input type="text" class="form-control" name="price_rb" id="price_rb" placeholder="">
								<p>Note: Please check values manually</p>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6 col-md-6 form-group"> 
								<label class="control-label templatemo-block">Select Product Category</label>                 
								<select class="form-control" name="product_category" id="product_category">
									
									<?php while($dropdown = mysql_fetch_array($result)){ ?>
											<option value="<?php echo $dropdown['category_name']?>"><?php echo $dropdown['category_name']?></option>
									<?php } ?>	
								</select>
							</div>	
							<div class="col-lg-6 col-md-6 form-group">
								<label class="control-label templatemo-block">Main Image</label> 
								<!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
								<input type="file" name="product_image" id="product_image" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" multiple>
								<p>Note: Image size should be 270X327 px.</p>                  
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
								<textarea class="form-control" name="product_description" id="product_description" rows="3"></textarea>
								<p>Note: For next line use /br enclosed by <> at the end</p>
							</div>
						</div>
						<div class="form-group text-right">
							<input type="submit" name="add_products" value="Upload" class="templatemo-blue-button">
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
