<?php require_once "header.php";?>

<?php
	require_once("../dbconnect.inc.php");
	date_default_timezone_set("Asia/Kolkata");
	$player_id = $_GET['id'];
	$platform = $_GET['platform'];
	
	
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
	<link rel="stylesheet" href="documents/css/reset.css"/>
    <link rel="stylesheet" href="css/BeatPicker.min.css"/>
    <link rel="stylesheet" href="documents/css/demos.css"/>
    <link rel="stylesheet" href="documents/css/prism.css"/>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/BeatPicker.min.js"></script>
    <script src="documents/js/prism.js"></script>
	<!---------------------end------------------------>
	</head>
	<!--<title>List of Men-on <?php if (isset($platform)) echo $platform; ?> races</title>-->
        
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
					<li><a href="races.php" class="active">total list of races </a></li>
					<!-- <li><a href="races1.php?platform=webplayer">web-players</a></li>
					<li><a href="races1.php?platform=mobile">mobile-players</a></li>-->
				
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-2">
              <i class="fa fa-times"></i>
             <!-- <div class="square"></div>-->
              <h2 class="templatemo-inline-block">Today's User Details</h2><hr>
			  <?php
					$today = "BETWEEN '".date("Y-m-d")." 00:00:00' AND '".date("Y-m-d")." ".date("H:i:s")."'";
					$racelog_today = mysql_query("SELECT * FROM racelog WHERE numplayers=4 AND start ".$today);
					
					//total race bucks of winners
						$litres = mysql_query("SELECT name, litres FROM scores");
						while ($fc = mysql_fetch_array($litres)) {
							$name = $fc['name'];
							$fuel_capacities[$name] = $fc['litres'];
						}
					
					//count total number of usr
					$racenum = 1;
				?>
			</div>
           
          </div>
          <div class="templatemo-flex-row flex-content-row">
           
            <div class="col-1">
			<form action="races.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data">
				<div class="row form-group">
					<div class="col-lg-12 form-group" style="padding-left: 25px; padding-right: 25px; margin-top: 200px;">  
						<div class="col-lg-6 col-md-6 form-group" style="width: 200px;"> 
							<label class="control-label templatemo-block">Race Type</label>
							 <?php
								if (isset($_POST['submit'])) 
								{
									$Wave = $_POST['winner'];
								}
							?>

							<?php 
								$attr = 'selected="selected"'; 
							?>
							<select class="form-control" name="winner">
								<option VALUE="0" <?php echo $Wave == '0' ? 'selected' : '';  ?>>All</option>
								<option VALUE="1" <?php echo $Wave== '1' ? 'selected': ''; ?>>Finished</option> 
								<option VALUE="2" <?php echo $Wave== '2' ? 'selected': ''; ?>>Unfinished</option>              
							</select>
						</div>
						<div class="col-lg-6 col-md-6 form-group" style="width: 200px;"> 
							<label class="control-label templatemo-block">No. of players</label>
							 <?php
								if (isset($_POST['submit'])) 
								{
									$Wave_player = $_POST['player'];
								}
							?>

							<?php 
								$attr = 'selected="selected"'; 
							?>
							<select class="form-control" name="player">
								<option VALUE ="0" <?php echo $Wave_player == '' ? 'selected': ''; ?>>All</option>
								<option VALUE ="2" <?php echo $Wave_player== '2' ? 'selected': ''; ?>>2-Player</option> 
								<option VALUE ="3" <?php echo $Wave_player== '3' ? 'selected': ''; ?>>3-Player</option>              
								<option VALUE ="4" <?php echo $Wave_player== '4' ? 'selected': 'selected'; ?>>4-Player</option>              
							</select>
						</div>
						<div class="margin-right-15 templatemo-inline-block">
							<label for="inputFirstName">From</label>
							<input class="form-control" name="from_date" type="text"  data-beatpicker="true"/ value="<?php echo date("Y-m-d")." 00:00:00";?>">  
						</div>
						<div class="margin-right-15 templatemo-inline-block">                      
							<label for="inputLastName">To</label>
							<input class="form-control" name="to_date" type="text"  data-beatpicker="true"/ value="<?php echo date("Y-m-d").'&nbsp;'.date("H:i:s");?>">    
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
          </div> <!-- Second row ends -->
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
						<th>Time</th>
						<th>Platform</th>
						<th>Players</th>
						<th>Total Race Bucks<br>(for the race)</th>
						<th>Winner Earned<br>Race Bucks</th>
						<th>Player names</th>
						<th>Winner</th>
						<th>Winner<br>Race Bucks</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while ($log = mysql_fetch_array($racelog_today)) {
							echo "<tr>";
							echo "<td><b>".($racenum++).".</b> ".$log['start']."</td>";
							$ismobile = $log['type'] == "mobile";
							echo "<td><span class='".($ismobile ? "mobile" : "webplayer")."'>&nbsp".$log['type']."&nbsp</span></td>";
							echo '<td align="center">'.$log['numplayers']."</td>";
							$playing_for = $log['playing_for'];
							echo '<td align="center">'.($playing_for == null ? "Unknown" : ($playing_for == "Free" ? "Free" : "<b>".$playing_for * $log['numplayers']."</b>"))."</td>";
							echo '<td align="center">'.($playing_for == null ? "Unknown" : ($playing_for == "Free" ? "Free" : "<b>".($playing_for * $log['numplayers'])*(0.8)."</b>"))."</td>";
							echo "<td>".$log['player1']
								.($log['player2'] == null ? "" : ", <span class=\"pnamelight\">".$log['player2']."</span>")
								.($log['player3'] == null ? "" : ", ".$log['player3'])
								.($log['player4'] == null ? "" : ", <span class=\"pnamelight\">".$log['player4']."</span>")."&nbsp;</td>";
							if ($log['numplayers'] == 1)
								echo "<td></td>";
							else
								echo "<td>".($log['winner'] == null ? '<span class="incomplete">Race unfinished</span>' : $log['winner'])."</td>";
								echo "<td>&nbsp;".($fuel_capacities[$log['winner']] ? $fuel_capacities[$log['winner']] : '0')."</td>";
							echo "<tr/>";
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