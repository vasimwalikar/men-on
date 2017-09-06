	<?php 	
		require_once "header.php";
		require_once "../dbconnect.inc.php";
			
		// inserting product categories
		
		if(isset($_POST['add_category'])){
              $category_name=mysql_real_escape_string($_POST['category_name']);
              // insert into users table
              $query = "insert into product_category(category_name)values('$category_name')";
              $result = mysql_query($query);
              if($result){
                ?><script> window.location = '../stats/add_product_category.php'; </script> <?php
              }else{
                die("error in mysql".mysql_error());
              }
            }
			
		// listing all product categories 
		
		$query = "select * from product_category where 1";
		$result = mysql_query($query);
		
		//delete categry from list
		if(isset($_POST['delete'])){
              $category_id=mysql_real_escape_string($_POST['category_id']);
              // insert into users table
               $query="delete from product_category where category_id='$category_id'";
				$result = mysql_query($query);
              if($result){
               ?><script> window.location = '../stats/add_product_category.php'; </script> <?php
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
						<li><a href="list_product.php">list of products</a></li>
						<li><a href="add_products.php">add products</a></li>
						<li><a href="list_product_category.php"  class="active">add product categories</a></li>
						<li><a href="product_condition.php">Deal product condition</a></li>
					</ul>
				</nav>
			</div>
		</div>
		
		<div class="templatemo-content-container">
			<div class="templatemo-content-widget white-bg">
				<h2 class="margin-bottom-10">Add Product Category</h2>
				<form  class="templatemo-login-form" method="POST" enctype="multipart/form-data">
					<div class="row form-group">
						<div class="col-lg-6 col-md-6 form-group">                  
							<label for="category_name">Category Name</label>
							<input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name">                  
						</div>
					</div>
					<div class="form-group text-left">
						<input type="submit" name="add_category" value="Submit" class="templatemo-blue-button">
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
                    <td><a href="" class="white-text templatemo-sort-by">Category Name<span class="caret"></span></a></td>
                    <!--<td><a href="" class="white-text templatemo-sort-by">Last Name <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">User Name <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Email <span class="caret"></span></a></td>-->
                    <td>Edit</td>
                    <td>Delete</td>
                  </tr>
                </thead>
				<tbody>
				
				<?php
					//auto increment counter for id
						$cat_id=1;
					//fetching all array from product_category table
					while($cat = mysql_fetch_array($result)){ ?>
                  <tr>
					<td><?php echo sprintf('%03d', $cat_id++) ?></td>
                    <td><?php echo $cat['category_name'] ?></td>
					<td><a href="edit_product_category.php?category_id=<?php echo $cat['category_id']?>" class="templatemo-edit-btn">Edit</a></td>
                   <!-- <td><a href="add_product_category.php?category_id=<?php echo $cat['category_id']?>" class="templatemo-delete-btn">Delete</a></td>-->
					<td>
						<form method="post">
							<input type="hidden" name="category_id" value="<?php echo $cat['category_id']; ?>">
							<input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete?')" class="templatemo-delete-btn">
						</form>
                    </td>
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
