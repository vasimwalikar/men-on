
<?php 
	require_once "header.php";
	include_once "../dbconnect.inc.php";
	$query = "select * from product_list order by product_id desc";
	$all_products = mysql_query($query) or die("error in mysql query".mysql_error());
	
	//delete categry from list
	if(isset($_POST['delete'])){
		  $product_id=mysql_real_escape_string($_POST['product_id']);
		  // insert into users table
		   $query="delete from product_list where product_id='$product_id'";
			$result = mysql_query($query);
		  if($result){
		   ?><script> window.location = '../stats/list_product.php'; </script> <?php
		  }else{
			die("error in mysql".mysql_error());
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
							<li><a href="list_product.php" class="active">list of products</a></li>
							<li><a href="add_products.php">add products</a></li>
							<li><a href="add_product_category.php">add product categories</a></li>
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
							<h2 class="text-uppercase margin-bottom-10">A List Of Products.</h2>
							<!--<p class="margin-bottom-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mi sapien, fringilla at orci nec, viverra rhoncus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rhoncus erat non purus commodo, sit amet varius dolor sagittis.</p> -->                 
						</div>            
					</div>                       
				</div> <!-- Second row ends -->
				<div class="form-group text-left">
					<button class="templatemo-blue-button" onclick="window.location.href='add_products.php'" style="margin-left:10px;">add products</button>
				</div> 
				<div class="templatemo-content-widget no-padding">
					<div class="panel panel-default table-responsive">
						<table class="table table-striped table-bordered templatemo-user-table">
							<thead>
								<tr>
									<td><a href="" class="white-text templatemo-sort-by"># <span class="caret"></span></a></td>
									<td><a href="" class="white-text templatemo-sort-by">Image<span class="caret"></span></a></td>
									<td><a href="" class="white-text templatemo-sort-by">Name <span class="caret"></span></a></td>
									<td><a href="" class="white-text templatemo-sort-by">Category <span class="caret"></span></a></td>
									<td><a href="" class="white-text templatemo-sort-by">Price (Rs)<span class="caret"></span></a></td>
									<td><a href="" class="white-text templatemo-sort-by">Price (INR) <span class="caret"></span></a></td>
									<td><a href="" class="white-text templatemo-sort-by">Price (RB) <span class="caret"></span></a></td>
									<td><a href="" class="white-text templatemo-sort-by">Description <span class="caret"></span></a></td>
									<td>Edit</td>
									<td>Delete</td>
								</tr>
							</thead>
							<tbody>
								<?php
									//auto increment counter for id
										$cat_id=1;
									//fetching all array from product_category table
									while($products = mysql_fetch_array($all_products)){ ?>
										<tr>
											<td><?php echo sprintf('%03d', $cat_id++) ?></td>
											<td>
												Main Image<img class="img-responsive" style="width: 100px;" src="<?php echo $products['image_filename1']?>" alt="" />
												<?php if($products['image1'] == !""){ ?>
													Image 1<img class="img-responsive" style="width: 100px;" src="<?php echo $products['image1']?>" alt="" />	
												<?php } ?>
												<?php if($products['image2'] == !""){ ?>
													Image 2<img class="img-responsive" style="width: 100px;" src="<?php echo $products['image2']?>" alt="" />	
												<?php } ?>
												<?php if($products['image3'] == !""){ ?>
													Image 3<img class="img-responsive" style="width: 100px;" src="<?php echo $products['image3']?>" alt="" />	
												<?php } ?>
												<?php if($products['image4'] == !""){ ?>
													Image 4<img class="img-responsive" style="width: 100px;" src="<?php echo $products['image4']?>" alt="" />	
												<?php } ?>
												
												
												
												
											</td>
											<td><?php echo $products['product_name'] ?></td>
											<td><?php echo $products['product_cat'] ?></td>
											<td><?php echo $products['product_price'] ?></td>
											<td><?php echo $products['price_inr'] ?></td>
											<td><?php echo $products['price_fc'] ?></td>
											<td><?php echo $products['product_desc1'] ?></td>
											<td><a href="edit_product.php?product_id=<?php echo $products['product_id']?>" class="templatemo-edit-btn">Edit</a>
											</td>
											
											<td>
												<form method="post">
													<input type="hidden" name="product_id" value="<?php echo $products['product_id']; ?>">
													<input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete?')" class="templatemo-delete-btn">
												</form>
											</td>
										</tr>
								<?php } ?>    
							</tbody>
						</table>    
					</div>                          
				</div>          
				
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