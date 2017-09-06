<?php require_once "header.php";?>

<?php
	require_once("../dbconnect.inc.php");
	date_default_timezone_set("Asia/Kolkata");
	$start24hrs = time() - 86400;	// 24 hours in seconds
	$last24hrs = "BETWEEN '".date("Y-m-d", $start24hrs)." 00:00:00' AND '".date("Y-m-d")." 00:00:00'";
	$today = mysql_real_escape_string($_REQUEST['today']);
?>
	<head>
	
		<meta charset="UTF-8" />
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
		<link rel="stylesheet" href="documents/css/reset.css"/>
		<link rel="stylesheet" href="css/BeatPicker.min.css"/>
		<link rel="stylesheet" href="documents/css/demos.css"/>
		<link rel="stylesheet" href="documents/css/prism.css"/>
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/BeatPicker.min.js"></script>
		<script src="documents/js/prism.js"></script>
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
			<li><a href="stats.php"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
			<li><a href="products_transactions.php"><i class="fa fa-bar-chart fa-fw"></i>Payment Transactions</a></li>
			<li><a href="manage-users.php" class="active"><i class="fa fa-users fa-fw"></i>User Details</a></li>
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
							<li><a href="manage-users.php">active users</a></li>
							<li><a href="non_active_users.php">non active users</a></li>
							<li><a href="races.php">total list of races </a></li>
							<!--<li><a href="races1.php?platform=webplayer">web-players</a></li>
							<li><a href="races1.php?platform=mobile">mobile-players</a></li>-->
						</ul>  
					</nav> 
				</div>
			</div>
			<div class="templatemo-content-container">
				<div class="templatemo-flex-row flex-content-row">
					<div class="templatemo-content-widget white-bg col-2">
						<i class="fa fa-times"></i>
						<!--<div class="square"></div>-->
						<h2 class="templatemo-inline-block">Registered User Details</h2><hr>
						<h2 style="font-size:20px; font-weight:bold; color:#aa0000; ">Note:</h2><br/>
						<li>This data is accurate from the time when race logging began, i.e. 20-03-2014.</li>
						<li>Username and email are the only compulsory details required for user registration.</li>
						<li><span style="background-color:#777777">Users who have not yet activated their account are shown in grey.</span></li>
						<li><span style="background-color:#ffacac">Admin accounts have this background colour. These users do not appear on the lap times leaderboard.</span></li>
						<li><span style="background-color:#acacff">Facebook users have this background colour.</span></li>
						<li>Dates are shown in the format Year-Month-Date</li>
					</div>
				</div>
				<?php
					////////////by default date///////////////////////
										
					$from_date = '2014-01-01 00:00:00';
					$to_date = date("Y-m-d").'&nbsp;'.date("H:i:s");
					
					///////////////////by selected date///////////////////
					if($_POST[from_date]){
						$from_date= mysql_real_escape_string($_POST[from_date]);
					}
					if($_POST[to_date]){
						$to_date=   mysql_real_escape_string($_POST[to_date]);
					}
					//////////////////////////END////////////////////////
				
				?>
				<div class="templatemo-flex-row flex-content-row">
					<div class="col-1">
						<form action="registered_users.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data">
							<div class="row form-group">
								<div class="col-lg-12 form-group" style="padding-left: 25px; padding-right: 25px; margin-top: 200px;">  
									<div class="margin-right-15 templatemo-inline-block">
										<label for="inputFirstName">From</label>
										<input class="form-control" name="from_date" type="text"  data-beatpicker="true"/ value="<?php echo $from_date?>">  
									</div>
									<div class="margin-right-15 templatemo-inline-block">                      
										<label for="inputLastName">To</label>
										<input class="form-control" name="to_date" type="text"  data-beatpicker="true"/ value="<?php echo $to_date?>">    
									</div>
									<div class="margin-right-15 templatemo-inline-block">
										<input type="submit" name="submit" class="templatemo-blue-button">                
									</div>
									<div class="margin-right-15 templatemo-inline-block">
										<button  class="templatemo-blue-button">Export To Excel</button>                
									</div>
								</div>
							</div>
						</form>
					</div>           
				</div> 
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

	<!-------------start table---------------->
	
	<link rel="stylesheet" type="text/css" href="StickyTableHeaders/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="StickyTableHeaders/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="StickyTableHeaders/css/component.css" />
	<div class="container">
		<div class="component" id="tableWrap">
			<table class="overflow-y">
				<thead>
					<tr>
						<th>User name</th>
						<th>Email</th>
						<th>Date Of Birth</th>
						<!--th>State</th>-->
						<th>Gender</th>
						<th>Mobile number</th>
						<th>Time of registration</th>
						<th>City</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					////////////by default date///////////////////////
										
					$from_date = '2014-01-01 00:00:00';
					$to_date = date("Y-m-d").'&nbsp;'.date("H:i:s");
					
					///////////////////by selected date///////////////////
					if($_POST[from_date]){
						$from_date= mysql_real_escape_string($_POST[from_date]);
					}
					if($_POST[to_date]){
						$to_date=   mysql_real_escape_string($_POST[to_date]);
					}
					//////////////////////////END////////////////////////
						
						$registered_users = mysql_query("SELECT * FROM registration WHERE createdon BETWEEN '".date("Y-m-d")."' and '".date("Y-m-d")." ".date("H:i:s")."' and admin != 2 order by id desc");
						
						$result = mysql_query("SELECT count(id) as total from registration");
						$data = mysql_fetch_assoc($result);
						$usernum = $data['total'];
						
						while ($user = mysql_fetch_array($registered_users)) {
							$username = $user['username'];
							if ($numraces[$username] != 0) continue;
							
							$col = $user['admin'] != 0 ? "#ffacac" : "#ffffff";
							$texcol = $user['activation'] == null ? "#000000" : "#777777";
							if ($user['loginfrom'] == 'facebook')
								$col = "#acacff";
							
							echo "<tr style=\"color:".$texcol."; background-color:".$col."\">";
							echo "<td>".($usernum--).". ".$username."</td>";
							echo "<td>".$user['email']."</td>";
							echo "<td>".($user['dob'] == null ? '<span class="incomplete">Not Mentioned</span>' : $user['dob'])."</td>";
							echo "<td>".($user['gender'] == null ? '<span class="incomplete">Not Mentioned</span>' : $user['gender'])."</td>";
							//echo "<td>".$user['gender']."</td>";
							echo "<td>".$user['mobile']."</td>";
							echo "<td>".$user['createdon']."</td>";
							//echo "<td>".$user['city']."</td>";
							echo "<td>".($user['city'] == null ? '<span class="incomplete">Not Mentioned</span>' : $user['city'])."</td>";
							echo "</tr>";
						}
						?>
				</tbody>
			</table>
			<footer class="text-right">
				<p>Copyright &copy; All Rights Krismen Rennsport Pvt.Ltd.
				<!--| Designed by <a href="http://www.templatemo.com" target="_parent">templatemo</a></p>-->
			</footer> 
		</div>
	</div><!-- /container -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
	<script src="StickyTableHeaders/js/jquery.stickyheader.js"></script>
		
		<!-------------------end----------------------->
	
	
  </body>
</html>