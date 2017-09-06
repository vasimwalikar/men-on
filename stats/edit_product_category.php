<?php 	
	require_once "header.php";
	require_once "../dbconnect.inc.php";
	
	//fetching data using request parameters
	$category_id = mysql_real_escape_string($_REQUEST['category_id']);
	//echo $category_id;
	$query = "select * from product_category where category_id = '$category_id' ";
	$result = mysql_query($query);
	$cat = mysql_fetch_array($result);
	
	//edit category ame using update query
	
	if(isset($_POST['update'])){
		$category_name = mysql_real_escape_string($_POST['category_name']);
		$query = "update product_category set category_name = '$category_name' where category_id = '$category_id' ";
		$result = mysql_query($query);
		if($result){
			?>
			<script>window.location = '../stats/add_product_category.php';</script>
			<?php
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
							<li><a href="add_products.php">add products</a></li>
							<li><a href="list_product_category.php" class="active">add product categories</a></li>
							<li><a href="product_condition.php">Deal product condition</a></li>
						</ul>  
					</nav> 
				</div>
			</div>
			<div class="templatemo-content-container">
				<div class="templatemo-flex-row flex-content-row">
					<div class="col-1">              
						<div class="templatemo-content-widget pink-bg">
							<i class="fa fa-times"></i>                
							<h2 class="text-uppercase margin-bottom-10">Edit your categories</h2>
							<!--<p class="margin-bottom-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mi sapien, fringilla at orci nec, viverra rhoncus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rhoncus erat non purus commodo, sit amet varius dolor sagittis.</p> -->                 
						</div>            
					</div>                       
				</div>
				<div class="form-group text-left">
					<button class="templatemo-blue-button" onclick="window.location.href='add_product_category.php'" style="margin-left:10px;">back</button>
				</div>
				<div class="templatemo-content-widget white-bg">
					<h2 class="margin-bottom-10">Add Product Category</h2>
					<form  class="templatemo-login-form" method="POST" action="" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="col-lg-6 col-md-6 form-group">                  
								<label for="category_name">Category Name</label>
								<input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $cat['category_name']?>" placeholder="Enter Category Name">
							</div>
						</div>
						<div class="form-group text-left">
							<input type="submit" name="update" value="Submit" class="templatemo-blue-button">
							<button type="reset" class="templatemo-white-button">Reset</button>
						</div>                           
					</form>
				</div>
				<!-- Second row ends -->


				<div class="pagination-wrap">
					<ul class="pagination">
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3 <span class="sr-only">(current)</span></a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true"><i class="fa fa-play"></i></span>
							</a>
						</li>
					</ul>
				</div>          
				<footer class="text-right">
					<p>Copyright &copy; All Rights Krismen Rennsport Pvt.Ltd.
					<!--| Designed by <a href="http://www.templatemo.com" target="_parent">templatemo</a></p>-->
				</footer>         
			</div>
		</div>
		<!-- JS -->
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
		<script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
		<script>
			$(document).ready(function(){
			// Content widget with background image
			var imageUrl = $('img.content-bg-img').attr('src');
			$('.templatemo-content-img-bg').css('background-image', 'url(' + imageUrl + ')');
			$('img.content-bg-img').hide();        
			});
		</script>
	</body>
</html>