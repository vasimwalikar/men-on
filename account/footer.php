<!--//trend-->
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-info">
				<div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
					<h4 class="footer-logo" style="font-family:Orbitron,sans-serif;"><a href="index.php">Pitt <b>Shop</b> <span class="tag">Everything for Gammers world </span> </a></h4>
					<p>Copyright © All Rights KrisMen Rennsport Pvt. Ltd.</p>
				</div>
				<div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
					<h3 style="font-family:Orbitron,sans-serif;">Popular</h3>
					<ul>
						<li><a href="../about.php">About Us</a></li>
						<li><a href="../disclaimer.php">Disclaimer</a></li>
						<li><a href="../privacy_policy.php">Privacy Policy</a></li>
						<li><a href="../terms.php">Terms of Services</a></li>
						<li><a href="../faq.php">FAQ</a></li>
						<li><a href="../contact.php">Contact us</a></li>
					</ul>
				</div>
				<div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".9s">
					<h3 style="font-family:Orbitron,sans-serif;">Subscribe</h3>
					<p>Sign Up Now For More Information <br> About Our Company </p>
					<form>
						<input type="text" placeholder="Enter Your Email" required="">
						<input type="submit" value="Go">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//footer-->		
	<!-------js for blocking user To continue register or login------------------>
		<?php if(empty($User_name)){ ?>
		<script type="text/javascript">
			$(document).ready(function(){
			   $('.product-list').mouseover(function(){
				
				$('.product-list a:hover').css("cursor","not-allowed");
				$('.product-list a:hover').attr("title","Register or Login to continue");
				
			   }); 
			});
			
		<?php } ?>
		</script>
			
	<!--END-->
	<!--search jQuery-->
	<script src="js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>