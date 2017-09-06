	<title>Achievements</title>
	<?php
		require_once "header.php";
		include_once ("../dbconnect.inc.php");

		$username = isset($_GET['username']) ? mysql_escape_string($_GET['username']) : false;
		if (!$username) {
		echo "<br/>Username not supplied";
		return;
		}
	
	?>
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
						<li><a href="#" class="active"></i>Dashboard</a></li>
						<li><a href="products_transactions.php"></i>Payment Transactions</a></li>
						<li><a href="manage-users.php"></i>User Details</a></li>
					</ul>  
				</nav> 
			</div>
		</div>
		<div class="templatemo-content-container">
			<div class="templatemo-flex-row flex-content-row">
				<div class="col-1">  
				<?php echo "<h2>".$username."'s Achievements</h2>"; ?>          
					<div class="templatemo-content-widget pink-bg" style="background-color: white;">
						<i class="fa fa-times"></i>                
						
						<?php
							

							$ach_query = mysql_query("SELECT achievements FROM achievements WHERE username='".$username."'");
							if (mysql_num_rows($ach_query) == 0) {
							echo "<p style=\"color:gray;\">No achievements found.</p>";
							return;
							}

							$achievements = mysql_fetch_row($ach_query)[0];
							$achievements = str_replace('"', '', $achievements);
							$achievements = str_replace('{', '', $achievements);
							$achievements = str_replace('}', '', $achievements);
							$ach_array = explode(',', $achievements);

							$ach_list = array(
							"CgkIsePYytgTEAIQCw" => "Collect 100 coins",
							"CgkIsePYytgTEAIQDA" => "Collect 500 coins",
							"CgkIsePYytgTEAIQIA" => "Collect 1000 coins",
							"CgkIsePYytgTEAIQDg" => "Race with all car colours",
							"CgkIsePYytgTEAIQDw" => "Convert coins to 25 racebucks",
							"CgkIsePYytgTEAIQEA" => "First 1st",
							"CgkIsePYytgTEAIQEQ" => "First multiplayer 1st",
							"CgkIsePYytgTEAIQEg" => "Win 3 online races in a row",
							"CgkIsePYytgTEAIQEw" => "Win 5 online races in a row",
							"CgkIsePYytgTEAIQFA" => "Win 10 online races in a row",
							"CgkIsePYytgTEAIQFQ" => "Win 5 normal races",
							"CgkIsePYytgTEAIQFg" => "Win 10 hard races",
							"CgkIsePYytgTEAIQFw" => "Win 15 insane races",
							"CgkIsePYytgTEAIQJA" => "Win 10 online races",
							"CgkIsePYytgTEAIQGA" => "Lose 10 races",
							"CgkIsePYytgTEAIQCQ" => "Drift 100 metres",
							"CgkIsePYytgTEAIQGQ" => "Pick up 5 nitrous cans",
							"CgkIsePYytgTEAIQ2Q" => "Pick up 25 nitrous cans",
							"CgkIsePYytgTEAIQJQ" => "Pick up 50 nitrous cans",
							"CgkIsePYytgTEAIQGg" => "Finish a lap in 75 seconds",
							"CgkIsePYytgTEAIQGw" => "Hit 5 opponents",
							"CgkIsePYytgTEAIQHA" => "Hit 50 opponents",
							"CgkIsePYytgTEAIQHQ" => "Hit 100 opponents",
							"CgkIsePYytgTEAIQHg" => "Fire and miss 10 missiles",
							"CgkIsePYytgTEAIQHw" => "Overtake 10 cars",
							"CgkIsePYytgTEAIQIQ" => "Be overtaken 10 times",
							"CgkIsePYytgTEAIQIg" => "Overtake 5 cars while boosting",
							"CgkIsePYytgTEAIQIw" => "Gain 1st place just before finishing a race",
							"CgkIsePYytgTEAIQAg" => "Win 1000 races",
							"CgkIsePYytgTEAIQBg" => "Shoot 20 cars",
							"CgkIsePYytgTEAIQBw" => "Go the wrong way 10 times",
							"CgkIsePYytgTEAIQCA" => "Hit opponents or the side of the track 10 times",
							"CgkIsePYytgTEAIQBQ" => "Overtake 50 opponents",
							"CgkIsePYytgTEAIQCg" => "Play with each car colour 10 times",
							"CgkIsePYytgTEAIQAw" => "Pick up a million coins",
							);

							$ach_steps = array(
							"CgkIsePYytgTEAIQCw" => 100,
							"CgkIsePYytgTEAIQDA" => 500,
							"CgkIsePYytgTEAIQIA" => 1000,
							"CgkIsePYytgTEAIQDg" => 7,
							"CgkIsePYytgTEAIQDw" => 25,
							"CgkIsePYytgTEAIQEA" => 1,
							"CgkIsePYytgTEAIQEQ" => 1,
							"CgkIsePYytgTEAIQEg" => 3,
							"CgkIsePYytgTEAIQEw" => 5,
							"CgkIsePYytgTEAIQFA" => 10,
							"CgkIsePYytgTEAIQFQ" => 5,
							"CgkIsePYytgTEAIQAg" => 1000,
							"CgkIsePYytgTEAIQFg" => 10,
							"CgkIsePYytgTEAIQFw" => 15,
							"CgkIsePYytgTEAIQGA" => 10,
							"CgkIsePYytgTEAIQCQ" => 100,
							"CgkIsePYytgTEAIQ2Q" => 25,
							"CgkIsePYytgTEAIQJQ" =>50,
							"CgkIsePYytgTEAIQGQ" => 5,
							"CgkIsePYytgTEAIQGg" => 1,
							"CgkIsePYytgTEAIQGw" => 5,
							"CgkIsePYytgTEAIQHA" => 50,
							"CgkIsePYytgTEAIQHQ" => 100,
							"CgkIsePYytgTEAIQBg" => 20,
							"CgkIsePYytgTEAIQHg" => 10,
							"CgkIsePYytgTEAIQHw" => 10,
							"CgkIsePYytgTEAIQBQ" => 50,
							"CgkIsePYytgTEAIQIQ" => 10,
							"CgkIsePYytgTEAIQIg" => 5,
							"CgkIsePYytgTEAIQIw" => 1,
							"CgkIsePYytgTEAIQJA" => 10,
							"CgkIsePYytgTEAIQBw" => 10,
							"CgkIsePYytgTEAIQCA" => 10,
							"CgkIsePYytgTEAIQCg" => 70,
							"CgkIsePYytgTEAIQAw" => 100000,
							
							
							);

							echo "<table>";
							foreach ($ach_array as $achievement) {
							$ach_parts = explode(':', $achievement);
							if (!$ach_list[$ach_parts[0]] || !$ach_steps[$ach_parts[0]]) continue;
							echo "<tr><td>".$ach_list[$ach_parts[0]]."&nbsp;&nbsp;</td><td>".($ach_steps[$ach_parts[0]] > 1 ? $ach_parts[1]."/".$ach_steps[$ach_parts[0]] : ($ach_parts[1] > 0 ? "Yes" : "No"))."</td></tr>";
							}
							echo "</table>";

						?>

					</div>            
				</div>                       
			</div> <!-- Second row ends -->
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