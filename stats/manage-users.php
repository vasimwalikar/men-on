<?php require_once "header.php";?>

<?php
	require_once("../dbconnect.inc.php");
	date_default_timezone_set("Asia/Kolkata");
	$start24hrs = time() - 86400;	// 24 hours in seconds
	$last24hrs = "BETWEEN '".date("Y-m-d", $start24hrs)." 00:00:00' AND '".date("Y-m-d")." 00:00:00'";
	$today = "BETWEEN '".date("Y-m-d")." 00:00:00' AND '".date("Y-m-d")." ".date("H:i:s")."'";

	
	$registered_users = mysql_query("SELECT * FROM registration WHERE admin != 2 order by id desc ");
	
	$result = mysql_query("SELECT count(id) as total from registration");
			$data = mysql_fetch_assoc($result);
			//$data['total'];
		$usernum = $data['total'];

		$litres = mysql_query("SELECT name, litres FROM scores");
		while ($fc = mysql_fetch_array($litres)) {
			$name = $fc['name'];
			$fuel_capacities[$name] = $fc['litres'];
			}
			//by default date
			
			$from_date = '2014-03-20 00:00:00';
			$to_date = date("Y-m-d").'&nbsp;'.date("H:i:s");
			
			//by selected date
			if($_POST[from_date]){
				$from_date= mysql_real_escape_string($_POST[from_date]);
			}
			if($_POST[to_date]){
				$to_date=   mysql_real_escape_string($_POST[to_date]);
			}
			
			$races = mysql_query("SELECT * FROM racelog WHERE start BETWEEN '$from_date' and '$to_date'");
			while ($race = mysql_fetch_array($races)){
				$player1 = $race['player1'];
				$player2 = $race['player2'];
				$player3 = $race['player3'];
				$player4 = $race['player4'];
				$winner = $race['winner'];

				$numraces[$player1]++;
				$numraces[$player2]++;
				$numraces[$player3]++;
				$numraces[$player4]++;
				$completed = $winner != null;

				if ($completed) switch ($race['numplayers']) {
					case 1:
					$num1Pc[$player1]++; break;
					case 2:
					$num2Pc[$player1]++; $num2Pc[$player2]++; $num2Pw[$winner]++; break;
					case 3:
					$num3Pc[$player1]++; $num3Pc[$player2]++; $num3Pc[$player3]++; $num3Pw[$winner]++; break;
					case 4:
					$num4Pc[$player1]++; $num4Pc[$player2]++; $num4Pc[$player3]++; $num4Pc[$player4]++; $num4Pw[$winner]++; break;
					default:
					break;
				}
				else switch ($race['numplayers']) {
					case 1:
					$num1Pi[$player1]++; break;
					case 2:
					$num2Pi[$player1]++; $num2Pi[$player2]++; break;
					case 3:
					$num3Pi[$player1]++; $num3Pi[$player2]++; $num3Pi[$player3]++; break;
					case 4:
					$num4Pi[$player1]++; $num4Pi[$player2]++; $num4Pi[$player3]++; $num4Pi[$player4]++; break;
					default:
					break;
				}

				$lastrace[$player1] = $race['start'];
				if ($player2 != null) {
				$lastrace[$player2] = $race['start'];
				}
				if ($player3 != null) {
				$lastrace[$player3] = $race['start'];
				}
				if ($player4 != null) {
				$lastrace[$player4] = $race['start'];
				}
			}
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
				<li><a href="#" class="active"><i class="fa fa-users fa-fw"></i>User Details</a></li>
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
						<li><a href="manage-users.php" class="active">active users</a></li>
						<li><a href="non_active_users.php">non active users</a></li>
						<li><a href="races.php">total list of races </a></li>
					</ul>  
				</nav> 
			</div>
        </div>
        <div class="templatemo-content-container">
			<div class="templatemo-flex-row flex-content-row">
				<div class="templatemo-content-widget white-bg col-2">
					<i class="fa fa-times"></i>
					  <!--<div class="square"></div>-->
					<h2 class="templatemo-inline-block">Men-On User Details</h2><hr>
					<h2 style="font-size:20px; font-weight:bold; color:#aa0000; ">Note:</h2>
					<li>This data is accurate from the time when race logging began, i.e. 20-03-2014.</li>
					<li>Username and email are the only compulsory details required for user registration.</li>
					<li><span style="background-color:#ffacac">Admin accounts have this background colour. These users do not appear on the lap times leaderboard.</span></li>
					<li><span style="background-color:#acacff">Facebook users have this background colour.</span></li>
					<li>Dates are shown in the format Year-Month-Date</li>
					<li>Click on player names to see races in which they participated</li>
				</div>
            </div>
			<div class="templatemo-flex-row flex-content-row">
				<div class="col-1">
					<form action="" class="templatemo-login-form" method="POST" enctype="multipart/form-data">
						<div class="row1 form-group">
							<div class="col-lg-12 form-group" style="padding-left: 25px; padding-right: 25px; margin-top: 200px;">                   
								<div class="margin-right-15 templatemo-inline-block">
								  <label for="inputFirstName">From</label>
								  <input class="form-control" name="from_date" type="text"  data-beatpicker="true"/ value="<?php echo $from_date?>">  
								</div>
								<div class="margin-right-15 templatemo-inline-block">                      
								  <label for="inputLastName">To</label>
								  <input class="form-control" name="to_date" type="text" data-beatpicker="true"/ value="<?php echo $to_date?>">    
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
						<th>User Name</th>
						<th>Email</th>
						<th>Race Bucks</th>
						<th>Mobile Number</th>
						<th>Races Played</th>
						<th>Yesterday</th>
						<th>1-Player</th>
						<th>2-Player</th>
						<th>3-Player</th>
						<th>4-Player</th>
						<th>Last Race</th>
						<!--th>State</th>
						<th>Gender</th-->
						<th>Achievements</th>
					</tr>
				</thead>
				<tbody>
					<?php
					

						// The stats table
						while ($user = mysql_fetch_array($registered_users)){
							$username = $user['username'];
							if ($numraces[$username] == null) {
								$numraces[$username] = 0;
								continue;
							}
							if ($num1Pc[$username] == null) $num1Pc[$username] = 0;
							if ($num2Pc[$username] == null) $num2Pc[$username] = 0;
							if ($num3Pc[$username] == null) $num3Pc[$username] = 0;
							if ($num4Pc[$username] == null) $num4Pc[$username] = 0;
							if ($num1Pi[$username] == null) $num1Pi[$username] = 0;
							if ($num2Pi[$username] == null) $num2Pi[$username] = 0;
							if ($num3Pi[$username] == null) $num3Pi[$username] = 0;
							if ($num4Pi[$username] == null) $num4Pi[$username] = 0;
							if ($num1Pw[$username] == null) $num1Pw[$username] = 0;
							if ($num2Pw[$username] == null) $num2Pw[$username] = 0;
							if ($num3Pw[$username] == null) $num3Pw[$username] = 0;
							if ($num4Pw[$username] == null) $num4Pw[$username] = 0;

							$col = $user['admin'] != 0 ? "#ffacac" : "#ffffff";
							if ($user['loginfrom'] == 'facebook')
							$col = "#acacff";
							if ($user['loginfrom'] == 'green')
							$col = "#00cd00";

							echo '<tr style="color:'.($user['activation'] == null ? "#000000" : "#777777").'; background-color:'.$col.'">';
							echo "<td>".($usernum++).". <a href=\"races1.php?id=".$user['id']."\">".$username."</a></td>";
							echo "<td>".$user['email']."</td>";


							echo "<td>&nbsp;".($fuel_capacities[$username] ? $fuel_capacities[$username] : '0')."</td>";
							echo "<td>".$user['mobile']."</td>";

							// $regtime = $user['createdon'];
							// echo "<td>".($regtime == "0000-00-00 00:00:00" ? "Before 2013-07-22" : $regtime)."</td>";

							echo "<td>&nbsp;".$numraces[$username]."</td>";
							echo "<td>".mysql_num_rows(mysql_query("SELECT winner FROM racelog WHERE (player1 = '".$username."' OR player2 = '".$username."' OR player3 = '".$username."' OR player4 = '".$username."') AND start ".$last24hrs))."</td>";
							// $lastrace = mysql_fetch_row(mysql_query("SELECT start FROM racelog WHERE player1 = '".$username."' OR player2 = '".$username."' OR player3 = '".$username."' OR player4 = '".$username."' ORDER BY start DESC LIMIT 1"));

							// echo "<td>".$num1Pc[$username]." / ".$num1Pi[$username]."&nbsp</td>";
							echo "<td>".($num1Pc[$username] + $num1Pi[$username])."&nbsp</td>";
							echo "<td>".$num2Pw[$username]." / ".($num2Pc[$username] - $num2Pw[$username])." / ".$num2Pi[$username]."&nbsp</td>";
							echo "<td>".$num3Pw[$username]." / ".($num3Pc[$username] - $num3Pw[$username])." / ".$num3Pi[$username]."&nbsp</td>";
							echo "<td>".$num4Pw[$username]." / ".($num4Pc[$username] - $num4Pw[$username])." / ".$num4Pi[$username]."&nbsp</td>";

							echo "<td>".$lastrace[$username]."&nbsp&nbsp</td>";
							// echo "<td>".$user['state']."</td>";
							// echo "<td>".$user['gender']."</td>";
							echo '<td><a href="achievements.php?username='.$username.'">View achievements</a></td>';

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