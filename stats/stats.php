		<?php require_once "header.php";?>
		<?php
			require_once("../dbconnect.inc.php");
			date_default_timezone_set("Asia/Kolkata");
			$start24hrs = time() - 86400;	// 24 hours in seconds
			$last24hrs = "BETWEEN '".date("Y-m-d", $start24hrs)." 00:00:00' AND '".date("Y-m-d")." 00:00:00'";
			$today = "BETWEEN '".date("Y-m-d")." 00:00:00' AND '".date("Y-m-d")." ".date("H:i:s")."'";

			$registered_users = mysql_query("SELECT * FROM registration WHERE admin != 2");
		?>

		<head>
			<script type="text/javascript" src="jquery-1.9.0.js"></script>
			<script type="text/javascript">
				$(function(){
					$('button').click(function(){
						var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html())
						location.href=url
						return false
					})
				})
			</script>
			<!------------------date picker---------------------->
		
			<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			<script src="//code.jquery.com/jquery-1.10.2.js"></script>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<link rel="stylesheet" href="/resources/demos/style.css">
			<script>
				$(function(){
					$("#to").datepicker({ dateFormat: 'yy-mm-dd 00:00:00' });
					$("#from").datepicker({ dateFormat: 'yy-mm-dd 00:00:00' }).bind("change",function(){
						var minValue = $(this).val();
						minValue = $.datepicker.parseDate("yy-mm-dd 00:00:00", minValue);
						minValue.setDate(minValue.getDate()+1);
						$("#to").datepicker( "option", "minDate", minValue );
					})
				});
			</script>
			<!---------------------end------------------------>
		</head>
		<div class="mobile-menu-icon">
			<i class="fa fa-bars"></i>
		</div>
		<nav class="templatemo-left-nav">          
			<ul>
				<li><a href="#" class="active"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
				<li><a href="products_transactions.php"><i class="fa fa-bar-chart fa-fw"></i>Payment Transactions</a></li>
				<li><a href="manage-users.php"><i class="fa fa-users fa-fw"></i>User Details</a></li>
				<li><a href="list_product.php"><i class="fa fa-database fa-fw"></i>Add Products</a></li>
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
						<li><a href="#" class="active"></i>Dashboard</a></li>
						<li><a href="products_transactions.php"></i>Payment Transactions</a></li>
						<li><a href="manage-users.php"></i>User Details</a></li>
						<li><a href="list_product.php"></i>Add Products</a></li>
					</ul>  
				</nav> 
			</div>
        </div>
        <div class="templatemo-content-container">
			<div class="templatemo-flex-row flex-content-row">
				<div class="templatemo-content-widget white-bg col-2">
					<i class="fa fa-times"></i>
					<!-- <div class="square"></div>-->
					<h2 class="templatemo-inline-block">Men-On Admin Panel</h2><hr>
					<div style="color:#ff0000; font-weight:bold">Fetched at: <?php echo date("Y-m-d").'&nbsp;'.date("H:i:s"); ?> (Server Time)</div>
				</div>
			</div>
			<div class="templatemo-flex-row flex-content-row">
				<div class="col-1">
					<div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
						<i class="fa fa-times"></i>
						<div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">General Statstics</h2></div>
						<div class="table-responsive">
							<table class="table table-striped table-bordered">
								<tr>
									<th>&nbsp;&nbsp;Title</th>
									<th>All time</th>
									<th>Today</th>
									<th>Yesterday</th>
								</tr>
								<tr>
									<td><b>Registered users</b></td>
									<td><a target="_blank" href="registered_users.php"><?php echo mysql_num_rows($registered_users); ?></a></td>
									<td><a target="_blank" href="today_registered_user.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM registration WHERE admin != 2 AND createdon ".$today)); ?></a></td>
									<td><a target="_blank" href="yesterday_registered_users.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM registration WHERE admin != 2 AND createdon ".$last24hrs)); ?></a></td>
								</tr>
								<tr>
									<td><b>Games played</b></td>
									<?php
									$racelog = mysql_query("SELECT * FROM racelog");
									$racelog_today = mysql_query("SELECT * FROM racelog WHERE start ".$today);
									$racelog24hrs = mysql_query("SELECT * FROM racelog WHERE start ".$last24hrs);
									?>
									<td><a target="_blank" href="all_time_played.php"><?php echo mysql_num_rows($racelog); ?></a></td>
									<td><a target="_blank" href="today_played.php"><?php echo mysql_num_rows($racelog_today); ?></a></td>
									<td><a target="_blank" href="yesterday_played.php"><?php echo mysql_num_rows($racelog24hrs); ?></a></td>
								</tr>
								<!--<tr>
									<td><b>1 player</b></td>
									<td><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=1")); ?></td>
									<td><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=1 AND start ".$last24hrs)); ?></td>
								</tr>-->
								<tr>
									<td><b>2 player</b></td>
									<td><a target="_blank" href="all_time_player2.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=2")); ?></a></td>
									<td><a target="_blank" href="today_player2.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=2 AND start ".$today)); ?></a></td>
									<td><a target="_blank" href="yesterday_player2.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=2 AND start ".$last24hrs)); ?></a></td>
								</tr>
								<tr>
									<td><b>3 player</b></td>
									<td><a target="_blank" href="all_time_player3.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=3")); ?></a></td>
									<td><a target="_blank" href="today_player3.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=3 AND start ".$today)); ?></a></td>
									<td><a target="_blank" href="yesterday_player3.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=3 AND start ".$last24hrs)); ?></a></td>
								</tr>
								<tr>
									<td><b>4 player</b></td>
									<td><a target="_blank" href="all_time_player4.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=4")); ?></a></td>
									<td><a target="_blank" href="today_player4.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=4 AND start ".$today)); ?></a></td>
									<td><a target="_blank" href="yesterday_player4.php"><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE numplayers=4 AND start ".$last24hrs)); ?></a></td>
								</tr>
								<!--<tr>
									<td><b>Races completed</b></td>
									<td><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE winner IS NOT NULL")); ?></td>
									<td><?php echo mysql_num_rows(mysql_query("SELECT * FROM racelog WHERE winner IS NOT NULL AND start ".$last24hrs)); ?></td>
								</tr>-->
								<?php
									/*$numGuest = 0;
									while ($race = mysql_fetch_array($racelog)) {
											if (strpos($race['player1'], 'Guest') !== false) $numGuest++;
											if (strpos($race['player2'], 'Guest') !== false) $numGuest++;
											if (strpos($race['player3'], 'Guest') !== false) $numGuest++;
											if (strpos($race['player4'], 'Guest') !== false) $numGuest++;
										}
									$numGuest_today = 0;
									while ($race = mysql_fetch_array($racelog_today)) {
											if (strpos($race['player1'], 'Guest') !== false) $numGuest_today++;
											if (strpos($race['player2'], 'Guest') !== false) $numGuest_today++;
											if (strpos($race['player3'], 'Guest') !== false) $numGuest_today++;
											if (strpos($race['player4'], 'Guest') !== false) $numGuest_today++;
										}
									$numGuest24hrs = 0;
									while ($race = mysql_fetch_array($racelog24hrs)) {
											if (strpos($race['player1'], 'Guest') !== false) $numGuest24hrs++;
											if (strpos($race['player2'], 'Guest') !== false) $numGuest24hrs++;
											if (strpos($race['player3'], 'Guest') !== false) $numGuest24hrs++;
											if (strpos($race['player4'], 'Guest') !== false) $numGuest24hrs++;
										}*/
										
										
									$result = mysql_query("SELECT count(id) as total from guest");
									$data = mysql_fetch_assoc($result);
									$guest_num = 370 + $data['total'];
									
								?>
								<tr>
									<td><b>Guest players</b></td>
									<td><?php echo $guest_num; ?></td>
									<td><?php echo mysql_num_rows(mysql_query("SELECT * FROM guest WHERE date ".$today)); ?></td>
									<td><?php echo mysql_num_rows(mysql_query("SELECT * FROM guest WHERE date ".$last24hrs)); ?></td>
								</tr>
							</table>    
						</div>                          
					</div>
				</div>           
			</div> <!-- Second row ends -->
			<!--<div class="templatemo-flex-row flex-content-row templatemo-overflow-hidden"> <!-- overflow hidden for iPad mini landscape view-->
				<!--<div class="col-1 templatemo-overflow-hidden">
						<div class="templatemo-content-widget white-bg templatemo-overflow-hidden">
							<i class="fa fa-times"></i>
							<div class="templatemo-flex-row flex-content-row">
								<div class="col-1 col-lg-6 col-md-12">
									<h2 class="text-center">Modular<span class="badge">new</span></h2>
									<div id="pie_chart_div" class="templatemo-chart"></div> <!-- Pie chart div -->
								<!--</div>
								<div class="col-1 col-lg-6 col-md-12">
									<h2 class="text-center">Interactive<span class="badge">new</span></h2>
									<div id="bar_chart_div" class="templatemo-chart"></div> <!-- Bar chart div -->
								<!--  </div>  
							</div>                
						</div>
					</div>
				</div>-->
			<footer class="text-right">
				<p>Copyright &copy; All Rights Krismen Rennsport Pvt.Ltd.
				<!--| Designed by <a href="http://www.templatemo.com" target="_parent">templatemo</a></p>-->
			</footer>         
        </div>
	</div>
    </div>
    
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
    <script>
      /* Google Chart 
      -------------------------------------------------------------------*/
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart); 
      
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Topping');
          data.addColumn('number', 'Slices');
          data.addRows([
            ['Mushrooms', 3],
            ['Onions', 1],
            ['Olives', 1],
            ['Zucchini', 1],
            ['Pepperoni', 2]
          ]);

          // Set chart options
          var options = {'title':'How Much Pizza I Ate Last Night'};

          // Instantiate and draw our chart, passing in some options.
          var pieChart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
          pieChart.draw(data, options);

          var barChart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));
          barChart.draw(data, options);
		}

		$(document).ready(function(){
			if($.browser.mozilla) {
			  //refresh page on browser resize
			  // http://www.sitepoint.com/jquery-refresh-page-browser-resize/
			  $(window).bind('resize', function(e)
			  {
				if (window.RT) clearTimeout(window.RT);
				window.RT = setTimeout(function()
				{
				  this.location.reload(false); /* false to get page from cache */
				}, 200);
			  });      
			} else {
				$(window).resize(function(){
					drawChart();
				});  
			}   
		});
      
    </script>
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->

	</body>
</html>