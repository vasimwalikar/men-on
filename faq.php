	<?php
		include_once "dbconnect.inc.php";
		if(isset($_COOKIE['Username'])==""){
			$User_name="";
		}else if(isset($_COOKIE['Username'])!==""){
			$User_name=$_COOKIE['Username'];
		}
		
		if(isset($_COOKIE['Email'])==""){
			$Email="";
		}else if(isset($_COOKIE['Email'])!==""){
			$Email=$_COOKIE['Email'];
		}
		session_start();
		if(!isset($_SESSION['loggedin'])){
			$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
		}

	?>

	<?php require_once "header.php";?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">FAQ </li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--faq-->
	<div class="faq-info">
		<div class="container" style="text-ali">
			<div class="title-info">
				<h3 class="title" style="font-family:Orbitron,sans-serif;">Frequently Asked<span> Questions</span></h3>
				<p id="sub-title1">A real game in the UNREAL WORLD</p>
				<p style="text-align:center;">Welcome to Men-on Town (Real Steal Racing). REDEEM your ACHIEVEMENT.</p>
			</div>
			
			<div class="title-info">
				<p id="sub-title">General</p>	
			</div>
			<ul class="faq">
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">What is Real Steal Racing?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>www.men-on.com is a unique Global platform via web service that allows Players to use their skills to compete on these tournaments for cash rewards and prizes. KrisMen Rennsport does not host any tournaments or Games of Chance and all earnings are based only upon your skills and practice
							</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">So what makes Real Steal a great 	game for car race enthusiasts?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Single & Multiplayer. You can race against the AI if in single player mode or challenge your friends at racing in multi-player mode. Beware though, other players will be able to win your RaceBucks.
							</p>
							<p>No annoying ADs or IAP. This game uses an innovative in-game AD displaying system that blends with the environment. The billboards encountered during the car race show real ADs that are not intrusive.
							</p>
							<p>3D Graphics. Real Steal has stunning high-quality 3D graphics that make the race look great. Combined with excellent sound effects you'll have the feeling of a real car race.
							</p>
							<p>Power-ups. During the game you'll pick-up various power-ups (i.e. nitro, ammos) that can help you win the race or achieve the in-game achievements - the best part about achievements is that you'll obtain RaceBucks for completing them.
							</p>
							<p>Great Gameplay. You can use tilt or touch to maneuver your car on the tracks. Gameplay is focused on driving the car and attacking your opponents (i.e. shooting at them with Missiles) to win the race.
							</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Can you register to men-on Town for free?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1"><p>Men-on games are 100% free for users for registration and to play. Every Registered/Active user is powered by Racebuck (Real Money).
						</p></li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Can I play Offline?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1"><p>Yes, You can Play offline, your scores would be calculated only once you login.
						</p></li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">How are Cash/Prizes awarded?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1"><p>Once a game starts, the cash/prize distribution appears in the game details section. Before the game starts, the expected cash/prize distribution is shown to players based on the maximum racers playing for that game. And the Cash is added to the account.
						</p></li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">What are cash Games?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1"><p>Cash games are those that are played for Real Cash and have Real Cash Prizes (in INR).
						</p></li>										
					</ul>
				</li>
			</ul>
			
			<div class="title-info">
				<p id="sub-title">Racebuck/Gameplay FAQs</p>	
			</div>
			<ul class="faq">
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">What are Racebuck?

					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>RACEBUCK (RB) is the credit point (Real Money) you can win and collect @ men-on town.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Where can how Much Racebucks I have?

					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Register @men-on TOWN (Real Steal Racing). Login to your Account and check your PROFILE to check your men-on town (Real Steal Racing) credits.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">How can I get More Racebuck?

					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Racebuck can be earned by playing games, collecting coins, hitting a missile, changing color of the cars etc. Increase achievements to increase Racebuck. You can also buy Racebuck at our portal to play Real Multilayer games in case you are running out of RBs.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">What do I do with the Racebucks collected?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>RaceBuck is the Real Money in your wallet. You can redeem your RB points for cash or use the money to buy your favorite product at huge discounts from PITTSHOP</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#"> How do I redeem RaceBucks for Cash?

					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>You can raise a redeem request via the withdraw cash option available on the player dashboard</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Where can I download the games from?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>The game can be downloaded from google play store, Amazon Store and played on the web as well.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">What are the rules of the Games?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>None, you have to beat your opponents to the finishing Line and we have added some extra Punch on the Tracks to help you win the Race.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Can I challenge anyone in Multiplayer Racing?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>You can challenge and accept anyone’s challenge,</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Can anyone STEAL my Racebuck?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Yes, Only by playing multiplayer Games, you can STEAL your opponents Racebuck, but Beware your opponent can steal your RBs Too.</p>
						</li>										
					</ul>
				</li>
				
			</ul>
			
			<div class="title-info">
				<p id="sub-title">PITTSHOP</p>	
			</div>
			<ul class="faq">
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">What is PITTSHOP?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>PITTSHOP is a chill zone for the gaming communities, we have a wide variety of products for you to choose from, use your Racebuck from your account to buy your favorite products. </p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Are all products Real and Original?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Yes, All the products and Genuine and Original, We ship the product directly from our suppliers.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Do I have to Pay for Shipping?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>No, Shipping is absolutely free in India</p>
						</li>										
					</ul>
				</li>
				
			</ul>
			
			<div class="title-info">
				<p id="sub-title">Additional Info</p>	
			</div>
			<ul class="faq">
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">What is a “Skill Game”?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Unlike games of chance, your chances of winning a skill game are directly related to your skill level. This is not to say that chance has no effect on a skill game; indeed, chance (e.g. the roll of a dice or the shuffle of a deck of cards) has a definite role in the outcome of a game. But in games of skill, your knowledge of the game, and your skill in choosing the best course of action, is the largest decider of whether you win or lose.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">What is a “Game Of Chance”?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>A game of chance is in which lady luck holds the upper hand. No matter your skill and experience, the outcome of the game will be decided largely due to luck. This dependence on random fortune is what makes Games of Skill so compelling, and for many people, so relaxing.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Can I Play For Free?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Yes, we offer “free play” or “practice” games, which you can use to evaluate the games and to decide whether you want to play for real money.</p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Where can I find rules to the games?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>Most of the cash game offer comprehensive online help, both in the basic rules of the game, as well as assistance in figuring out a strategy. </p>
						</li>										
					</ul>
				</li>
				<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#">Legal Cash Games in India?
					<span class="icon"> </span></a>
					<ul>
						<li class="subitem1">
							<p>In general, online skill games are legal in India, while online games of chance are restricted. However, this can vary from location to location. Some states and municipalities have laws that are more or less restrictive. It is your responsibility to determine if participating in the games is permitted under the laws of the jurisdiction where you are located. In addition, some gaming web sites have their own policies regarding who they allow to play their games.</p>
						</li>										
					</ul>
				</li>
			</ul>
			
			
			<!-- script for tabs -->
			<script type="text/javascript">
				$(function() {
				
					var menu_ul = $('.faq > li > ul'),
						   menu_a  = $('.faq > li > a');
					
					menu_ul.hide();
				
					menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
							menu_a.removeClass('active');
							menu_ul.filter(':visible').slideUp('normal');
							$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
							$(this).removeClass('active');
							$(this).next().stop(true,true).slideUp('normal');
						}
					});
				
				});
			</script>
			<!-- script for tabs -->
		</div>			
	</div>			
	<!--//faq-->
	<?php require_once "footer.php"?>