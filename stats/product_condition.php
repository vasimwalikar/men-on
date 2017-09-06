	<?php 	
		require_once "header.php";
		require_once "../dbconnect.inc.php";
			
		// Update product condition
		
		if(isset($_POST['update'])){
			$duration = mysql_real_escape_string($_POST['duration']);
			$end_time = mysql_real_escape_string($_POST['end_time']);
			
			$query = "update special_product_condition set duration = '$duration', end_time = '$end_time' ";
			$result = mysql_query($query);
			if($result){
				?>
				<script>window.location = '../stats/product_condition.php';</script>
				<?php
			}
		}
			
		// listing product information 
		
		$query = "select * from special_product_condition where 1";
		$result1 = mysql_query($query);
		
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
						<li><a href="list_product_category.php">add product categories</a></li>
						<li><a href="product_condition.php" class="active">Deal product condition</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<?php 
			$query = "select * from special_product_condition where 1";
			$result = mysql_query($query);
			$condition = mysql_fetch_array($result);
			$duration = $condition['duration'];
			$end_time = $condition['end_time'];
		
		?>
		<div class="templatemo-content-container">
			<div class="templatemo-content-widget white-bg">
				<h2 class="margin-bottom-10">Update Product Condition From Here</h2>
				<form  class="templatemo-login-form" method="POST" enctype="multipart/form-data">
					<div class="row form-group">
						<div class="col-lg-3 col-md-3 form-group">                  
							<label for="duration">Add Product Duration</label>
							<input type="text" class="form-control" name="duration" id="duration" value="<?php echo $duration?>" placeholder="Ex  Daily...">  <p> &nbsp;&nbsp;Ex.  Daily...</p>                
						</div>
						<div class="col-lg-3 col-md-3 form-group">                  
							<label for="end_time">Add End Time/Date</label>
							<input type="text" class="form-control" name="end_time" id="end_time" value="<?php echo $end_time?>" placeholder="05/04/2016 00:1 AM (month/day/year time)">  
							<p> &nbsp;&nbsp;Ex. 05/04/2016 00:1 AM &nbsp;&nbsp;&nbsp;(month/day/year time)...</p> 								
						</div>
					</div>
					<div class="form-group text-left">
						<input type="submit" name="update" value="Update" class="templatemo-blue-button">
						<button type="reset" class="templatemo-white-button">Reset</button>
					</div>                           
				</form>
			</div>
			          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
					<tr>
                    <td><a href="" class="white-text templatemo-sort-by"># <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Product For<span class=""></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Product End Time<span class=""></span></a></td>
				</thead>
				<tbody>
				
				<?php
					//auto increment counter for id
						$cat_id=1;
					//fetching all array from product_category table
					while($cat = mysql_fetch_array($result1)){ ?>
                  <tr>
					<td><?php echo sprintf('%03d', $cat_id++) ?></td>
                    <td><?php echo $cat['duration'] ?></td>
					<td><?php echo $cat['end_time'] ?></td>
                   <!-- <td><a href="add_product_category.php?category_id=<?php echo $cat['category_id']?>" class="templatemo-delete-btn">Delete</a></td>-->
					
                  </tr>
				  <?php }
                  ?>    
				</tbody>
              </table>    
            </div>                          
          </div> 
			<footer class="text-right">
				<p>Copyright &copy; All Rights Krismen Rennsport Pvt.Ltd.
				<!--| Designed by <a href="http://www.templatemo.com" target="_parent">templatemo</a></p>-->
			</footer>
		</div>
	</div>
	</div>

	<!-- JS -->
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>        <!-- jQuery -->
	<script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
	<script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->
	</body>
	</html>
