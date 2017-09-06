<?php require_once "header.php";?>

<?php
	require_once("../dbconnect.inc.php");
	$player_id = $_GET['id'];
	$platform = $_GET['platform'];
?>
	<title>List of Men-on <?php if (isset($platform)) echo $platform; ?> races</title>
        
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="stats.php"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
			<li><a href="products_transactions.php"><i class="fa fa-bar-chart fa-fw"></i>Payment Transactions</a></li>
			<li><a href="manage-users.php" class="active"><i class="fa fa-users fa-fw"></i>User Details</a></li>
			<li><a href="list_product.php"><i class="fa fa-database fa-fw"></i>add products</a></li>
           <!-- <li><a href="data-visualization.php"><i class="fa fa-database fa-fw"></i>add products</a></li>
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
              <!--<div class="square"></div>-->
              <h2 class="templatemo-inline-block">Men-On User Details</h2><hr>
			  <h2 style="font-size:20px; font-weight:bold; color:#aa0000; ">Note:</h2><br/>
			  <h3 style="color:green;">In single-player races, no winner is recorded.</h3><br/><br/>
			  <?php	
	if (isset($player_id) ? $player_id == '' : true)
		$player_id = null;
	else {
		$username = mysql_fetch_row(mysql_query("SELECT username FROM registration WHERE id=".$player_id));
		$username = $username[0];
		if ($username == '')
			$username = null;
	}
	
	if ($username != null) {
		$racelogs = mysql_query("SELECT * FROM racelog WHERE (player1='".$username."' OR player2='".$username."' OR player3='".$username."' OR player4='".$username."')order by raceid desc".(isset($platform) ? " AND type = '".$platform."'" : ""));
		echo "<h3>Showing ".(isset($platform) ? $platform." " : "")."races for: ".$username."</h3>";
	}
	else {
		$racelogs = mysql_query("SELECT * FROM racelog".(isset($platform) ? " WHERE type = '".$platform."'" : ""));
		echo "<h3>Complete list of ".(isset($platform) ? $platform." " : "")."races</h3>";
	}
		$result = mysql_query("SELECT count(raceid) as total from racelog");
		$data = mysql_fetch_assoc($result);
		$racenum = 5000 + $data['total'];
?>
			</div>
            <!--<div class="templatemo-content-widget white-bg col-1 text-center">
              <i class="fa fa-times"></i>
              <h2 class="text-uppercase">Maris</h2>
              <h3 class="text-uppercase margin-bottom-10">Design Project</h3>
              <img src="images/bicycle.jpg" alt="Bicycle" class="img-circle img-thumbnail">
            </div>
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i>
              <h2 class="text-uppercase">Dictum</h2>
              <h3 class="text-uppercase">Sedvel Erat Non</h3><hr>
              <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
              </div>                          
            </div>-->
          </div>
          <div class="templatemo-flex-row flex-content-row">
           <!-- <div class="col-1">              
              <div class="templatemo-content-widget orange-bg">
                <i class="fa fa-times"></i>                
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/sunset.jpg" alt="Sunset">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">Consectur Fusce Enim</h2>
                    <p>Phasellus dapibus nulla quis risus auctor, non placerat augue consectetur.</p>  
                  </div>        
                </div>                
              </div>            
              <div class="templatemo-content-widget white-bg">
                <i class="fa fa-times"></i>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object img-circle" src="images/sunset.jpg" alt="Sunset">
                    </a>
                  </div>
                  <div class="media-body">
                    <h2 class="media-heading text-uppercase">Consectur Fusce Enim</h2>
                    <p>Phasellus dapibus nulla quis risus auctor, non placerat augue consectetur.</p>  
                  </div>
                </div>                
              </div>            
            </div>-->
            <div class="col-1">
			<div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">users details</h2></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" style="text-align:center;">
                   <tr><th style="text-align:center;">Time</th>
		<th style="text-align:center;">Platform</th>
		<th style="text-align:center;">Players</th>
		<th style="text-align:center;">&nbsp;Total Race Bucks<br>(for the race)&nbsp;</th>
		<th style="text-align:center;">Winner Earned<br>Race Bucks</th>
		<th style="text-align:center;">Player names</th>
		<th style="text-align:center;">Winner</th>
	</tr>
<?php
	while ($log = mysql_fetch_array($racelogs)) {
		echo "<tr>";
		echo "<td><b>".($racenum--).".</b> ".$log['start']."</td>";
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
		echo "<tr/>";
	}
?>
                  </table>    
                </div>                          
              </div>
            </div>           
          </div> <!-- Second row ends -->
          <!--<div class="templatemo-flex-row flex-content-row templatemo-overflow-hidden"> <!-- overflow hidden for iPad mini landscape view-->
           <!-- <div class="col-1 templatemo-overflow-hidden">
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