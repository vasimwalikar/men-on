
<?php require_once "header.php";?>



        
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="stats.php"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
            <li><a href="products_transactions.php" class="active"><i class="fa fa-bar-chart fa-fw"></i>Payment Transactions</a></li>
            <li><a href="manage-users.php"><i class="fa fa-users fa-fw"></i>User Details</a></li>
			<li><a href="list_product.php"><i class="fa fa-database fa-fw"></i>add products</a></li>
			<!--<li><a href="data-visualization.php"><i class="fa fa-database fa-fw"></i>add products</a></li>
            <li><a href="preferences.php"><i class="fa fa-sliders fa-fw"></i>Preferences</a></li>
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
                <li><a href="products_transactions.php"></i>Payment Transactions For pit shop</a></li>
                
				<li><a href="rb_transactions.php" class="active"></i>Payment Transactions For Race Bucks </a></li>
				<!--<li><a href="manage-users.php"></i>User Details</a></li>-->
			
            
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
		 <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">              
              <div class="templatemo-content-widget pink-bg">
                <i class="fa fa-times"></i>                
                <h2 class="text-uppercase margin-bottom-10">A List Of Payment Transactions For <b>Race Bucks</b>.</h2>
				<?php
					require_once("../dbconnect.inc.php");
					date_default_timezone_set("Asia/Kolkata");
					$transactions = mysql_query("SELECT scores.name, payment_gateway.transaction_reference_no, payment_gateway.transaction_amount, payment_gateway.time FROM payment_gateway INNER JOIN scores ON payment_gateway.score_ids = scores.scores_id");
					if (mysql_num_rows($transactions) == 0) {?>
						<p class="margin-bottom-0">"There have been no transactions."</p>
						<?php return;
					}
				?>
                              
              </div>            
            </div>                       
          </div> <!-- Second row ends -->
		  
          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
				<tr>
					<th>Id</th>
					<th>Reference no.</th>
					<th>User name</th>
					<th>Amount paid</th>
					<th>Time of transaction</th>
				</tr>
					<?php
						$trans_id = 1;
						while ($trans = mysql_fetch_array($transactions)) {
							echo '<tr>';
							// The following formats the number to a 10-digit string with leading zeros
							// $trans_id = $trans['transaction_reference_no'];
							echo '<td>'.sprintf('%010d', $trans_id++).'</td>';
							echo '<td>'.$trans['transaction_reference_no'].'</td>';
							echo '<td>'.$trans['name'].'</td>';
							echo '<td>'.$trans['transaction_amount'].'</td>';
							echo '<td>'.$trans['time'].'</td>';
							echo '</tr>';
						}
					?>
              </table>    
            </div>                          
          </div>          
          <!--<div class="templatemo-flex-row flex-content-row">
            <div class="col-1">
              <div class="panel panel-default margin-10">
                <div class="panel-heading"><h2 class="text-uppercase">Login Form</h2></div>
                <div class="panel-body">
                  <form action="index.php" class="templatemo-login-form">
                    <div class="form-group">
                      <label for="inputEmail">Email address</label>
                      <input type="email" class="form-control" id="inputEmail" placeholder="Enter email">
                    </div>
                    <div class="form-group">                      
                      <label for="inputEmail">Password</label>
                      <input type="password" class="form-control" placeholder="Enter password">                                 
                    </div>              
                    <div class="form-group">
                        <div class="checkbox squaredTwo">
                            <label>
                              <input type="checkbox"> Remember me
                            </label>
                        </div>            
                    </div>
                    <div class="form-group">
                      <button type="submit" class="templatemo-blue-button">Submit</button>
                    </div>
                  </form>
                </div>                
              </div>           
            </div>  
            <div class="col-1">              
              <div class="templatemo-content-widget pink-bg">
                <i class="fa fa-times"></i>                
                <h2 class="text-uppercase margin-bottom-10">Latest Data</h2>
                <p class="margin-bottom-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mi sapien, fringilla at orci nec, viverra rhoncus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rhoncus erat non purus commodo, sit amet varius dolor sagittis.</p>                  
              </div>            
              <div class="templatemo-content-widget blue-bg">
                <i class="fa fa-times"></i>
                <h2 class="text-uppercase margin-bottom-10">Older Data</h2>
                <p class="margin-bottom-0">Phasellus dapibus nulla quis risus auctor, non placerat augue consectetur. Aliquam convallis pharetra odio, in convallis erat molestie sed. Fusce mi lacus, semper sit amet mattis eu, volutpat vitae enim.</p>                
              </div>            
            </div>                       
          </div> <!-- Second row ends 
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-2">
              <i class="fa fa-times"></i>
              <div class="media margin-bottom-30">
                <div class="media-left padding-right-25">
                  <a href="#">
                    <img class="media-object img-circle templatemo-img-bordered" src="images/person.jpg" alt="Sunset">
                  </a>
                </div>
                <div class="media-body">
                  <h2 class="media-heading text-uppercase blue-text">John Barnet</h2>
                  <p>Project Manager</p>
                </div>        
              </div>
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><div class="circle green-bg"></div></td>
                      <td>New Task Issued</td>
                      <td>02</td>                    
                    </tr> 
                    <tr>
                      <td><div class="circle pink-bg"></div></td>
                      <td>Task Pending</td>
                      <td>22</td>                    
                    </tr>  
                    <tr>
                      <td><div class="circle blue-bg"></div></td>
                      <td>Inbox</td>
                      <td>13</td>                    
                    </tr>  
                    <tr>
                      <td><div class="circle yellow-bg"></div></td>
                      <td>New Notification</td>
                      <td>18</td>                    
                    </tr>                                      
                  </tbody>
                </table>
              </div>             
            </div>
            <div class="templatemo-content-widget white-bg col-1 text-center templatemo-position-relative">
              <i class="fa fa-times"></i>
              <img src="images/person.jpg" alt="Bicycle" class="img-circle img-thumbnail margin-bottom-30">
              <h2 class="text-uppercase blue-text margin-bottom-5">Paul Smith</h2>
              <h3 class="text-uppercase margin-bottom-70">Managing Director</h3>
              <div class="templatemo-social-icons-container">
                <div class="social-icon-wrap">
                  <i class="fa fa-facebook templatemo-social-icon"></i>  
                </div>
                <div class="social-icon-wrap">
                  <i class="fa fa-twitter templatemo-social-icon"></i>  
                </div>
                <div class="social-icon-wrap">
                  <i class="fa fa-google-plus templatemo-social-icon"></i>  
                </div>                
              </div>
            </div>
            <div class="templatemo-content-widget white-bg col-1 templatemo-position-relative templatemo-content-img-bg">
              <img src="images/sunset-big.jpg" alt="Sunset" class="img-responsive content-bg-img">
              <i class="fa fa-heart"></i>
              <h2 class="templatemo-position-relative white-text">Sunset</h2>
              <div class="view-img-btn-wrap">
                <a href="" class="btn btn-default templatemo-view-img-btn">View</a>  
              </div>              
            </div>
          </div>-->
          <div class="pagination-wrap">
            <ul class="pagination">
              <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
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